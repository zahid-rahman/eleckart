@extends('layouts.default')
@include('layouts.design')

@section('title')
    vendor dashboard
@endsection

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

@section('content-for-other-page')
    {{-- {{$check}} --}}



            <div class="container">
                <div class="row">
                    <div class="col-sm-3">
                        <ul id="vendor-navigation" class="nav nav-piles">
                            <li><a class="btn btn-primary" href="{{route('vendor.dashboard',['name'=>Auth::user()->name])}}">Dashboard</a>
                            </li>
                            <li><a class="btn btn-primary" href="{{route('vendor.products')}}">Product</a></li>
                            <li><a class="btn btn-primary"
                                   href="{{route('vendor.profile.setting',['name'=>Auth::user()->id])}}">profile setting</a>
                            </li>

                        </ul>
                    </div>

                    <div class="col-sm-9">


                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <div class="container">
                                    <p id="sales_rev_title">

                                        @foreach($pro_info as $item)
                                            {{$item->product_name}}
                                            @endforeach
                                    </p>
                                </div>
                            </div>
                            <div class="panel-body">

                                <div class="container">
                                    @foreach($pro_info as $item)

                                        {{--<label style="font-size:20px" for="">Product thumbnail</label><br>--}}
                                        <a href="{{$item->product_thumbnail}}" target="_blank"><img class="img-responsive" src="{{$item->product_thumbnail}}" alt=""></a>
                                        <br>
                                        <br>

                                        <label style="font-size:20px" for="com_name">Product multiple images</label><br>
                                        <br>

                                    @foreach ($img as $image)
                                            {{-- <div >
                                                 <img id="product_images" src="{{$item->product_image}}" alt="">

                                            </div> --}}

                                            <div id="banner" style="overflow: hidden; display: inline-block; justify-content:space-around;">
                                                <div class="">

                                                    <div class="container_img">
                                                        <a id="image_link" target="_blank" href="{{$image->product_image}}">   <img src ="{{$image->product_image}}" class="image_pro" style="height:120px;width:120px; "></a>

                                                        {{-- <img src="img_avatar.png" alt="Avatar" class="image" style="width:100%"> --}}

                                                    </div>

                                                </div>


                                            </div>
                                        @endforeach
                                        <br>
                                        <br>

                                        <label style="font-size:20px" for="com_name">Product brand</label><br>
                                        <p>{{$item->brand_name}} </p>
                                        <br>
                                        <br>

                                        <label style="font-size:20px" for="com_name">category name</label><br>
                                        <p>{{$item->category_name}} </p>
                                        <br>
                                        <br>



                                        <label style="font-size:20px" for="com_name">Product Price</label><br>
                                        <p>{{$item->product_price}} BDT</p>
                                        <br>
                                        <br>

                                        <label style="font-size:20px" for="com_name">Product details</label><br>
                                        <p style="width:70%;word-break:break-all;">{{$item->product_details}}</p>
                                        <br>
                                        <br>

                                        <label style="font-size:20px" for="com_name">Product quantity</label><br>
                                        <p>{{$item->product_quantity}} </p>
                                        <br>
                                        <br>

                                        @if($item->discount > 0)
                                        <label style="font-size:20px" for="com_name">Product discount</label><br>
                                        <p>{{$item->discount}} %</p>
                                        <br>
                                        <br>
                                        @elseif($item->discount == 0)
                                        <label style="font-size:20px" for="com_name">Product discount</label><br>
                                        <p>no discount</p>
                                        <br>
                                        <br>

                                        @endif

                                        <label style="font-size:20px" for="com_name">Product visiblity</label><br>
                                        @if($item->product_visiblity == "online")
                                        <p class="badge badge-success" style="background: green">{{$item->product_visiblity}} </p>
                                        <br>
                                        <br>
                                        @else
                                        <p class="badge badge-danger">{{$item->product_visiblity}} </p>
                                        <br>
                                        <br>
                                        @endif


                                    @endforeach
                                </div>


                            </div>
                        </div>


                    </div>

                </div>
            </div>



@endsection