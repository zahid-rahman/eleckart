@extends('layouts.default')
@include('layouts.design')

@section('title')
    About us
@endsection

@section('content1')
    {{--about title image--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="about_title_image">
                <img src="img/about_img/bg-banner-01.jpg" alt="">
            </div>
        </div>
    </div>

     {{--side animation image--}}
    <div class="row">
        <div class="container">
            <div class="col-sm-6">
                <div class="photo">
                    <img src="img/about_img/banner-10.jpg" alt="">
                </div>
            </div>
            <div class="col-sm-6">
                <div class="container">
                    {{--title--}}
                    <div class="section">
                        <h2><strong>Our Story</strong></h2>
                    </div>
                     {{--description about company   --}}
                    <div class="story">
                        <p>
                            It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for
                            'lorem ipsum' will uncover many web sites still in their infancy.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection



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
            <p>© 2016 Copyright <a href="http://recipefinder.ml" target="_blank">brand.com</a> </p>
        </div>
    </footer>
@endsection



