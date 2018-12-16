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
                                                      <strong><h2>Feedback messages</h2></strong>
                                                    </div>
                                                    <div class="panel-body">


                                                        <span class="glyphicon glyphicon-stop" style="color:blue"></span> vendor                
                                                        <span class="glyphicon glyphicon-stop" style="color:green"></span> registered customer               
                                                        <span class="glyphicon glyphicon-stop"></span> normal customer               

                                                         {{-- @if(count($feedback) == 0) --}}
                                                         {{-- <div class="container">
                                                             <p>No vendors added yet</p>
                                                         </div> --}}
                                                         {{-- @else --}}
                                                            <table class="table" id="product_table">
                                                                    <tr align="center">
                                                                            <td><strong>#</strong></td>
                                                                            <td><strong>email</strong></td>
                                                                            <td><strong>feedback message</strong></td>
                                                                                       
                                                                            <td><strong>actions</strong></td>
                                                                    </tr>
                                                
                                                                    @php
                                                                    $check =0; 
                                                                    @endphp
                                                                
                                                            @foreach($feedback_data as $feedback)    
                                                              
                                                              
                                                                    <tr align="center">
                                                                            <td>{{$loop->index+1}}</td>
                                                                                {{-- {{dd($feedback->email)}} --}}
                                                                                <p hidden>
                                                                                        {{ $user = count( App\User::where('email',$feedback->email)->where('role','user')->get())  }} 
                                                                                        {{ $vendor = count( App\User::where('email',$feedback->email)->where('role','vendor')->get())  }} 
                                                                                        {{-- {{ $vendor = count($user = App\User::where('email',$feedback->email)->where('role','vendor')->get())  }}  --}}

                                                                                </p>
                                                                              
                                                                                      
                                                                        @if($user > 0)
                                                                        <td><p style="color:green">{{$feedback->email}}</p></td>  
                                                                        @elseif($vendor > 0)
                                                                        <td><p style="color:blue">{{$feedback->email}}</p></td>  
                                                                        @else
                                                                        <td><p >{{$feedback->email}}</p></td>
                                                                        @endif
                                                                            
                                                                        
                                                                     
                                                                            <td width="25%" height:10%>{{$feedback->feedback_message}}</td>
                                                                    
                                                                            <td>            
                                                                               <a href="mailto:{{$feedback->email }}">reply</a>
                                                                            </td>
                                                                    </tr>

                                                                   
                                                            @endforeach

                                                    
                                                                </table>

                                                               
                                                 <div align="center">
                                                        <div class ="pagination" >
                                                                {{ $feedback_data->fragment('feedback')->links() }}
                                                        </div>
                                                </div>  


                                                {{-- @endif --}}
                                                    
                                                    
                                                    
                                                    
                                                    </div>
                                                </div>
                    
                    
                                </div>
                    
                            </div>
                    
                        </div>
            </div>
    </div>

   

   

@endsection



