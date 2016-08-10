var app = angular.module('mainApp', ['ngRoute', 'ngDialog', 'ckeditor'])

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
	.when('/berita', {
		templateUrl: 'ngView/berita.html',
		controller: 'beritaController'
	})
	.when('/pesanMasuk', {
		templateUrl: 'ngView/pesanMasuk.html',
		controller: 'pesanController'
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
                $http.get('api/getUser', {}).success(function(data, status, headers, config) {
                    $scope.user = data
                    $scope.status = status
                }) 
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
            ngDialog.close()
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
    $http.get('api/riwayat', {}).success(function(data, status, headers, config) {
        $scope.data = data
    }).error(function(data, status, headers, config){
        swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
    });
});
app.controller('beritaController', function($scope, $http, $rootScope, ngDialog) {
    $http.get('api/berita', {}).success(function(data, status, headers, config) {
        $rootScope.data = data
    }).error(function(data, status, headers, config){
        swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
    });
    $scope.options = {
        language: 'en',
        allowedContent: true,
        entities: false
    };
    $scope.submit = function($berita) {
        $http.post('api/berita', $berita, {}).success(function(data, status, headers, config) {
            ngDialog.close()
            swal('Sukses', 'Berita berhasil di publish', 'success');
             $http.get('api/berita', {}).success(function(data, status, headers, config) {
                $rootScope.data = data
            })
        }).error(function(data, status, headers, config){
            swal('Error', 'Ada kesalahan dalam pemasukan data', 'error');
        });
    }
    $scope.delete = function($berita) {
        swal({
            title: "Anda yakin?",
            text: "Berita "+$berita.news_title+" akan dihapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false },
            function(){
                $http.put('api/berita/'+$berita.news_id, {}, {}).success(function(data, status, headers, config) {
                    $http.get('api/berita', {}).success(function(data, status, headers, config) {
                        $scope.data = data
                    })
                    swal('Sukses', 'Berita berhasil dihapus', 'success');
                }).error(function(data, status, headers, config){
                    swal('Error', 'Ada kesalahan dalam pemasukan data', 'error');
                });
            });
    }
    $scope.edit = function($berita) {
        $rootScope.berita = $berita
        ngDialog.open({
            template: 'ngView/dialog/inputBeritaDialog.html',
            className: 'ngdialog-theme-default'
        });
    }
    $scope.new = function() {
        $rootScope.berita = null
        ngDialog.open({
            template: 'ngView/dialog/inputBeritaDialog.html',
            className: 'ngdialog-theme-default'
        });
    }
});
app.controller('inputBeritaController', function($scope, $http, $rootScope, ngDialog) {
    // $scope.options = {
    //     language: 'en',
    //     allowedContent: true,
    //     entities: false
    // };
    // $scope.submit = function($berita) {
    //     $http.post('api/berita', $berita, {}).success(function(data, status, headers, config) {
    //         $http.get('api/berita', {}).success(function(data, status, headers, config) {
    //         $rootScope.data = data
    //     })
    //         ngDialog.close()
    //         swal('Sukses', 'Berita berhasil di publish', 'success');
    //     }).error(function(data, status, headers, config){
    //         swal('Error', 'Ada kesalahan dalam pemasukan data', 'error');
    //     });
    // }
});
app.controller('pesanController', function($scope, $http, $rootScope, ngDialog) {
    $http.get('api/pesan', {}).success(function(data, status, headers, config) {
        $scope.data = data
    }).error(function(data, status, headers, config){
        swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
    });
    $scope.detail = function($pesan) {
        $rootScope.pesan = $pesan
        ngDialog.open({
            template: 'ngView/dialog/detailPesan.html',
            className: 'ngdialog-theme-default'
        });
    };
    $scope.delete = function($pesan) {
        swal({
            title: "Anda yakin?",
            text: "Pesan dari "+$pesan.contact_name+" akan dihapus!",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "Yes, delete it!",
            closeOnConfirm: false },
            function(){
                $http.put('api/pesan', $pesan, {}).success(function(data, status, headers, config) {
                    $http.get('api/pesan', {}).success(function(data, status, headers, config) {
                        $scope.data = data
                    })
                    swal('Sukses', 'Pengguna telah dihapus', 'success');
                }).error(function(data, status, headers, config){
                    swal('Error', 'Ada kesalahan dalam penghapusan data', 'error');
                });
            });
    }
});
app.controller('konfirmasiController', function($scope, $http, $rootScope, ngDialog) {
    $scope.message = 'ini konfirmasi '
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