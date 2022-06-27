<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class DeliveredOrdersController extends Controller
{
    
    public function deliveredOrders(){
        $couriers = Courier::all();
        // $delivered_orders=Order::where('delivery_status','delivered')->get();
        $delivered_orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
        ->join('addresses as address', 'order.user_id', '=', 'address.user_id')
        ->where('order.delivery_status', '=', 'delivered')
        ->get(['order.id',
        'order.date',
        'order.code',
        'order.customer_name',
        'order.delivery_status',
        'order.collected_price',
        'order.delivery_man',
        'order.delivery_date',
        'order.remarks',
        'order_details.circle_price',
        'shop.shop_name',
        'address.address'
        ]);

        return view('pages.order.delivered-orders',compact('delivered_orders','couriers'));
    
       } 








// End of Controller class................................................
}
