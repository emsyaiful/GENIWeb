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