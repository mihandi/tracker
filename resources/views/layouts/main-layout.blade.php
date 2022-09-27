<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link href="{{ URL::asset('css/main.css') }}" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/combine/npm/fullcalendar@5.11.2/main.min.js,npm/fullcalendar@5.11.2"></script>

    <link href="{{ URL::asset('css/app.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/magnific-popup.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ URL::asset('css/swiper.css') }}" rel="stylesheet" type="text/css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script type="module" src="{{asset('js/app.js')}}"></script>
    <script type="module" src="{{asset('js/jquery.jquery.min.js')}}"></script>
    <script type="module" src="{{asset('js/bootstrap.min.js')}}"></script>
    <script type="module" src="{{asset('js/jquery.easing.min.js')}}"></script>
    <script type="module" src="{{asset('js/jquery.magnific-popup.min.js')}}"></script>
    <script type="module" src="{{asset('js/popper.min.js')}}"></script>
    <script  type="module" src="{{asset('js/swiper.min.js')}}"></script>
    <script type="module" src="{{asset('js/validator.min.js')}}"></script>
    <script type="module" src="{{asset('js/scripts.js')}}"></script>


</head>

<body>
<!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-dark navbar-custom fixed-top">
    <div class="container">
        <!-- Text Logo - Use this if you don't have a graphic logo -->
        <!-- <a class="navbar-brand logo-text page-scroll" href="index.html">Sync</a> -->

        <!-- Image Logo -->
        <a class="navbar-brand logo-image" href="/"><img src="/images/logo.svg" alt="alternative"></a>

        <!-- Mobile Menu Toggle Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
                aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-awesome fas fa-bars"></span>
            <span class="navbar-toggler-awesome fas fa-times"></span>
        </button>
        <!-- end of mobile menu toggle button -->

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/">MAIN PAGE<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href="/habits/">HABITS</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link page-scroll" href=":8080">PHPMYADMIN</a>
                </li>

                <!-- Dropdown Menu -->
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle page-scroll" id="navbarDropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">EXTRA</a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="article-details.html"><span class="item-text">ARTICLE DETAILS</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="terms-conditions.html"><span class="item-text">TERMS CONDITIONS</span></a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="privacy-policy.html"><span class="item-text">PRIVACY POLICY</span></a>
                    </div>
                </li>
                <!-- end of dropdown menu -->
            </ul>
            <span class="nav-item">
                    <a class="btn-outline-sm page-scroll" href="#download">DOWNLOAD</a>
                </span>
        </div>
    </div> <!-- end of container -->
</nav> <!-- end of navbar -->
<!-- end of navigation -->
<div id="app"></div>
</body>
