@extends('layouts.master')
@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Courier List</h1>
                </div>

                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item">
                        <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
                        Home
                        </li>
                        <li class="breadcrumb-item">Courier</li>
                        <li class="breadcrumb-item">Courier List</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      @if (session('success'))
      <div class="alert  alert-success alert-dismissible" 
      style="background-color:#00A65A!important;height:10%!important; color:#fff!important; ">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h4><i class="icon fa fa-check"></i> Success!</h4>
          {{ session('success') }}
      </div>
  @endif
        <div class="card">
            <div class="card-head bg-white ml-3 mt-3">
                <button type="button" class="btnbtn-sm btn-flat add-new-btn" data-toggle="modal"
                    data-target="#add_new_modal_id" style="background-color:steelblue;color:#fff;">
                    <i class="fa fa-plus"></i><span class="ml-2">Add New</span></button>
            </div>

            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="card-body scrollable">
                        <table class="table table-bordered table-hover data_table " style="border:0!important">
                            <thead>
                                <tr role="row" style="border-botttom: none;!important">
                                    <th style="width:2%">Name</th>
                                    <th style="width:2%">Tools</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($couriers as $courier)
                                    <tr>
                                        <td>{{ $courier->name }}</td>
                                        <td><a href="{{url('delete-courier/'.$courier->id)}}"> 
                                        <button class="btn btn-danger btn-sm btn-flat delete-couriar-btn" data-toggle="modal"
                                        data-target="#delete_courier_modal_id">
                                         <i class="fa fa-trash mr-2"></i>Delete</button></a></td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        @include('layouts.inc.manageCourier.add-new-courier-modal')
                        @include('layouts.inc.manageCourier.confirm-delete-courier-modal')

                    </div>
                </div>
                <!--End of  col-md-12 -->
            </div><!-- /.card-body -->
        </div> <!-- /.card -->
        </div><!-- /.row -->
    </section><!-- /.content -->
@endsection
