<div class="modal fade" id="stock_update_modal_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold"></h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
  
  
          <form id="form" class="form-horizontal" action="{{url('update-product-stock')}}" method="POST">
              @csrf
              @method('PUT')  
            <input type="hidden" name="product_id" id="product_id" >
          
                <div class="form-group row">
                  <label for="advance_payment" class="col-sm-3 col-form-label">Product Name</label>
                  <div class="col-sm-9">
                    <input type="text"  class="form-control" name="product_name" id="product_name" readonly="">
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Product Variant</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" name="product_variant" id="product_variant" readonly="">
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="processing_quantity" class="col-sm-3 col-form-label">Current Stock</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="product_current_stock" name="product_current_stock" readonly="">
                  </div>
                </div>
                <div class="form-group row">
                    <label for="" class="col-sm-3 col-form-label">New Stock Quantity</label>
                    <div class="col-sm-9">
                      <input type="text" class="form-control" name="new_stock" id="new_stock">
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
  </div>