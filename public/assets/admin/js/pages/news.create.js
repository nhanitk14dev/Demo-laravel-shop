jQuery(function ($) {
    $('#published_date').datepicker({
        autoclose: true,
        container: '#published_date-container'
    });
    
    var editor1 = CKEDITOR.replace('vi_content', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    var editor2 = CKEDITOR.replace('en_content', {
        filebrowserBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserUploadUrl : '/assets/plugins/filemanager/dialog.php?type=2&editor=ckeditor&fldr=',
        filebrowserImageBrowseUrl : '/assets/plugins/filemanager/dialog.php?type=1&editor=ckeditor&fldr='
    });

    $('#form-form').validate({
        focusInvalid: true,
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
        ignore: "",
        rules: {
            'category_id': {required: true},
            'vi[title]': {required: true},
            'en[title]': {required: true},
            'vi[description]': {required: true},
            'en[description]': {required: true}
        }
    });
});