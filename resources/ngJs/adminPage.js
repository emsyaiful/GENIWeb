app.controller('adminPageController', function($rootScope, $scope, backend, $modal) {
	$scope.loadData = function() {
		backend.get('/getUser', {}, function(err, response){
			if (err) swal('Error', 'Ada kesalahan', 'error');
			else {
				$scope.data = response;
			}
		});
	}
});