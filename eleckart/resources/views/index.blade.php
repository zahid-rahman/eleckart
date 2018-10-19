@extends('layouts.default')
@include('layouts.design')

{{--custom css file include--}}
@section('custom-css')
    <link rel="stylesheet" href="/custom_css/style.css">
@endsection

{{--page title--}}
@section('title')
    Brand
@endsection

{{--vendor registration--}}
@section('content4')
    <div id="header">
        <a href="{{route('vendor.register')}}" class="btn btn-link">wanna become a vendor</a>
    </div>

@endsection

{{--slider for front page--}}
@section('content1')
    <!-- Slide1 -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
            <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
            <li data-target="#myCarousel" data-slide-to="1"></li>
            <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
            <div class="item active">
                <img src="img/master-slide-01.jpg" alt="Los Angeles" style="width:100%;">
            </div>

            <div class="item">
                <img src="img/master-slide-02.jpg" alt="Chicago" style="width:100%;">
            </div>

            <div class="item">
                <img src="img/master-slide-03.jpg" alt="New york" style="width:100%;">
            </div>
        </div>

        <!-- Left and right controls -->
        <a class="left carousel-control" href="#myCarousel" data-slide="prev">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="right carousel-control" href="#myCarousel" data-slide="next">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>



@endsection

{{--nothing coded here--}}
@section('content2')
@endsection

{{--company title with greeting --}}
@section('brandtitle')
    <h1 align="center">Welcome to Eleckart</h1>
@endsection

{{--tab bar for showing tranding brands, upcoming new brands and flash sale(offers)--}}
@section('content3')

    <br>

    <div class="container">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#home">Tranding</a></li>
            <li><a data-toggle="tab" href="#menu1">New Brands</a></li>
            <li><a data-toggle="tab" href="#menu2">Flash sales</a></li>

        </ul>
        {{--tranding brands section--}}
        <div class="tab-content">
            <div id="home" class="tab-pane fade in active">
                <h3>Tranding brands</h3>

                <div class="container">
                    <table align="center" class="tab-table">
                        <tr>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                </div>


                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>

                                </div>
                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>

                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>

                                </div>

                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>

                                </div>
                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>

                                </div>
                            </td>

                        </tr>

                    </table>
                </div>


            </div>

            {{--new brands section--}}
            <div id="menu1" class="tab-pane fade">
                <h3>Upcoming new brands</h3>

                <div class="container">
                    <table align="center">
                        <tr>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                </div>


                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>
                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>

                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>
                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>
                            </td>

                        </tr>

                    </table>
                </div>


            </div>

            {{--flash sales section--}}
            <div id="menu2" class="tab-pane fade">
                <h3>Flash sales</h3>
                <div class="container">
                    <table align="center">
                        <tr>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">
                                    </a>
                                </div>


                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>
                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>
                            </td>

                        </tr>
                        <tr>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>

                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>
                            </td>
                            <td id="cell">
                                <div class="box">
                                    <a href="">
                                        <img src="img/brand_img/thumb-item-01.jpg" alt="Avatar" class="image">

                                    </a>
                                    {{--<div class="middle">--}}
                                    {{--<button class="text">John Doe</button>--}}
                                    {{--</div>--}}
                                </div>
                            </td>

                        </tr>

                    </table>
                </div>
            </div>

        </div>
    </div>
@endsection

{{--collections sections--}}
<div class="container">
    {{--collection title--}}
    @section('content6')

        <h2>Collections</h2>
        <br>
    @endsection

    {{--4 collection section in one row--}}
    <div class="collections-section">
        @section('content7')

            <div class="collection-box">
                <img src="img/collection_img/product-detail-01.jpg" alt="Avatar" class="collection_image">
                <div class="overlay">
                    <a href="" id="button" class="btn btn-success">show</a>
                </div>
            </div>

        @endsection
        @section('content8')

            <div class="collection-box">
                <img src="img/collection_img/product-detail-01.jpg" alt="Avatar" class="collection_image">
                <div class="overlay">
                    <a href="" id="button" class="btn btn-success">show</a>
                </div>
            </div>

        @endsection

        @section('content9')

            <div class="collection-box">
                <img src="img/collection_img/product-detail-01.jpg" alt="Avatar" class="collection_image">
                <div class="overlay">
                    <a href="" id="button" class="btn btn-success">show</a>
                </div>
            </div>

        @endsection

        @section('content10')

            <div class="collection-box">
                <img src="img/collection_img/product-detail-01.jpg" alt="Avatar" class="collection_image">
                <div class="overlay">
                    <a href="" id="button" class="btn btn-success">show</a>
                </div>
            </div>

        @endsection
    </div>


