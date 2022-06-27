
<aside class="main-sidebar sidebar-dark-primary elevation-4">

<a href="{{url('/dashboard')}}" class="brand-link">
<h4 class="brand-text font-weight-light text-white font-weight-bold ml-5">Circle 2020</h4>
</a>

<div class="sidebar">

<div class="user-panel mt-3 pb-3 mb-3 d-flex">
<div class="image">
<img src="{{asset('images/profile.jpg')}}" class="img-circle elevation-2" alt="User Image">
</div>
<div class="info">
<a href="#" class="d-block">
  @if(Session::has('LoggedUserId'))
  @php
   $user=App\Models\User::where('id','=',Session::get('LoggedUserId'))->first();
  @endphp
    {{$user->name}}
  @endif
</a>
</div>
</div>
<nav class="mt-2">
<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

<li class="nav-item menu-open">
<a href="{{url('/dashboard')}}" class="nav-link">
<i class="nav-icon fas fa-tachometer-alt"></i>
<p>
Dashboard
</p>
</a>
</li>
<li class="nav-header text-secondary ml-3">MANAGE</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fa fa-money"></i>
<p>
Order Management
<i class="fa fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="{{url('/pending-orders')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Pending Orders</p>
</a>
</li>
<li class="nav-item">
<a href="{{url('/processing-orders')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Processing Orders</p>
</a>
</li>
<li class="nav-item">
<a href="{{url('/ready-for-packaging')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Ready For Packaging</p>
</a>
</li>
<li class="nav-item">
<a href="{{url('/ready-to-Deliver')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Ready to Deliver Orders</p>
</a>
</li>
<li class="nav-item">
<a href="{{url('/on-hold-orders')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>On Hold Orders</p>
</a>
</li>
<li class="nav-item">
<a href="{{url('/under-review-orders')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Under Review</p>
</a>
</li>
<li class="nav-item">
<a href="{{url('/delivered-orders')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p> Delivered Orders</p>
</a>
</li>

<li class="nav-item">
<a href="{{url('/in-transit-orders')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>In Transit Orders</p>
</a>
</li>

<li class="nav-item">
  <a href="{{url('/in-stock-orders')}}" class="nav-link">
  <i class="fa fa-circle-o nav-icon"></i>
  <p>In Stock Orders</p>
  </a>
  </li>

<li class="nav-item">
<a href="{{url('/manage-orders')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Manage Order</p>
</a>
</li>

<li class="nav-item">
<a href="{{url('/in-house-orders')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>In House Order</p>
</a>
</li>
<li class="nav-item">
  <a href="{{url('/returning-orders')}}" class="nav-link">
  <i class="fa fa-circle-o nav-icon"></i>
  <p>Returning Order</p>
  </a>
  </li>

  <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>Remarks Order</p>
    </a>
    </li>

    
  <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>Manage Tracking Link</p>
    </a>
    </li>

    <li class="nav-item">
      <a href="#" class="nav-link">
      <i class="fa fa-circle-o nav-icon"></i>
      <p>Replace Orders</p>
      </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
        <i class="fa fa-circle-o nav-icon"></i>
        <p>Restore Cancel Orders</p>
        </a>
        </li>
        <li class="nav-item">
          <a href="{{url('no-status-orders')}}" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>No Status Order</p>
          </a>
          </li>
          <li class="nav-item">
            <a href="{{url('/manage-courier')}}" class="nav-link">
            <i class="fa fa-circle-o nav-icon"></i>
            <p>Manage Courier</p>
            </a>
            </li>                
        </ul>
    </li>
{{-- End of Order Management........... --}}

<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-truck mr-2"></i>
<p>
Courier Wise Orders
<i class="fa fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="{{url('/sundarban')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Sundarban</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Pathao</p>
</a>
</li>

<li class="nav-item">
<a href="{{url('/janani')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Janani</p>
</a>
</li>

<li class="nav-item">
<a href="{{url('/sa-paribahan')}}" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>SA Paribahan </p>
</a>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
  <i class="fa fa-circle-o nav-icon"></i>
  <p>Paperfly</p>
  </a>
  </li>

  <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>RedEx</p>
    </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
      <i class="fa fa-circle-o nav-icon"></i>
      <p>Good2Go</p>
      </a>
      </li>

      <li class="nav-item">
        <a href="#l" class="nav-link">
        <i class="fa fa-circle-o nav-icon"></i>
        <p>Go Go Bangla</p>
        </a>
        </li> 
        
        
      <li class="nav-item">
        <a href="#" class="nav-link">
        <i class="fa fa-circle-o nav-icon"></i>
        <p>DurbinX</p>
        </a>
        </li> 

        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa fa-circle-o nav-icon"></i>
          <p>Steadfat</p>
          </a>
          </li>        

</ul>
</li>
{{-- end of form.....................--}}  
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fa fa-file"></i>
<p>
  Bulk Import
<i class="fa fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="pages/tables/simple.html" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Tracking Link Import</p>
</a>
</li>

<li class="nav-item">
<a href="pages/tables/data.html" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Product Discount Set</p>
</a>
</li>

<li class="nav-item">
<a href="pages/tables/jsgrid.html" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p> RedX Delivery Report</p>
</a>
</li>

<li class="nav-item">
  <a href="pages/tables/data.html" class="nav-link">
  <i class="fa fa-circle-o nav-icon"></i>
  <p>Bulk Stock Update</p>
  </a>
  </li>

</ul>
</li>
{{-- end of Bulk Import.....................--}}
<li class="nav-header text-secondary ml-3">ADVANCE SHEET</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fa fa-file"></i>
<p class="">
 Seller Advance Payment
</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fa fa-money"></i>
<p>Earnings &amp; Payment
<i class="fa fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Generate Invoice</p>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Unpaid Invoice</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
 <i class="fa fa-circle-o nav-icon"></i>
<p>Paid Invoices</p>
</a>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
   <i class="fa fa-circle-o nav-icon"></i>
  <p>Seller Payments History</p>
  </a>
  </li>
</ul>
</li>
{{-- End of Earnings &amp; Payment --}}

<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fa fa-truck"></i>
<p>
Return Management
<i class="fa fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Manage Return</p>
</a>
</li>
</ul>
</li>
{{-- End of Return Management --}}

<li class="nav-item">
  <a href="#" class="nav-link">
  <i class="nav-icon fa fa-area-chart"></i>
  <p>
  Marketing
  <i class="fa fa-angle-left right"></i>
  </p>
  </a>
  <ul class="nav nav-treeview">
  <li class="nav-item">
  <a href="{{url('/offers')}}" class="nav-link">
  <i class="fa fa-circle-o nav-icon"></i>
  <p>Offers</p>
  </a>
  </li>
  </ul>
  </li>
{{-- End of Marketing --}}
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fa fa-truck"></i>
<p style="font-size:14px;">
 Supply Chain Management
<i class="fa fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>
 Collection Links
<i class="fa fa-angle-left right"></i>
</p>
</a>

</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>
Category Banner
<i class="fa fa-angle-left right"></i>
</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Blank Collection Links</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Supplier Based Products</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>SKU Based Products</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Supplier List</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Products List</p>
</a>
</li>

<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Products Without Supplier</p>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>P.O Reports</p>
</a>
</li>
</ul>
</li>
{{-- End of Supply Chain Management --}}

<li class="nav-item">
  <a href="#" class="nav-link">
  <i class="nav-icon fa fa-truck"></i>
  <p>
   Product Download
  <i class="fa fa-angle-left right"></i>
  </p>
  </a>
  <ul class="nav nav-treeview">
  <li class="nav-item">
  <a href="#" class="nav-link">
  <i class="fa fa-circle-o nav-icon"></i>
  <p>Supplier Based Products</p>
  </a>
  </li>
  </ul>
  </li>
{{-- End of Product Download --}}
<li class="nav-item text-secondary ml-3">REPORTS</li>
<li class="nav-item">
  <a href="#" class="nav-link">
  <i class="nav-icon fa fa-line-chart"></i>
  <p>
  Reports &amp; Analysis
  <i class="fa fa-angle-left right"></i>
  </p>
  </a>
  <ul class="nav nav-treeview">

  <li class="nav-item">
  <a href="#" class="nav-link">
  <i class="fa fa-shopping-cart nav-icon"></i>
  <p>Order Reports</p>
  </a>
  </li>

  <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>Supplier Based Products</p>
    </a>
    </li>
    <li class="nav-item">
      <a href="#" class="nav-link">
      <i class="fa fa-circle-o nav-icon"></i>
      <p>Sales Reports</p>
      </a>
      </li>
      <li class="nav-item">
        <a href="#" class="nav-link">
        <i class="fa fa-users nav-icon"></i>
        <p>Sellers Without Orders</p>
        </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
          <i class="fa fa-users nav-icon"></i>
          <p>Sellers With Orders</p>
          </a>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
            <i class="fa fa-users nav-icon"></i>
            <p>Seller Wise Reports</p>
            </a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
              <i class="fa fa-shopping-basket nav-icon"></i>
              <p> Product Wise Reports</p>
              </a>
              </li>
              
              <li class="nav-item">
                <a href="#" class="nav-link">
                <i class="fa fa-shopping-basket nav-icon"></i>
                <p> Seller Ordered Items</p>
                </a>
                </li>

                <li class="nav-item">
                  <a href="#" class="nav-link">
                  <i class="fa fa-file nav-icon"></i>
                  <p> Product Upload Reports</p>
                  </a>
                  </li> 
  </ul>
  </li>
{{-- End of Reports &amp; Analysis --}}
<li class="nav-item text-secondary ml-3">PURCHASE</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="nav-icon fa fa-truck"></i>
<p>
  Purchase Requisition
<i class="fa fa-angle-left right"></i>
</p>
</a>
<ul class="nav nav-treeview">
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p>Purchase Requisition</p>
</a>
</li>
<li class="nav-item">
<a href="#" class="nav-link">
<i class="fa fa-circle-o nav-icon"></i>
<p> Create Auto P.O</p>
</a>
</li>

<li class="nav-item">
  <a href="#" class="nav-link">
  <i class="fa fa-circle-o nav-icon"></i>
  <p>Set Auto P.O Date</p>
  </a>
  </li>

  <li class="nav-item">
    <a href="#" class="nav-link">
    <i class="fa fa-circle-o nav-icon"></i>
    <p>Purchase Details</p>
    </a>
    </li>
</ul>
</li>
{{-- End of Purchase Requisition --}}

<li class="nav-item text-secondary ml-3">CANCEL ORDERS</li>
<li class="nav-item">
  <a href="#" class="nav-link">
  <i class="nav-icon fa fa-file"></i>
  <p>
    Product Refund
  </p>
  </a>
</li>
<li class="nav-item">
  <a href="#" class="nav-link">
  <i class="nav-icon fa fa-file"></i>
  <p>
    Order Cancel
  </p>
  </a>
</li>

<li class="nav-item text-secondary ml-3">QUANTITY REPORTS</li>
<li class="nav-item">
<a href="{{url('current-stock')}}" class="nav-link">
<i class="nav-icon fa fa-file"></i>
<p>
Current Stocks
</p>
</a>
</li>
<li class="nav-item">
  <a href="{{url('stock-alert')}}" class="nav-link">
  <i class="nav-icon fa fa-file"></i>
  <p>
    <span class="" id="position">Stock Alert</span>
    <span class="badge badge-pill badge-danger stock-count">0</span>
  </p>
  </a>
  </li>
{{-- End of QUANTITY REPORTS --}}

<li class="nav-item text-secondary ml-3">MANAGE</li>
<li class="nav-item">
<a href="{{url('customer-data')}}" class="nav-link">
<i class="nav-icon fa fa-file"></i>
<p>
Customer Data
</p>
</a>
</li>
{{-- End of MANAGE --}}
<li class="nav-item text-secondary ml-3">DELIVERY</li>
<li class="nav-item">
<a href="{{url('delivery-man')}}" class="nav-link">
<i class="nav-icon fa fa-file"></i>
<p>
  Delivery Man
</p>
</a>
</li>
<li class="nav-item">
  <a href="{{url('delivery-reports')}}" class="nav-link">
  <i class="nav-icon fa fa-file"></i>
  <p>
    Delivery Reports
  </p>
  </a>
  </li>
{{-- End of DELIVERY............... --}}
</nav>
</div>
</aside>