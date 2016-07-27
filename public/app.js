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
app.controller('adminController', function($scope, $rootScope, $http) {
	$http({method: 'GET', url: 'getUser'})
	.success(function(data, status, headers, config) {
		$scope.data = data;
		$scope.loading = false;
	});
})