<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use App\Models\OrderDetails;
use Illuminate\Http\Request;
use App\Models\Courier;
use App\Models\Order;
use Session; 

class MarketingController extends Controller
{
    public function Offers(){

        return view('pages.marketing.campaign-list');

    }
}
