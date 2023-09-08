<?php

namespace App\Http\Controllers\CourierWiseOrders;

use Session; 
use Carbon\Carbon;
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class DurbinxController extends Controller
{
    public function DurbinxDeliveryReport(){
        return view('pages.courierWiseOrders.DurbinX.durbinx-delivery-report');
    }


    public function viewDurbinxDeliveryReportStep1(Request $request){

    $from_date =$request->fromdate;
    $to_date =$request->todate;
    $records = Order::whereBetween('delivery_date', array($from_date, $to_date))
                      ->where('delivery_man','=','DurbinX')
                      ->get();
    return view('pages.courierWiseOrders.DurbinX.durbinx-delivery-report-step1',compact('records','from_date','to_date'));

    }

    public function viewDurbinxDeliveryReportStep2(Request $request){

    $from_date =$request->fromdate;
    $to_date =$request->todate;
    $records = Order::whereBetween('delivery_date', array($from_date, $to_date))
                      ->where('delivery_man','=','DurbinX')
                      ->get();
    return view('pages.courierWiseOrders.DurbinX.durbinx-delivery-report-step1',compact('records','from_date','to_date'));

    }

    public function durbinxDeliveryReportDatewise($date){

        $records=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id')
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('seller_invoice as invoice', 'order.user_id', '=', 'invoice.user_id')
        ->join('shops as seller_shop', 'order.seller_id', '=', 'seller_shop.id')
        ->where('order.delivery_date',$date) 
        ->where('order.delivery_man','DurbinX')
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
        'invoice.invoice_no',
        'seller_shop.shop_name',
        'seller_shop.shop_phone'
        ]);
        return view('pages.courierWiseOrders.DurbinX.durbinx-delivery-date-wise',compact('records'));


    }




//End of controller class..............................................................................................................     
}
