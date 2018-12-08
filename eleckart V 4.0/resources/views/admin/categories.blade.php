@extends('layouts.default')
@include('layouts.design')

@section('title')
    Admin-Categories
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
                                              <strong><h2>Categories</h2></strong>
                                            </div>
                                            <div class="panel-body">

                                                    <form class="form-inline" action="{{route('admin.categories.store')}}" method="POST">
                                                            <div class="form-group">
                                                              
                                                              <input type="text" class="form-control" placeholder="enter category name" name="c_name" style="width:200%">
                                                            </div>
                                                        
                                                            <button style="margin-left:200px" type="submit" class="btn btn-primary hvr-wobble-top">+ add categories</button>
                                                            <p style="color:red">
                                                                    @if($errors->any())
                                                                        {{-- {{$errors->first('b_name')}} --}}
                                                                        {{'category name required'}}
                                                                    @endif
                                                    
                                                                </p>  
                                                  
                                                        </form> 
                                                        
                                                        @if(count($categories) == 0)
                                                        <div class="container">
                                                            <p>No categories added yet</p>
                                                        </div>
                                                        @else

                                                    <table class="table" id="product_table">
                                                            <tr align="center">
                                                                <td><strong>#</strong></td>
                                                                <td><strong>Category name</strong></td>
                                                                <td><strong>actions</strong></td>
                                                            </tr>
                                        
                                        
                                                        
                                                            @foreach ($categories as $item)
                                                            <tr align="center">
                                                                    <td>{{$loop->index+1}}</td>
                                                                    <td>{{$item->category_name}}</td>
                                                                    <td>
                                                                      <a href="{{route('admin.categories.update.edit',['id'=>$item->category_id])}}" class="btn btn-primary hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="delivery order confirmation"><span class="glyphicon glyphicon-edit hvr-wobble-top"  ></a>  
                                                                          {{-- <a href="{{route('admin.categories.delete.edit',['id'=>$item->category_id])}}" class="btn btn-danger hvr-wobble-top" data-toggle="tooltip" data-placement="bottom" title="delivery order confirmation"><span class=" glyphicon glyphicon-trash hvr-wobble-top"  ></a>   --}}
  
  
                                                                    </td>
                                                                  
                                                                </tr>
                                                            @endforeach    
                                                              
                                                          
                                            
                                                        </table>

                                                        <div align="center">
                                                                <div class ="pagination" >
                                                                        {{ $categories->fragment('item')->links() }}
                                                                </div>
                                                        </div>  
                                            
                                               @endif
                                            
                                            
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



