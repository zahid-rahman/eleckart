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

   <div class="container">  
        <div class="row">
                <div class="col-sm-3">
                    <ul id="vendor-navigation" class="nav nav-piles">
                        <li><a class="btn btn-primary" href="{{route('vendor.dashboard',['name'=>Auth::user()->name])}}">Dashboard</a></li>
                        <li><a class="btn btn-primary" href="{{route('vendor.products')}}">Product</a></li>
                        <li><a class="btn btn-primary" href="{{route('vendor.brands')}}">orders</a></li>
        
                    </ul>
                </div>
        
                <div class="col-sm-9">
                    <div id="container">
                            <div class="panel-group">
                                    <div class="panel panel-default">
                                      <div class="panel-heading">
                                            <p id="product_title">Orders</p>
                                      </div>
                                      <div class="panel-body">Panel Content</div>
                                    </div>
                            </div>
                </div>
        
            </div>
        
   </div>



@endsection