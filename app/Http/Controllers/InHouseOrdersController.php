<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class InHouseOrdersController extends Controller
{
    public function inHouseOrders(){
        $couriers = Courier::all();
        $orders=Order::where('courier','inhouse-sale')->where('delivery_man','inhouse-sale')->get();
        return view('pages.order.InHouseOrders.in-house-orders',compact('orders','couriers'));
    }


    public function editInHouseOrder($id){
        $in_house_order = Order::find($id);
        return response()->json(['status' => 200,'inHouseOrder' => $in_house_order]);
    }


    public function updateinHouseOrder(Request $request)
    {
        
        $order_id = $request->input('inHouse_order_id');
        $inHouse_order = Order::find($order_id);
        $inHouse_order->advance_payment = $request->input('inHouse_advance_payment');
        $inHouse_order->coupon_discount = $request->input('inHouse_seller_coupon_discount');
        $inHouse_order->order_note = $request->input('inHouse_order_note');
        $inHouse_order->remarks = $request->input('inHouse_circle_remarks');
        $inHouse_order->courier = $request->input('inHouse_courier');
        $inHouse_order->customer_charge = $request->input('inHouse_customer_delivery_charge');
        $inHouse_order->delivery_charge = $request->input('inHouse_circle_delivery_charge');
        $inHouse_order->delivery_man = $request->input('inHouse_delivery_man');
        $inHouse_order->delivery_date = $request->input('inHouse_delivery_date');
        $inHouse_order->collected_price = $request->input('inHouse_collected_amount');
        $inHouse_order->delivery_status = $request->input('inHouse_delivery_status');
        $inHouse_order->reasons = $request->input('inHouse_reasons');
        $inHouse_order->payment_status = $request->input('inHouse_payment_status');
        $inHouse_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');
    }

    public function viewSingleInHouseOrder($id){
    $in_house_order=Order::where('id',$id)->where('courier','inhouse-sale')->where('delivery_man','inhouse-sale')->get();
    return view('pages.order.InHouseOrders.single-in-house-order',compact('in_house_order'));
    }

    public function editInHouseOrderDetails($id){

        $in_house_order = Order::find($id);
        $in_house_order_details = OrderDetails::where('order_id','=', $in_house_order->id )->where('courier','inhouse-sale')
        ->where('delivery_man','inhouse-sale')->first();
    
        return response()->json(['status' => 200,'InHouseOrderDetails' => $in_house_order_details]); 

    }

    public function editInHouseOrderReturned($id){

        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'inHouseReturnedOrder' => $returned_order]); 

    }


    public function updateInHouseOrderReturned(Request $request){
        $in_house_order_id = $request->input('in_house_returned_order_id');
        $update_in_house_order = OrderDetails::where('order_id','=',$in_house_order_id)->first();
        $update_in_house_order->return_reason = $request->input('return_reason');
        $update_in_house_order->update();
        return redirect()->back()->with('status','Order  '.$in_house_order_id. '  Rturned Reason Has been Saved');
    }





// End of Controller Class .....................................
}
