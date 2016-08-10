var app = angular.module('mainApp', ['ngRoute', 'ngDialog', 'ckeditor', 'ngStorage'])

app.service('backend', function($http, $rootScope, $localStorage, $location, $window) {
	$http.defaults.headers.common['Authorization'] = $localStorage.token
	this.get = function(address, data, callback) {
        $http.get(address, data).success(function(data, status) {
            if (status == 200) {
                callback(null, data);
                if (data.error) {
                	swal('Error', data.error, 'error');
                	$rootScope.errRedirect = $location.$$host+':'+$location.$$port
                	$window.location.href = 'http://'+$rootScope.errRedirect+'/login'
                }
            } else {
                callback(new Error('Galat mengakses data karena masalah backend. Hubungi administrator.'));
            }
        }).error(function() {
            callback(new Error('Galat mengakses data karena masalah jaringan. Silahkan refresh.'));
        })
    };
    this.post = function(address, data, callback, config) {
        $http.post(address, data).success(function(data, status) {
            if (status == 200) {
                callback(null, data);
                if (data.error) {
                	swal('Error', data.error, 'error');
                	$rootScope.errRedirect = $location.$$host+':'+$location.$$port
                	$window.location.href = 'http://'+$rootScope.errRedirect+'/login'
                }
            } else {
                callback(new Error('Galat mengakses data karena masalah backend. Hubungi administrator.'));
            }
        }).error(function() {
            callback(new Error('Galat mengakses data karena masalah jaringan. Silahkan refresh.'));
        })
    };
    this.put = function(address, data, callback) {
        $http.put(address, data).success(function(data, status) {
            if (status == 200) {
                callback(null, data);
                if (data.error) {
                	swal('Error', data.error, 'error');
                	$rootScope.errRedirect = $location.$$host+':'+$location.$$port
                	$window.location.href = 'http://'+$rootScope.errRedirect+'/login'
                }
            } else {
                callback(new Error('Galat mengakses data karena masalah backend. Hubungi administrator.'));
            }
        }).error(function() {
            callback(new Error('Galat mengakses data karena masalah jaringan. Silahkan refresh.'));
        })
    };
});

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
app.controller('mgUserController', function($scope, $rootScope, ngDialog, backend) {
    $scope.reloadData = function() {
        backend.get('api/getUser', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $scope.user = response;
            }
        });
    }
    $scope.reloadData();
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
                backend.put('api/delUser', $user, function(err, data) {
                    if (err) swal('Error', err.toString(), 'error');
                    else {
                        $scope.reloadData()
                        swal('Sukses', 'Akun telah dihapus', 'success');
                    }
                });
            });
    }
});
app.controller('edtUserController', function($scope, backend, $rootScope, ngDialog) {
    $scope.submit = function() {
        backend.put('api/alterUser', $scope.editUser, function(err, data) {
            if (err) swal('Error', err.toString(), 'error');
            else {
                swal('Sukses', 'Penyimpanan data sukses', 'success');
                ngDialog.close()
            }
        });
    }
});
app.controller('tagihanController', function($scope, backend, $rootScope, ngDialog) {
    $scope.message = 'ini pesan tagihan'
});
app.controller('daftarBController', function($scope, backend, $rootScope, ngDialog) {
    $scope.reloadData = function() {
        backend.get('api/payment', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $scope.data = response;
            }
        });
    }
    $scope.reloadData()
    $scope.confirm = function($payment) {
        backend.put('api/payment', $payment, function(err, data) {
            if (err) swal('Error', err.toString(), 'error');
            else {
                $scope.reloadData()
                swal('Sukses', 'Pembayaran telah dikonfirmasi', 'success');
            }
        });
    }
});
app.controller('riwayatBController', function($scope, backend, $rootScope, ngDialog) {
    $scope.reloadData = function() {
        backend.get('api/riwayat', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $scope.data = response;
            }
        });
    }
    $scope.reloadData()
});
app.controller('beritaController', function($scope, backend, $rootScope, ngDialog) {
    $rootScope.reloadBerita = function() {
        backend.get('api/berita', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $rootScope.data = response;
            }
        });
    }
    $rootScope.reloadBerita()
    $scope.options = {
        language: 'en',
        allowedContent: true,
        entities: false
    };
    $scope.submit = function($berita) {
        backend.post('api/berita', $berita, function(err, data) {
            if (!err) {
                ngDialog.close()
                swal('Sukses', 'Penambahan data sukses', 'success');
                $rootScope.reloadBerita()
            } else {
                swal('Error', 'Penambahan data gagal', 'error');
            }
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
                backend.put('api/berita/'+$berita.news_id, {}, function(err, data) {
                    if (err) swal('Error', err.toString(), 'error');
                    else {
                        $rootScope.reloadBerita()
                        swal('Sukses', 'Berita dihapus', 'success');
                    }
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
app.controller('pesanController', function($scope, backend, $rootScope, ngDialog) {
    $scope.reloadData = function() {
        backend.get('api/pesan', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $scope.data = response;
            }
        });
    }
    $scope.reloadData()
    // $http.get('api/pesan', {}).success(function(data, status, headers, config) {
    //     $scope.data = data
    // }).error(function(data, status, headers, config){
    //     swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
    // });
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
                backend.put('api/pesan', $pesan, function(err, data) {
                    if (err) swal('Error', err.toString(), 'error');
                    else {
                        $scope.reloadData()
                        swal('Sukses', 'Pesan dihapus', 'success');
                    }
                });
                // $http.put('api/pesan', $pesan, {}).success(function(data, status, headers, config) {
                //     $http.get('api/pesan', {}).success(function(data, status, headers, config) {
                //         $scope.data = data
                //     })
                //     swal('Sukses', 'Pengguna telah dihapus', 'success');
                // }).error(function(data, status, headers, config){
                //     swal('Error', 'Ada kesalahan dalam penghapusan data', 'error');
                // });
            });
    }
});
app.controller('konfirmasiController', function($scope, backend, $rootScope, ngDialog) {
    $scope.message = 'ini konfirmasi '
});
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