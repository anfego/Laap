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
                person.color = myCtrl.getColor(person.last_name);
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
                color = "alkali";
                break;
            case "t":
            case "o":
            case "p":
                color = "alkaline-earth";
                break;
            case "i":
            case "u":
                color = "actinoid";
                break;
            case "h":
            case "s":
            case "c":
                color = "transition";
                break;
            case "k":
            case "n":
            case "z":
                color = "post-transition";
                break;
            case "v":
            case "j":
                color = "metalloid";
                break;
            case "x":
            case "g":
            case "b":
                color = "nonmetal";
                break;
            case "y":
            case "l":
            case "d":
                color = "noble-gas";
                break;
            case "f":
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
