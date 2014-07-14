<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
            GaleriaOptica.com Testing
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
        <!-- CSS are placed here -->
        {{ HTML::style('css/bootstrap.css') }}
        <style>
        @section('styles')
            body {
                padding-top: 60px;
            }
           {{ HTML::style('css/bootstrap-responsive.css') }}
        @show
        </style>
 
    </head>
 
    <body>
        <!-- Container -->
        @include("layouts.header")
 
        <div class="container">
            <!-- Content -->
            @yield('content')
        </div>
        @include("layouts.footer")
 
        <!-- Scripts are placed here -->
        {{ HTML::script('js/jquery-1.10.1.min.js') }}
        {{ HTML::script('js/bootstrap/bootstrap.min.js') }}
 
    </body>
</html>