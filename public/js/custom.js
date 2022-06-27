
// For DataTable...........................................................................

$(document).ready( function () {
    // DAtatable................
  $('.data_table').DataTable({
    // "scrollX": true,
    "scrollY": true
  });

// jquery For  Pending Order ......................................................................................
  $(document).on('click','.edit-btn', function () {

var order_id =$(this).val();

$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

    $.ajax({
      method: "GET",
      url: "/edit_pending_order/"+ order_id,
      success: function (response) {
        // console.log(response);
        $('#order_code').val(response.pendingOrder.id);
        $('span#ordercode').html(response.pendingOrder.code);
        $('#advance_payment').val(response.pendingOrder.advance_payment);
        $('#seller_coupon_discount').val(response.pendingOrder.coupon_discount);
        $('#circle_remarks').val(response.pendingOrder.remarks);
        $('#order_note').val(response.pendingOrder.order_note);
        $('#customer_delivery_charge').val(response.pendingOrder.customer_charge);
        $('#circle_delivery_charge').val(response.pendingOrder.delivery_charge);
        $('#delivery_man').val(response.pendingOrder.delivery_man);
        $('#delivery_date').val(response.pendingOrder.delivery_date);
        $('#collected_amount').val(response.pendingOrder.collected_price);
        
      }
    });
    
  });


// for CSRF Token........................................ 
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') 
  }
});

// For Update Pending Order DEatils..................................................................
  $(document).on('click','.update-peding-order-deatail-btn', function () { 

    var pending_orderdeatils_id = $(this).val();

    // alert(pending_orderdeatils_id);

    $.ajax({
      method: "GET",
      url: "/edit_pending_order_details/"+ pending_orderdeatils_id, 
      success: function (response) {
       console.log(response);
        $('#pending_order_id').val(response.pendingOrderDetails.order_id);
        $('#pending_circle_price').val(response.pendingOrderDetails.circle_price);
        $('#pending_selling_price').val(response.pendingOrderDetails.selling_price);
        $('#pending_quantity').val(response.pendingOrderDetails.quantity);
        $('#pending_variation').val(response.pendingOrderDetails.variation);
        
      }
    });
    
  });

    // for increment.........................................    
    $(":input#pending_quantity").on('keyup mouseup', function () {
      var incValue = $("#pending_quantity").val();
      // alert(incValue);
      var value = parseInt(incValue , 10);
      value =isNaN(value) ? 0 : value;
      if(value > 0){   
          $(":input#pending_quantity").val(value);
      }
      
  });


  $(document).on('click','.pending-order-returned-btn',function () {
    var pending_order_returned_id =$(this).val();
  
  
    $.ajax({
        method: "GET",
        url: "/edit-returned-pending-order/"+pending_order_returned_id,  
        success: function (response) {
          // console.log(response);
          $('#pending_returnedOrder_id').val(response.pendingOrder.id);
          $('#pending_returned_order_id').html(response.pendingOrder.id);
          $('#pending_returned_order_code').val(response.pendingOrder.code);    
        }
    });
  });





  


// Processing_order..........................................................................................................................
// jquery For  PROCESSSINg Order ......................................................................................
$(document).on('click','.edit-btn-processing-order', function () {

  var processing_order_id =$(this).val();
  // alert(processing_order_id)

  $.ajax({
    method: "GET",
    url: "edit_processing_order/"+ processing_order_id,
    success: function (response) {
      // console.log(response);
      $('#processing_order_id').val(response.processingOrder.id);
      $('span#processingOrderCode').html(response.processingOrder.code);
      $('#processing_order_code').val(response.processingOrder.id);
      $('#processing_advance_payment').val(response.processingOrder.advance_payment);
      $('#processing_seller_coupon_discount').val(response.processingOrder.coupon_discount);
      $('#processing_order_note').val(response.processingOrder.order_note);
      $('#processing_circle_remarks').val(response.processingOrder.remarks);
      $('#processing_customer_delivery_charge').val(response.processingOrder.customer_charge);
      $('#processing_circle_delivery_charge').val(response.processingOrder.delivery_charge);
      $('#processing_delivery_man').val(response.processingOrder.delivery_man);
      $('#processing_delivery_status').val(response.processingOrder.circle_price);
      $('#processing_collected_amount').val(response.processingOrder.collected_price);
      $('#processing_reasons').val(response.processingOrder.Reasons);
      $('#processing_payment_status').val(response.processingOrder.payment_status);
      
    }
  });

});



    
$(document).on('click','.edit-processing-order-deatail-btn',function () {
  var processing_order_deatail_id =$(this).val();


  $.ajax({
      method: "GET",
      url: "/edit-processing-order-deatail/"+processing_order_deatail_id,
      success: function (response) {
        // console.log(response);
        $('#processing_order_details_id').val(response.processingOrderDetails.order_id);
        $('#processing_circle_price').val(response.processingOrderDetails.circle_price);
        $('#processing_selling_price').val(response.processingOrderDetails.selling_price);
        $('#processing_quantity').val(response.processingOrderDetails.quantity);
        $('#processing_variation').val(response.processingOrderDetails.variation);
        


      }
  });
});

    
$(document).on('click','.edit-btn-processingOrder-returned',function () {
  var processing_order_returned_id =$(this).val();
// alert(processing_order_returned_id)

  $.ajax({
      method: "GET",
      url: "/processing-order-returned-edit/"+processing_order_returned_id,
      success: function (response) {
        // console.log(response);
        $('#processing_returned_order_id').val(response.processingOrder.id);
        $('h2#processing_ret_order_code').html(response.processingOrder.id);
      }
  });
});


