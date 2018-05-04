// import Cookies from 'js-cookie';

var store_map = null;
var store_map_data = [];
var store_map_info = null;
var store_geocoder = null;
var store_autocomplete = null;
window.initMap = initMap;

window._goToStore = function(storeID, StoreName, storeLink) {
    Cookies.set( 'store', {name: StoreName, id: storeID, link: storeLink } );
    location.href = storeLink;
}

function initMap() {
    var $doc = jQuery(document);
    var isChooseStorePage = $doc.find('#STORE-MAP').length;
    if (isChooseStorePage) {
        storeLoadData(function (data) {
            storeLoadMap(data.regions);
        });
    }
}

function convertToPosition(latlng) {
    var ret = null;
    if (latlng) {
        var arr = latlng.split(',') || [];
        if (arr.length) {
            ret = {
                lat: parseFloat(arr[0]),
                lng: parseFloat(arr[1])
            };
        }
    }
    return ret;
}

function storeLoadData(callback) {
    $.ajax( {
                url: '../assets/plugins/map/store-list.json',
                // data: {
                //     action : 'load-store-list'
                // },
                method: 'GET'
            }
        )
        .then(function (res) {

            var regions = (res || {}).data || [];
            if (typeof callback === 'function') {
                callback(regions);
            }
            console.log(regions);
        });

    // $.ajax({url: "chuoi.txt", success: function(result){
    //         $(".list-region").html(result);
    //     }});
}

function storeLoadMap(regions) {
    
    var position = {
        lat: parseFloat(location[0]),
        lng: parseFloat(location[1])
    };
    let vietnam = {
        lat: 16.8472634,
        lng: 101.2441985
    };
    store_map = new google.maps.Map(document.getElementById('STORE-MAP'), {
        zoom: 6,
        center: vietnam,
        disableDefaultUI: true,
        zoomControl: true,
        scrollwheel:true,
        mapTypeControl: false,
        scaleControl: false,
        streetViewControl: false,
        rotateControl: false,
        fullscreenControl: false
    });
    store_map_info = new google.maps.InfoWindow();

    storeMapGenHtml(regions);

    var datas = [];
    regions.forEach(function (region, index) {
        var stores = region.stores || [];
        for (var i in stores) {
            var store = stores[i] || {};
            var childs = store.childs;
            if (childs) {
                datas = datas.concat(childs);
            } else {
                datas.push(store);
            }
        }

    });
    storeMapMarker(datas);
    store_autocomplete = new AutocompleteDirectionsHandler(store_map);
}

function storeMapMarker(data) {
    data.forEach(function (item) {
        var position = convertToPosition(item.latlng);
        if (position) {
            var marker = new google.maps.Marker({
                position: position,
                // icon: '/images/icon-map-location.png',
                map: store_map
            });

            marker.addListener('click', function () {
                var position = this.getPosition();
                var pos = {
                    lat: position.lat(),
                    lng: position.lng()
                }
                storeMapShowInfo(pos);
            });
            store_map_data.push({
                data: item,
                marker: marker
            });
        }
    });
    setTimeout( function() {
        if( typeof window.mapData != 'undefined' ) {
            var currentStore = jQuery( '.region-wrap .item > a[data-id='+ window.mapData+']');
            if( currentStore.size() ) {
                currentStore = currentStore.eq(0);
                currentStore.click();
                currentStore.parent().addClass('active');
            }
        }
    }, 1000);

}

function storeMapGetInfo(data) {
    data = data || {};
    var image = data.image || '../assets/plugins/map/images/store-map-info.jpg';
    var id = data.store_id || 0;
    var name = data.store_name || '';
    var phone = data.store_phone || ''
    var hour = data.store_openhour || ''
    var address = data.store_address || '';
    var url = data.url;
    
    return `
        <div class="store-map-info">
            <div class="inner">
                <div class="store-photo"><img src="${image}" alt=""></div>
                <div class="store-name"><a href="javascript:;" onclick="_goToStore('${id}', '${name}', '${url}');">${name}</a></div>
                <div class="store-address">${address}</div>
                <div class="store-phone"><i class="c-icon icon-tel"></i>${phone}</div>
                <div class="store-openhour"><i class="c-icon icon-clock"></i><span>${hour}</span></div>
            </div>
        </div>
    `;
}

