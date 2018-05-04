function hexToRgb(hexCode) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgb(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + ")";
    return rgb;
}

function hexToRgba(hexCode, opacity) {
    var patt = /^#([\da-fA-F]{2})([\da-fA-F]{2})([\da-fA-F]{2})$/;
    var matches = patt.exec(hexCode);
    var rgb = "rgba(" + parseInt(matches[1], 16) + "," + parseInt(matches[2], 16) + "," + parseInt(matches[3], 16) + "," + opacity + ")";
    return rgb;
}

function googleAutoComplete(output, callback) {
    var input = document.getElementById(output['elementId']);
    var autocomplete = new google.maps.places.Autocomplete(input);

    if (typeof output['options'] != 'undefined' && output['options']) {
        autocomplete.setComponentRestrictions(output['options']);
    }
    else {
        var autocomplete = new google.maps.places.Autocomplete(input);
    }
    google.maps.event.addListener(autocomplete, 'place_changed', function () {
        var place = autocomplete.getPlace();
        setTimeout(function () {
            fillInAddress(place, callback)
        }, 300);
    });
}

function fillInAddress(place, callback) {
    var data = {
        street_number: null, //Sô nhà
        route: null, //Đường
        sublocality_level_1: null, //Phường
        locality: null, //Đia bàn
        administrative_area_level_2: null,//Quận
        post_code: null,
        administrative_area_level_1: null, //Thanh pho
        country: null, //Nuoc
        lat: null,
        lng: null,
        address: null,
        zoom: 6
    };
    if (typeof place.geometry != "undefined") {

        data.lat = place.geometry.location.lat();
        data.lng = place.geometry.location.lng();
        data.address = place.formatted_address;

        var fill = [
            'street_number',
            'route',
            "locality",
            'sublocality_level_1',
            'administrative_area_level_2',
            'administrative_area_level_1',
            'post_code',
            'country'
        ];
        var address_components = place.address_components;

        for (var i = 0; i < address_components.length; i++) {
            if (
                typeof address_components[i]['types'][0] != 'undefined'
                && typeof data[address_components[i]['types'][0]] != 'undefined'
                && fill.indexOf[address_components[i]['types'][0]] != -1
            ) {
                data[address_components[i]['types'][0]] = address_components[i]['long_name'];
            }
        }

        if (data.country) {
            data.zoom = 5;
        }
        if (data.administrative_area_level_1) {
            data.zoom = 10;
        }
        if (data.locality || data.administrative_area_level_2) {
            data.zoom = 11;
        }
        if (data.sublocality_level_1) {
            data.zoom = 12;
        }
        if (data.route) {
            data.zoom = 13;
        }
        if (data.street_number) {
            data.zoom = 14;
        }
    }
    if (typeof callback === "function") {
        setTimeout(function () {
            callback(data);
        }, 200);
    }
    return data;
}

/**
 * Get location from json google
 * @param url
 * @param callback
 */
function getJsonLocationFromGoogle(url, callback) {
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            callback(JSON.parse(this.responseText));
        }
    };
    xhttp.open("GET", url, true);
    xhttp.send();
}


function allowType(types, type) {
    types = types.split("|");
    var result = new Array();
    if (types.indexOf(type) == -1) {
        var str = 'Support file type: ' + types.join(", ");
        result[0] = false;
        result[1] = str;
        return result;
    } else {
        result[0] = true;
        result[1] = 'success';
        return result;
    }
}

// Size type: KB
function allowSize(max_size, size) {
    max_size = parseInt(max_size);
    var result = new Array();
    if (size > max_size) {
        var str = 'The file size must less than ' + Math.round(max_size) + ' KB';
        result[0] = false;
        result[1] = str;
        return result;
    } else {
        result[0] = true;
        result[1] = 'success';
        return result;
    }
}

//Ham doc file image
function encodeImageFileAsURL(file, option) {
    var reader = new FileReader();
    reader.onloadend = function () {
        setTimeout(function () {
            if (typeof  window[option.callback] === "function") {
                window[option.callback](reader.result, option);
            }
            else {
                console.log("Can not call callback function!");
            }
        }, 200);
    }
    reader.readAsDataURL(file);
}

function callbackHandlePhoto(file, option) {
    var theme = $(option.template).html();
    theme = theme.replace("IMAGE_BASE64", file)
        .replace("INPUT_NAME", option.name)
        .replace("INPUT_VALUE", file);

    $(option.append).find(".out-image").remove();
    $(option.append).prepend(theme);
    $(option.append).find(".box-upload").hide();
}

function callbackHandlePhotos(value, option) {
    var theme = $(option.template).html();
    theme = theme.replace("IMAGE_BASE64", value)
        .replace("INPUT_NAME", option.name)
        .replace("INPUT_VALUE", value);

    $(option.append).append(theme);
    return false;
}

