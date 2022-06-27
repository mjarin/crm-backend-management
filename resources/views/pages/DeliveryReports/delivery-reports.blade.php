@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Delivery Report</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
                            <a href="#" class="ml-2 text-dark">Home</a>
                        </li><span class="ml-2 text-dark mr-2">></span>
                        <a href="#" class="text-dark">Delivery</a></li><span class="ml-2 text-dark">></span>
                        <li class="breadcrumb-item active ml-2 text-dark">Reports</li>
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
                            <form method="GET" action="{{url('search-data-by-date')}}">
                                <div class="row">
                                    <div class="col-md-4">
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

                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label></label>

                                            <div>
                                                <div class="date">
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
                    </div><!-- /.card-body -->
                </div> <!-- /.card -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection
