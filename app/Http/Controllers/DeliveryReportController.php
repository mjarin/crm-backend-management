<?php

namespace App\Http\Controllers;

use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DeliveryReportController extends Controller
{


    public function deliveryReports(){

        return view('pages.DeliveryReports.delivery-reports');

    }

    public function submitDate(Request $request){


        $from_date =$request->fromdate;
        $to_date =$request->todate;



        $records = Order::whereBetween('delivery_date', array($from_date, $to_date))->get();

        return view('pages.DeliveryReports.view-searched-report',compact('records','from_date','to_date' ));




    }


    public function submitSecondTime(Request $request){

        
        $from_date =$request->fromdate2;
        $to_date =$request->todate2;



        $records = Order::whereBetween('delivery_date', array($from_date, $to_date))->get();

        return view('pages.DeliveryReports.view-searched-report',compact('records','from_date','to_date'));



    }
    




// End of class .......................
}
