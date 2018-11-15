<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\cart;




class cartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        //return view('cart.cart');
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

        $v=0;

        $product_id = $request->p_id;
        $user_id = $request->u_id;


        $check_product = DB::table('carts')
            ->join('products', 'products.product_id', '=', 'carts.product_id')
            ->where('carts.product_id', '=', $product_id)
            ->where('carts.id', '=', $user_id)
            ->get();

//       dd($check_product[0]->cart_id);


//        foreach ($check_product as $item) {
//            if($item->product_quantity <= 0){
//                $v++;
//            }
//        }

        if (count($check_product) > 0 && $v == 0) {

            foreach ($check_product as $value) {

                // $add=$request->p_qun;
                $add = $value->order_quantity;
                $add++;
                //



                $total_price = $value->product_price * $add;


                $update_data = [
                    'order_quantity' => $add,
                    'total_price' => $total_price

                ];

                DB::table('carts')
                    ->where('cart_id', $value->cart_id)
                    ->update($update_data);

            }


        } else {


            $cart = new cart();
            $cart->id = $request->u_id;
            $cart->product_id = $request->p_id;
            $cart->order_quantity = 1;
            $cart->total_price = $request->t_price;

            $cart->save();

            // $qun = DB::table('products')->where('product_id',$request->p_id)->get();
            // $update_qun = 0;
            // foreach($qun as $v){
            //     $update_qun = $v->product_quantity - 1;

            // }
       


//            DB::table('products')
//                ->where('product_id',$request->p_id)
//                ->update($update_qun);




        }

        //dd($check_product);
        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        //

        $cart = DB::table('carts')
            ->join('products', 'products.product_id', '=', 'carts.product_id')
            ->where('carts.id', $id)
            ->get();

        $cart_total_price = DB::table('carts')
            ->where('id', $id)
            ->sum('total_price');


        //dd($cart_total_price);

        return view('cart.cart')
            ->with('cart_value', $cart)
            ->with('total_price', $cart_total_price);

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
    public function update(Request $request)
    {

        $quantity = $request->pro_qun;
        $price = $request->price;

        $total_price = $quantity * $price;


        // $check = DB::table('products')
        //     ->where('product_id',$request->pro_id)
        //     ->get();

        // $valid=0;
        // foreach ($check as $validation){
        //     if($quantity > $validation && $quantity > 0) {
        //         $valid++;
        //     }

        // }

      

            //dd($total_price);
            //dd($request->pro_qun);

            $update_price =[
                'order_quantity'=> $quantity,
                'total_price' =>  $total_price
            ];

            DB::table('carts')
                ->where('product_id',$request->pro_id)
                ->update($update_price);

            // $product_quantity = DB::table('products')
            // ->where('product_id',$request->pro_id) 
            // ->pluck('product_quantity')
            // ->first();
            
            // $total_product = $product_quantity - $quantity;

            // $stock = [    
            //     'product_quantity'=> $total_product
            // ];  
            
            // DB::table('products')
            // ->where('product_id',$request->pro_id)
            // ->update($stock);
       
        return redirect()->back();






    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        DB::table('carts')
            ->where('cart_id', $request->ct_id)
            ->delete();

        DB::table('order_infos')
            ->where('product_id', $request->pr_id)
            ->delete();


        // $ordered_quantity = DB::table('carts')
        //     ->where('product_id',$request->pr_id)
        //     ->pluck('order_quantity')
        //     ->first();    
        
            

        return redirect()->back();

    }


    public function delete_all(Request $request)
    {
        //
        cart::query()->delete();
        //order_info::query()->delete();


        DB::table('order_infos')
            ->where('product_id', $request->pr_id)
            ->delete();

        return redirect()->back();

    }


}
