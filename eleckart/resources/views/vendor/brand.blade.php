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
                brand
            </div>
        </div>

    </div>




@endsection