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
