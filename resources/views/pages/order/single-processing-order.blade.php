@extends('layouts.master')
@section('content')

<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Order Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item">
            <i class="nav-icon fas fa-tachometer-alt"></i>Home</li>
            <li class="breadcrumb-item">Processing Order</li>
            <li class="breadcrumb-item active">Processing Order Details</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>

  <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header bg-white">
              @foreach ($processing_order as $order)  
              <button type="button" class="btn btn-success purchase-status-processing" data-toggle="modal" 
              data-target="#processing-purchase-status-id" value="{{ $order->id }}">
              <i class="fa fa-plus-circle mr-1"></i> Update Purchase Status</button>
              @endforeach
            </div><!-- /.card-header -->

            <div class="card-body scrollable">
              <div class="col-md-12 col-sm-12">
                  <table class="table table-bordered  data_table_view_single  no-footer" role="grid">
                      <thead>
                          <tr role="row">
                              <th class="sorting_disabled" rowspan="1" colspan="1"><input type="checkbox"
                                onclick="checkAll(this)"> SL.</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Date</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">SKU</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Product Name</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Image</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Variation</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Quantity</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Circle Price (Unit)</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Selling Price (Unit)</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Status</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">PO Status</th>
                              <th class="sorting_disabled" rowspan="1" colspan="1">Tools</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach ($processing_order as $order)
                              <tr>
                                  <td><input name='checkme[]' id="order" type='checkbox' value='67371'></td>
                                  <td>{{ $order->date }}</td>
                                  <td>{{ $order->sku }}</td>
                                  <td>{{ $order->product_name }}</td>
                                  <td><img src="{{ asset('images/'. $order->photos) }}" alt="product_img"
                                          style="max-width:100px; max-height=100px;"></td>
                                  <td>{{ $order->variation }}</td>
                                  <td>{{ $order->quantity }}</td>
                                  <td>{{ $order->circle_price }}</td>
                                  <td>{{ $order->selling_price }}</td>
                                  <td>{{ $order->delivery_status }}</td>
                                  <td>{{ $order->po_status }}</td>
                                  <td>{{-- Toools td starts --}}
{{-- Update Button --}}
<button class="btn btn-success btn-sm btn-sm btn-flat edit-processing-order-deatail-btn mt-0" value="{{$order->id}}" data-toggle="modal" 
data-target="#processing-order-details_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Update</button>
{{-- Returned Button --}}
<button class="btn btn-info btn-sm btn-sm btn-flat edit-btn-processingOrder-returned" value="{{$order->id}}" data-toggle="modal" 
data-target="#processing-order-returned_id"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Returned</button>
{{-- Purchased Button --}}
<a href="" target="”_blank”"><button class="btn btn-primary btn-sm btn-flat"><i class="fa fa-edit"></i>&nbsp;&nbsp;&nbsp;Purchased</button></a>
<button class="btn btn-danger btn-sm btn-sm btn-flat delete" data-id=""><i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;&nbsp;Delete</button>
<a href="#" target="”_blank”"><button class="btn-info btn-sm btn-flat mt-1"><i class="fa fa-edit"></i> Processed</button></a>
                    </td>
                   </tr> 
                                      
                @endforeach 
                </tbody> 
              </table>

            @include('layouts.inc.processingOrder.processing-order-update-modal')
            @include('layouts.inc.processingOrder.processing-order-returned-modal')
            @include('layouts.inc.processingOrder.update-purchase-status-modal')
            </div><!-- /.col -->
            </div><!-- /.card-body -->
          </div><!-- /.card -->
        </div> <!-- /.col -->
      </div> <!-- /.row -->
  </section><!-- /.content -->

  <script>
    // Processing Order DataTable view_single
//   jQuery (document).ready(function (){
//   jQuery('.data_table_view_single').DataTable({
//     "scrollX": true,
//     "scrollY": false
//   });
// });
</script>
  
@endsection

