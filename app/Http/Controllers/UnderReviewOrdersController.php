<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UnderReviewOrdersController extends Controller
{
    public function underReviewOrders(){
        $couriers = Courier::all();
        // $orders=Order::where('delivery_status','under review')->get();
        $orders=DB::table('orders as order')
        ->join('order_details  as order_details', 'order_details.order_id', '=', 'order.id') 
        ->join('products as product', 'order_details.product_id', '=', 'product.id')
        ->join('shops as shop', 'order.user_id', '=', 'shop.user_id')
        ->join('addresses as address', 'order.user_id', '=', 'address.user_id')
        ->join('supplier as supplier', 'order_details.supplier_id', '=', 'supplier.id')
        ->where('order.delivery_status', '=', 'under review')
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
        return view('pages.order.under-review-orders',compact('orders','couriers'));
    }


public function editUnderReviewOrders($id){

    $under_review_orders = Order::find($id);
    return response()->json(['status' => 200,'underReviewOrder' => $under_review_orders]);

}


public function UpdateUnderReviewOrders(Request $request){

    $order_id = $request->input('under_review_order_id');
    $underReview = Order::find($order_id);
    $underReview->advance_payment = $request->input('underReview_advance_payment');
    $underReview->coupon_discount = $request->input('underReview_seller_coupon_discount');
    $underReview->order_note = $request->input('underReview_order_note');
    $underReview->remarks = $request->input('underReview_circle_remarks');
    $underReview->courier = $request->input('underReview_courier');
    $underReview->customer_charge = $request->input('underReview_customer_delivery_charge');
    $underReview->delivery_charge = $request->input('underReview_circle_delivery_charge');
    $underReview->delivery_man = $request->input('underReview_delivery_man');
    $underReview->delivery_date = $request->input('underReview_delivery_date');
    $underReview->collected_price = $request->input('underReview_collected_amount');
    $underReview->reasons = $request->input('underReview_reasons');
    $underReview->update();
    return redirect()->back()->with('status','Order  ' .$order_id. ' Has Been  Updated');

}

public function viewSingleUnderReviewOrderDetails($id){
    // $orders=Order::where('delivery_status','=','under review')->where('id','=', $id)->get();

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
    return view('pages.order.single-under_review_order',compact('orders'));
}


public function editUnderReviewOrderDetails($id){
    $under_review_order = Order::find($id);
    $under_review_order_details = OrderDetails::where('order_id','=', $under_review_order->id )->where('delivery_status','=','under review')->first();
    return response()->json(['status' => 200,'UnderReviewOrderDetails' => $under_review_order_details]); 

}

public function UpdateUnderReviewOrderDetails(Request $request){
    $under_review_order_id = $request->input('under_review_order_details_id'); 
    $update_under_review_order =OrderDetails::where('order_id', $under_review_order_id)->where('delivery_status','under review')->first();
    $update_under_review_order->circle_price = $request->input('under_review_order_circle_price');
    $update_under_review_order->selling_price = $request->input('under_review_order_selling_price');
    $update_under_review_order->quantity = $request->input('under_review_order_quantity');
    $update_under_review_order->variation = $request->input('under_review_order_variation');
    $update_under_review_order->update();
    return redirect()->back()->with('status',$under_review_order_id. '  Order Deatails Have been Updated');
}

public function editUnderReviewOrderReturn($id){

    $returned_order = Order::find($id);
    return response()->json(['status' => 200,'ReturnedUnderReview' => $returned_order]); 

  }



  public function updateUnderReviewReturned(Request $request){ 
    $under_review_order_id = $request->input('under-review-returned_order_id');
    $update_under_review_order = OrderDetails::where('order_id','=',$under_review_order_id)->where('delivery_status','=','under review')->first();
    $update_under_review_order->return_reason = $request->input('return_reason');
    $update_under_review_order->update();
    return redirect()->back()->with('status','Order  '.$under_review_order_id. '  Rturned Reason Has been Saved');
  
  }


  public function editPurchaseStatusURO($id){
    $order_id = Order::find($id);
    return response()->json(['status' => 200,'underReviewOrderId' => $order_id]); 
  }

  public function UpdatePurchaseStatusURO(Request $request){
    echo $order_id = $request->input('hidden_input_id');
    $update_order = OrderDetails::where('order_id','=',$order_id)->where('delivery_status','=','under review')->first();
    $update_order ->po_status = $request->input('status');
    $update_order->update();
    return redirect()->back()->with('status','Updated Successfully');
  }





// End of UnderReviewOrdersController class.........................
}
