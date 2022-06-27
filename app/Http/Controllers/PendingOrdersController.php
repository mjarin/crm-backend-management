<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\Product;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PendingOrdersController extends Controller
{

public function pendingOrders(){ 


        $couriers = Courier::all();
        // $orders=Order::where('delivery_status','pending')->get();
        $orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
        ->join('addresses as address', 'order.user_id', '=', 'address.user_id')
        ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
        ->where('order.delivery_status', '=', 'pending')
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
        'shop.shop_name',
        'address.address',
        'product.product_name',
        'supplier.supplier_name'
        ]);
        
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

        // $orders=Order::where('delivery_status','=','pending')->where('id','=', $id)->get();
        $orders=DB::table('orders as order')
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

