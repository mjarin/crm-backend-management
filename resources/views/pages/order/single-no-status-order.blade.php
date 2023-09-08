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
    <div class="container-fluid">
      <div class="row">
        {{-- <div class="col-md-12"> --}}
          <div class="card">
            <div class="card-header bg-white">
              @foreach ($no_status_order as $order)
              <button type="button" class="btn btn-success no-status-order-edit mb-3 " data-toggle="modal" 
              data-target="#ns-update-purchase-status-id" value="{{ $order->id }}">
              <i class="fa fa-plus-circle mr-1"></i> Update Purchase Status</button>
              @endforeach 
              {{-- <p class="mt-3" id="result">Total Number of Items Selected = 0 <p> --}}
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table class="table table-bordered data_table_noStatus">
            <thead>
              <tr role="row">
                <th class="" rowspan="1" colspan="1"><input type="checkbox" onclick="checkAll(this)"> SL.</th>
                <th class="" rowspan="1" colspan="1">Date</th>
                <th class="" rowspan="1" colspan="1">SKU</th>
                <th class="" rowspan="1" colspan="1">Product Name</th>
                <th class="" rowspan="1" colspan="1">Image</th>
                <th class="" rowspan="1" colspan="1">Variation</th>
                <th class="" rowspan="1" colspan="1">Quantity</th>
                <th class="" rowspan="1" colspan="1">Circle Price (Unit)</th>
                <th class="" rowspan="1" colspan="1">Selling Price (Unit)</th>
                <th class="" rowspan="1" colspan="1">Status</th>
                <th class="" rowspan="1" colspan="1">PO Status</th>
                <th class="" rowspan="1" colspan="1">Tools</th>
            </tr>
                </thead>
                <tbody>
                   @foreach ($no_status_order as $order)
                   <tr> 
                    <td><input name='checkme[]' id="order" type='checkbox' value=''></td>
                    <td>{{$order->date}}</td> 
                    <td>{{$order->sku}}</td>
                    <td>{{$order->product_name}}</td> 
                    <td><img src="{{asset('images/'.$order->photos)}}" alt="product_img"  style="max-width:70px;"></td>
                    <td>{{$order->variation}}</td> 
                    <td>{{$order->quantity}}</td> 
                    <td>{{$order->circle_price}}</td> 
                    <td>{{$order->selling_price}}</td> 
                    <td>{{$order->delivery_status}}</td> 
                    <td>{{$order->po_status}}</td>
                    {{-- Toools td starts--}} 
                    <td>
{{-- Update Button --}}
<button class="btn btn-success btn-sm btn-flat edit-no-status-order-deatails" value="{{$order->id}}" data-toggle="modal" 
data-target="#no_status_order_details_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Update</button>
{{-- Returned Button --}}
<button class="btn btn-info btn-sm btn-flat returned-no-status-order-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#no_status_order_returned_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Returned</button> 
{{-- Purchased Button --}}
<a href="{{url('purchased-no-status-order/'.$order->id)}}" target="”_blank”"><button class="btn btn-primary btn-flat btn-sm"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Purchased</button></a> 
<button class="btn btn-danger btn-sm btn-flat delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button><br>
<a href="#" target="”_blank”"><button class="btn btn-info btn-sm btn-fla"><i class="fa fa-edit"></i> Processed</button></a>
                    </td>
                   </tr>                    
                @endforeach 
                </tbody> 
              </table>

            @include('layouts.inc.NoStatusOrders.no-status-order-update-details-modal')  
            @include('layouts.inc.NoStatusOrders.no-status-order-returned-modal')
            @include('layouts.inc.NoStatusOrders.update-purchase-status-modal') 
            

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

