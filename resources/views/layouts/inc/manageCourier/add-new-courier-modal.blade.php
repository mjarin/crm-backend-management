<div class="modal fade" id="add_new_modal_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Add Courier</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
            <form id="form" class="form-horizontal" action="{{url('add-new-courier')}}" method="POST">
                @csrf
                <div class="form-group row">
                  <label for="" class="col-sm-3 col-form-label">Courier Name</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control"  name="courier_name">
                  </div>
                </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Order</button>
                  </div>
              </form>