@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Seller Advance Sheet</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>Home
                        </li>
                        <li class="breadcrumb-item">Advanced Sheet</li>
                        <li class="breadcrumb-item active">List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card" style="width:102%!important;">
                <div class="card-header bg-white">
                    <button type="button" class="btn btn-sm btn-flat" data-toggle="modal" data-target="#seller-advance-payment-modal" style="background:#3C8DBC;">
                        <span class="text-white"><i class="fa fa-plus mr-1"></i> Add Advance</span>
                    </button>
                </div>

                @include('layouts.inc.SellerAdvancePayment.add-seller-advance-modal')

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">
                            <table class="table table-bordered table-hover data_table_custom ">
                                <thead>
                                    <tr role="row">
                                        <th style="width:3%;"> Order ID</th>
                                        <th style="width:3%;"> Advanced Amount</th>
                                        <th style="width:3%;">Method</th>
                                        <th style="width:3%;">Transaction ID</th>
                                        <th style="width:3%;">Payment Date</th>
                                        <th style="width:3%;">Created By</th>
                                        <th style="width:3%;">Updated By</th>
                                        <th style="width:3%;">Tools</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders as $order)
                                        <tr>
                                            <td>{{ $order->orders_id }}</td>
                                            <td>{{ $order->amount }}</td>
                                            <td>{{ $order->method }}</td>
                                            <td>{{ $order->transaction_id }}</td>
                                            <td>{{ $order->transaction_date }} </td>
                                            <td>{{ $order->created_by }}</td>
                                            <td>{{ $order->updated_by }}</td>
                                            <td>
                                                <button class="btn btn-success btn-sm edit btn-flat edit" data-id="">
                                                    <i class="fa fa-edit"></i> Update</button>
                                            </td>
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
    <script>
      $('.data_table_custom').DataTable({
    "scrollX": false,
    "scrollY": true
  });
    </script>
@endsection
