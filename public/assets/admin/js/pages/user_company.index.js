var result = {
    data: {
        user: {},
        company: {},
    }
};
var vm = new Vue({
    el: '#vue',
    data: result,
});

jQuery(function ($) {
    var linkDatatable = $('meta[name=linkDatatable]').attr('content');
    var linkCompanyInfo = $('meta[name=linkCompanyInfo]').attr('content');

    var _table = $("#datatable");

    $('#company').select2();

    var _datatable;

    $('#company').change(function () {
        $('#datatable-body input[type=search]').val('').change();
        $('#total_amount_of_investment').val('');
        $('#charter_capital').val('');
        var value = $(this).val();
        if (value) {
            $('#load__page').show();
            $('#datatable-body').slideDown();
            if (_datatable) {
                _datatable.search('').draw();
            }
            else {
                _datatable = _table.DataTable({
                    processing: true,
                    serverSide: true,
                    lengthMenu: [[10, 25, 50, 100, 200, -1], [10, 25, 100, 200, "All"]],
                    pageLength: 25,
                    ajax: {
                        url: linkDatatable,
                        data: function (d) {
                            d.company = $('#company').val();
                        }
                    },
                    columns: [
                        // {data: 'id', name: 'id'},
                        {
                            data: 'no', render: function (data, type, row, meta) {
                            return meta.row + meta.settings._iDisplayStart + 1;
                        }, orderable: false, searchable: false
                        },
                        {data: 'user.avatar', name: 'user.avatar', orderable: false},
                        {data: 'user_city', name: 'user_city', orderable: false, searchable: false},
                        {data: 'user.name', name: 'user.name', orderable: false},
                        {data: 'number_of_share', name: 'number_of_share', orderable: false},
                        {data: 'amount_of_investment', name: 'amount_of_investment', orderable: false},
                        {data: 'date_of_investment', name: 'date_of_investment', orderable: false},
                        {data: 'percent', name: 'percent', orderable: false, searchable: false},
                        {data: 'value_share', name: 'value_share', orderable: false, searchable: false},
                        {data: 'action', name: 'action', orderable: false, searchable: false}
                    ],
                    language: {
                        url: '/assets/plugins/jquery-datatable/languages/vi.json'
                    },

                    "drawCallback": function( settings ) {
                        $('#load__page').fadeOut();
                    }
                });
            }

            // Get company info
            $.ajax({
                url: linkCompanyInfo,
                type: 'GET',
                data: {company_id: value}
            }).done(function (res) {
                $('#total_amount_of_investment').val(res.result.total_amount_of_investment);
                $('#charter_capital').val(res.result.charter_capital);
            });

        }
        else {
            $('#datatable-body').slideUp();
        }
    });

    $('body').on('click', '.btn-show-item', function () {
        var href = $(this).data('href');
        $('.page-loader-wrapper').show();
        $.get(href, function (res) {
        }).done(function (res) {
            vm.data = res.result;
            $('#show_modal').modal('show');
            $('.page-loader-wrapper').fadeOut();
        }).fail(function (res) {
            toastr['error'](res.statusText);
            $('.page-loader-wrapper').fadeOut();
        });
    });
});