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
            {data: 'category', name: 'category', orderable: false, searchable: false},
            {data: 'name', name: 'name', orderable: false},
            {data: 'expired_date', expired_date: 'name', orderable: false},
            {data: 'type', name: 'type', orderable: false},
            {data: 'status', name: 'status', orderable: false},
            {data: 'num_of_application', name: 'num_of_application', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
});