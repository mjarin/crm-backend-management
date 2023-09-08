@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Order</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Order</li>
                        <li class="breadcrumb-item active">In Transit Order</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content mt-2">
        @if (session('success'))
            <div class="alert  alert-success alert-dismissible"
                style="background-color:#00A65A!important;height:10%!important; color:#fff!important; ">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                {{ session('success') }}
            </div>
        @endif

        <section class="content mt-4">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-white">
                            </div><!-- /.card-header -->

                            <div class="card-body">
                                <form class="form-horizontal" method="POST"
                                    action="{{ url('update-in-transit-order-step2') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Order ID</label>

                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $order->id }}" class="form-control"
                                                id="order_id" name="order_id">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="customer_name"
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Collected
                                            Amount</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->collected_price }}"
                                                name="collected_amount">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="employee"
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Circle
                                            Remarks</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->remarks }}"
                                                name="circle_remarks">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Customer Delivery
                                            Charge</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->customer_charge }}"
                                                name="customer_delivery_charge" readonly="">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Total Delivery
                                            Charge</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->delivery_charge }}"
                                                name="total_delivery_charge">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="delivery_man"
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Delivery
                                            Man</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="delivery_man" id="delivery_man">
                                                <option selected="" value="{{ $order->delivery_man }}">
                                                    {{ $order->delivery_man }}</option>
                                                @foreach ($delivery_man as $delivery_man)
                                                    <option value="{{ $delivery_man->name }}">{{ $delivery_man->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="employee"
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Delivery
                                            Date</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->delivery_date }}"
                                                name="delivery_date">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Delivery
                                            Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="delivery_status">
                                                <option selected="" value="{{ $order->delivery_status }}">
                                                    {{ $order->delivery_status }}</option>
                                                <option value="pending">pending</option>
                                                <option value="pending">Pending</option>
                                                <option value="processing">Processing</option>
                                                <option value="ready for packaging">Ready For Packaging</option>
                                                <option value="ready to deliver">Ready to Deliver</option>
                                                <option value="on hold">On Hold</option>
                                                <option value="under review">Under Review</option>
                                                <option value="exchange">Exchange</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="returning">Returning</option>
                                                <option value="in transit">In Transit</option>
                                                <option value="cancelled">Cancelled</option>
                                                <option value="returned">Returned</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="edit_payment"
                                            class="col-sm-3 control-label font-weight-normal text-right font-weight-normal">Payment
                                            Status</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="payment_status" id="payment_status">
                                                <option selected="" value="{{ $order->payment_status }}">
                                                    {{ $order->payment_status }}</option>
                                                <option selected="" value="unpaid">unpaid</option>
                                                <option value="paid">Paid</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success btn-flat" name="edit">
                                            <i class="fa fa-check-square-o"></i> Update</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    @endsection
