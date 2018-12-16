@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-product visiblity
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
                                @foreach($data as $product_operation)

                               
                                <div class="panel-group">
                                        <div class="panel panel-default">
                                         
                                            @if($product_operation->product_visiblity == "online")
                                            <div class="panel-body">

                                             
                                              <h2>{{$product_operation->product_name}}</h2>
                                              <p color="red">wanna offline this product ?</p>
                                                    {{ csrf_field() }}
                                                    <form action="{{route('admin.product.offline',['id'=>$product_operation->product_id])}}" method="post">
                                                        <button type="submit" class="btn btn-success">yes</button>
                                                        <a href="{{route('admin.product')}}" class="btn btn-danger">no</a>    
                                                    </form> 

                      
                                             
                                            </div>
                                            @elseif($product_operation->product_visiblity == "offline")
                                            <div class="panel-body">

                                             
                                                    <h2>{{$product_operation->product_name}}</h2>
                                                    <p color="red">wanna online this product ?</p>
                                                          {{ csrf_field() }}
                                                          <form action="{{route('admin.product.online',['id'=>$product_operation->product_id])}}" method="post">
                                                              <button type="submit" class="btn btn-success">yes</button>
                                                              <a href="{{route('admin.product')}}" class="btn btn-danger">no</a>    
                                                          </form> 
      
                            
                                                   
                                                  </div>
                                            @endif      
                                               
                                        </div>
                                       
                               
            
                        </div>

                        @endforeach
            
                    </div>
            
                </div>
    </div>

  <script>
    // $('#myModalBan').removeData("modal").modal({backdrop: 'static', keyboard: false})
  </script>

   

@endsection