function checkPhoneNumber(phone) {
    if (!phone || (phone && (phone.length < 10 || phone.length >11 ))) {
        return false;
    }
    var flag = false;
    phone = phone.replace('(+84)', '0');
    phone = phone.replace('+84', '0');
    phone = phone.replace('0084', '0');
    phone = phone.replace(/ /g, '');
    var firstNumber = phone.substring(0, 2);
    if ((firstNumber == '09' || firstNumber == '08') && phone.length == 10) {
        if (phone.match(/^\d{10}/)) {
            flag = true;
        }
    } else if (firstNumber == '01' && phone.length == 11) {
        if (phone.match(/^\d{11}/)) {
            flag = true;
        }
    }
    return flag;
}

jQuery(function ($) {
    $("body").on("keypress keydown", ".noEnterSubmit", function (event) {
        if (event.which == 13) {
            event.preventDefault();
            event.stopPropagation();
            return false;
        }
    });

    $("body").on("change", ".input-position", function (e) {
        e.preventDefault();
        var _this = $(this);
        var href = _this.data("href");
        var position = _this.val();
        var data = {
            position: position
        };
        $.ajax({
            data: data,
            type: "PUT",
            url: href,
            beforeSend: function () {
                _this.prop("readonly", true);
            }
        }).done(function () {
            _this.prop("readonly", false);
            _this.closest(".sort-position").find(".icon-ok").removeClass("hidden");
        });
    });

    $("body").on("change", ".dz_select_photos", function (event) {
        event.stopPropagation();
        event.preventDefault();

        var _this = $(this);
        var files = event.target.files;
        var append = _this.data("append");
        var name = _this.data("name");
        var template = _this.data("template");
        var callback = _this.data("callback");

        // Create a formdata object and add the files
        $.each(files, function (key, value) {
            var random = Math.random().toString(36).slice(2);
            var size = value.size;
            size = size ? size / 1024 : 0; // Convert to KB
            var type = value.type;
            //Check size
            var check = allowSize(MAX_IMAGE_UPLOAD_SIZE, size);
            if (!check[0]) {
                _this.val(null);
                toastr["warning"](check[1]);
                return false;
            }
            //Check extensions
            var ext = type.replace(/image\//g, "").toLowerCase();

            check = allowType(IMAGE_TYPE_ACCEPT, ext);
            if (!check[0]) {
                _this.val(null);
                toastr["warning"](check[1]);
                return false;
            }
            var option = {
                random: random,
                name: name,
                append: append,
                template: template,
                callback: callback
            };
            encodeImageFileAsURL(value, option);
        });
        _this.val(null);
        return false;
    });

    $("body").on("click", ".btn_delete_this", function (event) {
        event.stopPropagation();
        event.preventDefault();
        var _this = $(this);
        var name = _this.data("name");
        var value = _this.data("value");
        var parent = _this.data("parent");
        var multi = _this.data("multi");

        if (name && value) {
            _this.closest("form").append("<input type='hidden' name=" + name + " value='" + value + "'>");
        }
        if (!multi) {
            var _parent = _this.closest(parent);
            var _closest = _parent.find(".out-image");
            _closest.animate({
                opacity: 0,
            }, 300, function () {
                _closest.remove();
                _parent.find(".box-upload").show();
            });
        }
        else {
            var _closest = _this.closest(parent);
            _closest.animate({
                opacity: 0,
            }, 300, function () {
                _closest.remove();
            });
        }
        return false;
    });

    $("body").on("change", ".basic_upload_file", function (event) {
        event.stopPropagation();
        event.preventDefault();
        var accept_type = $(this).attr("accept_type");
        var name = this.files && this.files.length ? this.files[0].name : '';
        var size = name ? parseFloat(this.files[0].size / 1024) : null; // Convert to KB

        // Check size upload
        if (size) {
            if (accept_type == "image") {
                var check = allowSize(MAX_IMAGE_UPLOAD_SIZE, size);
                if (!check[0]) {
                    $(this).val(null);
                    toastr["warning"](check[1]);
                    return false;
                }
            }
            else if (accept_type == "file") {
                var check = allowSize(MAX_FILE_UPLOAD_SIZE, size);
                if (!check[0]) {
                    $(this).val(null);
                    toastr["warning"](check[1]);
                    return false;
                }
            }
        }
        if (name) {
            name = name + "(" + size.toFixed(2) + " KB)";
        }
        $(this).closest('.wrap-input-file').find('.upload-file-info').html(name);
    })

    $('body').on('change', '.checkbox-tick-all', function (event) {
        event.stopPropagation();
        event.preventDefault();
        var _this = $(this);
        var parent = _this.data('parent');
        var _parent = _this.closest(parent);
        if (_this.is(':checked')) {
            _parent.find('input[type=checkbox]').prop('checked', true);
        }
        else {
            _parent.find('input[type=checkbox]').prop('checked', false);
        }
    });
});