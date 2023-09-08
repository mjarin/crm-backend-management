$(document).ready(function($){
  loadProduct();
  
  
  $(document).on('click','.edit-btn-delivery-man',function () {
    var delivery_man_id =$(this).val();


    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      });
  
  
    $.ajax({
        method: "GET",
        url: "/delivery-man-edit/"+delivery_man_id,  
        success: function (response) {
          console.log(response);
        $('#deliveryMan_id').val(response.deliveryMan.id);  
          $('#delivery_man_id').val(response.deliveryMan.man_id);
          $('#delivery_man_name').val(response.deliveryMan.name); 
          $('#delivery_man_phone').val(response.deliveryMan.phone);  
 
        }
    });
  });


  // $(document).on('click','.btn-delivery-report',function () {
  //   var delivery_man_id =$(this).val();


  //   $.ajaxSetup({
  //       headers: {
  //           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //       }
  //     });
  
  
  //   $.ajax({
  //       method: "GET",
  //       url: "/delivery-man-edit/"+delivery_man_id,  
  //       success: function (response) {
  //         console.log(response);
  //       $('#deliveryMan_id').val(response.deliveryMan.id);  
  //         $('#delivery_man_id').val(response.deliveryMan.man_id);
  //         $('#delivery_man_name').val(response.deliveryMan.name); 
  //         $('#delivery_man_phone').val(response.deliveryMan.phone);  
 
  //       }
  //   });
  // });




  // STOCk Alert............................................

  $(document).on('click','.edit-stock-btn',function () {
    var product_id =$(this).val();

    // alert(product_id)


    $.ajaxSetup({
      headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
      }
    });
  
    $.ajax({
        method: "GET",
        url: "/edit-product-stock/"+ product_id,  
        success: function (response) {
          console.log(response);
          $('#product_id').val(response.productInfo.id); 
          $('#product_name').val(response.productInfo.product_name);  
          $('#product_variant').val(response.productInfo.variations);
          $('#product_current_stock').val(response.productInfo.current_stock); 
 
        }
    });
  });


     //Count Low Stock Products ........................................

     function loadProduct(){
      $.ajax({
          method: "GET",
          url: "/count_low_product_stock",
          success: function (response){
            $('.stock-count').html('');
              $('.stock-count').html(response.low_stock_prod_count);
              // console.log(response.count);
              
          }
      });
  }

  // seller advance payment.............................................................................................

  // $(document).on('click','.seller-advance-payment',function () {
  //   var product_id =$(this).val();

  //   // alert(product_id)


  //   $.ajaxSetup({
  //     headers: {
  //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  //     }
  //   });
  
  //   $.ajax({
  //       method: "GET",
  //       url: "/edit-product-stock/"+ product_id,  
  //       success: function (response) {
  //         console.log(response);
  //         $('#product_id').val(response.productInfo.id); 
  //         $('#product_name').val(response.productInfo.product_name);  
  //         $('#product_variant').val(response.productInfo.variations);
  //         $('#product_current_stock').val(response.productInfo.current_stock); 
 
  //       }
  //   });
  // });




// End of document
});




  