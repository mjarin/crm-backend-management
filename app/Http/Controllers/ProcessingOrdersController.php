<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;


class ProcessingOrdersController extends Controller
{

    public function processingOrders(){
        $couriers = Courier::all();
        $orders=Order::where('delivery_status','processing')->get();
        return view('pages.order.view-processing-orders',compact('orders','couriers'));

    }

    public function editProcessingOrders($id){
        $processing_order = Order::find($id);
        return response()->json(['status' => 200,'processingOrder' => $processing_order]);
    }

    
    public function updateProcessingOrder(Request $request){ 

        $processing_order_id = $request->input('processing_order_id');
        $processing_order = Order::find($processing_order_id);
        $processing_order->advance_payment = $request->input('processing_advance_payment');
        $processing_order->coupon_discount = $request->input('processing_seller_coupon_discount');
        $processing_order->order_note = $request->input('processing_order_note');
        $processing_order->remarks = $request->input('processing_circle_remarks');
        $processing_order->courier = $request->input('processing_courier');
        $processing_order->customer_charge = $request->input('processing_customer_delivery_charge');
        $processing_order->delivery_charge = $request->input('processing_circle_delivery_charge');
        $processing_order->delivery_man = $request->input('processing_delivery_man');
        $processing_order->delivery_date = $request->input('processing_delivery_date');
        // $processing_order->Reasons = $request->input('processing_Reasons');
        $processing_order->collected_price = $request->input('processing_collected_amount');
        $processing_order->update();
        return redirect()->back()->with('status','Order  ' .$processing_order->id. '   Updated Successfully');


    }

public function ViewSingleProcessingOrder($id){

    $processing_order=Order::where('delivery_status','=','processing')->where('id','=', $id)->get();
    return view('pages.order.single-processing-order',compact('processing_order'));


}

public function editProcessingOrderDetails($id){


    $processing_order = Order::find($id);
    $processing_order_details = OrderDetails::where('order_id','=', $processing_order->id )->where('delivery_status','=','processing')->first();

    return response()->json(['status' => 200,'processingOrderDetails' => $processing_order_details]);
   

}

public function updateProcessingOrderDetails(Request $request){

    $processing_order_id = $request->input('processing_order_details_id'); 
    $update_processing_order =OrderDetails::where('order_id', $processing_order_id)->where('delivery_status','processing')->first();
    $update_processing_order->circle_price = $request->input('processing_circle_price');
    $update_processing_order->selling_price = $request->input('processing_selling_price');
    $update_processing_order->quantity = $request->input('processing_quantity');
    $update_processing_order->variation = $request->input('processing_variation');
    $update_processing_order->update();
    return redirect()->back()->with('status',$processing_order_id. '  Order Deatails Updated Successfully');


}


















// End of class........................
}
