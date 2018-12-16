<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class searchController extends Controller
{

    public function searchProduct(Request $request){

        if($request->search_product){
            $product_data = DB::table('products')
                ->join('categories','categories.category_id','=','products.category_id')
                ->join('brands','brands.brand_id','=','products.brand_id')
                ->join('discount','discount.product_id','=','products.product_id')
                ->where('products.product_visiblity','=','online')
                ->where('products.product_name','like','%'.$request->search_product.'%')
                ->orWhere('categories.category_name','like','%'.$request->search_product.'%')
                ->orWhere('brands.brand_name','like','%'.$request->search_product.'%')
                ->paginate(8)
                ->setPath ( '' );

            $pagination = $product_data->appends ( array (
                'search_product' => $request->search_product
            ) );



           // dd($product_data);

            $total_products = DB::table('products')->where('product_visiblity','=','online')->count();
            $discount = DB::table('discount')
                ->join('products','products.product_id','=','discount.product_id')
                ->get();

          //  dd($product_data);



            return view('collection.collection')
                ->with('product_cat',$product_data)
                ->with('total_product',$total_products)
                ->with('pagination',$pagination)
                ->with('discount',$discount);

        }



    }

    public function sortAll(Request $request){

        //dd($request->selector);

//            if($request->selector_rating == "(rating)lowest to highest"){
//                $product_data = DB::table('products')
//                    ->join('discount','discount.product_id','=','products.product_id')
//                    ->orderBy('products.product_avg_rating','asc')
//                    ->paginate(4)
//                    ->setPath ( '' );
//
//                $pagination = $product_data->appends ( array (
//                    'selector_rating' => $request->selector_rating
//                ) );
//
//
//                $total_products = DB::table('products')->where('product_visiblity','=','online')->count();
//                $discount = DB::table('discount')
//                    ->join('products','products.product_id','=','discount.product_id')
//                    ->get();
//
//                return view('collection.collection')
//                    ->with('product_cat',$product_data)
//                    ->with('total_product',$total_products)
//                    ->with('discount',$discount);
//
//
//            }
             if($request->selector_price == "popularity"){
                 $product_data = DB::table('products')
                     ->join('discount','discount.product_id','=','products.product_id')
                     ->orderBy('products.product_avg_rating','desc')
                     ->paginate(8)
                     ->setPath ( '' );

                $pagination = $product_data->appends ( array (
                    'selector_price' => $request->selector_price
                ) );

                $total_products = DB::table('products')->where('product_visiblity','=','online')->count();
                $discount = DB::table('discount')
                    ->join('products','products.product_id','=','discount.product_id')
                    ->get();

                return view('collection.collection')
                    ->with('product_cat',$product_data)
                    ->with('total_product',$total_products)
                    ->with('discount',$discount);
            }


            if($request->selector_price == "(price)lowest to highest"){
                $product_data = DB::table('products')
                    ->join('discount','discount.product_id','=','products.product_id')

                    ->orderBy('products.product_price','asc')
                    ->paginate(8)
                    ->setPath ( '' );

                $pagination = $product_data->appends ( array (
                    'selector_price' => $request->selector_price
                ) );


                $total_products = DB::table('products')->where('product_visiblity','=','online')->count();
                $discount = DB::table('discount')
                    ->join('products','products.product_id','=','discount.product_id')
                    ->get();

                return view('collection.collection')
                    ->with('product_cat',$product_data)
                    ->with('total_product',$total_products)
                    ->with('discount',$discount);

//            return redirect()->back()
//                ->with('product_cat',$product_data)
//                ->with('total_product',$total_products)
//                ->with('discount',$discount);
//            return redirect()->action('seachController@sortProduct');




            }
            if($request->selector_price == "(price)highest to lowest"){
                $product_data = DB::table('products')
                    ->join('discount','discount.product_id','=','products.product_id')

                    ->orderBy('products.product_price','desc')
                    ->paginate(8)
                    ->setPath ( '' );

                $pagination = $product_data->appends ( array (
                    'selector_price' => $request->selector_price
                ) );

                $total_products = DB::table('products')->where('product_visiblity','=','online')->count();
                $discount = DB::table('discount')
                    ->join('products','products.product_id','=','discount.product_id')
                    ->get();

                return view('collection.collection')
                    ->with('product_cat',$product_data)
                    ->with('total_product',$total_products)
                    ->with('discount',$discount);
            }



    }


    public function sort_category(Request $request) {

        if($request->selector_price == "popularity"){
            $product_data = DB::table('products')
                ->join('discount','discount.product_id','=','products.product_id')
                ->join('categories', 'categories.category_id', '=', 'products.category_id')
                ->orderBy('products.product_avg_rating','desc')
                ->paginate(8)
                ->setPath ( '' );

            $pagination = $product_data->appends ( array (
                'selector_price' => $request->selector_price
            ) );

            $total_products = DB::table('products')->where('product_visiblity','=','online')->count();
            $discount = DB::table('discount')
                ->join('products','products.product_id','=','discount.product_id')
                ->get();
//
//            $category_name = DB::table('categories')
//                ->where('category_name','=',$name)
//                ->first();

            return redirect()->route('category.products');
///
//            return view('categories.categories')
//                ->with('product_cat',$product_data)
//                ->with('total_product',$total_products)
//                ->with('cat_name',$category_name)
//                ->with('discount',$discount);
        }


        if($request->selector_price == "(price)lowest to highest"){
            $product_data = DB::table('products')
                ->join('discount','discount.product_id','=','products.product_id')
                ->join('categories', 'categories.category_id', '=', 'products.category_id')
                ->orderBy('products.product_price','asc')
                ->paginate(4)
                ->setPath ( '' );

            $pagination = $product_data->appends ( array (
                'selector_price' => $request->selector_price
            ) );


            $total_products = DB::table('products')->where('product_visiblity','=','online')->count();
            $discount = DB::table('discount')
                ->join('products','products.product_id','=','discount.product_id')
                ->get();

//            $category_name = DB::table('categories')
//                ->where('category_name','=',$name)
//                ->first();


//            return view('categories.categories')
//                ->with('product_cat',$product_data)
//                ->with('total_product',$total_products)
//                ->with('cat_name',$category_name)
//                ->with('discount',$discount);
            return redirect()->route('category.products');
//            return redirect()->back()
//                ->with('product_cat',$product_data)
//                ->with('total_product',$total_products)
//                ->with('discount',$discount);
//            return redirect()->action('seachController@sortProduct');




        }
        if($request->selector_price == "(price)highest to lowest"){
            $product_data = DB::table('products')
                ->join('discount','discount.product_id','=','products.product_id')
                ->join('categories', 'categories.category_id', '=', 'products.category_id')
                ->orderBy('products.product_price','desc')
                ->paginate(8)
                ->setPath ( '' );

            $pagination = $product_data->appends ( array (
                'selector_price' => $request->selector_price
            ) );

            $total_products = DB::table('products')->where('product_visiblity','=','online')->count();
            $discount = DB::table('discount')
                ->join('products','products.product_id','=','discount.product_id')
                ->get();

//            $category_name = DB::table('categories')
//                ->where('category_name','=',$name)
//                ->first();


//            return view('categories.categories')
//                ->with('product_cat',$product_data)
//                ->with('total_product',$total_products)
//                ->with('cat_name',$category_name)
//                ->with('discount',$discount);

          //  return redirect()->route('category.products',['name'=>]);
        }


    }






    //categories









}
