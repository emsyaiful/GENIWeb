var app = angular.module('mainApp', [])

// app.config(function ($routeProvider) {
// 	$routeProvider.when('/admin', {
// 		templateUrl: 'admin/adminPage.html',
// 		controller: 'adminPageController'
// 	})
// 	.otherwise({
// 		redirectTo: '/admin/adminPage.html'
// 	})
// });
app.controller('adminController', function($scope, $rootScope, $http) {
	$http({method: 'GET', url: 'getUser'})
	.success(function(data, status, headers, config) {
		$scope.data = data;
		$scope.loading = false;
	});
})