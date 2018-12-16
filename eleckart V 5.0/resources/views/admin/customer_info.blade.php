@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Customer
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



                    <div class="col-sm-9">
                            <div id="container">

                                    @foreach($data as $customer_info)
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                                <div class="panel-heading">
                                                        <div class="container">
                                                            <h2> {{$customer_info->name}}</h2>
                                                        </div>
                                                </div>

                                                <div class="panel-body">
                                                       <div class="container">
                                                        <label style="font-size:20px" for="com_name">Email</label><br>
                                                        {{$customer_info->email}}
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="">Phone Number</label><br>
                                                        {{$customer_info->phone_number}}
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="add">Address</label><br>
                                                       {{$customer_info->address}}
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="approval">Approval Status</label><br>
                                                        @if($customer_info->approval == "online")
                                                            <span class="badge badge-default" style="background:#00b33c;">{{$customer_info->approval}}</span>
                                                        @elseif($customer_info->approval == "offline")
                                                            <span class="badge badge-default" style="background:#dba069;">{{$customer_info->approval}}</span>
                                                       
                                                        @endif    
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="as_br">Total completed orders </label><br>
                                                        <span class="badge badge-default">{{$tot_o}}</span>
                                                        <br>
                                                        <br>

                                                        <label style="font-size:20px" for="as_br">Total delivered orders </label><br>
                                                        <span class="badge badge-default"  style="background:#00b33c;">{{$tot_d_o}}</span>
                                                        <br>
                                                        <br>


                                                        <label style="font-size:20px" for="as_br">Total shipping orders </label><br>
                                                        <span class="badge badge-default" style="background:tomato;">{{$tot_s_o}}</span>
                                                        <br>
                                                        <br>

                                                        <label style="font-size:20px" for="as_br">Total claimed orders </label><br>
                                                        <span class="badge badge-default" style="background:#e60000;">{{$tot_c_o}}</span>
                                                        <br>
                                                        <br>

                                                       
                                                </div>
                                        </div>
                                           
                                    </div>
                                    @endforeach
                            </div>
                    </div>
            </div> 
    </div>
@endsection