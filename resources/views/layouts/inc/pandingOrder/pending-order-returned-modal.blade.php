<div class="modal fade" id="pending-order-returned-id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 800px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title font-weight-bold"></h5> 
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
          {{-- Form Start.......................... --}}
          <form id="form" class="form-horizontal" action="{{url('update-pending-order-returned')}}" method="POST">
              @csrf
              @method('PUT')  
            <input type="hidden" name="pending_returned_order" id="pending_returnedOrder_id">
            {{-- <input type="text" id="pending_returned_order_code" name="pending_returned_order_code"><br><br> --}}
           <div class="form-group row">
                <label for="refund" class="col-sm-3 control-label">Return Reason</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" id="" name="pending_order_return_reason">
                </div>
            </div> 
            <div class="text-center">
                <p>RETURN PRODUCT FROM ORDER ID</p>
                <h2 id="pending_returned_order_id" class="bold"></h2> 
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

