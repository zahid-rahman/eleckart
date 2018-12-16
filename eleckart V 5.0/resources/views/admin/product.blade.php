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
                                            <strong><h2>Products</h2></strong>
                                        </div>
                                        <div class="panel-body">
                                            <form >
                                                <div class="form-group">
                                                    <input type="search" name="search" onkeyup="searchingValue()" id="search" class="form-control" width="50%" placeholder="search products">
                                                </div>


                                            </form>

                                            @if(count($product_data) == 0)
                                            <div class="container">
                                                <p>No products added yet</p>
                                            </div>
                                            @else
                                                <table class="table generaldata" id="product_table">
                                                    <tr align="center">
                                                        <td><strong>#</strong></td>
                                                        <td><strong>product name</strong></td>
                                                        <td><strong>Product visiblity</strong></td>                                                           
                                                        <td><strong>information</strong></td>                                                           
                                                        <td><strong>actions</strong></td>
                                                    </tr>


                                                    @foreach ($product_data as $items)

                                                     <tbody>
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

                                                     </tbody>

                                                    @endforeach
                                                   
                                                    
                                                        
                                                </table>


                                                <table class="table ajaxdata" style="display:none" id="product_table">
                                                    <tr align="center">
                                                        <td><strong>#</strong></td>
                                                        <td><strong>product name</strong></td>
                                                        <td><strong>Product visiblity</strong></td>
                                                        <td><strong>information</strong></td>
                                                        <td><strong>actions</strong></td>
                                                    </tr>


                                                    <tbody id="success">

                                                    </tbody>



                                                </table>
                                        
                                        
                                                 <div align="center">
                                                        <div class ="pagination" >
                                                                {{ $product_data->fragment('items')->links() }}
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
            url:'{{URL::to('/search/online product')}}',
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



