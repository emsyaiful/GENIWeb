app.controller('loginController', function($scope, $http, $rootScope, $localStorage, $rootScope, $location, $window) {
	$scope.submit = function() {
		$http.post('api/login', $scope.data, {}).success(function(data, status, headers, config) {
			$scope.status = status
			$rootScope.logged = data
			$localStorage.token = data.token
			if ($rootScope.logged.user_isadmin == 1) {
				$window.location.href = 'http://'+$location.$$host+':'+$location.$$port+'/dashboard#/mgUser'
			}
			else{
				var pesan;
				$pesan = 'Selamat datang '+$rootScope.logged.user_name;
				swal('Sukses', $pesan, 'success')
			}
        }).error(function(data, status, headers, config){
        	$scope.status = status
        });
	};
});
app.controller('registerController', function($scope, $http, $window, $rootScope, $location) {
	$rootScope.loginRedirect = $location.$$host+':'+$location.$$port
	$scope.status = ''
	$scope.submit = function() {
		$http.post('api/register', $scope.data, {}).success(function(data, status, headers, config) {	
			if (data.result == 'exist') {
				$scope.status = data
			} else {
				swal('Sukses', 'Registrasi berhasil', 'success');
				$window.location.href = 'http://'+$rootScope.loginRedirect+'/login'
			}
        })
	};
});