<?php

namespace App\Http\Controllers;

use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class InStockOrderController extends Controller
{
public function inStockOrders(){

    // $couriers = Courier::all();

    $orders=DB::table('orders as order')
    ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
    ->join('products as product', 'order_details.product_id', '=', 'product.id')
    ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
    ->join('addresses as address', 'order.user_id', '=', 'address.user_id')
    ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
    ->where('product.current_stock', '>=', 'order_details.quantity')
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
    
    return view('pages.order.InStockOrders.in-stock-orders',compact('orders'));
   }

   public function editStockOrder($id){

    $on_hold_orders = Order::find($id);
    return response()->json(['status' => 200,'inStockOrders' => $on_hold_orders ]);

   }


   public function updateInStockOrder(Request $request){

    $order_id = $request->input('hidden_id');
    $order = Order::find($order_id);
    $order->customer_charge = $request->input('customer_delivery_charge');
    $order->delivery_charge= $request->input('circle_delivery_charge');
    $order->delivery_status = $request->input('delivery_status');
    $order->update();
    return redirect()->back()->with('status','Order  ' .$order_id. ' has been updated');


}

    public function viewSingleInStockOrder($id){
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
        return view('pages.order.InStockOrders.single-in-stock-order',compact('orders'));
    }


    public function editInStockOrderDetails($id){
        $InStock_order = Order::find($id);
        $InStock_order_details = OrderDetails::where('order_id','=', $InStock_order->id )->first();
        return response()->json(['status' => 200,'InStockOrderDetails' => $InStock_order_details]);
    }

    public function updateInStockOrderDetails(Request $request){

        $order_id = $request->input('InStock_order_details_id');
        $InStock_order = OrderDetails::where('order_id','=', $order_id)->first();
        $InStock_order->circle_price = $request->input('InStock_circle_price');
        $InStock_order->selling_price = $request->input('InStock_selling_price');
        $InStock_order->quantity = $request->input('InStock_quantity');
        $InStock_order->variation = $request->input('InStock_variation');
        $InStock_order->update();
        return redirect()->back()->with('status',$InStock_order->id.'   Order Updated successfully');
    }


    public function editInStockOrderReturn($id){

            $in_stock_order = Order::find($id);
            return response()->json(['status' => 200,'InStockOrder' => $in_stock_order]); 

    }


    public function updateInStockOrderReturned(Request $request){ 

        $in_stock_order_id = $request->input('InStock_returnedOrder_id');
        $update_in_stock_order =OrderDetails::where('order_id', $in_stock_order_id)->first();
        $update_in_stock_order->return_reason = $request->input('InStock_order_return_reason');
        $update_in_stock_order->update();
        return redirect()->back()->with('status','Order  '.$in_stock_order_id.'  Rturned Reason Has been Saved'); 
      
      } 
    

      public function editPurchaseStatusIso($id){
        $order_id = Order::find($id);
        return response()->json(['status' => 200,'InStockOrderId' => $order_id]);
    }


    public function updatePurchaseStatusIso(Request $request){

        $order_id = $request->input('hidden_input_id');
        $update_order = OrderDetails::where('order_id','=',$order_id)->first();
        $update_order ->po_status = $request->input('status-iso');
        $update_order->update();
        return redirect()->back()->with('status','Updated Successfully');
    
      }


// End of class.............................................................

}
