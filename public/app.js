var app = angular.module('mainApp', ['ngRoute', 'ngDialog', 'ckeditor', 'ngStorage'])

app.service('fileUpload', function ($http, $rootScope, $localStorage, $location, $window) {
	$rootScope.loginRedirect = $location.$$host+':'+$location.$$port
	$http.defaults.headers.common['Authorization'] = $localStorage.token
	this.uploadFileToUrl = function(uploadUrl, fd, callback){
		$http.post(uploadUrl, fd, {
			transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
		}).success(function(data, status) {
            if (status == 200) {
                callback(null, data);
                if (data.error) {
                	swal('Error', data.error, 'error');
                }
            } else {
                callback(new Error('Galat mengakses data karena masalah backend. Hubungi administrator.'));
            }
        }).error(function() {
            callback(new Error('Galat mengakses data karena masalah jaringan. Silahkan refresh.'));
        })
	}
});


app.directive("passwordVerify", function() {
    return {
        require: "ngModel",
        scope: {
            passwordVerify: '='
        },
        link: function(scope, element, attrs, ctrl) {
            scope.$watch(function() {
                var combined;
                if (scope.passwordVerify || ctrl.$viewValue) {
                   combined = scope.passwordVerify + '_' + ctrl.$viewValue; 
                }                    
                return combined;
            }, function(value) {
                if (value) {
                    ctrl.$parsers.unshift(function(viewValue) {
                        var origin = scope.passwordVerify;
                        if (origin !== viewValue) {
                            ctrl.$setValidity("passwordVerify", false);
                            return undefined;
                        } else {
                            ctrl.$setValidity("passwordVerify", true);
                            return viewValue;
                        }
                    });
                }else{
                    ctrl.$setValidity("passwordVerify", false);
                    return undefined;
                }
            });
        }
    };
});

app.directive('fileModel', ['$parse', function ($parse) {
	return {
		restrict: 'A',
		link: function(scope, element, attrs) {
		  var model = $parse(attrs.fileModel);
		  var modelSetter = model.assign;
		  
		  element.bind('change', function(){
		     scope.$apply(function(){
		        modelSetter(scope, element[0].files[0]);
		     });
		  });
		}
	};
}]);

app.factory('store', function() {
    var savedData
    function set(data) {
        savedData = data;
    }
    function get() {
        return savedData;
    }
    return {
        set: set,
        get: get
    }

});

app.service('backend', function($http, $rootScope, $localStorage, $location, $window) {
	$rootScope.loginRedirect = $location.$$host+':'+$location.$$port
	$http.defaults.headers.common['Authorization'] = $localStorage.token
	this.get = function(address, data, callback) {
        $http.get(address, data).success(function(data, status) {
            if (status == 200) {
                callback(null, data);
                if (data.error) {
                	swal('Error', data.error, 'error');
                	$window.location.href = 'http://'+$rootScope.loginRedirect+'/login'
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
                	$window.location.href = 'http://'+$rootScope.loginRedirect+'/login'
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
                	$window.location.href = 'http://'+$rootScope.loginRedirect+'/login'
                }
            } else {
                callback(new Error('Galat mengakses data karena masalah backend. Hubungi administrator.'));
            }
        }).error(function() {
            callback(new Error('Galat mengakses data karena masalah jaringan. Silahkan refresh.'));
        })
    };
});

