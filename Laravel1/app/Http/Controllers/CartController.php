<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Session;
class CartController extends Controller
{
    public function getAddCart($id){
        $product = Product::find($id);
        Cart::add(['id' => $id, 'name' => $product->product_name, 'qty' => 1, 'price' => $product->price, 'options' => ['image' => $product->image]]);
        return back();
    }
    public function getShowCart()
    {
        $data['total'] = Cart::total();
        $data['items'] = Cart::content();
        $data['customer'] = Customer::pluck('last_name','id')->toArray();

        ;
        return view('Client.Cart.Cart',$data);
    }
    public function getDeleteCart($id)
    {
        if ($id=='all'){
            Cart::destroy();
        }else{
            Cart::remove($id);
        }
        return back();
    }
    public function getUpdateCart(Request $request)
    {
        Cart::update($request->rowId,$request->qty);
    }

    public function thanhToanCart(Request $request)
    {
            $cartInfor = Cart::content();
            //Order
            $order = new Order([
                'order_number' => Str::random(10),
                'transaction_data' => Carbon::now('Asia/Ho_Chi_Minh'),
                'customer_id' => Session::get('cus_id'),
                'status' => 'Unconfirmed',
                'total_amount' => str_replace(',', '', Cart::total())
            ]);
            $order->save();
            if (count($cartInfor) > 0) {
                foreach ($cartInfor as $key => $item) {
                    $orderDetail = new OrderDetail();
                    $orderDetail->order_id = $order->id;
                    $orderDetail->product_id = $item->id;
                    $orderDetail->quantity = $item->qty;
                    $orderDetail->price = $item->price;
                    $orderDetail->sub_total = $item->price * $item->qty;
                    $orderDetail->save();
                }
            }
            $notification = array(
                'message' => 'Successful purchase, Waiting for order confirmation',
                'alert-type' => 'success'
            );
            Cart::destroy();
            return redirect('cart/show')->with($notification);
    }
}
