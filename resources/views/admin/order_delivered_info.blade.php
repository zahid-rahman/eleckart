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
                                              <div class="container">
                                                    <strong><h2>Delivered Order</h2></strong>
                                              </div>
                                            </div>
                                            <div class="panel-body">
                                                    <table class="table" id="product_table">
                                                            <tr align="center">
                                                                <td><strong>#</strong></td>
                                                                <td><strong>customer name</strong></td>
                                                                <td><strong>order token number</strong></td>
                                                                <td><strong>order status</strong></td>
                                                                <td><strong>order info</strong></td>
                                                                <td><strong>actions</strong></td>
                                                               
                                                            </tr>
                                        

                                                            @foreach ($order_data as $item)

                                                            
                                                            <tr align="center">
                                                                    <td> {{$loop->index+1}}</td>
                                                                    <td> {{$item->name}}</td>
                                                                    @if($item->status == "shipping")
                                                                        <td><p style="color:tomato">{{$item->token_number}}</p></td>
                                                                    @elseif($item->status == "delivered")
                                                                        <td><p style="color:green">{{$item->token_number}}</p></td>
                                                                    @endif
                                                                    <td> {{$item->status}} </td>
                                                                    <td><a href="{{route('admin.order.edit',['token'=>$item->token_number])}}">view more info</a></td>

                                                                    <td>
                                                                    {{-- <a href=" {{route('admin.order.confirm.edit',['token'=>$item->token_number])}}" class="btn btn-primary hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="delivery order confirmation"><span class="glyphicon glyphicon-ok-sign hvr-wobble-top"  ></a>   --}}
                                                                        {{-- <a href="" class="btn btn-danger hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="cancle order"> <span class="glyphicon glyphicon-remove-sign hvr-wobble-top"  ></span></a>  --}}
                                                                        <a href="{{route('admin.order.shipping.edit',['token'=>$item->token_number])}}" class="btn btn-warning hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="stopping order shipping"> <span class="glyphicon glyphicon-exclamation-sign hvr-wobble-top"  ></a>
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



   

@endsection


