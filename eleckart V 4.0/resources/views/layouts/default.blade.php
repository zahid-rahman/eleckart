<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="shortcut icon" href="img/cart.jpg"/>

    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="../css/jquery.exzoom.css">
	
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
    <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- jQuery library -->


<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script> 




    @yield('custom-css')


</head>
<body>

@yield('content4')

<nav class="navbar navbar-default" id="main_navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"><strong id="company_title">Eleckart</strong></a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false">Catagories <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        {{--{{dd($categories)}}--}}


                        <p hidden>{{$categories = DB::table('categories')->get()}}</p>

                        @foreach( $categories as $item)

                            <li>
                                <a href="{{route('category.products',['name'=>$item->category_name])}}">{{$item->category_name}}</a>
                            </li>

                        @endforeach

                    </ul>
                </li>
                {{-- <li id="nav-menu-link"><a href="#">brands</a></li> --}}
            <li id="nav-menu-link"><a href="{{route('product.collection')}}">collection</a></li>
                {{--<li id="nav-menu-link"><a href="#">view categories</a></li>--}}


                <li id="nav-menu-link"><a href="{{route('about')}}">about us</a></li>
                <li id="nav-menu-link"><a href="{{route('contact')}}">contact</a></li>
            </ul>

            @if(url()->current() == url('/collections'))
            
            @elseif(url()->current() == url('/') ||  url()->current() == url('/about') || url()->current() == url('/contact'))
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search product">
                </div>
                <button type="submit" id="search" class="btn btn-danger glyphicon glyphicon-search"></button>
            </form>
            @endif


            @if(Auth::check() && Auth::user()->role == "user")
                
            <p hidden >
                {{$customer_approval = DB::table('customers')->where('email',Auth::user()->email)->pluck('approval')->first()}}
            </p>

                @if($customer_approval == 'online')
                <ul class="nav navbar-nav navbar-right">

                    <li id="nav-menu-link">
                        <p hidden>{{ $id = Auth::user()->id }}</p>
                        <a href="{{route('cart',['id'=>$id])}}">

                            <p hidden> {{$cart= DB::table('carts')->where('id',Auth::user()->id)->count()}}</p>
                            <span class="glyphicon glyphicon-shopping-cart"></span> <span
                                    class="badge badge-light" style="background:red">{{$cart}}</span>
                        </a>
                    </li>

                    {{-- <li id="nav-menu-link">
                        <a class="dropdown-item btn btn-link" style="text-decoration: none"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        @php
                          $id = Auth::user()->id;
                        @endphp

                        <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{route('order.customer',['id'=>$id])}}" class="dropdown-item btn btn-link" style="text-decoration: none" >
                                my orders
                            </a>
                             

                            <a class="dropdown-item btn btn-link" style="text-decoration: none"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                        
                    </li>
                    


                </ul>

                @elseif($customer_approval == 'offline')
                <ul class="nav navbar-nav navbar-right">

                    {{-- <li id="nav-menu-link">
                        <p hidden>{{ $id = Auth::user()->id }}</p>
                        <a href="{{route('cart',['id'=>$id])}}">

                            <p hidden> {{$cart= DB::table('carts')->where('id',Auth::user()->id)->count()}}</p>
                            <span class="glyphicon glyphicon-shopping-cart"></span> <span
                                    class="badge badge-light" style="background:red">{{$cart}}</span>
                        </a>
                    </li> --}}
                    <li class="nav-item dropdown">
                        <a  style="color:red" id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        @php
                          $email = Auth::user()->email;
                        @endphp

                        <div  class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a style="color:red" href="{{route('alert.customer',['email'=>$email])}}" class="dropdown-item btn btn-link" style="text-decoration: none" >
                                alert message
                            </a>
                             

                            <a class="dropdown-item btn btn-link" style="text-decoration: none"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                    


                </ul>


                @endif



            @elseif(Auth::check() && Auth::user()->role == "vendor")
                {{--<ul class="nav navbar-nav navbar-right">--}}
                {{--<li id="nav-menu-link"><a href="{{ route('vendor.dashboard') }}">{{Auth::user()->email}}</a></li>--}}

                {{--</ul>--}}

                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item btn btn-link" style="text-decoration: none"
                               href="{{route('vendor.dashboard',['name'=>Auth::user()->name])}}">dashboard</a>
                            <br>
                            <a class="dropdown-item btn btn-link" style="text-decoration: none"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

            @elseif(Auth::check() && Auth::user()->role == "admin")
                <ul class="nav navbar-nav navbar-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item btn btn-link" style="text-decoration: none" href="{{route('admin')}}">dashboard</a>
                            {{--<br>--}}
                            <a class="dropdown-item btn btn-link" style="text-decoration: none"
                               href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>

                </ul>

               
            @else
                <ul class="nav navbar-nav navbar-right">
                    <li id="nav-menu-link"><a href="{{ route('login') }}">login</a></li>
                    <li id="nav-menu-link"><a href="{{ route('register') }}">register</a></li>
                </ul>
            @endif

        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>


@yield('content1')
<div class="brand_title">
    @yield('brandtitle')
</div>


@yield('content-for-other-page')

<div class="tabbar">
    <div class="container">


        <table>
            <tr>
                <td>@yield('content2')</td>
            </tr>
            <tr>
                <td>@yield('content3')</td>
            </tr>
            <tr>
                <td>@yield('content5')</td>
            </tr>
        </table>
        {{--<div class="col-sm-4"></div>--}}
        {{--<div class="col-sm-4"></div>--}}
        {{--<div class="col-sm-4"></div>--}}
    </div>
</div>
<br>
<br>
<br>
<br>
<br>
<br>
<br>


{{--collections--}}
<div class="collections">

    <div class="container">

        {{--title--}}
        <div class="row">
            <div class="col-sm-12">
                @yield('content6')
            </div>
        </div>

        {{--content--}}
        <div class="row">
            <div class="col-sm-3">
                @yield('content7')
            </div>
            <div class="col-sm-3">
                @yield('content8')
            </div>
            <div class="col-sm-3">
                @yield('content9')
            </div>

            <div class="col-sm-3">
                @yield('content10')
            </div>

        </div>

        <br>
        <br>


    </div>

</div>



{{--services--}}
<div class="container">


    <div class="row slideanim slide">
        <div class="col-sm-12">
            @yield('content17')
        </div>
    </div>


    <div class="row slideanim slide">

        <div class="delivery">
            <div class="col-sm-4">
                @yield('content18')
            </div>
        </div>

        <div class="tfservice">
            <div class="col-sm-4">
                @yield('content19')
            </div>
        </div>

        <div class="brand-product">
            <div class="col-sm-4">
                @yield('content20')
            </div>
        </div>

    </div>

    <br>
    <div class="row slideanim slide">
        <div class="product-change">
            <div class="col-sm-4">
                @yield('content21')
            </div>
        </div>

        <div class="online-shopping">
            <div class="col-sm-4">
                @yield('content22')
            </div>
        </div>

        <div class="hq-product-image">
            <div class="col-sm-4">
                @yield('content23')
            </div>
        </div>

    </div>

    <br>
    <br>
    <br>

</div>




@yield('footer')


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy"
        crossorigin="anonymous"></script>


{{--product zooming effects--}}


<script>
    $(function () {

        $("#exzoom").exzoom({
            // options here
            "autoPlay": false

        });

    });
</script>
<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="../js/jquery.exzoom.js"></script>




{{-- 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="js/jquery.richtext.js"></script>
<script src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>
 --}}




</body>
</html>