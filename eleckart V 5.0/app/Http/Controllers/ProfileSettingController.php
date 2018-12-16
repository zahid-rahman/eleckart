<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\passwordValidationCustomerRequest;
use Illuminate\Support\Facades\Hash;

class ProfileSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer = DB::table('users')->where('id',Auth::user()->id)->get();

        return view('Profile.profile_setting')->with('customer',$customer);
    }

    public function updatePhone(Request $request, $id) {
        $phone = [
            'phone_number'=>$request->phone_number
        ];

        DB::table('customers')->where('id','=',$id)->update($phone);
        DB::table('users')->where('id','=',$id)->update($phone);

        return redirect()->back();
    }

    public function updateAddress(Request $request, $id) {
        $address = [
            'address'=>$request->address
        ];

        DB::table('customers')->where('id','=',$id)->update($address);
        DB::table('users')->where('id','=',$id)->update($address);

        return redirect()->back();
    }

    public function updatePassword(passwordValidationCustomerRequest $request, $id) {
        $data = [
            'password'=>Hash::make($request->new_password)
        ];

        DB::table('customers')->where('id',$id)->update($data);

        DB::table('users')->where('id',$id)->update($data);

        //  return redirect()->route('vendor.profile.setting',['id'=>$id]);

        Auth::logout();
        return redirect()->route('homepage');

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
