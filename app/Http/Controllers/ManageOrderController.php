<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ManageOrderController extends Controller
{
    public function ManageOrders(){

        return view('pages.order.manageOrders.manage-orders');

    }


    public function submitOrderIdStep1(Request $request){

        $couriers = Courier::all();
        $orderId =$request->input('order_id');
        // $order =Order::where('id','=',$orderId)->get();
        $orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
        ->join('addresses as address', 'order.user_id', '=', 'address.user_id')
        ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
        ->where('order.id', '=',$orderId)
        ->get(['order.id',
        'order.date',
        'order.code',
        'order.customer_name',
        'order.delivery_status',
        'order.collected_price',
        'order.delivery_man',
        'order.delivery_date',
        'order.remarks',
        'order.updated_by',
        'order_details.circle_price',
        'shop.shop_name',
        'address.address',
        'product.product_name',
        'supplier.supplier_name'
        ]);
        return view('pages.order.manageOrders.view-selected-order',compact('orders','couriers'));

    }

    public function submitOrderIdStep2(Request $request){

        $couriers = Courier::all();
        $orderId =$request->input('orderId');
        // $order =Order::where('id','=',$orderId)->get();
        $orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
        ->join('addresses as address', 'order.user_id', '=', 'address.user_id')
        ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
        ->where('order.id', '=',$orderId)
        ->get(['order.id',
        'order.date',
        'order.code',
        'order.customer_name',
        'order.delivery_status',
        'order.collected_price',
        'order.delivery_man',
        'order.delivery_date',
        'order.remarks',
        'order.updated_by',
        'order_details.circle_price',
        'shop.shop_name',
        'address.address',
        'product.product_name',
        'supplier.supplier_name'
        ]);
        return view('pages.order.manageOrders.view-selected-order',compact('orders','couriers'));

    }


    public function editSelectedOrder($id){
        $selected_order = Order::find($id);
        return response()->json(['status' => 200,'selectedOrder' => $selected_order]);
    }

    public function updateSelectedOrder(Request $request){
        $order_id = $request->input('selected_order_id');
        $selected_order = Order::find($order_id);
        $selected_order->advance_payment = $request->input('selected_advance_payment');
        $selected_order->coupon_discount = $request->input('selected_seller_coupon_discount');
        $selected_order->order_note = $request->input('selected_order_note');
        $selected_order->remarks = $request->input('selected_circle_remarks');
        $selected_order->courier = $request->input('selected_courier');
        $selected_order->customer_charge = $request->input('selected_customer_delivery_charge');
        $selected_order->delivery_charge = $request->input('selected_circle_delivery_charge');
        $selected_order->delivery_man = $request->input('selected_delivery_man');
        $selected_order->delivery_date = $request->input('selected_delivery_date');
        $selected_order->collected_price = $request->input('selected_collected_amount');
        $selected_order->reasons = $request->input('selected_reasons');
        $selected_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id.' Has Been  Updated');
    }

    public function viewSingleSelectedOrder($id){

        // $selected_order=Order::where('id','=', $id)->get();
        $selected_order=DB::table('orders as order')
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
        return view('pages.order.manageOrders.single-selected-order',compact('selected_order'));
    }

    public function editSelectedOrderDetails($id){

        $selected_order = Order::find($id);
        $selected_order_details = OrderDetails::where('order_id','=', $selected_order->id )->first();
    
        return response()->json(['status' => 200,'selectedOrderDetails' => $selected_order_details]); 

    }

    public function updateSelectedOrderDetails (Request $request){

        $selected_order_id = $request->input('selected_order_details_id'); 
        $update_selected_order =OrderDetails::where('order_id', $selected_order_id)->first();
        $update_selected_order->circle_price = $request->input('selected_order_circle_price');
        $update_selected_order->selling_price = $request->input('selected_order_selling_price');
        $update_selected_order->quantity = $request->input('selected_order_quantity');
        $update_selected_order->variation = $request->input('selected_order_variation');
        $update_selected_order->update();
        return redirect()->back()->with('status',$selected_order_id. '  Order Details Have been Updated');

    }

    public function editSelectedOrderReturned($id){ 
        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'selectedReturnedOrder' => $returned_order]); 
      
      }


      public function updateSelectedReturnedOrder(Request $request){ 
        $selected_order_id = $request->input('selected_returned_order_id');
        $update_selected_order = OrderDetails::where('order_id','=',$selected_order_id)->first();
        $update_selected_order->return_reason = $request->input('return_reason');
        $update_selected_order->update();
        return redirect()->back()->with('status','Order'.$selected_order_id. ' Rturned Reason Has been Saved');
  
    }

    public function editSelectedOrderPurchaseStatus($id){

        $selected_order = Order::find($id);
        return response()->json(['status' => 200,'selectedOrder' => $selected_order]); 
      

    }

    public function updateSelectedOrderPurchaseStatus(Request $request){

        $selected_order_id = $request->input('sops_id');
        $update_selected_order = OrderDetails::where('order_id','=',$selected_order_id)->first();
        $update_selected_order->po_status= $request->input('purchase_status');
        $update_selected_order->update();
        return redirect()->back()->with('status','Order'.$selected_order_id. ' Purchase Status Has been Updated');

    }

    public function updateSelectedOrderPurchased($id, $po_status){
        $order = Order::find($id);
        $update_status =  OrderDetails::where('order_id','=',$order->id)->where('po_status', $po_status)->first();
        if($po_status = 'Purchased'){
        $update_status->po_status ='Unpurchased';
        }elseif($po_status = 'Unpurchased'){
            $update_status->po_status = 'Unpurchased';

        }
            $update_status->update();
            return redirect()->back()->with('status','Status has been Updated');
    }



// End of Controller Class................................ 
}
