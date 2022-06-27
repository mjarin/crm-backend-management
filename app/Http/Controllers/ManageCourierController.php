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

    public function addNewCouriers(Request $request){

        $courier= new Courier();
        $courier->name = $request->input('courier_name');
        $courier->value = $request->input('courier_name');
        $courier->save();
        return redirect()->back()->with('success','New Courier Added Successfully');
    }

    public function deleteCourier($id){ 

        $courier = Courier::find($id);
        $courier->delete();
        return redirect()->back()->with('success','Courier Deleted successfully');

    }
}
