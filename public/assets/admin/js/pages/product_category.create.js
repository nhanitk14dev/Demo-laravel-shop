jQuery(function ($) {
    var textarea1 = $("#en_description");
    var textarea2 = $("#vi_description");

    var textarea3 = $("#en_discover_content");
    var textarea4 = $("#vi_discover_content");

    var editor1 = ace.edit("ace_en_description");
    editor1.setTheme("ace/theme/monokai");
    editor1.getSession().setMode("ace/mode/html");
    editor1.getSession().on('change', function () {
        textarea1.val(editor1.getSession().getValue());
    });

    var editor2 = ace.edit("ace_vi_description");
    editor2.setTheme("ace/theme/monokai");
    editor2.session.setMode("ace/mode/html");
    editor2.getSession().on('change', function () {
        textarea2.val(editor2.getSession().getValue());
    });

    var editor3 = ace.edit("ace_en_discover_content");
    editor3.setTheme("ace/theme/monokai");
    editor3.session.setMode("ace/mode/html");
    editor3.getSession().on('change', function () {
        textarea3.val(editor3.getSession().getValue());
    });

    var editor4 = ace.edit("ace_vi_discover_content");
    editor4.setTheme("ace/theme/monokai");
    editor4.session.setMode("ace/mode/html");
    editor4.getSession().on('change', function () {
        textarea4.val(editor4.getSession().getValue());
    });

    for (let key in COMPOSER_LOCALES) {
        if(LOCALES_REQUIRE.indexOf(key) !== -1){
            validateRules[`${key}[name]`] = {required: true};
        }
    }

    $('#form-form').validate({
        ignore: "",
        rules: {
            category_id: {required: true},
            style: {
                required: function () {
                    if ($("input:radio[name='category_id']").is(":checked") && $("input:radio[name='category_id']:checked").val() == '0') {
                        return true;
                    }
                    return false;
                }
            },
            'en[name]': {
                required: true,
                minlength: 2
            },
            'vi[name]': {
                required: true,
                minlength: 2
            }
        },
        highlight: function (input) {
            $(input).closest('.tab-pane').addClass("tab-error");
            $(input).addClass("input-error");
            var tab_content= $(input).closest('form');
            if($(".active.tab-error label.error").length == 0){
                var _id = $(tab_content).find(".tab-error:not(.active)").attr("id");
                $('a[href="#' + _id + '"]').tab('show');
            }

            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).closest('.tab-pane').removeClass("tab-error");
            $(input).removeClass("input-error");

            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, input) {
            $(input).parents('.form-group').append(error);
        }
    });

    $("input:radio[name='category_id']").change(function (e) {
        var _this = $(this);

        if (_this.val() == '0') {
            $('select[name="style"]').prop("disabled", false);
        }
        else {
            $('select[name="style"]').val("");
            $('select[name="style"]').prop("disabled", true);
        }
    });

    var initLoad = {
        init: function init() {
            if ($("input:radio[name='category_id']").is(":checked") && $("input:radio[name='category_id']:checked").val() == '0') {
                $('select[name="style"]').prop("disabled", false);
            }
        }
    }

    initLoad.init();
});