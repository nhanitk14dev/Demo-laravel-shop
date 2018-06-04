jQuery(function ($) {
    var MEDIA_PARENT_APPEND;
    var MEDIA_NAME_APPEND;
    var TABLE_MEDIA;

    var linkDatatableMedias = $('meta[name=linkDatatableMedias]').attr('content');

    $('body').on('click', '.btn_show_medias', function (event) {
        event.preventDefault();
        MEDIA_NAME_APPEND = $(this).data('name');
        MEDIA_PARENT_APPEND = $(this).data('append');
        $('#modal_list_medias').modal('show');

        if (TABLE_MEDIA) {
            TABLE_MEDIA.search('').draw();
        }
        else {
            TABLE_MEDIA = $('#list_medias').DataTable({
                processing: true,
                serverSide: true,
                lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 100, 200, "All"]],
                pageLength: 10,
                searching: true,
                ajax: {
                    url: linkDatatableMedias,
                },
                columns: [
                    {data: 'id', name: 'id'},
                    {data: 'name', name: 'name'},
                    {data: 'image', name: 'image', searchable: false},
                    {data: 'file_size', name: 'file_size'},
                    {data: 'action', name: 'action', orderable: false, searchable: false}
                ],
            });
        }
    });

    $('body').on('click', '.add-this-media', function () {
        var template = $('#photos-template').html();
        var _this = $(this);
        var media_path = _this.data('path');
        var media_id = _this.data('id');

        template = template.replace('IMAGE_BASE64', media_path).replace('INPUT_NAME', MEDIA_NAME_APPEND).replace('INPUT_VALUE', media_id);

        $(MEDIA_PARENT_APPEND).append(template);

        // Sau khi them thì ko cho nó add nữa
        _this.attr('disabled', "");
        return false;
    });
});