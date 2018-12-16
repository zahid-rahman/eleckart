<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\passwordUpdateValidationRequest;
use Illuminate\Support\Facades\Hash;

class vendorProfileSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //
        $vendor_info= DB::table('vendors')->where('id','=',$id)->get();
        return view('vendor.profile_setting')
            ->with('vendor_info',$vendor_info);
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

    public function updateAddress(Request $request,$id){
            $address = [
                'address'=>$request->address
            ];

            DB::table('vendors')->where('id','=',$id)->update($address);
            DB::table('users')->where('id','=',$id)->update($address);

        return redirect()->back();
    }

    public function updatePhoneNumber(Request $request,$id){


        $phone = [
            'phone_number'=>$request->phone_number
        ];

        DB::table('vendors')->where('id','=',$id)->update($phone);
        DB::table('users')->where('id','=',$id)->update($phone);

        return redirect()->back();
    }

    public function updateCompanyName(Request $request,$id){


        $com_name = [
            'com_name'=>$request->c_name
        ];

        $name = [
            'name'=>$request->c_name
        ];

        DB::table('vendors')->where('id','=',$id)->update($com_name);
        DB::table('users')->where('id','=',$id)->update($name);

        return redirect()->back();
    }

    public function updatePassword(passwordUpdateValidationRequest $request,$id){


            $data = [
                'password'=>Hash::make($request->new_password)
            ];

            DB::table('vendors')->where('id',$id)->update($data);

            DB::table('users')->where('id',$id)->update($data);

            //  return redirect()->route('vendor.profile.setting',['id'=>$id]);

            Auth::logout();
            return redirect()->route('homepage');


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
