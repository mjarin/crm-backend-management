<div class="modal fade" id="delete_courier_modal_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px!important;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body px-5">
                <form id="form" class="form-horizontal" action="{{ url('delete-courier') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="courier_id" id="courier_id">
                    <div class="form-group row">
                        <div class="col-sm-12 text-center">
                            <p class="text-uppercase">Delete Courier</p>
                            <h4 class="font-weight-bold" id="h2_id"></h4>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger"><i class="fa fa-trash mr-2">
                            </i>Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
