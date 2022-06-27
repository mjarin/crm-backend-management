
<div class="modal fade" id="update-purchased-status-modal-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Status</h4> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          {{-- Form Start.......................... --}}
          <form id="form" class="form-horizontal" action="{{url('update-packaging-order-purchase-status')}}" method="POST">
              @csrf
              @method('PUT')  
            <input type="text" name="selected-order-id" id="selected-order-id">
            <br><br>
            <div class="form-group row">
                <label for="purchase_status" class="col-sm-2 control-label">Select Status</label>
                   <div class="col-sm-10"> 
                       <select class="form-control" name="packaging_order_purchase_status" id="packaging_order_purchase_status">
                        <option selected="" value="Purchased">Purchased</option>
                        <option value="Unpurchased">Not Purchased</option>
                        </select>
                     </select>
                   </div> 
               </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update Status</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
  

