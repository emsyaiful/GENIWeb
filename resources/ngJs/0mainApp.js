var app = angular.module('mainApp', ['ngRoute', 'ngDialog', 'ckeditor', 'ngStorage', 'ngFileUpload'])

app.service('fileUpload', function ($http, $rootScope, $localStorage, $location, $window) {
	$rootScope.loginRedirect = $location.$$host+':'+$location.$$port
	$http.defaults.headers.common['Authorization'] = $localStorage.token
	this.uploadFileToUrl = function(title, content, file, uploadUrl, callback){
		var fd = new FormData()
		fd.append('file', file)
		fd.append('title', title)
		fd.append('content', content)
		$http.post(uploadUrl, fd, {
			transformRequest: angular.identity,
            headers: {'Content-Type': undefined}
		}).success(function(data, status) {
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
	}
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
}]);