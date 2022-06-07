
<form id="form" class="form-horizontal" action="{{url('update-pending-order')}}" method="POST">
  @csrf
  @method('PUT')  
    <div class="form-group row">
      <input type="hidden" name="order_id" id="order_id" >
      <label for="" class="col-sm-4 col-form-label"><b>Order Id</b></label>
      <div class="col-sm-8">
        <input type="text" class="form-control" id="order_code" name="order_code">
      </div>
    </div>
    <div class="form-group row">
      <label for="advance_payment" class="col-sm-4 col-form-label"><b>Advance Payment</b></label>
      <div class="col-sm-8">
        <input type="text"  class="form-control" name="advance_payment" id="advance_payment" >
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-4 col-form-label"><b>Seller Coupon Discount</b></label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="seller_coupon_discount" id="seller_coupon_discount">
      </div>
    </div>
    <div class="form-group row">
      <label for="" class="col-sm-4 col-form-label"><b>Order Note</b></label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="order_note" id="order_note">
      </div>
    </div>

    <div class="form-group row">
      <label for="" class="col-sm-4 col-form-label"><b>Circle Remarks</b></label>
      <div class="col-sm-8">
        <input type="text" class="form-control" name="circle_remarks" id="circle_remarks">
      </div>
    </div>

    <div class="form-group row">
      <label for="position" class="col-sm-4 control-label">Courier </label>
      <div class="col-sm-8">
                  <select class="form-control" name="courier" id="courier">
                     @foreach ($couriers as $courier)
                     <option value="{{$courier->name}}">{{$courier->name}}</option>
                     @endforeach					       
                    </select>
             </div>
         </div>

         <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label"><b>Customer Delivery Charge</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="customer_delivery_charge" id="customer_delivery_charge">
          </div>
        </div>
        
        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label"><b>Circle Delivery Charge</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="circle_delivery_charge" id="circle_delivery_charge">
          </div>
        </div> 


        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label"><b>Delivery Man</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="delivery_man" id="delivery_man">
          </div>
        </div> 

        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label"><b>Delivery Date</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="delivery_date" id="delivery_date">
          </div>
        </div>

        <div class="form-group row">
          <label for="edit_delivery" class="col-sm-4 control-label">Delivery Status</label>
             <div class="col-sm-8"> 
                 <select class="form-control" name="delivery_status" id="delivery_status" required="">
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
          <label for="" class="col-sm-4 col-form-label"><b>Collected Amount</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="collected_amount" id="collected_amount" placeholder="1170.00">
          </div>
        </div>
        
        <div class="form-group row">
          <label for="" class="col-sm-4 col-form-label"><b>Reasons</b></label>
          <div class="col-sm-8">
            <input type="text" class="form-control" name="Reasons" id="Reasons">
          </div>
        </div> 
      
        <div class="form-group row">
          <label for="edit_payment" class="col-sm-4 control-label">Payment Status</label>
          <div class="col-sm-8"> 
            <select class="form-control" name="payment_status" id="payment_status" required="">
              <option selected="" id="payment_val" value="unpaid">unpaid</option>
               <option value="paid">Paid</option>
              <option value="unpaid">Unpaid</option>
            </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Update Order</button>
      </div>
  </form>