// ......................................................................................................................................................
// jquery For  Ready For Packaging Order ......................................................................................

$(document).on('click','.editButton-readyToPackagingOrder', function () {

  var readyToPackagingOrder_id =$(this).val();

  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });

  

  $.ajax({
    method: "GET",
    url: "edit-ready-for-packaging-order/"+readyToPackagingOrder_id,
    success: function (response) {
      // console.log(response);
      $('span#readyToPackagingOrderCode').html(response.packagingOrder.code);
      $('#ready-for-packaging-order-id').val(response.packagingOrder.id);
      $('#readyToPackaging_order_code').val(response.packagingOrder.code);
      $('#readyToPackaging_advance_payment').val(response.packagingOrder.advance_payment);
      $('#readyToPackaging_seller_coupon_discount').val(response.packagingOrder.coupon_discount);
      $('#readyToPackaging_order_note').val(response.packagingOrder.order_note);
      $('#readyToPackaging_circle_remarks').val(response.packagingOrder.remarks);
      $('#readyToPackaging_customer_delivery_charge').val(response.packagingOrder.customer_charge);
      $('#readyToPackaging_circle_delivery_charge').val(response.packagingOrder.delivery_charge);
      $('#readyToPackaging_delivery_man').val(response.packagingOrder.delivery_man);
      $('#readyToPackaging_delivery_date').val(response.packagingOrder.delivery_date);
      $('#readyToPackaging_delivery_status').val(response.packagingOrder.delivery_status);
      $('#readyToPackaging_collected_amount').val(response.packagingOrder.collected_price);
      $('#readyToPackaging_payment_status').val(response.packagingOrder.payment_status);
      
    }
});

       
});

$(document).on('click','.edit-packaging-order-deatail-btn',function () {
  var packaging_order_deatail_id =$(this).val();


  $.ajax({
      method: "GET",
      url: "/edit-packaging-order-deatail/"+packaging_order_deatail_id,
      success: function (response) {
        // console.log(response);
        $('#packaging_order_details_id').val(response.packagingOrderDetails.order_id);
        $('#packaging_circle_price').val(response.packagingOrderDetails.circle_price);
        $('#packaging_selling_price').val(response.packagingOrderDetails.selling_price);
        $('#packaging_quantity').val(response.packagingOrderDetails.quantity);
        $('#packaging_variation').val(response.packagingOrderDetails.variation);    
      }
  });
});


$(document).on('click','.return-packaging-order-btn',function () {
  var packaging_order_returned_id =$(this).val();


  $.ajax({
      method: "GET",
      url: "/returned-packaging-order/"+packaging_order_returned_id,  
      success: function (response) {
        // console.log(response);
        $('#returnedOrder_id').val(response.packagingOrder.id);
        $('#returned_order_id').html(response.packagingOrder.id);
        $('#returned_order_code').val(response.packagingOrder.code);    
      }
  });
});

$(document).on('click','.edit-purchased-status',function () {
  var purchased_status_id =$(this).val();

  // alert(purchased_status_id);

  $.ajax({
      method: "GET",
      url: "/edit-purchased-status/"+purchased_status_id,
      success: function (response) {
        console.log(response);
        $('#selected-order-id').val(response.selectedOrder.id);
      }
  });
});






// ......................................................................................................................................................
// jquery For  Ready To Deliver Order ......................................................................................

