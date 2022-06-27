@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>On Hold Orders List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home</li>
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
            <div class="card-header bg-white py-4">
              <button id="export" class="btn btn-info">Export Reports As Excel</button>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table class="table table-bordered table-hover data_table ">
            <thead>
            <tr role="row">
            <th style="width:15%">Order Date</th>
            <th style="width:15%">Order ID</th>
                 <th style="width:20%">Seller Shop Name</th> 
                 <th style="width:10%">Customer</th>
                 <th style="width:10%">Address</th>
                 <th style="width:10%">Ordered Items</th>
                 <th style="width:5%">Status</th>
                 <th style="width:5%">Priority</th>
                  <th style="width:10%">Circle Price</th>
                 <th style="width:8%">Collected Price</th>
                 <th style="width:8%">Delivery Man</th>
                 <th style="width:10%">Delivery Date</th>
                 <th style="width:20%">Product Status</th>
                 <th style="width:20%">Remarks</th> 
                 <th style="width:15%">Tools</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($orders as $order)
                   <tr role="row"> 
                    <td>{{$order->date}}</td> 
                    <td>{{$order->id}}</td>
                    <td>{{$order->shop_name}}</td> 
                    <td>{{$order->customer_name}}</td> 
                    <td>{{$order->address}}</td>
                    <td>{{$order->product_name}}</td> 
                    <td>{{$order->delivery_status}}</td>
                    <td><b class="text-danger font-weight-bold">High</b></td>
                    <td>{{$order->circle_price}} </td> 
                    <td>{{$order->collected_price}}</td> 
                    <td>{{$order->delivery_man}}</td>
                    <td>{{$order->delivery_date}}</td> 
                    <td>{{$order->po_status}}</td>
                    <td>{{$order->remarks}}</td>
                    <td>{{-- Toools td starts--}} 
{{-- Update button.......................................................--}}  
<button type="button" class="btn btn-success in-stock-order-btn border-radius-none"  value="{{$order->id}}" data-toggle="modal" 
data-target="#in-stock-order-modal-id"><i class="fa fa-edit"></i></button><br> 
{{-- View button.......................................................--}} 
<a href="{{url('view-in-stock-order-details/'.$order->id)}}">
<button class="btn btn-warning border-radius-none text-white" ><i class="fa fa-eye"></i></button>
</a>
<br>
{{-- delete//trash button.......................................................--}} 
<a href="#">
 <button class="btn btn-danger border-radius-none" value="{{$order->id}}"><i class="fa fa-trash"></i>
</button>
</a>

{{--File button.......................................................--}}
                     <div class="dropdown-menu"> 
                       <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown" ><i class="fa fa-file"></i>
                       <span class="caret"></span></button>
                       </div>
                        <div class="btn-group">
                        <button type="button" class="btn btn-info  border-radius-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                      </div>{{-- End of file div--}}  
                      </td>{{-- Toools td End--}} 
                  </tr> 
@endforeach {{-- End of foreach--}}  
                  
<!-- Modal -->
@include('layouts.inc.InStockOrders.in-stock-orders-update-modal')

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

