@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DurbinX Delivery List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Orders</li>
                        <li class="breadcrumb-item active">DurbinX List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-white">
                    <button id="export" class="btn btn-info">Export Delivery Details As Excel</button>
                    <button class="btn btn-primary" onclick="createPDF()">Print Delivery Details</button>
                    <p class="font-weight-bold mt-4"> Courier : DurbinX</p>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-bordered table-hover data_table ">
                                <thead>
                                    <tr role="row">
                                        <th style="width:4%">Invoice</th>
                                        <th style="width:4%">Seller Name</th>
                                        <th style="width:4%">Seller Phone</th>
                                        <th style="width:4%">Customer Name</th>
                                        <th style="width:4%">Customer Phone</th>
                                        <th style="width:4%">Customer Address</th>
                                        <th style="width:4%">Price</th>
                                        <th style="width:4%">Items</th>
                                        <th style="width:4%">Qty</th>
                                        <th style="width:4%">Instruction</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $order )
                                    <tr role="row">
                                        <td>{{$order->invoice_no}}</td>
                                        <td>{{$order->shop_name}}</td>
                                        <td>{{$order->shop_phone}}</td>
                                        <td>{{$order->customer_name}}</td>
                                        <td>{{$order->customer_phone}}</td>
                                        <td>{{$order->shipping_address}}</td>
                                        <td>{{$order->circle_price}}</td>
                                        <td>{{$order->product_name}}</td>
                                        <td>{{$order->quantity}}</td>
                                        <td>{{$order->remarks}}</td>
                                    </tr>
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- /.card-body -->
            </div> <!-- /.card -->
        </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection
