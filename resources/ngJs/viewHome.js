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