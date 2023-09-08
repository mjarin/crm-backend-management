@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>RedEx Delivery List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Delivery</li>
                        <li class="breadcrumb-item active">RedEx List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header bg-white mb-2">
                    <button id="export" class="btn btn-info">Export Delivery Details As Excel</button>
                    <button class="btn btn-primary" onclick="createPDF()">Print Delivery Details</button>
                    <p class="font-weight-bold mt-4"> Delivery Man : RedEx</p>
                </div>

                <div class="card-body mt-3">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-bordered table-hover data_table ">
                                <thead>
                                    <tr>
                                        <th style="width:2%">Invoice</th>
                                        <th style="width:2%">Shop Name</th>
                                        <th style="width:2%">Shop Phone</th>
                                        <th style="width:2%">Customer Name</th>
                                        <th style="width:2%">Contact No.</th>
                                        <th style="width:2%">Customer Address</th>
                                        <th style="width:2%">District</th>
                                        <th style="width:2%">Area</th>
                                        <th style="width:2%">Area ID</th>
                                        <th style="width:2%">Division</th>
                                        <th style="width:2%">Price</th>
                                        <th style="width:2%">Product Selling Price</th>
                                        <th style="width:2%">Weight(g)</th>
                                        <th style="width:2%">Instruction</th>
                                        <th style="width:2%">Seller Name</th>
                                        <th style="width:2%">Seller Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                        <td style="width:2%"></td>
                                    </tr>

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
