<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\brandNameValidationRequest;
use App\Http\Requests\categoryNameValidationRequest;

class adminController extends Controller
{
    /**
     * Display a listing of the resource.
     * display pages
     * @return \Illuminate\Http\Response
     */

   

    //  dashboard page
    public function index()
    {
        //

        return view('admin.dashboard');
    }

    // vendor page

    public function vendor()
    {
        //

        $vendor_data = DB::table('vendors')->get();

        return view('admin.vendor')
        ->with('vendor_data',$vendor_data);
    }

    // order page

    public function order()
    {
        //

        $order_data = DB::table('orders')
        ->join('users','users.id','=','orders.id')
        ->where('orders.status','=','shipping')
        ->get();

        

        return view('admin.order')
        ->with('order_data',$order_data);
    }

    // categories page
    public function categories()
    {
        //


        $data = DB::table('categories')->get();

        return view('admin.categories')->with('categories',$data);
    }

    // brands page

    public function brands()
    {
        //
        $data = DB::table('brands')->get();
        return view('admin.brands')->with('brands',$data);
    }
    

    //---------------------------------------------------------------
  
   

    /**
     * Show the form for creating a new resource.
     * create pages
     * @return \Illuminate\Http\Response
     */




    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     * insert methods
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }


    public function storeBrands(brandNameValidationRequest $request)
    {
        //

        $data = [
            'brand_name'=>$request->b_name
        ];

        DB::table('brands')->insert($data);
        return redirect()->route('admin.brands');
    }


    public function storeCategories(categoryNameValidationRequest $request)
    {
        //
        $data = [
            'category_name'=>$request->c_name
        ];

        DB::table('categories')->insert($data);

        return redirect()->route('admin.categories');
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
     * edit pages
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

  // order deliver page

    public function editOrderDeliverDetails()
    {
        //

        $order_data = DB::table('orders')
        ->join('users','users.id','=','orders.id')
        ->where('orders.status','=','delivered')
        ->get();

        //dd($order_data);

        return view('admin.order_delivered_info')
        ->with('order_data',$order_data);
    }

    public function editVendorAccount($email)
    {
        //

        $data = DB::table('vendors')
        ->where('email',$email)
        ->get();

        return view('admin.vendor_ban')->with('data',$data);
    }

    public function editVendorAccountForDelete($email)
    {
        //

        $data = DB::table('vendors')
        ->where('email',$email)
        ->get();

        return view('admin.vendor_delete')->with('data',$data);
    }

    public function editVendorAccountShow($email)
    {
        //

        $data = DB::table('vendors')
        ->where('email',$email)
        ->get();

        $total_product = DB::table('products')
        ->join('vendors','products.id','=','vendors.id')
        ->where('vendors.email',$email)
        ->count();


        $total_pub_product = DB::table('products')
        ->join('vendors','products.id','=','vendors.id')
        ->where('products.product_visiblity','=','online')
        ->where('vendors.email',$email)
        ->count();

      

       $total_assosiated_brands=DB::table('brands')
       ->distinct()
       ->join('products','products.brand_id','=','brands.brand_id')
       ->join('vendors','vendors.id','=','products.id')
       ->where('vendors.email',$email)
       ->select('products.brand_mame')
       ->count('products.brand_id') ;



       $assosiated_brands=DB::table('brands')
       ->distinct()
       ->join('products','products.brand_id','=','brands.brand_id')
       ->join('vendors','vendors.id','=','products.id')
       ->where('vendors.email',$email)
       ->select('brands.brand_name')
       ->get();

     //  dd($assosiated_brands);

        return view('admin.vendor_edit_info')->with('data',$data)
            ->with('pro_count',$total_product)
            ->with('pro_pub_count',$total_pub_product)
            ->with('tot_b',$total_assosiated_brands)
            ->with('b_name',$assosiated_brands);

        
    }


    public function  editOrderDetails($token){


        $order_details= DB::table('orders')
        ->join('users','users.id','=','orders.id')
        ->where('orders.token_number',$token)
        ->get();


        $customer_ordered_product_details = DB::table('products')
        ->join('order_infos','products.product_id','=','order_infos.product_id')
        ->where('order_infos.order_token_number','=',$token)
        ->get();

       // dd($customer_ordered_product_details,$token);

        return view('admin.order_info')->with('order_details',$order_details)
        ->with('pro_details', $customer_ordered_product_details);
    }



    public function editOrdeConfirmation($token){

        return view('admin.order_deliver')->with('token',$token);
    }

    public function editOrderShipping($token){

        return view('admin.order_shipping')->with('token',$token);
    }

    public function editOrderDelete($token){

        $order_data = DB::table('orders')
        ->join('users','users.id','=','orders.id')
        ->where('orders.token_number',$token)
        ->get();

        return view('admin.order_delete')
        ->with('token',$token)
        ->with('data', $order_data);
    }


    public function editcategoriesUpdate($id){   
        $category = DB::table('categories')->where('category_id',$id)->get();
        return view('admin.category_edit')->with('category',$category);
    }
    public function editCategoriesDelete($id){  
        $data = DB::table('categories')
        ->where('category_id',$id)
        ->get();

        return view('admin.category_delete')
        ->with('data',$data)
        ->with('id',$id);
    }

    public function editbrandsUpdate($id){   
        $brands = DB::table('brands')->where('brand_id',$id)->get();
        return view('admin.brands_edit')->with('brands',$brands);
    }
    public function editBrandsDelete($id){  
        $data = DB::table('brands')
        ->where('brand_id',$id)
        ->get();
        
        return view('admin.brands_delete')
        ->with('data',$data)
        ->with('id',$id);
    }



    

    


    //---------------------------------------------------------------

   

    /**
     * Update the specified resource in storage.
     * update methods
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    public function vendorApprove(Request $request, $email)
    {
        //

        $approveVendor = [
            'approval'=>'approve'
        ];

        DB::table('vendors')->where('email',$email)->update($approveVendor);

        return redirect()->route('admin.vendor');


    }

    
    public function vendorBan(Request $request, $email)
    {
        //

        $approveVendor = [
            'approval'=>'ban'
        ];

        DB::table('vendors')->where('email',$email)->update($approveVendor);

        return redirect()->route('admin.vendor');


    }

    public function deliverOrder(Request $request, $token)
    {
        //

        $deliver = [
            'status'=>'delivered'
        ];

        DB::table('orders')->where('token_number',$token)->update($deliver);

        return redirect()->route('admin.order');


    }


    public function shippingOrder(Request $request, $token)
    {
        //

        $deliver = [
            'status'=>'shipping'
        ];

        DB::table('orders')->where('token_number',$token)->update($deliver);

        return redirect()->route('admin.orderdeliver');


    }

    public function updateCategories(Request $request,$id){
        $data = [
            'category_name'=>$request->u_c_name
        ];

        DB::table('categories')->where('category_id',$id)->update($data);

        return redirect()->route('admin.categories');
    }

    public function updateBrands(brandNameUpdateValidationRequest $request,$id){
        $data = [
            'brand_name'=>$request->u_b_name
        ];

        DB::table('brands')->where('brand_id',$id)->update($data);

        return redirect()->route('admin.brands');
    }

    /**
     * Remove the specified resource from storage.
     * remove or destroy methods
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        //
        $id = DB::table('users')->where('email',$email)->pluck('id')->first();
        // dd($id);
        DB::table('vendors')->where('email',$email)->delete();

        
        DB::table('products')->where('id',$id)->delete();
        DB::table('product_images')->where('v_id',$id)->delete();


        DB::table('users')->where('email',$email)->delete();
        return redirect()->route('admin.vendor');

        
    }


    public function destroyOrder($token){

        DB::table('orders')
        ->where('token_number',$token)
        ->delete();

        DB::table('order_infos')
        ->where('order_token_number',$token)
        ->delete(); 

        return redirect()->route('admin.order');

    }



    public function destroyCategory($id){

      

        return redirect()->route('admin.categories');

    }

    public function destroyBrands($id){

        return redirect()->route('admin.brands');

    }

    


   

    //---------------------------------------------------------------

    
}
