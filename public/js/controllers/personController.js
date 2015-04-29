var personController = angular.module('personControllerModule', []);

personController.controller('personController', ['$scope',
                                                 '$http',
                                                 '$location',
                                                 'page',
                                                 function($scope,$http,$location,page){
    var myCtrl = this;
    myCtrl.persons;
    myCtrl.orderProp = 'last_name';

    myCtrl.getPersons = function(){
        $http.get("persons").success(function(data){
            myCtrl.persons = data;
        });
    };

    myCtrl.go = function(id){
        $location.path('person/'+id);  
    }

    myCtrl.add = function(){
        $location.path('person/new');
    }
    myCtrl.orderBy = function(value){
        if (value === 1) {
            myCtrl.orderProp = 'last_name';
        }
        else if(value === 2){
            myCtrl.orderProp = 'dob';
        };
    }
    myCtrl.getPersons();
    page.setTitle('Person');


}]);
