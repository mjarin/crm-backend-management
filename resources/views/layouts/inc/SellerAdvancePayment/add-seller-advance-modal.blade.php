<div class="modal fade" id="seller-advance-payment-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px!important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title font-weight-bold">Add Seller Advance</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5">

                <form id="form" class="form-horizontal" action="{{ url('add-seller-advance-payment') }}"
                    method="POST">
                    @csrf
                    {{-- @method('PUT') --}}
                    <div class="form-group row">
                        <label for="order_id" class="col-sm-3 col-form-label">Order ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="order_id">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="advance_amount" class="col-sm-3 col-form-label">Advance Amount</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="advance_amount">
                        </div>
                    </div>
                    <br>
                    <div class="form-group row">
                        <label for="transaction_id" class="col-sm-3 col-form-label">Transaction ID</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="transaction_id">
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="transaction_date" class="col-sm-3 col-form-label">Transaction Date</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control datepicker" name="transaction_date">
                        </div>
                    </div>

                    <div class="form-group row">
                      <label for="transaction_date" class="col-sm-3 col-form-label">Transaction Method</label>
                      <div class="col-sm-9">
                          <input type="text" class="form-control" name="transaction_method">
                      </div>
                  </div>

                     <div class="form-group row">
                        <label for="transaction_date" class="col-sm-3 col-form-label">Created By</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="created_by">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success"><i class="fa fa-save mr-2"></i>Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