app.config(['$routeProvider', function($routeProvider, $window) {
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
    .when('/detailRiwayat', {
        templateUrl: 'ngView/detailriwayat.html',
        controller: 'detailRiwayatController'
    })
    .when('/userDemo', {
        templateUrl: 'ngView/userDemo.html',
        controller: 'demoController'
    })
    .when('/notFound', {
        templateUrl: 'ngView/404.html'
    })
    .otherwise({
        redirect: '/notFound'
    });
}]);
app.controller('headController', function($scope, backend, $localStorage, $window, $rootScope, $location) {
    $scope.reloadData = function() {
        backend.get('api/userLogged', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $scope.data = response;
                if ($scope.data.user_isadmin == 0) {
                    $window.location.href = 'http://'+$rootScope.loginRedirect+'/notfound'
                }
            }
        });
    }
    $scope.reloadData();
    $scope.logout = function() {
        delete $localStorage.token
        $window.location.href = 'http://'+$rootScope.loginRedirect+'/login'
    }
});
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
    $scope.reloadData = function() {
        backend.get('api/tagihan', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $scope.data = response;
            }
        });
    }
    $scope.reloadData()
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
    $scope.show = function($payment) {
        $rootScope.detail = $payment
        // console.log($scope.detail)
        ngDialog.open({
            template: 'ngView/dialog/detailPayslip.html',
            className: 'ngdialog-theme-default'
        });
    }
});
app.controller('riwayatBController', function($scope, backend, $rootScope, ngDialog, store, $location) {
    $scope.reloadData = function() {
        backend.get('api/getUser', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $scope.data = response;
            }
        });
    }
    $scope.reloadData()
    $scope.detail = function($path, $data) {
        store.set($data.user_email)
        $location.path($path)
    };
});
app.controller('detailRiwayatController', function($scope, backend, $rootScope, ngDialog, store) {
    $scope.reloadData = function() {
        backend.get('api/riwayat/'+store.get(), {}, function(err, response) {
            if (err) swal('Warning', 'Ada kesalahan dalam pengambilan data', 'warning');
            else {
                if (response.success) {
                    $scope.status = response.success
                }else
                    $scope.data = response;
            }
        });
    }
    $scope.reloadData()
    $scope.show = function($data) {
        $rootScope.detail = $data
        // console.log($scope.detail)
        ngDialog.open({
            template: 'ngView/dialog/detailPayslip.html',
            className: 'ngdialog-theme-default'
        });
    }
});
app.controller('beritaController', function($scope, backend, $rootScope, ngDialog, fileUpload) {
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
        var file = $scope.myFile;
        var fd = new FormData()
        fd.append('file', file)
        fd.append('title', $scope.berita.news_title)
        fd.append('content', $scope.berita.news_content)
        fd.append('news_id', $scope.berita.news_id)
        fileUpload.uploadFileToUrl('api/berita', fd, function(err, data) {
        if (err) swal('Error', err.toString(), 'error');
            else {
                $rootScope.reloadBerita()
                swal('Sukses', 'Berita diterbitkan', 'success');
                ngDialog.close()
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
            });
    }
});
app.controller('demoController', function($scope, backend, $rootScope, ngDialog, store) {
    $scope.reloadData = function() {
        backend.get('api/demo', {}, function(err, response) {
            if (err) swal('Warning', 'Ada kesalahan dalam pengambilan data', 'warning');
            else {
                $scope.data = response;
            }
        });
    }
    $scope.reloadData()
});
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

app.controller('viewBerita', function($scope, backend, $rootScope) {
    $scope.reloadBerita = function() {
        backend.get('api/beritaView', {}, function(err, response) {
            if (err) swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
            else {
                $rootScope.data = response;
            }
        });
    }
    $scope.reloadBerita()
});
app.controller('konfirmasiController', function($scope, backend, $rootScope, $http, fileUpload) {
    $scope.submit = function() {
    	var fd = new FormData()
        fd.append('file', $scope.myFile)
        fd.append('payment_username', $scope.conf.payment_username)
        fd.append('payment_email', $scope.conf.payment_email)
        fd.append('payment_bank', $scope.conf.payment_bank)
        fd.append('payment_month', $scope.conf.payment_month)
        fd.append('payment_description', $scope.conf.payment_description)
        fileUpload.uploadFileToUrl('api/konfirmasi', fd, function(err, data) {
        if (err) swal('Error', err.toString(), 'error');
            else {
                swal('Sukses', 'Konfirmasi berhasil dikirim', 'success');
            }
        });
    }
});