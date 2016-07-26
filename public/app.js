var app = angular.module('mainApp', ['ui.bootstrap', 'ngRoute', 'angular-loading', 'ngAnimate']);

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider.when('/admin', {
		templateUrl: '/admin/adminPage.html'
		controller: 'adminPageController'
	});
}]);
app.controller('adminPageController', function($rootScope, $scope, backend, $modal) {
	$scope.loadData = function() {
		backend.get('/getUser', {}, function(err, response){
			if (err) swal('Error', 'Ada kesalahan', 'error');
			else {
				$scope.data = response;
				console.log($scope.data);
			}
		});
	}
});