$(document).on('click','.edit-btn-ready-to-deliver',function () {
  var ready_to_deliver_id =$(this).val();


  
  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });
  

  $.ajax({
    method: "GET",
    url: "/ready-to-deliver-order/"+ready_to_deliver_id,  
    success: function (response) {
      // console.log(response);
      
      $('span#readyToDeliverOrderCode').html(response.readyToDeliver.code);
      $('#ready-to-deliver-order-id').val(response.readyToDeliver.id);
      $('#readyTodeliver_order_id').val(response.readyToDeliver.id);
      $('#readyTodeliver_advance_payment').val(response.readyToDeliver.advance_payment);
      $('#readyTodeliver_seller_coupon_discount').val(response.readyToDeliver.coupon_discount);
      $('#readyTodeliver_order_note').val(response.readyToDeliver.order_note);
      $('#readyTodeliver_circle_remarks').val(response.readyToDeliver.remarks);
      $('#readyTodeliver_customer_delivery_charge').val(response.readyToDeliver.customer_charge);
      $('#readyTodeliver_circle_delivery_charge').val(response.readyToDeliver.delivery_charge);
      $('#readyTodeliver_delivery_man').val(response.readyToDeliver.delivery_man);
      $('#readyTodeliver_delivery_date').val(response.readyToDeliver.delivery_date);
      $('#readyTodeliver_delivery_status').val(response.readyToDeliver.delivery_status);
      $('#readyTodeliver_collected_amount').val(response.readyToDeliver.collected_price);
      $('#readyTodeliver_reasons').val(response.readyToDeliver.reasons);  
      $('#readyTodeliver_payment_status').val(response.readyToDeliver.payment_status);  
    }
});
});

$(document).on('click','.edit-ready-to-deliver-deatail-btn',function () {
  var ready_to_deliver_order_deatail_id =$(this).val();


  $.ajax({
      method: "GET",
      url: "/edit-ready-to-deliver-order-details/"+ready_to_deliver_order_deatail_id,
      success: function (response) {
        console.log(response);
        $('#ready_to_deliver_order_details_id').val(response.readyToDeliverOrderDetails.order_id);
        $('#ready_to_deliver_circle_price').val(response.readyToDeliverOrderDetails.circle_price);
        $('#ready_to_deliver_selling_price').val(response.readyToDeliverOrderDetails.selling_price);
        $('#ready_to_deliver_quantity').val(response.readyToDeliverOrderDetails.quantity); 
        $('#ready_to_deliver_variation').val(response.readyToDeliverOrderDetails.variation);    
      }
  });
});

$(document).on('click','.return-ready-to-deliver-btn',function () {
  var ready_to_deliver_order_returned_id =$(this).val();



  $.ajax({
      method: "GET",
      url: "/edit-returned-ready-to-deliver-order/"+ready_to_deliver_order_returned_id,  
      success: function (response) {
        console.log(response);
        $('h2#ready_to_deliver_returnedOrder').html(response.returnedOrderReadyToDeliver.id); 
        $('#returned_order_id').val(response.returnedOrderReadyToDeliver.id); 
      }
  });
});

// Update Status 
$(document).on('click','.rdt-edit-btn',function () {
  var value_id =$(this).val();

  $.ajax({
      method: "GET",
      url: "/append-id-to-rtd-update-status/"+value_id,  
      success: function (response) {
        console.log(response); 
        $('#order_id').val(response.foundOrder.id); 
      }
  });
});




// ......................................................................................................................................................
// jquery For  On Hold Orders ......................................................................................

$(document).on('click','.on-hold-order-btn',function () {
  var on_hold_order_id = $(this).val();

  // alert(on_hold_order_id);


  $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
  });


  $.ajax({
    method: "GET",
    url: "/edit-on-hold-orders/"+ on_hold_order_id,  
    success: function (response) {
      console.log(response);
      $('span#on_hold_order_span_id').html(response.onHoldOrder.code);
      $('#on_hold_order_id').val(response.onHoldOrder.id); 
      $('#on_holdOrder_id').val(response.onHoldOrder.id);
      $('#OnHoldOrder_advance_payment').val(response.onHoldOrder.advance_payment);
      $('#OnHoldOrder_seller_coupon_discount').val(response.onHoldOrder.coupon_discount);
      $('#OnHoldOrder_order_note').val(response.onHoldOrder.order_note);
      $('#OnHoldOrder_circle_remarks').val(response.onHoldOrder.remarks);
      $('#OnHoldOrder_customer_delivery_charge').val(response.onHoldOrder.customer_charge);
      $('#OnHoldOrder_circle_delivery_charge').val(response.onHoldOrder.delivery_charge);
      $('#OnHoldOrder_delivery_man').val(response.onHoldOrder.delivery_man);
      $('#OnHoldOrder_delivery_date').val(response.onHoldOrder.delivery_date);
      $('#OnHoldOrder_delivery_status').val(response.onHoldOrder.delivery_status);
      $('#OnHoldOrder_collected_amount').val(response.onHoldOrder.collected_price);
      $('#OnHoldOrder_reasons').val(response.onHoldOrder.reasons);
      $('#OnHoldOrder_payment_status').val(response.onHoldOrder.payment_status);

    }
 }); 
}); 

