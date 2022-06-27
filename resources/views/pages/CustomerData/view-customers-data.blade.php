@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Customer List</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
                            <a href="#" class="ml-2 text-dark">Home</a>
                        </li><span class="ml-2 text-dark mr-2">></span>
                        <a href="#" class="text-dark">Customer </a></li><span class="ml-2 text-dark">></span>
                        <li class="breadcrumb-item active ml-2 text-dark">Customer List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-head bg-white ml-3 mt-3">
                    <button type="button" class="btnbtn-sm btn-flat btn-order"
                        data-toggle="modal" data-target="#add_customer_data_modal_id" style="background-color:steelblue;color:#fff;">
                        <i class="fa fa-plus"></i><span class="ml-2">New</span></button>
                    
                </div>
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <div class="card-body scrollable">
                                <table class="table table-bordered table-hover data_table " style="border:0!important">
                                <thead>
                                <tr role="row"  style="border-botttom: none;!important">
                                    <th style="width:2%">Customer Name</th>
                                     <th style="width:2%">Address</th>
                                     <th style="width:2%">Phone</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($order_table_data as $data)
                                       <tr> 
                                        <td style="border-botttom: none;!important">{{$data->customer_name}}</td>
                                        <td>{{$data->address}}</td>  
                                        <td>{{$data->phone}}</td>  
                                       </tr>                    
                                    @endforeach 
                                    </tbody> 
                                  </table>
                    
                                @include('layouts.inc.CustomerData.add-new-customer-data-modal')

                           </div>
                        </div><!--End of  col-md-12 -->
                    </div><!-- /.card-body -->
                </div> <!-- /.card -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection
