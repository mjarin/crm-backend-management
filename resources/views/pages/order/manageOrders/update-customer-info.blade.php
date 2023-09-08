@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Update Customer Info</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Orders</li>
                        <li class="breadcrumb-item">Customer Info</li>
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
                                <form class="form-horizontal" method="POST" action="{{ url('update-customer-info') }}">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Order ID</label>

                                        <div class="col-sm-9">
                                            <input type="text" value="{{ $order->id }}" class="form-control"
                                                id="order_id" name="order_id"  readonly="">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="employee" class="col-sm-3 col-form-label text-right font-weight-normal">Customer
                                            Name</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->customer_name }}"
                                                name="customer_name">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="employee" class="col-sm-3 col-form-label text-right font-weight-normal">Customer
                                            Address</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control"
                                                value="{{ $order->shipping_address}}" name="customer_address">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label text-right font-weight-normal">Shipping
                                            City</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="Dhaka" name="shipping_city">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label text-right font-weight-normal">Customer
                                            Phone</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->customer_phone }}"
                                                 name="customer_phone">
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label for="employee" class="col-sm-3 col-form-label text-right font-weight-normal">Add Order
                                            Note</label>

                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->order_note }}"
                                                 name="order_note">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row">
                                        <label for="delivery_man"
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Prefered Courier</label>
                                        <div class="col-sm-9">
                                            <select class="form-control" name="courier" id="courier">
                                                <option selected="" value="{{ $order->courier}}">
                                                    {{ $order->courier }}</option>
                                                @foreach ($couriers as $courier)
                                                    <option value="{{ $courier->name }}">{{ $courier->name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Customer Delivery Charge</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->customer_charge }}"
                                                name="customer_delivery_charge">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for=""
                                            class="col-sm-3 col-form-label text-right font-weight-normal">Circle Delivery Charge</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" value="{{ $order->delivery_charge }}"
                                                name="circle_delivery_charge">
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="" class="col-sm-3 col-form-label text-right font-weight-normal">Advance Payment</label>
                                        <div class="col-sm-9">
                                        <input type="text" class="form-control" value="{{ $order->advance_payment }}" name="advance_payment">
                                        </div>
                                    </div>

                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-success btn-flat font-weight-bold" name="edit">
                                            <i class="fa fa-check-square-o"></i> Update</button>
                                    </div>
                                </form>
                            </div><!-- /.card-body -->
                        </div><!-- /.card -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
        </section>
    @endsection
