var sortCategory = $('meta[name=linkSort]').attr('content');

jQuery(function ($) {
    //Sắp xếp hình ảnh
    var idSort = '.sortable-categories';

    $(idSort).sortable({
        placeholder: "list-group-item",
        helper: 'clone',
        sort: function (e, ui) {
            position = Number($(idSort + " > li:visible").index(ui.placeholder));
            if (position == 0) position = 0;
            else position = position + 1;
            $(ui.placeholder).html("<div class='tree-name'> " + position + " </div>");
        },
        update: function (event, ui) {
            var positions = "";
            $(idSort).children().each(function (i) {
                var li = $(this);
                positions += "" + li.attr("data-id") + '=' + i + '&';
            });
            var str_lenght = positions.length;
            str_lenght = str_lenght - 1;
            positions = positions.substring(0, str_lenght);
            $.ajax({
                type: "PUT",
                url: sortCategory,
                data: {positions: positions},
                success: function (data) {
                    console.log(positions);
                }
            });
        },
        start: function (event, ui) {
            ui.item.startPos = ui.item.index();
        },
        stop: function (event, ui) {
            console.log("Start position: " + ui.item.startPos);
            console.log("New position: " + ui.item.index());
        }
    });

    $(".sortable-categories").disableSelection();
});
