<?php
if(!empty($_POST)){
	error_reporting(3);
	include("../../connections/config.php");
	$npk = $_POST['npk'];
	$password = md5($_POST['password']);
	$inputLogin = $_POST['login'];

	$sql = "SELECT * FROM el_user WHERE user_npk ='" . $npk . "' AND user_password = '" . $password . "' ";
	$login = sqlsrv_query($conn, $sql, array(), array("Scrollable" => 'static'));

	$fetch = sqlsrv_fetch_array($login);



	$count = sqlsrv_num_rows($login);


	if ($count > 0) {
		$date = date("Y-m-d H:i:s");
		$sql = "UPDATE el_user SET user_last_login='$date' WHERE user_npk=$npk";
		$sql = sqlsrv_query($conn, $sql);
		
		session_start();
		$_SESSION['npk'] = $npk;
		$_SESSION['user_nama'] = $fetch['user_nama'];
		$_SESSION['status'] = $fetch['user_admin'];
		$_SESSION['user_gol'] = !empty($fetch['user_gol'])?$fetch['user_gol']:1;
		
		// header("location:../../index.php");
		header("location:../../loading.html");
	} else {
		$_SESSION['status'] = 0;
		function error(){
			return "show";
		}
	}
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Login</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--===============================================================================================-->
    <link rel="icon" type="image/png" href="assets/img/a.png">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
	<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<!--===============================================================================================-->
</head>

<body>


	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
				<div class="login100-form-title" style="background-image: url(images/hyu.jpg);">
					<span class="login100-form-title-1">
						AAIJ Learning
					</span>
				</div>
				<div style="display: none;" class="failed-login">
					Your NPK or Paswword Wrong!
				</div>

				<form class="validate-form" action="" method="post">

					<div class="login100-form" style="padding-bottom:15px;">
						<div class="wrap-input100 validate-input m-b-26">
							<span class="label-input100">NPK</span>
							<input class="input100" type="text" name="npk" placeholder="Enter NPK">
							<span class="focus-input100"></span>
						</div>

						<div class="wrap-input100 validate-input m-b-18">
							<span class="label-input100">Password</span>
							<input class="input100" type="password" name="password" placeholder="Enter password">
							<span class="focus-input100"></span>
						</div>

						<div class="flex-sb-m w-full p-b-30">
							<div class="contact100-form-checkbox">
								<inpu class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
								<label class="label-checkbox100" for="ckb1">
									Remember me
								</label>
							</div>

							<!-- Button trigger modal -->
							<button type="button" class="btn btn-link" data-toggle="modal" data-target="#forgotModal">
								Forgot Password?
							</button>
						</div>
					</div>

					<div class="text-center">
						<input type="submit" style="width: 50px; text-align:center; font-size:25px; display:unset; margin-bottom:50px;" class="login100-form-btn" name="login" value="Login">
					</div>

					<!-- Modal -->
					<div class="modal fade" id="forgotModal" tabindex="-1" role="dialog" aria-labelledby="forgotModalLabel" aria-hidden="true">
					<div class="modal-dialog" role="document">
						<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="forgotModalLabel">Forgot Password</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							Silahkan hubungi admin bagian HRD untuk mengatur ulang password anda.
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
						</div>
					</div>
					</div>

				</form>

			</div>
		</div>
	</div>
	
		

	<!--===============================================================================================-->
	<script src="vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/animsition/js/animsition.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/bootstrap/js/popper.js"></script>
	<script src="vendor/bootstrap/js/bootstrap.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/select2/select2.min.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/daterangepicker/moment.min.js"></script>
	<script src="vendor/daterangepicker/daterangepicker.js"></script>
	<!--===============================================================================================-->
	<script src="vendor/countdowntime/countdowntime.js"></script>
	<!--===============================================================================================-->
	<script src="js/main.js"></script>
</body>

</html>