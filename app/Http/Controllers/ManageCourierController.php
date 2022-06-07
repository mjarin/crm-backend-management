<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class ManageCourierController extends Controller
{
    public function manageCouriers(){
        $couriers = Courier::all();
        return view('pages.order.manage-couriers',compact('couriers'));
    }
}
