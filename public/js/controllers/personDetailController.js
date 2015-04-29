var personDetailController = angular.module('personDetailControllerModule', []);

personDetailController.controller('personDetailController',['$routeParams',
                                                            '$http',
                                                            'page', function($routeParams, $http, page){

    var myCtrl = this;    
    myCtrl.personId = $routeParams.personId;
    myCtrl.personDtl = {};
    
    myCtrl.getPerson = function(id){
        $http.get("person/" + id)
        .success(function(data){            
                myCtrl.personDtl = data.person;
        })
        .error(function(){
            myCtrl.personDtl = {'personId' : myCtrl.personId, 'firstName': 'n/a', 'lastName': 'n/a'};            
        });
    };
    myCtrl.editPerson = function(id){
        $location.path('person/'+ id + "/edit");  
    }

    this.orderProp = 'date';
    myCtrl.getPerson(myCtrl.personId);
    page.setTitle('History');
}]);
