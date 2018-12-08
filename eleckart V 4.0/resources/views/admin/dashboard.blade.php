@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Dashboard
@endsection
{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="custom_css/style.css">

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
                                              <strong><h2>Dashboard</h2></strong>
                                            </div>
                                            <div class="panel-body">
                                                  <div class="row">
                                                      <div class="col-sm-4">
                                                            <div class="jumbotron container" id="total_vendors">
                                                                    <h4>total vendors</h3>
                                                                    
                                                                    <li><span id="dot-online"></span> approve ({{$ven_app_count}}) </li>
                                                                    <li><span id="dot-offline"></span> pending ({{$ven_pen_count}})</li>
                                                                    <li><span id="dot-warning"></span> ban ({{$ven_ban_count}})</li>
                                                                    
                                                                  
                                                                  
                                                                         
                                                                </p>
                                                                
                                                                
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-4">
                                                            <div class="jumbotron container" id="total_customers">
                                                                    <h4>total customers</h3>
                                                                        <li><span id="dot-online"></span> online ({{$cust_on_count}}) </li>
                                                                        <li><span id="dot-offline"></span> offline ({{$cust_off_count}})</li>
                                                                    
                                        
                                                            </div>
                                                      </div>

                                                      <div class="col-sm-4">
                                                            <div class="jumbotron container" id="total_products">
                                                                    <h4>total products</h3>
                                                                        <li><span id="dot-online"></span> online ({{$pro_on_count}}) </li>
                                                                        <li><span id="dot-offline"></span> offline ({{$pro_off_count}})</li>
                                        
                                                            </div>
                                                      </div>


                                                      
                                                      <div class="col-sm-4">
                                                            <div class="jumbotron container" id="total_orders">
                                                                    <h4>total orders</h3>
                                                                        <li><span id="dot-online"></span> delivired ({{$ord_del_count}}) </li>
                                                                        <li><span id="dot-offline"></span> claimed ({{$ord_cla_count}})</li>
                                                                        <li><span id="dot-warning"></span> shipping ({{$ord_shp_count}})</li>
                                        
                                                            </div>
                                                      </div>


                                                      <div class="col-sm-4">
                                                            <div class="jumbotron container" id="total_categories">
                                                                    <h4>total categories</h3>
                                                                        <li><span id="dot-online"></span> online (0) </li>
                                                                        <li><span id="dot-offline"></span> offline (0)</li>
                                        
                                                            </div>
                                                      </div>


                                                      <div class="col-sm-4">
                                                            <div class="jumbotron container" id="total_brands">
                                                                    <h4>total brands</h3>
                                                                        <li><span id="dot-online"></span> online (0) </li>
                                                                        <li><span id="dot-offline"></span> offline (0)</li>
                                        
                                                            </div>
                                                      </div>

                                                      
                                                   
                                                  </div>
                                            
                                            
                                            
                                            </div>
                                        </div>
            
                            {{-- <table class="table" id="product_table">
                                <tr>
                                    <td><strong>product name</strong></td>
                                    <td><strong>product price</strong></td>
                                    <td><strong>product in stock</strong></td>
                                    <td><strong>product in stock</strong></td>
                                    <td><strong>view product images</strong></td>
                                  
                                    <td><strong>actions</strong></td>
                                </tr>
            
            
                            
            
                                  <tr>
                                      <td>1</td>
                                      <td>2</td>
                                      <td>3</td>
                                      <td>4</td>
                                      <td>5</td>
                                  </tr>
                
                            </table> --}}
            
                        </div>
            
                    </div>
            
                </div>
    </div>



   

@endsection



