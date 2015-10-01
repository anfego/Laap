function config($stateProvider, $urlRouterProvider) {
    $urlRouterProvider.otherwise("/index");
    $stateProvider
        .state('index', {
            url: "/index",
            templateUrl: "views/index.html",
            data: {
                pageTitle: 'index'
            }
        })
        .state('ui', {
            abstract: true,
            url: "/ui",
            templateUrl: "views/common.html",
        })
        .state('forms', {
            abstract: true,
            url: "/forms",
            templateUrl: "views/common.html",
        }).
        state('patients', {
            abstract: true,
            url: "/forms",
            templateUrl: "views/common.html",
        })
        .state('patients.nuevoPaciente', {
            url: "/nuevoPaciente",
            templateUrl: "views/nuevoPaciente.html",
            controller: newPersonCtrl,
            data: {
                pageTitle: 'Nuevo'
            }
        })
        .state('patients.nuevoPaciente.step_generalInfo', {
            url: "/step_generalInfo",
            templateUrl: "views/newPatientForm/step_generalInfo.html",
            data: {
                pageTitle: 'Nuevo Paciente'
            }
        })
        .state('patients.nuevoPaciente.step_addresses', {
            url: "/step_addresses",
            templateUrl: "views/newPatientForm/step_addresses.html",
            data: {
                pageTitle: 'Nuevo Paciente'
            }
        })
        .state('patients.nuevoPaciente.step_contact', {
            url: "/step_contact",
            templateUrl: "views/newPatientForm/step_contact.html",
            data: {
                pageTitle: 'Nuevo Paciente'
            }
        })
        .state('patients.nuevoPaciente.step_verify', {
            url: "/step_verify",
            templateUrl: "views/newPatientForm/step_verify.html",
            data: {
                pageTitle: 'Nuevo Paciente'
            }
        })
        .state('patients.buscarPaciente', {
            url: "/buscarPaciente",
            templateUrl: "views/buscarPaciente.html",
            data: {
                pageTitle: 'Buscar Paciente'
            }
        })
}
angular
    .module('neuboard')
    .config(config)
    .run(function($rootScope, $state) {
        $rootScope.$state = $state;
    });
