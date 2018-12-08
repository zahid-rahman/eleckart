@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Product Details
@endsection
{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="custom_css/style.css">
@endsection


@section('content-for-other-page')


    <div class="container">
            <div class="row">
                    <div class="col-sm-3">
                            <ul id="vendor-navigation" class="nav nav-piles">
                                <li><a class="btn btn-primary" href="{{route('admin')}}">Dashboard</a></li>
                                <li><a class="btn btn-primary" href="{{route('admin.vendor')}}">Vendors</a></li>
                                <li><a class="btn btn-primary" href="{{route('admin.order')}}">shipping order</a></li>
                                <li><a class="btn btn-primary" href="{{route('admin.orderdeliver')}}">delivered order</a></li>
                                <li><a class="btn btn-primary" href="{{route('admin.claimed.order')}}">claimed order</a></li>                               
                                <li><a class="btn btn-primary" href="{{route('admin.product')}}">product</a></li>
                                <li><a class="btn btn-primary" href="{{route('admin.customer')}}">customer</a></li>
                                <li><a class="btn btn-primary" href="{{route('admin.categories')}}">categories</a></li>
                                <li><a class="btn btn-primary" href="{{route('admin.brands')}}">brands</a></li>
                                <li><a class="btn btn-primary" href="{{route('admin.feedback')}}">feedback</a></li>
        
                                </ul>
                    </div>



                    <div class="col-xs-9">
                            <div id="container">

                                    @foreach($data as $product_info)
                                    {{-- <div class="panel-group"> --}}
                                        <div class="panel panel-primary">
                                                <div class="panel-heading">
                                                        <div class="container">
                                                            <h2> {{$product_info->product_name}}</h2>
                                                        </div>
                                                </div>

                                                <div class="panel-body">
                                                       <div class="container" >
                                                        <label style="font-size:20px" for="com_name">Vendor Company Name</label><br>
                                                        <p>{{$product_info->name}}</p>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="com_name">Details</label><br>
                                                            <p style="width:70%;word-break:break-all;">
                                                                {{$product_info->product_details}}

                                                            </p>

                                                           
                                                 
                                                        <br>
                                                        <br>
                                                        <br>
                                                       
                                                        <label style="font-size:20px" for="">Product thumbnail</label><br>
                                                       <a href="{{$product_info->product_thumbnail}}" target="_blank"><img class="img-responsive" src="{{$product_info->product_thumbnail}}" alt=""></a> 
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="add">Product quantity</label><br>
                                                        <span class="badge badge-default">{{$product_info->product_quantity}}</span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="approval">Approval Status</label><br>
                                                        @if($product_info->product_visiblity == "online")
                                                            <span class="badge badge-default" style="background:#6dd69c;">{{$product_info->product_visiblity}}</span>
                                                        @elseif($product_info->product_visiblity == "offline")
                                                            <span class="badge badge-default" style="background:#e60000;">{{$product_info->product_visiblity}}</span>
                                                        
                                                        @endif    
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="as_br">Product Price</label><br>
                                                        <span class="badge badge-default">{{$product_info->product_price}} BDT</span>
                                                        <br>
                                                        <br>

                                                        <label style="font-size:20px" for="as_br"> Brands Name</label><br>
                                                        <span class="badge badge-default">{{$product_info->brand_name}}</span>
                                                        <br>
                                                        <br>

                                                        <label style="font-size:20px" for="as_br">Category Name</label><br>
                                                        <span class="badge badge-default">{{$product_info->category_name}}</span>
                                                        <br>
                                                        <br>

                                                        <label style="font-size:20px" for="as_br">Product images</label><br>
                                                        @foreach ($images as $item)
                                                        {{-- <div >
                                                             <img id="product_images" src="{{$item->product_image}}" alt="">
 
                                                        </div> --}}
 
                                                        <div id="banner" style="overflow: hidden; display: inline-block; justify-content:space-around;">
                                                             <div class="">

                                                                    <div class="container_img">
                                                                 <img src ="{{$item->product_image}}" class="image_pro" style="height:120px;width:120px; ">
                                                                            {{-- <img src="img_avatar.png" alt="Avatar" class="image" style="width:100%"> --}}
                                                                            <div class="middle_part">
                                                                              <button class="btn btn-danger del_button">
                                                                                   <span class="glyphicon glyphicon-trash hvr-wobble-top"  style="color:#ffffff"></span>

                                                                              </button>
                                                                             
                                                                            
                                                                              
                                                                              <a id="image_link" href="{{$item->product_image}}" target="_blank" id="edit button" class="btn btn-primary">
                                                                                    <span class="glyphicon glyphicon-edit hvr-wobble-top"  style="color:#ffffff"></span>

                                                                              </a>
                                                                            </div>
                                                                          </div>

                                                             </div>
                                                     
                                                           
                                                         </div>
                                                        @endforeach
                                                       </div>

                                                     

                                                </div>

                                                      
                                        </div>
                                           
                                    {{-- </div> --}}
                                    @endforeach
                            </div>
                    </div>
            </div> 
    </div>
@endsection