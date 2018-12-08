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
                                                      <strong><h2>Vendor</h2></strong>
                                                    </div>
                                                    <div class="panel-body">

                                                        
        <form >
                <div class="form-group">
                   
                   <input type="search" name="search" onkeyup="searchingValue()" id="search" class="form-control" width="50%" placeholder="search vendors">
                {{-- <input type="text" name="c_name" id="cat" onkeyup="searchingValue()" value="{{$cat_name->category_name}}" hidden> --}}
                </div>
                

        </form>




                                                         @if(count($vendor_data) == 0)
                                                         <div class="container">
                                                             <p>No vendors added yet</p>
                                                         </div>
                                                         @else
                                                            <table class="table generaldata" id="product_table">
                                                                    <tr align="center">
                                                                             <td><strong>#</strong></td>
                                                                            <td><strong>company name</strong></td>
                                                                            <td><strong>email</strong></td>
                                                                            <td><strong>phone</strong></td>
                                                                            <td><strong>address</strong></td>
                                                                            
                                                                            <td><strong>status</strong></td>
                                                                          
                                                                            <td><strong>actions</strong></td>
                                                                    </tr>
                                                
                                                
                                                                
                                                                    @foreach($vendor_data as $vendors)    
                                                              
                                                               
                                                                  <tbody>
                                                                   
                                                                        <tr align="center">
                                                                                <td>{{$loop->index+1}}</td>
                                                                                <td>{{$vendors->com_name}}</td>
                                                                                <td>{{$vendors->email}}</td>
                                                                                <td>{{$vendors->phone_number}}</td>
                                                                                <td width="12%">{{$vendors->address}}</td>
    
                                                                                @if($vendors->approval == "pending")
                                                                            
                                                                                <td>
                                                                                   <span id="dot-warning"></span>
                                                                                </td>
                                                                                @elseif($vendors->approval == "ban")
                                                                                <td>
                                                                                        <span id="dot-offline"></span>
                                                                                     </td>
                                                                                @elseif($vendors->approval == "approve")
                                                                                <td>
                                                                                        <span id="dot-online"></span>
                                                                                     </td>
    
                                                                                @endif    
                                                                        
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
    
                                                                   <tbody>
                                                                  
                                                               
                                                               
                                                              @endforeach



                                                    
                                                                </table>

                                                                <table class="table ajaxdata" style="display:none" id="product_table">
                                                                        <tr align="center">
                                                                                <td><strong>#</strong></td>
                                                                               <td><strong>company name</strong></td>
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
                                                                {{ $vendor_data->fragment('vendors')->links() }}
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
                url:'{{URL::to('/search/vendor')}}',
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



