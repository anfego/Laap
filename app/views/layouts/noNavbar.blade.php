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
        <!-- {{ HTML::style('css/bootstrap.css') }} -->
        <!-- Custom styles for this template -->
        <!-- {{ HTML::style "customCss/signin.css" rel="stylesheet"> -->
        <!-- Bootstrap core CSS -->
        <link href="css/bootstrap.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="css/signin.css" rel="stylesheet">
        

 
    </head>
 
    <body>
        <!-- Container -->
        <div class="container">
        @include("layouts.header")
 
            @yield('navBar')
            <!-- Content -->
            @yield('content')
        </div>
        @include("layouts.footer")
 

 
    </body>
</html>