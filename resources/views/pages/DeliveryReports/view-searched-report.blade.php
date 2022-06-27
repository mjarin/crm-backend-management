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
                <div class="card-head bg-white">
                    <div class="row">
                        <div class="col-md-12 col-sm-12">

                            <form method="GET" action="{{url('search-step-two')}}">
                                <div class="row">
                                    <div class="col-md-3 ml-3">
                                        <div class="form-group">
                                            <label> Date From</label>
                                            <div>
                                                <div class="date">
                                                    <input type="text" class="form-control datepicker" id="fromdate2"
                                                        name="fromdate2" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label>Date To</label>
                                            <div>
                                                <div class="date">
                                                    <input type="text" class="form-control datepicker" id="todate2"
                                                        name="todate2" autocomplete="off">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <label></label>

                                            <div>
                                                <div class="date mt-2">
                                                    <input value="Get Report" style="background: green; color: white"
                                                        type="submit" name="submit_two" class="form-control">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>

                            <div class="card-body scrollable">
                                <div>
                                    <h5> <span class="mr-2">Order List From :</span> {{ $from_date }} <span class="ml-2 mr-2">To: </span> {{ $to_date }}</h5>
                                    <br>
                                  </div>
                                <table class="table table-bordered table-hover data_table " style="border:0!important">
                                <thead>
                                <tr role="row"  style="border:0!important">
                                    <th style="width:2%">Delivery Date</th>
                                     <th style="width:2%">Number of Orders</th>
                                     <th style="width:2%">Tools</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                       @foreach ($records as $data)
                                       <tr> 
                                        <td>{{$data->delivery_date}}</td> 
                                        <td>
                                            {{-- {{$data->count()}} --}}
                                        
                                        </td>
                                        <td >
                    {{-- Update Button --}}
                    <button class="btn btn-warning btn-sm btn-flat text-white" value="" data-toggle="modal" 
                    data-target="#delivery-man-id"><i class="fa fa-eye"></i>&nbsp;&nbsp;&nbsp;Details</button>
                   
                    
                                        </td>
                                       </tr>                    
                                    @endforeach 
                                    </tbody> 
                                  </table>
                    
                                {{-- @include('layouts.inc.DeliveryMan.update-delivery-man-modal')  
                                @include('layouts.inc.DeliveryMan.add-new-delivery-man-modal')  --}}
                                
                    
                                </div>


                <div class="card-ffoter"></div>

                        </div><!--End of  col-md-12 -->
                    </div><!-- /.card-body -->
                </div> <!-- /.card -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section><!-- /.content -->
@endsection
