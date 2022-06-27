@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Stock Alert</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
                            <a href="#">Home</a><span class="mr-2">><span></li>
                        <li class="breadcrumb-item">Product<span class="mr-2">><span></li>
                        <li class="breadcrumb-item active">Stock Alert</li>
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

                    <div class="card-body scrollable">
                        <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-bordered table-hover data_table  no-footer" role="grid">
                                <thead>
                                    <tr role="row">
                                <th style="width:5%" rowspan="1" colspan="1">SKU</th>
                                <th style="width:10%" rowspan="1" colspan="1">Product Name</th>
                                <th style="width:5%" rowspan="1" colspan="1">Variant</th>
                                <th style="width:5%" rowspan="1" colspan="1">Current Stock</th>
                                <th style="width:7%" rowspan="1" colspan="1">Stock Added</th>
                                <th style="width:7%" rowspan="1" colspan="1">Last Updated</th>
                                <th style="width:7%" rowspan="1" colspan="1">Tools</th></tr>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($products as $product)
                                        <tr>
                                            <div class="col-md-12 col-sm-12"> 
                                            <td>{{ $product->sku }}</td>
                                            <td>{{ $product->product_name }}</td>
                                            <td>{{ $product->variations }}</td>
                                            <td>{{ $product->current_stock }}</td>
                                            <td>{{ $product->created_at}}</td>
                                            <td>{{ $product->updated_at }}</td>
                                            <td>{{-- Toools td starts --}}
                                           <button class="btn btn-success btn-sm edit btn-flat edit-stock-btn" 
                                           value="{{$product->id}}" data-toggle="modal" data-target="#stock_update_modal_id">
                                           <i class="fa fa-edit"></i> Update Stock </button>
                                            </td>
                                        </div>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <!-- Modals -->
                            @include('layouts.inc.StockAlert.update-stock-modal')

                        </div><!-- /.col -->
                    </div><!-- /.row -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div>{{-- .col --}}
        </div> <!-- /.row -->
    </section><!-- /.content -->
@endsection
