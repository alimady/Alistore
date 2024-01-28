<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">
    <meta name="routeName" content="{{ Route::currentRouteName()  }}">

    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')-{{Config::get('alimadycms.name')}}</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="auth" content="{{ Auth::check() }}">


    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css" />
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fancyapps/ui/dist/fancybox.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat+Alternates:wght@300;500;700&family=Montserrat:wght@300;500;700&family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ url('/home/site.css?v='.time()) }}">

    <link rel="stylesheet" href="{{ url('/home') }}@yield('cssFile2','/style.css')"></link>
    <script src="{{ url('/home') }}@yield('jsFile2','/script.js')"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
    <script src="https://kit.fontawesome.com/b0d8aefb17.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="{{ url('/home/site.js?v='.time()) }}" defer></script>

</head>

<body>

    <div  id="loader">
        <div class="box">
            <div class="cart">
                <!-- <img src="{{ url('\static\images\shopping-cart.png') }}" alt=""> -->
            </div>
             
            <div class="load">
                <div class="spinner-border text-secondary" role="status">
                </div>
            </div>
        </div>
    </div>
    <nav class="navbar navbar-expand-lg shadow">
        <div class="container-fluid">
            <!-- <a class="navbar-brand" href="{{ url('/') }}"><img src="{{ url('static/images/mady.png') }}" alt=""></a> -->

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navigation_main" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="fas fa-bars"></span>
            </button>

            <div class="collapse navbar-collapse" id="navigation_main">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-home"></i> <span>Home</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-store-alt"></i> <span>Shop</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-id-card-alt"></i> <span> About us</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}"><i class="fas fa-envelope-open"></i> <span>Contact</span></a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link a_cart" ><i class="fas fa-shopping-cart"></i><span class="cart_num">2</span></a>
                    </li>
                    @if(Auth::guest())
                    <li class="nav-item link_acc">
                        <a href="{{ url('/login') }}" class="nav-link btn"> <i class="fas fa-fingerprint"></i> Login</a>
                        <a href="{{ url('/register') }}" class="nav-link btn"> <i class="far fa-user-circle"></i> Register</a>
                    </li>
                    @else
                    <li class="nav-item link_acc link_user dropdown">
                        <a href="{{ url('/login') }}" class="nav-link btn dropdown-toggle" id="navbarScrollingDropdown" data-bs-toggle="dropdown" aria-expanded="false" style="  box-shadow: none;
                        ">
                            @if (is_null(Auth::user()->avatar)) <img src="{{ url('/static/images/default_avatar.png') }}" alt="">
                            @else <img src="{{ url('/users_photo/'.Auth::id().'/av_'.Auth::user()->avatar) }}" style="border-radius: 50%">
                            @endif Hello: {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                            @if(Auth::user()->role=='0')
                            <li><a class="dropdown-item" href="{{ url('/admin') }}" style="padding-left: :0px"> <i class="fas fa-home"></i> Adminstration</a></li>
                            @endif
                            <li><a class="dropdown-item" href="{{ url('/profile/favourits') }}" style="padding-left: :0px"> <i class="fas fa-heart"></i>Favourits</a></li>
                            <li><a class="dropdown-item" href="{{ url('/profile/edit') }}" style="padding-left: :0px"> <i class="fas fa-address-card"></i> My profile</a></li>
                            <li><a class="dropdown-item" href="{{ url('/logout') }}"> <i class="fas fa-sign-out-alt"></i> Logout</a></li>
                        </ul>
                    </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
    @if(Session::has('message'))
    <div class="container">
        <div class="alert alert-{{ Session::get('typealert') }} " style="display: none;">
            {{ Session::get('message') }}
            @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                $('.alert').slideDown();
                setTimeout(function() {
                    $('.alert').slideUp();
                }, 10000);
            </script>

        </div>
    </div>
    @endif
    <div class="wrapper">
        <div class="container">
            @yield('content')
        </div>
    </div>

</body>

</html>