<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class vendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

       

        $product = DB::table('products')
        ->where('id',Auth::user()->id)
        ->get();

       // dd($product);


        return view('vendor.product')->with('pro',$product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        

        return view('vendor.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


         

        $file = $request->file('pro_img_up');
        $name=$file->getClientOriginalName();

 

        $file->storeAs('public',$name);
        $url= Storage::url($name);

        $brand_id = DB::table('brands')
        ->where('brand_name',$request->brand_name)
        ->pluck('brand_id')
        ->first();    

        //dd($request->brand_name);

        $category_id = DB::table('categories')
        ->where('category_name',$request->c_name)
        ->pluck('category_id')
        ->first();


        $product = [
            'product_name'=>$request->pro_name,
            'product_details'=>$request->pro_desc,
            'product_thumbnail'=>$url,
            'product_quantity'=>$request->pro_qun,
            'product_visiblity'=>'online',
            'product_price'=>$request->pro_price,
            'discount'=>$request->offer,
            'brand_id'=>$brand_id,
            'category_id'=>$category_id,
            'id'=>$request->v_id,

        ];

        DB::table('products')->insert($product);
    

        return redirect()->route('vendor.products');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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
    }
}
