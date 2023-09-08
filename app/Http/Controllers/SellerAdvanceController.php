<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\Courier;
use App\Models\AdvanceSheet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;


class SellerAdvanceController extends Controller
{
    public function SellerAdvanceSheet(){

        $orders=DB::table('orders as order')
        ->join('advance_sheet as advance', 'advance.orders_id', '=', 'order.id')
        ->get(['advance.orders_id',
        'advance.amount',
        'advance.method',
        'advance.transaction_id',
        'advance.transaction_date',
        'advance.created_by',
        'advance.updated_by'
        ]);
        return view('pages.SellerAdvance.seller-advance-sheet',compact('orders'));
    }


    public function SellerAdvance(Request $request){
    
        $advance=new AdvanceSheet();
        $advance->orders_id = $request->input('order_id');
        $advance->amount = $request->input('advance_amount');
        $advance->transaction_id = $request->input('transaction_id');
        $advance->transaction_date = $request->input('transaction_date');
        $advance->method = $request->input('transaction_method');
        $advance->created_by=$request->input('created_by');
        $advance->save();
        return redirect()->back()->with('status','Payment Saved Successfully');

    }


}
