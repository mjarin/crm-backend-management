<?php
namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReadyToDeliveredController extends Controller
{
   public function readyToDeliver(){
    $couriers = Courier::all();
    // $orders=Order::where('delivery_status','ready to deliver')->get();

    $orders=DB::table('orders as order')
    ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
    ->join('products as product', 'order_details.product_id', '=', 'product.id')
    ->join('shops as shop', 'order.seller_id', '=', 'shop.id')
    ->where('order.delivery_status', '=','ready to deliver')
    ->get(['order.id',
    'order.date',
    'order.code',
    'order.customer_name',
    'order.delivery_status',
    'order.courier',
    'order.shipping_address',
    'order.collected_price',
    'order.delivery_man',
    'order.delivery_date',
    'order.remarks',
    'order_details.circle_price',
    'order_details.po_status',
    'shop.shop_name',
    'product.product_name'
    ]);


    return view('pages.order.ready-to-deliver-orders',compact('orders','couriers'));

   }

   public function editReadyToDeliver($id){

      $ready_to_deliver_order = Order::find($id);
      return response()->json(['status' => 200,'readyToDeliver' => $ready_to_deliver_order]);
 
 
    }


    public function updateReadyToDeliverOrder(Request $request){

      $order_id = $request->input('ready-to-deliver-order-name');
      $readyToDeliverOrder = Order::find($order_id);
      $readyToDeliverOrder->advance_payment = $request->input('readyTodeliver_advance_payment');
      $readyToDeliverOrder->coupon_discount = $request->input('readyTodeliver_seller_coupon_discount');
      $readyToDeliverOrder->order_note = $request->input('readyTodeliver_order_note');
      $readyToDeliverOrder->remarks = $request->input('readyTodeliver_circle_remarks');
      $readyToDeliverOrder->courier = $request->input('readyTodeliver_courier');
      $readyToDeliverOrder->customer_charge = $request->input('readyTodeliver_customer_delivery_charge');
      $readyToDeliverOrder->delivery_charge = $request->input('readyTodeliver_circle_delivery_charge');
      $readyToDeliverOrder->delivery_man = $request->input('readyTodeliver_delivery_man');
      $readyToDeliverOrder->delivery_date = $request->input('readyTodeliver_delivery_date');
      $readyToDeliverOrder->collected_price = $request->input('readyTodeliver_collected_amount');
      $readyToDeliverOrder->update();
      return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');

    }


    public function viewSingleReadyToDeliver($id){

      // $ready_to_deliver_order=Order::where('delivery_status','=','ready to deliver')->where('id','=', $id)->get();

      $ready_to_deliver_order=DB::table('orders as order')
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
      'product.product_name'
      ]);	
      return view('pages.order.single-ready-to-deliver-order',compact('ready_to_deliver_order'));

    }

    public function editReadyToDeliverDetails($id){

      $ready_to_deliver_order = Order::find($id);
      $ready_to_deliver_order_details = OrderDetails::where('order_id','=', $ready_to_deliver_order->id )->where('delivery_status','=','ready to deliver')->first();
  
      return response()->json(['status' => 200,'readyToDeliverOrderDetails' => $ready_to_deliver_order_details]); 

    }

    public function updateReadyToDeliverOrderdetails(Request $request){

      $ready_to_deliver_order_id = $request->input('ready_to_deliver_order_details_id'); 
      $update_ready_to_deliver_order =OrderDetails::where('order_id', $ready_to_deliver_order_id)->where('delivery_status','ready to deliver')->first();
      $update_ready_to_deliver_order->circle_price = $request->input('ready_to_deliver_circle_price');
      $update_ready_to_deliver_order->selling_price = $request->input('ready_to_deliver_selling_price');
      $update_ready_to_deliver_order->quantity = $request->input('ready_to_deliver_quantity');
      $update_ready_to_deliver_order->variation = $request->input('ready_to_deliver_variation');
      $update_ready_to_deliver_order->update();
      return redirect()->back()->with('status',$ready_to_deliver_order_id. '  Order Deatails Have been Updated');


    }

    public function editReturnedReadyToDeliver($id){

      $returned_order = Order::find($id);
      return response()->json(['status' => 200,'returnedOrderReadyToDeliver' => $returned_order]); 

    }


    public function updateReadyToDeliverReturnedOrder(Request $request){ 
      $ready_to_deliver_order_id = $request->input('returned_order_id');
      $update_ready_to_deliver_order = OrderDetails::where('order_id','=',$ready_to_deliver_order_id)->where('delivery_status','=','ready to deliver')->first();
      $update_ready_to_deliver_order->return_reason = $request->input('return_reason');
      $update_ready_to_deliver_order->update();
      return redirect()->back()->with('status','Order'.$ready_to_deliver_order_id. ' Rturned Reason Has been Saved');
    
    }


    // public function PurchasedReadyToDeliverOrder($id){
    //   $order_id = Order::findOrFail($id);
    //   $update_po_status=OrderDetails::where('order_id','=',$order_id->id)->where('po_status','=','Unpurchased')->first();
    //   $update_po_status->po_status = 'Purchased';
    //   $update_po_status->update();
    //   return redirect()->back()->with('status','Product Status has been updated');



    // }


    public function appendId($id){

      $find_order = Order::find($id);
      return response()->json(['status' => 200,'foundOrder' => $find_order]); 

    }

    public function updatePurchasedStatusRtd(Request $request){

      echo $order_id = $request->input('order_id');
      $order=OrderDetails::where('order_id','=', $order_id)->where('delivery_status','ready to deliver')->first();
      $order->po_status =$request->input('status_name');
      $order->update();

      return redirect()->back()->with('status','Status has been updated');
      
    }


    public function editOrderRTD($id){

      $delivery_man = Courier::all();
      $order =Order::find($id);
      return view('pages.order.ReadyToDelivered.update-rtd-order-step2',compact('order','delivery_man'));

    }


    public function updateOrderRTD(Request $request){

      $id =$request->input('order_id');
      $order = Order::find($id);
      $order->id=$request->input('order_id');
      $order->collected_price=$request->input('collected_amount');
      $order->remarks=$request->input('circle_remarks');
      // $order->customer_charge = $request->input('customer_delivery_charge');
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
