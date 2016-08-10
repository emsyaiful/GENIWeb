<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Pembayaran</title>
		@include('includes.head')
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body ng-app="mainApp">
	<div class="container" ng-controller="konfirmasiController">
		<div class="card card-container">
            <img id="profile-img" class="profile-img-card" src="images/logo_geni3.png" />
            <!-- <div ng-if="status.result == 'exist'" class="alert alert-danger text-center fadeInUp">Email sudah terdaftar</div> -->
            <h3 align="center">Konfirmasi Pembayaran</h3>
            <form class="form-signin" name="form">
                <select class="form-control" name="input_bank">
                    <option>Select Your Bank Account</option>
                    <option>BRI</option>
                    <option>BNI</option>
                    <option>Mandiri</option>
                    <option>BCA</option>
                </select><br>
                <textarea ng-model="conf.desc" placeholder="Your Description" id="inputDesc" name="input_desc" class="form-control" required style="height:44px"></textarea><br>
                <input ng-model="conf.pay" type="file" name="input_payslip" id="inputPayslip" class="form-control" required><br>
                <button ng-disabled="form.$invalid" class="btn btn-lg btn-primary btn-block btn-signin" ng-click="">Konfirmasi</button>
            </form>
        </div><!-- /card-container -->
	</div>
	</body>
</html>