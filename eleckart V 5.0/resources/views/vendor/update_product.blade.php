@extends('layouts.default')
@include('layouts.design')

@section('title')
    create product
@endsection
{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">

@endsection

@section('content-for-other-page')
    <div class="container">
        <h3>Update Product</h3>
        {{-- <label for="ttile" class="alert alert-warning">
            Warning
    <marquee style="" behavior="float" direction=""> Before uploading your product please ensure your product picture size</marquee>

        </label> --}}

        {{-- <div class="panel panel-info">
            <div class="panel-heading" style="text-align:center;background:#F2DEDE;color:#A94442;border:none ">
                <b>Warning!!!</b>
                <marquee style="" behavior="float" direction=""> Before uploading your product please ensure your product picture size by using photoshop</marquee>
            </div> --}}




        <br>
        <br>
        @foreach($update_pro as $item)

            <form action="{{route('vendor.product.update',['id'=>$item->product_id])}}" method="POST" enctype="multipart/form-data">
                {{-- product name --}}
                <div class="form-group">
                    <label>Product title</label>
                    <input type="text" class="form-control" name="u_pro_name" placeholder="Product name/Product title" value="{{$item->product_name}}">
                </div>




                {{-- product details    --}}
                <div class="form-group">
                    <label>Product details</label>
                    <textarea class="form-control" name="u_pro_desc" id="product_details" height="50%" placeholder="Product details" >{{$item->product_details}}</textarea>
                </div>



                {{-- product solo thumbnail --}}

                <div class="form-group">



                    {{-- <label id="custom_upload_update">
                            <img style="background: #ffffff;" src="{{$item->product_thumbnail}}"/>
                        <input type="file" name="pro_img_up" id="exampleInputFile" size="60" >
                    </label>    --}}

                    {{--
                                        <div class="container_update_image">
                                                <img src="" alt="Avatar" class="product_image_update" style="width:100%">
                                                <div class="middle_part">
                                                        <input class="button" type="file" name="pro_img_up" id="exampleInputFile" size="60" >
                                                </div>
                                        </div> --}}
                    <label>Product thumbnail </label>
                    <div class="container_up">
                        <img src="{{$item->product_thumbnail}}" alt="Avatar" class="image_pro" style="width:100%">
                        <div class="middle_part">
                            {{-- <div class="">John Doe</div> --}}
                            <label id="custom_upload_update">
                                update picture
                                <input type="file" class="form-control" name="u_pro_img_up" id="exampleInputFile" size="60" default="0">
                            </label>
                        </div>
                    </div>
                </div>



                {{-- product quantity --}}

                <div class="form-group">
                    <label>Product quantity</label>
                    <input type="number" min ="1" class="form-control" name="u_pro_qun" placeholder="product quantity" value="{{$item->product_quantity}}">
                </div>


                {{-- product price --}}
                <div class="form-group">
                    <label>Product price</label>
                    <input type="number" min ="1" class="form-control" name="u_pro_price" placeholder="product price" value="{{$item->product_price}}" >
                    <input type="number" min ="1" class="form-control" name="avg_rat" placeholder="product price" value="{{$item->product_avg_rating}}" style="display:none">

                </div>


                {{-- choose brand name for brand id --}}
                <div class="form-group">
                    <label>Choose your expected brand</label>
                    <select id="brand_names" name="u_brand_name" value="{{$item->brand_name}}">

                        {{-- <p hidden>
                            {{$brands = DB::table('brands')->get()}}
                        </p> --}}


                        @foreach($brands as $value)
                            @if($item->brand_name == $value->brand_name)
                                <option id="brands" selected>{{$value->brand_name}}</option>
                            @else
                                <option id="brands" >{{$value->brand_name}}</option>

                            @endif
                        @endforeach

                    </select>




                </div>

                {{-- offer against products --}}

                <div class="form-group">
                    <label>Product discount</label>
                    <input type="number" min ="0" class="form-control" name="u_offer" placeholder="discount" value="{{$item->discount}}" style="display:none">
                </div>




                {{-- choose categories for getting the category id --}}
                <div class="form-group">
                    <label>Choose your expected category</label>
                    <select id="brand_names" name="u_c_name" value="{{$item->category_name}}">

                        {{-- <p hidden>
                            {{$brands = DB::table('brands')->get()}}
                        </p> --}}


                        @foreach($category as $value)
                            @if($item->category_name == $value->category_name)
                                <option id="brands" selected>{{$value->category_name}}</option>
                            @else
                                <option id="brands" >{{$value->category_name}}</option>

                            @endif
                        @endforeach

                    </select>




                </div>



                <div class="form-group">
                    <input style="display: none" type="text"  class="form-control" name="v_id" placeholder="product price" value="{{Auth::user()->id}}">
                </div>


                <button type="submit" class="btn btn-primary hvr-wobble-top" data-toggle="modal" data-target="#myModal">Update information</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Alert</b></h4>
                            </div>
                            <div class="modal-body">
                                <p style="color:#2dd280"><b>Product updated successfully</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
            </form>

            {{-- {{dd($item->product_thumbnail)}} --}}


        @endforeach

        {{--
                <form action="">
                    <div class="cotnainer">
                        <div class="form-horizontal">
                                <div class="form-group">
                                <label class="control-label col-md-3">Upload Image</label>
                                <div class="col-md-8">
                                    <div class="row">
                                    <div id="demo"></div>
                                    </div>
                                </div>
                                </div>
                                <div class="form-group">
                                <label class="control-label col-md-3"></label>
                                <div class="col-md-8">
                                    <input type="submit" class="btn btn-primary" value="Send">
                                </div>
                                </div>
                        </div>

                    </div>
                </form> --}}



    </div>






@endsection