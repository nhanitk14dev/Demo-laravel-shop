jQuery(function($) {
    $('#region').select2({
        placeholder: "---"
    });
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
        serverSide: false,
        searching: false,
        lengthMenu: [
            [10, 25, 50, 100, 200, -1],
            [10, 25, 50, 100, 200, "All"]
        ],
        pageLength: 50,
        ajax: {
            url: linkDatatable,
            data: function(d) {
                d.region = $('#region').val();
                d.category = $('#category').val();
                d.city = $('#city').val();
                d.branch = branch_id;
                // d.key_search = $('#key_search').val();
            }
        },
        columns: [
            { data: 'checkbox', name: 'id', orderable: false },
            { data: 'translations', name: 'translations.short_name', orderable: false },
            { data: 'categories_name', name: 'categories_name', orderable: false },
            { data: 'label_region', name: 'label_region', orderable: false }
        ]
    });

    _btn_submit.on('click', function(e) {
        _datatable.draw();
        e.preventDefault();
    });

    _btn_reset.on('click', function(e) {
        $("#key_search").val('');
        $("#city").val(null).trigger("change");
        $('#region').val(null).trigger("change");
        $('#category').val(null).trigger("change");
        setTimeout(function() {
            _datatable.draw();
        }, 800);
        e.preventDefault();
    });

    $('#datatable tbody').on('click', 'tr', function(e) {
        e.preventDefault();
        var data = _datatable.row(this).data();

        var checked = $('input#branch_' + data.id).prop('checked');
        if (checked == true) {
            //remove
            branch_id.splice($.inArray(data.id, branch_id), 1);
            $('input#branch_' + data.id).prop('checked', false);
        } else {
            //add
            branch_id.push(data.id);
            $('input#branch_' + data.id).prop('checked', true);
        }
        $('#arr_branch').val(branch_id);
        console.log(branch_id);
    });

    // _datatable.on('draw', function() {
    //     _datatable.rows().every(function() {
    //         var d = this.data();
    //         if ($.inArray(d.id, branch_id) !== -1) {
    //             $('input#branch_' + d.id).prop('checked', true);
    //         }
    //     });
    // });

});