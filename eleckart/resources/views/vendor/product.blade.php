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

    <div class="row">
        <div class="col-sm-3">
            <ul id="vendor-navigation" class="nav nav-piles">
                <li><a class="btn btn-primary" href="{{route('vendor.dashboard',['name'=>Auth::user()->name])}}">Dashboard</a></li>
                <li><a class="btn btn-primary" href="{{route('vendor.products')}}">Product</a></li>
                <li><a class="btn btn-primary" href="{{route('vendor.brands')}}">Brands</a></li>

            </ul>
        </div>

        <div class="col-sm-9">
            <div id="container">

                <div class="row">

                    <div class="col-sm-4">
                        <p id="product_title">Products</p>

                    </div>
                    <div class="col-sm-4">
                    </div>
                    <div class="col-sm-4">
                        <a href="{{route('vendor.product.create')}}" id="add_product_btn" class="btn btn-primary hvr-wobble-top">+ add product</a>

                    </div>

                </div>

                <table class="table" id="product_table">
                    <tr>
                        <td><strong>product name</strong></td>
                        <td><strong>product price</strong></td>
                        <td><strong>product in stock</strong></td>
                        <td><strong>visiblity</strong></td>
                        {{-- <td><strong>upload pics</strong></td>
                        <td><strong>view product images</strong></td> --}}
                        <td><strong>actions</strong></td>
                    </tr>


                  {{-- {{dd($pro)}}   --}}
                  @foreach($pro as $item)

                        <tr>
                            <td>{{$item->product_name}}</td>
                        <td>{{$item->product_price}}</td>
                        <td>{{$item->product_quantity}}</td>
                            <td>
                                @if($item->product_visiblity == "online")
                                <span class="glyphicon glyphicon-stop" style="color: #1ec842;border-radius:100%"></span>
                                @elseif($item->product_visiblity == "offline")
                                <span class="glyphicon glyphicon-stop" style="color: #ff463c"></span>

                                @endif
                                
                            </td>

                           
                        {{-- <td><a href="{{route('vendor.product.image',['id'=>$item->product_id])}}">upload images</a></td> --}}
                        {{-- <td><a href="">view images</a></td> --}}
                            <td>

                                <a href="{{route('vendor.product.delete',['id'=>$item->product_id])}}"> <span class="glyphicon glyphicon-trash" style="color:#a7a7a7"></span></a>
                                ||
                            <a href="{{route('vendor.product.edit',['id'=>$item->product_id])}}"><span class="glyphicon glyphicon-pencil" style="color:#a7a7a7"></span></a>

                            </td>
                        </tr>
                        @endforeach
    
                </table>

            </div>

        </div>

    </div>

@endsection