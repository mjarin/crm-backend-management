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

class PaperflyCourierController extends Controller
        {
        public function PaperflyDeliveryReport(){

        return view('pages.courierWiseOrders.PaperflyCourier.paperfly-delivery-report');

        }


    public function viewPaperflyDeliveryReport( Request $request ){
        $from_date =$request->fromdate;
        $to_date =$request->todate;
        $records = Order::whereBetween('delivery_date', array($from_date, $to_date))
                          ->where('delivery_man','=','Paperfly')
                          ->get();
        return view('pages.courierWiseOrders.PaperflyCourier.view-paperfly-delivery-report',compact('records','from_date','to_date'));

    }


    public function viewPaperflyDeliveryReportStep2( Request $request ){
        $from_date =$request->fromdate;
        $to_date =$request->todate;
        $records = Order::whereBetween('delivery_date', array($from_date, $to_date))
                                    ->where('delivery_man','=','Paperfly')
                                    ->get();
        return view('pages.courierWiseOrders.PaperflyCourier.view-paperfly-delivery-report',compact('records','from_date','to_date'));

    }

    public function viewDeliveryReportDateWise($date){

            $records = Order::where('delivery_date', '=', $date)->get();
            return view('pages.courierWiseOrders.PaperflyCourier.view-delivery-date-wise-record',compact('records'));   
    }



//End of Controller Class................................................................................................................................. 
}
