<?php

namespace App\Http\Controllers;
use Session; 
use App\Models\Order;
use App\Models\Courier;
use App\Models\DeliveryMan;
use App\Models\OrderDetails;
use Illuminate\Http\Request;

class DeliveryManController extends Controller
{
    //
    public function deliveryManList(){

        $delivery_man = DeliveryMan::all();
        return view('pages.DeliveryMan.delivery-man-list',compact('delivery_man'));

    }


    public function addDeliveryMan(Request $request){

        $delivery_man =new DeliveryMan();
        $delivery_man->man_id = $request->input('delivery_man_id');
        $delivery_man->name = $request->input('delivery_man_name');
        $delivery_man->phone = $request->input('delivery_man_phone');
        $delivery_man->save();
        return redirect()->back()->with('status',' Delivery Man has been added');


    }

    public function editDeliveryMan($id){

            $delivery_man = DeliveryMan::find($id);
            return response()->json(['status' => 200,'deliveryMan' => $delivery_man]);


    }


    public function updateDeliveryManInfo(Request $request){

        echo $delivery_man_id = $request->input('deliveryMan_id');
       $delivery_man = DeliveryMan::find($delivery_man_id);
        $delivery_man->man_id = $request->input('delivery_man_id');
        $delivery_man->name = $request->input('delivery_man_name');
        $delivery_man->phone = $request->input('delivery_man_phone');
        $delivery_man->update();

        return redirect()->back()->with('status','Updated Successfully');

    }


    public function deleteDeliveryMan($id){

        $delivery_man = DeliveryMan::find($id);
        $delivery_man->delete();
        return redirect()->back()->with('status','Deleted Successfully');

    }





// End of controller class.................
}
