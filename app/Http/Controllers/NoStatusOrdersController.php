<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class NoStatusOrdersController extends Controller
{
    public function noStatusOrders(){

        $couriers = Courier::all();
        $no_status_orders=Order::where('delivery_status','=','NULL')->get();
        return view('pages.order.no_status_orders',compact('no_status_orders','couriers'));

    }

    public function editNoStatusOrders($id){
        
        $no_status_order = Order::find($id);
        return response()->json(['status' => 200,'noStatusOrder' => $no_status_order]);
    }

    public function updateNoStatusOrder(Request $request)
    {
        
        $order_id = $request->input('noStatus_order_id');
        $noStatus_order = Order::find($order_id);
        $noStatus_order->advance_payment = $request->input('noStatus_advance_payment');
        $noStatus_order->coupon_discount = $request->input('noStatus_seller_coupon_discount');
        $noStatus_order->order_note = $request->input('noStatus_order_note');
        $noStatus_order->remarks = $request->input('noStatus_circle_remarks');
        $noStatus_order->courier = $request->input('noStatus_courier');
        $noStatus_order->customer_charge = $request->input('noStatus_customer_delivery_charge');
        $noStatus_order->delivery_charge = $request->input('noStatus_circle_delivery_charge');
        $noStatus_order->delivery_man = $request->input('noStatus_delivery_man');
        $noStatus_order->delivery_date = $request->input('noStatus_delivery_date');
        $noStatus_order->collected_price = $request->input('noStatus_collected_amount');
        $noStatus_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');

    }

    public function viewSingleNoStatusOrder($id){

    $no_status_order=Order::where('delivery_status','=','NULL')->where('id','=', $id)->get();
    return view('pages.order.single-no-status-order',compact('no_status_order'));
    }

    public function editNoStatusOrderdeatails($id){
        $no_status_order = Order::find($id);
        $no_status_order_details = OrderDetails::where('order_id','=', $no_status_order->id )->where('delivery_status','=','')->first();
    
        return response()->json(['status' => 200,'NoStatusOrderDetails' => $no_status_order_details]); 
    }

    public function updateNoStatusOrderDetails(Request $request){

        $no_status_order_id = $request->input('NoStatusOrder_details_id'); 
        $update_no_status_order =OrderDetails::where('order_id', $no_status_order_id)->where('delivery_status','')->first();
        $update_no_status_order->circle_price = $request->input('no_status_circle_price');
        $update_no_status_order->selling_price = $request->input('no_status_selling_price');
        $update_no_status_order->quantity = $request->input('no_status_quantity');
        $update_no_status_order->variation = $request->input('no_status_variation');
        $update_no_status_order->update();
        return redirect()->back()->with('status',$no_status_order_id. '  Order Details Have been Updated');

      }



      public function editNoStatusReturnedOrder($id){ 
        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'NoStatusReturnedOrder' => $returned_order]); 
      
      }


      public function updateNoStatusOrderReturned(Request $request){ 
        $no_status_order_id = $request->input('no_status_returned_order_id');
        $update_no_status_order = OrderDetails::where('order_id','=',$no_status_order_id)->where('delivery_status','=','')->first();
        $update_no_status_order->return_reason = $request->input('return_reason');
        $update_no_status_order->update();
        return redirect()->back()->with('status','Order'.$no_status_order_id. ' Rturned Reason Has been Saved');
  
    }








// End of controller class..................................... 
}
