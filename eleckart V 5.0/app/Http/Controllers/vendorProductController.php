<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\imageUploadRequest;
use App\Http\Requests\vendorProductValidationRequest;


class vendorProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //


        $product = DB::table('products')
            ->where('id', Auth::user()->id)
            ->paginate(3);

        // dd($product);


        return view('vendor.product')->with('pro', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //


        return view('vendor.add_product');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(vendorProductValidationRequest $request)
    {


        $file = $request->file('pro_img_up');
        $name = $file->getClientOriginalName();


        $file->storeAs('public', $name);
        $url = Storage::url($name);

        $brand_id = DB::table('brands')
            ->where('brand_name', $request->brand_name)
            ->pluck('brand_id')
            ->first();

        //dd($request->brand_name);

        $category_id = DB::table('categories')
            ->where('category_name', $request->c_name)
            ->pluck('category_id')
            ->first();


        $product = [
            'product_name' => $request->pro_name,
            'product_details' => $request->pro_desc,
            'product_thumbnail' => $url,
            'product_quantity' => $request->pro_qun,
            'product_visiblity' => 'offline',
            'product_price' => $request->pro_price,
            'discount' => $request->offer,
            'brand_id' => $brand_id,
            'category_id' => $category_id,
            'id' => $request->v_id,
            'product_avg_rating' => 0

        ];

        DB::table('products')->insert($product);

        $p_id = DB::table('products')->pluck('product_id')->last();

        $discount_data = [
            'product_id' => $p_id,
            'discount' => 0,
            'discount_product_price' => 0
        ];

        DB::table('discount')->insert($discount_data);


        //$product_id = DB::table('products')->pluck('product_id')->last();
        // $v_id = DB::table('products')->pluck('id')->last();

        //  dd($product_id);

        //return redirect()->route('vendor.products');

        return redirect()->route('vendor.products');

        //return view('vendor.upload_product_img')->with('id',$product_id)->with('v_id',$v_id);
    }

    public function storeDiscount(Request $request, $id)
    {

        $product_price = DB::table('products')
            ->where('product_id', '=', $id)
            ->pluck('product_price')
            ->first();

        $check = count(DB::table('discount')
            ->where('product_id', '=', $id)
            ->get());

        $frac = $request->disc / 100;
        $discount = $product_price * $frac;


        $after_discount_add_price = $product_price - $discount;

//        if($check == 0){
        $discount_data = [
            'product_id' => $id,
            'discount' => $request->disc,
            'discount_product_price' => $after_discount_add_price
        ];

        DB::table('discount')->where('product_id', '=', $id)->update($discount_data);

        $rate = [
            'discount' => $request->disc
        ];

        DB::table('products')->where('product_id', '=', $id)->update($rate);


        return redirect()->route('vendor.products');


//        }else if($check > 0){

//        }


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
    }

    public function showProducts(Request $request)
    {
        if ($request->search) {
            $vendor_product = DB::table('products')
                ->where('id', Auth::user()->id)
                ->where('products.product_name', 'like', '%' . $request->search . '%')
                ->get();


            if ($vendor_product) {
                foreach ($vendor_product as $item) {
                    echo '
                    <tr align="center">
                                        <td>' . $item->product_name . '</td>
                                        <td width="10%"><a href="' . route('vendor.view.product', ['id' => $item->product_id]) . '">view info</a></td>
                                        <td width="15%"><a href="' . route('vendor.discount.set', ['id' => $item->product_id]) . '">click here</a></td>
                                       
                                      
                                        
                                        ';


                    if ($item->product_visiblity == "online") {
                        echo ' <td width="10%"><span id="dot-online"></span></td>';
                    } elseif ($item->product_visiblity == "offline") {
                        echo '<td width="10%"><span id="dot-offline"></span></td>';
                    }


                    if ($item->product_visiblity == "online") {
                        echo '<td width="15%"><a style="pointer-events: none;color:green;text-decoration: none;"
                                                   href="' . route('vendor.product.upload.edit', ['id' => $item->product_id]) . '">done
                                                    </a></td>';
                    } elseif ($item->product_visiblity == "offline") {
                        echo '<td width="15%">
                                                <a class="btn btn-primary" href="' . route('vendor.product.upload.edit', ['id' => $item->product_id]) . '">upload
                                                    </a></td>';
                    }


                    echo '


                                        <td width="15%"><a href="'.route('vendor.product.image', ['id' => $item->product_id]).'">view
                                                here</a></td>
                                      
                                        <td width=15%>

                                            <a href="'.route('vendor.product.delete', ['id' => $item->product_id]).'">
                                                <span class="glyphicon glyphicon-trash"
                                                      style="color:#a7a7a7"></span></a>
                                            ||
                                            <a href="'.route('vendor.product.edit', ['id' => $item->product_id]).'"><span
                                                        class="glyphicon glyphicon-pencil" style="color:#a7a7a7"></span></a>

                                        </td>
                                    </tr>
                    
                    
                    
                    ';
                }
            }


        }
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
        $updated_product = DB::table('products')
            ->join('categories', 'products.category_id', '=', 'categories.category_id')
            ->join('brands', 'brands.brand_id', '=', 'products.brand_id')
            ->where('product_id', $id)
            ->get();

        //   dd($updated_product);


        $category = DB::table('categories')->get();
        $brands = DB::table('brands')->get();


        return view('vendor.update_product')
            ->with('update_pro', $updated_product)
            ->with('category', $category)
            ->with('brands', $brands);
    }

    public function editUploadImages($id)
    {

        $v_id = DB::table('products')->where('product_id', $id)->pluck('id')->first();
        $product_name = DB::table('products')->where('product_id', $id)->pluck('product_name')->first();
        //dd($v_id,$product_name);

        return view('vendor.upload_product_img')->with('id', $id)->with('v_id', $v_id)->with('name', $product_name);
    }

    public function editSetDiscount($id)
    {

        $product_info = DB::table('products')->where('product_id', '=', $id)->get();
        return view('vendor.set_discount')->with('id', $id)->with('pro_info', $product_info);
    }


    public function editVendorProduct($id)
    {

        $product_info = DB::table('products')
            ->join('brands', 'brands.brand_id', '=', 'products.brand_id')
            ->join('categories', 'categories.category_id', '=', 'products.category_id')
            ->join('discount', 'discount.product_id', '=', 'products.product_id')
            ->where('products.product_id', '=', $id)
            ->get();
        $product_images = DB::table('product_images')->where('product_images.product_id', '=', $id)->get();


        return view('vendor.edit_product_info')
            ->with('pro_info', $product_info)
            ->with('img', $product_images);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        //


        $b_data = DB::table('brands')->where('brand_name', $request->u_brand_name)
            ->pluck('brand_id')
            ->first();

       // dd($b_data);

        $c_data = DB::table('categories')->where('category_name', $request->u_c_name)
            ->pluck('category_id')
            ->first();

       // dd($c_data);
        $file = $request->file('u_pro_img_up');

        if ($file) {
            $name = $file->getClientOriginalName();
            $file->storeAs('public', $name);
            $url = Storage::url($name);
        } else {
            $value = DB::table('products')->where('product_id', $id)->pluck('product_thumbnail')->first();
            $url = $value;
        }

      //  dd($url);

        // if($$request->file('u_pro_img_up') != null){


        // }else if($file == null){
        //     $value = DB::table('products')->where('product_id',$id)->pluck('product_thumbnail')->first();
        //     $url->$value;
        // }


        //dd($request->u_c_name);

        $update_data = [
            'product_name' => $request->u_pro_name,
            'product_details' => $request->u_pro_desc,
            'product_quantity' => $request->u_pro_qun,
            'product_thumbnail' => $url,
            'product_price' => $request->u_pro_price,
            'discount' => $request->u_offer,
            'brand_id' => $b_data,
            'category_id' => $c_data,
            'product_avg_rating'=>$request->avg_rat


        ];


        // $update_brand_name=[
        //     'brand_id'=>$b_data
        // ];

        // $update_category_name=[
        //     'brand_name'=>$request->u_c_name
        // ];


        DB::table('products')->where('product_id', $id)->update($update_data);

        return redirect()->route('vendor.products');

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

        DB::table('products')->where('product_id', $id)->delete();
        DB::table('product_images')->where('product_id', $id)->delete();

        return redirect()->route('vendor.products');

    }


    public function storeMultipleProductImage(imageUploadRequest $request)
    {


        $file = $request->file('imageUpload');
        // dd($file);

        if ($file == null) {
            return redirect()->back();
        } else {

            foreach ($file as $files) {

                $name = $files->getClientOriginalName();


                $files->storeAs('public', $name);
                $url = Storage::url($name);

                $data = [
                    'product_id' => $request->pro_id,
                    'v_id' => $request->v_id,
                    'product_image' => $url
                ];


                DB::table('product_images')->insert($data);

            }


            $update_status = [
                'product_visiblity' => 'online'
            ];

            DB::table('products')->where('product_id', $request->pro_id)->update($update_status);


            return redirect()->route('vendor.products');

        }

    }


    public function showProductImageUploadPage($id)
    {


        $product_id = $id;

        $product_images = DB::table('product_images')
            ->join('products', 'products.product_id', '=', 'product_images.product_id')
            ->where('product_images.product_id', $id)
            ->get();


        return view('vendor.product_images')
            ->with('id', $product_id)
            ->with('images', $product_images);
    }

    public function updateProductMainImage(Request $request, $id)
    {
        $file = $request->file('u_pro_img');

        if ($file) {

            $name = $file->getClientOriginalName();


            $file->storeAs('public', $name);
            $url = Storage::url($name);
        } else {
            $value = DB::table('product_images')->where('product_id', $id)->pluck('product_image')->first();
            $url = $value;
        }


        $data = [
            'product_id' => $request->u_p_id,
            'product_image' => $url
        ];

        DB::table('product_images')
            ->where('product_id', $id)
            ->where('pro_img_id', $request->u_pro_img_id)
            ->update($data);

        return redirect()->back();
    }
}