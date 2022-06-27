<div class="modal fade" id="rtd-purchased-status_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold">Update Status</h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          {{-- Form Start.......................... --}}
          <form id="form" class="form-horizontal" action="{{url('update-purchase-status-rtd')}}" method="POST">
              @csrf
              @method('PUT')  
            <input type="hidden" name="order_id" id="order_id">

            <div class="form-group row">
                <label for="status" class="col-sm-3 control-label font-weight-bold">Select Status</label>
                <div class="col-sm-9">
                 <select class="form-control" name="status_name" id="status" required="">
                <option value="Purchased" slected="">Purchased</option>
                <option value="Unpurchased">Not Purchased</option>     
               </select>
            </div>
        </div>
            <div class="modal-footer mt-5">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-success">Update</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>

