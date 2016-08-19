app.controller('loginController', function($scope, $http, $rootScope, $localStorage, $location, $window) {
	$scope.submit = function() {
		$http.post('api/login', $scope.data, {}).success(function(data, status, headers, config) {
			$scope.status = status
			$scope.logged = data
			$localStorage.token = data.token
			if ($scope.logged.user_isadmin == 1) {
				$window.location.href = 'http://'+$location.$$host+':'+$location.$$port+'/dashboard#'
			}
			else{
				var pesan;
				$pesan = 'Selamat datang '+$scope.logged.user_name;
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
app.controller('resetController', function($scope, $http, $window, $rootScope, $location) {
	$rootScope.loginRedirect = $location.$$host+':'+$location.$$port
	$scope.submit = function() {
		$http.put('api/reset', $scope.data, {}).success(function(data, status, headers, config) {	
			swal('Sukses', 'Penggantian password berhasil', 'success');
			$window.location.href = 'http://'+$rootScope.loginRedirect+'/login'
        })
	};
});
app.controller('sendEmailController', function($scope, $http, $window, $rootScope, $location) {
	$scope.submit = function() {
		$http.post('api/sendmail', $scope.data, {}).success(function(data, status, headers, config) {	
			swal('Sukses', 'Silahkan cek pesan masuk di email anda', 'success');
        })
	};
});
