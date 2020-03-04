<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
use App\Http\Requests\CustomerRequest;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('cus_name')){
            $customers = Customer::all();
            return view("Admin/Customer/index",compact('customers'));
        }else{
            return  redirect('login');
        }      
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("Admin/Customer/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CustomerRequest $request)
    {
        //dd($request);
        $customer_data = new Customer([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'username' => $request->username,
            'password' => $request->password,
            'postal_address' => $request->postal_address,
            'physical_address' => $request->physical_address
        ]);
        $customer_data->save();
        if($customer_data){
            return  redirect("admin/customer")->with('thongbao','Created Success');
        }else{
            return  redirect()->with('loi','Create Fail');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $customer = Customer::findOrFail($id);
        return view('Admin.customer.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::findOrFail($id);
        return view("Admin/Customer/update",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CustomerRequest $request, $id)
    {
        //dd($request);
        $data = Customer::findOrFail($id);
        if ($data){
            $data->first_name = $request->first_name;
            $data->last_name = $request->last_name;
            $data->email = $request->email;
            $data->postal_address = $request->postal_address;
            $data->physical_address = $request->physical_address;
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->update();
        }else{
            return back()->with("thongbao",'Update Fail');
        }
        return  redirect("admin/customer")->with('thongbao','Uptaded Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        if ($data->order()->first()){
         return redirect("admin/customer")->with('thongbao','This customer has been declared in Order table'); 
        }else{            
            $data->delete();
        }
        return redirect("admin/customer")->with('thongbao','Deleted Success');
    }
}
