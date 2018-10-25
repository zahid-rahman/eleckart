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
                <li id="nav-menu-link"><a href="#">brands</a></li>
                <li id="nav-menu-link"><a href="#">collection</a></li>
                {{--<li id="nav-menu-link"><a href="#">view categories</a></li>--}}


                <li id="nav-menu-link"><a href="{{route('about')}}">about us</a></li>
                <li id="nav-menu-link"><a href="{{route('contact')}}">contact</a></li>
            </ul>
            <form class="navbar-form navbar-left">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search">
                </div>
                <button type="submit" id="search" class="btn btn-danger glyphicon glyphicon-search"></button>
            </form>

            @if(Auth::check())

                <ul class="nav navbar-nav navbar-right">

                    <li id="nav-menu-link">
                       <p hidden>{{ $id = Auth::user()->id }}</p>
                        <a href="{{route('cart',['id'=>$id])}}">

                            <p hidden> {{$cart= DB::table('carts')->where('id',Auth::user()->id)->count()}}</p>
                            <span class="glyphicon glyphicon-shopping-cart"></span> <span
                                    class="badge badge-light">{{$cart}}</span>
                        </a></li>
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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

{{--view categories--}}
<div class="category">
    <div class="container">
        {{--title--}}
        <div class="row">
            <div class="col-sm-12">
                @yield('content11')
            </div>
        </div>
        {{--content--}}
        <div class="row">
            <div class="col-sm-3">
                @yield('content12')
            </div>
            <div class="col-sm-3">
                @yield('content13')
            </div>
            <div class="col-sm-3">
                @yield('content14')
            </div>

            <div class="col-sm-3">
                @yield('content15')
            </div>
            <br>
            <br>

            {{--load button--}}
            <div class="load-button">
                <div class="row">
                    <div class="col-sm-4"></div>
                    <div class="col-sm-4">

                        @yield('content16')
                    </div>
                    <div class="col-sm-4"></div>
                </div>
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


{{--front page animations--}}

<script>
    window.sr = ScrollReveal();
    sr.reveal('.navbar', {
        duration: 3000,
        origin: 'bottom',

    })

    window.sr = ScrollReveal();
    sr.reveal('.category', {
        duration: 3000,
        origin: 'top',
        distance: '300px'
    })

    window.sr = ScrollReveal();
    sr.reveal('.collections', {
        duration: 3000,
        origin: 'right',
        distance: '300px'
    })

    sr.reveal('.load-button', {
        duration: 3000,
        origin: 'top',
        delay: 800,
        distance: '300px'
    })

    sr.reveal('#title', {
        duration: 3000,
        origin: 'bottom',
        delay: 900,
        distance: '300px'
    })

    sr.reveal('.delivery', {
        duration: 3000,
        origin: 'left',
        delay: 1100,
        distance: '300px'
    })


    sr.reveal('.tfservice', {
        duration: 3000,
        origin: 'left',
        delay: 1300,
        distance: '300px'
    })

    sr.reveal('.brand-product', {
        duration: 3000,
        origin: 'left',
        delay: 1500,
        distance: '300px'
    })


    sr.reveal('.product-change', {
        duration: 3000,
        origin: 'right',
        delay: 1100,
        distance: '300px'
    })

    sr.reveal('.online-shopping', {
        duration: 3000,
        origin: 'right',
        delay: 1300,
        distance: '300px'
    })

    sr.reveal('.hq-product-image', {
        duration: 3000,
        origin: 'right',
        delay: 1500,
        distance: '300px'
    })

    sr.reveal('.tabbar', {
        duration: 3000,
        origin: 'left',
        delay: 2000,
        distance: '300px'
    })

    sr.reveal('.brand_title', {
        duration: 3000,
        origin: 'top',
        delay: 1000,
        distance: '300px'
    })


</script>


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

{{--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>--}}
{{--<script src="js/jquery.richtext.js"></script>--}}
{{--<script defer src="https://use.fontawesome.com/releases/v5.0.8/js/all.js"></script>--}}


{{--<script>--}}
{{--<script>--}}
{{--$(document).ready(function() {--}}
{{--$('.content').richText();--}}
{{--});--}}
{{--</script>--}}


</body>
</html>