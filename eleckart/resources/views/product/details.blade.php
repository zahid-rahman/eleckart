@extends('layouts.default')
@include('layouts.design')

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

{{--page title--}}
@section('title')
    product name
@endsection

@section('content1')
    <div class="product_details_section">
        <div class="row">
            <div class="col-sm-6">
                <div class="product_image">


                    <div class="exzoom" id="exzoom">
                        <!-- Images -->
                        <div class="exzoom_img_box">
                            <ul class='exzoom_img_ul'>

                                @foreach($product_img as $pics)
                                    <li><img style="background: #ffffff;" src="{{$pics->product_thumbnail}}"/></li>
                                @endforeach
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}
                                {{--<li><img src="../img/product_img/banner-10.jpg"/></li>--}}

                            </ul>
                        </div>
                        <!-- <a href="https://www.jqueryscript.net/tags.php?/Thumbnail/">Thumbnail</a> Nav-->
                        <div class="exzoom_nav"></div>
                        <!-- Nav Buttons -->
                        <p class="exzoom_btn">
                            <a href="javascript:void(0);" class="exzoom_prev_btn"> < </a>
                            <a href="javascript:void(0);" class="exzoom_next_btn"> > </a>
                        </p>
                    </div>


                </div>

            </div>
            <div class="col-sm-6">

               @foreach($product_details as $details)
                <div class="product_details">
                    {{--<h2><strong>Product name</strong></h2>--}}
                    {{--<h4>brand name</h4>--}}
                    {{--{{$product_details}}--}}

                    {{--<hr>--}}

                    {{--<h5>price : 0.00 BDT</h5>--}}
                    {{--<h5>discount : 0%</h5>--}}
                    {{--<p id="simple_title"><strong>Details</strong></p>--}}
                    {{--<p id="description">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English.</p>--}}

                    <h2><strong>{{$details->product_name}}</strong></h2>
                    <h4 id="brand_name">{{$details->brand_name}}</h4>

                    <hr>

                    <h5>price : {{$details->product_price}} BDT</h5>
                    <h5>discount : 0%</h5>
                    <p id="simple_title"><strong>Details</strong></p>
                    <p id="description"> {{$details->product_details}}</p>

                    @if(Auth::check())




                        <form action="/cart">

                            {{csrf_field()}}

                            <div class="form-group">
                                <input style="display: none" name="u_id" value="{{Auth::user()->id}}" hidden>

                            </div>
                            <div class="form-group">
                                <input style="display: none" name="p_id" value="{{$details->product_id}}" hidden>
                            </div>
                            <div class="form-group">
                                {{-- editor --}}
                                <input style="display: none" name="t_price" value="{{$details->product_price}}" hidden>
                            </div>

                            <input type="submit" class="btn btn-success hvr-wobble-top" value="add to cart">

                        </form>


                        {{--@endif--}}


                    @else
                    <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
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

                </div>

                   @endforeach





            </div>
        </div>
    </div>



    {{--<script>--}}
        {{--$(function () {--}}

            {{--$("#exzoom").exzoom({--}}
                {{--// options here--}}
                {{--"autoPlay": false--}}

            {{--});--}}

        {{--});--}}
    {{--</script>--}}
    {{--<script src="https://code.jquery.com/jquery-3.3.1.js"></script>--}}
    {{--<script src="../js/jquery.exzoom.js"></script>--}}


@endsection




