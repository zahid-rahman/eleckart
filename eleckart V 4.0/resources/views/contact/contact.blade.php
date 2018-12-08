@extends('layouts.default')
@include('layouts.design')

@section('title')
    Contact
@endsection

@section('content-for-other-page')
    {{--contact title image--}}
    <div class="row">
        <div class="col-sm-12">
            <div class="contact_title_image">
                <img src="img/contact_img/bg-banner-01.jpg" alt="">
            </div>
        </div>
    </div>


    <div class="row">
        {{--google map--}}
        <div class="col-sm-6">

            <div class="container">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3650.6760386468!2d90.39946621450297!3d23.794547893006282!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755c711d13bbec7%3A0xc47f7c3e8e2263f2!2sAmerican+International+University-Bangladesh!5e0!3m2!1sen!2sbd!4v1537801548458" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>




        </div>
        <div class="col-sm-6">
        <form action="{{route('contact.user')}}" method="post" class="form-horizontal">
            {{ csrf_field() }}
                <div class="form-group">

                    <div class="col-sm-10">
                        <input type="email" class="form-control"  placeholder="Email" name="u_email">
                        <p style="color:red">
                                @if($errors->any())
                                {{'* email address must be required'}}
                                @endif
                
                     </p>
                    </div>

                </div>
    
              
                <div class="form-group">

                    <div class="col-sm-10">
                        <textarea class="form-control" rows="3" placeholder="Message" name="message"></textarea>
                        <p style="color:red">
                                @if($errors->any())
                                {{'* please write your message'}}
                                @endif
                
                        </p>
                    </div>
                </div>

                  

                <div class="form-group">
                    <div class="col-sm-10">
                        <input type="submit" id="send-button" class="btn btn-success" value="send">
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection


{{--footer--}}
@section('footer')
    <footer id="myFooter">
        <div class="container">
            <div class="row">
                <div class="col-sm-3 myCols">
                    <h5>Get started</h5>
                    <ul>
                        <li><a href="#">Home</a></li>
                        @if(Auth::check() && Auth::user()->id)
                        @else 
                        <li><a href="{{route('register')}}">Sign up</a></li>

                        @endif
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



