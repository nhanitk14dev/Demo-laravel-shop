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
            { data: 'name', name: 'name', orderable: false },
            { data: 'email', name: 'email', orderable: false },
            { data: 'phone', name: 'phone', orderable: false },
            // { data: 'occupation', name: 'occupation', orderable: false },
            // { data: 'company', name: 'company', orderable: false },
            // { data: 'address', name: 'address', orderable: false },
            // { data: 'message', name: 'message', orderable: false },
            { data: 'created_at', name: 'created_at' },
            { data: 'action', name: 'action', orderable: false, searchable: false }
        ]
    });
});