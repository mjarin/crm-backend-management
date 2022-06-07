<?php

namespace App\Http\Controllers\login;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Session;


class LoginController extends Controller
{

    public function loginPage(){
        return view('login.index');
    }
    public function login(Request $request){

        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:12'
        ]);

        $user =User::where('email','=',$request->email)->first();

        if(!$user){

            return back()->with('fail', 'Email is not recogmized ');

        }else{
            // if(Hash::check($request->password,$userInfo->password))
            if(Hash::check($request->password,$user->password))
            {
                $request->session()->put('LoggedUserId',$user->id);
                return redirect('dashboard');
            }else{
                return back()->with('fail','Incorrect Password');
            }
        }

    }
    
    public function dashboard(){
        $data =array();
        if(Session::has('LoggedUserId')){
            $data =User::where('id', Session::get('LoggedUserId'))->first();
        }

        return view('layouts.master',compact('data')); 
        
    }

    public function logout(){
        if(Session::has('LoggedUserId')){
          Session::pull('LoggedUserId'); 
          return redirect('/');
        }

    }




    
    // public function superAdmin(){
    //     return view('login.superadmin.index');
    // }

    // public function admin(){
    //     return view('login.admin.index');
    // }

    // public function staff(){
    //     return view('login.staff.index');
    // }
}
