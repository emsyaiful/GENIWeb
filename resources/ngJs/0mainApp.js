var app = angular.module('mainApp', ['ngRoute']);

app.config(function ($routeProvider) {
	$routeProvider.when('/admin', {
		templateUrl: 'admin/adminPage.html',
		controller: 'adminPageController'
	})
	.otherwise({
		redirectTo: '/admin/adminPage.html'
	})
});