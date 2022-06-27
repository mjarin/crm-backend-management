<div class="modal fade" id="add_customer_data_modal_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 700px!important;" role="document">
      <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title font-weight-bold">Order Code : <span></span></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body px-5">
            {{-- Form start --}}

            <form id="form" class="form-horizontal" action="{{url('add-new-customer-data')}}" method="POST">
                @csrf
                @method('PUT')  
                <div class="form-group row">
                    <input type="hidden"  name="id" id="id">
                  <label for="" class="col-sm-2 col-form-label">Id</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control"  name="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="advancePayment" class="col-sm-2 col-form-label">Name</label>
                  <div class="col-sm-10">
                    <input type="text"  class="form-control" name="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label" >Phone</label> 
                  <div class="col-sm-10">
                  <input type="text" class="form-control" name="">
                  </div>
                </div>
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label"> Email</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="">
                  </div>
                </div>
            
                <div class="form-group row">
                  <label for="" class="col-sm-2 col-form-label">Address</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" name="">
                  </div>
                </div>
            
                <div class="form-group row">
                  <label for="position" class="col-sm-2 control-label">City </label>
                  <div class="col-sm-10">
                              <select class="form-control" name="">
                                 @foreach ($cities as $city)
                                 <option value="{{$city->name}}">{{$city->name}}</option>
                                 @endforeach					       
                                </select>
                         </div>
                     </div>
            
                     <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Postal Code</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" name="password" id="password">
                      </div>
                    </div> 
        
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-success">Update Order</button>
                  </div>
              </form>