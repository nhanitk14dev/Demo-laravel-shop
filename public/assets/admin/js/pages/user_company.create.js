var MAX_NUM_SHARE = 0;

jQuery(function ($) {
    var linkCompanyInfo = $('meta[name=linkCompanyInfo]').attr('content');

    function initLoad() {
        MAX_NUM_SHARE = 0;
        var value = $('#company').val();
        if(value){
            // Get company info
            $.ajax({
                url: linkCompanyInfo,
                type: 'GET',
                data: {company_id: value}
            }).done(function (res) {
                var str = res.result.total_share || 0;
                MAX_NUM_SHARE = parseFloat(str);
                console.log('max', MAX_NUM_SHARE);
            });
        }
    }

    $('#user').select2({
        // placeholder: "---"
    });

    $('#company').select2({
        // placeholder: "---"
    });

    $('#date_of_investment').datepicker({
        autoclose: true,
        container: '#date_of_investment-container'
    });

    new Cleave('#date_of_investment', {
        date: true,
        delimiter: '-',
        datePattern: ['d', 'm', 'Y']
    });

    new Cleave('#number_of_share', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    new Cleave('#amount_of_investment', {
        numeral: true,
        numeralThousandsGroupStyle: 'thousand'
    });

    $('#company').change(function () {
        initLoad();
    });

    initLoad();
    
    $('#number_of_share').on('keyup change', function () {
        var str = $(this).val();
        str = str.replace(/,/g, '');
        console.log('str', str);
        $('#number_of_share_hidden').val(str);
    });

    $('#form-form').validate({
        ignore: "",
        rules: {
            "user_id": {
                required: true
            },
            'company_id': {
                required: true,
            },
            'number_of_share': {
                required: true,
            },
            'number_of_share_hidden': {
              max: function () {
                  if(MAX_NUM_SHARE){
                      return MAX_NUM_SHARE;
                  }
                  return 10000000000000;
              }  
            },
            'amount_of_investment': {
				required: true
            },
        },
        highlight: function (input) {
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.form-group').append(error);
        }
    });
    
    
});