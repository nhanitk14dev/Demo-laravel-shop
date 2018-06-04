jQuery(function ($) {
    var textarea1 = $("#en_content");
    var textarea2 = $("#vi_content");
    var editor1 = ace.edit("ace_en_content");
    editor1.setTheme("ace/theme/monokai");
    editor1.getSession().setMode("ace/mode/html");
    editor1.getSession().on('change', function () {
        textarea1.val(editor1.getSession().getValue());
    });
    var editor2 = ace.edit("ace_vi_content");
    editor2.setTheme("ace/theme/monokai");
    editor2.session.setMode("ace/mode/html");
    editor2.getSession().on('change', function () {
        textarea2.val(editor2.getSession().getValue());
    });

    const sTxt1 = $('#search_news-1').html();
    const sTxt2 = $('#search_news-2').html();

    $('#page_news').multiSelect({
        selectableHeader: sTxt1,
        selectionHeader:  sTxt2,
        afterInit: function(ms){
            var that = this,
                $selectableSearch = that.$selectableUl.prev(),
                $selectionSearch = that.$selectionUl.prev(),
                selectableSearchString = '#'+that.$container.attr('id')+' .ms-elem-selectable:not(.ms-selected)',
                selectionSearchString = '#'+that.$container.attr('id')+' .ms-elem-selection.ms-selected';

            that.qs1 = $selectableSearch.quicksearch(selectableSearchString)
                .on('keydown', function(e){
                    if (e.which === 40){
                        that.$selectableUl.focus();
                        return false;
                    }
                });

            that.qs2 = $selectionSearch.quicksearch(selectionSearchString)
                .on('keydown', function(e){
                    if (e.which == 40){
                        that.$selectionUl.focus();
                        return false;
                    }
                });
        },
        afterSelect: function(){
            this.qs1.cache();
            this.qs2.cache();
        },
        afterDeselect: function(){
            this.qs1.cache();
            this.qs2.cache();
        }
    })

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