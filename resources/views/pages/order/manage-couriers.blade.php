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
            <a href="#">Home</a></li>
            <a href="#">Courier</a></li>
            <li class="breadcrumb-item active">Courier List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <p class="mt-2" id="result">Total Number of Items Selected =<span>0</span><p>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
                <div class="row">
                    <div class="col-md-12" id="manage-courier-table-parent-div">
                        <table id="manage-courier-table" class="table table-bordered table-hover data_table">
                            <thead class="col-md-12">
                            <tr>
                            <th style="min-width:50%">Name</th>
                             <th style="min-width:50%">Tools</th>
                            </tr>
                            </thead>
                                <tbody>
                                   @foreach ($couriers as $courier)
                                   <tr class="col-md-12"> 
                                    <div class="row">
                                      <div class="col-md-6 col-sm-6">
                                        <td>{{$courier->name}}</td>
                                      </div>

                                      <div class="col-md-6 col-sm-6">
                                        <td>
                                          <a href="#"><button class="btn btn-danger btn-sm btn-flat delete"><i class="fa fa-trash mr-2"></i>Delete</button></a>
                                        </td>
                                      </div>
                                    </div>
                                   </tr> 
                                 @endforeach 
                                </tbody> 
                              </table>
                    </div>
                </div>
            </div><!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content --> 
@endsection

