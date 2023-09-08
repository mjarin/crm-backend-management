<?php

namespace App\Http\Controllers\CourierWiseOrders;

use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class SAparibahanController extends Controller
{
    public function SAparibahanOrders(){

        $couriers = Courier::all();
        // $sa_paribahan_orders = Order::where('courier','=','SA Paribahan')->get();
        $sa_paribahan_orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
        ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
        ->where('order.delivery_man','SA Paribahan')
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
        return view('pages.courierWiseOrders.SAparibahan.sa-paribahan-orsers',compact('sa_paribahan_orders','couriers'));

    }

    public function editSAparibahanOrder($id){
        $sa_paribahan_order = Order::find($id);
        return response()->json(['status' => 200,'SAparibahanOrder' => $sa_paribahan_order]);

    }
    public function updateSAparibahanOrder(Request $request){

        $order_id = $request->input('sa_paribahan_order_id');
        $sa_paribahan_order = Order::find($order_id);
        $sa_paribahan_order->advance_payment = $request->input('sa_paribahan_advance_payment');
        $sa_paribahan_order->coupon_discount = $request->input('sa_paribahan_seller_coupon_discount');
        $sa_paribahan_order->order_note = $request->input('sa_paribahan_order_note');
        $sa_paribahan_order->remarks = $request->input('sa_paribahan_circle_remarks');
        $sa_paribahan_order->courier = $request->input('sa_paribahan_courier');
        $sa_paribahan_order->customer_charge = $request->input('sa_paribahan_customer_delivery_charge');
        $sa_paribahan_order->delivery_charge = $request->input('sa_paribahan_circle_delivery_charge');
        $sa_paribahan_order->delivery_man = $request->input('sa_paribahan_delivery_man');
        $sa_paribahan_order->delivery_date = $request->input('sa_paribahan_delivery_date');
        $sa_paribahan_order->reasons = $request->input('sa_paribahan_reasons');
        $sa_paribahan_order->payment_status= $request->input('sa_paribahan_payment_status');
        $sa_paribahan_order->collected_price = $request->input('sa_paribahan_collected_amount');
        $sa_paribahan_order->courier = $request->input('sa_paribahan_courier');
        $sa_paribahan_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');

    }

    public function viewSingleSAparibahanOrder($id){
        // $sa_paribahan_order=Order::where('courier','=','SA paribahan')->where('id','=', $id)->get();
        $sa_paribahan_order=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->where('order.id', '=', $id)
        ->where('order.delivery_man','=','SA paribahan')
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
        return view('pages.courierWiseOrders.SAparibahan.single-sa-paribahan-order',compact('sa_paribahan_order'));
    }

    public function editSAparibahanOrderDetails($id){

        $sa_paribahan_order = Order::find($id);
        $sa_paribahan_order_details = OrderDetails::where('order_id','=', $sa_paribahan_order->id )->first();
        return response()->json(['status' => 200,'SAparibahanOrderDetails' => $sa_paribahan_order_details]); 

    }

    public function updateSAparibahanOrderDetails(Request $request){
        $sa_paribahan_order_id = $request->input('sa_paribahan_hidden_id'); 
        $update_sa_paribahan_order =OrderDetails::where('order_id','=',$sa_paribahan_order_id)->first(); 
        $update_sa_paribahan_order->circle_price = $request->input('sa_paribahan_circle_price');
        $update_sa_paribahan_order->selling_price = $request->input('sa_paribahan_selling_price');
        $update_sa_paribahan_order->quantity = $request->input('sa_paribahan_quantity');
        $update_sa_paribahan_order->variation = $request->input('sa_paribahan_variation');
        $update_sa_paribahan_order->update();
        return redirect()->back()->with('status',$sa_paribahan_order_id. '  Order Details Have been Updated');
    }


    
    public function editSAparibahanOrderReturned($id){
        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'SAparibahanReturned' => $returned_order]); 
      }


      public function updateSAparibahanReturnedOrder(Request $request){
        $sa_paribahan_order_id = $request->input('sa_paribahan_returned_order_id');
        $update_sa_paribahan_order = OrderDetails::where('order_id','=',$sa_paribahan_order_id)->first();
        $update_sa_paribahan_order->return_reason = $request->input('return_reason');
        $update_sa_paribahan_order->update();
        return redirect()->back()->with('status','Order'.$sa_paribahan_order_id. '  Rturned Reason Has been Saved');
      }


      
 public function editPurchaseStatusSAP($id){
        $order_id = Order::find($id);
        return response()->json(['status' => 200,'PurchaseStatusSAP' => $order_id]);
      }


      public function updatePurchaseStatusSAP(Request $request){
        $order_id = $request->input('sa-paribahan-order-id');
        $update_order = OrderDetails::where('order_id','=',$order_id)->first();
        $update_order ->po_status = $request->input('sa-paribahan_purchase_status');
        $update_order->update();
        return redirect()->back()->with('status','Status Updated Successfully');
      
      }      






// End of Controller Class...........................................................................................................
}
