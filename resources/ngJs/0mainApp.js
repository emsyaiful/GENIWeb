var app = angular.module('mainApp', ['ngRoute'])

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider
	.when('/admin', {
		templateUrl: 'admin/adminPage.html',
		controller: 'adminController'
	})
}]);