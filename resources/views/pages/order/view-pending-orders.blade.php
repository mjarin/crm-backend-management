@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pending Orders List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item active">Pending Orders</li>
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
                        <button id="export" class="btn btn-info mb-2">Export Reports As Excel</button>

                        <button type="button" class="btn btn-success mb-2" data-toggle="modal"
                            data-target="#update-status-pending-order">
                            <i class="fa fa-plus-circle"></i> Update Status</button>
                        <p class="mt-2" id="result">Total Number of Items Selected = 0
                        <p>
                    </div>
                    <!-- /.card-header -->

                    <div class="card-body scrollable">
                        <table class="table table-bordered data_table">
                            <thead>
                                <tr role="row">
                                    <th><input type="checkbox" onclick="checkAll(this)"> SL.</th>
                                    <th style="width:10%;">Date</th>
                                    <th style="width:10%;">Order Code</th>
                                    <th style="width:7%;">Seller</th>
                                    <th style="width:8%;">Customer</th>
                                    <th style="width:10%;">Address</th>
                                    <th style="width:10%;">Ordered Items</th>
                                    <th style="width:10%;">Supplier</th>
                                    <th style="width:5%;">Status</th>
                                    <th style="width:5%;">Priority</th>
                                    <th style="width:7%;">Circle Price</th>
                                    <th style="width:8%;">Collected Price</th>
                                    <th style="width:8%;">Delivery Man</th>
                                    <th style="width:7%;">Delivery Date</th>
                                    <th style="width:5%;">Remarks</th>
                                    <th style="width:25%;">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($orders as $order)
                                    <tr>
                                        <td><input name='checkme[]' id="order" type='checkbox' value='67371'></td>
                                        <td>{{ $order->date }}</td>
                                        <td>{{ $order->code }}</td>
                                        <td>{{ $order->shop_name }}</td>
                                        <td>{{ $order->customer_name }}</td>
                                        <td>{{ $order->shipping_address }}</td>
                                        <td>{{ $order->product_name }}</td>
                                        <td>{{ $order->supplier_name }}</td>
                                        <td>{{ $order->delivery_status }}</td>
                                        <td><span class="text-danger font-weight-bold">High</span></td>
                                        <td>{{ $order->circle_price }}</td>
                                        <td>{{ $order->collected_price }}</td>
                                        <td>{{ $order->delivery_man }}</td>
                                        <td>{{ $order->delivery_date }}</td>
                                        <td>{{ $order->remarks }}</td>
                                        {{-- Toools td starts --}}
                                        <td>
                                            <button type="button" class="btn btn-success btn-sm btn-flat edit-btn"
                                                value="{{ $order->id }}" data-toggle="modal" data-target="#edit">
                                                <i class="fa fa-edit"></i></button>
                                            <br>
                                            <a href="{{ url('view-single-pending-order/' . $order->id) }}">
                                                <button class="btn btn-warning btn-sm btn-flat"><i
                                                        class="fa fa-eye"></i></button>
                                            </a>
                                            <br>
                                            <a href="#"><button class="btn btn-info btn-sm btn-flat"><i
                                                        class="fa fa-plus"></i></button>
                                            </a>
                                            <br>
                                            <a href="#">
                                                <button class="btn btn-danger btn-sm btn-flat delete" data-sid=""><i
                                                        class="fa fa-trash"></i>
                                                </button>
                                            </a>

                                            <div class="dropdown-menu">
                                                <button class="btn btn-primary" type="button" data-toggle="dropdown"><i
                                                        class="fa fa-file"></i>
                                                    <span class="caret"></span></button>
                                            </div>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-file"></i>
                                                </button>
                                                <div class="dropdown-menu">

                                                    <li><a href="" target="”_blank”" class="text-dark ml-2">Seller
                                                            Invoice</a></li>
                                                    <li><a href="" target="”_blank”" class="text-dark ml-2">Customer
                                                            Invoice</a></li>
                                                    <li><a class="text-dark ml-2" data-value="{{ $order->id }}" 
                                                        href="{{url('edit-address/'.$order->id)}}" 
                                                        target="”_blank”">Update
                                                            Address</a></li>
                                                    <li><a href="{{url('edit-order/'.$order->id)}}" target="”_blank”" class="text-dark ml-2">Update
                                                            Order</a></li>
                                                    <li><a href="#" target="”_blank”" class="text-dark ml-2">Add
                                                            Details</a></li>
                                                    <li><a href="#" target="”_blank”" class="text-dark ml-2">Add
                                                            Details 2</a></li>
                                                    <li><a href="#" target="”_blank”" class="text-dark ml-2">Add
                                                            Details 3</a></li>

                                                </div>
                                            </div>
                                        </td>
                                        {{-- Toools td End --}}
                                    </tr>
                                @endforeach


                                <!--....Modal -->
                                @include('layouts.inc.pandingOrder.form-pending-order1')
                                @include('layouts.inc.pandingOrder.update-status-modal')

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
