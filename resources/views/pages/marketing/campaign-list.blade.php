@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Campaign List</h1> 
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
            <a href="#">Home</a></li> >
            <a href="#">Product</a></li>>
            <li class="breadcrumb-item active">Collection Link</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
          <div class="card col-sm-12">
            <div class="card-header">

                <div class="col-sm-12">
                    <div class="box">
                      <div class="box-header with-border">
                         
                         <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_create"><i class="fa fa-plus"></i> Create Campaign</button>
                         
                          <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal_form"><i class="fa fa-plus-circle"></i> Update Status</button>
                          
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal_delete"><i class="fa fa-plus-circle"></i> Delete Links</button>
                      
                       </div>
                      <br>
                <br>
            <br>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table id=""  class="table table-bordered table-hover data_table ">
            <thead>
            <tr>
            <th><input type="checkbox"  onclick="checkAll(this)"> SL.</th>
            <th style="width:10%">ID</th>
                 <th style="width:20%">Title</th>
                 <th style="width:15%">Status</th>
                 <th style="width:25%">Slug</th>
                 <th style="width:5%">Banner ID</th>
                  <th style="width:20%">Banner</th>
                 <th style="width:25%">Link</th>
                 <th style="width:25%">Tools</th>
                </tr>
                </thead>
                <tbody>
                   {{-- @foreach ($delivered_orders as $order)
                   <tr> 
                    <td>{{$order->date}}</td> 
                    <td>{{$order->id}}</td>
                    <td>Source N Supply</td> 
                    <td>{{$order->customer_name}}</td>
                    <td>{{$order->shipping_address}}</td> 
                    <td>{{$order->delivery_status}}</td>
                    <td><b class="text-danger">Not Received</b></td> 
                    <td>{{$order->collected_price}}</td> 
                    <td>{{$order->delivery_man}}</td>
                    </tr> 
                    @endforeach  --}}
                            </div>
                        </div>
                    </div>
                </tbody> 
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        {{-- </div> --}}
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content --> 
@endsection

