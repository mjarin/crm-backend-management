<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class ReturningOrdersController extends Controller
{
    public function returningOrders(){
        $couriers = Courier::all();
        $returning_orders=Order::where('delivery_status','returning')->get();
        return view('pages.order.returning-orders',compact('returning_orders','couriers'));
    }

    public function editReturningOrders($id){

        $returning_order = Order::find($id);
        return response()->json(['status' => 200,'ReturningOrder' => $returning_order]);
   
      }

      public function updateReturningOrder(Request $request){
        $order_id = $request->input('returning_order_id');
         $returning_order = Order::find($order_id);
        $returning_order->advance_payment = $request->input('returning_advance_payment');
        $returning_order->coupon_discount = $request->input('returning_seller_coupon_discount');
        $returning_order->order_note = $request->input('returning_order_note');
        $returning_order->remarks = $request->input('returning_circle_remarks');
        $returning_order->courier = $request->input('returning_courier');
        $returning_order->customer_charge = $request->input('returning_customer_delivery_charge');
        $returning_order->delivery_charge = $request->input('returning_circle_delivery_charge');
        $returning_order->delivery_man = $request->input('returning_delivery_man');
        $returning_order->delivery_date = $request->input('returning_delivery_date');
        $returning_order->collected_price = $request->input('returning_collected_amount');
        $returning_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');
      }

      public function viewSingleReturningOrder($id){
        $returning_order=Order::where('delivery_status','=','returning')->where('id','=', $id)->get();
        return view('pages.order.single-returning-order',compact('returning_order'));
      }


      public function editReturningOrderDetails($id){
          
        $returning_order = Order::find($id);
        $returning_order_details = OrderDetails::where('order_id','=', $returning_order->id )->where('delivery_status','=','returning')->first();
        return response()->json(['status' => 200,'returningOrderDetails' => $returning_order_details ]); 

      }


      public function updateReturningOrderDetails(Request $request){
        $returning_order_id = $request->input('returning_details_hidden_id'); 
        $update_returning_order =OrderDetails::where('order_id', $returning_order_id)->where('delivery_status','returning')->first();
        $update_returning_order->circle_price = $request->input('returning_circle_price');
        $update_returning_order->selling_price = $request->input('returning_selling_price');
        $update_returning_order->quantity = $request->input('returning_quantity');
        $update_returning_order->variation = $request->input('returning_variation');
        $update_returning_order->update();
        return redirect()->back()->with('status',$returning_order_id. '  Order Details Have been Updated');
      }

      public function editReturningOrderReturned($id){
        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'ReturningReturnedOrder' => $returned_order]); 
      }

      public function updateReturningOrderReturned(Request $request){

        $returning_order_id = $request->input('returning_returned_order_id');
        $update_returning_order = OrderDetails::where('order_id','=',$returning_order_id)->where('delivery_status','=','returning')->first();
        $update_returning_order->return_reason = $request->input('return_reason');
        $update_returning_order->update();
        return redirect()->back()->with('status','Order  '.$returning_order_id. ' Rturned Reason Has been Saved');
  

      }


  
      
// End of Controller class.................................................      
}
