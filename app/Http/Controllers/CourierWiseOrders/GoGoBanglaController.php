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

class GoGoBanglaController extends Controller
{  

        public function GogoBanglaDeliveryReport(){
            return view('pages.courierWiseOrders.GoGoBangla.gogobangla-delivery-report');
        }

        public function viewGogoBanglaDeliveryReport(Request $request){
            $from_date =$request->fromdate;
            $to_date =$request->todate;
            $records = Order::whereBetween('delivery_date', array($from_date, $to_date))
                              ->where('delivery_man','=','Go Go Bangla')
                              ->get();
            return view('pages.courierWiseOrders.GoGoBangla.view-gogobangla-delivery-report',compact('records','from_date','to_date'));
        }


        public function gogoBanglaDeliveryReportDatewise($date){

            $records=DB::table('orders as order')
            ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id')
            ->join('products as product', 'order_details.product_id', '=', 'product.id')
            ->join('shops as shop', 'order.seller_id', '=', 'shop.id')
            ->join('seller_invoice as invoice', 'shop.user_id', '=', 'invoice.user_id')
            ->where('order.delivery_date', $date) 
            ->where('order.delivery_man','Go Go Bangla')
            ->get(['order.id',
            'order.date',
            'order.customer_name',
            'order.remarks',
            'order.customer_phone',
            'order.shipping_address',
            'order.delivery_man',
            'order.delivery_date',
            'order_details.circle_price',
            'order_details.quantity',
            'product.product_name',
            'invoice.invoice_no',
            'shop.shop_name',
            'shop.shop_phone'
            ]);

            return view('pages.courierWiseOrders.GoGoBangla.gogobangla-delivery-date-wise',compact('records')); 
        }


        
//End of controller class..............................................................................................................        
}
