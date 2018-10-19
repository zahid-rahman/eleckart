<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class categoryController extends Controller
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
        $category = DB::table('categories')->get();

        //return view('layouts.default')->with('categories',$category);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($name)
    {
        //
        $visiblity = "online";

        $product_categories = DB::table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->where('categories.category_name','=',$name)
        ->get();

        $total_product = DB::table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->where('categories.category_name','=',$name)
        ->Where('products.product_visiblity','=',$visiblity)
        ->count();

        $category_name = DB::table('categories')
        ->where('category_name','=',$name)
        ->first();



        return view('categories.categories')
            ->with('product_cat',$product_categories )
            ->with('total_product',$total_product)
            ->with('cat_name',$category_name);


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
