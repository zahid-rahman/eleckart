@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Shipping Order
@endsection

@section('content1')
    


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
            
                                <div class="panel-group">
                                        <div class="panel panel-default">
                                          <div class="panel-heading">
                                              <strong><h2>Order</h2></strong>
                                            </div>
                                            <div class="panel-body">

                                                @foreach ($order_details as $item)
                                                <div class="container">
                                                        <label style="font-size:20px" for="com_name">Email</label><br>
                                                        <span class="badge badge-default hvr-wobble-top">{{$item->email}}</span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="">Phone Number</label><br>
                                                        <span class="badge badge-default hvr-wobble-top">{{ $item->phone_number}}</span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="add">Address</label><br>
                                                        <span class="badge badge-default hvr-wobble-top"> {{$item->recipient_address}}
                                                        </span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="approval">Order Status</label><br>
                                                            @if($item->status == "delivered")
                                                            <span class="badge badge-default hvr-wobble-top" style="background:#6dd69c;">{{$item->status}}</span>
                                                            @elseif($item->status == "shipping")
                                                            <span class="badge badge-default hvr-wobble-top" style="background:#d84b4b;">{{$item->status}}</span>
                                                            @elseif($item->status == "claimed")
                                                            <span class="badge badge-default hvr-wobble-top" style="background:#e60000;">{{$item->status}}</span>
                                                            {{-- <span class="badge badge-default" style="background:#dba069;">2</span> --}}
                                                            @endif
                                                       
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="as_br">Total price</label><br>
                                                    <span class="badge badge-default hvr-wobble-top">{{ $item->total_price }} BDT</span>
                                                        <br>
                                                        <br>

                                                        <label style="font-size:20px" for="as_br">Products Name</label><br>
                                                        
                                                        {{-- <span class="badge badge-success" style="background:#d84b4b;">no assosiated brands</span> --}}

                                                      
                                                            @foreach ($pro_details as $item)
                                                              <span class="badge badge-success hvr-wobble-top" style="background:#990073;"> {{ $item->product_name}}

                                                               <span class="badge badge-success" style="background: #0000cc;">{{$item ->ordered_product_quantity}}</span>
                                                            </span>
                                                            @endforeach
                                                             
                                                           
                                                       
                                                      
                                                        {{-- <br>
                                                        <br>
                                                        <label style="font-size:20px" for="approval">Total Product</label><br>
                                                        <span class="badge badge-default">1</span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="approval">Total Publish Product</label><br>
                                                        <span class="badge badge-default">1</span> --}}
                                                       </div>
                                        
                                        
                                                @endforeach
                                                    
                                            
                                            
                                            </div>
                                        </div>
            
                         
            
                        </div>
            
                    </div>
            
                </div>
    </div>



   

@endsection



