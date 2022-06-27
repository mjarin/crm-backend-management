@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Packaging Orders List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home</li>
            <li class="breadcrumb-item">Order</li>
            <li class="breadcrumb-item active">Packaging Orders</li>
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
              <p class="mt-2" id="result">Total Number of Items Selected = <p>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table class="table table-bordered table-hover data_table ">
            <thead>
            <tr>
            <th style="width:10%">Order Date</th>
            <th style="width:10%">Order ID</th>
                 <th style="width:7%">Seller Shop Namer</th>
                 <th style="width:8%">Customer</th>
                 <th style="width:10%">Address</th>
                 <th style="width:10%">Products</th>
                 <th style="width:10%">Status</th>
                  <th style="width:7%">Circle Price</th>
                 <th style="width:8%">Collected Price</th>
                 <th style="width:8%">Delivery Man</th>
                 <th style="width:7%">Delivery Date</th> 
                 <th style="width:15%">Tools</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($packaging_orders as $order)
                   <tr> 
                    <td>{{$order->date}}</td> 
                    <td>{{$order->code}}</td>
                    <td>{{$order->shop_name}}</td> 
                    <td>{{$order->customer_name}}</td> 
                    <td>{{$order->address}}</td> 
                    <td>{{$order->product_name}}</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>{{$order->circle_price}}</td> 
                    <td>{{$order->collected_price}}</td> 
                    <td>{{$order->delivery_man}}</td>
                    <td>{{$order->delivery_date}}</td>
                    {{-- Toools td starts--}} 
                    <td>
 {{-- Update button.......................................................--}}                      
<button type="button" class="btn btn-success btn-sm btn-flat editButton-readyToPackagingOrder" value="{{$order->id}}" 
 data-toggle="modal" data-target="#ReadyToPackagingOrder_id"><i class="fa fa-edit"></i></button>
 {{-- View button.......................................................--}}   
<a href="{{url('view-single-packaging-order/'.$order->id)}}">
<button class="btn btn-warning btn-sm btn-flat"><i class="fa fa-eye"></i></button></a>
{{-- delete//trash button.......................................................--}} 
<br>
<a href="#"><button class="btn btn-danger btn-sm btn-flat delete" data-sid="67452"><i class="fa fa-trash"></i></button></a>
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
</div>
{{--End of File button.......................................................--}}
</div>
</td>
</tr> 
@endforeach
{{-- Toools tr End--}}  
               
<!-- Modal -->
<div class="modal fade" id="ReadyToPackagingOrder_id" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 800px!important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">Order Code : <span id="readyToPackagingOrderCode"></span></h5> 
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        {{--ready-to-packging Form Included --}}
        @include('layouts.inc.readyToPackgingOrder.form-ready-to-packging')
      </div>
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

