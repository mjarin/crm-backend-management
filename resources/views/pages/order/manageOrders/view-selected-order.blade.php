@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Orders List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
                            <a href="#">Home</a>
                        </li>
                        <li class="breadcrumb-item">Orders</li>
                        <li class="breadcrumb-item active">Orders List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <form action="{{ url('submit-order-id-step2') }}" method="GET" enctype="multipart/form-data">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label> Enter Order ID</label>
                                            <div>
                                                <div class="date">
                                                    <input type="text" name="orderId" class="form-control" id="orderid"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-2">
                                        <div class="form-group">
                                            <label></label>
                                            <div class="date">
                                                <input value="Get Details" style="background:green; color:white;"
                                                    type="submit" name="submitOrder" class="form-control mt-2">
                                            </div>
                                        </div>
                                    </div><!-- End of col-md-3-->
                                </div><!-- End of row-->
                            </form>
                        </div>
                        <!--End of  col-md-12 -->
                    </div><!-- End of row-->
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table id="" class="table table-bordered table-hover data_table ">
                                <thead>
                                    <tr>
                                        <th style="width:10%">Order Date</th>
                                        <th style="width:10%">Order ID</th>
                                        <th style="width:15%">Order Code</th>
                                        <th style="width:10%">Seller</th>
                                        <th style="width:15%">Customer</th>
                                        <th style="width:20%">Address</th>
                                        <th style="width:5%">Status</th>
                                        <th style="width:20%">Invoice No</th>
                                        <th style="width:10%">Collected Price</th>
                                        <th style="width:15%">Delivery Man</th>
                                        <th style="width:10%">Delivery Date</th>
                                        <th style="width:10%">Updated By</th>
                                        <th style="width:15%">Remarks</th>
                                        <th style="width:15%">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->date }}</td>
                                            <td>{{ $order->id }}</td>
                                            <td>{{ $order->code }}</td>
                                            <td>{{ $order->supplier_name }}</td>
                                            <td>{{ $order->customer_name }}</td>
                                            <td>{{ $order->address }}</td>
                                            <td>{{ $order->delivery_status }}</td>
                                            <td>{{ $order->product_name}}</td>
                                            <td>{{ $order->collected_price }}</td>
                                            <td>{{ $order->delivery_man }}</td>
                                            <td>{{ $order->delivery_date }}</td>
                                            <td>{{ $order->updated_by }}</td>
                                            <td>{{ $order->remarks }}</td>
                                            <td>{{-- Toools Started --}}
                                                {{-- Update button....................................................... --}}
                                                <button type="button"
                                                    class="btn btn-success btn-sm btn-flat btn-edit-update-selected-order"
                                                    value="{{ $order->id }}" data-toggle="modal"
                                                    data-target="#edit_update_modal_id"
                                                    style="background:green!important; color:white!important;">
                                                    <i class="fa fa-edit"></i></button>
                                                {{-- View button....................................................... --}}
                                                <a href="{{ url('view-single-selected-order/' . $order->id) }}">
                                                    <button class="btn btn-warning btn-sm btn-flat"
                                                        value="{{ $order->id }}"><i
                                                            class="fa fa-eye"></i></button></a>
                                                <br>
                                                {{-- delete//trash button....................................................... --}}
                                                <a href="#">
                                                    <button class="btn btn-danger btn-sm btn-flat delete"
                                                        value="{{ $order->id }}"><i class="fa fa-trash"></i>
                                                    </button></a>
                                                {{-- File button....................................................... --}}
                                                <div class="dropdown-menu">
                                                    <button class="btn btn-primary dropdown-toggle" type="button"
                                                        data-toggle="dropdown"><i class="fa fa-file"></i>
                                                        <span class="caret"></span>
                                                    </button>
                                                </div>
                                                <div class="btn-group open">
                                                    <button type="button" class="btn btn-primary" data-toggle="dropdown"
                                                        aria-haspopup="true" aria-expanded="true">
                                                        <i class="fa fa-bars"></i>
                                                    </button>
                                                    <div class="dropdown-menu">
                                                        <li class="ml-3"><a href=""
                                                                class="text-decoration-none text-dark"
                                                                target="”_blank”">Seller Invoice</a></li>
                                                        <li class="ml-3"><a href=""
                                                                class="text-decoration-none text-dark"
                                                                target="”_blank”">Customer Invoice</a></li>
                                                        <li class="ml-3"><a href=""
                                                                class="text-decoration-none text-dark"
                                                                target="”_blank”">Update Address</a></li>
                                                        <li class="ml-3"><a href=""
                                                                class="text-decoration-none text-dark"
                                                                target="”_blank”">Update Order</a></li>
                                                        <li class="ml-3"><a href=""
                                                                class="text-decoration-none text-dark"
                                                                target="”_blank”">Update Customer Info</a></li>
                                                    </div>
                                                </div>
                                            </td>{{-- Toools End --}}
                                        </tr>
                                        @endforeach
                                @include('layouts.inc.ManageOrders.edit-update-modal')
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
