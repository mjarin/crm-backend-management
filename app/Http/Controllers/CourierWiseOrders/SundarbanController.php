<?php

namespace App\Http\Controllers\CourierWiseOrders;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SundarbanController extends Controller
{
    public function SundarbanCourierOrders(){
        $couriers = Courier::all();
        // $sundarban_orders = Order::where('courier','=','Sundarban')->get();
        $sundarban_orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
        ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
        ->join('courier as courier', 'order.courier', '=', 'courier.value')
        ->where('order.delivery_man','=','Sundarban')
        ->get(['order.id',
        'order.date',
        'order.code',
        'order.customer_name',
        'order.customer_phone',
        'order.delivery_status',
        'order.collected_price',
        'order.delivery_man',
        'order.delivery_date',
        'order.shipping_address',
        'order.remarks',
        'order_details.circle_price',
        'shop.shop_name',
        'product.product_name',
        'supplier.supplier_name'
        ]);	


        return view('pages.courierWiseOrders.sundarban.sundarban-courier-orsers',compact('sundarban_orders','couriers'));

    }


    public function editSundarbanCourierOrder($id){

        $sundarban_order = Order::find($id);
        return response()->json(['status' => 200,'SundarbanOrder' => $sundarban_order]);

    }

    public function updateSundarbanCourierOrder(Request $request){

        $order_id = $request->input('Sundarban-order-id');
        $sundarban_order = Order::find($order_id);
        $sundarban_order->advance_payment = $request->input('sundarban_advance_payment');
        $sundarban_order->coupon_discount = $request->input('sundarban_seller_coupon_discount');
        $sundarban_order->order_note = $request->input('sundarban_order_note');
        $sundarban_order->remarks = $request->input('sundarban_circle_remarks');
        $sundarban_order->courier = $request->input('sundarban_courier');
        $sundarban_order->customer_charge = $request->input('sundarban_customer_delivery_charge');
        $sundarban_order->delivery_charge = $request->input('sundarban_circle_delivery_charge');
        $sundarban_order->delivery_man = $request->input('sundarban_delivery_man');
        $sundarban_order->delivery_date = $request->input('sundarban_delivery_date');
        $sundarban_order->reasons = $request->input('sundarban_reasons');
        $sundarban_order->payment_status= $request->input('sundarban_payment_status');
        $sundarban_order->collected_price = $request->input('sundarban_collected_amount');
        $sundarban_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');
  
      }

      public function viewSingleSundarbanCourierOrder($id){
          
        // $sundarban_order=Order::where('courier','=','Sundarban')->where('id','=', $id)->get();
        $sundarban_order=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->where('order.id', '=', $id)
        ->where('order.delivery_man', '=','Sundarban')
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
        'product.product_name'
        ]);		

        return view('pages.courierWiseOrders.sundarban.single-sundarban-order',compact('sundarban_order'));
      }



    public function editSundarbanCourierOrderDetails($id){
        $sundarban_order = Order::find($id);
        $sundarban_order_details = OrderDetails::where('order_id','=', $sundarban_order->id )->first();
        return response()->json(['status' => 200,'SundarbanOrderDetails' => $sundarban_order_details]); 

      }


      public function updateSundarbanOrderDetails(Request $request){
        $sundarban_order_id = $request->input('sundarbanOrderDetails_id'); 
        $update_sundarban_order =OrderDetails::where('order_id','=',$sundarban_order_id)->first(); 
        $update_sundarban_order->circle_price = $request->input('sundarban_circle_price');
        $update_sundarban_order->selling_price = $request->input('sundarban_selling_price');
        $update_sundarban_order->quantity = $request->input('sundarban_quantity');
        $update_sundarban_order->variation = $request->input('sundarban_variation');
        $update_sundarban_order->update();
        return redirect()->back()->with('status',$sundarban_order_id. '  Order Details Have been Updated');
      }


      public function editSundarbanOrderReturned($id){
        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'SundarbanOrderReturned' => $returned_order]); 
      }


      public function updateSundarbanOrderReturned(Request $request){
        $sundarban_order_id = $request->input('sundarban_returned_order_id');
        $update_sundarban_order = OrderDetails::where('order_id','=',$sundarban_order_id)->first();
        $update_sundarban_order->return_reason = $request->input('return_reason');
        $update_sundarban_order->update();
        return redirect()->back()->with('status','Order'.$sundarban_order_id. ' Rturned Reason Has been Saved');
      }

      public function getId($id){

        $order_id = Order::find($id);
        return response()->json(['status' => 200,'SundarbanOrderId' => $order_id]);

      }



// End of Controller Class.....................................................
}


