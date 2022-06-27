<div class="modal fade" id="sss" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Update Status</h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5 py-5">
          <form id="form" class="form-horizontal" action="{{url('update-status-intro')}}" method="POST">
              @csrf
              @method('PUT')  
            <input type="hidden" name="hidden_input_id" id="hidden_input_id">
            
				
            <div class="form-group">
                <label for="employee" class="col-sm-3 control-label">Select Status</label>
              
                <div class="col-sm-9">
                  <select class="form-control" name="delivery_status" id="edit_delivery">
                    <option value="returning">Returning</option>
                  </select>
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

