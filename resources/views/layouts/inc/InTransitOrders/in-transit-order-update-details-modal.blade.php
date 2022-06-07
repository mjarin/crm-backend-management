<div class="modal fade" id="in_transit_order_details_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold"></h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          <form id="form" class="form-horizontal" action="{{url('update-in-transit-order-details')}}" method="POST">
              @csrf
              @method('PUT') 
              
              <input type="hidden" name="InTransitOrder_details_id" id="InTransitOrder_details_id" >
                <div class="form-group row"> 
                  <label for="advance_payment" class="col-sm-3 col-form-label">Circle Price (Unit)</label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control" name="in_transit_circle_price" id="in_transit_circle_price" >
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Selling Price (Unit)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="in_transit_selling_price" id="in_transit_selling_price">
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="in_transit_quantity" class="col-sm-3 col-form-label">Quantity</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="in_transit_quantity" name="in_transit_quantity">
                  </div>
                </div>
            
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Variation</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="in_transit_variation" id="in_transit_variation">
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