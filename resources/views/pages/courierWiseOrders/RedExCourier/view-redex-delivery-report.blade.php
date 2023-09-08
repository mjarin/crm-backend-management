@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>RedEx Delivery Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Delivery</li>
                        <li class="breadcrumb-item active">Reports</li>
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
                            <form method="GET" action="{{ url('search-redex-report-by-date-step2') }}">
                                <div class="row">
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label> Date From</label>
                                            <div>
                                                <div class="date">
                                                    <input type="text" class="form-control datepicker" id="fromdate"
                                                        name="fromdate" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label>Date To</label>
                                            <div>
                                                <div class="date">
                                                    <input type="text" class="form-control datepicker" id="todate"
                                                        name="todate" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 mb-4">
                                        <div class="form-group">
                                            <label></label>
                                            <div>
                                                <div class="date mt-1">
                                                    <input value="Get Report" style="background: green; color: white"
                                                        type="submit" name="submit" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                            <div class="card-ffoter"></div>
                        </div><!--End of  col-md-12 -->
                    </div><!-- End of row-->
                    <div class="row">
                        <div class="ml-4 my-3">
                            <h5><span class="mr-2">Order List From :</span> {{ $from_date }} <span
                            class="ml-2 mr-2">To: </span> {{ $to_date }}</h5>
                            <br>
                            </div>
                        <div class="col-md-12 col-sm-12">
                            <table id="" class="table table-bordered table-hover data_table ">
                                <thead>
                                    <tr>
                                        <th style="width:10%">Delivery Date</th>
                                        <th style="width:10%">Number of Orders</th>
                                        <th style="width:20%">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($records as $order)
                                        <tr>
                                            <td>{{ $order->delivery_date}}</td>
                                            <td>2</td>
                                            <td><a href="{{url('view-redex-report-date-wise/'.$order->delivery_date)}}">
                                             <button class="btn btn-warning btn-sm btn-flat text-white" style="background:#FF8C00!important;">
                                               <i class="fa fa-eye"></i> Details</button></a>
                                            </td>{{-- Toools End --}}
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
