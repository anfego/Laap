<!DOCTYPE html>
<html lang="es">
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
        <!-- Isotope -->
        <link href="css/stylesIsotope.css" rel="stylesheet" type="text/css" >
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
            
            @yield('content')
        </div>
        @include("layouts.footer")
 

 
    </body>
    @yield('scripts')
</html>