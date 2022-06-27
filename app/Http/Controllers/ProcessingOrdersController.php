<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class ProcessingOrdersController extends Controller
{

    public function processingOrders(){
        $couriers = Courier::all();
        // $orders=Order::where('delivery_status','processing')->get();

        $orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
        ->join('addresses as address', 'order.user_id', '=', 'address.user_id')
        ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
        ->where('order.delivery_status', '=','processing')
        ->get(['order.id',
        'order.date',
        'order.code',
        'order.customer_name',
        'order.delivery_status',
        'order.collected_price',
        'order.delivery_man',
        'order.delivery_date',
        'order.remarks',
        'order_details.circle_price',
        'order_details.po_status',
        'shop.shop_name',
        'address.address',
        'product.product_name',
        'supplier.supplier_name'
        ]);

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



    $processing_order=DB::table('orders as order')
    ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
    ->join('products as product', 'order_details.product_id', '=', 'product.id')
    ->where('order.id', '=', $id)
    ->get(['order.id',
    'order.date',
    'order.delivery_status',
    'order_details.selling_price',
    'order_details.circle_price',
    'order_details.variation',
    'order_details.quantity',
    'order_details.po_status',
    'product.sku',
    'product.photos',
    'product.product_name',
    ]);	

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

public function editProcessingOrderReturned($id){
    $processing_order = Order::find($id);
    return \response()->json(['status' => 200,'processingOrder' => $processing_order]); 
}

public function updateProcessingOrderReturned(Request $request){

    $processing_order_id = $request->input('processing_returned_order_id');
    $update_processing_order =OrderDetails::where('order_id', $processing_order_id)->where('delivery_status','processing')->first();
    $update_processing_order->return_reason = $request->input('return_reason');
    $update_processing_order->update();
    return redirect()->back()->with('status','Order  '.$processing_order_id.'  Rturned Reason Has been Saved'); 

}


















// End of class........................
}
