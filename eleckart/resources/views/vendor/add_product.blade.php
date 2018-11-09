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
        <h3>Add Product</h3>
            {{-- <label for="ttile" class="alert alert-warning">
                Warning                      
        <marquee style="" behavior="float" direction=""> Before uploading your product please ensure your product picture size</marquee>
                
            </label> --}}

            <div class="panel panel-info">
                <div class="panel-heading" style="text-align:center;background:#F2DEDE;color:#A94442;border:none ">
                    <b>Warning!!!</b> 
                    <marquee style="" behavior="float" direction=""> Before uploading your product please ensure your product picture size by using photoshop</marquee>

                </div>

                

            </div>
        <br>
        <br>
        <form action="{{route('vendor.product.add')}}" method="POST" enctype="multipart/form-data">
            {{-- product name --}}
            <div class="form-group">
                <input type="text" class="form-control" name="pro_name" placeholder="Product name/Product title">
            </div>
             {{-- product details    --}}
            <div class="form-group">
                    <textarea class="form-control" name="pro_desc" id="product_details" height="50%" placeholder="Product details"></textarea>
            </div>

            {{-- product solo thumbnail --}}

            <div class="form-group">
            
                    <label id="custom_upload"> Upload your product thumbnail
                        <input type="file" name="pro_img_up" id="exampleInputFile"   size="60" >
                    </label>   
            </div>

            {{-- product quantity --}}

            <div class="form-group">
                    <input type="number" min ="1" class="form-control" name="pro_qun" placeholder="product quantity" >
            </div>

            {{-- product price --}}
            <div class="form-group">
                    <input type="number" min ="1" class="form-control" name="pro_price" placeholder="product price" >
            </div>
            
            {{-- choose brand name for brand id --}}
            <div class="form-group">
                <label>Choose your expected brand</label>
                <select id="brand_names" name="brand_name">
                      
                    <p hidden>
                        {{$brands = DB::table('brands')->get()}}
                    </p>
                    @foreach($brands as $value)
                      <option id="brands">{{$value->brand_name}}</option>          
                    @endforeach
                  
                </select>

                
            </div>

            {{-- offer against products --}}

            <div class="form-group">
                <input type="number" min ="0" class="form-control" name="offer" placeholder="discount" >
            </div>


            {{-- choose categories for getting the category id --}}
            <div class="form-group">
                <label>Choose your expected categories</label>
                <select id="brand_names"  name="c_name">
                      
                    <p hidden>
                        {{$category = DB::table('categories')->get()}}
                    </p>
                    @foreach($category as $value)
                      <option id="brands">{{$value->category_name}}</option>
                   @endforeach
                </select>
            </div>
            
        

            <div class="form-group">
            <input style="display: none" type="text"  class="form-control" name="v_id" placeholder="product price" value="{{Auth::user()->id}}">
            </div>
                

            <button type="submit" class="btn btn-success hvr-wobble-top" data-toggle="modal" data-target="#myModal">Upload product</button>

             <!-- Modal -->
             <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">

                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title"><b>Alert</b></h4>
                            </div>
                            <div class="modal-body">
                                <p style="color:#2dd280"><b>Product added successfully</b></p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>

                        </div>
                    </div>
                </div>
        </form>
    </div>






@endsection