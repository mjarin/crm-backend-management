<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;


class DeliveredOrdersController extends Controller
{
    
    public function deliveredOrders(){
        $couriers = Courier::all();
        $delivered_orders=Order::where('delivery_status','delivered')->get();
        return view('pages.order.delivered-orders',compact('delivered_orders','couriers'));
    
       } 








// End of Controller class................................................
}
