@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Delivered Orders List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item active">Delivered Orders</li>
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
                        <p class="mt-2" id="result">Total Number of Items Selected =
                        <p>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body scrollable">
                        <table id="" class="table table-bordered table-hover data_table ">
                            <thead>
                                <tr>
                                    <th style="width:10%">Order Date</th>
                                    <th style="width:10%">Order ID</th>
                                    <th style="width:20%">Seller Shop Name</th>
                                    <th style="width:15%">Customer</th>
                                    <th style="width:25%">Address</th>
                                    <th style="width:5%">Status</th>
                                    <th style="width:20%">Account Status</th>
                                    <th style="width:25%">Collected Price</th>
                                    <th style="width:25%">Delivery Man</th>
                                    <th style="width:25%">Delivery Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($delivered_orders as $order)
                                    <tr>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ $order->id }}</td>
                                        <td>Source N Supply</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->shipping_address }}</td>
                                        <td>{{ $order->delivery_status }}</td>
                                        <td><b class="text-danger">Not Received</b></td>
                                        <td>{{ $order->collected_price }}</td>
                                        <td>{{ $order->delivery_man }}</td>
                                        <td>{{ $order->delivery_date }}</td>
                                    </tr>
                                @endforeach{{-- Toools tr End --}}
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
