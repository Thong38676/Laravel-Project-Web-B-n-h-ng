<?php
namespace App\Http\Controllers\Admin;
use App\Http\Requests\ValidateBrandCategory;
use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
use App\Http\Requests\BrandRequest;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('cus_name')){
            $brands = Brand::all();
            return view("Admin/Brand/index",compact('brands'));
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
        return view("Admin/Brand/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BrandRequest $request)
    {
        //dd($request);
        $brand_data = new Brand([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $brand_data->save();
        if($brand_data){
            return  redirect("admin/brand")->with('thongbao','Created Success');
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
        $brand = Brand::findOrFail($id);
        return view('Admin/Brand/show', compact('brand'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Brand::findOrFail($id);
        return view("Admin/Brand/update",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BrandRequest $request, $id)
    {
        //dd($request);
        $data = Brand::findOrFail($id);
        if ($data){
            $data->name = $request->name;
            $data->description = $request->description;
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->update();
        }else{
            return back()->with("thongbao",'Update Fail');
        }
        return  redirect("admin/brand")->with('thongbao','Uptaded Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Brand::findOrFail($id);
        if ($data->product()->first()) {
            return redirect("admin/brand")->with('thongbao','This record is already used in another table ');
        }else{
            $data->delete();
        }
        return redirect("admin/brand")->with('thongbao','Deteled Success');
    }
}
