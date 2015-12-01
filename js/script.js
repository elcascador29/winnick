var app = angular.module('MonApp', [
    'ui.router', 'ngResource'
])

        .config(['$urlRouterProvider', '$stateProvider', '$httpProvider', function($urlRouterProvider, $stateProvider, $httpProvider) {
                $urlRouterProvider.otherwise('/');

                $stateProvider
                        .state('home', {
                            url: '/',
                            templateUrl: 'templates/index.html',
                            controller: 'indexCtrl'
                        })
                        .state('users-in', {
                            url: '/users-in',
//                            abstract: true,

                            templateUrl: 'templates/users/index.html',
                            controller: 'usersCtrl'
                        })
                        .state('users-out', {
                            url: '/users-out',
//                            abstract: true,

                            templateUrl: 'templates/users/index.html',
                            controller: 'usersCtrl'
                        })
                        .state('gdc', {
                            url: '/gdc',
//                            abstract: true,

                            templateUrl: 'templates/gdc/index.html',
                            controller: 'gdcCtrl'
                        })
                        .state('war', {
                            url: '/gdc/war/:id',
//                            abstract: true,

                            templateUrl: 'templates/gdc/war.html',
                            controller: 'gdcCtrl'
                        })
                        

            }]);