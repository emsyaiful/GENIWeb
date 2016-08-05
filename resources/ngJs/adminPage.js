app.controller('mgUserController', function($scope, $http, ngDialog) {
	$http.get('api/getUser', {}).success(function(data, status, headers, config) {
		$scope.user = data
		$scope.status = status
    }).error(function(data, status, headers, config){
    	swal('Error', 'Ada kesalahan dalam pengambilan data', 'error');
    });
    $scope.edit = function($user) {
    	console.log($user);
    	ngDialog.open({
    		template: 'ngView/dialog/editDialog.html',
    		className: 'ngdialog-theme-default'
    	});
    }
});
