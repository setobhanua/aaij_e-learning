<!-- 
=========================================================
Light Bootstrap Dashboard PRO - v2.0.1
=========================================================

Product Page: https://www.creative-tim.com/product/light-bootstrap-dashboard-pro
Copyright 2019 Creative Tim (https://www.creative-tim.com)

Coded by Creative Tim

=========================================================

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software. -->

<?php
session_start();
if ($_SESSION["npk"] == ""){
	header ("location:../login/login/");
}
// if ($_SESSION["Username"] == "")
	// header ("location:index.php");
?>

<!DOCTYPE html>
<html lang="en">

<style type="text/css">
	div.dt-buttons {
		float: right;
		padding-left: 100px;
	}
</style>

<head>
	<meta charset="utf-8" />
	<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="../assets/img/a.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>AAIJ Learning</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="../assets/csstambahan/css_font.css" rel="stylesheet" />
	<link rel="stylesheet" href="../assets/csstambahan/font-awesome/css/font-awesome.min.css" />
	<!-- CSS Files -->
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="../assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="../assets/css/demo.css" rel="stylesheet" />

</head>

<body>
	<div class="wrapper">
		<!-- Include Sidebar Start -->
	<?php
		$page = 'barang'; // current page is about, do the same for other page
		$collapsePage = 'menu2';
		include('sidebar.php');
	?>
	<!-- Include End Sidebar -->

	<div class="main-panel">
	<!-- Iinclude Navbar -->
	<?php
		$navbar_brand = ''; // current page is about, do the same for other page
		include('../navbar.php');
	?>
	<!-- Include End Navbar -->
	<!-- End Navbar -->
	<div class="content">
	
        <!-- SQL QUERY END -->
        <div class="container-fluid">
			<div class="card">
				
				<div class="card-header ">
					<h4 class="card-title">Module</h4>
				</div>
				<div class="row">
					<div class="col-md-12">
						<div class="card data-tables">
							<div class="card-body table-striped table-no-bordered table-hover dataTable">

								<div class="row">
									<div class="col-sm-3">
										
											<div style="width:100%; height:200px; text-align:center;">
												<img src="../assets/img/vest.png" width="80%"><br>
											</div>
											<div class="progress mt-4">
												<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
                                            <center><strong>Safety</strong></center>
											<center><a href="../safety.php"><button type="button" class="mt-4 btn btn-primary">Akses</button></center>
											</a>
										
										
									</div>
									
									<div class="col-sm-3">
										
											<div style="width:100%; height:200px; text-align:center;">
												<img src="../assets/img/none.png"width="80%"><br>
											</div>
											<div class="progress mt-4">
												<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
                                            <center><strong>No Available</strong></center>
											<center> <a href="javascript:void(0);"><button type="button" class="mt-4 btn btn-primary">Akses</button></center>
											
										</a>
									</div>
									
									<div class="col-sm-3">
										
											<div style="width:100%; height:200px; text-align:center;">
												<img src="../assets/img/none.png"width="80%">
											</div>
											<div class="progress mt-4">
												<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
                                            <center><strong>No Available</strong></center>
											<center><button type="button" class="mt-4 btn btn-primary">Akses</button></center>
											
										</a>
									</div>
									
									<div class="col-sm-3">
									
											<div style="width:100%; height:200px; text-align:center;">
												<img src="../assets/img/none.png"width="80%">
											</div>
											<div class="progress mt-4">
												<div class="progress-bar progress-bar-striped bg-success progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 0%"></div>
											</div>
                                            <center><strong>No Available</strong></center>
											<center> <a href="javascript:void(0);"><button type="button" class="mt-4 btn btn-primary" >Akses</button></center>
											
										</a>
									</div>
								</div>
						
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
	</div>


	<!-- Include Footer Start -->
	<?php
	include('../footer.php');
	?>
	<!-- Include End Footer -->
</div>
</div>
</body>


<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin witches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Plugin    -->
<script type="/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
<!--  Chartisgin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifics Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!--  jVector -->
<script src="../assets/js/plugins/jquery-jvectormap.js" type="text/javascript"></script>
<!--  Plugin ate Time Picker and Full Calendar Plugin-->
<script src="../assets/js/plugins/moment.min.js"></script>
<!--  Datetimer   -->
<script src="../assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  Sweet A -->
<script src="../assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
<!--  Tags In-->
<script src="../assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
<!--  Sliders -->
<script src="../assets/js/plugins/nouislider.js" type="text/javascript"></script>
<!--  Bootstrlect  -->
<script src="../assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  jQueryVte  -->
<script src="../assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
<!--  Plugin he Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="../assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Bootstrble Plugin -->
<script src="../assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTabugin -->
<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Car   -->
<script src="../assets/js/plugins/fullcalendar.min.js"></script>
<!-- Control r for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dard DEMO methods, don't include it in your project! -->
<script src="../assets/js/demo.js"></script>

<script type="text/javascript" src="../assets/csstambahan/datatable/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="../assets/csstambahan/datatable/jszip.min.js"></script>
<script type="text/javascript" src="../assets/csstambahan/datatable/pdfmake.min.js"></script>
<script type="text/javascript" src="../assets/csstambahan/datatable/vfs_fonts.js"></script>
<script type="text/javascript" src="../assets/csstambahan/datatable/buttons.html5.min.js"></script>



</html>