$(document).on('click','.on-hold-order-deatail-btn',function () {
  var on_hold_order_deatils_id = $(this).val();

  // alert(on_hold_order_deatils_id);


  $.ajax({
    method: "GET",
    url: "/edit-on-hold-order-details/"+on_hold_order_deatils_id,  
    success: function (response) {
      // console.log(response);
      $('#on_hold_order_details_id').val(response.OnHoldOrderDetails.order_id);
      $('#on_hold_order_circle_price').val(response.OnHoldOrderDetails.circle_price);
      $('#on_hold_order_selling_price').val(response.OnHoldOrderDetails.selling_price);
      $('#on_hold_order_quantity').val(response.OnHoldOrderDetails.quantity); 
      $('#on_hold_order_variation').val(response.OnHoldOrderDetails.variation);    
    }
  }); 
 }); 

 $(document).on('click','.returned-on-hold-order-btn',function () {
  var on_hold_order_returned_id =$(this).val();

// alert(on_hold_order_returned_id)

  $.ajax({
      method: "GET",
      url: "/edit-returned-on-hold-order/"+on_hold_order_returned_id,  
      success: function (response) {
        // console.log(response);
        $('h2#on_hold_returnedOrder').html(response.returnedOnHoldOrder.id); 
        $('#on-hold-returned_order_id').val(response.returnedOnHoldOrder.id); 
      }
  });
});



$(document).on('click','.ohder-btn-purchase-status',function () {
  var id =$(this).val();

// alert(on_hold_order_returned_id)

  $.ajax({
      method: "GET",
      url: "/ohder-purchase-status-edit/"+id,  
      success: function (response) {
        console.log(response);
        $('#hidden_input_id').val(response.OnHoldOrderId.id); 
      }
  });
});

// ......................................................................................................................................................
// jquery For Under ReviewOrders ......................................................................................

$(document).on('click','.under-review-order-btn',function () {
  var under_review_order_id = $(this).val();

  $.ajax({
    method: "GET",
    url: "/edit-under-review-orders/"+under_review_order_id,  
    success: function (response) {
      // console.log(response);
      $('span#under_review_order_span_id').html(response.underReviewOrder.code);
      $('#under_review_order_id').val(response.underReviewOrder.id); 
      $('#under_reviewOrder_id').val(response.underReviewOrder.id);
      $('#underReview_advance_payment').val(response.underReviewOrder.advance_payment);
      $('#underReview_seller_coupon_discount').val(response.underReviewOrder.coupon_discount);
      $('#underReview_order_note').val(response.underReviewOrder.order_note);
      $('#underReview_circle_remarks').val(response.underReviewOrder.remarks);
      $('#underReview_customer_delivery_charge').val(response.underReviewOrder.customer_charge);
      $('#underReview_circle_delivery_charge').val(response.underReviewOrder.delivery_charge);
      $('#underReview_delivery_man').val(response.underReviewOrder.delivery_man);
      $('#underReview_delivery_date').val(response.underReviewOrder.delivery_date);
      $('#underReview_delivery_status').val(response.underReviewOrder.delivery_status);
      $('#underReview_collected_amount').val(response.underReviewOrder.collected_price);
      $('#underReview_reasons').val(response.underReviewOrder.reasons);
      $('#underReview_payment_status').val(response.underReviewOrder.payment_status);

    }
 }); 

});



$(document).on('click','.under-review-order-deatail-btn',function () {
  var under_review_orderdeatail_id = $(this).val();

  $.ajax({
    method: "GET",
    url: "/edit-under-review-order-details/"+under_review_orderdeatail_id,  
    success: function (response) {
      // console.log(response);
      $('#under_review_order_details_id').val(response.UnderReviewOrderDetails.order_id);
      $('#under_review_order_circle_price').val(response.UnderReviewOrderDetails.circle_price);
      $('#under_review_order_selling_price').val(response.UnderReviewOrderDetails.selling_price);
      $('#under_review_order_quantity').val(response.UnderReviewOrderDetails.quantity); 
      $('#under_review_order_variation').val(response.UnderReviewOrderDetails.variation); 

    }
  });
}); 


$(document).on('click','.returned-under-review-order-btn',function () {
  var under_review_order_returned_id =$(this).val();

// alert(on_hold_order_returned_id)

  $.ajax({
      method: "GET",
      url: "/edit-returned-under-review-order/"+under_review_order_returned_id,  
      success: function (response) {
        // console.log(response);
        $('h2#under_review_returnedOrder').html(response.ReturnedUnderReview.id); 
        $('#under-review-returned_order_id').val(response.ReturnedUnderReview.id); 
      }
  });
});


