<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\DeliveryMan;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use DB;

class InHouseOrdersController extends Controller
{
    public function inHouseOrders(){
        $couriers = Courier::all();
        // $orders=Order::where('courier','inhouse-sale')->where('delivery_man','inhouse-sale')->get();
        $orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->where('order.delivery_man','inhouse-sale')
        ->get(['order.id',
        'order.date',
        'order.code',
        'order.payment_status',
        'order.customer_name',
        'order.delivery_status',
        'order.collected_price',
        'order.delivery_man',
        'order.delivery_date',
        'order_details.circle_price',
        'order_details.po_status',
        'order.shipping_address'
        ]);
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
    // $in_house_order=Order::where('id',$id)->where('courier','inhouse-sale')->where('delivery_man','inhouse-sale')->get();

    $in_house_order=DB::table('orders as order')
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
    return view('pages.order.InHouseOrders.single-in-house-order',compact('in_house_order'));
    }

    public function editInHouseOrderDetails($id){

        $in_house_order = Order::find($id);
        $in_house_order_details = OrderDetails::where('order_id','=', $id )->first();
        return response()->json(['status' => 200,'InHouseOrderDetails' => $in_house_order_details]); 

    }

    public function editInHouseOrderReturned($id){

        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'inHouseReturnedOrder' => $returned_order]); 

    }

    public function updateInHouseOrderDetails(Request $request){

        $order_id = $request->input('in_house_details_id'); 
        $update_in_house_order =OrderDetails::where('order_id','=', $order_id)->first();
        $update_in_house_order->circle_price = $request->input('in_house_circle_price');
        $update_in_house_order->selling_price = $request->input('in_house_selling_price');
        $update_in_house_order->quantity = $request->input('in_house_quantity');
        $update_in_house_order->variation = $request->input('in_house_variation');
        $update_in_house_order->update();
        return redirect()->back()->with('status','Order ' .$order_id. '  Deatails Have been Updated');

    }


    public function updateInHouseOrderReturned(Request $request){
        $in_house_order_id = $request->input('in_house_returned_order_id');
        $update_in_house_order = OrderDetails::where('order_id','=',$in_house_order_id)->first();
        $update_in_house_order->return_reason = $request->input('return_reason');
        $update_in_house_order->update();
        return redirect()->back()->with('status','Order  '.$in_house_order_id. '  Rturned Reason Has been Saved');
    }

    public function editPurchaseStatusIHO($id){

    $order_id = Order::find($id);
    return response()->json(['status' => 200,'inHouseOrder' => $order_id]);

    }


    public function updatePurchaseStatusIHO(Request $request){

        $order_id = $request->input('hidden_input_id_inho');
        $update_order = OrderDetails::where('order_id','=',$order_id)->first();
        $update_order ->po_status = $request->input('status-inho');
        $update_order->update();
        return redirect()->back()->with('status','Status Updated Successfully');
    
      }

      public function editInHouseOrderStep2($id){

        $delivery_man = DeliveryMan::all();
        $order =Order::find($id);
        return view('pages.order.InHouseOrders.update-in-house-order-step2',compact('order','delivery_man'));

      }

      public function updateInHouseOrderStep2(Request $request){

        $id =$request->input('order_id');
        $order = Order::find($id);
        $order->id= $request->input('order_id');
        $order->collected_price=$request->input('collected_amount');
        $order->remarks=$request->input('circle_remarks');
        $order->delivery_charge = $request->input('total_delivery_charge');
        $order->delivery_man=$request->input('delivery_man');
        $order->delivery_date=$request->input('delivery_date');
        $order->delivery_status=$request->input('delivery_status');
        $order->payment_status =$request->input('payment_status');
        $order->update();
        return redirect()->back()->with('success','Order Updated Successfully'); 
    
    }





// End of Controller Class .....................................
}
