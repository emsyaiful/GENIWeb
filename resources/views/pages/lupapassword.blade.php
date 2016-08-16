<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Lupa Password</title>
		@include('includes.head')
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body ng-app="mainApp">
	<div class="container" ng-controller="loginController">
		<div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="images/logo_geni3.png" />
                <label>Masukkan Email Anda</label>
                <!-- <div ng-if="status == 401" class="alert alert-danger text-center fadeInUp">Username atau password salah</div> -->
                <form class="form-signin" name="form">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input ng-model="data.user_email" type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <button  ng-disabled="form.$invalid" class="btn btn-lg btn-primary btn-block btn-signin" ng-click="submit(data)">Kirim</button>
                </form><!-- /form -->
            </div><!-- /card-container -->
	</div>
	</body>
</html>