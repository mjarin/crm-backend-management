<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class OnHoldOrdersController extends Controller
{
public function onHoldOrders(){

    $couriers = Courier::all();
    $orders=Order::where('delivery_status','on hold')->get();
    return view('pages.order.on-hold-orders',compact('orders','couriers'));
   }

public function editOnHoldOrders($id){

    $on_hold_orders = Order::find($id);
    return response()->json(['status' => 200,'onHoldOrder' => $on_hold_orders ]);

}

public function updateOnHoldOrders(Request $request){

    $order_id = $request->input('on_hold_order_id');
    $onHoldOrder = Order::find($order_id);
    $onHoldOrder->advance_payment = $request->input('OnHoldOrder_advance_payment');
    $onHoldOrder->coupon_discount = $request->input('OnHoldOrder_seller_coupon_discount');
    $onHoldOrder->order_note = $request->input('OnHoldOrder_order_note');
    $onHoldOrder->remarks = $request->input('OnHoldOrder_circle_remarks');
    $onHoldOrder->courier = $request->input('OnHoldOrder_courier');
    $onHoldOrder->customer_charge = $request->input('OnHoldOrder_customer_delivery_charge');
    $onHoldOrder->delivery_charge = $request->input('OnHoldOrder_circle_delivery_charge');
    $onHoldOrder->delivery_man = $request->input('OnHoldOrder_delivery_man');
    $onHoldOrder->delivery_date = $request->input('OnHoldOrder_delivery_date');
    $onHoldOrder->collected_price = $request->input('OnHoldOrder_collected_amount');
    $onHoldOrder->reasons = $request->input('OnHoldOrder_reasons');
    $onHoldOrder->update();
    return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');


}

public function viewOnHoldOrderDetails($id){
    $on_hold_order=Order::where('delivery_status','=','on hold')->where('id','=', $id)->get();
    return view('pages.order.single-on-hold-order',compact('on_hold_order'));
}


public function editOnHoldOrderDetails($id){
    $on_hold_order = Order::find($id);
    $on_hold_order_details = OrderDetails::where('order_id','=', $on_hold_order->id )->where('delivery_status','=','on hold')->first();
    return response()->json(['status' => 200,'OnHoldOrderDetails' => $on_hold_order_details]); 

}

public function updateOnHoldOrderDetails(Request $request){
    $on_hold_order_id = $request->input('on_hold_order_details_id'); 
    $update_on_hold_order =OrderDetails::where('order_id', $on_hold_order_id)->where('delivery_status','on hold')->first();
    $update_on_hold_order->circle_price = $request->input('on_hold_order_circle_price');
    $update_on_hold_order->selling_price = $request->input('on_hold_order_selling_price');
    $update_on_hold_order->quantity = $request->input('on_hold_order_quantity');
    $update_on_hold_order->variation = $request->input('on_hold_order_variation');
    $update_on_hold_order->update();
    return redirect()->back()->with('status',$on_hold_order_id. '  Order Deatails Have been Updated');
}


public function editOnHoldOrderReturned($id){

    $returned_order = Order::find($id);
    return response()->json(['status' => 200,'returnedOnHoldOrder' => $returned_order]); 

  }



  public function  updateOnHoldOrderReturned(Request $request){ 
    $on_hold_order_id = $request->input('on-hold-returned_order_id');
    $update_on_hold_order = OrderDetails::where('order_id','=',$on_hold_order_id)->where('delivery_status','=','on hold')->first();
    $update_on_hold_order->return_reason = $request->input('return_reason');
    $update_on_hold_order->update();
    return redirect()->back()->with('status','Order  '.$on_hold_order_id. '  Rturned Reason Has been Saved');
  
  }



 







// End of Cntroller Class.......................................
}

