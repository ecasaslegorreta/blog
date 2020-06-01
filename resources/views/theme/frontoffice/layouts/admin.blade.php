<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  
      
        <head>
            <title>Blog | @yield('title')</title>
            @include('theme.frontoffice.layouts.includes.head')
        </head>
    <body class="sb-nav-fixed">
        
      @include('theme.frontoffice.layouts.includes.navbar')

        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    
                    @include('theme.frontoffice.layouts.includes.sidenavAccordion')

                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                  <div class="container-fluid">
                    

                    @yield('content')
                    
                  </div>
                </main>
                @include('theme.frontoffice.layouts.includes.footer')
            </div>
        </div>
        @include('theme.frontoffice.layouts.includes.foot')
    </body>
</html>

