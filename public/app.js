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
app.controller('adminPageController', function($rootScope, $scope, backend, $modal) {
	$scope.loadData = function() {
		backend.get('/getUser', {}, function(err, response){
			if (err) swal('Error', 'Ada kesalahan', 'error');
			else {
				$scope.data = response;
			}
		});
	}
});