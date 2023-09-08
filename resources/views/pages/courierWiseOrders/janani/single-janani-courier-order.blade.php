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
              @foreach($janani_order as $order)
              <button type="button" class="btn btn-success janani-puchase-status-btn" data-toggle="modal" 
                data-target="#janani-puchase-status-modal" value="{{$order->id}}">
                <i class="fa fa-plus-circle"></i> Update Purchase Status</button>
			    @endforeach 
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table class="table table-bordered table-hover data_table ">
            <thead>
            <tr>
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
                   @foreach ($janani_order as $order)
                   <tr> 
                    <td><input name='checkme[]' id="order" type='checkbox' value=''></td>
                    <td>{{$order->date}}</td> 
                    <td>{{$order->sku}}</td>
                    <td>{{$order->product_name}}</td> 
                    <td><img src="{{asset('images/'.$order->photos)}}" alt="product_img"  style="max-width:100px;"></td>
                    <td>{{$order->variation}}</td>
                    <td>{{$order->quantity}}</td>
                    <td>{{$order->circle_price}}</td>
                    <td>{{$order->selling_price}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>{{$order->po_status}}</td>

<td>{{-- Update Button --}}
<button class="btn btn-success btn-sm btn-flat edit-btn-jananiOrderDeatails" value="{{$order->id}}" data-toggle="modal" 
data-target="#janani_order_details_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Update</button><br>
{{-- Returned Button --}}
<button class="btn btn-info btn-sm btn-flat returned-janani-order-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#janani_order_returned_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Returned</button><br> 
{{-- Purchased Button --}}
<a href="{{url('purchased-janani-order/'.$order->id)}}" target="”_blank”"><button class="btn btn-primary btn-flat"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Purchased</button></a> <br>
<button class="btn btn-danger btn-sm btn-flat delete"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button>
<a href="#" target="”_blank”"><button class="btn btn-info btn-sm btn-flat "><i class="fa fa-edit"></i> Processed</button></a></td>                  
 @endforeach 
</tbody> 
 </table>
            @include('layouts.inc.CourierWiseOrders.janani.janani-order-update-details-modal')  
            @include('layouts.inc.CourierWiseOrders.janani.janani-order-returned-modal')
            @include('layouts.inc.CourierWiseOrders.janani.janani-purchase-status-modal')
            

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

