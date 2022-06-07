<div class="modal fade" id="under-review-order-modal-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Order Code : <span id="under_review_order_span_id"></span></h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
{{-- Form Started From here........... --}}
          <form id="form" class="form-horizontal" action="{{url('update-under-review-order')}}" method="POST">
            @csrf
            @method('PUT')
              <input type="hidden" name="under_review_order_id" id="under_review_order_id">
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Order id</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="under_reviewOrder_id" id="under_reviewOrder_id">
              </div>
            </div>
            <div class="form-group row">
              <label for="underReview_advance_payment" class="col-sm-4 col-form-label">Advance Payment</label>
              <div class="col-sm-8">
                <input type="text"  class="form-control" name="underReview_advance_payment" id="underReview_advance_payment">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Seller Coupon Discount</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="underReview_seller_coupon_discount" id="underReview_seller_coupon_discount">
              </div>
            </div>
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Order Note</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="underReview_order_note" id="underReview_order_note">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Circle Remarks</label>
              <div class="col-sm-8">
                <input type="text" class="form-control" name="underReview_circle_remarks" id="underReview_circle_remarks">
              </div>
            </div>
  
            <div class="form-group row">
              <label for="position" class="col-sm-4 control-label">Courier </label>
              <div class="col-sm-8">
                          <select class="form-control" name="underReview_courier" id="underReview_courier">
                             @foreach ($couriers as $courier)
                             <option value="{{$courier->name}}">{{$courier->name}}</option>
                             @endforeach					       
                            </select>
                     </div>
                 </div>
  
                 <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Customer Delivery Charge</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="underReview_customer_delivery_charge" id="underReview_customer_delivery_charge">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Circle Delivery Charge</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="underReview_circle_delivery_charge" id="underReview_circle_delivery_charge">
                  </div>
                </div> 
  
  
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Delivery Man</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="underReview_delivery_man" id="underReview_delivery_man">
                  </div>
                </div> 
  
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Delivery Date</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="underReview_delivery_date" id="underReview_delivery_date">
                  </div>
                </div>
  
                <div class="form-group row">
                  <label for="edit_delivery" class="col-sm-4 control-label">Delivery Status</label>
                     <div class="col-sm-8"> 
                         <select class="form-control" name="underReview_delivery_status" id="underReview_delivery_status">
                          <option selected="" id="delivery_val" value="pending">pending</option>
                           <option value="pending">Pending</option>
                          <option value="processing">Processing</option>
                          <option value="ready for packaging">Ready For Packaging</option>
                          <option value="ready to deliver">Ready to Deliver</option>
                          <option value="on hold">On Hold</option>
                          <option value="under review">Under Review</option>
                          <option value="exchange">Exchange</option>
                          <option value="delivered">Delivered</option>
                          <option value="returning">Returning</option>
                          <option value="in transit">In Transit</option>
                          <option value="cancelled">Cancelled</option>
                          <option value="returned">Returned</option>
                          </select>
                       </select>
                     </div>
                 </div>
  
                 <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Collected Amount</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="underReview_collected_amount" id="underReview_collected_amount">
                  </div>
                </div>
                
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Reasons</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="underReview_reasons" id="underReview_reasons">
                  </div>
                </div> 
              
                <div class="form-group row">
                  <label for="edit_payment" class="col-sm-4 control-label">Payment Status</label>
                  <div class="col-sm-8"> 
                    <select class="form-control" name="underReview_payment_status" id="underReview_payment_status">
                      <option selected="" id="payment_val" value="unpaid">unpaid</option>
                       <option value="paid">Paid</option>
                      <option value="unpaid">Unpaid</option>
                    </select>
                  </div>
              </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update</button>
        </div>
      </form>
      </div>
    </div>
  </div>