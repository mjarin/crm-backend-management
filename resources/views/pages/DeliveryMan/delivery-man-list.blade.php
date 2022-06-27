@extends('layouts.master')
@section('content')
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Delivery Man List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
            <a href="#" class="ml-2 text-dark">Home</a></li><span class="ml-2 text-dark mr-2">></span> 
            <a href="#" class="text-dark">Delivery Man</a></li><span class="ml-2 text-dark">></span> 
            <li class="breadcrumb-item active ml-2 text-dark" >List</li>
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
          <div class="card ">
            <div class="card-header bg-white">
                <button data-toggle="modal" data-target="#add-delivery-man-id"
                class="btn btn-success btn-sm btn-flat text-white btn-add-delivery-man">
                 <i class="fa fa-plus"></i> <span class="ml-2">Add New</span>
                </button>

            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table class="table table-bordered table-hover data_table ">
            <thead>
            <tr role="row">
                <th style="width:3%">Id</th>
                 <th style="width:3%">Name</th>
                 <th style="width:3%">Phone</th>
                 <th style="width:3%">Tools</th>
                </tr>
                </thead>
                <tbody>
                   @foreach ($delivery_man as $man)
                   <tr> 
                    <td>{{$man->man_id}}</td> 
                    <td>{{$man->name}}</td>
                    <td>{{$man->phone}}</td> 
                    <td>
{{-- Update Button --}}
<button class="btn btn-success btn-sm btn-flat edit-btn-delivery-man" value="{{$man->id}}" data-toggle="modal" 
data-target="#delivery-man-id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Edit</button>
<a href="{{url('delete-delivery-man/'.$man->id)}}"><button class="btn btn-danger btn-sm btn-flat delete-btn-delivery-man"><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button></a>

                    </td>
                   </tr>                    
                @endforeach 
                </tbody> 
              </table>

            @include('layouts.inc.DeliveryMan.update-delivery-man-modal')  
            @include('layouts.inc.DeliveryMan.add-new-delivery-man-modal') 
            

            </div>
            <!-- /.card-body -->
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

