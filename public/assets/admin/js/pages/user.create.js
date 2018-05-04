jQuery(function ($) {
    $('#role').select2({
        placeholder: "---"
    });

    $('#form-form').validate({
        ignore: "",
        rules: {
            "role[]": {
                required: true
            },
            'name': {
                required: true,
                minlength: 2
            },
            'email': {
                required: true,
                email: true
            },
            'password': {
                required: true,
                phone: true
            },
            'phone': {
                required: true,
                phone: true
            },
            'address': {
                required: true,
                phone: true
            },
        },
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
        }
    });
});