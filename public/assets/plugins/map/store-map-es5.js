/******/
(function(modules) { // webpackBootstrap
    /******/ // The module cache
    /******/
    var installedModules = {};
    /******/
    /******/ // The require function
    /******/
    function __webpack_require__(moduleId) {
        /******/
        /******/ // Check if module is in cache
        /******/
        if (installedModules[moduleId])
        /******/
            return installedModules[moduleId].exports;
        /******/
        /******/ // Create a new module (and put it into the cache)
        /******/
        var module = installedModules[moduleId] = {
            /******/
            i: moduleId,
            /******/
            l: false,
            /******/
            exports: {}
            /******/
        };
        /******/
        /******/ // Execute the module function
        /******/
        modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
        /******/
        /******/ // Flag the module as loaded
        /******/
        module.l = true;
        /******/
        /******/ // Return the exports of the module
        /******/
        return module.exports;
        /******/
    }
    /******/
    /******/
    /******/ // expose the modules object (__webpack_modules__)
    /******/
    __webpack_require__.m = modules;
    /******/
    /******/ // expose the module cache
    /******/
    __webpack_require__.c = installedModules;
    /******/
    /******/ // identity function for calling harmony imports with the correct context
    /******/
    __webpack_require__.i = function(value) { return value; };
    /******/
    /******/ // define getter function for harmony exports
    /******/
    __webpack_require__.d = function(exports, name, getter) {
        /******/
        if (!__webpack_require__.o(exports, name)) {
            /******/
            Object.defineProperty(exports, name, {
                /******/
                configurable: false,
                /******/
                enumerable: true,
                /******/
                get: getter
                    /******/
            });
            /******/
        }
        /******/
    };
    /******/
    /******/ // getDefaultExport function for compatibility with non-harmony modules
    /******/
    __webpack_require__.n = function(module) {
        /******/
        var getter = module && module.__esModule ?
            /******/
            function getDefault() { return module['default']; } :
            /******/
            function getModuleExports() { return module; };
        /******/
        __webpack_require__.d(getter, 'a', getter);
        /******/
        return getter;
        /******/
    };
    /******/
    /******/ // Object.prototype.hasOwnProperty.call
    /******/
    __webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
    /******/
    /******/ // __webpack_public_path__
    /******/
    __webpack_require__.p = "./";
    /******/
    /******/ // Load entry module and return exports
    /******/
    return __webpack_require__(__webpack_require__.s = 22);
    /******/
})
/************************************************************************/
/******/
({

    /***/
    0:
    /***/
        (function(module, exports) {

        module.exports = jQuery;

        /***/
    }),

    /***/
    1:
    /***/
        (function(module, exports, __webpack_require__) {

        var __WEBPACK_AMD_DEFINE_FACTORY__, __WEBPACK_AMD_DEFINE_RESULT__;
        /*!
         * JavaScript Cookie v2.1.4
         * https://github.com/js-cookie/js-cookie
         *
         * Copyright 2006, 2015 Klaus Hartl & Fagner Brack
         * Released under the MIT license
         */
        ;
        (function(factory) {
            var registeredInModuleLoader = false;
            if (true) {
                !(__WEBPACK_AMD_DEFINE_FACTORY__ = (factory),
                    __WEBPACK_AMD_DEFINE_RESULT__ = (typeof __WEBPACK_AMD_DEFINE_FACTORY__ === 'function' ?
                        (__WEBPACK_AMD_DEFINE_FACTORY__.call(exports, __webpack_require__, exports, module)) :
                        __WEBPACK_AMD_DEFINE_FACTORY__),
                    __WEBPACK_AMD_DEFINE_RESULT__ !== undefined && (module.exports = __WEBPACK_AMD_DEFINE_RESULT__));
                registeredInModuleLoader = true;
            }
            if (true) {
                module.exports = factory();
                registeredInModuleLoader = true;
            }
            if (!registeredInModuleLoader) {
                var OldCookies = window.Cookies;
                var api = window.Cookies = factory();
                api.noConflict = function() {
                    window.Cookies = OldCookies;
                    return api;
                };
            }
        }(function() {
            function extend() {
                var i = 0;
                var result = {};
                for (; i < arguments.length; i++) {
                    var attributes = arguments[i];
                    for (var key in attributes) {
                        result[key] = attributes[key];
                    }
                }
                return result;
            }

            function init(converter) {
                function api(key, value, attributes) {
                    var result;
                    if (typeof document === 'undefined') {
                        return;
                    }

                    // Write

                    if (arguments.length > 1) {
                        attributes = extend({
                            path: '/'
                        }, api.defaults, attributes);

                        if (typeof attributes.expires === 'number') {
                            var expires = new Date();
                            expires.setMilliseconds(expires.getMilliseconds() + attributes.expires * 864e+5);
                            attributes.expires = expires;
                        }

                        // We're using "expires" because "max-age" is not supported by IE
                        attributes.expires = attributes.expires ? attributes.expires.toUTCString() : '';

                        try {
                            result = JSON.stringify(value);
                            if (/^[\{\[]/.test(result)) {
                                value = result;
                            }
                        } catch (e) {}

                        if (!converter.write) {
                            value = encodeURIComponent(String(value))
                                .replace(/%(23|24|26|2B|3A|3C|3E|3D|2F|3F|40|5B|5D|5E|60|7B|7D|7C)/g, decodeURIComponent);
                        } else {
                            value = converter.write(value, key);
                        }

                        key = encodeURIComponent(String(key));
                        key = key.replace(/%(23|24|26|2B|5E|60|7C)/g, decodeURIComponent);
                        key = key.replace(/[\(\)]/g, escape);

                        var stringifiedAttributes = '';

                        for (var attributeName in attributes) {
                            if (!attributes[attributeName]) {
                                continue;
                            }
                            stringifiedAttributes += '; ' + attributeName;
                            if (attributes[attributeName] === true) {
                                continue;
                            }
                            stringifiedAttributes += '=' + attributes[attributeName];
                        }
                        return (document.cookie = key + '=' + value + stringifiedAttributes);
                    }

                    // Read

                    if (!key) {
                        result = {};
                    }

                    // To prevent the for loop in the first place assign an empty array
                    // in case there are no cookies at all. Also prevents odd result when
                    // calling "get()"
                    var cookies = document.cookie ? document.cookie.split('; ') : [];
                    var rdecode = /(%[0-9A-Z]{2})+/g;
                    var i = 0;

                    for (; i < cookies.length; i++) {
                        var parts = cookies[i].split('=');
                        var cookie = parts.slice(1).join('=');

                        if (cookie.charAt(0) === '"') {
                            cookie = cookie.slice(1, -1);
                        }

                        try {
                            var name = parts[0].replace(rdecode, decodeURIComponent);
                            cookie = converter.read ?
                                converter.read(cookie, name) : converter(cookie, name) ||
                                cookie.replace(rdecode, decodeURIComponent);

                            if (this.json) {
                                try {
                                    cookie = JSON.parse(cookie);
                                } catch (e) {}
                            }

                            if (key === name) {
                                result = cookie;
                                break;
                            }

                            if (!key) {
                                result[name] = cookie;
                            }
                        } catch (e) {}
                    }

                    return result;
                }

                api.set = api;
                api.get = function(key) {
                    return api.call(api, key);
                };
                api.getJSON = function() {
                    return api.apply({
                        json: true
                    }, [].slice.call(arguments));
                };
                api.defaults = {};

                api.remove = function(key, attributes) {
                    api(key, '', extend(attributes, {
                        expires: -1
                    }));
                };

                api.withConverter = init;

                return api;
            }

            return init(function() {});
        }));


        /***/
    }),

    /***/
    12:
    /***/
        (function(module, __webpack_exports__, __webpack_require__) {

        "use strict";
        /* WEBPACK VAR INJECTION */
        (function(jQuery, $) {
            Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
            /* harmony import */
            var __WEBPACK_IMPORTED_MODULE_0_js_cookie__ = __webpack_require__(1);
            /* harmony import */
            var __WEBPACK_IMPORTED_MODULE_0_js_cookie___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_js_cookie__);


            var store_map = null;
            var store_map_data = [];
            var store_map_info = null;
            var store_geocoder = null;
            var store_autocomplete = null;
            window.initMap = initMap;

            window._goToStore = function(storeID, StoreName, storeLink) {
                __WEBPACK_IMPORTED_MODULE_0_js_cookie___default.a.set('store', { name: StoreName, id: storeID, link: storeLink });
                location.href = storeLink;
            };

            function initMap() {
                var $doc = jQuery(document);
                var isChooseStorePage = $doc.find('#STORE-MAP').length;
                if (isChooseStorePage) {
                    storeLoadData(function(data) {
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
                $.ajax({
                    url: '../assets/plugins/map/store-list.json',


                    method: 'GET'
                }).then(function(res) {
                    console.log(res);
                    var regions = (res || {}) || [];
                    if (typeof callback === 'function') {
                        callback(regions);
                    }
                });

                // $.ajax({url: "store-list.json", success: function(result){
                //         $(".list-region").html(result);
                //     }});
            }

            function storeLoadMap(regions) {

                var position = {
                    lat: parseFloat(location[0]),
                    lng: parseFloat(location[1])
                };
                var vietnam = {
                    lat: 16.8472634,
                    lng: 101.2441985
                };
                store_map = new google.maps.Map(document.getElementById('STORE-MAP'), {
                    zoom: 1,
                    center: vietnam,
                    disableDefaultUI: true,
                    zoomControl: true,
                    scrollwheel: true,
                    mapTypeControl: false,
                    scaleControl: false,
                    streetViewControl: false,
                    rotateControl: false,
                    fullscreenControl: false
                });
                

                store_map_info = new google.maps.InfoWindow();

                storeMapGenHtml(regions);

                var datas = [];
                regions.forEach(function(region, index) {
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

            function storeMapMarker(regions) {
                
                var clusterStyles = [
                {
                    textColor: 'white',
                    url: '../assets/plugins/map/images/m1.png',
                    height: 53,
                    width: 52
                },
                {
                    textColor: 'white',
                    url: '../assets/plugins/map/images/m2.png',
                    height: 56,
                    width: 55
                },
                {
                    textColor: 'white',
                    url: '../assets/plugins/map/images/m3.png',
                    height: 66,
                    width: 65
                }
                ];   
                var mcOptions = {
                    gridSize: 50,
                    styles: clusterStyles,
                    maxZoom: 15
                };

                // Code Group Location
                var markers = regions.map(function(item, i) {

                    var location = convertToPosition(item.latlng);
                    if (location) {
                        var marker = new google.maps.Marker({
                            position: location,
                            icon: '../assets/plugins/map/images/marker-icon.png',
                            map: store_map
                        });
                        // console.log(item);
                        marker.addListener('click', function() {
                            console.log(this.getPosition());
                            var position = this.getPosition();                        
                            var pos = {
                                lat: position.lat(),
                                lng: position.lng()
                            };
                            storeMapShowInfo(pos);
                        });
                        store_map_data.push({
                            data: item,
                            marker: marker
                        });
                          
                    }            
                    return marker;   
                });
                var markerCluster = new MarkerClusterer(store_map, markers, mcOptions);
                    
                // Code None Group Location
                // regions.forEach(function(item) {
                //     var position = convertToPosition(item.latlng);
                //     // console.log(position);
                //     if (position) {
                //         var marker = new google.maps.Marker({
                //             position: position,
                //             icon: '../assets/plugins/map/images/marker-icon.png',
                //             map: store_map
                //         });

                //         marker.addListener('click', function() {
                //             var position = this.getPosition();
                //             console.log(position);
                //             var pos = {
                //                 lat: position.lat(),
                //                 lng: position.lng()
                //             };
                //             storeMapShowInfo(pos);
                //         });
                //         store_map_data.push({
                //             data: item,
                //             marker: marker
                //         });
                //     }
                // });


                setTimeout(function() {
                    if (typeof window.mapData != 'undefined') {
                        var currentStore = jQuery('.region-wrap .item > a[data-id=' + window.mapData + ']');
                        if (currentStore.size()) {
                            currentStore = currentStore.eq(0);
                            currentStore.click();
                            currentStore.parent().addClass('active');
                        }
                    }
                }, 1000);
            }             

            function storeMapGetInfo(data) {
                data = data || {};
                var image = data.image || '../assets/plugins/map/images/location-represent.jpg';
                var id = data.store_id || 0;
                var name = data.store_name || '';
                var phone = data.store_phone || '';
                var fax = data.store_fax || '';
                var mail = data.store_mail || '';
                var address = data.store_address || '';
                var url = data.url;

                return '<div class="store-map-info"><div class="inner"><div style="width:100%" class="store-photo"><img src="' + image + '" alt=""></div>                              <div class="store-name"><a href="javascript:;" onclick="_goToStore(\'' + id + '\', \'' + name + '\', \'' + url + '\');">' + name + '</a></div>                              <div class="store-address">' + address + '</div>                              <div class="store-phone"><span class="icon icon-phone"></span>' + phone + '</div>                              <div class="store-fax"><span class="icon icon-fax"></span>' + fax + '</div>                           </div>                           <div class="store-mail"><span class="icon icon-mail"></span><span>' + mail + '</span></div>                        </div>                        </div>';
            }

            function storeMapGenHtml(data) {
                // console.log(data)
                jQuery('.list-region .tab-navs').html('');
                jQuery('.list-region .tab-content').html('');
                var tab_navs = '';
                var tab_content = '';

                // console.log(text);
                data.forEach(function(region, index) {
                    var targets = ['north', 'center', 'south'];
                    var target = " ";
                    // for(var i = 0; i < targets.length; i++){
                    //     return targets[i]
                    // };
                    console.log(target);
                    var stores = region.stores || [];
                    var name = region.name;
                    var href = '#' + region.name
                    var store_html = '';
                    for (var i in stores) {
                        var store = stores[i] || {};
                        var childs = store.childs;
                        if (childs && childs.length) {
                            var child_html = '';
                            childs.forEach(function(child) {
                                child_html += '                    <li class="item">                        <a href="javascript:void(0)" data-id="' + child.store_id + '" data-location="' + child.latlng + '">' + child.store_name + '</a>                    </li>';
                            });
                            store_html += '                <li class="has-child">                    <a href="javascript:void(0)" class="title" data-role="head" data-location="' + store.latlng + '">' + store.name + '</a>                    <ul class="child">' + child_html + '</ul>                </li>';
                        } else {
                            store_html += '                <li class="item">                    <a href="javascript:void(0)" data-id="' + store.store_id + '" data-location="' + store.latlng + '">' + store.store_name + '</a>                </li>';
                        }
                    }
                    tab_navs += '            <li class="nav-item"><a class="region" href="' + href + '" data-toggle="tab">' + name + '</a></li>   ';
                    tab_content += '<ul class="list-store tab-pane fade" id="' + name + '">' + store_html + '</ul>'
                });
                // console.log(html);
                $('.list-region .tab-navs').each(function() {
                    $(this).html(tab_navs);
                });
                $('.list-region .tab-content').each(function() {
                    $(this).html(tab_content);
                });

                $('[href="#NORTH"]').text('Miền Bắc').parents('.nav-item').addClass('active');
                $('[href="#CENTER"]').text('Miền Trung');
                $('[href="#SOUTH"]').text('Miền Nam');
                $('#NORTH').addClass('in active');
                // $('.list-region > a.region').attr('href','target');

                addActive();

            }

            function addActive(){
                $('.list-region .tab-navs a').on('click', function(){
                    $('.list-region .tab-navs .nav-item').removeClass('active');
                    $(this).addClass('active');
                })
            }

            function storeMapGetCurrent(pos) {
                var foundIndex = store_map_data.findIndex(function(item) {
                    var position = item.marker.getPosition();
                    var lat = position.lat().toFixed(6);
                    var lng = position.lng().toFixed(6);
                    return pos.lat.toFixed(6) === lat && pos.lng.toFixed(6) === lng;
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

                this.directionsService = new google.maps.DirectionsService();
                this.directionsDisplay = new google.maps.DirectionsRenderer();
                this.directionsDisplay.setMap(map);
                var option = {
                    placeIdOnly: true,
                    componentRestrictions: {
                        country: 'vn'
                    }
                };
                var originAutocomplete = new google.maps.places.Autocomplete(originInput, option);
                this.setupPlaceChangedListener(originAutocomplete, 'ORIG');
                //var destinationAutocomplete = new google.maps.places.Autocomplete(destinationInput, option);
                //this.setupPlaceChangedListener(destinationAutocomplete, 'DEST');
            }

            AutocompleteDirectionsHandler.prototype.setupPlaceChangedListener = function(autocomplete, mode) {
                var me = this;
                autocomplete.bindTo('bounds', this.map);
                autocomplete.addListener('place_changed', function() {
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

            AutocompleteDirectionsHandler.prototype.route = function() {
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
                }, function(response, status) {
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

            $(document).on('click', '.list-region a[data-location]', function(event) {
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

            $(document).on('click', '.store-search .controls', function(event) {
                $(this).select();
            });

            $(document).on('click', '.store-search .button-travel-mode', function(event) {
                store_autocomplete.route();
            });

            $(document).on('click', '.region-wrap .toggle-button', function(event) {
                $('.region-wrap').toggleClass('hidden');
            });

            /* WEBPACK VAR INJECTION */
        }.call(__webpack_exports__, __webpack_require__(0), __webpack_require__(0)))

        /***/
    }),

    /***/
    22:
    /***/
        (function(module, exports, __webpack_require__) {

        module.exports = __webpack_require__(12);


        /***/
    })

    /******/
});
