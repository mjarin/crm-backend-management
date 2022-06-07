@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Processing Orders List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
            <a href="#">Home</a></li>
            <li class="breadcrumb-item">Order</li>
            <li class="breadcrumb-item active">Processing Orders</li>
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
            <table id=""  class="table table-bordered table-hover data_table ">
            <thead>
            <tr>
            {{-- <th><input type="checkbox"  onclick="checkAll(this)"> SL.</th> --}}
            <th style="width:7%">Order Date</th>
            <th style="width:6%">Order ID</th> 
                 <th style="width:10%">Seller Shop Name</th>
                 <th style="width:8%">Customer</th>
                 <th style="width:10%">Address</th>
                 <th style="width:10%">Ordered Items</th>
                 <th style="width:10%">Supplier</th>
                 <th style="width:5%">Status</th>
                 <th style="width:5%">Priority</th>
                  <th style="width:10%">Circle Price</th>
                 <th style="width:10%">Collected Price</th>
                 <th style="width:8%">Delivery Man</th>
                 <th style="width:7%">Delivery Date</th>
                 <th style="width:10%">Product Status</th>  
                 <th style="width:5%">Remarks</th>
                 <th style="width:15%">Tools</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($orders as $order)
                   <tr> 
                    <td>{{$order->date}}</td> 
                    <td>{{$order->code}}</td>
                    <td>Demo Seller Shop</td>
                    <td>{{$order->customer_name}}</td> 
                    {{-- <td>{{$order->seller_id}}</td>  --}}
                    <td>{{$order->shipping_address}}</td> 
                    <td>OrderItem</td>
                    <td>Supplier</td>
                    <td>{{$order->delivery_status}}</td>
                    <td>High</td> 
                    {{-- <td></td> --}}
                    <td>
                      {{-- {{$order->orderDetails->circle_price}} --}}
                      @foreach($order->orderDetails as $orderdetails)
                         {{ $orderdetails->circle_price }}
                      @endforeach 
                    </td> 
                    <td>{{$order->collected_price}}</td> 
                    <td>{{$order->delivery_man}}</td>
                    <td>{{$order->delivery_date}}</td>
                    <td>                     
                        @foreach($order->orderDetails as $orderdetails)
                        {{ $orderdetails->po_status}}
                        @endforeach </td>
                    <td>
                    {{$order->remarks}}</td>
                    {{-- Toools td starts--}} 
                    <td>
                      <button type="button" value="{{$order->id}}" class="btn btn-success btn-sm btn-flat edit-btn-processing-order" 
                            data-toggle="modal" data-target="#processing-order-modal">
                       <i class="fa fa-edit"></i></button>
                       <br>
                      <a href="{{url('view-single-processing-order/'.$order->id)}}">
                      <button class="btn btn-warning btn-sm btn-flat"><i class="fa fa-eye"></i></button></a>
                      {{-- <a href="#"><button class="btn btn-warning btn-sm btn-flat"><i class="fa fa-plus"></i></button>
                      </a> --}}
                      <br>
                      <a href="#">
                      <button class="btn btn-danger btn-sm btn-flat delete" data-sid=""><i class="fa fa-trash"></i>
                      </button>
                       </a>
                       <br>
                      <div class="dropdown-menu"> 
                       <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown"><i class="fa fa-file"></i>
                       <span class="caret"></span></button>
                       </div>
                        <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                         <i class="fa fa-file"></i>
                        </button>
                        <div class="dropdown-menu">
                           
                           <li><a href="" target="”_blank”" class="text-dark ml-3">Seller Invoice</a></li>
                          <li><a href="" target="”_blank”"  class="text-dark ml-3">Customer Invoice</a></li>
                          <li><a href="#" target="”_blank”" class="text-dark ml-3">Update Address</a></li>
                          <li><a href="#" target="”_blank”" class="text-dark ml-3">Update Order</a></li>
                          <li><a href="#" target="”_blank”" class="text-dark ml-3">Add Details</a></li>
                          <li><a href="#" target="”_blank”" class="text-dark ml-3">Add Details 2</a></li>
                          <li><a href="#" target="”_blank”" class="text-dark ml-3">Add Details 3</a></li>
                          
                       </div>
                      </div>
                      </td>
                  {{-- Toools td End--}}  
                  </tr>

@endforeach                    
{{-- Modal for edit --}} 
<!-- Modal -->
<div class="modal fade" id="processing-order-modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width: 800px!important;" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title font-weight-bold">Order Code : <span class="font-weight-bold" id="processingOrderCode"></span></h5>  
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body px-5">
        {{-- form for editing --}}
       @include('layouts.inc.processingOrder.form-processing-order') 
       
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

{{--   
<script type="text/javascript">
  $(function(){

   $('#datepicker').datepicker();

  });

</script> --}}
  
@endsection


