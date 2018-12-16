<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;



class vendorDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        $data_check = DB::table('vendors')->where('email',Auth::user()->email)->get();

        $total_assosiated_brands = DB::table('brands')
            ->distinct()
            ->join('products', 'products.brand_id', '=', 'brands.brand_id')
            ->join('vendors', 'vendors.id', '=', 'products.id')
            ->where('vendors.email', Auth::user()->email)
            ->select('products.brand_mame')
            ->count('products.brand_id');



        $total_product = DB::table('products')
            ->join('vendors', 'products.id', '=', 'vendors.id')
            ->where('vendors.email', Auth::user()->email)
            ->count();

        return view('vendor.dashboard')->with('check',$data_check)
            ->with('tot_a_b',$total_assosiated_brands)
            ->with('tot_p',$total_product);
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