$(document).on('click','.underReviewOrder-purchase-status-btn',function () {
  var id =$(this).val();

// alert(on_hold_order_returned_id)

  $.ajax({
      method: "GET",
      url: "/underReviewOrder-purchase-status-edit/"+id,  
      success: function (response) {
        console.log(response);
        $('#hidden_input_id').val(response.underReviewOrderId.id); 
      }
  });
});







// ......................................................................................................................................................
// jquery For In Transit  Orders ......................................................................................

$(document).on('click','.edit-btn-in-transit-order',function () {
  var in_transit_order_id = $(this).val();

  $.ajax({
    method: "GET",
    url: "/edit-in-transit-orders/"+in_transit_order_id,  
    success: function (response) {
      // console.log(response);
      $('span#InTransitOrder_span_id').html(response.InTransitOrder.code);
      $('#InTransit_order_id').val(response.InTransitOrder.id); 
      $('#in-transit-order-id').val(response.InTransitOrder.id);
      $('#InTransit_advance_payment').val(response.InTransitOrder.advance_payment);
      $('#InTransit_seller_coupon_discount').val(response.InTransitOrder.coupon_discount);
      $('#InTransit_order_note').val(response.InTransitOrder.order_note);
      $('#InTransit_circle_remarks').val(response.InTransitOrder.remarks);
      $('#InTransit_customer_delivery_charge').val(response.InTransitOrder.customer_charge);
      $('#InTransit_circle_delivery_charge').val(response.InTransitOrder.delivery_charge);
      $('#InTransit_delivery_man').val(response.InTransitOrder.delivery_man);
      $('#InTransit_delivery_date').val(response.InTransitOrder.delivery_date);
      $('#InTransit_delivery_status').val(response.InTransitOrder.delivery_status);
      $('#InTransit_collected_amount').val(response.InTransitOrder.collected_price);
      $('#InTransit_reasons').val(response.InTransitOrder.reasons);
      $('#InTransit_payment_status').val(response.InTransitOrder.payment_status);

    }
 }); 
});

$(document).on('click','.edit-btn-in-transit-order-deatails',function () {
  var in_transit_order_deatails_id =$(this).val();

// alert(in_transit_order_deatails_id)

  $.ajax({
      method: "GET",
      url: "/edit-in-transit-order-details/"+in_transit_order_deatails_id,  
      success: function (response) {
        console.log(response);
        $('#InTransitOrder_details_id').val(response.InTransitOrderDetails.order_id);
        $('#in_transit_circle_price').val(response.InTransitOrderDetails.circle_price);
        $('#in_transit_selling_price').val(response.InTransitOrderDetails.selling_price);
        $('#in_transit_quantity').val(response.InTransitOrderDetails.quantity);
        $('#in_transit_variation').val(response.InTransitOrderDetails.variation); 
      }
  });
});


$(document).on('click','.returned-in-transit-order-btn',function () {
  var in_transit_order_returned_id =$(this).val();

// alert(in_transit_order_returned_id)

  $.ajax({
      method: "GET",
      url: "/edit-in-transit-returned-order/"+in_transit_order_returned_id, 
      success: function (response) {
        // console.log(response);
        $('#in_transit_returned_order_id').val(response.InTransitReturnedOrder.id);
        $('h2#in_transit_returnedOrder').html(response.InTransitReturnedOrder.id);
      }
  });
});


$(document).on('click','.inTransitOrder-update-status',function () {
  var id =$(this).val();

// alert(in_transit_order_returned_id)

  $.ajax({
      method: "GET",
      url: "/intro-purchase-status-edit/"+id, 
      success: function (response) {
        // console.log(response);
        $('#hidden_input_id').val(response.InTransitReturnedOrder.id);
      }
  });
});


// In Stock Orders...............................................................................................

$(document).on('click','.in-stock-order-btn',function () {
  var id = $(this).val();
  alert(id);


  $.ajax({
    method: "GET",
    url: "/edit-in-stock-orders/"+id,  
    success: function (response) {
      // console.log(response);    
      $('#hidden_id').val(response.inStockOrders.id);
      $('span#order_code').html(response.inStockOrders.code);
      $('#in_stock_order_code').val(response.inStockOrders.id); 
      $('#customer_delivery_charge').val(response.inStockOrders.customer_charge);
      $('#circle_delivery_charge').val(response.inStockOrders.delivery_charge);
      $('#delivery_status').val(response.inStockOrders.delivery_status);

     
  
    }
 }); 

});


