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
            myCtrl.persons.forEach(function(person){
                person.color = "pacient"
                person.color = myCtrl.getColor(person.lastName);
            });
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
    myCtrl.getColor = function(value){
        value = value.toLowerCase();
        var initial = value[0];
        var color = "pacient";
        switch (initial){
            case "q":
            case "w":
            case "e":
            case "s":
                color = "alkaline";
                break;
            case "t":
            case "u":
                color = "lanthanoid-earth";
                break;
            case "i":
            case "o":
            case "p":
                color = "actinoid";
                break;
            case "s":
            case "c":
            case "d":
                color = "transition";
                break;
            case "g":
            case "h":
            case "j":
                color = "post-transition";
                break;
            case "k":
            case "l":
            case "z":
                color = "metalloid";
                break;
            case "x":
            case "v":
            case "b":
                color = "nonmetal";
                break;
            case "n":
            case "y":
            case "f":
                color = "noble-gas";
                break;
            case "m":
            case "a":
                color = "halogen";
                break;

        }
        return color;
    }
    myCtrl.getPersons();
    page.setTitle('Person');
}]);
