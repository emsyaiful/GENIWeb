var app = angular.module('mainApp', ['ui.bootstrap', 'ngRoute', 'infinite-scroll', 'angular-loading-bar', 'ngAnimate']);
app.config(['$routeProvider', function($routeProvider){
	$routeProvider.when('/user', {
		templateUrl: '/viewUser.html'
		controller: 'getUserController'
	});
}]);