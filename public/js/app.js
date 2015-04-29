var app = angular.module('goApp', ['personControllerModule',
                                    'personDetailControllerModule',
                                    'NewPersonModule',
                                    'NavBarModule',
                                    'ngRoute']);

app.factory('page', function(){
    var title = 'default';
    return {
        title: function() {return title; },
        setTitle: function(newTitle) { title = newTitle}
    };
});

app.config(['$routeProvider',
   function($routeProvider) {
        $routeProvider
            .when('/',{
                templateUrl: 'js/templates/main.html',
                controller:'personController'
            })
            .when('/people',{
                templateUrl: 'js/templates/people.html',
                controller:'personController'
            })
            .when('/about',{
                templateUrl: 'js/templates/about.html',
                controller:'personController'
            })
            .when('/person/new',{
                templateUrl: 'js/templates/personNew.html',
                controller:'personController'
            })
            .when('/person/:personId',{
                templateUrl: 'js/templates/person.html',
                controller:'personDetailController'
            })
            .otherwise({
                redirectTo: '/'
            });
    }
]);

app.controller('mainCtrl', function mainCtrl($scope, page) {
  $scope.page = page;
});