</div>

{{--view categories--}}

{{--category title--}}
@section('content11')
    <h2>view categories</h2>
    <br>
@endsection


<div class="category-section">
    @section('content12')
        {{--<a href="" class="category-box">--}}
        {{--<img src="img/category_img/gallery-05.jpg" alt="Avatar" class="category-img">--}}
        {{--<div class="animation">--}}
        {{--<a href="" id="button" class="btn btn-success">show</a>--}}
        {{--</div>--}}
        {{--</a>--}}

        <button class="btn btn-warning button" style="vertical-align:middle"><span>category 1 </span></button>

    @endsection

    @section('content13')
        {{--<a href="" class="category-box">--}}
        {{--<img src="img/category_img/gallery-05.jpg" alt="Avatar" class="category-img">--}}
        {{--<div class="animation">--}}
        {{--<a href="" id="button" class="btn btn-success">show</a>--}}
        {{--</div>--}}
        {{--</a>--}}


        <button class="btn btn-warning button" style="vertical-align:middle"><span>category 2 </span></button>



    @endsection

    @section('content14')
        {{--<a href="" class="category-box">--}}
        {{--<img src="img/category_img/gallery-05.jpg" alt="Avatar" class="category-img">--}}
        {{--<div class="animation">--}}
        {{--<a href="" id="button" class="btn btn-success">show</a>--}}
        {{--</div>--}}
        {{--</a>--}}
        <button class="btn btn-warning button" style="vertical-align:middle"><span>category 3 </span></button>
    @endsection

    @section('content15')
        {{--<a href="" class="category-box">--}}
        {{--<img src="img/category_img/gallery-05.jpg" alt="Avatar" class="category-img">--}}
        {{--<<div class="animation">--}}
        {{--<a href="" id="button" class="btn btn-success">show</a>--}}
        {{--</div>--}}
        {{--</a>--}}
        <button class="btn btn-warning button" style="vertical-align:middle"><span>category 4 </span></button>
    @endsection
</div>
@section('content16')
    <br>
    <br>
    <a href="" id="load-more" align="center" class="btn btn-primary">
        load more
    </a>
    {{--<a id="load-more" class="w3-btn w3-blue">load more</a>--}}
@endsection


{{--service section--}}
<div class="container">
    @section('content17')
        <h2 id="title">Services</h2>
    <br>
    @endsection

    @section('content18')
        <span class="glyphicon glyphicon-home logo-small"></span>
        <h4>Delivery</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking
            at its layout.</p>
    @endsection

    @section('content19')
        <span class="glyphicon glyphicon-phone-alt logo-small"></span>
        <h4>24/7 service</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking
            at its layout.</p>
    @endsection

    @section('content20')
        <span class="glyphicon glyphicon-tags logo-small"></span>
        <h4>Brand's product</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking
            at its layout.</p>
    @endsection




    @section('content21')
        <span class="glyphicon glyphicon-wrench logo-small"></span>
        <h4>Product change</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking
            at its layout.</p>
    @endsection

    @section('content22')
        <span class="glyphicon glyphicon-shopping-cart logo-small"></span>
        <h4>Online shopping</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking
            at its layout.</p>
    @endsection

    @section('content23')
        <span class="glyphicon glyphicon-picture logo-small"></span>
        <h4>HQ product image</h4>
        <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking
            at its layout.</p>


    @endsection


</div>



{{--footer section--}}
@section('footer')
    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 myCols">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        <li><a href="{{route('register')}}">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <h5>About us</h5>
                    <ul>
                        <li><a href="{{route('about')}}">about us</a></li>
                        <li><a href="{{route('contact')}}">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <h5>Support</h5>
                    <ul>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <h5>Legal</h5>
                    <ul>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="social-networks">
            <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
            <a href="#" class="facebook"><i class="fa fa-facebook-official"></i></a>
            <a href="#" class="google"><i class="fa fa-google-plus"></i></a>
        </div>
        <div class="footer-copyright">
            <p>© 2016 Copyright <a href="http://recipefinder.ml" target="_blank">brand.com</a></p>
        </div>
    </footer>
@endsection



