<?php

namespace App\Http\Controllers\CourierWiseOrders;

use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PathaoReportController extends Controller
{
    public function pathaoReport(){

  
    return view('pages.courierWiseOrders.pathaoOrders.pathao-orsers');

    }

        
public function viewDeliveryReport( Request $request ){

        $from_date = $request->fromdate;
        $to_date = $request->todate;

        $records = Order::whereBetween('delivery_date', array($from_date, $to_date))->get();
        return view('pages.courierWiseOrders.pathaoOrders.view-pathao-delivery-report',compact('records','from_date','to_date'));

    }

public function viewDeliveryReportStep2( Request $request ){

        $from_date = $request->fromdate;
        $to_date  =  $request->todate;

        $records = Order::whereBetween('delivery_date', array($from_date, $to_date))->get();
        return view('pages.courierWiseOrders.pathaoOrders.view-pathao-delivery-report',compact('records','from_date','to_date'));

    }

    public function viewdDateWiseDeliveryReport($date){


        $records=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id')
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('seller_invoice as invoice','order.seller_id', '=','invoice.invoice_id')
        ->join('shops as seller_shop','invoice.user_id', '=', 'seller_shop.user_id')
        ->where('order.delivery_date', $date) 
        ->where('order.delivery_man','Steadfast')
        ->get(['order.id',
        'order.date',
        'order.customer_name',
        'order.remarks',
        'order.customer_phone',
        'order.shipping_address',
        'order.delivery_status',
        'order.collected_price',
        'order.delivery_man',
        'order.delivery_date',
        'order_details.circle_price',
        'order_details.quantity',
        'product.product_name',
        'invoice.invoice_id',
        'seller_shop.shop_name',
        'seller_shop.shop_phone'
        ]);

        return view('pages.courierWiseOrders.pathaoOrders.view-date-wise-pathao-report',compact('records'));

    }

    


// End of class.................................................
}
