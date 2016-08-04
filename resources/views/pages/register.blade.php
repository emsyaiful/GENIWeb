<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Daftar</title>
		@include('includes.head')
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body ng-app="mainApp">
	<div class="container" ng-controller="registerController">
		<div class="card card-container">
                <img id="profile-img" class="profile-img-card" src="images/logo_geni3.png" />
                <div ng-if="status.result == 'exist'" class="alert alert-danger text-center fadeInUp">Email sudah terdaftar</div>
                <form class="form-signin" name="form">
                    <input ng-model="data.user_name" type="text" name="user_name" id="inputNama" class="form-control" placeholder="Your Name" required autofocus>
                    <input ng-model="data.user_email" type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Email address" required>
                    <input ng-model="data.user_company" type="text" name="user_company" id="inputCName" class="form-control" placeholder="Your Company Name" required>
                    <input ng-model="data.user_typecompany" type="text" name="user_type" id="inputCType" class="form-control" placeholder="Your Company Type" required>
                    <textarea ng-model="data.user_useraddresscompany" placeholder="Your Company Address" id="inputCAddr" name="user_addr" class="form-control" required style="height:44px"></textarea>
                    <!-- <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> -->
                    <button ng-disabled="form.$invalid" class="btn btn-lg btn-primary btn-block btn-signin" ng-click="submit(data)">Sign Up</button>
                </form>
                Sudah punya akun? Masuk 
                <a href="#" class="forgot-password">
                    di sini
                </a>
            </div><!-- /card-container -->
	</div>
	</body>
</html>