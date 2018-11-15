<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\imageUploadRequest;
use App\Http\Requests\vendorProductValidationRequest;


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
    public function store(vendorProductValidationRequest $request)
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
            'product_visiblity'=>'offline',
            'product_price'=>$request->pro_price,
            'discount'=>$request->offer,
            'brand_id'=>$brand_id,
            'category_id'=>$category_id,
            'id'=>$request->v_id,

        ];

        DB::table('products')->insert($product);


        $product_id = DB::table('products')->pluck('product_id')->last();

      //  dd($product_id);

        //return redirect()->route('vendor.products');

        return view('vendor.upload_product_img')->with('id',$product_id);
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
        $updated_product = DB::table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->join('brands','brands.brand_id','=','products.brand_id')
        ->where('product_id',$id)
        ->get();

        return view('vendor.update_product')->with('update_pro',$updated_product);
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


        $b_data = DB::table('brands')->where('brand_name',$request->u_brand_name)
        ->pluck('brand_id')
        ->first();

        $c_data = DB::table('categories')->where('category_name',$request->u_c_name)
        ->pluck('category_id')
        ->first();

        $update_data=[
            'product_name'=>$request->u_pro_name,
            'product_details'=>$request->u_pro_desc,
            'product_quantity'=>$request->u_pro_qun,
            'product_price'=>$request->u_pro_price,
            'discount'=>$request->u_offer,
            'brand_id'=>$b_data,
            'category_id'=>$c_data
            
        ];



        // $update_brand_name=[
        //     'brand_id'=>$b_data
        // ];

        // $update_category_name=[
        //     'brand_name'=>$request->u_c_name
        // ];


        DB::table('products')->where('product_id',$id)->update($update_data);
        return redirect()->route('vendor.products');

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

        DB::table('products')->where('product_id',$id)->delete();
        DB::table('product_images')->where('product_id',$id)->delete();

        return redirect()->route('vendor.products');

    }


    
    public function storeMultipleProductImage(imageUploadRequest $request){
        $file = $request->file('imageUpload');


        foreach($file as $files){

           $name=$files->getClientOriginalName();

          
     
            $files->storeAs('public',$name);
            $url= Storage::url($name);
         
             $data = [
                 'product_id'=>$request->pro_id,
                 'product_thumbnail'=>$url
             ];


             DB::table('product_images')->insert($data);
        
        }


        $update_status = [
            'product_visiblity'=>'online'
        ];

        DB::table('products')->where('product_id',$request->pro_id)->update($update_status);



        return redirect()->route('vendor.products');    

    }


    // public function showProductImageUploadPage($id){
          

    //    $product_id = $id; 
    //    return view('vendor.upload_product_img')->with('id',$product_id);
    // }
}