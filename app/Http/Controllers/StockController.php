<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class StockController extends Controller
{
    public function stockAlert(){

        $products = Product::where('current_stock','<=', '5')->get();
        return view('pages.StockAlert.all-products', compact('products'));
        
    }

    public function countLowStockProduct(){

      $low_stock_count = Product::where('current_stock','<=', '5')->count();
   
      return response()->json(['low_stock_prod_count' => $low_stock_count ]);
   
     }
   

 public function editStock($id){

    $product = Product::find($id);
    return response()->json(['status' => 200,'productInfo' => $product]);

 }

 public function updateStock(Request $request){
    $product_id = $request->input('product_id');
    $product = Product::find($product_id);
    $product->current_stock= $request->input('new_stock');
    $product->update();
    return redirect()->back()->with('status','Stock has been Updated');

 }


 public function currentStock(){
   $products = Product::all();
   return view('pages.CurrentStock.all-products-current-stock', compact('products'));

 }


//End of class 
}
