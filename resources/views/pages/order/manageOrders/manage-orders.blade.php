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
                            <form action="{{url('step1-submit-order')}}" method="GET" enctype="multipart/form-data" >
                                @csrf
                                {{-- @method('PUT')  --}}
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label> Enter Order ID</label>
                                            <div>
                                                <div class="date">
                                                    <input type="text" name="order_id" class="form-control" id="orderid"
                                                        autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label></label>
                                                <div class="date">
                                                    <input value="Get Details" style="background:green; color:white;"
                                                        type="submit" name="submit" class="form-control mt-2">
                                                </div>
                                            </div>
                                        </div><!-- End of col-md-3-->
                                </div><!-- End of row-->
                            </form>
                        </div><!--End of  col-md-12 -->
                    </div><!-- /.card-body -->
                </div> <!-- /.card -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection
