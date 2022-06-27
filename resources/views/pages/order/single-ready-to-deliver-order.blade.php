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
            <li class="breadcrumb-item">Ready to Deliver Orders</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  @if (session('success'))
  <div class="alert  alert-success alert-dismissible" 
  style="background-color:#00A65A!important;height:10%!important; color:#fff!important; ">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h4><i class="icon fa fa-check"></i> Success!</h4>
      {{ session('success') }}
  </div>
@endif

  <!-- Main content -->
  <section class="content">
      <div class="row">
        {{-- <div class="col-md-12"> --}}
          <div class="card">
            <div class="card-header bg-white py-4">
              @foreach ($ready_to_deliver_order as $order)
              <button type="button" class="btn btn-success rdt-edit-btn" 
              value="{{$order->id}}" data-toggle="modal" data-target="#rtd-purchased-status_modal"><i class="fa fa-plus-circle"></i> 
              Update Purchase Status</button>
              @endforeach 
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
              <div class="col-md-12">
            <table class="table table-bordered table-hover data_table ">
            <thead>
            <tr role="row">
            <th><input type="checkbox"  onclick="checkAll(this)"> SL.</th>
            <th style="width:10%">Date</th>
            <th style="width:5%">SKU</th>
                 <th style="width:20%">Product Name</th>
                 <th style="width:8%">Image</th>
                 <th style="width:10%">Variation</th>
                 <th style="width:10%">Quantity</th>
                 <th style="width:10%">Circle Price (Unit)</th>
                 <th style="width:5%">Selling Price (Unit)</th>
                 <th style="width:5%">Status</th>
                 <th style="width:8%">PO Status</th>
                 <th style="width:10%">Tools</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($ready_to_deliver_order as $order)
                   <tr> 
                    <td><input name='checkme[]' id="order" type='checkbox' value='67371'></td>
                    <td>{{$order->date}}</td> 
                    <td>{{$order->sku}}</td>
                    <td>{{$order->product_name}}</td> 
                    <td><img src="{{asset('images/'.$order->photos)}}" alt="product_img"  style="width=120px; max-width:100px;"></td>
                    <td>{{ $order->variation }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->circle_price }}</td> 
                    <td>{{ $order->selling_price }}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td> {{ $order->po_status}}</td>
                    {{-- Toools td starts--}} 
                    <td>
{{-- Update Button --}}
<button class="btn btn-success btn-sm btn-flat edit-ready-to-deliver-deatail-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#ready_to_deliver_details_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Update</button>
{{-- Returned Button --}}
<button class="btn btn-info btn-sm btn-flat return-ready-to-deliver-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#ready-to-deliver-order-returned_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Returned</button>
{{-- Purchased Button --}}
<a href="{{url('purchased-ready-to-deliver-order/'.$order->id)}}" target="”_blank”"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Purchased</button></a>
<button class="btn btn-danger btn-sm btn-flat delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button>
<a href="#" target="”_blank”"><button class="btn-info btn-sm btn-flat"><i class="fa fa-edit"></i> Processed</button></a>
                    </td>
                   </tr>                    
                @endforeach 
                </tbody> 
              </table>
            </div>

            @include('layouts.inc.readyToDeliverOrder.ready-to-deliver-update-details-modal')  
            @include('layouts.inc.readyToDeliverOrder.ready-to-deliver-returned-modal') 
            @include('layouts.inc.readyToDeliverOrder.rtd-update-purchased-status-modal') 
            

            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        {{-- </div> --}}
        <!-- /.col -->
      </div>
      <!-- /.row -->
  </section>
  <!-- /.content -->    
@endsection

