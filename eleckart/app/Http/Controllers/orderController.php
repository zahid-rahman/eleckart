<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\order;
use App\cart;
use App\order_info;

//$GLOBALS['token'] = str_shuffle(md5(rand(0, 4),5));
$GLOBALS['token'] = substr(md5(microtime()),rand(0,26),5);

class orderController extends Controller
{

    public function orderInfo($token){

        $customer_ordered_product_details = DB::table('order_infos')
        ->join('products','products.product_id','=','order_infos.product_id')
        ->where('order_token_number',$token)
        ->get();


        return view('order.order_info')
        ->with('orederd_product_info',$customer_ordered_product_details);

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        //

        $user_info = DB::table('users')
            ->where('id', $id)
            ->get();

//         $order_products = DB::table('')

        $cart_total_price = DB::table('carts')
            ->where('id', $id)
            ->sum('total_price');

//
//        $order_product=DB::table('order_infos')
//            ->join('products','products.product_id','=','order_infos.product_id')
//            ->where('token_number',)
//            ->get();

        $ordered_product = DB::table('products')
            ->join('carts', 'products.product_id', '=', 'carts.product_id')
            ->where('carts.id', $id)
            ->get();


        $total_price = DB::table('carts')
            ->where('id', $id)
            ->sum('total_price');


            // $customer_specific_ordered_product_details = DB::table('order_infos')
            // ->where('id',$id)
            // ->where('token_number')
            // ->get();


        return view('order.order_details')
            ->with('user', $user_info)
            ->with('total_price', $cart_total_price)
            ->with('order_product', $ordered_product)
            ->with('total_price', $total_price);
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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //


        $check = 0;
        $orders = DB::table('orders')
            ->where('id', $request->us_id)
            ->get();

//        foreach ($orders as $v){
//            if($v->status == "shipping"){
//                $check++;
//            }
//        }

//            if($check == 0){


        $order = new order();
        $order->token_number = $GLOBALS['token'];
        $order->id = $request->us_id;
        $order->total_price = $request->tot_pr;
        $order->recipient_address = $request->us_add;
        $order->phone_no = $request->us_ph;
        $order->status = 'shipping';

        $order->save();

        $cart = DB::table('carts')->where('id',$request->us_id)->get();

        //dd($cart);
      
        
        




//                $order_info->product_id = $value->product_id;
//                $order_info->id = $request->us_id;
//                $order_info->order_validation_id = 1;
//                $order_info->save();


        $order = DB::table('carts')
            ->join('products', 'products.product_id', '=', 'carts.product_id')
            ->where('carts.id', $request->us_id)
            ->get();

            //dd($order); 

                 
            $order_info = new order_info();


            foreach($order as $product){
                //dd($product);
                // $order_info->product_id = $product->product_id;
                // $order_info->id = $request->us_id;
                // $order_info->order_validation_id = $GLOBALS['token'];
    
                // $order_info->save();
    
    
                $data = [
                    'product_id'=>$product->product_id,
                    'id'=>$request->us_id,
                    'order_token_number'=>$GLOBALS['token'],
                    'ordered_product_quantity'=>$product->order_quantity
                ]; 
                DB::table('order_infos')->insert($data);
    
    
            }
           

       

        cart::query()->delete();
        return redirect('/');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $customer_order = DB::table('orders')
            ->where('id',$id)
            ->get();

        return view('order.customer_order')
            ->with('cust_order',$customer_order);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //

        cart::query()->delete();

        return redirect()->route('cart',$id);

    }
}
