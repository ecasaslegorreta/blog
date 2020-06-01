<!DOCTYPE html>

<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Blog | @yield('title')</title>
    @include('theme.backoffice.layouts.includes.head')
</head>

<body>

  <!-- Navigation -->
  @if(!\Request::is('login') && !\Request::is('register') )
    @include('theme.backoffice.layouts.includes.navbar')
  @endif
  <!-- Page Header -->
  @yield('header')

  <!-- Main Content 

-->
  
<div class="container">
    <div class="row">
        @yield('container')
    </div>
</div>

  <hr>

  <!-- Footer -->
  
    @include('theme.backoffice.layouts.includes.footer')
  
  
  <!-- Bootstrap core JavaScript -->
  
  @include('theme.backoffice.layouts.includes.foot')

</body>

</html>
