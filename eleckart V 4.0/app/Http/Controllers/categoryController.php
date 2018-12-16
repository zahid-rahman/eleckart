<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


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

        if($request->search && $request->cat){
            
           // dd($request->cat);
            $product_data = DB::table('products')
                ->join('categories','categories.category_id','=','products.category_id')
                ->join('discount','discount.product_id','=','products.product_id')
                ->where('categories.category_name','=',$request->cat)
                ->Where('products.product_name','like','%'.$request->search.'%')
                ->get();

            $discount = DB::table('discount')
                ->join('products','products.product_id','=','discount.product_id')
                ->get();

                if($product_data){


                    foreach($product_data as $key => $value){


                        // if($product_data->product_visiblity == "online" && $product_data->product_quantity > 0){

                        // }

                        if($value->product_visiblity == "online"){

                            echo ' <div id="product_card">';
                                echo '
                                   <a href="'.route("product.product-detials",["id"=>$value->product_id]).'">
                                    <img src="'.$value->product_thumbnail.'" alt="Avatar" class="img-responsive">
                                    </a>
                                    
                                      
                                ';
                                echo ' <div class="content">
                                        <p><b>'.$value->product_name.'</b></p>
                                ';


                            $pro_avg= DB::table('ratings')->where('product_id',$value->product_id)->avg('rating_number');
                            $avg= (int)ceil($pro_avg);

                            for($i = 0; $i < 5; $i++){
                                if($avg != 0){
                                    echo '
                                     <span  class="fa fa-star signed" ></span>
                                       
                                    ';
                                    $avg--;
                                }else{
                                    echo '<span  class="fa fa-star" ></span>';
                                }
                            }


                                    if( count($discount) == 0){
                                        echo '  <p>price : '.$value->product_price.' BDT</p>';
                                    }else{
                                        foreach($discount as $disc){
                                            if($disc->product_id == $value->product_id && $disc->discount != 0){
                                                echo '
                                                     <p>Price: '.$disc->discount_product_price.' BDT</p>

                                            <p>discount: <b>'.$disc->discount.' %</b></p>
                                           
                                            <p> <del>original price : '.$value->product_price.' BDT</del></p>
                                                ';
                                            }else if($disc->product_id == $value->product_id && $disc->discount <= 0){
                                                echo '  <p>price : '.$value->product_price.' BDT</p>';
                                            }
                                        }
                                    }

                                    //authentication
                                if(Auth::check() && Auth::user()->role == "user"){
                                    if($value->product_visiblity == "online" && $value->product_quantity == 0){
                                          echo ' <div class="alert alert-danger">
                                            product out of stock
                                        </div>';
                                    }else{
                                        echo '
                                                <form action="'.route("cart.add").'">
                                
                                              <p hidden>{{csrf_field()}}</p> 
                
                                                <div class="form-group">
                                                    <input style="display: none" name="u_id" value="'.Auth::user()->id.'" hidden>
                                                </div>
                                                <div class="form-group">
                                                    <input style="display: none" name="p_id" value="'.$value->product_id.'" hidden>
                                                </div>
                                                <div class="form-group">
                                                   
                                                    <input style="display: none" name="p_qun"  hidden>
                                                </div>
                
                                                <div class="form-group">';



                                        if($value->discount == 0) { echo ' <input style="display: none" name="t_price" value="'.$value->product_price.'" hidden>';}
                                        elseif($value->discount >0){  echo'<input style="display: none" name="t_price" value="'.$value->discount_product_price.'" hidden>';}


                                        echo '</div>';

                                        echo '<input type="submit" class="btn btn-danger hvr-wobble-top" value="add to cart">
                
                                            </form>
                                        ';
                                    }
                                }else{

                                    if($value->product_quantity == 0){
                                        echo '
                                <div class="alert alert-danger">
                                    product out of stock
                                </div>
                                ';
                                    }else{
                                        echo '
                                <button type="button" class="btn btn-danger hvr-wobble-top" data-toggle="modal" data-target="#myAlertModal">
                                add to cart
                            </button>
                                <div class="modal fade" id="myAlertModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
        
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title"><b>Alert</b></h4>
                                        </div>
                                        <div class="modal-body">
                                            <p style="color:#ff484a"><b>user Log in required</b></p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
        
                                    </div>
                                </div>
                            </div>
            
            
                                ';
                                    }

                                }

                                echo '</div>';

                            echo '</div>';



                        }

                    }

                }  
              
        } 




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
        ->join('discount','discount.product_id','=','products.product_id')
        ->where('categories.category_name','=',$name)
        ->Where('products.product_visiblity','=',$visiblity)
        ->paginate(6);

        $total_product = DB::table('products')
        ->join('categories','products.category_id','=','categories.category_id')
        ->where('categories.category_name','=',$name)
        ->Where('products.product_visiblity','=',$visiblity)
        ->count();

        $category_name = DB::table('categories')
        ->where('category_name','=',$name)
        ->first();

        $discount = DB::table('discount')
            ->join('products','products.product_id','=','discount.product_id')
            ->get();



        return view('categories.categories')
            ->with('product_cat',$product_categories )
            ->with('total_product',$total_product)
            ->with('cat_name',$category_name)
            ->with('discount',$discount);


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
