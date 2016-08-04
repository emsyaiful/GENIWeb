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