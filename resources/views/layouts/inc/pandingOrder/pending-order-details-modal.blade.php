
<div class="modal fade" id="updt-pending-order-details" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 800px!important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold"></h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">

<form id="form" class="form-horizontal" action="{{url('update-pending-order-details')}}" method="POST">
    @csrf
    @method('PUT')  
        <input type="hidden" name="pending_order" id="pending_order_id" >

      <div class="form-group row">
        <label for="advance_payment" class="col-sm-4 col-form-label"><b>Circle Price (Unit)</b></label>
        <div class="col-sm-8">
          <input type="text"  class="form-control" name="pending_circle_price" id="pending_circle_price" >
        </div>
      </div>
      <br>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label"><b>Selling Price (Unit)</b></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="pending_selling_price" id="pending_selling_price">
        </div>
      </div>
      <br>
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label"><b>Quantity</b></label>
        <div class="col-sm-8">
          <input type="number" class="form-control" id="pending_quantity" name="pendingt_quantity">
        </div>
      </div>
  
      <div class="form-group row">
        <label for="" class="col-sm-4 col-form-label"><b>Variation</b></label>
        <div class="col-sm-8">
          <input type="text" class="form-control" name="pending_variation" id="pending_variation">
        </div>
      </div>
  
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success">Update Order</button>
        </div>
    </form>
  </div> 
  </div>
</div>
</div>