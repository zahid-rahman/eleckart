<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests\brandNameValidationRequest;
use App\Http\Requests\categoryNameValidationRequest;
use Illuminate\Support\Facades\Mail;

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

        $total_offline_customer = DB::table('customers')->where('approval', '=', 'offline')->count();
        $total_online_customer = DB::table('customers')->where('approval', '=', 'online')->count();

        $total_offline_products = DB::table('products')->where('product_visiblity', '=', 'offline')->count();
        $total_online_products = DB::table('products')->where('product_visiblity', '=', 'online')->count();

        $total_approve_vendor = DB::table('vendors')->where('approval', '=', 'approve')->count();
        $total_pending_vendor = DB::table('vendors')->where('approval', '=', 'pending')->count();
        $total_ban_vendor = DB::table('vendors')->where('approval', '=', 'ban')->count();

        $total_del_order = DB::table('orders')->where('status', '=', 'delivered')->count();
        $total_shp_order = DB::table('orders')->where('status', '=', 'shipping')->count();
        $total_cla_order = DB::table('orders')->where('status', '=', 'claimed')->count();


        $total_brands = DB::table('brands')->count();
        $total_categories= DB::table('categories')->count();




        return view('admin.dashboard')
            ->with('cust_off_count', $total_offline_customer)
            ->with('cust_on_count', $total_online_customer)
            ->with('pro_on_count', $total_online_products)
            ->with('pro_off_count', $total_offline_products)
            ->with('ven_app_count', $total_approve_vendor)
            ->with('ven_pen_count', $total_pending_vendor)
            ->with('ven_ban_count', $total_ban_vendor)
            ->with('ord_del_count', $total_del_order)
            ->with('ord_shp_count', $total_shp_order)
            ->with('ord_cla_count', $total_cla_order)
            ->with('total_brands', $total_brands)
            ->with('total_categories', $total_categories);
    }

    // vendor page

    public function vendor()
    {
        //

        $vendor_data = DB::table('vendors')->paginate(5);

        return view('admin.vendor')
            ->with('vendor_data', $vendor_data);
    }

    // order page

    public function order()
    {
        //

        $order_data = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.id')
            ->where('orders.status', '=', 'shipping')
            ->paginate(5);


        return view('admin.order')
            ->with('order_data', $order_data);
    }

    // categories page
    public function categories()
    {
        //


        $data = DB::table('categories')->paginate(5);

        return view('admin.categories')->with('categories', $data);
    }

    // brands page

    public function brands()
    {
        //
        $data = DB::table('brands')->paginate(5);
        return view('admin.brands')->with('brands', $data);
    }


    public function proudcts()
    {


        $data = DB::table('products')
            ->paginate(5);

        return view('admin.product')
            ->with('product_data', $data);
    }


    public function claimed_order()
    {


        $order_data = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.id')
            ->where('orders.status', '=', 'claimed')
            ->paginate(5);

        return view('admin.claimed_order')->with('order_data', $order_data);
    }

    public function customer()
    {

        $customer_data = DB::table('customers')->paginate(5);
        return view('admin.customer')->with('customer_data', $customer_data);
    }


    public function feedback()
    {

        $feedback_message = DB::table('feedback')->paginate(5);

        $users = DB::table('users')->get();
        //dd($users);

        return view('admin.feedback')
            ->with('feedback_data', $feedback_message)
            ->with('exist_email', $users);


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
     * @param  \Illuminate\Http\Request $request
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
            'brand_name' => $request->b_name
        ];

        DB::table('brands')->insert($data);
        return redirect()->route('admin.brands');
    }


    public function storeCategories(categoryNameValidationRequest $request)
    {
        //
        $data = [
            'category_name' => $request->c_name
        ];

        DB::table('categories')->insert($data);

        return redirect()->route('admin.categories');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        if ($request->search) {
            $vendor = DB::table('vendors')
                ->orWhere('com_name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->paginate(5)
                ->setPath('');

            $pagination = $vendor->appends(array(
                'search' => $request->search
            ));

            //    $vendor= DB::select(DB::raw('select * from vendors where Match(approval) Against ('.$request->search.')'))  ;

            $counter = 0;


            if ($vendor) {
                foreach ($vendor as $key => $value) {
                    # code...
                    //$loop = $loop->index+1;
                    $counter++;
                    echo '
                        <tr align="center" >
                                                                                
                                                                  
                        <td>' . $counter . '</td>
                        <td>' . $value->com_name . '</td>
                        <td>' . $value->email . '</td>
                        <td>' . $value->phone_number . '</td>
                        <td width="12%">' . $value->address . '</td>

                       
                        ';


                    if ($value->approval == "pending") {
                        echo '
                            <td>
                                <span id="dot-warning"></span>
                            </td>
                            ';

                    } else if ($value->approval == "approve") {
                        echo '
                            <td>
                                <span id="dot-online"></span>
                            </td>
                            ';
                    } else if ($value->approval == "ban") {
                        echo '
                            <td>
                                <span id="dot-offline"></span>
                            </td>
                            ';
                    }

                    echo '
                        
                            
                        <td width="15%">    
                            
                                
                        <a href="' . route("admin.vendor.delete.edit", ["email" => "$value->email"]) . '" data-toggle="tooltip" data-placement="bottom" title="permanently delete vendor account"> 
                            <span class="glyphicon glyphicon-trash hvr-wobble-top"  style="color:#ff5c33"></span>
                        
                        </a>  
                        || 
                        <a href="' . route("admin.vendor.account.edit", ["email" => "$value->email"]) . '" data-toggle="tooltip" data-placement="bottom" title="edit vendor information">
                            
                            <span class="glyphicon glyphicon-pencil hvr-wobble-top" style="color:#0099ff"></span>
                        </a>    
                        || 
                    <a href="' . route("admin.vendor.edit", ["email" => "$value->email"]) . '" data-toggle="tooltip" data-placement="bottom" title="ban or approve vendor account">
                         
                        <span class="glyphicon glyphicon-ban-circle" style="color:#ff9933"></span>
                    </a>
            
                    </td>
               </tr>
                        
                        ';


                }
            }
        }

    }


    public function showShippingOrder(Request $request)
    {
        if ($request->search) {
            $shipping_orders = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.id')
                ->where('orders.status', '=', 'shipping')
                ->where('orders.token_number', 'like', '%' . $request->search . '%')
//                ->where('customers.name','like','%'.$request->search.'%')
                ->get();

            //  dd($shipping_orders);
            $counter = 0;


//             ajax code


            if ($shipping_orders) {
                foreach ($shipping_orders as $key => $value) {
                    # code...
                    //$loop = $loop->index+1;
                    $counter++;
                    echo '
                        <tr align="center">
                                                                                
                                                                  
                        <td>' . $counter . '</td>
                        <td>' . $value->name . '</td>
                       ';

                    echo '<td style="color:tomato">' . $value->token_number . '</td>';
//                    if($value->status == "shipping "){
                    echo '<td width="12%" >' . $value->status . '</td>';
//                    }else{

//                    }

                    echo '     
                         <td><a href="' . route('admin.order.edit', ['token' => $value->token_number]) . '">view more info</a></td>

                        <td>
                                
                            <a href="' . route('admin.order.edit', ['token' => $value->token_number]) . '" class="btn btn-primary hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="delivery order confirmation"><span class="glyphicon glyphicon-ok-sign hvr-wobble-top"  ></span></a>
                            <a href="' . route('admin.claimed.order.edit', ['token' => $value->token_number]) . '" class="btn btn-danger hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="stopping order from shipping and send back to claimed section"> <span class="glyphicon glyphicon-alert hvr-wobble-top"  ></span></a>
                                
                      
                        </td>
                    
               </tr>
                        
                        ';


                }
            }
        }

    }

    public function showDeliveredOrder(Request $request)
    {

        if ($request->search) {
            $delivered_orders = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.id')
                ->where('orders.status', '=', 'delivered')
                ->where('orders.token_number', 'like', '%' . $request->search . '%')
//                ->where('customers.name','like','%'.$request->search.'%')
                ->get();

            $counter = 0;

            if ($delivered_orders) {
                foreach ($delivered_orders as $key => $item) {
                    $counter++;
                    echo '
        
        
                        <tr align="center">
                             <td>' . $counter . '</td>
                            <td> ' . $item->name . '</td>';


                    if ($item->status == "shipping") {
                    }

                    echo '<td><p style="color:green">' . $item->token_number . '</p></td>';

                    echo ' 
                            <td> ' . $item->status . ' </td>
                            
                            
                            <td><a href="' . route('admin.order.edit', ['token' => $item->token_number]) . '">view more info</a></td>
                        
                      
                        </tr>
        
        
        
        
        ';
                }
            }
        }


    }

    public function showClaimedOrder(Request $request)
    {

        if ($request->search) {
            $claimed_orders = DB::table('orders')
                ->join('customers', 'customers.id', '=', 'orders.id')
                ->where('orders.status', '=', 'claimed')
                ->where('orders.token_number', 'like', '%' . $request->search . '%')
//                ->where('customers.name','like','%'.$request->search.'%')
                ->get();

            $counter = 0;

            if ($claimed_orders) {
                foreach ($claimed_orders as $key => $item) {
                    $counter++;
                    echo '
            <tr align="center">
                <td>' . $counter . '</td>
                <td> ' . $item->name . '</td>';

                    if ($item->status == "claimed") {
                        echo '<td><p style="color:#cc0000">' . $item->token_number . '</p></td>';
                    }
                    echo '
                <td> ' . $item->status . ' </td>
                <td><a href="' . route('admin.order.edit', ['token' => $item->token_number]) . '">view more info</a></td>

                <td>
                        
                <a href="' . route('admin.order.confirm.edit', ['token' => $item->token_number]) . '" class="btn btn-primary hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="delivery order confirmation"><span class="glyphicon glyphicon-ok-sign hvr-wobble-top"  ></a>  
                
                </td>
          
            </tr>
        
        
        ';
                }
            }
        }


    }

    public function showProduct(Request $request)
    {

        if ($request->search) {

            $products = DB::table('products')
                ->join('discount', 'products.product_id', '=', 'discount.product_id')
                ->where('products.product_name', 'like', '%'.$request->search.'%')
                ->get();

            $counter = 0;

            if ($products) {
                foreach ($products as $key => $items) {

                    $counter++;


                    echo '
            <tr align="center">
                    <td>' . $counter . '</td>
                    <td>' . $items->product_name . '</td>
                    
                    ';
                    if ($items->product_visiblity == "online") {
                        echo '
                    <td>
                     <span id="dot-online"></span>
                      
                    </td>';
                    } elseif ($items->product_visiblity == "offline") {
                        echo '
                    <td>
                      
                        <span id="dot-offline"></span>
                    </td>';
                    }


                    echo '
                           
                    <td><a href="'.route('admin.product.details.edit', ['id' => $items->product_id]).'">view more info</a></td>
                        
                
                        <td width="15%">    
                            
                                
                            <a href="'.route('admin.product.delete.edit',['id' => $items->product_id]).'" class="btn btn-danger hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="permanently delete proudct"> 
                                <span class="glyphicon glyphicon-trash hvr-wobble-top"  style="color:#ffffff"></span>
                            
                            </a>  
                            
                        
                        <a href="'.route('admin.product.visiblity.edit', ['id' => $items->product_id]).'" class="btn btn-warning hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="make online or offline product">
                                
                            <span class="glyphicon glyphicon-ban-circle hvr-wobble-top" style="color:#ffffff    "></span>
                        </a>
                
                        </td>
                </tr>
        ';
                }
            }

        }


    }

    public function showCustomer(Request $request)
    {
        if ($request->search) {
            $customers = DB::table('customers')
                ->orWhere('name', 'like', '%' . $request->search . '%')
                ->orWhere('email', 'like', '%' . $request->search . '%')
                ->orWhere('address', 'like', '%' . $request->search . '%')
                ->paginate(5)
                ->setPath('');

            $pagination = $customers->appends(array(
                'search' => $request->search
            ));

            $counter = 0;

            if ($customers) {

                foreach ($customers as $key => $customers) {
                    $counter++;
                    echo ' 
                    <tr class="default" align="center">
                         <td>' . $counter . '</td>
                        <td>' . $customers->name . '</td>
                        <td>' . $customers->email . '</td>
                        <td>' . $customers->phone_number . '</td>
                        <td>' . $customers->address . '</td>


                    
                        <td>
                        ';
                    if ($customers->approval == "online") {
                        echo ' <span id="dot-online"></span>';
                    } elseif ($customers->approval == "offline") {
                        echo ' <span id="dot-offline"></span>';
                    }

                    echo '  

                        </td>
                
                        <td width="15%">    
                            
                              
                             <a href="' . route('admin.customer.delete.edit', ['email' => $customers->email]) . '" data-toggle="tooltip" data-placement="bottom" title="permanently delete customer account"> 
                                <span class="glyphicon glyphicon-trash hvr-wobble-top"  style="color:#ff5c33"></span>
                            
                            </a>  
                            || 
                            <a href="' . route('admin.customer.info.edit', ['email' => $customers->email]) . '" data-toggle="tooltip" data-placement="bottom" title="edit customer information">
                                
                                <span class="glyphicon glyphicon-pencil hvr-wobble-top" style="color:#0099ff"></span>
                            </a>    
                            || 
                        <a href="' . route('admin.customer.ban.edit', ['email' => $customers->email]) . '" data-toggle="tooltip" data-placement="bottom" title="ban or approve customer account">
                             
                            <span class="glyphicon glyphicon-ban-circle" style="color:#ff9933"></span>
                        </a> 
                
                        </td>
                </tr>
                    ';

                }

            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     * edit pages
     * @param  int $id
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
            ->join('users', 'users.id', '=', 'orders.id')
            ->where('orders.status', '=', 'delivered')
            ->paginate(5);

        //dd($order_data);

        return view('admin.order_delivered_info')
            ->with('order_data', $order_data);
    }

    public function editVendorAccount($email)
    {
        //

        $data = DB::table('vendors')
            ->where('email', $email)
            ->get();

        return view('admin.vendor_ban')->with('data', $data);
    }

    public function editVendorAccountForDelete($email)
    {
        //

        $data = DB::table('vendors')
            ->where('email', $email)
            ->get();

        return view('admin.vendor_delete')->with('data', $data);
    }

    public function editVendorAccountShow($email)
    {
        //

        $data = DB::table('vendors')
            ->where('email', $email)
            ->get();

        $total_product = DB::table('products')
            ->join('vendors', 'products.id', '=', 'vendors.id')
            ->where('vendors.email', $email)
            ->count();


        $total_pub_product = DB::table('products')
            ->join('vendors', 'products.id', '=', 'vendors.id')
            ->where('products.product_visiblity', '=', 'online')
            ->where('vendors.email', $email)
            ->count();


        $total_assosiated_brands = DB::table('brands')
            ->distinct()
            ->join('products', 'products.brand_id', '=', 'brands.brand_id')
            ->join('vendors', 'vendors.id', '=', 'products.id')
            ->where('vendors.email', $email)
            ->select('products.brand_mame')
            ->count('products.brand_id');


        $assosiated_brands = DB::table('brands')
            ->distinct()
            ->join('products', 'products.brand_id', '=', 'brands.brand_id')
            ->join('vendors', 'vendors.id', '=', 'products.id')
            ->where('vendors.email', $email)
            ->select('brands.brand_name')
            ->get();

        //  dd($assosiated_brands);

        return view('admin.vendor_edit_info')->with('data', $data)
            ->with('pro_count', $total_product)
            ->with('pro_pub_count', $total_pub_product)
            ->with('tot_b', $total_assosiated_brands)
            ->with('b_name', $assosiated_brands);


    }


    public function editOrderDetails($token)
    {


        $order_details = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.id')
            ->where('orders.token_number', $token)
            ->get();


        $customer_ordered_product_details = DB::table('products')
            ->join('order_infos', 'products.product_id', '=', 'order_infos.product_id')
            ->where('order_infos.order_token_number', '=', $token)
            ->get();

        // dd($customer_ordered_product_details,$token);

        return view('admin.order_info')->with('order_details', $order_details)
            ->with('pro_details', $customer_ordered_product_details);
    }


    public function editOrdeConfirmation($token)
    {

        return view('admin.order_deliver')->with('token', $token);
    }

    public function editOrderShipping($token)
    {

        return view('admin.order_shipping')->with('token', $token);
    }

    public function editClaimedOrder($token)
    {

        return view('admin.claimed_order_edit')->with('token', $token);

    }


    public function editOrderDelete($token)
    {

        $order_data = DB::table('orders')
            ->join('users', 'users.id', '=', 'orders.id')
            ->where('orders.token_number', $token)
            ->get();

        return view('admin.order_delete')
            ->with('token', $token)
            ->with('data', $order_data);
    }


    public function editcategoriesUpdate($id)
    {
        $category = DB::table('categories')->where('category_id', $id)->get();
        return view('admin.category_edit')->with('category', $category);
    }

    public function editCategoriesDelete($id)
    {
        $data = DB::table('categories')
            ->where('category_id', $id)
            ->get();

        return view('admin.category_delete')
            ->with('data', $data)
            ->with('id', $id);
    }

    public function editbrandsUpdate($id)
    {
        $brands = DB::table('brands')->where('brand_id', $id)->get();
        return view('admin.brands_edit')->with('brands', $brands);
    }

    public function editBrandsDelete($id)
    {
        $data = DB::table('brands')
            ->where('brand_id', $id)
            ->get();

        return view('admin.brands_delete')
            ->with('data', $data)
            ->with('id', $id);
    }

    public function editproudctsDetails($id)
    {

        $data = DB::table('products')
            ->join('brands', 'brands.brand_id', '=', 'products.brand_id')
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->join('users', 'users.id', 'products.id')
            ->where('users.role', '=', 'vendor')
            ->where('products.product_id', $id)
            ->get();


        $product_images = DB::table('product_images')->where('product_id', $id)->get();

        return view('admin.product_details')
            ->with('data', $data)
            ->with('images', $product_images);
    }

    public function editproudctsVisiblity($id)
    {

        $data = DB::table('products')->where('product_id', $id)->get();
        return view('admin.product_visiblity_edit')->with('data', $data);

    }


    public function editproudctsDelete($id)
    {

        $data = DB::table('products')->where('product_id', $id)->get();
        return view('admin.product_delete')->with('data', $data);

    }

    public function editCustomerAccountForBan($email)
    {
        //

        $data = DB::table('customers')
            ->where('email', $email)
            ->get();

        return view('admin.customer_ban')->with('data', $data);
    }


    public function editCustomerAccountForDelete($email)
    {
        $data = DB::table('customers')
            ->where('email', $email)
            ->get();

        return view('admin.customer_delete')->with('data', $data);

    }

    public function editCustomerAccountInfo($email)
    {

        $data = DB::table('customers')->where('email', $email)->get();
        $tot_o = DB::table('customers')
            ->join('users', 'users.email', '=', 'customers.email')
            ->join('orders', 'orders.id', '=', 'users.id')
            ->where('users.email', $email)
            ->count();

        $tot_c_o = DB::table('customers')
            ->join('users', 'users.email', '=', 'customers.email')
            ->join('orders', 'orders.id', '=', 'users.id')
            ->where('orders.status', '=', 'claimed')
            ->where('users.email', $email)
            ->count();

        $tot_d_o = DB::table('customers')
            ->join('users', 'users.email', '=', 'customers.email')
            ->join('orders', 'orders.id', '=', 'users.id')
            ->where('orders.status', '=', 'delivered')
            ->where('users.email', $email)
            ->count();

        $tot_s_o = DB::table('customers')
            ->join('users', 'users.email', '=', 'customers.email')
            ->join('orders', 'orders.id', '=', 'users.id')
            ->where('orders.status', '=', 'shipping')
            ->where('users.email', $email)
            ->count();

        return view('admin.customer_info')
            ->with('data', $data)
            ->with('tot_o', $tot_o)
            ->with('tot_c_o', $tot_c_o)
            ->with('tot_d_o', $tot_d_o)
            ->with('tot_s_o', $tot_s_o);
    }



    //---------------------------------------------------------------


    /**
     * Update the specified resource in storage.
     * update methods
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
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
            'approval' => 'approve'
        ];

        DB::table('vendors')->where('email', $email)->update($approveVendor);


        $product_status = [
            'product_visiblity' => 'online'
        ];


        DB::table('products')->where('id', '=', $request->v_id)->update($product_status);
        // dd($data);

        return redirect()->route('admin.vendor');


    }


    public function vendorBan(Request $request, $email)
    {
        //

        $approveVendor = [
            'approval' => 'ban'
        ];

        DB::table('vendors')->where('email', $email)->update($approveVendor);

        $product_status = [
            'product_visiblity' => 'offline'
        ];


        DB::table('products')->where('id', '=', $request->v_id)->update($product_status);
        // dd($data);

        return redirect()->route('admin.vendor');


    }

    public function deliverOrder(Request $request, $token)
    {
        //

        $deliver = [
            'status' => 'delivered'
        ];

        DB::table('orders')->where('token_number', $token)->update($deliver);

        return redirect()->route('admin.order');


    }


    public function shippingOrder(Request $request, $token)
    {
        //

        $deliver = [
            'status' => 'shipping'
        ];

        DB::table('orders')->where('token_number', $token)->update($deliver);

        return redirect()->route('admin.orderdeliver');


    }

    public function claimedOrder(Request $request, $token)
    {
        //

        $claimed = [
            'status' => 'claimed'
        ];

        DB::table('orders')->where('token_number', $token)->update($claimed);

        return redirect()->route('admin.claimed.order');


    }

    public function updateCategories(Request $request, $id)
    {
        $data = [
            'category_name' => $request->u_c_name
        ];

        DB::table('categories')->where('category_id', $id)->update($data);

        return redirect()->route('admin.categories');
    }

    public function updateBrands(Request $request, $id)
    {
        $data = [
            'brand_name' => $request->u_b_name
        ];

        DB::table('brands')->where('brand_id', $id)->update($data);

        return redirect()->route('admin.brands');
    }

    public function updateProductOnline(Request $request, $id)
    {

        $data = [
            'product_visiblity' => 'online'
        ];
        DB::table('products')->where('product_id', $id)->update($data);

        return redirect()->route('admin.product');
    }

    public function updateProductOffline(Request $request, $id)
    {
        $data = [
            'product_visiblity' => 'offline'
        ];
        DB::table('products')->where('product_id', $id)->update($data);

        return redirect()->route('admin.product');

    }

    public function udpateCustomerBan($email)
    {
        $data = [
            'approval' => 'offline'
        ];

        DB::table('customers')->where('email', $email)->update($data);

        return redirect()->route('admin.customer');
    }

    public function udpateCustomerApprove($email)
    {
        $data = [
            'approval' => 'online'
        ];

        DB::table('customers')->where('email', $email)->update($data);

        return redirect()->route('admin.customer');
    }

    /**
     * Remove the specified resource from storage.
     * remove or destroy methods
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($email)
    {
        //
        $id = DB::table('users')->where('email', $email)->pluck('id')->first();

        $data = [
            'email'   => $email,

        ];
        Mail::send('emails.message', $data, function($message) use ($data)
        {
            $message->from('eleckart2018@gmail.com');
            $message->to($data['email'],'Eleckart');

        });


        // dd($id);
        DB::table('vendors')->where('email', $email)->delete();


        DB::table('products')->where('id', $id)->delete();
        DB::table('product_images')->where('v_id', $id)->delete();


        DB::table('users')->where('email', $email)->delete();




        return redirect()->route('admin.vendor');


    }


    public function destroyOrder($token)
    {

        DB::table('orders')
            ->where('token_number', $token)
            ->delete();

        DB::table('order_infos')
            ->where('order_token_number', $token)
            ->delete();

        return redirect()->route('admin.order');

    }


    public function destroyCategory($id)
    {

        return redirect()->route('admin.categories');

    }

    public function destroyBrands($id)
    {

        return redirect()->route('admin.brands');

    }

    public function destroyProduct($id)
    {

        DB::table('products')->where('product_id', $id)->delete();
        DB::table('product_images')->where('product_id', $id)->delete();

        return redirect()->route('admin.product');
    }

    public function destroyCustomer($email)
    {
        DB::table('customers')->where('email', $email)->delete();
        DB::table('users')->where('email', $email)->delete();


        $data = [
            'email'   => $email,

        ];
        Mail::send('emails.message', $data, function($message) use ($data)
        {
            $message->from('eleckart2018@gmail.com');
            $message->to($data['email'],'Eleckart');

        });

        return redirect()->route('admin.customer');
    }


    //---------------------------------------------------------------


}
