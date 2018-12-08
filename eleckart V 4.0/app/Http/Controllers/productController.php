<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        $data = [
            'product_id'=>$request->pro_id,
            'counter'=>0
        ];

        DB::table('mostvieweds')->insert($data);

        return redirect()->back();
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
       

        $product_details= DB::table('products')
            ->join('brands','brands.brand_id','=','products.brand_id')
            ->where('products.product_id','=',$id)
            ->get();

       // $product_details= DB::select(DB::raw("select * from products,brands where brands.brand_id = products.brand_id and products.product_id=".$id." and products.product_visiblity=".$visiblity));
            


        $product_img = DB::table('product_images')
            ->where('product_id','=',$id)
            ->get();


        $counter = DB::table('mostvieweds')->get();

        // $viewed_coutner = DB::select( DB::raw("SELECT counter FROM mostvieweds WHERE product_id = $id") ); 
        // $viewed_coutner = DB::table('mostvieweds')->where('product_id',$id)->pluck('counter')->first();
        // dd($viewed_coutner); 
        // $v_count = (int) $viewed_coutner;
        // //dd(gettype($v_count));
        // $v_count++;

        $modified_counter = DB::select( DB::raw("SELECT product_id, counter+1 as mod_counter FROM mostvieweds WHERE product_id = $id") );
          foreach($modified_counter as $quantity){
                $value =[
                    'counter'=>$quantity->mod_counter
                ];    

                DB::table('mostvieweds')->where('product_id','=',$quantity->product_id)->update($value);

          }

          $viewed_coutner = DB::table('mostvieweds')->where('product_id',$id)->pluck('counter')->first();
          $v_count = (int) $viewed_coutner;

//dd($viewed_coutner);
        return view('product.details')
            ->with('product_details',$product_details)
            ->with('product_img',$product_img)
            ->with('counter',$counter)
            ->with('p_counter',$v_count);
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
