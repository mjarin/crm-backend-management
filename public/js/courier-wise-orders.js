
$(document).ready(function($){

 // ...........................................................................................................................................................

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

$(document).on('click','.btn-sundarban-order', function () {

  var sundarban_order_id =$(this).val();
  
      $.ajax({
        method: "GET",
        url: "edit_sundarban_order/"+sundarban_order_id,
        success: function (response) {
          // console.log(response);
          $('#Sundarban-order-id').val(response.SundarbanOrder.id);
          $('#sundarban_order_id').val(response.SundarbanOrder.id);
          $('span#SundarbanOrder_span_id').html(response.SundarbanOrder.code);
          $('#sundarban_advance_payment').val(response.SundarbanOrder.advance_payment);
          $('#sundarban_seller_coupon_discount').val(response.SundarbanOrder.coupon_discount);
          $('#sundarban_circle_remarks').val(response.SundarbanOrder.remarks);
          $('#sundarban_courier').val(response.SundarbanOrder.courier);
          $('#sundarban_order_note').val(response.SundarbanOrder.order_note);
          $('#sundarban_customer_delivery_charge').val(response.SundarbanOrder.customer_charge);
          $('#sundarban_circle_delivery_charge').val(response.SundarbanOrder.delivery_charge);
          $('#sundarban_delivery_man').val(response.SundarbanOrder.delivery_man);
          $('#sundarban_delivery_date').val(response.SundarbanOrder.delivery_date);
          $('#sundarban_collected_amount').val(response.SundarbanOrder.collected_price);
          $('#sundarban_reasons').val(response.SundarbanOrder.reasons);
          $('#sundarban_payment_status').val(response.SundarbanOrder.payment_status);
          
        }
      });
      
    });


    
$(document).on('click','.edit-btn-sundarbanOrderDeatails', function () {

var sundarban_order_details_id =$(this).val();


    $.ajax({
      method: "GET",
      url: "/details-sundarbanOrder-edit/"+sundarban_order_details_id,
      success: function (response) {
        // console.log(response);
        $('#sundarbanOrderDetails_id').val(response.SundarbanOrderDetails.order_id);
        $('#sundarban_circle_price').val(response.SundarbanOrderDetails.circle_price);
        $('#sundarban_selling_price').val(response.SundarbanOrderDetails.selling_price);
        $('#sundarban_quantity').val(response.SundarbanOrderDetails.quantity);
        $('#sundarban_variation').val(response.SundarbanOrderDetails.variation);
        
      }
    });
    
  });



  $(document).on('click','.returned-sundarban-order-btn',function () {
    var sundarban_order_returned_id =$(this).val();
  
  
    $.ajax({
        method: "GET",
        url: "/sundarban-returned-order-edit/"+sundarban_order_returned_id,  
        success: function (response) {
          // console.log(response);
          $('#sundarban_returned_order_id').val(response.SundarbanOrderReturned.id);
          $('h2#sundarban_returnedOrder').html(response.SundarbanOrderReturned.id);   
        }
    });
  });


  $(document).on('click','.btn-sundarban',function () {
    var id_value =$(this).val();
    
    // alert(id_value);

    $.ajax({
      method: "GET",
      url: "/shundarban-order-get-id/"+id_value,  
      success: function (response) {
          console.log(response);
          $('#hidden_input_id').val(response.SundarbanOrderId.id);          
      }
    });
  });        


// JANANi Courier Js...................................................................................................

  $(document).on('click','.btn-janani-order',function () {
    var janani_order_id =$(this).val();
  
  
    $.ajax({
        method: "GET",
        url: "/janani-order-edit/"+janani_order_id,  
        success: function (response) {
          console.log(response);

          $('#jananiOrder-id').val(response.jananiOrder.id);
          $('#janani_order_id').val(response.jananiOrder.id);
          $('span#jananiOrder_span_id').html(response.jananiOrder.code);
          $('#janani_advance_payment').val(response.jananiOrder.advance_payment);
          $('#janani_seller_coupon_discount').val(response.jananiOrder.coupon_discount);
          $('#janani_circle_remarks').val(response.jananiOrder.remarks);
          $('#janani_courier').val(response.jananiOrder.courier);
          $('#janani_order_note').val(response.jananiOrder.order_note);
          $('#janani_customer_delivery_charge').val(response.jananiOrder.customer_charge);
          $('#janani_circle_delivery_charge').val(response.jananiOrder.delivery_charge);
          $('#janani_delivery_man').val(response.jananiOrder.delivery_man);
          $('#janani_delivery_date').val(response.jananiOrder.delivery_date);
          $('#janani_collected_amount').val(response.jananiOrder.collected_price);
          $('#janani_reasons').val(response.jananiOrder.reasons);
          $('#janani_payment_status').val(response.jananiOrder.payment_status);

        }
    });
  });


  $(document).on('click','.edit-btn-jananiOrderDeatails', function () {

    var janani_order_details_id =$(this).val();
    
      // alert(sundarban_order_details_id);
        $.ajax({
          method: "GET",
          url: "/jananiOrder-deatails-edit/"+janani_order_details_id,
          success: function (response) {
            // console.log(response);
            $('#jananiOrderDetails_id').val(response.jananiOrderDetails.order_id);
            $('#janani_circle_price').val(response.jananiOrderDetails.circle_price);
            $('#janani_selling_price').val(response.jananiOrderDetails.selling_price);
            $('#janani_quantity').val(response.jananiOrderDetails.quantity);
            $('#janani_variation').val(response.jananiOrderDetails.variation);
            
          }
        });
        
      });


      $(document).on('click','.returned-janani-order-btn',function () {
        var janani_order_returned_id =$(this).val();
      
      // alert(janani_order_returned_id)
        $.ajax({
            method: "GET",
            url: "/janani-returned-order-edit/"+janani_order_returned_id,  
            success: function (response) {
              // console.log(response);
              $('#janani_returned_order_id').val(response.JananiOrderReturned.id);
              $('h2#janani_returnedOrder').html(response.JananiOrderReturned.id);   
            }
        });
      });

      $(document).on('click','.janani-puchase-status-btn',function () {
        var id =$(this).val();

        // alert(id);
      
        $.ajax({
            method: "GET",
            url: "/janani-purchase-status-edit/"+id,  
            success: function (response) {
              console.log(response);
              $('#janani-order-id').val(response.jananiPurchaseStatus.id);
            }
        });
      });
           

// SA-Paribahan Courier Js...................................................................................................
      $(document).on('click','.btn-sa-paribahan-order', function () {

        var sa_paribahan_order_id =$(this).val();
        
            $.ajax({
              method: "GET",
              url: "/edit-sa-paribahan-order/"+sa_paribahan_order_id,
              success: function (response) {
                // console.log(response);
                $('#sa-paribahan-order-id').val(response.SAparibahanOrder.id);
                $('#sa_paribahan_order_id').val(response.SAparibahanOrder.id);
                $('span#sa_paribahanOrder_span_id').html(response.SAparibahanOrder.code);
                $('#sa_paribahan_advance_payment').val(response.SAparibahanOrder.advance_payment);
                $('#sa_paribahan_seller_coupon_discount').val(response.SAparibahanOrder.coupon_discount);
                $('#sa_paribahan_circle_remarks').val(response.SAparibahanOrder.remarks);
                $('#sa_paribahan_courier').val(response.SAparibahanOrder.courier);
                $('#sa_paribahan_order_note').val(response.SAparibahanOrder.order_note);
                $('#sa_paribahan_customer_delivery_charge').val(response.SAparibahanOrder.customer_charge);
                $('#sa_paribahan_circle_delivery_charge').val(response.SAparibahanOrder.delivery_charge);
                $('#sa_paribahan_delivery_man').val(response.SAparibahanOrder.delivery_man);
                $('#sa_paribahan_delivery_date').val(response.SAparibahanOrder.delivery_date);
                $('#sa_paribahan_collected_amount').val(response.SAparibahanOrder.collected_price);
                $('#sa_paribahan_reasons').val(response.SAparibahanOrder.reasons);
                $('#sa_paribahan_payment_status').val(response.SAparibahanOrder.payment_status); 
                $('#sa_paribahan_courier').val(response.SAparibahanOrder.courier); 
                
                
              }
            });
          }); 

          $(document).on('click','.edit-btn-SAparibahanOrderDeatails', function () {

            var sundarban_order_details_id =$(this).val();
            
            
                $.ajax({
                  method: "GET",
                  url: "/edit-sa-paribahan-order-details/"+sundarban_order_details_id,
                  success: function (response) {
                    // console.log(response);
                    $('#sa_paribahan_hidden_id').val(response.SAparibahanOrderDetails.order_id);
                    $('#sa_paribahan_circle_price').val(response.SAparibahanOrderDetails.circle_price);
                    $('#sa_paribahan_selling_price').val(response.SAparibahanOrderDetails.selling_price);
                    $('#sa_paribahan_quantity').val(response.SAparibahanOrderDetails.quantity);
                    $('#sa_paribahan_variation').val(response.SAparibahanOrderDetails.variation);
                    
                  }
                });
                
              });


              $(document).on('click','.returned-sa-paribahan-order-btn',function () {
                var sa_paribahan_order_returned_id =$(this).val();
              
              
                $.ajax({
                    method: "GET",
                    url: "/sa-paribahan-returned-order-edit/"+sa_paribahan_order_returned_id,  
                    success: function (response) {
                      // console.log(response);
                      $('#sa_paribahan_returned_order_id').val(response.SAparibahanReturned.id);
                      $('h2#sa_paribahan_returnedOrder').html(response.SAparibahanReturned.id);   
                    }
                });
              });

              $(document).on('click','.sa-paribahan-puchase-status-btn',function () {
                var id =$(this).val();
              
              
                $.ajax({
                    method: "GET",
                    url: "/sa-paribahan-puchase-status-edit/"+id,  
                    success: function (response) {
                      console.log(response);
                      $('#sa-paribahan-order-id').val(response.PurchaseStatusSAP.id); 
                    }
                });
              });



         

// End of this doc.......................................
  });