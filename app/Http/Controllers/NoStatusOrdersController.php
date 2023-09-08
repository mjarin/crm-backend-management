<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\DeliveryMan;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NoStatusOrdersController extends Controller
{
    public function noStatusOrders(){

        $couriers = Courier::all();
        // $no_status_orders=Order::where('delivery_status','=','NULL')->get();
        $no_status_orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('shops as shop', 'order.seller_id', '=', 'shop.id')
        ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
        ->where('order.delivery_status', '=', 'NULL')
        ->get(['order.id',
        'order.date',
        'order.code',
        'order.remarks',
        'order.delivery_man',
        'order.delivery_date',
        'order.customer_name',
        'order.delivery_status',
        'order.collected_price',
        'order.shipping_address',
        'order_details.circle_price',
        'shop.shop_name',
        'product.product_name',
        'supplier.supplier_name'
        ]);
        return view('pages.order.no_status_orders',compact('no_status_orders','couriers'));

    }

    public function editNoStatusOrders($id){
        
        $no_status_order = Order::find($id);
        return response()->json(['status' => 200,'noStatusOrder' => $no_status_order]);
    }

    public function updateNoStatusOrder(Request $request)
    {
        
        $order_id = $request->input('noStatus_order_id');
        $noStatus_order = Order::find($order_id);
        $noStatus_order->advance_payment = $request->input('noStatus_advance_payment');
        $noStatus_order->coupon_discount = $request->input('noStatus_seller_coupon_discount');
        $noStatus_order->order_note = $request->input('noStatus_order_note');
        $noStatus_order->remarks = $request->input('noStatus_circle_remarks');
        $noStatus_order->courier = $request->input('noStatus_courier');
        $noStatus_order->customer_charge = $request->input('noStatus_customer_delivery_charge');
        $noStatus_order->delivery_charge = $request->input('noStatus_circle_delivery_charge');
        $noStatus_order->delivery_man = $request->input('noStatus_delivery_man');
        $noStatus_order->delivery_date = $request->input('noStatus_delivery_date');
        $noStatus_order->collected_price = $request->input('noStatus_collected_amount');
        $noStatus_order->update();
        return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');

    }

    public function viewSingleNoStatusOrder($id){

    // $no_status_order=Order::where('delivery_status','=','NULL')->where('id','=', $id)->get();
    $no_status_order=DB::table('orders as order')
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
    return view('pages.order.single-no-status-order',compact('no_status_order'));
    }

    public function editNoStatusOrderdeatails($id){
        $no_status_order = Order::find($id);
        $no_status_order_details = OrderDetails::where('order_id','=', $no_status_order->id )->where('delivery_status','=','')->first();
    
        return response()->json(['status' => 200,'NoStatusOrderDetails' => $no_status_order_details]); 
    }

    public function updateNoStatusOrderDetails(Request $request){

        $no_status_order_id = $request->input('NoStatusOrder_details_id'); 
        $update_no_status_order =OrderDetails::where('order_id', $no_status_order_id)->where('delivery_status','')->first();
        $update_no_status_order->circle_price = $request->input('no_status_circle_price');
        $update_no_status_order->selling_price = $request->input('no_status_selling_price');
        $update_no_status_order->quantity = $request->input('no_status_quantity');
        $update_no_status_order->variation = $request->input('no_status_variation');
        $update_no_status_order->update();
        return redirect()->back()->with('status',$no_status_order_id. '  Order Details Have been Updated');

      }



      public function editNoStatusReturnedOrder($id){ 
        $returned_order = Order::find($id);
        return response()->json(['status' => 200,'NoStatusReturnedOrder' => $returned_order]); 
      
      }


      public function updateNoStatusOrderReturned(Request $request){ 
        $no_status_order_id = $request->input('no_status_returned_order_id');
        $update_no_status_order = OrderDetails::where('order_id','=',$no_status_order_id)->where('delivery_status','=','')->first();
        $update_no_status_order->return_reason = $request->input('return_reason');
        $update_no_status_order->update();
        return redirect()->back()->with('status','Order'.$no_status_order_id. ' Rturned Reason Has been Saved');
  
    }

    public function editPurchaseStatus($id){

        $order_id = Order::find($id);
        return response()->json(['status' => 200,'updatePurchaseStatus' => $order_id]);  
    
    }
    
    public function updatePurchaseStatus(Request $request){
    
        $order_id = $request->input('hidden_input_id');
        $update_order = OrderDetails::where('order_id','=',$order_id)->where('delivery_status','=','')->first();
        $update_order ->po_status = $request->input('status');
        $update_order->update();
        return redirect()->back()->with('status','Updated Successfully');
    
      }


      public function editNoStatusOrderStep2($id){
        $delivery_man = DeliveryMan::all();
        $order =Order::find($id);
        return view('pages.order.NoStatusOrders.update-no-status-order-step2',compact('order','delivery_man'));

      }

   public function updateNoStatusOrderStep2(Request $request){

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

public function editAddressNoStatus($id){
    $order =Order::find($id);
    return view('pages.order.NoStatusOrders.update-address-no-status-order',compact('order'));
}

public function updateAddressNoStatus(Request $request){
    $id =$request->input('order_id');
    $order = Order::find($id);
    $order-> customer_name=$request->input('customer_name');
    $order-> shipping_address=$request->input('customer_address');
    $order-> customer_phone=$request->input('customer_phone');
    $order-> order_note=$request->input('order_note');
    $order-> customer_charge=$request->input('customer_charge');
    $order->advance_payment=$request->input('advance_payment');
    $order->update();
    return redirect()->back()->with('success','Address Updated Successfully');

}
 
    



// End of controller class..................................... 
}
