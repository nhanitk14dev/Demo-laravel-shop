jQuery(function($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 100, 200, "All"]
        ],
        pageLength: 10,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            { data: 'id', name: 'id' },
            { data: 'product.code', name: 'product.code', orderable: false },
            { data: 'name', name: 'name', orderable: false },
            { data: 'email', name: 'email', orderable: false },
            { data: 'rating', name: 'rating', orderable: false },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});