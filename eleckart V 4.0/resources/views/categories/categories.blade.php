@extends('layouts.default')
@include('layouts.design')

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

{{--page title--}}
@section('title')
    categories
@endsection


@section('content-for-other-page')






    {{--
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="stylesheet" href="custom_css/style.css">





    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>


    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>


        <title>Document</title>
    </head>
    <body>
         --}}




    {{-- navigation bar  --}}




    {{-- product collection with search  --}}
    <div class="container">
        <h2>{{$cat_name->category_name}}</h2>


        <p>total product ({{$total_product}})</p>

        <form >
            <div class="form-group">

                <input type="search" name="search" onkeyup="searching()" id="search" class="form-control" width="50%" placeholder="search your desired product">
                <input type="text" name="cat" onkeyup="searching()" id="cat" class="form-control" value="{{$cat_name->category_name}}" style="display: none;">
            </div>
        </form>

    </div>
    <div class="container-fluid">


        <p hidden>{{$check = DB::table('carts')->get()}} </p>

        @if(count($product_cat) == 0)
            <div class="container">
                <h2 align="center" style="margin:100px 0px 0px 0px;font-size:40px"><b>Products not found</b> </h2>
            </div>
        @elseif($product_cat)
            {{--<div class="container">--}}

            <div class="flex-container generaldata" >

                @foreach($product_cat as $item)

                    @if($item->product_visiblity == "online")
                        {{-- <div class="flex-container"> --}}

                        <div id="product_card">
                            <a href="{{route('product.product-detials',['id'=>$item->product_id])}}">
                                <img src="{{$item->product_thumbnail}}" alt="Avatar" class="img-responsive">
                            </a>



                            <div class="content">
                                <p><b>{{$item->product_name}}</b></p>
                                @if( count($discount) == 0)
                                    <p>price : {{$item->product_price}} BDT</p>
                                @else
                                    @foreach($discount as $disc)
                                        @if($disc->product_id == $item->product_id && $disc->discount != 0)
                                            <p>Price: {{$disc->discount_product_price}} BDT</p>

                                            <p>discount: <b>{{$disc->discount}} %</b></p>
                                            {{--{{$disc->product_id}}--}}
                                            <p> <del>original price : {{$item->product_price}} BDT</del></p>
                                        @elseif($disc->product_id == $item->product_id && $disc->discount <= 0)
                                            <p>price : {{$item->product_price}} BDT</p>


                                        @endif
                                    @endforeach
                                @endif

                                {{--s--}}
                                @if(Auth::check() && Auth::user()->role == "user")

                                    {{--<p hidden>--}}
                                    {{--{{$check_qun = DB::table('products')->where('product_id',$item->product_id)->get()}}--}}
                                    {{--</p>--}}
                                    @if($item->product_visiblity == "online" && $item->product_quantity == 0)
                                        <div class="alert alert-danger">
                                            product out of stock
                                        </div>
                                    @else
                                        <form action="{{route('cart.add')}}">

                                            {{csrf_field()}}

                                            <div class="form-group">
                                                <input style="display: none" name="u_id" value="{{Auth::user()->id}}" hidden>
                                            </div>
                                            <div class="form-group">
                                                <input style="display: none" name="p_id" value="{{$item->product_id}}" hidden>
                                            </div>
                                            <div class="form-group">
                                                {{-- editor --}}
                                                <input style="display: none" name="p_qun"  hidden>
                                            </div>

                                            <div class="form-group">
                                                {{-- editor --}}
                                                <input style="display: none" name="t_price" value="{{$item->product_price}}" hidden>
                                            </div>



                                            <input type="submit" class="btn btn-danger hvr-wobble-top" value="add to cart">

                                        </form>
                                    @endif



                                    {{--@endif--}}


                                @else
                                    {{--<div class="alert alert-danger">--}}
                                    {{--<p>log in required</p>--}}
                                    {{--</div>--}}


                                <!-- Button trigger modal -->
                                    @if($item->product_visiblity == "online" && $item->product_quantity == 0)
                                        <div class="alert alert-danger">
                                            product out of stock
                                        </div>
                                    @else
                                        <button type="button" class="btn btn-danger hvr-wobble-top" data-toggle="modal" data-target="#myModal">
                                            add to cart
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">

                                                    <div class="modal-header">
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                        <h4 class="modal-title"><b>Alert</b></h4>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p style="color:#ff484a"><b>user Log in required</b></p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    @endif




                                @endif
                                {{--
                                                   <a class="btn btn-danger hvr-wobble-top">
                                                       <span class="glyphicon glyphicon-shopping-cart"></span>
                                                   </a> --}}
                                <br>
                            </div>

                            {{-- </div> --}}


                        </div>



                    @endif

                @endforeach
            </div>
            {{--</div>--}}

            <br>

        @endif



        {{-- ajax data --}}
        <div class="ajaxdata" style="display: none;">
            <div class="flex-container" id="success">

            </div>

        </div>


    </div>



    <div class="pagination" id="pagination_location">
        {{ $product_cat->fragment('item')->links() }}
    </div>

    <script type="text/javascript">

        function searching(){

            var search = $('#search').val();
            var cat = $('#cat').val();



            if(search){
                $('.generaldata').hide();
                $('.ajaxdata').show();

            }else{
                $('.generaldata').show();
                $('.ajaxdata').hide();
            }

            $.ajax({
                type:"GET",
                url:'{{URL::to('/category')}}',
                data:{
                    search:search,
                    cat:cat,
                    _token: $('#signup-token').val()

                },
                datatype:'html',
                success: function (response){
                    console.log(response);
                    $("#success").html(response);

                }
            });
        }

    </script>

    {{-- </body>
    </html> --}}


@endsection
