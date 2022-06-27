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
                            <a href="#">Home</a><span class="mr-2">><span></li>
                        <li class="breadcrumb-item">Order<span class="mr-2">><span></li>
                        <li class="breadcrumb-item active">Order Details</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12 ">
                <div class="card">
                    <div class="card-header">
                        <p class="mt-2" id="result">Total Number of Items Selected =
                        <p>
                    </div><!-- /.card-header -->

                    <div class="card-body scrollable">
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-bordered table-hover data_table  no-footer" role="grid">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting_disabled" rowspan="1" colspan="1"><input type="checkbox"
                                                onclick="checkAll(this)"> SL.</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Date</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">SKU</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Product Name</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Image</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Variation</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Quantity</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Circle Price (Unit)</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Selling Price (Unit)</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Status</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">PO Status</th>
                                        <th class="sorting_disabled" rowspan="1" colspan="1">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td><input name='checkme[]' id="order" type='checkbox' value='67371'></td>
                                            <td>{{ $order->date }}</td>
                                            <td>{{ $order->sku }}</td>
                                            <td>{{ $order->product_name }}</td>
                                            <td><img src="{{ asset('images/' . $order->photos) }}" alt="product_img"
                                                    style="max-width:100px; max-height=100px;"></td>
                                            <td>{{ $order->variation }}</td>
                                            <td>{{ $order->quantity }}</td>
                                            <td>{{ $order->circle_price }}</td>
                                            <td>{{ $order->selling_price }}</td>
                                            <td>{{ $order->delivery_status }}</td>
                                            <td>{{ $order->po_status }}</td>
                                            <td>{{-- Toools td starts --}}

                                                {{-- Update Button --}}
                                                <button class="btn btn-success btn-sm update-peding-order-deatail-btn"
                                                    value="{{ $order->id }}" data-toggle="modal"
                                                    data-target="#updt-pending-order-details"><i
                                                        class="fa fa-edit"></i>&nbsp;<span
                                                        class="ml-2">Update</span></button>
                                                {{-- Returned Button --}}
                                                <button class="btn btn-info btn-sm btn-flat pending-order-returned-btn"
                                                    value="{{ $order->id }}" data-toggle="modal"
                                                    data-target="#pending-order-returned-id"><i
                                                        class="fa fa-edit"></i><span
                                                        class="ml-2">Returned</span></button>
                                                {{-- Purchased Button --}}
                                                <a href="{{ url('purchased-pending-order/' . $order->id) }}"><button
                                                        class="btn btn-primary btn-flat"><i class="fa fa-edit"></i><span
                                                            class="ml-2">Purchased</span></button></a>
                                                {{-- Delete Button --}}
                                                <button class="btn btn-danger btn-sm btn-flat delete"><i
                                                        class="fa fa-trash"></i><span
                                                        class="ml-2">Delete</span></button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modals -->
                            @include('layouts.inc.pandingOrder.pending-order-details-modal')
                            @include('layouts.inc.pandingOrder.pending-order-returned-modal')

                        </div><!-- /.col -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>{{-- .col --}}
        </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
