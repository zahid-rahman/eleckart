@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Order
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
                            <li><a class="btn btn-primary" href="">product</a></li>
                            <li><a class="btn btn-primary" href="">customer</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.categories')}}">categories</a></li>
                            <li><a class="btn btn-primary" href="{{route('admin.brands')}}">brands</a></li>
                            <li><a class="btn btn-primary" href="">Notifications</a></li>
                            <li><a class="btn btn-primary" href="">reports</a></li>

                        </ul>
                    </div>
            
                    <div class="col-sm-9">
                        <div id="container">
            
                                <div class="panel-group">
                                        <div class="panel panel-default">
                                          <div class="panel-heading">
                                              <strong><h2>Order Shipping</h2></strong>
                                            </div>
                                            <div class="panel-body">

                                               <p>Press yes button for changing status to shipping</p>
                                               

                                               <form action="{{route('admin.order.shipping',['token'=>$token])}}" method="post">
                                                   <input type="submit" class="btn btn-success" value="yes">
                                                    <a href="{{route('admin.orderdeliver')}}" class="btn btn-danger">no</a>
                                               </form>
                                                    
                                            
                                            
                                            </div>
                                        </div>
            
                         
            
                        </div>
            
                    </div>
            
                </div>
    </div>



   

@endsection



