var NewPersonController = angular.module('NewPersonModule', []);

NewPersonController.controller('NewPersonController', ['$scope','$http', '$log', '$location', function($scope, $http, $log, $location){
    var myCtrl = this;
    myCtrl.person = {}
    this.processForm = function() {
        $http.post('person',myCtrl.person)
        .success(function(data) {
            myCtrl.person.id = data;
            $location.path("person/"+ myCtrl.person.id)
        })
        .error(function(){
            console.log(data);
        })

    };
}]);
