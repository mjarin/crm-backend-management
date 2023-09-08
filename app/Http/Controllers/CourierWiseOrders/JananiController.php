<?php

namespace App\Http\Controllers\CourierWiseOrders;

use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class JananiController extends Controller
{

    public function JananiCourierOrders(){
    $couriers = Courier::all();
    // $janani_orders = Order::where('courier','=','Janani')->get();
    $janani_orders=DB::table('orders as order')
    ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
    ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
    ->where('order.delivery_man','Janani')
    ->get(['order.id',
    'order.date',
    'order.code',
    'order.payment_status',
    'order.customer_name',
    'order.customer_phone',
    'order.delivery_status',
    'order.collected_price',
    'order.shipping_address',
    'order.delivery_man',
    'order.delivery_date',
    'order_details.circle_price',
    'order_details.po_status',
    'shop.shop_name'
    ]);

    return view('pages.courierWiseOrders.janani.janani-courier-orsers',compact('janani_orders','couriers'));
    }

    public function editJananiCourierOrder($id){

        
        $janani_order = Order::find($id);
        return response()->json(['status' => 200,'jananiOrder' => $janani_order]);

    }

    public function updateJananiCourierOrder(Request $request){

        $order_id = $request->input('janani_order_id');
        $janani_order = Order::find($order_id);
        $janani_order->advance_payment = $request->input('janani_advance_payment');
        $janani_order->coupon_discount = $request->input('janani_seller_coupon_discount');
        $janani_order->order_note = $request->input('janani_order_note');
        $janani_order->remarks = $request->input('janani_circle_remarks');
        $janani_order->courier = $request->input('janani_courier');
        $janani_order->customer_charge = $request->input('janani_customer_delivery_charge');
        $janani_order->delivery_charge = $request->input('janani_circle_delivery_charge');
        $janani_order->delivery_man = $request->input('janani_delivery_man');
        $janani_order->delivery_date = $request->input('janani_delivery_date');
        $janani_order->reasons = $request->input('janani_reasons');
        $janani_order->payment_status= $request->input('janani_payment_status');
        $janani_order->collected_price = $request->input('janani_collected_amount');
        $janani_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated'); 
  
      }

      public function viewSingleJananiCourierOrder($id){
          
        // $janani_order=Order::where('courier','=','Janani')->where('id','=', $id)->get();
        $janani_order=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->where('order.id', '=', $id)
        ->where('order.delivery_man','=','Janani')
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

        return view('pages.courierWiseOrders.janani.single-janani-courier-order',compact('janani_order'));
      }



      public function editJananiOrderDeatails($id){
        $janani_order = Order::find($id);
        $janani_order_details = OrderDetails::where('order_id','=', $janani_order->id )->first();
        return response()->json(['status' => 200,'jananiOrderDetails' => $janani_order_details]); 

      }
      public function updateJananiOrderDetails(Request $request){
        $janani_order_id = $request->input('jananiOrderDetails_id'); 
        $update_janani_order =OrderDetails::where('order_id','=',$janani_order_id)->first(); 
        $update_janani_order->circle_price = $request->input('janani_circle_price');
        $update_janani_order->selling_price = $request->input('janani_selling_price');
        $update_janani_order->quantity = $request->input('janani_quantity');
        $update_janani_order->variation = $request->input('janani_variation');
        $update_janani_order->update();
        return redirect()->back()->with('status',$janani_order_id. '  Order Details Have been Updated');
      }


      public function editJananiOrderReturned($id){
        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'JananiOrderReturned' => $returned_order]); 
      }


      public function updateJananiOrderReturned(Request $request){
        $janani_order_id = $request->input('janani_returned_order_id');
        $update_janani_order = OrderDetails::where('order_id','=',$janani_order_id)->first();
        $update_janani_order->return_reason = $request->input('return_reason');
        $update_janani_order->update();
        return redirect()->back()->with('status','Order  '.$janani_order_id. ' Rturned Reason Has been Saved');
      }


        public function editPurchaseStatusJanani($id){
          $order_id = Order::find($id);
          return response()->json(['status' => 200,'jananiPurchaseStatus' => $order_id]);
        }

      public function updatePurchseStatusJanani(Request $request){
        $order_id = $request->input('janani-order-id');
        $update_order = OrderDetails::where('order_id','=',$order_id)->first();
        $update_order ->po_status = $request->input('janani_purchase_status');
        $update_order->update();
        return redirect()->back()->with('status','Status Updated Successfully');

    }





// End of Controller Class.................................................................   
}
