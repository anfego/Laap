var NewPersonController = angular.module('NewPersonModule', []);

NewPersonController.controller('NewPersonController', ['$scope','$http', '$log', '$location', function($scope, $http, $log, $location){
    var myCtrl = this;
    myCtrl.person = {}
    this.processForm = function() {
        $http.post('person',myCtrl.person)
        .success(function(data) {
            console.log(data);
            if (!data.success) {
                // if not successful, bind errors to error variables
                $scope.errorName = data.errors.name;
                $scope.errorSuperhero = data.errors.superheroAlias;
            } else {
                // if successful, bind success message to message
                myCtrl.person.id = data.id;
                $location.path("person/"+ myCtrl.person.id)
            }

        })
        .error(function(){
            // console.log(data);
        })

    };
}]);
