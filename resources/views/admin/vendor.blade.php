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
                                                      <strong><h2>Vendor</h2></strong>
                                                    </div>
                                                    <div class="panel-body">
                                                            <table class="table" id="product_table">
                                                                    <tr>
                                                                            <td><strong>#</strong></td>
                                                                            <td><strong>company name</strong></td>
                                                                            <td><strong>email</strong></td>
                                                                            <td><strong>phone</strong></td>
                                                                            <td><strong>address</strong></td>
                                                                            
                                                                            <td><strong>approval status</strong></td>
                                                                          
                                                                            <td><strong>actions</strong></td>
                                                                    </tr>
                                                
                                                
                                                                
                                                                    @foreach($vendor_data as $vendors)    
                                                              
                                                                @if($vendors->approval == "pending")
                                                                    <tr class="warning" align="center">
                                                                            <td>{{$loop->index+1}}</td>
                                                                            <td>{{$vendors->com_name}}</td>
                                                                            <td>{{$vendors->email}}</td>
                                                                            <td>{{$vendors->phone_number}}</td>
                                                                            <td>{{$vendors->address}}</td>


                                                                        
                                                                            <td>
                                                                                {{$vendors->approval}}
                                                                            </td>
                                                                    
                                                                            <td width="15%">    
                                                                                
                                                                                    
                                                                                <a href="{{route('admin.vendor.delete.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="permanently delete vendor account"> 
                                                                                    <span class="glyphicon glyphicon-trash hvr-wobble-top"  style="color:#ff5c33"></span>
                                                                                
                                                                                </a>  
                                                                                || 
                                                                                <a href="{{route('admin.vendor.account.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="edit vendor information">
                                                                                    
                                                                                    <span class="glyphicon glyphicon-pencil hvr-wobble-top" style="color:#0099ff"></span>
                                                                                </a>    
                                                                                || 
                                                                            <a href="{{route('admin.vendor.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="ban or approve vendor account">
                                                                                 
                                                                                <span class="glyphicon glyphicon-ban-circle" style="color:#ff9933"></span>
                                                                            </a>
                                                                    
                                                                            </td>
                                                                    </tr>

                                                                    @elseif($vendors->approval == "approve") 
                                                                    <tr class="active" align="center">
                                                                        <td>{{$loop->index+1}}</td>
                                                                        <td>{{$vendors->com_name}}</td>
                                                                        <td>{{$vendors->email}}</td>
                                                                        <td>{{$vendors->phone_number}}</td>
                                                                        <td>{{$vendors->address}}</td>
                                                                      

                                                                    
                                                                        <td>
                                                                            {{$vendors->approval}}
                                                                        </td>
                                                                
                                                                        <td width="15%">              
                                                                            <a href="{{route('admin.vendor.delete.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="permanently delete vendor account"> <span class="glyphicon glyphicon-trash hvr-wobble-top" style="color:#ff5c33"></span></a> || 
                                                                            
                                                                            <a href="{{route('admin.vendor.account.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="edit vendor information"><span class="glyphicon glyphicon-pencil hvr-wobble-top" style="color:#0099ff"></span></a> || 
                                                                            
                                                                            <a href="{{route('admin.vendor.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="ban or approve vendor account"><span class="glyphicon glyphicon-ban-circle hvr-wobble-top" style="color:#ff9933" 
                                                                                ></span></a>
                                                                
                                                                        </td>
                                                                </tr>
                                                                @elseif($vendors->approval == "ban") 
                                                                <tr class="danger" align="center">
                                                                    <td>{{$loop->index+1}}</td>
                                                                    <td>{{$vendors->com_name}}</td>
                                                                    <td>{{$vendors->email}}</td>
                                                                    <td>{{$vendors->phone_number}}</td>
                                                                    <td>{{$vendors->address}}</td>
                                                                  

                                                                
                                                                    <td>
                                                                        {{$vendors->approval}}
                                                                    </td>
                                                            
                                                                    <td width="15%">              
                                                                        <a href="{{route('admin.vendor.delete.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="permanently delete vendor account"> <span class="glyphicon glyphicon-trash hvr-wobble-top" style="color:#ff5c33"></span></a> || 
                                                                        
                                                                        <a href="{{route('admin.vendor.account.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="edit vendor information"><span class="glyphicon glyphicon-pencil hvr-wobble-top" style="color:#0099ff"></span></a> || 
                                                                        
                                                                        <a href="{{route('admin.vendor.edit',['email'=>$vendors->email])}}" data-toggle="tooltip" data-placement="bottom" title="ban or approve vendor information"><span class="glyphicon glyphicon-ban-circle hvr-wobble-top" style="color:#ff9933"
                                                                            ></span></a>
                                                            
                                                                    </td>
                                                            </tr>


                                                                @endif    
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



