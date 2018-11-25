@extends('layouts.default')
@include('layouts.design')

@section('title')
    create product
@endsection
{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
    
@endsection


@section('content-for-other-page')



  <div class="container">

        <div class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                      {{-- product name    --}}
                        @foreach($images as $name)
                        <h2><b>{{$name->product_name}}</b></h2>
                        @break
                       @endforeach
                       
                  </div>
                  <div class="panel-body">
                         {{-- picture detials --}}
    <table class="table">
            <tr>
                <th>SL</th>
                <th style="text-align: center">Product image</th>
                <th>update </th>
            </tr>
    
            @foreach($images as $product_images)
    
            <form action="{{route('vendor.product.image.update',['id'=>$product_images->product_id])}}" method="POST" enctype="multipart/form-data">
    
    
            <tr>
                <td>{{$loop->index+1}}</td>
                <td align="center">
                {{-- <a href="{{$product_images->product_image}}" target="_blank"> --}}
                        <label id="custom_update"> 
                                {{-- <span class="glyphicon glyphicon-pencil" style="color:##ffffff;padding:10px 10px 10px 10px" ></span> --}}
                                <img src="{{$product_images->product_image}}" alt="" height="50%" width="40%" >
                                <input type="file" name="u_pro_img" id="exampleInputFile"  size="60" >
                            </label>      
    
                  
                {{-- </a> --}}
                </td>
                <td>
                        {{--  --}}
                                <input type="text" name="u_p_id" value="{{$product_images->product_id}}" hidden>
                                <input type="text" name="u_pro_img_id" value="{{$product_images->pro_img_id}}" hidden>
                               <input type="submit" class="btn btn-primary hvr-wobble-top" value="update picture">
                        
                        </form>
                </td>
            </tr>
            @endforeach
    </table>



                  </div>
                </div>
        </div>

    
   

 
  </div>

@endsection