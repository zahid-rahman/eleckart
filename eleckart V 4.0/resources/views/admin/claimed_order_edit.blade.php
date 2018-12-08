@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-claimed order edit
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
                                              <strong><h2>Order issue confirmation</h2></strong>
                                            </div>
                                            <div class="panel-body">

                                               <p>Press yes button if only the order has some issues</p>
                                               

                                               <form action="{{route('admin.order.claimed',['token'=>$token])}}" method="post">
                                                   <input type="submit" class="btn btn-success" value="yes">
                                                    <a href="{{route('admin.order')}}" class="btn btn-danger">no</a>
                                               </form>
                                                    
                                            
                                            
                                            </div>
                                        </div>
            
                         
            
                        </div>
            
                    </div>
            
                </div>
    </div>
 

@endsection



