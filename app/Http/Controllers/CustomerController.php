<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\City;
use App\Models\Address;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
   public function viewCustomersData(){
   
      $order_table_data =Address::all();
      $cities =City::all();
    return view('pages.CustomerData.view-customers-data',compact('order_table_data','cities'));
   }
}
