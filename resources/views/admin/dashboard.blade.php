@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Dashboard
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
                                              <strong><h2>Dashboard</h2></strong>
                                            </div>
                                            <div class="panel-body">
                                                    <table class="table" id="product_table">
                                                            <tr>
                                                                <td><strong>product name</strong></td>
                                                                <td><strong>product price</strong></td>
                                                                <td><strong>product in stock</strong></td>
                                                                <td><strong>product in stock</strong></td>
                                                                <td><strong>view product images</strong></td>
                                                              
                                                                <td><strong>actions</strong></td>
                                                            </tr>
                                        
                                        
                                                        
                                                            @for($i=0 ;$i<5;$i++)    
                                                              <tr>
                                                                  <td>1</td>
                                                                  <td>2</td>
                                                                  <td>3</td>
                                                                  <td>4</td>
                                                                  <td>5</td>
                                                                  <td>6</td>
                                                              </tr>
                                                              @endfor
                                            
                                                        </table>
                                            
                                            
                                            
                                            
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



