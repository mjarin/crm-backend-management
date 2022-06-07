<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class PendingOrdersController extends Controller
{

public function pendingOrders(){ 


        $couriers = Courier::all();
        $orders=Order::where('delivery_status','pending')->get();
        return view('pages.order.view-pending-orders',compact('orders','couriers'));

    }

public function editPendingOrder($id){

        $pending_order = Order::find($id);

        return response()->json([
            'status' => 200,
            'pendingOrder' => $pending_order
        ]);

    }

public function updatePendingOrder(Request $request){

        $order_id = $request->input('order_code');
        $pending_order = Order::find($order_id);
        // $pending_order->code = $request->input('order_code');
        $pending_order->advance_payment = $request->input('advance_payment');
        $pending_order->coupon_discount = $request->input('seller_coupon_discount');
        $pending_order->remarks = $request->input('circle_remarks');
        $pending_order->order_note = $request->input('order_note');
        $pending_order->customer_charge = $request->input('customer_delivery_charge');
        $pending_order->delivery_charge = $request->input('circle_delivery_charge');
        $pending_order->delivery_man = $request->input('delivery_man');
        $pending_order->delivery_date = $request->input('delivery_date');
        $pending_order->collected_price = $request->input('collected_amount');
        $pending_order->delivery_date = $request->input('delivery_date');
        $pending_order->update();
        return redirect()->back()->with('status',$pending_order->code.'   Order Updated successfully');


    }

public function viewSinglePendingOrder($id){

        $orders=Order::where('delivery_status','=','pending')->where('id','=', $id)->get();
        return view('pages.order.single-pending-order',compact('orders'));

    }

public function editPendingOrderDetails($id){
        $pending_order = Order::find($id);
        $pending_order_details = OrderDetails::where('order_id','=', $pending_order->id )->where('delivery_status','=','pending')->first();
    
        return response()->json(['status' => 200,'pendingOrderDetails' => $pending_order_details]); 
    }

public function updatePendingOrderDetails(Request $request){

        $pending_order_id = $request->input('pending_order'); 
        $update_pending_order =OrderDetails::where('order_id','=', $pending_order_id)->where('delivery_status','=','pending')->first();
        $update_pending_order->circle_price = $request->input('pending_circle_price');
        $update_pending_order->selling_price = $request->input('pending_selling_price');
        $update_pending_order->quantity = $request->input('pending_quantity');
        $update_pending_order->variation = $request->input('pending_variation');
        $update_pending_order->update();
        return redirect()->back()->with('status',$pending_order_id. '  Order Deatails Have been Updated');

    }

public function editReturnedPendingOrder($id){

            $pending_order = Order::find($id);
            return response()->json(['status' => 200,'pendingOrder' => $pending_order]); 


    }

public function updatereturnedPendingOrder(Request $request){ 

  $pending_order_id = $request->input('pending_returned_order');
  $update_pending_order =OrderDetails::where('order_id', $pending_order_id)->where('delivery_status','pending')->first();
  $update_pending_order->return_reason = $request->input('pending_order_return_reason');
  $update_pending_order->update();
  return redirect()->back()->with('status','Order  '.$pending_order_id.'  Rturned Reason Has been Saved'); 

} 

public function purchasedPendingOrder($id){

    // $purchased ='Purchased';
    // $pending_order = Order::find($id);
    // $pending_order_purched = OrderDetails::where('order_id','=', $pending_order->id )->where('po_status','=','Unpurchased')->first();
    // $this->po_status = $purchased;
    // $this->update();
    // return redirect()->back()->with('status','Order'.$pending_order->id. ' has been updated');

}




// End of Classs....................................
}

