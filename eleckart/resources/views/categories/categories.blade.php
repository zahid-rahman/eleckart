@extends('layouts.default')
@include('layouts.design')

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

{{--page title--}}
@section('title')
    categories
@endsection


@section('content-for-other-page')



    {{--<div class="product_card">--}}
    {{--<img src="img/product_img/beats (3).jpg" alt="Avatar" style="width:100%">--}}
    {{--<div class="product_container">--}}
    {{--<h4><b>John Doe</b></h4>--}}
    {{--<p>Architect & Engineer</p>--}}

    {{--<button class="btn btn-success hvr-wobble-top">add to cart</button>--}}
    {{--</div>--}}
    {{--</div>--}}

    {{--<div class="thumbnail">--}}
    {{--<img src="img/product_img/beats (3).jpg" alt="Avatar" style="width:100%">--}}
    {{--</div>--}}
    {{--<div class="caption">--}}
    {{--<h4><b>John Doe</b></h4>--}}
    {{--<p>Architect & Engineer</p>--}}

    {{--<button class="btn-btn-success">add to cart</button>--}}

    {{--</div>--}}


    <div class="container">

        <h2>{{$cat_name->category_name}}</h2>


        <p>total product ({{$total_product}})</p>


        <div class="row">


            {{--{{dd($product_cat)}}--}}


            @foreach($product_cat as $item)

                @if($item->product_visiblity == "online")
                    <div class="col-sm-4 product_card">

                        <a href="{{route('product.product-detials',['id'=>$item->product_id])}}"><img
                                    src="{{$item->product_img}}" alt="Avatar" style="width:100%">
                        </a>
                        <h4><b>{{$item->product_name}}</b></h4>
                        <p>price : {{$item->product_price}} BDT</p>
                        <button class="btn btn-danger hvr-wobble-top"><span
                                    class="glyphicon glyphicon-shopping-cart"></span> add to cart
                        </button>
                        <br>
                    </div>
                @endif



            @endforeach


        </div>
    </div>


@endsection
