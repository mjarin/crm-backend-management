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
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
            <a href="#">Home</a></li>
            <li class="breadcrumb-item active">On Hold Orders</li>
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
              <div class="col-md-12">
                @foreach($orders as $order)
                <button type="button" class="btn btn-success ohder-btn-purchase-status" data-toggle="modal" 
                data-target="#ohd-update-purchase-status" value="{{ $order->id}}"><i class="fa fa-plus-circle"></i> 
                Update Purchase Status</button>
                @endforeach 
              </div>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
              <div class="col-md-12">
            <table class="table table-bordered table-hover data_table ">
              <thead>
                <tr role="row">
                  <th style="width:8%;">
                    <input type="checkbox" onclick="checkAll(this)" /> SL.
                  </th>
                  <th style="width:8%;">Date</th>
                  <th style="width:5%;">SKU</th>
                  <th style="width:10%;">Product Name</th>
                  <th style="width:10%;">Image</th>
                  <th style="width:10%;">Variation</th>
                  <th style="width:10%;">Quantity</th>
                  <th style="width:10%;">Circle Price (Unit)</th>
                  <th style="width:10%;"> Selling Price (Unit)</th>
                  <th style="width:10%;">Status</th>
                  <th style="width:10%;">PO Status</th>
                  <th style="width:10%;">Tools</th>
                </tr>
              </thead>
                <tbody>
                   @foreach ($orders as $order)
                   <tr role="row"> 
                    <td><input name='checkme[]' id="order" type='checkbox' value='67371'></td>
                    <td>{{$order->date}}</td>
                    <td>{{$order->sku}}</td>
                    <td>{{$order->product_name}}</td> 
                    <td><img src="{{asset('images/'.$order->photos)}}" alt="product_img"  style="width=120px; max-width:100px;"></td>
                    <td>{{ $order->variation }}</td>
                    <td>{{$order->quantity }}</td>
                    <td>{{$order->circle_price }}</td>
                    <td>{{$order->selling_price }}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>{{ $order->po_status}}</td>
                    
                    {{-- Toools td starts--}} 
                    <td>
{{-- Update Button --}}
<button class="btn btn-success btn-sm btn-flat on-hold-order-deatail-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#on_hold_order_deatils_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Update</button><br>
{{-- Returned Button --}}
<button class="btn btn-info btn-sm btn-flat returned-on-hold-order-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#on-hold-order-returned-id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Returned</button><br> 
{{-- Purchased Button --}}
<a href="{{url('purchased-ready-to-deliver-order/'.$order->id)}}" target="”_blank”"><button class="btn btn-primary btn-sm btn-flat "><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Purchased</button></a> <br>
<button class="btn btn-danger btn-sm btn-flat delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button>
<a href="#" target="”_blank”"><button class="btn btn-info btn-sm btn-flat "><i class="fa fa-edit"></i> Processed</button></a>
                    </td>
                   </tr>                    
                @endforeach 
                </tbody> 
              </table>
            </div>

            @include('layouts.inc.OnHoldOrders.on-hold-order-update-details-modal')  
            @include('layouts.inc.OnHoldOrders.on-hold-order-returned-modal')
            @include('layouts.inc.OnHoldOrders.update-purchase-status-modal')  
            

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

