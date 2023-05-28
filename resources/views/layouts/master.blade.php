<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'TechSwivel') }} | @yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @yield('style')
</head>

<body class="hold-transition sidebar-mini">

<div class="wrapper" id="app">
    <!-- Header -->
@include('partialPages.header.header')
<!-- Sidebar -->
@include('partialPages.sidebar.sidebar')

@yield('content')
<!-- Footer -->
    @include('partialPages.footer.footer')
</div>

<script src="{{asset('js/app.js')}}"></script>
@toastr_render
@yield('script')

</body>
</html>
