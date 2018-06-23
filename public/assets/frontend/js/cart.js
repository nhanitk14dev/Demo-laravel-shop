jQuery(document).ready(function($) {
      $('#update_cart').click(function(){

      	 	var qty = $('#product-quantity').val();

          var rowId = $(this).attr('data-rowId');

          var token = $("input[name='_token']").val();

        //  var url = $(this).attr('data-url');

              $.ajax({
            		 		url: 'cap-nhat-gio/'+rowId,
            		 		type: 'GET',
            		 		data: { "_token":token, "id":rowId, "qty":qty},
                    cache: false,
            		 		success: function(data){
            		 			if (data = "ok") {
            		 				window.location = "gio-hang"
            		 			}else{
                        console.log('fail');
                      }

      		 		      }
      		 	   });


	    });
});
