<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Daftar</title>
		@include('includes.head')
		<link href="css/login.css" rel="stylesheet">
	</head>
	<body ng-app="mainApp">
	<div class="container" ng-controller="loginController">
		<div class="card card-container">
                <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                <img id="profile-img" class="profile-img-card" src="images/logo_geni3.png" />
                <p id="profile-name" class="profile-name-card"></p>
                <form class="form-signin">
                    <span id="reauth-email" class="reauth-email"></span>
                    <input type="text" name="user_name" id="inputNama" class="form-control" placeholder="Your Name" required autofocus>
                    <input type="email" name="user_email" id="inputEmail" class="form-control" placeholder="Email address" required>
                    <input type="text" name="user_company" id="inputCName" class="form-control" placeholder="Your Company Name" required>
                    <input type="text" name="user_type" id="inputCType" class="form-control" placeholder="Your Company Type" required>
                    <textarea placeholder="Your Company Address" id="inputCAddr" name="user_addr" required></textarea>
                    <!-- <div id="remember" class="checkbox">
                        <label>
                            <input type="checkbox" value="remember-me"> Remember me
                        </label>
                    </div> -->
                    <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit">Sign Up</button>
                </form><!-- /form -->
                Sudah punya akun? Masuk 
                <a href="#" class="forgot-password">
                    di sini
                </a>
            </div><!-- /card-container -->
	</div>
	</body>
</html>