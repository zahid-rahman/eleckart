@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Order delete
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
                                @foreach($data as $order_data)
                               
                                            <div class="panel panel-default">
                                         
                                                    <div class="panel-body">
        
                                                     
                                                      {{-- <h2>{{$order_data->email}}</h2> --}}
                                                      <h2>{{$order_data->name}}</h2>
                                                      <p style="color:red">wanna cancle this order ?</p>
        
                                                        <form action="{{route('admin.order.delete',['token'=>$token])}}" method="post">
                                                            
                                                            <button type="submit" class="btn btn-success">yes</button>
                                                            <a href="{{route('admin.order')}}" class="btn btn-danger">no</a>    
                                                        </form>
        
                          
                                                     
                                                    </div>
                                                       
                                                </div>
    

            
                                @endforeach
            
                        </div>
            
                    </div>
            
                </div>
    </div>

 
   

@endsection



