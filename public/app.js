var app = angular.module('mainApp', ['ngRoute', 'ngDialog'])

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider
	.when('/mgUser', {
		templateUrl: 'ngView/mgUser.html',
		controller: 'mgUserController'
	})
}]);
app.controller('mgUserController', function($scope, $http, ngDialog) {
	$http.get('api/getUser', {}).success(function(data, status, headers, config) {
		$scope.user = data
		$scope.status = status
    }).error(function(data, status, headers, config){
    	swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
    });
    $scope.edit = function($user) {
    	console.log($user);
    	ngDialog.open({
    		template: 'ngView/dialog/editDialog.html',
    		className: 'ngdialog-theme-default'
    	});
    }
});

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
app.controller('registerController', function($scope, $http) {
	$scope.status = ''
	$scope.submit = function() {
		$http.post('api/register', $scope.data).success(function(data, status, headers, config) {
			
			if (data == 'exist') {
				$scope.status = data
			} else {
				swal('Sukses', 'Registrasi berhasil', 'success');
			}
        })
	};
});