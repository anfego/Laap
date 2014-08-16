<!DOCTYPE html>
<html lang="es">
    <head>
        <title>
            @section('title')
            GaleriaOptica.com Testing
            @show
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
 
       <!-- Isotope -->
        <link href={{{URL::asset('css/stylesIsotope.css')}}} rel="stylesheet" type="text/css" >
        <!-- Bootstrap core CSS -->
        <link href={{{URL::asset('css/bootstrap.css')}}} rel="stylesheet">
        <!-- Custom styles for this template -->
        <link href={{{URL::asset('css/signin.css')}}} rel="stylesheet">
        

 
    </head>
 
    <body>
        <!-- Container -->
        <div class="container">

            @include("layouts.header")
            @yield('navBar')
            

            <div class="panel panel-default">
                <div class="panel-body">
                    @yield('content')
                </div>    
            </div>
        </div>
        @include("layouts.footer")
 

 
    </body>
    @yield('scripts')
</html>