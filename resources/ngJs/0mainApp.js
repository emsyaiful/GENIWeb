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