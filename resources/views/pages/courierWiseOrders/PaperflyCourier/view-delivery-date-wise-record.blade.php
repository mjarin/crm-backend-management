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
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Orders</li>
                        <li class="breadcrumb-item active">Preperfly List</li>
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
                  <p class="font-weight-bold mt-4"> Delivery Man : Paperfly</p>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-bordered table-hover data_table ">
                                <thead>
                                    {{-- <tr>
                                        <th style="width:3%">Delivery Date</th>
                                        <th style="width:10%">Number of Orders</th>
                                        <th style="width:15%">Tools</th>
                                    </tr> --}}

                                    <tr>
                                        <th style="width:2%">Merchant Code</th>
                                        <th style="width:2%">Merchant Order Reference</th>
                                        <th style="width:2%">Pick-up Merchant Name</th>
                                        <th style="width:2%">Pick-up Address</th>
                                        <th style="width:2%">Pick-up Thana</th>
                                        <th style="width:2%">Pick-up District</th>
                                        <th style="width:2%">Pick-up Phone</th>
                                        <th style="width:2%">Package Option</th>
                                        <th style="width:2%">Delivery Option</th>
                                        <th style="width:2%">Product Brief</th>
                                         <th style="width:2%">Package Price</th>
                                         <th style="width:2%">Customer Name</th>
                                         <th style="width:2%">Customer Address</th> 
                                         <th style="width:2%">Customer Thana</th>  
                                         <th style="width:2%">Customer District</th> 
                                         <th style="width:2%">Customer Phone</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    {{-- <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr> --}}
                                    
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
