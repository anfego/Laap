var NewPersonController = angular.module('NewPersonControllerModule', []);

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
        // checks if person.id NOT exist so it is create person
        if (myCtrl.personId === -1) {
            // create person
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
        } else {
            // edit person
            $http.put('person/'+ myCtrl.person.id,myCtrl.person)
            .success(function(data) {
                if (data.success) {
                    myCtrl.person.id = data.id;
                    $location.path("person/"+ myCtrl.person.id)
                } else {
                    console.log("There was a problem creating person");    
                };
            })
            .error(function(){
                console.log("No response from Server");
            })};
    };
    myCtrl.getPerson = function(id){
        $http.get("person/" + id)
            .success(function(data){     
                myCtrl.person = data.person;
                myCtrl.person.id = Number(myCtrl.person.id);
                myCtrl.person.personal_id = Number(myCtrl.person.personal_id);
                var dob = new Date(myCtrl.person.dob);
                myCtrl.person.dob = dob;
        })
            .error(function(){
                myCtrl.person = {'person_Id' : myCtrl.person_Id, 'first_name': '', 'last_name': ''};            
        });
    };
    
    if(myCtrl.personId >= 0) {
        myCtrl.getPerson(myCtrl.personId);
    }
}]);
