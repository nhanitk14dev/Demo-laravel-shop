jQuery(function ($) {
    $('#category').select2({
        placeholder: "---"
    });

    $('#city').select2({
        placeholder: "---"
    });

    $('.datepicker').datepicker({
        autoclose: true
    });


    var editor1 = CKEDITOR.replace('vi_description', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    var editor2 = CKEDITOR.replace('en_description', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    var editor3 = CKEDITOR.replace('vi_requirement', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    var editor4 = CKEDITOR.replace('en_requirement', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    var editor5 = CKEDITOR.replace('vi_profile', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    var editor6 = CKEDITOR.replace('en_profile', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    var editor7 = CKEDITOR.replace('vi_benefit', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    var editor8 = CKEDITOR.replace('en_benefit', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    $('#form-form').validate({
        focusInvalid: true,
        ignore: "",
        highlight: function(element) {
            $(element).closest('.tab-pane').addClass("tab-error");
            $(element).addClass("input-error");
            var tab_content= $(element).closest('form');
            if($(".active.tab-error label.error").length == 0){
                var _id = $(tab_content).find(".tab-error:not(.active)").attr("id");
                $('a[href="#' + _id + '"]').tab('show');
            }

            $(element).parents('.form-line').addClass('error');
        },
        unhighlight: function(element) {
            $(element).closest('.tab-pane').removeClass("tab-error");
            $(element).removeClass("input-error");

            $(element).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        },
        rules: {
            'category[]': {required: true},
            'city[]': {required: true},
            'vacancy': {required: true, number: true, min:1},
            'expired_date': {required: true},
            'type': {required: true},
            'status': {required: true},
            'vi[name]': {required: true},
            'en[name]': {required: true}
        }
    });
});