<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FrontPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $trending_products = DB::table('products')
            ->join('mostvieweds', 'mostvieweds.product_id','=','products.product_id')
            ->orderBy('mostvieweds.counter','desc')
        ->get();


        $popular_pro = DB::table('products')
            ->orderBy('product_avg_rating','desc')
            ->get();


        $flash_sales = DB::table('products')
            ->join('discount','discount.product_id','=','products.product_id')
            ->where('discount.discount','!=',0)
            ->orderBy('discount.discount','desc')
            ->get();

        //dd($trending_products);



        return view('index')
            ->with('trending',$trending_products)
            ->with('popular',$popular_pro)
            ->with('flash_sales',$flash_sales);
    }

    public function alert_message($email){
        return view('alerts.customer_alert')->with('email',$email);
    }
    public function pending_message($email){
        return view('alerts.vendor_pending')->with('email',$email);

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
