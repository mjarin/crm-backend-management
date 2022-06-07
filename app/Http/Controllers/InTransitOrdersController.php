<?php

namespace App\Http\Controllers;

use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class InTransitOrdersController extends Controller
{
    public function InTransitOrders(){
        $couriers = Courier::all();
        $in_transit_orders=Order::where('delivery_status','in transit')->get();
        return view('pages.order.in-transit-orders',compact('in_transit_orders','couriers'));
    }

    public function editInTransitOrder($id){

        $in_transit_order = Order::find($id);
        return response()->json(['status' => 200,'InTransitOrder' => $in_transit_order]);
   
      }

      public function updateInTransitOrders(Request $request){

        $order_id = $request->input('InTransit_order_id');
        $InTransit_order = Order::find($order_id);
        $InTransit_order->advance_payment = $request->input('InTransit_advance_payment');
        $InTransit_order->coupon_discount = $request->input('InTransit_seller_coupon_discount');
        $InTransit_order->order_note = $request->input('InTransit_order_note');
        $InTransit_order->remarks = $request->input('InTransit_circle_remarks');
        $InTransit_order->courier = $request->input('InTransit_courier');
        $InTransit_order->customer_charge = $request->input('InTransit_customer_delivery_charge');
        $InTransit_order->delivery_charge = $request->input('InTransit_circle_delivery_charge');
        $InTransit_order->delivery_man = $request->input('InTransit_delivery_man');
        $InTransit_order->delivery_date = $request->input('InTransit_delivery_date');
        $InTransit_order->collected_price = $request->input('InTransit_collected_amount');
        $InTransit_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');
  
      }


      public function viewSingleInTransitOrder($id){

        $in_transit_order=Order::where('delivery_status','=','in transit')->where('id','=', $id)->get();
        return view('pages.order.single-in-transit-order',compact('in_transit_order'));

      }


      public function editInTransitOrderDetails($id){
        
      $in_transit_order = Order::find($id);
      $in_transit_order_details = OrderDetails::where('order_id','=', $in_transit_order->id )->where('delivery_status','=','in transit')->first();
  
      return response()->json(['status' => 200,'InTransitOrderDetails' => $in_transit_order_details]); 

      }

      public function updateInTransitOrderDetails(Request $request){

        $in_transit_order_id = $request->input('InTransitOrder_details_id'); 
        $update_in_transit_order =OrderDetails::where('order_id', $in_transit_order_id)->where('delivery_status','in transit')->first();
        $update_in_transit_order->circle_price = $request->input('in_transit_circle_price');
        $update_in_transit_order->selling_price = $request->input('in_transit_selling_price');
        $update_in_transit_order->quantity = $request->input('in_transit_quantity');
        $update_in_transit_order->variation = $request->input('in_transit_variation');
        $update_in_transit_order->update();
        return redirect()->back()->with('status',$in_transit_order_id. '  Order Details Have been Updated');

      }


      

      public function editInTransitReturnedOrder($id){ 
        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'InTransitReturnedOrder' => $returned_order]); 
      
      }


      public function updateInTransitReturnedOrder(Request $request){ 
        $in_transit_order_id = $request->input('in_transit_returned_order_id');
        $update_in_transit_order = OrderDetails::where('order_id','=',$in_transit_order_id)->where('delivery_status','=','in transit')->first();
        $update_in_transit_order->return_reason = $request->input('return_reason');
        $update_in_transit_order->update();
        return redirect()->back()->with('status','Order'.$in_transit_order_id. ' Rturned Reason Has been Saved');
  
    }

  
// End of Controller class.................................................
}