$(document).on('click','.update-btn-instock-order',function () {
  var update_id =$(this).val();

  // alert(update_id);

  $.ajax({
    method: "GET",
    url: "/instock-order-details-edit/"+update_id,  
    success: function (response) {
      console.log(response);    
      $('#InStock_order_details_id').val(response.InStockOrderDetails.order_id);
      $('#InStock_circle_price').val(response.InStockOrderDetails.circle_price); 
      $('#InStock_selling_price').val(response.InStockOrderDetails.selling_price);
      $('#InStock_quantity').val(response.InStockOrderDetails.quantity);
      $('#InStock_variation').val(response.InStockOrderDetails.variation);
    }
 }); 
});





$(document).on('click','.edit-btn-inStockOrder-returned',function () {
  var inStockOrder_returned_id = $(this).val();


  $.ajax({
      method: "GET",
      url: "/returned-in-stock-order-edit/"+inStockOrder_returned_id,  
      success: function (response) {
        console.log(response);
        $('#InStock_returnedOrder_id').val(response.InStockOrder.id);
        $('#InStock_returned_order_id').html(response.InStockOrder.id);   
      }
  });
});

$(document).on('click','.ups-btn',function () {
  var id =$(this).val();

  $.ajax({
      method: "GET",
      url: "/ups-edit/"+id,
      success: function (response) {
        console.log(response);
        $('#hidden_input_id').val(response.InStockOrderId.id);
      }
  });

});



// ......................................................................................................................................................
  //jquery For RETURNING  Orders ......................................................................................
$(document).on('click','.edit-btn-returning-order',function () {
  var returning_order_id = $(this).val();

  $.ajax({
    method: "GET",
    url: "/edit-returning-orders/"+returning_order_id,  
    success: function (response) {
      // console.log(response);    
      $('span#returningOrder_span_id').html(response.ReturningOrder.code);
      $('#returning_order_id').val(response.ReturningOrder.id); 
      $('#returning-order-id').val(response.ReturningOrder.id);
      $('#returning_advance_payment').val(response.ReturningOrder.advance_payment);
      $('#returning_seller_coupon_discount').val(response.ReturningOrder.coupon_discount);
      $('#returning_order_note').val(response.ReturningOrder.order_note);
      $('#returning_circle_remarks').val(response.ReturningOrder.remarks);
      $('#returning_customer_delivery_charge').val(response.ReturningOrder.customer_charge);
      $('#returning_circle_delivery_charge').val(response.ReturningOrder.delivery_charge);
      $('#returning_delivery_man').val(response.ReturningOrder.delivery_man);
      $('#returning_delivery_date').val(response.ReturningOrder.delivery_date);
      $('#returning_delivery_status').val(response.ReturningOrder.delivery_status);
      $('#returning_collected_amount').val(response.ReturningOrder.collected_price);
      $('#returning_reasons').val(response.ReturningOrder.reasons);
      $('#returning_payment_status').val(response.ReturningOrder.payment_status);
    }
 }); 

});

$(document).on('click','.edit-btn-returning-order-deatails',function () {
  var returning_order_deatails_id = $(this).val();

  // alert(returning_order_deatails_id)

  $.ajax({
    method: "GET",
    url: "/returningorder-deatails-edit/"+returning_order_deatails_id,  
    success: function (response) {
      // console.log(response); 
      $('#returning_details_hidden_id').val(response.returningOrderDetails.order_id);
      $('#returning_circle_price').val(response.returningOrderDetails.circle_price);
      $('#returning_selling_price').val(response.returningOrderDetails.selling_price);
      $('#returning_quantity').val(response.returningOrderDetails.quantity);
      $('#returning_variation').val(response.returningOrderDetails.variation);

		}
	}); 
});	

$(document).on('click','.returned-returning-order-btn',function () {
  var returning_order_returned_id =$(this).val();


  $.ajax({
      method: "GET",
      url: "/edit-returningreturned-order/"+returning_order_returned_id,  
      success: function (response) {
        console.log(response);
        $('#returning_returned_order_id').val(response.ReturningReturnedOrder.id);
        $('h2#returning_returnedOrder').html(response.ReturningReturnedOrder.id);   
      }
  });
});


