var NewPersonController = angular.module('NewPersonModule', []);

NewPersonController.controller('NewPersonController', ['$routeParams',
                                                       '$http',
                                                       '$log',
                                                       '$location', 
                                                       function($routeParams, $http, $log, $location){
    var myCtrl = this;
    myCtrl.person = {}
    
    myCtrl.personId = $routeParams.personId;
    if (myCtrl.personId === null || myCtrl.personId === undefined) {
        myCtrl.personId = -1;
    };

    this.processForm = function() {
        $http.post('person',myCtrl.person)
        .success(function(data) {
            if (data.success) {
                myCtrl.person.id = data.id;
                $location.path("person/"+ myCtrl.person.id)
            } else {
                console.log("There was a problem creating person");    
            };
        })
        .error(function(){
            console.log("No response from");
        })
    };
    myCtrl.getPerson = function(id){
        $http.get("person/" + id)
            .success(function(data){     
                myCtrl.person.personal_Id = Number(myCtrl.person.personal_Id);
                var dob = new Date(myCtrl.person.dob);
                myCtrl.person.dob = dob;
        })
            .error(function(){
                myCtrl.person = {'person_Id' : myCtrl.person_Id, 'first_name': '', 'last_name': ''};            
        });
    };
    
    if(myCtrl.personId > 0) {
        myCtrl.getPerson(myCtrl.personId);
    }
}]);
