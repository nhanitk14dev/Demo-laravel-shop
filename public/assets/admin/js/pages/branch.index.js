jQuery(function ($) {
    $('#category').select2({
        placeholder: "---"
    });
    $('#city').select2({
        placeholder: "---"
    });

    var linkDatatable = $('meta[name=linkDatatable]').attr('content');
    var _table = $("#datatable");
    var _btn_submit = $("#btn-submit");
    var _btn_reset = $("#btn-reset");

    var _datatable = _table.DataTable({
        processing: true,
        serverSide: true,
        searching: false,
        lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 100, 200, "All"]],
        pageLength: 10,
        ajax: {
            url: linkDatatable,
            data: function (d) {
                d.search = $('#search').val();
                d.category = $('#category').val();
                d.city = $('#city').val();
            }
        },
        columns: [
            {data: 'id', name: 'id'},
            {data: 'translations', name: 'translations.short_name', orderable: false},
            {data: 'categories_name', name: 'categories_name', orderable: false},
            {data: 'city', name: 'city', orderable: false},
            {data: 'email', name: 'email', orderable: false},
            {data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });

    _btn_submit.on('click', function (e) {
        _datatable.draw();
        e.preventDefault();
    });

    _btn_reset.on('click', function (e) {
        $("#search").val('');
        $("#city").val(null).trigger("change");
        $('#category').val(null).trigger("change");
        setTimeout(function () {
            _datatable.draw();
        }, 1000);
        e.preventDefault();
    });
});