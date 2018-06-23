jQuery(function ($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');

    var _table = $("#datatable");

    _table.DataTable({
        processing: true,
        serverSide: true,
        lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        searching: true,
        ajax: {
            url: linkDatatable,
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'name', name: 'name'},
            {data: 'image', name: 'image', searchable: false},
            // {data: 'file_name', name: 'file_name'},
            {data: 'file_size', name: 'file_size'},
            // {data: 'type', name: 'type'},
            {data: 'action', name: 'action',orderable: false, searchable: false}
        ]
    });

    // add user to list email
    $('body').on('click', '.btn-add-media-to-list', function () {
        var type = $(this).data('type');
        var tr = $(this).closest('tr');
        if (type === 'company_user') {
            var row = company_user.row(tr);
            if (!(row.data().user_id in ve.users)) {
                Vue.set(ve.users, row.data().user_id, {
                    id: row.data().user_id,
                    name: row.data().user.name,
                    phone: row.data().user.phone,
                    email: null
                });
            }
        }
        else {
            var row = list_user.row(tr);
            if(!checkPhoneNumber(row.data().phone)){
                toastr['error']('Số điện thoại không hợp lệ');
                return false
            }
            else{
                if (!(row.data().id in ve.users)) {
                    Vue.set(ve.users, row.data().id, {
                        id: row.data().id,
                        name: row.data().name,
                        phone: row.data().phone,
                        email: null
                    });
                }
            }
        }
    });

});