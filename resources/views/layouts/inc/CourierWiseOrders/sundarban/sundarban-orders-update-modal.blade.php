<div class="modal fade" id="sundarban_order_modal_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Order Code : <span id="SundarbanOrder_span_id"></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
            {{-- Form start --}}

            <form id="form" class="form-horizontal" action="{{url('update-sundarban-order')}}" method="POST">
                @csrf
                @method('PUT')  
                <div class="form-group row">
                    <input type="hidden"  name="Sundarban-order-id" id="Sundarban-order-id">
                  <label for="" class="col-sm-4 col-form-label">Order Id</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control"  name="sundarban_order_id" id="sundarban_order_id">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="advancePayment" class="col-sm-4 col-form-label">Advance Payment</label>
                  <div class="col-sm-8">
                    <input type="text"  class="form-control" name="sundarban_advance_payment" id="sundarban_advance_payment">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label" >Seller Coupon Discount</label> 
                  <div class="col-sm-8">
                  <input type="text" class="form-control" name="sundarban_seller_coupon_discount" id="sundarban_seller_coupon_discount">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Order Note</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="sundarban_order_note" id="sundarban_order_note">
                  </div>
                </div>
            
                <div class="form-group row">
                  <label for="" class="col-sm-4 col-form-label">Circle Remarks</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" name="sundarban_circle_remarks" id="sundarban_circle_remarks">
                  </div>
                </div>
            
                <div class="form-group row">
                  <label for="position" class="col-sm-4 control-label">Courier </label>
                  <div class="col-sm-8">
                              <select class="form-control" name="sundarban_courier" id="sundarban_courier">
                                 @foreach ($couriers as $courier)
                                 <option value="{{$courier->name}}">{{$courier->name}}</option>
                                 @endforeach					       
                                </select>
                         </div>
                     </div>
            
                     <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Customer Delivery Charge</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="sundarban_customer_delivery_charge" id="sundarban_customer_delivery_charge">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Circle Delivery Charge</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="sundarban_circle_delivery_charge" id="sundarban_circle_delivery_charge">
                      </div>
                    </div> 
            
            
                    <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Delivery Man</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="sundarban_delivery_man" id="sundarban_delivery_man">
                      </div>
                    </div> 
            
                    <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Delivery Date</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="sundarban_delivery_date" id="sundarban_delivery_date">
                      </div>
                    </div>
            
                    <div class="form-group row">
                      <label for="edit_delivery" class="col-sm-4 control-label">Delivery Status</label>
                         <div class="col-sm-8"> 
                             <select class="form-control" name="sundarban_delivery_status" id="sundarban_delivery_status" required="">
                              <option selected="" id="" value="pending">Pending</option>
                              <option value="processing">Processing</option>
                              <option value="ready for deliver">Ready For packaging</option>
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
                        <input type="text" class="form-control" name="sundarban_collected_amount" id="sundarban_collected_amount">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label for="" class="col-sm-4 col-form-label">Reasons</label>
                      <div class="col-sm-8">
                        <input type="text" class="form-control" name="sundarban_reasons" id="sundarban_reasons">
                      </div>
                    </div> 
                  
                    <div class="form-group row">
                      <label for="edit_payment" class="col-sm-4 control-label">Payment Status</label>
                      <div class="col-sm-8"> 
                        <select class="form-control" name="sundarban_payment_status" id="sundarban_payment_status">
                          <option selected="" id="sundarban_payment_status_val" value="unpaid">Unpaid</option>
                           <option value="paid">Paid</option>
                        </select>
                      </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Order</button>
                  </div>
              </form>