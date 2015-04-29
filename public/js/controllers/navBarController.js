var NavBarController = angular.module('NavBarModule', []);

NavBarController.controller('NavBarController', ['$scope', '$http', '$location', 'page', function($scope,$http,$location,page){
    
    this.tab = 1;
    this.waitList = [];
    // Set the value of tab
    this.setTab = function(value){
        this.tab = value;
    };
    
    // Returns true if tab index is set
    this.isTabSet = function(value){
        return this.tab === value;
    };
    this.addPerson = function(person){
        this.waitList.push(person);
    };
    this.resetWaitList = function(){
        this.waitList = [];
    };

}]);
