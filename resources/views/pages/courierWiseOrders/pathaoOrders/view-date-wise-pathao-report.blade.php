@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Pathao Delivery List</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt mr-2"></i>
            <li class="breadcrumb-item">Home</li>
            <li class="breadcrumb-item">Order</li>
            <li class="breadcrumb-item active">Pathao List</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        {{-- <div class="col-md-12"> --}}
          <div class="card">
            <div class="card-header bg-white">
              <button id="export" class="btn btn-info">Export Delivery Details As Excel</button>
              <button class="btn btn-primary" onclick="createPDF()">Print Delivery Details</button>
            </div>
            <!-- /.card-header -->

            <div class="card-body scrollable">
            <table class="table table-bordered table-hover data_table ">
            <thead>
            <tr role="row">
                <th style="width:2%">ItemType(*)</th>
                <th style="width:2%">StoreName(*)</th>
                <th style="width:2%">MerchantPhone</th>
                <th style="width:2%">MerchantOrderId</th>
                <th style="width:2%">RecipientName(*)</th>
                <th style="width:2%">RecipientPhone(*)</th>
                <th style="width:2%">RecipientCity(*)</th>
                <th style="width:2%">RecipientZone(*)</th>
                <th style="width:2%">RecipientArea</th>
                <th style="width:2%">RecipientAddress(*)</th>
                <th style="width:2%">AmountToCollect(*)</th>
                <th style="width:2%">ItemQuantity(*)</th>
                <th style="width:2%">ItemWeight(*)</th>
                <th style="width:2%">ItemDesc</th>
                <th style="width:2%">SpecialInstruction</th>
            
            </tr>
                </thead>
                <tbody>
                   <tr> 
                    <td>Demo Data</td>
                    <td>Demo Data</td> 
                    <td>Demo Data</td>
                    <td>Demo Data</td> 
                    <td>Demo Data</td>
                    <td>Demo Data</td> 
                    <td>Demo Data</td> 
                    <td>Demo Data</td> 
                    <td>Demo Data</td> 
                    <td>Demo Data</td> 
                    <td>Demo Data</td>
                    <td>Demo Data</td> 
                    <td>Demo Data</td> 
                    <td>Demo Data</td>
                    <td>Demo Data</td>
                </tbody> 
              </table>

            {{-- @include('layouts.inc.NoStatusOrders.no-status-order-update-details-modal')  
            @include('layouts.inc.NoStatusOrders.no-status-order-returned-modal')  --}}
            

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

