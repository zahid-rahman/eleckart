@extends('layouts.default')
@include('layouts.design')

@section('title')
    vendor product
@endsection


{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

@section('content-for-other-page')
    <div class="container">

        <div class="row">
            <div class="col-sm-3">
                <ul id="vendor-navigation" class="nav nav-piles">
                    <li><a class="btn btn-primary" href="{{route('vendor.dashboard',['name'=>Auth::user()->name])}}">Dashboard</a></li>
                    <li><a class="btn btn-primary" href="{{route('vendor.products')}}">Product</a></li>
                    <li><a class="btn btn-primary" href="{{route('vendor.profile.setting',['name'=>Auth::user()->id])}}">profile setting</a></li>

                </ul>
            </div>

            <div class="col-sm-9">


                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-sm-4">
                                <div class="container">
                                    <p id="product_title">Products</p>
                                </div>
                            </div>

                            <div class="col-sm-4"></div>

                            <div class="col-sm-4">
                                <a href="{{route('vendor.product.create')}}" id="add_product_btn"
                                   class="btn btn-primary hvr-wobble-top" style="margin-left:120px;margin-top:10px">+
                                    add product</a>
                            </div>

                        </div>


                    </div>
                    <div class="panel-body">

                        <form >
                            <div class="form-group">

                                <input type="search" name="search" onkeyup="searchingValue()" id="search" class="form-control" width="50%" placeholder="search products">
                                {{-- <input type="text" name="c_name" id="cat" onkeyup="searchingValue()" value="{{$cat_name->category_name}}" hidden> --}}
                            </div>


                        </form>

                        <div id="container">


                            <table class="table generaldata" id="product_table">
                                <tr align="center">
                                    <td><strong>product name</strong></td>
                                    <td width="10%"><strong>product info</strong></td>
                                    <td width="15%"><strong>set discount</strong></td>
                                    {{--<td><strong>product price</strong></td>--}}
                                    {{--<td><strong>quantity</strong></td>--}}
                                    <td><strong>status</strong></td>
                                    <td><strong>upload pics</strong></td>
                                    <td width="15%"><strong>view pics</strong></td>
                                    {{--<td><strong>discount</strong></td>--}}

                                    {{-- <td><strong>upload pics</strong></td>
                                    <td><strong>view product images</strong></td> --}}
                                    <td><strong>actions</strong></td>
                                </tr>


                                {{-- {{dd($pro)}}   --}}
                                @foreach($pro as $item)
                                    <tbody>
                                    <tr align="center">
                                        <td>{{$item->product_name}}</td>
                                        <td><a href={{route('vendor.view.product',['id'=>$item->product_id])}}>view info</a></td>
                                        <td><a href="{{route('vendor.discount.set',['id'=>$item->product_id])}}">click here</a></td>
                                        {{--<td  width="15%">{{$item->product_price}}</td>--}}
                                        {{--<td  width="15%"> {{$item->product_quantity}}</td>--}}
                                        <td  width="10%">
                                            @if($item->product_visiblity == "online")
                                                <span id="dot-online"></span>
                                                {{-- <span class="glyphicon glyphicon-stop" style="color: #1ec842;border-radius:100%"></span> --}}
                                            @elseif($item->product_visiblity == "offline")
                                                <span id="dot-offline"></span>
                                        {{-- <span class="glyphicon glyphicon-stop" style="color: #ff463c"></span> --}}

                                        @endif

                                        @if($item->product_visiblity == "online")
                                            <td width="15%"><a style="pointer-events: none;color:green;text-decoration: none;"
                                                   href="{{route('vendor.product.upload.edit',['id'=>$item->product_id])}}">done
                                                    </a></td>

                                        @elseif($item->product_visiblity == "offline")
                                            <td>
                                                <a class="btn btn-primary" href="{{route('vendor.product.upload.edit',['id'=>$item->product_id])}}">upload
                                                    </a></td>

                                        @endif


                                        <td><a href="{{route('vendor.product.image',['id'=>$item->product_id])}}">view
                                                here</a></td>
                                        {{-- <td><a href="">view images</a></td> --}}
                                        {{--<td width="8%">1000</td>--}}
                                        <td width=15%>

                                            <a href="{{route('vendor.product.delete',['id'=>$item->product_id])}}">
                                                <span class="glyphicon glyphicon-trash"
                                                      style="color:#a7a7a7"></span></a>
                                            ||
                                            <a href="{{route('vendor.product.edit',['id'=>$item->product_id])}}"><span
                                                        class="glyphicon glyphicon-pencil" style="color:#a7a7a7"></span></a>

                                        </td>
                                    </tr>
                                    </tbody>
                                @endforeach

                            </table>


                            <table class="table ajaxdata" style="display:none" >
                                <tr align="center">
                                    <td><strong>product name</strong></td>
                                    <td width="10%"><strong>product info</strong></td>
                                    <td width="15%"><strong>set discount</strong></td>
                                    {{--<td><strong>product price</strong></td>--}}
                                    {{--<td><strong>quantity</strong></td>--}}
                                    <td><strong>status</strong></td>
                                    <td><strong>upload pics</strong></td>
                                    <td width="15%"><strong>view pics</strong></td>
                                    {{--<td><strong>discount</strong></td>--}}

                                    {{-- <td><strong>upload pics</strong></td>
                                    <td><strong>view product images</strong></td> --}}
                                    <td><strong>actions</strong></td>
                                </tr>


                                <tbody id="success">

                                </tbody>



                            </table>





                            <div align="center">
                                <div class ="pagination" >
                                    {{ $pro->render() }}
                                </div>
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
                url:'{{URL::to('/search/products')}}',
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
