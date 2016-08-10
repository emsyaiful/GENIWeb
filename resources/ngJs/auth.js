app.controller('loginController', function($scope, $http, $rootScope, $localStorage) {
	$scope.submit = function() {
		$http.post('api/login', $scope.data, {}).success(function(data, status, headers, config) {
			$scope.user = data
			$scope.status = status
			$localStorage.token = data.token
        }).error(function(data, status, headers, config){
        	$scope.status = status
        });
	};
});
app.controller('registerController', function($scope, $http) {
	$scope.status = ''
	$scope.submit = function() {
		$http.post('api/register', $scope.data, {}).success(function(data, status, headers, config) {	
			if (data == 'exist') {
				$scope.status = data
			} else {
				swal('Sukses', 'Registrasi berhasil', 'success');
			}
        })
	};
});