var app = angular.module('mainApp', ['ngRoute'])

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider
	.when('/admin', {
		templateUrl: 'admin/adminPage.html',
		controller: 'adminController'
	})
}]);
app.controller('loginController', function($scope, $rootScope, $http) {	
	$scope.message = 'ini adalah login'
});

app.controller('adminController', function($scope) {
	$scope.message = 'ini adalah admin page'
});