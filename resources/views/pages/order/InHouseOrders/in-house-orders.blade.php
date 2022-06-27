@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>In House Orders List</h1> 
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home</li>
            <li class="breadcrumb-item active">In House Orders</li>
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
            <div class="card-header bg-white py-4">
             <button id="export" class="btn btn-info">Export Reports As Excel</button>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table id=""  class="table table-bordered table-hover data_table ">
                <thead>
                    <tr>
                    <th style="width: 100px;" class="" rowspan="1" colspan="1">Order Date</th>
                    <th style="width: 80px;" class="" rowspan="1" colspan="1">Order ID</th>
                    <th style="width: 150px;" class="" rowspan="1" colspan="1">Customer</th>
                    <th style="width: 150px;" class="" rowspan="1" colspan="1">Address</th>
                    <th style="width: 100px;" class="" rowspan="1" colspan="1">Status</th>
                    <th style="width: 100px;" class="" rowspan="1" colspan="1">Circle Price</th>
                    <th style="width: 100px;" class="" rowspan="1" colspan="1">Collected Price</th>
                    <th style="width: 100px;" class="" rowspan="1" colspan="1">Payment Status</th>
                    <th style="width: 150px;" class="" rowspan="1" colspan="1">Tools</th></tr>
                    </thead>
                <tbody>
                   @foreach ($orders as $order)
                   <tr> 
                    <td>{{$order->date}}</td> 
                    <td>{{$order->id}}</td>
                    <td>{{$order->customer_name}}</td> 
                    <td>{{$order->address}}</td> 
                    <td>{{$order->delivery_status}}</td>
                    <td>{{$order->circle_price}}</td>
                    <td>{{$order->collected_price}}</td>
                    <td  class="text-success font-weight-bold">{{$order->payment_status}}</td>
                    {{-- Toools td starts--}} 
                    <td>
{{-- Update button.......................................................--}}                        
<button type="button" class="btn btn-success btn-sm btn-flat edit-btn-in-house-order" value="{{$order->id}}" 
data-toggle="modal" data-target="#in_house_order_modal_id">
<i class="fa fa-edit"></i></button>
 {{-- View button.......................................................--}} 
<a href="{{url('view-single-in-house-order/'.$order->id)}}">
<button class="btn btn-warning btn-sm btn-flat" value="{{$order->id}}" ><i class="fa fa-eye"></i></button></a>
{{-- delete//trash button.......................................................--}} 
<a href="#">
<button class="btn btn-danger btn-sm btn-flat delete" value="{{$order->id}}" ><i class="fa fa-trash"></i>
</button></a>
{{--File button.......................................................--}}
<div class="dropdown-menu"> 
<button class="btn btn-primary btn-sm" type="button" data-toggle="dropdown"><i class="fa fa-file"></i>
<span class="caret"></span></button>
</div>
<div class="btn-group">
<button type="button" class="btn btn-primary btn-sm" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
 @include('layouts.inc.InHouseOrders.in-house-order-update-modal') 
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

