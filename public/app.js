var app = angular.module('mainApp', ['ngRoute', 'ngDialog'])

app.config(['$routeProvider', function($routeProvider) {
	$routeProvider
	.when('/mgUser', {
		templateUrl: 'ngView/mgUser.html',
		controller: 'mgUserController'
	})
	.when('/tagihan', {
		templateUrl: 'ngView/tagihan.html',
		controller: 'tagihanController'
	})
	.when('/daftarBayar', {
		templateUrl: 'ngView/daftarBayar.html',
		controller: 'daftarBController'
	})
	.when('/riwayatBayar', {
		templateUrl: 'ngView/riwayatBayar.html',
		controller: 'riwayatBController'
	})
}]);
app.controller('mgUserController', function($scope, $http, $rootScope, ngDialog) {
	$http.get('api/getUser', {}).success(function(data, status, headers, config) {
		$scope.user = data
		$scope.status = status
    }).error(function(data, status, headers, config){
    	swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
    });
    $scope.edit = function($user) {
    	$rootScope.editUser = $user
    	ngDialog.open({
    		template: 'ngView/dialog/editDialog.html',
    		className: 'ngdialog-theme-default'
    	});
    }
    $scope.delete = function($user) {
        swal({
            title: "Anda yakin?",
            text: "Pengguna "+$user.user_name+" akan dihapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false },
            function(){
                $http.put('api/delUser', $user, {}).success(function(data, status, headers, config) {   
            swal('Sukses', 'Pengguna telah dihapus', 'success');
                }).error(function(data, status, headers, config){
                    swal('Error', 'Ada kesalahan dalam penghapusan data', 'error');
                });
            });
    }
});
app.controller('edtUserController', function($scope, $http, $rootScope, ngDialog) {
    $scope.submit = function() {
        $http.put('api/alterUser', $scope.editUser, {}).success(function(data, status, headers, config) {   
            swal('Sukses', 'Penyuntingan data berhasil', 'success');
        }).error(function(data, status, headers, config){
            swal('Error', 'Ada kesalahan dalam penyuntingan data', 'error');
        });
    }
});
app.controller('tagihanController', function($scope, $http, $rootScope, ngDialog) {
    $scope.message = 'ini pesan tagihan'
});
app.controller('daftarBController', function($scope, $http, $rootScope, ngDialog) {
    $http.get('api/payment', {}).success(function(data, status, headers, config) {
        $scope.data = data
    }).error(function(data, status, headers, config){
        swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
    });
    $scope.confirm = function($payment) {
        $http.put('api/payment', $payment, {}).success(function(data, status, headers, config) {
            $http.get('api/payment', {}).success(function(data, status, headers, config) {
                $scope.data = data
            })
            swal('Sukses', 'Konfirmasi pembayaran berhasil', 'success');
        }).error(function(data, status, headers, config){
            swal('Error', 'Ada kesalahan dalam pemasukan data', 'error');
        });
    }
});
app.controller('riwayatBController', function($scope, $http, $rootScope, ngDialog) {
    $scope.message = 'ini pesan tagihan'
});

app.controller('loginController', function($scope, $http) {
	$scope.submit = function() {
		$http.post('api/login', $scope.data, {}).success(function(data, status, headers, config) {
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
		$http.post('api/register', $scope.data, {}).success(function(data, status, headers, config) {	
			if (data == 'exist') {
				$scope.status = data
			} else {
				swal('Sukses', 'Registrasi berhasil', 'success');
			}
        })
	};
});