<!DOCTYPE HTML>
<html lang="en">
	<head>
		<title>Pembayaran</title>
		@include('includes.head')
		<link href="css/login.css" rel="stylesheet">
        <style type="text/css">
            .fileUpload {
                position: relative;
                overflow: hidden;
                margin: 15px;
                width: 45%;
            }
            .fileUpload input.upload {
                position: absolute;
                width: 100%;
                top: 0;
                right: 0;
                margin: 0;
                padding: 0;
                font-size: 16px;
                cursor: pointer;
                opacity: 0;
                filter: alpha(opacity=0);
            }
        </style>
	</head>
	<body ng-app="mainApp">
	<div class="container" ng-controller="konfirmasiController">
		<div class="card card-container2">
            <img id="profile-img" class="profile-img-card" src="images/logo_geni3.png" />
            <!-- <div ng-if="status.result == 'exist'" class="alert alert-danger text-center fadeInUp">Email sudah terdaftar</div> -->
            <h3 align="center">Konfirmasi Pembayaran</h3>
            <form class="form-signin" name="form">
                <div class="row">
                    <div class="col-sm-6">
                        <input ng-model="conf.name" type="text" name="input_name" placeholder="Your Name" id="inputName" class="form-control" required>
                    </div>
                    <div class="col-sm-6">
                            <select class="form-control">
                                <option>Select Your Bank Account</option>
                                <option>BRI</option>
                                <option>BNI</option>
                                <option>Mandiri</option>
                                <option>BCA</option>
                            </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <input ng-model="conf.email" type="text" name="input_email" placeholder="Your Email" id="inputEmail" class="form-control" required>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" name="bulan" class="form-control" placeholder="Jumlah Bulan">
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <textarea ng-model="conf.desc" placeholder="Your Description" id="inputDesc" name="input_desc" class="form-control" required style="height:44px"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div class="fileUpload btn btn-primary">
                        <span>Upload Payslip</span>
                        <input id="uploadBtn" type="file" class="upload" name="input_payslip" required />
                    </div>
                    <label id="uploadFile"></label>
                </div>
                <button ng-disabled="form.$invalid" class="btn btn-lg btn-primary btn-block btn-signin" ng-click="">Konfirmasi</button>
            </form>
        </div><!-- /card-container -->
	</div>
	</body>
    <script type="text/javascript">
        document.getElementById("uploadBtn").onchange = function () {
            document.getElementById("uploadFile").innerHTML = this.value;
        };
    </script>
</html>