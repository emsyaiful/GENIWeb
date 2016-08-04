var app = angular.module('mainApp', ['ngRoute'])

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider
	.when('/admin', {
		templateUrl: 'admin/adminPage.html',
		controller: 'adminController'
	})
}]);

app.controller('loginController', function($scope, $http) {
	$scope.submit = function() {
		$http.post('api/login', $scope.data).success(function(data, status, headers, config) {
			$scope.user = data
			$scope.status = status
        }).error(function(data, status, headers, config){
        	$scope.status = status
        	console.log($scope.status)
        });
	};
});