<?php

namespace App\Http\Controllers\Admin;

use App\Models\Customer;
use App\Models\Order;
use App\Models\Product;
use App\Models\OrderDetail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('cus_name')){
            $orders = Order::all();
            return view("Admin/Order/index",compact('orders'));
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
        $customer = Customer::pluck('last_name','id')->toArray();
        $products = Product::pluck('product_name','id')->toArray();

        return view('Admin/Order/create',compact('customer','products'));
    }

    public function ordersInCustomer($customer_id)
    {
        $order = Customer::findOrfail($customer_id)->order()->get();
        return view('Client/history_purchase',compact('order'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {         
           $order = Order::findOrFail($id);
           if ($order) {
            $customers = Customer::where('id','like',$order->customer_id)->get();
            $order_detail = OrderDetail::where('order_id','like',$order->id)->get();
            return view('Admin/Order/Show',compact('order','customer','order_detail'));
        }      
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Order::findOrFail($id);
        $customer = Customer::pluck('last_name','id')->toArray();
        return view('Admin/Order/update',compact('data','customer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //dd($request);
        $data = Order::findOrFail($id);
        if ($data){
            $data->status = $request->status;
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->update();
        }else{
            return back()->with("thongbao",'cap nhat that bai');
        }
        return  redirect("admin/order")->with('thongbao','Uptade Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Order::findOrFail($id);
        if ($data){
            $data->delete();
        }else{
            return redirect("admin/order")->with('thongbao','loi khong xoa dc');
        }
        return redirect("admin/order")->with('thongbao','Deleted Success');
    }
}
