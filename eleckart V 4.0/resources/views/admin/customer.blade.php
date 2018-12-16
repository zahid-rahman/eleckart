@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Customers
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
                                                      <strong><h2>Customers</h2></strong>
                                                    </div>
                                                    <div class="panel-body">
                                                        <form >
                                                            <div class="form-group">
                                                                <input type="search" name="search" onkeyup="searchingValue()" id="search" class="form-control" width="50%" placeholder="search customers">
                                                            </div>


                                                        </form>

                                                        @if(count($customer_data) == 0)
                                                        @else
                                                            <table class="table generaldata" id="product_table">
                                                                    <tr align="center">
                                                                            <td><strong>#</strong></td>
                                                                            <td><strong>Customer name</strong></td>
                                                                            <td><strong>email</strong></td>
                                                                            <td><strong>phone</strong></td>
                                                                            <td><strong>address</strong></td>
                                                                          
                                                                            <td><strong>status</strong></td>
                                                                          
                                                                            <td><strong>actions</strong></td>
                                                                    </tr>
                                                
                                                
                                                                
                                                                    @foreach($customer_data as $customers)    

                                                                        <tbody>
                                                                
                                                                    <tr class="default" align="center">
                                                                            <td>{{$loop->index+1}}</td>
                                                                            <td>{{$customers->name}}</td>
                                                                            <td>{{$customers->email}}</td>
                                                                            <td>{{$customers->phone_number}}</td>
                                                                            <td>{{$customers->address}}</td>


                                                                        
                                                                            <td>
                                                                                @if($customers->approval == "online" )
                                                                                   {{-- {{$customers->approval}} --}}
                                                                                   <span id="dot-online"></span>
                                                                                @elseif($customers->approval == "offline")
                                                                                   <span id="dot-offline"></span>          
                                                                                @endif   

                                                                            </td>
                                                                    
                                                                            <td width="15%">    
                                                                                
                                                                                  
                                                                                 <a href="{{route('admin.customer.delete.edit',['email'=>$customers->email])}}" data-toggle="tooltip" data-placement="bottom" title="permanently delete customer account"> 
                                                                                    <span class="glyphicon glyphicon-trash hvr-wobble-top"  style="color:#ff5c33"></span>
                                                                                
                                                                                </a>  
                                                                                || 
                                                                                <a href="{{route('admin.customer.info.edit',['email'=>$customers->email])}}" data-toggle="tooltip" data-placement="bottom" title="edit customer information">
                                                                                    
                                                                                    <span class="glyphicon glyphicon-pencil hvr-wobble-top" style="color:#0099ff"></span>
                                                                                </a>    
                                                                                || 
                                                                            <a href="{{route('admin.customer.ban.edit',['email'=>$customers->email])}}" data-toggle="tooltip" data-placement="bottom" title="ban or approve customer account">
                                                                                 
                                                                                <span class="glyphicon glyphicon-ban-circle" style="color:#ff9933"></span>
                                                                            </a> 
                                                                    
                                                                            </td>
                                                                    </tr>
                                                                </tbody>
                                                                  
                                                              @endforeach
                                                    
                                                                </table>


                                                            <table class="table ajaxdata" style="display:none" id="product_table">
                                                                <tr align="center">
                                                                    <td><strong>#</strong></td>
                                                                    <td><strong>Customer name</strong></td>
                                                                    <td><strong>email</strong></td>
                                                                    <td><strong>phone</strong></td>
                                                                    <td><strong>address</strong></td>

                                                                    <td><strong>status</strong></td>

                                                                    <td><strong>actions</strong></td>
                                                                </tr>


                                                                <tbody id="success">

                                                                </tbody>



                                                            </table>


                                                                <div align="center">
                                                                        <div class ="pagination" >
                                                                                {{ $customer_data->fragment('customers')->links() }}
                                                                        </div>
                                                                </div> 
                                                                
                                                                @endif
                                                                    
                                                    
                                                    
                                                    
                                                    
                                                    </div>
                                                </div>
                    
                    
                                </div>
                    
                            </div>
                    
                        </div>
            </div>
    </div>

    <script type="text/javascript">

        function searchingValue(){

            var search = $('#search').val();



            if(search){
                $('.generaldata').hide();
                $('.ajaxdata').show();

            }else{
                $('.generaldata').show();
                $('.ajaxdata').hide();
            }

            $.ajax({
                type:"GET",
                url:'{{URL::to('/search/customers')}}',
                data:{
                    search:search,
                    _token: $('#signup-token').val()

                },
                datatype:'html',
                success: function (response){
                    // console.log(response);
                    $("#success").html(response);
                }
            });
        }

    </script>




@endsection



