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

           <p hidden>{{$check = DB::table('carts')->get()}} </p>




            @foreach($product_cat as $item)

                @if($item->product_visiblity == "online")
                    <div class="col-sm-4 product_card">

                        <a href="{{route('product.product-detials',['id'=>$item->product_id])}}"><img
                                    src="{{$item->product_img}}" alt="Avatar" style="width:100%">
                        </a>
                        <h4><b>{{$item->product_name}}</b></h4>
                        <p>price : {{$item->product_price}} BDT</p>

                        {{--s--}}
                        @if(Auth::check())

                            {{--<p hidden>--}}
                                {{--{{$check_qun = DB::table('products')->where('product_id',$item->product_id)->get()}}--}}
                            {{--</p>--}}

                            @if(session()->has('outofstock'))

                                <div class="alert alert-danger">
                                    {{session()->get('outofstock')}}
                                </div>
                            @else

                                <form action="{{route('cart.add')}}">

                                    {{csrf_field()}}

                                    <div class="form-group">
                                        <input style="display: none" name="u_id" value="{{Auth::user()->id}}" hidden>

                                    </div>
                                    <div class="form-group">
                                        <input style="display: none" name="p_id" value="{{$item->product_id}}" hidden>
                                    </div>
                                    <div class="form-group">
                                        {{-- editor --}}
                                        <input style="display: none" name="p_qun"  hidden>
                                    </div>

                                    <div class="form-group">
                                        {{-- editor --}}
                                        <input style="display: none" name="t_price" value="{{$item->product_price}}" hidden>
                                    </div>



                                    <input type="submit" class="btn btn-danger hvr-wobble-top" value="add to cart">

                                </form>
                            @endif


                            {{--@endif--}}


                        @else
                            {{--<div class="alert alert-danger">--}}
                                {{--<p>log in required</p>--}}
                            {{--</div>--}}


                        <!-- Button trigger modal -->
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#myModal">
                                add to cart
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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




                        @endif

                        {{--<a class="btn btn-danger hvr-wobble-top"><span--}}
                                    {{--class="glyphicon glyphicon-shopping-cart"></span>--}}
                        {{--</a>--}}
                        <br>
                    </div>
                @endif



            @endforeach


        </div>
    </div>


@endsection
