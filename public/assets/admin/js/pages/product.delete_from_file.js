jQuery(function ($) {
    $('#import_file').change(function (e) {
        if ($(this).val()) {
            var fileName = e.target.files[0].name;
            var arr = fileName.split('.');
            var ext = arr[arr.length - 1];
            if(ext == 'xlsx' || ext == 'xls'){
                $('#import_file_name').html(fileName);
            }
            else{
                $('#import_file_name').html('');
                toastr['warning']('Vui lòng tải lên tập tin MS Excel.');
                $(this).val(null)
                return false;
            }
        }
        else {
            $('#import_file_name').html('');
        }
    });

    $('#form-form').validate({
        ignore: "",
        rules: {
            'import_file': { required: true }
        },
        highlight: function (input) {
            $(input).parents('.import_file').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.import_file').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.import_file').append(error);
        }
    });
});