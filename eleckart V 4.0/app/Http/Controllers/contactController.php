<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\contactValidationRequest;


use Mail;

class contactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('contact.contact');
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
    public function storeFeedbackMessage(contactValidationRequest $request)
    {
       

        $feedBckMessage = [
            'email'=>$request->u_email,
            'feedback_message'=>$request->message
        ];

       // dd($feedBckMessage);


        DB::table('feedback')->insert($feedBckMessage);
        return redirect()->route('homepage');
    }

    public function sendEmail(Request $request){

       
        // Mail::send(['text'=>'mail'],['name'=>'unknown'],function($message){
             
        //       $message->to('eleckart2018@gmail.com','To eleckart')->subject('Mail for report or bannin issue');      
        //       $message->from('ratul@gmail.com','ratul');      
        // });

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
