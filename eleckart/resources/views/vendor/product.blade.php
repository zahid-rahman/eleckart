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
                <li><a class="btn btn-success" href="{{route('vendor.dashboard')}}">Dashboard</a></li>
                <li><a class="btn btn-success" href="{{route('vendor.products')}}">Product</a></li>
                <li><a class="btn btn-success" href="{{route('vendor.brands')}}">Brands</a></li>

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
                        <td><strong>actions</strong></td>
                    </tr>

                    @for($i=0;$i<4;$i++)
                        <tr>
                            <td>Xiaomi A2</td>
                            <td>14000 BDT</td>
                            <td>10</td>
                            <td><span class="glyphicon glyphicon-stop" style="color: #1ec842;border-radius:100%"></span>
                            </td>
                            <td>

                                <a href=""> <span class="glyphicon glyphicon-trash" style="color:#a7a7a7"></span></a>
                                ||
                                <a href=""><span class="glyphicon glyphicon-pencil" style="color:#a7a7a7"></span></a>

                            </td>
                        </tr>
                    @endfor

                    <tr>
                        <td>Xiaomi A2</td>
                        <td>14000 BDT</td>
                        <td>10</td>
                        <td><span class="glyphicon glyphicon-stop" style="color: #ff463c"></span></td>
                        <td>

                            <a href=""> <span class="glyphicon glyphicon-trash" style="color:#a7a7a7"></span></a>
                            ||
                            <a href=""><span class="glyphicon glyphicon-pencil" style="color:#a7a7a7"></span></a>

                        </td>
                    </tr>

                </table>

            </div>

        </div>

    </div>

@endsection