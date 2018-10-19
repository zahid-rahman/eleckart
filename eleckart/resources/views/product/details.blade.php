@extends('layouts.default')
@include('layouts.design')

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

{{--page title--}}
@section('title')
    product name
@endsection

@section('content1')
    <div class="product_details_section">
        <div class="row">
            <div class="col-sm-6">
                <div class="product_image">


                    <div class="exzoom" id="exzoom">
                        <!-- Images -->
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>

                                @foreach($product_img as $pics)
                                    <li><img style="background: #ffffff;" src="{{$pics->product_thumbnail}}"/></li>
                                @endforeach
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}

                            </ul>
                        </div>
                        <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                        <div class="exzoom_nav"></div>
                        <!-- Nav Buttons -->
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>


                </div>

            </div>
            <div class="col-sm-6">

               @foreach($product_details as $details)
                <div class="product_details">
                    {{--<h2><strong>Product name</strong></h2>--}}
                    {{--<h4>brand name</h4>--}}
                    {{--{{$product_details}}--}}

                    {{--<hr>--}}

                    {{--<h5>price : 0.00 BDT</h5>--}}
                    {{--<h5>discount : 0%</h5>--}}
                    {{--<p id="simple_title"><strong>Details</strong></p>--}}
                    {{--<p id="description">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>--}}

                    <h2><strong>{{$details->product_name}}</strong></h2>
                    <h4 id="brand_name">{{$details->brand_name}}</h4>

                    <hr>

                    <h5>price : {{$details->product_price}} BDT</h5>
                    <h5>discount : 0%</h5>
                    <p id="simple_title"><strong>Details</strong></p>
                    <p id="description"> {{$details->product_details}}</p>

                    <div class="addtocart">
                        <div class="btn btn-success hvr-wobble-top" id="add_to_cart"> <a href="#" ><span class="glyphicon glyphicon-shopping-cart"></span> add to cart</a> </div>
                    </div>

                </div>

                   @endforeach





            </div>
        </div>
    </div>



    {{--<script>--}}
        {{--$(function () {--}}

            {{--$("#exzoom").exzoom({--}}
                {{--// options here--}}
                {{--"autoPlay": false--}}

            {{--});--}}

        {{--});--}}
    {{--</script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
    {{--<script src="../js/jquery.exzoom.js"></script>--}}


@endsection




