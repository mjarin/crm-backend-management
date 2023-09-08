<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReadyForPackagingController extends Controller
{

public function readyForPackaging() {

    $couriers = Courier::all();
    // $packaging_orders=Order::where('delivery_status','ready for packaging')->get();

    $packaging_orders=DB::table('orders as order')
    ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
    ->join('products as product', 'order_details.product_id', '=', 'product.id')
    ->join('shops as shop', 'order.seller_id', '=', 'shop.id')
    ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
    ->where('order.delivery_status', '=', 'ready for packaging')
    ->get(['order.id',
    'order.date',
    'order.code',
    'order.customer_name',
    'order.delivery_status',
    'order.shipping_address',
    'order.collected_price',
    'order.delivery_man',
    'order.delivery_date',
    'order.remarks',
    'order_details.circle_price',
    'product.product_name',
    'supplier.supplier_name',
    'shop.shop_name'
    ]);

    return view('pages.order.ready-for-packaging',compact('packaging_orders','couriers'));

   }

   public function editReadyForPackaging($id){

     $packaging_order = Order::find($id);
     return response()->json(['status' => 200,'packagingOrder' => $packaging_order]);


   }

   public function updateReadyForPackagingOrder(Request $request){

    $order_id = $request->input('ready-for-packaging-order-name');
    // echo $order_id;
    $readyForPackagingOrder = Order::find($order_id);
    $readyForPackagingOrder->advance_payment = $request->input('readyToPackaging_advance_payment');
    $readyForPackagingOrder->coupon_discount = $request->input('readyToPackaging_seller_coupon_discount');
    $readyForPackagingOrder->order_note = $request->input('readyToPackaging_order_note');
    $readyForPackagingOrder->remarks = $request->input('readyToPackaging_circle_remarks');
    $readyForPackagingOrder->courier = $request->input('readyToPackaging_courier');
    $readyForPackagingOrder->customer_charge = $request->input('readyToPackaging_customer_delivery_charge');
    $readyForPackagingOrder->delivery_charge = $request->input('readyToPackaging_circle_delivery_charge');
    $readyForPackagingOrder->delivery_man = $request->input('readyToPackaging_delivery_man');
    $readyForPackagingOrder->delivery_date = $request->input('readyToPackaging_delivery_date');
    $readyForPackagingOrder->collected_price = $request->input('readyToPackaging_collected_amount');
    $readyForPackagingOrder->reasons = $request->input('readyToPackaging_reasons');
    $readyForPackagingOrder->payment_status = $request->input('readyToPackaging_payment_status');
    $readyForPackagingOrder->update();
    return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');

   }
   

   public function viewSinglePackagingOrder($id){

    // $packaging_order=Order::where('delivery_status','=','ready for packaging')->where('id','=', $id)->get();

    $packaging_orders=DB::table('orders as order')
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

    return view('pages.order.single-packaging-order',compact('packaging_orders'));
   }

   public function editPackagingOrderDetails($id){

    $packaging_order = Order::find($id);
    $packaging_order_details = OrderDetails::where('order_id','=', $packaging_order->id )->where('delivery_status','=','ready for packaging')->first();

    return response()->json(['status' => 200,'packagingOrderDetails' => $packaging_order_details]); 
   
}


public function updatePackagingOrderDetails(Request $request){
  $packaging_order_id = $request->input('packaging_order_details_name'); 
  $update_packaging_order =OrderDetails::where('order_id', $packaging_order_id)->where('delivery_status','ready for packaging')->first();
  $update_packaging_order->circle_price = $request->input('packaging_circle_price');
  $update_packaging_order->selling_price = $request->input('packaging_selling_price');
  $update_packaging_order->quantity = $request->input('packaging_quantity');
  $update_packaging_order->variation = $request->input('packaging_variation');
  $update_packaging_order->update();
  return redirect()->back()->with('status',$packaging_order_id. '  Order Deatails Have been Updated');

}

public function returnedPackagingOrder($id){

  $packaging_order = Order::find($id);
  return response()->json(['status' => 200,'packagingOrder' => $packaging_order]); 
   
}

public function updateReturnedPackagingOrder(Request $request){

 $packaging_order_id = $request->input('returned_order');
  $update_packaging_order =OrderDetails::where('order_id', $packaging_order_id)->where('delivery_status','ready for packaging')->first();
  $update_packaging_order->return_reason = $request->input('return_reason');
  $update_packaging_order->update();
  return redirect()->back()->with('status','Order'.$packaging_order_id. ' Rturned Reason Has been Saved');

}

public function editPurchasedStatus($id){

  $selected_order = Order::find($id);
  return response()->json(['status' => 200,'selectedOrder' => $selected_order]); 
      

    }

    public function updatePurchasedStatus(Request $request){

        $order_id = $request->input('selected-order-id');
        $update_order = OrderDetails::where('order_id','=',$order_id)->first();
        $update_order->po_status= $request->input('packaging_order_purchase_status');
        $update_order->update();
        return redirect()->back()->with('status',' Purchase Status Updated');

    }

    public function editPackagingOrderStep2($id){
      $delivery_man = Courier::all();
      $order =Order::find($id);
      return view('pages.order.ReadyForPackaging.update-packaging-order-step2',compact('order','delivery_man'));
  }
  
  public function updatePackagingOrderStep2(Request $request){
  
      $id =$request->input('order_id');
      $order = Order::find($id);
      $order->id=$request->input('order_id');
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
  

    

// End of class...............................................
}