function storeMapGenHtml(data) {
    jQuery('.list-region').html('');
    var html = '';
    data.forEach(function (region, index) {
        var stores = region.stores || [];
        var name = region.name;
        let store_html = '';
        for (var i in stores) {
            var store = stores[i] || {};
            var childs = store.childs;
            if (childs && childs.length) {
                let child_html = '';
                childs.forEach(child => {
                    child_html += `
                    <li class="item">
                        <a href="javascript:void(0)" data-id="${child.store_id}" data-location="${child.latlng}">${child.store_name}</a>
                    </li>`;
                });
                store_html += `
                <li class="has-child">
                    <a href="javascript:void(0)" class="title" data-role="head" data-location="${store.latlng}">${store.name}</a>
                    <ul class="child">${child_html}</ul>
                </li>`;
            } else {
                store_html += `
                <li class="item">
                    <a href="javascript:void(0)" data-id="${store.store_id}" data-location="${store.latlng}">${store.store_name}</a>
                </li>`;
            }
        }
        html += `
            <h4 class="region">${name}</h4>
            <ul class="list-store">${store_html}</ul>
        `;
    });
    $('.list-region').html(html);
    
}

function storeMapGetCurrent(pos) {
    var foundIndex = store_map_data.findIndex(function (item) {
        var position = item.marker.getPosition();
        var lat = position.lat().toFixed(6);
        var lng = position.lng().toFixed(6);
        return (pos.lat.toFixed(6) === lat && pos.lng.toFixed(6) === lng);
    });
    return store_map_data[foundIndex];
}

function storeMapShowInfo(position) {
    var current = storeMapGetCurrent(position);
    if (current && current.marker) {
        var infoContent = storeMapGetInfo(current.data);
        store_map_info.setContent(infoContent);
        store_map_info.open(store_map, current.marker);
    }
}

function AutocompleteDirectionsHandler(map) {
    this.map = map;
    this.originPlaceId = null;
    this.destinationPlaceId = null;
    this.travelMode = 'WALKING';
    var originInput = document.getElementById('origin-input');
    var destinationInput = document.getElementById('destination-input');

    this.directionsService = new google.maps.DirectionsService;
    this.directionsDisplay = new google.maps.DirectionsRenderer;
    this.directionsDisplay.setMap(map);
    var option = {
        placeIdOnly: true,
        componentRestrictions: {
            country: 'vn'
        }
    }
    var originAutocomplete = new google.maps.places.Autocomplete(originInput, option);
    this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
    //var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput, option);
    //this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
}

AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function (autocomplete, mode) {
    var me = this;
    autocomplete.bindTo('bounds', this.map);
    autocomplete.addListener('place_changed', function () {
        var place = autocomplete.getPlace();
        if (!place.place_id) {
            console.log("Please select an option from the dropdown list.");
            return;
        }
        if (mode === 'ORIG') {
            me.originPlaceId = place.place_id;
        } else {
            me.destinationPlaceId = place.place_id;
        }
        me.route();
    });

};

AutocompleteDirectionsHandler.prototype.route = function () {
    if (!this.originPlaceId) {
        return;
    }
    var destination_value = $('#destination-input').data('location') || '';
    if (destination_value.length == 0) {
        return;
    }
    var me = this;
    var destination_position = convertToPosition(destination_value);
    this.directionsService.route({
        origin: {
            'placeId': this.originPlaceId
        },
        destination: destination_position,
        travelMode: this.travelMode
    }, function (response, status) {
        if (status === 'OK') {
            me.directionsDisplay.setDirections(response);
        } else {
            console.log('Directions request failed due to ', status);
        }
    });
};

function clearDirection() {
    store_autocomplete.directionsDisplay.setMap(null);
}

$(document).on('click', '.list-region a[data-location]', function (event) {
    var $this = $(this);
    $('.list-region a[data-location]').parent().removeClass('active');
    $this.parent().addClass('active');
    var location = $this.data('location');
    var text = $this.text();
    var is_head = $this.data('role') === 'head';
    if (location && location !== 'undefined') {
        var position = convertToPosition(location);
        var zoom = 15;
        if (is_head) {
            zoom = 10;
        }
        storeMapShowInfo(position);
        store_map.setZoom(zoom);
        store_map.panTo(position);
        //set value to searchbox
        $('#destination-input').data('location', location);
        $('#destination-input').val(text);

    }
});

$(document).on('click', '.store-search .controls', function (event) {
    $(this).select();
});

$(document).on('click', '.store-search .button-travel-mode', function (event) {
    store_autocomplete.route();
});

$(document).on('click', '.region-wrap .toggle-button', function (event) {
    $('.region-wrap').toggleClass('hidden');
});