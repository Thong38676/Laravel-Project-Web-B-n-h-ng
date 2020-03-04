<?php

namespace App\Http\Controllers\Admin;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Carbon\Carbon;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Session::has('cus_name')){
            $categories = Category::all();
            return view("Admin/Category/index",compact('categories'));
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
        return view("Admin/Category/create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $request)
    {
        //dd($request);
        $category_data = new Category([
            'name' => $request->name,
            'description' => $request->description
        ]);
        $category_data->save();
        if($category_data){
            return  redirect("admin/category")->with('thongbao','Created Success');
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
        $category = Category::findOrFail($id);
        return view('Admin/category/show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Category::findOrFail($id);
        return view("Admin/Category/update",compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $request, $id)
    {
        //dd($request);
        $data = Category::findOrFail($id);
        if ($data){
            $data->name = $request->name;
            $data->description = $request->description;
            $data->updated_at = Carbon::now()->toDateTimeString();
            $data->update();
        }else{
            return back()->with("thongbao",'Update Fail');
        }
        return  redirect("admin/category")->with('thongbao','Updated Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data = Category::findOrFail($id);
        if ($data->product()->first()) {
            return redirect("admin/category")->with('thongbao','This record is already used in another table ');
        }else{
            $data->delete();
        }
        return redirect("admin/category")->with('thongbao','Deteled Success');
    }
}
