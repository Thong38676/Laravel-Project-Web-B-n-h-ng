<?php

namespace App\Http\Controllers\Admin;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
use Illuminate\Support\Str;
use App\Http\Requests\ProductRequest;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('cus_name')){
             $products = Product::all();
             return view("Admin/Product/index",compact('products'));
         }else{
            return  redirect('login');
        }  
    }


    public function productsInBrand($brand_id)
    {
        $product = Brand::findOrfail($brand_id)->product()->get();
        return view('Admin/Product/productsInBrand',compact('product'));
    }


    public function productsInCate($category_id)
    {
        $product = Category::findOrfail($category_id)->product()->get();
        return view('Admin/Product/productsInCate',compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        return view('Admin/Product/create',compact('brand','category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        //dd($request);
        $product_code = Str::random(10);
        $product_data = new Product([
            'product_code' => $product_code,
            'product_name' => $request->product_name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,
        ]);
        $product_data->save();
        if($product_data){
            return  redirect("admin/product")->with('thongbao','Created Success');
        }else{
            return  redirect()->with('loi','Luu khong thanh cong');
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
        $product = Product::findOrFail($id);
        return view('Admin/Product/show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::findOrFail($id);
        $brand = Brand::pluck('name','id')->toArray();
        $category = Category::pluck('name','id')->toArray();
        return view("Admin/Product/update",compact('data','brand','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request, $id)
    {
        //dd($request);
        $data = Product::findOrFail($id);
        if ($data){
            $data->product_code = $data->product_code;
            $data->product_name = $request->product_name;
            $data->description = $request->description;
            $data->price = $request->price;
            $data->image = $request->image;
            $data->brand_id = $request->brand_id;
            $data->category_id = $request->category_id;
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->update();
        }else{
            return back()->with("thongbao",'Update Fail');
        }
        return  redirect("admin/product")->with('thongbao','Uptaded Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::findOrFail($id);
        if ($data){
            $data->delete();
        }else{
            return redirect("admin/product")->with('thongbao','Delete Fail');
        }
        return redirect("admin/product")->with('thongbao','Deteled Success');
    }
}
