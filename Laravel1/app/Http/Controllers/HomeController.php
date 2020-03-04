<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Customer;
use Illuminate\Http\Request;
use Session;
use App\Http\Requests\CustomerRequest;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    public function Index(){   
        $data = Product::All();
        return view('Client.home',compact('data'));
    }

    public function registerconfirm(CustomerRequest $request){
        //lay du lieu
        $customer = new Customer([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'username' => $request->username,
            'password' => md5($request->password),
            'email' => $request->email,
            'postal_address' => $request->postal_address,
            'physical_address' => $request->physical_address
        ]);
        $customer->save();
        $notification = array(
            'message' => 'Register successfully, LogIn now',
            'alert-type' => 'success'
        );
        return redirect('login')->with($notification);
    }

    public function confirmlogin(Request $request){
        $account = [
            'username' => $request->username,
            'password' => md5($request->password),
        ];
        $cus = Customer::where($account)->first();
        if($cus){
            Session::put('cus_id',$cus->id );
            Session::put('cus_name', $cus->username);
            if($cus->id=='1'){
                    $notification = array(
                    'message' => 'Logged in successfully',
                    'alert-type' => 'success'
                );
                return redirect('/admin/brand')->with($notification);
            }
                $notification = array(
                        'message' => 'Logged in successfully',
                        'alert-type' => 'success'
                );
            return redirect('/home')->with($notification);            
        }
        $notification = array(
                'message' => 'Wrong username or password',
                'alert-type' => 'warning'
        );
        return back()->with($notification);
    }

    public function logout(){
        $notification = array(
            'message' => 'Logged out successfully',
            'alert-type' => 'success'
        );
        Session::flush();
        return redirect('/login')->with($notification); 
    }
}
