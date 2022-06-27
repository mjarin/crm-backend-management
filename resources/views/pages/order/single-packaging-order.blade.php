@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home</li>
            <li class="breadcrumb-item">Order</li>
            <li class="breadcrumb-item active">Order Details</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
        <div class="col-md-12 ">
            <div class="card">
                <div class="card-header bg-white"> 
                  @foreach ($packaging_orders as $order)      
                    <button type="button" class="btn btn-success edit-purchased-status" 
                    value="{{$order->id}}" data-toggle="modal" data-target="#update-purchased-status-modal-id">
                    <i class="fa fa-plus-circle mr-1"></i>
                  Update Purchase Status </button>
                    @endforeach        
                  </div><!-- /.card-header -->

                <div class="card-body scrollable">
                    <div class="col-md-12 col-sm-12">
                        <table class="table table-bordered table-hover data_table  no-footer" role="grid">
                            <thead>
                                <tr role="row">
                                    <th class="sorting_disabled" rowspan="1" colspan="1"><input type="checkbox"
                                     onclick="checkAll(this)"> SL.</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Date</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">SKU</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Product Name</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Image</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Variation</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Quantity</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Circle Price (Unit)</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Selling Price (Unit)</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Status</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">PO Status</th>
                                    <th class="sorting_disabled" rowspan="1" colspan="1">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                   @foreach ($packaging_orders as $order)
                   <tr> 
                    <td><input name='checkme[]' id="order" type='checkbox' value='67371'></td>
                    <td>{{$order->date}}</td> 
                    <td>{{$order->sku }}</td>
                    <td>{{ $order->product_name }}</td> 
                    <td><img src="{{ asset('images/' . $order->photos) }}" alt="product_img"
                      style="max-width:100px; max-height=100px;"></td>
                      <td>{{ $order->variation }}</td>
                      <td>{{ $order->quantity }}</td>
                      <td>{{ $order->circle_price }}</td>
                      <td>{{ $order->selling_price }}</td>
                      <td>{{ $order->delivery_status }}</td>
                      <td>{{ $order->po_status }}</td>
                    </td>
                    {{-- Toools td starts--}} 
                    <td>
{{-- Update Button --}}
<button class="btn btn-success btn-sm btn-flat  edit-packaging-order-deatail-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#packaging-order-details_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Update</button>
{{-- Returned Button --}}
<button class="btn btn-info btn-sm btn-flat  return-packaging-order-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#packaging-order-returned_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Returned</button> 
{{-- Purchased Button --}}
<a href="" target="”_blank”"><button class="btn btn-primary btn-sm btn-flat mt-1"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Purchased</button></a> 
<button class="btn btn-danger btn-sm btn-flat  delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button> <br>
{{-- Processed Button --}}
<a href="#" target="”_blank”"><button class="btn btn-info btn-sm btn-flat mt-1 "><i class="fa fa-edit"></i> Processed</button></a>
                    </td>
                   </tr>                    
                @endforeach 
                </tbody> 
              </table>

            @include('layouts.inc.readyToPackgingOrder.packaging-order-update-modal')
            @include('layouts.inc.readyToPackgingOrder.packaging-order-returned-modal') 
            @include('layouts.inc.readyToPackgingOrder.update-purchased-status-modal') 
            

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        {{-- </div> --}}
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->    
@endsection

