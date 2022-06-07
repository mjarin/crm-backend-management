
<form id="form" class="form-horizontal" action="{{url('update-ready-for-packaging-order')}}" method="POST">
    @csrf
    @method('PUT')  
    <div class="form-group row">
        <input type="hidden"  name="ready-for-packaging-order-name" id="ready-for-packaging-order-id">
      <label for="" class="col-sm-4 col-form-label">Order Code</label>
      <div class="col-sm-8">
        <input type="text" class="form-control"  name="readyToPackaging_order_code" id="readyToPackaging_order_code">
      </div>
    </div>
    <div class="form-group row">
      <label for="advancePayment" class="col-sm-4 col-form-label">Advance Payment</label>
      <div class="col-sm-8">
        <input type="text"  class="form-control" name="readyToPackaging_advance_payment" id="readyToPackaging_advance_payment">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-4 col-form-label" >Seller Coupon Discount</label>
      <div class="col-sm-8">
      <input type="text" class="form-control" name="readyToPackaging_seller_coupon_discount" id="readyToPackaging_seller_coupon_discount">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-4 col-form-label">Order Note</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="readyToPackaging_order_note" id="readyToPackaging_order_note">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-4 col-form-label">Circle Remarks</label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="readyToPackaging_circle_remarks" id="readyToPackaging_circle_remarks">
      </div>
    </div>

    <div class="form-group row">
      <label for="position" class="col-sm-4 control-label">Courier </label>
      <div class="col-sm-8">
                  <select class="form-control" name="courier" id="edit_courier">
                     @foreach ($couriers as $courier)
                     <option value="{{$courier->name}}">{{$courier->name}}</option>
                     @endforeach					       
                    </select>
             </div>
         </div>

         <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label">Customer Delivery Charge</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="readyToPackaging_customer_delivery_charge" id="readyToPackaging_customer_delivery_charge">
          </div>
        </div>
        
        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label">Circle Delivery Charge</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="readyToPackaging_circle_delivery_charge" id="readyToPackaging_circle_delivery_charge">
          </div>
        </div> 


        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label">Delivery Man</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="readyToPackaging_delivery_man" id="readyToPackaging_delivery_man">
          </div>
        </div> 

        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label">Delivery Date</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="readyToPackaging_delivery_date" id="readyToPackaging_delivery_date">
          </div>
        </div>

        <div class="form-group row">
          <label for="edit_delivery" class="col-sm-4 control-label">Delivery Status</label>
             <div class="col-sm-8"> 
                 <select class="form-control" name="readyToPackaging_delivery_status" id="readyToPackaging_delivery_status" required="">
                  <option selected="" id="" value="pending">Pending</option>
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
            <input type="text" class="form-control" name="readyToPackaging_collected_amount" id="readyToPackaging_collected_amount">
          </div>
        </div>
        
        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label">Reasons</label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="readyToPackaging_reasons" id="readyToPackaging_reasons">
          </div>
        </div> 
      
        <div class="form-group row">
          <label for="edit_payment" class="col-sm-4 control-label">Payment Status</label>
          <div class="col-sm-8"> 
            <select class="form-control" name="readyToPackaging_payment_status" id="readyToPackaging_payment_status" required="">
              <option selected="" id="readyToPackaging_payment_status_val" value="unpaid">Unpaid</option>
               <option value="paid">Paid</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update Order</button>
      </div>
  </form>