// ......................................................................................................................................................
  //jquery For So-Status-Orders......................................................................................
  $(document).on('click','.btn-no-status-order',function () {
    var no_status_order_id = $(this).val();
  
    $.ajax({
      method: "GET",
      url: "/edit-no-status-orders/"+no_status_order_id,  
      success: function (response){
        // console.log(response);    
        $('span#noStatusOrder_span_id').html(response.noStatusOrder.code);
        $('#selected-order-id').val(response.noStatusOrder.id); 
        $('#noStatus_order_id').val(response.noStatusOrder.id);
        $('#noStatus_advance_payment').val(response.noStatusOrder.advance_payment);
        $('#noStatus_seller_coupon_discount').val(response.noStatusOrder.coupon_discount);
        $('#noStatus_order_note').val(response.noStatusOrder.order_note);
        $('#noStatus_circle_remarks').val(response.noStatusOrder.remarks);
        $('#noStatus_customer_delivery_charge').val(response.noStatusOrder.customer_charge);
        $('#noStatus_circle_delivery_charge').val(response.noStatusOrder.delivery_charge);
        $('#noStatus_delivery_man').val(response.noStatusOrder.delivery_man);
        $('#noStatus_delivery_date').val(response.noStatusOrder.delivery_date);
        $('#noStatus_delivery_status').val(response.noStatusOrder.delivery_status);
        $('#noStatus_collected_amount').val(response.noStatusOrder.collected_price);
        $('#noStatus_reasons').val(response.noStatusOrder.reasons);
        $('#noStatus_payment_status').val(response.noStatusOrder.payment_status);
      }
   }); 
  
  });

  $(document).on('click','.edit-no-status-order-deatails',function () {
    var no_status_order_deatails_id = $(this).val();
  
    // alert(no_status_order_deatails_id)
  
    $.ajax({
      method: "GET",
      url: "/noStatus-order-deatails-edit/"+no_status_order_deatails_id,  
      success: function (response) {
        console.log(response); 
        $('#NoStatusOrder_details_id').val(response.NoStatusOrderDetails.order_id);
        $('#no_status_circle_price').val(response.NoStatusOrderDetails.circle_price);
        $('#no_status_selling_price').val(response.NoStatusOrderDetails.selling_price);
        $('#no_status_quantity').val(response.NoStatusOrderDetails.quantity);
        $('#no_status_variation').val(response.NoStatusOrderDetails.variation);
  
      }
    }); 
  });	

  $(document).on('click','.returned-no-status-order-btn',function () {
    var noStatus_order_returned_id =$(this).val();
  
  
    $.ajax({
        method: "GET",
        url: "/edit-returned-no-status-order/"+noStatus_order_returned_id ,  
        success: function (response) {
          // console.log(response);
          $('#no_status_returned_order_id').val(response.NoStatusReturnedOrder.id);
          $('h2#no_status_returnedOrder').html(response.NoStatusReturnedOrder.id);   
        }
    });
  });


  // ......................................................................................................................................................
  //jquery For Manage-Orders......................................................................................
  $(document).on('click','.btn-edit-update-selected-order',function () {
    var selected_order_id = $(this).val();

    // alert(selected_order_id);
  
    $.ajax({
      method: "GET",
      url: "/edit-selected-order/"+selected_order_id,  
      success: function (response){
        // console.log(response);    
        $('span#selectedOrder_span_id').html(response.selectedOrder.code);
        $('#selected-order-id').val(response.selectedOrder.id); 
        $('#selected_order_id').val(response.selectedOrder.id);
        $('#selected_advance_payment').val(response.selectedOrder.advance_payment);
        $('#selected_seller_coupon_discount').val(response.selectedOrder.coupon_discount);
        $('#selected_order_note').val(response.selectedOrder.order_note);
        $('#selected_circle_remarks').val(response.selectedOrder.remarks);
        $('#selected_customer_delivery_charge').val(response.selectedOrder.customer_charge);
        $('#selected_circle_delivery_charge').val(response.selectedOrder.delivery_charge);
        $('#selected_delivery_man').val(response.selectedOrder.delivery_man);
        $('#selected_delivery_date').val(response.selectedOrder.delivery_date);
        $('#selected_delivery_status').val(response.selectedOrder.delivery_status);
        $('#selected_collected_amount').val(response.selectedOrder.collected_price);
        $('#selected_reasons').val(response.selectedOrder.reasons);
        $('#selected_payment_status').val(response.selectedOrder.payment_status);
      }
   }); 
  
  });


  $(document).on('click','.edit-selected-order-deatails',function () {
    var id = $(this).val();
  
    alert(id);
  
    $.ajax({
      method: "GET",
      url: "/so-details-edit/"+id,  
      success: function (response) {
        console.log(response); 
        $('input#selected_order_details_id').val(response.selectedOrderDetails.order_id);
        $('#selected_order_circle_price').val(response.selectedOrderDetails.circle_price);
        $('#selected_order_selling_price').val(response.selectedOrderDetails.selling_price);
        $('#selected_order_quantity').val(response.selectedOrderDetails.quantity);
        $('#selected_order_variation').val(response.selectedOrderDetails.variation);
  
      }
    }); 
  });	


  $(document).on('click','.returned-selected-order-btn',function () {
    var selected_order_returned_id =$(this).val();
  
    alert(selected_order_returned_id)
  
    $.ajax({
        method: "GET",
        url: "/edit-returned-selected-order/"+selected_order_returned_id,  
        success: function (response) {
          console.log(response);
          $('#selected_returned_order_id').val(response.selectedReturnedOrder.id);
          $('h2#selected_returnedOrder').html(response.selectedReturnedOrder.id);   
        }
    });
  });


  $(document).on('click','.sops-ups-btn',function () {
    var id_val = $(this).val();

    alert(id_val);
  
    $.ajax({
        method:"GET",
          url:"/sops-edit/"+id_val,
        success: function (response) {
          console.log(response);
          $('#sops_id').val(response.selectedOrder.id);
        }
    });
  });
  // ............................................................................................................................................................................


  //jquery For In-House-Orders......................................................................................

  $(document).on('click','.edit-btn-in-house-order',function () {
    var in_house_order_id = $(this).val();

    // alert(in_house_order_id);
  
    $.ajax({
      method: "GET",
      url: "/edit-in-house-order/"+in_house_order_id,  
      success: function (response){
        // console.log(response);    
        $('span#inHouse_order_span_id').html(response.inHouseOrder.code);
        $('#in-house-order-id').val(response.inHouseOrder.id); 
        $('#inHouse_order_id').val(response.inHouseOrder.id);
        $('#inHouse_advance_payment').val(response.inHouseOrder.advance_payment);
        $('#inHouse_seller_coupon_discount').val(response.inHouseOrder.coupon_discount);
        $('#inHouse_order_note').val(response.inHouseOrder.order_note);
        $('#inHouse_circle_remarks').val(response.inHouseOrder.remarks);
        $('#inHouse_customer_delivery_charge').val(response.inHouseOrder.customer_charge);
        $('#inHouse_circle_delivery_charge').val(response.inHouseOrder.delivery_charge);
        $('#inHouse_delivery_man').val(response.inHouseOrder.delivery_man);
        $('#inHouse_delivery_date').val(response.inHouseOrder.delivery_date);
        $('#inHouse_delivery_status').val(response.inHouseOrder.delivery_status);
        $('#inHouse_collected_amount').val(response.inHouseOrder.collected_price);
        $('#inHouse_reasons').val(response.inHouseOrder.reasons);
        $('#inHouse_payment_status').val(response.inHouseOrder.payment_status);
      }
   }); 
  
  });

  $(document).on('click','.edit-in-house-order-deatails', function () { 

    var in_house_orderdeatils_id = $(this).val();
     alert(in_house_orderdeatils_id);
     $.ajaxSetup({

      headers: {
  
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  
      }
  });

    $.ajax({
      method: "GET",
      url: "/details-in-house-order-edit/"+ in_house_orderdeatils_id, 
      success: function (response) {
       console.log(response);
        $('#in_house_order_id').val(response.InHouseOrderDetails.order_id);
        $('#in_house_circle_price').val(response.InHouseOrderDetails.circle_price);
        $('#in_house_selling_price').val(response.InHouseOrderDetails.selling_price);
        $('#in_house_quantity').val(response.InHouseOrderDetails.quantity);
        $('#in_house_variation').val(response.InHouseOrderDetails.variation);  
      }
      //   error: function(xhr){

      //     console.log(xhr.response.responseText);

       
      // }
    }); 
  });


  


  $(document).on('click','.returned-in-house-order-btn',function () {
    var in_house_returned_id =$(this).val();
  
  
    $.ajax({
        method: "GET",
        url: "/returned-in-house-order-edit/"+in_house_returned_id,  
        success: function (response) {
          // console.log(response);
          $('#in_house_returned_order_id').val(response.inHouseReturnedOrder.id);
          $('#in_house_returnedOrder').html(response.inHouseReturnedOrder.id);   
        }
    });
  });

  $(document).on('click','.btn_update_purchase_status_iho',function () {
    var id =$(this).val();

    alert(id)

    $.ajax({
      method: "GET",
      url: "/iho_purchase_status_edit/"+id,  
      success: function (response) {
        console.log(response);
        $('input#hidden_input_id_inho').val(response.inHouseOrder.id);

      }
  });
});   


// ManageCourier ................................................................................................

$(document).on('click','.delete-couriar-btn',function () {
  var couriar_id =$(this).val();


  $.ajax({
      method: "GET",
      url: "/delete-couriart/"+couriar_id,  
      success: function (response) {
        // console.log(response);
        $('#in_house_returned_order_id').val(response.inHouseReturnedOrder.id);
        $('#in_house_returnedOrder').html(response.inHouseReturnedOrder.id);   
      }
  });
});
  







});// End of document line........................................... 
