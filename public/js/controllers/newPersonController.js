var NewPersonController = angular.module('NewPersonModule', []);

NewPersonController.controller('NewPersonController', ['$scope','$http', '$log', function($scope, $http, $log){
    this.person = {}
    this.processForm = function() {
        $http.post('person',this.person)
        .success(function(data) {
            console.log(data);
            if (!data.success) {
                // if not successful, bind errors to error variables
                $scope.errorName = data.errors.name;
                $scope.errorSuperhero = data.errors.superheroAlias;
            } else {
                // if successful, bind success message to message
                $scope.message = data.message;
            }

        })
        .error(function(){
            // console.log(data);
        })

    };
}]);
