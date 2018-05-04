jQuery(function ($) {
    $('#projects').select2({
        placeholder: "---"
    });

    $('#natures').select2({
        placeholder: "---"
    });

    $('#settings').select2({
        placeholder: "---"
    });

    $('#form-form').validate({
        focusInvalid: true,
        ignore: "",
        highlight: function (element) {
            $(element).closest('.tab-pane').addClass("tab-error");
            $(element).addClass("input-error");
            var tab_content = $(element).closest('form');
            if ($(".active.tab-error label.error").length == 0) {
                var _id = $(tab_content).find(".tab-error:not(.active)").attr("id");
                $('a[href="#' + _id + '"]').tab('show');
            }

            $(element).parents('.form-line').addClass('error');
        },
        unhighlight: function (element) {
            $(element).closest('.tab-pane').removeClass("tab-error");
            $(element).removeClass("input-error");

            $(element).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        rules: {
            'code': {minlength:3, maxlength:15},
            "category_id[]": { required: true },
            'weight': {number:true},
            'quantity_in': {number:true},
            'power': {number:true},
            'temperature': {number:true},
            'pressure': {number:true},
            'protective': {number:true},
            'performance': {number:true}
        }
    });
});