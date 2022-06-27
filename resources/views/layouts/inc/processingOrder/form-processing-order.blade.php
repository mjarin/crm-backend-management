<form id="form" class="form-horizontal" action="{{url('update-processing-order')}}" method="POST">
    @csrf
    @method('PUT')  
      <div class="form-group row">
        <input type="hidden" name="processing_order_id" id="processing_order_id" >
        <label for="" class="col-sm-4">Order Id</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" id="processing_order_code" name="processing_order_code">
        </div>
      </div>
      <div class="form-group row">
        <label for="advance_payment" class="col-sm-4">Advance Payment</label>
        <div class="col-sm-8">
          <input type="text"  class="form-control" name="processing_advance_payment" id="processing_advance_payment" >
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4">Seller Coupon Discount</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="processing_seller_coupon_discount" id="processing_seller_coupon_discount">
        </div>
      </div>
      <div class="form-group row">
        <label for="" class="col-sm-4">Order Note</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="processing_order_note" id="processing_order_note">
        </div>
      </div>
  
      <div class="form-group row">
        <label for="" class="col-sm-4">Circle Remarks</label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="processing_circle_remarks" id="processing_circle_remarks">
        </div>
      </div>
  
      <div class="form-group row">
        <label for="position" class="col-sm-4 control-label font-weight-bold font-weight-bold">Courier </label>
        <div class="col-sm-8">
                    <select class="form-control" name="courier" id="courier">
                       @foreach ($couriers as $courier)
                       <option value="{{$courier->name}}">{{$courier->name}}</option>
                       @endforeach					       
                      </select>
               </div>
           </div>
  
           <div class="form-group row">
            <label for="" class="col-sm-4">Customer Delivery Charge</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="processing_customer_delivery_charge" id="processing_customer_delivery_charge">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="" class="col-sm-4">Circle Delivery Charge</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="processing_circle_delivery_charge" id="processing_circle_delivery_charge">
            </div>
          </div> 

          <div class="form-group row">
            <label for="" class="col-sm-4">Delivery Man</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="processing_delivery_man" id="processing_delivery_man">
            </div>
          </div> 
  
          <div class="form-group row">
            <label for="" class="col-sm-4">Delivery Date</label>
            <div class="col-sm-8">
              <div class="input-group date" id="datepicker">
                <input type="text" class="form-control" name="processing_delivery_date" id="processing_delivery_date">
                <span class="input-group-append">
                  <span class="input-group-text bg-white">
                    <i class="fa fa-calendar"></i>
                  </span>
                </span>
                
              </div>
            </div>
          </div>
  
          <div class="form-group row">
            <label for="edit_delivery" class="col-sm-4 control-label font-weight-bold">Delivery Status</label>
               <div class="col-sm-8"> 
                   <select class="form-control" name="processing_delivery_status" id="processing_delivery_status" required="">
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
               </div>
           </div>
  
           <div class="form-group row">
            <label for="" class="col-sm-4">Collected Amount</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="processing_collected_amount" id="processing_collected_amount" placeholder="1170.00">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="" class="col-sm-4">Reasons</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="processing_reasons" id="processing_reasons">
            </div>
          </div> 
        
          <div class="form-group row">
            <label for="edit_payment" class="col-sm-4 control-label font-weight-bold">Payment Status</label>
            <div class="col-sm-8"> 
              <select class="form-control" name="processing_payment_status" id="processing_payment_status" required="">
                <option selected="" id="processing_payment_val" value="unpaid">unpaid</option>
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
</div>
</form>