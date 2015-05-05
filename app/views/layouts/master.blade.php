<!doctype html>
<html lang="en" ng-app="goApp">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title ng-controller='mainCtrl'>{{page.title()}}</title>
 
    <!-- jQuery (necessary for Isotopes's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
  
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/stylesIsotope.css">

    <!-- Angular -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular.min.js"></script>
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/angularjs/1.3.15/angular-route.js"></script>
    
    <!-- Latest compiled and minified JavaScript -->
    <script type="text/javascript" src="js/ui-bootstrap-tpls-0.13.0.js"></script>
       
    <!-- Custom Scripts -->
    <script type="text/javascript" src="js/jquery.isotope.min.js"></script>
    <!-- Angular App -->
    <script type="text/javascript" src="js/app.js"></script>
    <script type="text/javascript" src="js/controllers/personController.js"></script>
    <script type="text/javascript" src="js/controllers/newPersonController.js"></script>
    <script type="text/javascript" src="js/controllers/personDetailController.js"></script>
    <script type="text/javascript" src="js/controllers/personDetailController.js"></script>
    <script type="text/javascript" src="js/controllers/examController.js"></script>
    <script type="text/javascript" src="js/controllers/navBarController.js"></script>
    <script type="text/javascript" src="js/controllers/datepickerController.js"></script>
</head>

<body>
    <div id="wrapper" ng-controller="NavBarController as NavBar">
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                      <a class="navbar-brand" ng-click="NavBar.setTab(0)" href="#/">GOApp</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <ul class="nav navbar-nav">
                            <li ng-class="{active:NavBar.isTabSet(1)}"><a href="#/people" ng-click="NavBar.setTab(1)">People<span class="sr-only">(current)</span></a></li>
                            <li ng-class="{active:NavBar.isTabSet(2)}"><a href="#/about" ng-click="NavBar.setTab(2)">About</a></li>
                        </ul>
                        <ul class="nav navbar-nav navbar-right">
                            <li><a href="#">Link</a></li>
                            <li class="dropdown">
                                <a href="" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Stack<span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Quick Link</a></li>
                                    <li><a href="#">Edit Stack</a></li>
                                    <li><a href="" ng-click="NavBar.resetWaitList()">Reset</a></li>
                                    <li class="divider"></li>
                                    <li ng-repeat="person in NavBar.waitList">
                                        <a href="#/person/{{person.id}}">{{person.last_name}},{{person.first_name}}</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- Este espacio puede ser usado para el login info -->
                            <li><a href="<% URL::action('LoginController@logout')%>"><%% isset( Auth::user()->username) ? Auth::user()->username : 'Conectar' %%></a></li>
                        </ul>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        <div id="container-fluid" ng-view>

            <!-- All angular goes here -->

        </div>
    </div>
</body>
</html>
