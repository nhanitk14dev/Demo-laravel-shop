jQuery(function ($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200,-1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'translations.name', orderable: false},
            {data: 'year', name: 'year', orderable: false},
            {data: 'area', name: 'area', orderable: false},
            {data: 'address', name: 'address', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});