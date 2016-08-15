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
app.controller('konfirmasiController', function($scope, backend, $rootScope, ngDialog) {
    $scope.submit = function() {
    	console.dir($scope.myFile)
    	console.log($scope.conf)
    	// fileUpload.uploadFileToUrl($scope.berita.news_title, $scope.berita.news_content, file, 'api/berita', function(err, data) {
     //    if (err) swal('Error', err.toString(), 'error');
     //        else {
     //            $rootScope.reloadBerita()
     //            swal('Sukses', 'Konfirmasi telat terkirim', 'success');
     //        }
     //    });
    }
});