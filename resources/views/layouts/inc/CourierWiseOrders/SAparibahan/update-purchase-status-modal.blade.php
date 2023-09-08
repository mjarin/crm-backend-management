
<div class="modal fade" id="SAparibahan-puchase-status-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:700px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Update Status</h4> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          {{-- Form Start.......................... --}}
          <form id="form" class="form-horizontal" action="{{url('update-purchase-status-sa-paribahan')}}" method="POST">
              @csrf
              @method('PUT')  
            <input type="hidden" name="sa-paribahan-order-id" id="sa-paribahan-order-id">
            <br><br>
            <div class="form-group row">
                <label for="purchase_status" class="col-sm-3 control-label">Select Status</label>
                   <div class="col-sm-9"> 
                       <select class="form-control" name="sa-paribahan_purchase_status" id="saParibahan_purchase_status">
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
  

