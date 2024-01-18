<!--
=========================================================
* Material Dashboard 2 - v3.1.0
=========================================================

* Product Page: https://www.creative-tim.com/product/material-dashboard
* Copyright 2023 Creative Tim (https://www.creative-tim.com)
* Licensed under MIT (https://www.creative-tim.com/license)
* Coded by Creative Tim

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
-->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('admin/img/apple-icon.png') }}">
  <link rel="icon" type="image/png" href="{{ asset('admin/img/favicon.png') }}">
  <title>@yield('title')</title>
  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('frontend/css/custom.css') }}" rel="stylesheet" />
  <link id="pagestyle" href="{{ asset('frontend/css/bootstrap5.3.css') }}" rel="stylesheet" />
  <!-- Nepcha Analytics (nepcha.com) -->
  <!-- Nepcha is a easy-to-use web analytics. No cookies and fully compliant with GDPR, CCPA and PECR. -->
  <script defer data-site="YOUR_DOMAIN_HERE" src="https://api.nepcha.com/js/nepcha-analytics.js"></script>

  <link rel="stylesheet" href="{{ asset('frontend/css/owl.carousel.min.css') }}" />
  <link rel="stylesheet" href="{{ asset('frontend/css/owl.theme.default.min.css') }}" />

  <style>
    a{
        text-decoration: none !important;
    }
  </style>
</head>

<body>

    @include('layouts.inc.frontnavbar')

    <div class="content">



        @yield('content')
    </div>

  <!--   Core JS Files   -->
  <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}"></script>
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{ asset('frontend/js/jquery-3.7.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/owl.carousel.min.js') }}"></script>

  @if(session('status'))
    <script>
        swal("{{session('status')}}");
    </script>
  @endif

  @yield('scripts')

</body>

</html>
