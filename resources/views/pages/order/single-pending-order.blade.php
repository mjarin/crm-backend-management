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
            <div class="card-header">
              <p class="mt-2" id="result">Total Number of Items Selected = <p>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table id=""  class="table table-bordered table-hover data_table ">
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
                 <th style="width:20%">Tools</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($orders as $order)
                   <tr> 
                    <td><input name='checkme[]' id="order" type='checkbox' value='67371'></td>
                    <td>{{$order->date}}</td> 
                    <td>TS2563</td>
                    <td>Premium Quality Half Sleeve Polo Shirt TS2563</td> 
                    <td><img src="{{asset('images/p-1.jpg')}}" alt="product_img" style="width=120px; max-width:120px; height=380px;"></td>
                    <td>
                      @foreach($order->orderDetails as $orderdetails)
                      {{ $orderdetails->variation}}
                      @endforeach 
                     </td>

                      <td>
                      @foreach($order->orderDetails as $orderdetails)
                      {{ $orderdetails->quantity}}
                      @endforeach 
                    </td>

                  <td>
                        @foreach($order->orderDetails as $orderdetails)
                           {{ $orderdetails->circle_price }}
                        @endforeach 
                      </td> 
                    <td>
                      @foreach($order->orderDetails as $orderdetails)
                      {{ $orderdetails->selling_price }}
                       @endforeach 
                    
                    </td>
                    <td>{{$order->delivery_status}}</td>
                    <td>
                        @foreach($order->orderDetails as $orderdetails)
                        {{ $orderdetails->po_status}}
                     @endforeach 
                    </td> 
                    {{-- Toools td starts--}} 
                    <td>
{{-- Update Button --}}
<button class="btn btn-success btn-sm btn-block update-peding-order-deatail-btn" value="{{$order->id}}" data-toggle="modal" 
data-target="#updt-pending-order-details"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Update</button><br>
{{-- Returned Button --}}
<button class="btn btn-info btn-sm btn-block pending-order-returned-btn" value="{{$order->id}}" data-toggle="modal"  
data-target="#pending-order-returned-id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Returned</button><br>
{{-- Purchased Button --}} 
<a href="{{url('purchased-pending-order/'.$order->id)}}"><button class="btn btn-primary btn-block"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Purchased</button></a><br>
{{-- Delete Button --}} 
<button class="btn btn-danger btn-sm btn-block delete" ><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button>
                    </td>
                   </tr>                    
                @endforeach 
                </tbody> 
              </table>

                <!-- Modals -->
                @include('layouts.inc.pandingOrder.pending-order-details-modal')
                @include('layouts.inc.pandingOrder.pending-order-returned-modal')

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

