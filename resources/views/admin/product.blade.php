@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Product
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
                                            <strong><h2>Products</h2></strong>
                                        </div>
                                        <div class="panel-body">
                                                <table class="table" id="product_table">
                                                    <tr align="center">
                                                        <td><strong>#</strong></td>
                                                        <td><strong>product name</strong></td>
                                                        <td><strong>Product visiblity</strong></td>                                                           
                                                        <td><strong>information</strong></td>                                                           
                                                        <td><strong>actions</strong></td>
                                                    </tr>


                                                    @foreach ($product_data as $items)
                                                    <tr  align="center">
                                                    <td>{{$loop->index+1}}</td>
                                                    <td>{{$items->product_name}}</td>
                                                    <td>
                                                        @if($items->product_visiblity == "online")
                                                        <span id="dot-online"></span>
                                                        @elseif($items->product_visiblity == "offline")
                                                        <span id="dot-offline"></span>
                                                    </td>
                                                            @endif
                                                    <td><a href="{{route('admin.product.details.edit',['id'=>$items->product_id])}}">view more info</a></td>
                                                        
                                                
                                                        <td width="15%">    
                                                            
                                                                
                                                            <a href="{{route('admin.product.delete.edit',['id'=>$items->product_id])}}" class="btn btn-danger hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="permanently delete proudct"> 
                                                                <span class="glyphicon glyphicon-trash hvr-wobble-top"  style="color:#ffffff"></span>
                                                            
                                                            </a>  
                                                            
                                                        
                                                        <a href="{{route('admin.product.visiblity.edit',['id'=>$items->product_id])}}" class="btn btn-warning hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="make online or offline product">
                                                                
                                                            <span class="glyphicon glyphicon-ban-circle hvr-wobble-top" style="color:#ffffff    "></span>
                                                        </a>
                                                
                                                        </td>
                                                </tr>

                                                    @endforeach
                                                   
                                                    
                                                        
                                                </table>
                                        
                                        
                                        
                                        
                                        </div>
                                    </div>
        
                    </div>
            
                    </div>
            
                </div>
    </div>
</div>

   

   

@endsection



