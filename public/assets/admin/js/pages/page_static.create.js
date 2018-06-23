jQuery(function ($) {
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
        ignore: "",
        rules: {
            'en[title]': {
                required: true,
                minlength: 2
            },
            'vi[title]': {
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
});