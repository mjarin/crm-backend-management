<div class="modal fade" id="sa_paribahan_order_details_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold"></h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          <form id="form" class="form-horizontal" action="{{url('update-sa-paribahan-order-details')}}" method="POST">
              @csrf
              @method('PUT') 

              <input type="hidden" name="sa_paribahan_hidden_id" id="sa_paribahan_hidden_id" >
                <div class="form-group row"> 
                  <label for="advance_payment" class="col-sm-3 col-form-label">Circle Price (Unit)</label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control" name="sa_paribahan_circle_price" id="sa_paribahan_circle_price" >
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Selling Price (Unit)</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="sa_paribahan_selling_price" id="sa_paribahan_selling_price">
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="sa_paribahan_quantity" class="col-sm-3 col-form-label">Quantity</label>
                  <div class="col-sm-9">
                    <input type="number" class="form-control" id="sa_paribahan_quantity" name="sa_paribahan_quantity">
                  </div>
                </div>
            
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Variation</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="sa_paribahan_variation" id="sa_paribahan_variation">
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