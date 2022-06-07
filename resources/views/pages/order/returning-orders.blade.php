@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Returning Orders</h1> 
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
            <a href="#">Home</a></li>
            <li class="breadcrumb-item active">Returning Orders</li>
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
            <div class="card-header">
              <p class="mt-2" id="result">Total Number of Items Selected =<span>0</span><p>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table id=""  class="table table-bordered table-hover data_table ">
            <thead>
            <tr>
            <th><input type="checkbox"  onclick="checkAll(this)"> SL.</th>
            <th style="width:15%">Order Date</th>
            <th style="width:15%">Order ID</th>
                 <th style="width:20%">Seller Shop Name</th>
                 <th style="width:8%">Customer</th>
                 <th style="width:20%">Address</th>
                 <th style="width:15%">Products</th>
                 <th style="width:5%">Status</th>
                  <th style="width:15%">Circle Price</th>
                 <th style="width:15%">Collected Price</th>
                 <th style="width:20%">Delivery Man</th>
                 <th style="width:20%">Delivery Date</th>
                 <th style="width:15%">Remarks</th>
                 <th style="width:15%">Tools</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($returning_orders as $order)
                   <tr> 
                    <td><input name='checkme[]' id="order" type='checkbox' value=''></td>
                    <td>{{$order->date}}</td> 
                    <td>{{$order->code}}</td>
                    <td>Source N Supply</td> 
                    <td>{{$order->customer_name}}</td> 
                    <td>{{$order->shipping_address}}</td> 
                    <td>Mex175 - 1( Cotton)</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                      {{-- {{$order->orderDetails->circle_price}} --}}
                      @foreach($order->orderDetails as $orderdetails)
                         {{ $orderdetails->circle_price }}
                      @endforeach 
                    </td> 
                    <td>{{$order->collected_price}}</td> 
                    <td>{{$order->delivery_man}}</td>
                    <td>{{$order->delivery_date}}</td> 
                    <td>{{$order->remarks}}</td>
                    {{-- Toools td starts--}} 
                    <td>
{{-- Update button.......................................................--}}                        
<button type="button" class="btn btn-success btn-sm btn-flat edit-btn-returning-order" value="{{$order->id}}" 
data-toggle="modal" data-target="#returning_order_modal_id">
<i class="fa fa-edit"></i></button>
 {{-- View button.......................................................--}} 
<a href="{{url('view-single-returning-order/'.$order->id)}}">
<button class="btn btn-warning btn-sm btn-flat" value="{{$order->id}}" ><i class="fa fa-eye"></i></button></a>
<br>
{{-- delete//trash button.......................................................--}} 
<a href="#">
<button class="btn btn-danger btn-sm btn-flat delete" value="{{$order->id}}" ><i class="fa fa-trash"></i>
</button></a>
{{--File button.......................................................--}}
<div class="dropdown-menu"> 
<button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-file"></i>
<span class="caret"></span></button>
</div>
<div class="btn-group">
<button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
<i class="fa fa-file"></i>
</button>
<div class="dropdown-menu">
  <li><a href="" target="”_blank”" class="text-dark ml-2">Seller Invoice</a></li>
 <li><a href="" target="”_blank”" class="text-dark ml-2">Customer Invoice</a></li>
 <li><a href="#" target="”_blank”" class="text-dark ml-2">Update Address</a></li>
 <li><a href="#" target="”_blank”" class="text-dark ml-2">Update Order</a></li>
 <li><a href="#" target="”_blank”" class="text-dark ml-2">Add Details</a></li>
 <li><a href="#" target="”_blank”" class="text-dark ml-2">Add Details 2</a></li>
 <li><a href="#" target="”_blank”" class="text-dark ml-2">Add Details 3</a></li>   
 </div>{{--End of File button.......................................................--}}
 </div>
 </td>
 </tr> 
 @endforeach{{-- Toools tr End--}}  
{{-- Modal for update--}}
 @include('layouts.inc.ReturningOrders.returning-order-update-modal') 
</div>
</div>
</div>

                </tbody> 
              </table>
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

