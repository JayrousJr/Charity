<!DOCTYPE html>
<html lang="en" class="no-js">

    <head>
        <!-- Mobile Specific Meta -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon-->
        <link rel="shortcut icon" href="/storage/images/system/fav.png">
        <!-- Author Meta -->
        <meta name="author" content="Colorlib">
        <!-- Meta Description -->
        <meta name="description" content="">
        <!-- Meta Keyword -->
        <meta name="keywords" content="">
        <!-- meta character set -->
        <meta charset="UTF-8">
        <!-- Site Title -->
        <title>{{env('APP_NAME')}}</title>

        <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet">
        <!--
			CSS
			============================================= -->
        <link rel="stylesheet" href="assets/css/linearicons.css">=
        <link rel="stylesheet" href="assets/css/font-awesome.min.css">
        <link rel="stylesheet" href="assets/css/magnific-popup.css">
        <link rel="stylesheet" href="assets/css/nice-select.css">
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" href="assets/css/bootstrap.css">
        <link rel="stylesheet" href="assets/css/main.css">

        <style>
        /* Center the notification both horizontally and vertically */
        .notify {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            /* Adjust the z-index as needed to ensure it's above other content */
            padding: 15px;
            /* Adjust padding to style the notification box */
            text-align: center;
            /* Center the text horizontally */
            width: 300px;
            /* Set a width for the notification box */
            background-color: #4CAF50;
            /* Background color for success */
            color: #fff;
            /* Text color */
            border-radius: 5px;
            /* Rounded corners for the box */
        }

        .success {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            /* Adjust the z-index as needed to ensure it's above other content */
            padding: 15px;
            /* Adjust padding to style the notification box */
            text-align: center;
            /* Center the text horizontally */
            width: 300px;
            /* Set a width for the notification box */
            background-color: #4CAF50;
            /* Background color for success */
            color: #fff;
            /* Text color */
            border-radius: 5px;
            /* Rounded corners for the box */
        }

        .error {
            position: fixed;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            z-index: 1000;
            /* Adjust the z-index as needed to ensure it's above other content */
            padding: 15px;
            /* Adjust padding to style the notification box */
            text-align: center;
            /* Center the text horizontally */
            width: 300px;
            /* Set a width for the notification box */
            background-color: #cf2424;
            /* Background color for success */
            color: #fff;
            /* Text color */
            border-radius: 5px;
            /* Rounded corners for the box */

        }

        .img-dimensions {
            width: 263px;
            height: 280px;
            background-size: cover;
            background-position: cover;
        }

        /* Override Bootstrap styles for pagination */
        .pagination {
            margin: 20px 0;
            text-align: center;
        }

        .pagination li {
            display: inline-block;
            margin-right: 10px;
        }

        .pagination .active span {
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination .active span:hover {
            background-color: #007bff;
            border-color: #007bff;
        }

        .pagination a {
            color: #007bff;
            border: 1px solid #007bff;
            padding: 5px 10px;
            border-radius: 3px;
            text-decoration: none;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: #fff;
        }

        .logo-image {
            width: 40px;
            height: auto;
            display: inline;
            margin: 0px 10px;
        }

        .logo-name {
            font-size: 20px;
            color: black;
            font-weight: 700;
        }

        .user-part {
            margin-left: 30px;
            margin-right: 10px;
        }

        .user-part .profile-image {
            width: 40px;
            height: 40px;
            padding: 5px;
            border-radius: 50%;
        }

        .user-part span {
            font-size: 16px;
            border: 1px solid black;
            padding: 5px;
            border-radius: 50%;
        }

        .user-part li {
            margin-left: 10px;
            padding: 5px;
        }

        .user-part li a {
            color: #000;
        }

        .user-part li a:hover {
            color: #333;
        }
        </style>
    </head>

    <body>

        <!-- Start Header Area -->
        <header class="default-header">
            <div class="container-fluid">
                <div class="header-wrap">
                    <div class="header-top d-flex justify-content-between align-items-center">
                        <div class="logo">
                            <a href="{{route('home')}}"><img src="/storage/images/system/logo.png" class="logo-image"
                                    alt=""> </a><span class="logo-name">{{env('APP_NAME')}}</span>
                        </div>
                        <div class="main-menubar d-flex align-items-center">

                            <nav class="hide">
                                <a href="{{route('home')}}#home">Home</a>
                                <a href=" {{route('home')}}#project">Projects</a>
                                <a href="{{route('home')}}#about">About</a>
                                <a href="{{route('home')}}#volunteer">Volunteer</a>
                                <a href="{{route('contact.index')}}">Contact</a>
                            </nav>
                            <div class="menu-bar"><span class="lnr lnr-menu"></span></div>
                            @if (Route::has('login'))
                            <div class="user-part">
                                @auth
                                <a class="dropdown-toggle" role="button" id="dropDown" data-toggle="dropdown">
                                    <img src="{{Auth::user()->profile_photo_path ? '/storage/'.Auth::user()->profile_photo_path : '/storage/profile-photos/profile.jpg'}}"
                                        class="profile-image">
                                </a>
                                <div class="dropdown-menu" arial-labelledby="dropDown">
                                    <ul>
                                        <li>
                                            <a class="dropdown-menu-item" href="{{'/dashboard'}}">My Account</a>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <a href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); document.getElementById('logout-form').submit();">{{ __('Logout') }}</a>
                                            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                class="d-none">
                                                @csrf
                                            </form>
                                        </li>
                                    </ul>
                                </div>

                                @else
                                <a class="dropdown-toggle" role="button" id="dropDown" data-toggle="dropdown">
                                    <span class="lnr lnr-user"></span>
                                </a>
                                <div class="dropdown-menu" arial-labelledby="dropDown">
                                    <ul>
                                        <li>
                                            <a class="dropdown-menu-item" href="{{route('login')}}">Log In</a>
                                        </li>
                                        <div class="dropdown-divider"></div>
                                        <li>
                                            <a class="dropdown-menu-item" href="{{ url('/register') }}">Sign Up</a>
                                        </li>
                                    </ul>
                                </div>

                                @endauth
                            </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- End Header Area -->