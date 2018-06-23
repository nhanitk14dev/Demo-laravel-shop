jQuery(function ($) {
    $('#form-form').validate({
        rules: {
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