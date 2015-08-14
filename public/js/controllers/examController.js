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
    } 
    else if ($routeParams.personId !== undefined) {
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
            $http.post('exam/'+ myCtrl.personId+'/new',myCtrl.exam)
            .success(function(data) {
                if (data.success) {
                    myCtrl.exam.id = data.id;
                    $location.path("person/"+ myCtrl.personId)
                    console.log("Exam Created");    
                } else {
                    console.log("There was a problem creating exam");    
                };
            })
            .error(function(){
                console.log("No response from service");
            })};
        };
    
    page.setTitle('GOApp::Exam');
}]);
