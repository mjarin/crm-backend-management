<div class="modal fade" id="add-delivery-man-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold"></h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          <form id="form" class="form-horizontal" action="{{url('add-delivery-man-details')}}" method="POST">
              @csrf
                <div class="form-group row"> 
                  <label for="" class="col-sm-2 col-form-label">ID</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" name="delivery_man_id" id="delivery_man_id" >
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="name" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="delivery_man_name" >
                  </div>
                </div>
                <br>
                <div class="form-group row">
                  <label for="delivery_man_phone" class="col-sm-2 col-form-label">Phone</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="delivery_man_phone">
                  </div>
                </div>
            
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Save</button>
                  </div>
              </form>
        </div>
      </div>
    </div>
  </div>