var app = angular.module('mainApp', ['ui.bootstrap', 'ngRoute', 'angular-loading', 'ngAnimate']);

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider.when('/admin', {
		templateUrl: '/admin/adminPage.html'
		controller: 'adminPageController'
	});
}]);