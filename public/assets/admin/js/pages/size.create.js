jQuery(function ($) {
    $('#form-form').validate({
        rules: {
            "code": {
                required: true,
                minlength:6,
                maxlength:6
            },
            'name': {
                required: true
            },
            'size': {
                required: true
            }
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
});