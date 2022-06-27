<div class="modal fade" id="in-stock-order-modal-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Order Code :&nbsp;&nbsp;<span class="mr-3" id="order_code"></span></h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5 py-3">
          <form id="form" class="form-horizontal" action="{{url('update-instock-order')}}" method="POST">
              @csrf
              @method('PUT')  

            <input type="hidden" name="hidden_id" id="hidden_id">

            <div class="form-group row">
              <label for="" class="col-sm-4 col-form-label">Order Id</label> 
              <div class="col-sm-8">
                <input type="text" class="form-control" id="in_stock_order_code" name="in_stock_order_code">
              </div>
            </div>

            <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label">Customer Delivery Charge</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="customer_delivery_charge" id="customer_delivery_charge">
                </div>
              </div>
              
              <div class="form-group row">
                <label for="" class="col-sm-4 col-form-label">Circle Delivery Charge</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" name="circle_delivery_charge" id="circle_delivery_charge">
                </div>
              </div> 

            
            <div class="form-group row">
                <label for="edit_delivery" class="col-sm-4 control-label">Delivery Status</label>
                   <div class="col-sm-8"> 
                       <select class="form-control" name="delivery_status" id="delivery_status">
                        <option selected="" value="pending">pending</option>
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

            <div class="modal-footer mt-5">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success"><i class="fa fa-check-square-o mr-2"></i>Update Order</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

