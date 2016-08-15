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
        console.dir(file);
        console.log($scope.berita)
        fileUpload.uploadFileToUrl($scope.berita.news_title, $scope.berita.news_content, file, 'api/berita', function(err, data) {
        if (err) swal('Error', err.toString(), 'error');
            else {
                $rootScope.reloadBerita()
                swal('Sukses', 'Berita diterbitkan', 'success');
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