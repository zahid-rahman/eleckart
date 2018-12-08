<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\vendorRequest;
use Illuminate\Support\Facades\Hash;

class vendorController extends Controller
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

        return view('vendor.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(vendorRequest $request)
    {
        //

        $user = [
            
            'name'=>$request->v_com_name,
            'email'=>$request->email,
            'phone_number'=>$request->v_phone,
            'address'=>$request->v_address,
            'password'=>Hash::make($request->v_pass),
            'role'=>$request->v_role
        ];

        DB::table('users')->insert($user);

        $email = DB::table('users')->pluck('email')->first();

        $id = DB::table('users')->where('email',$request->email)->pluck('id')->first();
        
        //dd($email,$id);

        $vendor = [
            'id'=>$id,
            'com_name'=>$request->v_com_name,
            'email'=>$request->email,
            'phone_number'=>$request->v_phone,
            'address'=>$request->v_address,
            'password'=>$request->v_pass,
            'role'=>$request->v_role,
            'approval'=>'pending'
        ];

        DB::table('vendors')->insert($vendor);

        return redirect()->route('homepage');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    

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
