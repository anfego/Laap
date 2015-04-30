var ExamController = angular.module('ExamControllerModule', []);

ExamController.controller('ExamController',['$routeParams',
                                            '$http',
                                            '$location',
                                            'page', function($routeParams, $http, $location, page){

    var myCtrl = this;    
    myCtrl.exam = {};
   
    myCtrl.personId = -1;
    myCtrl.examId = -1;
    myCtrl.mode = "";

    if ($routeParams.examId !== undefined) {
        myCtrl.examId = $routeParams.examId;
        myCtrl.mode = "Edit";
        myCtrl.getExam(myCtrl.examId);
    } else if ($routeParams.personId !== undefined) {
        myCtrl.personId =  $routeParams.personId;
        myCtrl.mode = "New Exam";
    }

    myCtrl.getExam = function(id){
        $http.get('exam/' + id)
            .success(function(data){            
                myCtrl.exam = data.exam;
        })
            .error(function(){
                myCtrl.exam = {};
        });
    };
    myCtrl.editExam = function(id){
        $location.path('exam/'+ id + '/edit');  
    }
    myCtrl.save = function(){
        if (myCtrl.personId > -1) {
            $location.path('exam/'+ myCtrl.personId);  
        };
    };
    
    page.setTitle('GOApp::Exam');
}]);
