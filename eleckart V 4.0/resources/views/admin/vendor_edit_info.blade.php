@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Vendor
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

                                    @foreach($data as $vendor_info)
                                    <div class="panel-group">
                                        <div class="panel panel-default">
                                                <div class="panel-heading">
                                                        <div class="container">
                                                            <h2> {{$vendor_info->com_name}}</h2>
                                                        </div>
                                                </div>

                                                <div class="panel-body">
                                                       <div class="container">
                                                        <label style="font-size:20px" for="com_name">Email</label><br>
                                                        <span class="badge badge-default">{{$vendor_info->email}}</span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="">Phone Number</label><br>
                                                        <span class="badge badge-default">{{$vendor_info->phone_number}}</span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="add">Address</label><br>
                                                        <span class="badge badge-default">{{$vendor_info->address}}</span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="approval">Approval Status</label><br>
                                                        @if($vendor_info->approval == "approve")
                                                            <span class="badge badge-default" style="background:#6dd69c;">{{$vendor_info->approval}}</span>
                                                        @elseif($vendor_info->approval == "pending")
                                                            <span class="badge badge-default" style="background:#dba069;">{{$vendor_info->approval}}</span>
                                                        @elseif($vendor_info->approval == "ban")
                                                            <span class="badge badge-default" style="background:#d84b4b;">{{$vendor_info->approval}}</span>
                                                        @endif    
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="as_br">Total assosiated brands</label><br>
                                                        <span class="badge badge-default">{{$tot_b}}</span>
                                                        <br>
                                                        <br>

                                                        <label style="font-size:20px" for="as_br">Assosiated Brands Name</label><br>
                                                        @if(count($b_name) == 0)
                                                        <span class="badge badge-success" style="background:#d84b4b;">no assosiated brands</span>

                                                        @else
                                                        @foreach ($b_name as $item)
                                                             
                                                            <span class="badge badge-success" style="background:#66c490;">{{$item->brand_name}}</span>
                                                        @endforeach
                                                        @endif
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="approval">Total Product</label><br>
                                                        <span class="badge badge-default">{{$pro_count}}</span>
                                                        <br>
                                                        <br>
                                                        <label style="font-size:20px" for="approval">Total Publish Product</label><br>
                                                        <span class="badge badge-default">{{$pro_pub_count}}</span>
                                                       </div>
                                                </div>
                                        </div>
                                           
                                    </div>
                                    @endforeach
                            </div>
                    </div>
            </div> 
    </div>
@endsection