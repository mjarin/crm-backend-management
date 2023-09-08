<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\DeliveryMan;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RemarksOrdersController extends Controller
{
    public function viewRemarksOrders(){
        $couriers = Courier::all();

        $orders=DB::table('orders')->WhereNotNull('remarks')->Where('remarks','!=','')
        ->join('order_details', 'order_details.order_id', '=', 'orders.id') 
        ->join('shops', 'orders.seller_id', '=', 'shops.id')
        ->get(['orders.id',
        'orders.date',
        'orders.code',
        'orders.remarks',
        'orders.delivery_man',
        'orders.delivery_date',
        'orders.customer_name',
        'orders.delivery_status',
        'orders.collected_price',
        'orders.shipping_address',
        'order_details.circle_price',
        'shops.shop_name'
        ]);
        return view('pages.order.RemarksOrders.view-remarks-orders',compact('orders','couriers'));
    }


public function editRemarksOrders($id){
    $remarks_order = Order::find($id);

    return response()->json([
        'status' => 200,
        'remarksOrder' => $remarks_order
     ]);

}


public function updateRemarksOrders(Request $request){

    $order_id = $request->input('remarks_order_id');
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






// End of Controller Class...............................................
}
