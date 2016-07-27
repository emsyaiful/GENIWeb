var app = angular.module('mainApp', ['ngRoute'])

app.config(function ($routeProvider) {
	$routeProvider.when('/admin', {
		templateUrl: 'admin/admin.blade.php',
		controller: 'adminUserController'
	})
	.otherwise({
		redirectTo: '/admin/adminPage.html'
	})
});