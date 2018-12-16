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
                                              <strong><h2>Order Shipping</h2></strong>
                                            </div>
                                            <div class="panel-body">

                                               <p>Press yes button for changing status to shipping</p>
                                               
                                               @foreach ($brands as $item)
                                                    
                                                    <form class="form-inline" action="{{route('admin.brands.update',['id'=>$item->brand_id])}}" method="POST">
                                                        <div class="form-group">
                                                        {{-- <input type="text" class="form-control" placeholder="enter category name" name="c_id" style="width:200%" value="{{$item->category_id}}" hidden> --}}
                                                            
                                                        <input type="text" class="form-control" name="u_b_name" style="width:200%" value="{{$item->brand_name}}" required>
                                                        </div>

                                                     
                                                    
                                                        <button style="margin-left:200px" type="submit" class="btn btn-primary hvr-wobble-top">update</button>
                                                        <a href="{{route('admin.brands')}}" class="btn btn-danger">no</a>

                                                     
                                                    </form>   

                                               @endforeach     
                                               
                                                    
                                            
                                            
                                            </div>
                                        </div>
            
                         
            
                        </div>
            
                    </div>
            
                </div>
    </div>



   

@endsection



