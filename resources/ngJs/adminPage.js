app.controller('adminController', function($scope, $rootScope, $http) {
	$http({method: 'GET', url: 'getUser'})
	.success(function(data, status, headers, config) {
		$scope.data = data;
		$scope.loading = false;
	});
})