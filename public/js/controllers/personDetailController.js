var personDetailController = angular.module('personDetailControllerModule', []);

personDetailController.controller('personDetailController',['$routeParams',
                                                            '$http',
                                                            '$location',
                                                            'page', 
                                                            function($routeParams, $http, $location, page){

    var myCtrl = this;    
    myCtrl.personId = $routeParams.personId;
    myCtrl.personDtl = {};
    
    myCtrl.getPerson = function(id){
        $http.get('person/' + id)
            .success(function(data){            
                myCtrl.personDtl = data.person;
        })
            .error(function(){
                myCtrl.personDtl = {};            
        });
    };
    myCtrl.editPerson = function(id){
        $location.path('person/'+ id + "/edit");  
    }
    myCtrl.addExam = function(id){
        $location.path('person/'+ id + "/exam");  
    };


    this.orderProp = 'date';
    myCtrl.getPerson(myCtrl.personId);
    page.setTitle('History');
}]);
