@extends('layouts.default')
@include('layouts.design')

@section('title')
    vendor product
@endsection

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection


@section('content-for-other-page')
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
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="container">
                                    <p id="product_title">Set Discount</p>
                                </div>
                            </div>

                        </div>


                    </div>
                    <div class="panel-body">
                        <div id="container">


                @foreach($pro_info as $product)

                            <h3>{{$product->product_name}}</h3>
                                <br>

                            <form class="form-inline" action="{{route('vendor.discount',['id'=>$id])}}" method="post">
                                {{csrf_field()}}
                                <div class="form-group">
                                    <input type="number" name="disc" class="form-control" value="{{$product->discount}}" required>

                                </div>
                                <div class="form-group">
                                    <input type="submit" class="btn btn-primary" value="set discount">

                                </div>
                                {{--<input type="text" name="p_id" value="{{$id}}" hidden>--}}
                            </form>
                @endforeach

                        </div>

                    </div>
                </div>


            </div>

        </div>
    </div>

@endsection
