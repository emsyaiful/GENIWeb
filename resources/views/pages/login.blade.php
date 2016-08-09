<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Masuk</title>
		@include('includes.head')
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body ng-app="mainApp">
	<div class="container" ng-controller="loginController">
		<div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="images/logo_geni3.png" />
                <div ng-if="status == 401" class="alert alert-danger text-center fadeInUp">Username atau password salah</div>
                <form class="form-signin" name="form">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input ng-model="data.user_email" type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
                    <input ng-model="data.password" type="password" name="password" id="inputPassword" class="form-control" placeholder="Password" required>
                    <!-- <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> -->
                    <button  ng-disabled="form.$invalid" class="btn btn-lg btn-primary btn-block btn-signin" ng-click="submit(data)">Sign in</button>
                </form><!-- /form -->
                Belum punya akun? Daftar 
                <a href="/register" class="forgot-password">
                    di sini
                </a>
            </div><!-- /card-container -->
	</div>
	</body>
</html>