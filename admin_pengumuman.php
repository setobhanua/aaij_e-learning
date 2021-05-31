<?php
	include "connections/config.php";

    if(!empty($_GET['id']) && !empty($_GET['do']) && $_GET['do'] = "delete"){
        $message = "Gagal menghapus data. Silahkan coba lagi dalam beberapa menit kedepan.";
        $sql = "SELECT * FROM el_pengumuman
                WHERE id=".$_GET['id'];
        $data_module = sqlsrv_query($conn, $sql);
        $data = sqlsrv_fetch_array($data_module, SQLSRV_FETCH_ASSOC);
        
        if(!empty($data)){
            $sql = "DELETE FROM el_pengumuman WHERE id='$_GET[id]'";
            if(sqlsrv_query($conn, $sql)){
                $message = "Berhasil menghapus data";
            }
        }else{
            $message = "Data tidak ditemukan";
        }

        echo "<script>
                alert('".$message."');
                window.location.href='admin_pengumuman.php';
            </script>";
    }

	$sql = "SELECT * FROM el_pengumuman";
	$query = sqlsrv_query( $conn, $sql);
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
	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" href="assets/img/a.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>AAIJ Learning</title>
    
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
	<!--     Fonts and icons     -->
	<link href="assets/csstambahan/css_font.css" rel="stylesheet" />
	<link rel="stylesheet" href="assets/csstambahan/font-awesome/css/font-awesome.min.css" />
	<!-- CSS Files -->
	<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
	<link href="assets/css/light-bootstrap-dashboard.css?v=2.0.1" rel="stylesheet" />
	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />

</head>

<body>
	<div class="wrapper">
		<!-- Include Sidebar Start -->
	<?php
		$page = 'Admin'; // current page is about, do the same for other page
		$collapsePage = 'menu3';
		include('sidebar.php');
	?>
	<!-- Include End Sidebar -->

	<div class="main-panel">
	<!-- Iinclude Navbar -->
	<?php
		$navbar_brand = 'Master'; // current page is about, do the same for other page
		include('navbar.php');
	?>
	<!-- Include End Navbar -->
	<!-- End Navbar -->
	<div class="content">
	<!-- SQL QUERY END -->
		<div class="container-fluid">
			<div class="card">
				<div class="card-header ">
					<h4 class="card-title">Pengumuman</h4>
                    <p class="card-category">Admin</p>
				</div>
                
				<div class="row">
					<div class="col-md-12">
						<div class="card data-tables">
							<div class="card-body table-striped table-no-bordered table-hover dataTable">
								<div class="toolbar">
									<!-- Here you can write extra buttons/actions for the toolbar -->
								</div>
								<div class="fresh-datatables">
									<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
										<thead style="background-color: #2c3e50; color: white">
											<tr>
												<th style="color: white" >Judul</th>
												<th style="color: white" width="10%" >Tanggal</th>
												<th style="color: white" width="10%">Download</th>
												<th style="color: white" width="10%">Action</th>
												
											</tr>
										</thead>
										<tbody>
										<?php while ($fetch = sqlsrv_fetch_array( $query)) :?>
											<tr>
												<td><?= $fetch['judul'] ?></td>
												<td><?=!empty($fetch['date'])?$fetch['date']->format("d M Y H:i"):'-'?></td>
												<td><a class="btn btn-link" href="<?= $fetch['file'] ?>" target="_blank" style="color: #37B8FF">View </a></td>
												<td>
													<a class="btn btn-danger" style="color:white; width:50px;" href="admin_pengumuman.php?do=delete&id=<?=$fetch['id']?>">
														<i class="fa fa-trash"></i>
													</a>
												</td>   
												
											</tr>
                                            
										<?php endwhile; ?>
										</tbody>
                                        
									</table>
                                    <br>
                                    <div style="padding: 10px 15px 5px 5px;" class="float-right">
                                        <a href="admin_pengumuman_create.php" class="btn btn-primary">Tambah</a>
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
	include('footer.php');
	?>
	<!-- Include End Footer -->
</div>
</div>
</body>


<!--   Core JS Files   -->
<script src="assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<!--  Plugin witches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="assets/js/plugins/bootstrap-switch.js"></script>
<!--  Google Plugin    -->
<script type="/javascript" src="https://maps.googleapis.com/maps/api/js?YOUR_KEY_HERE"></script>
<!--  Chartisgin  -->
<script src="assets/js/plugins/chartist.min.js"></script>
<!--  Notifics Plugin    -->
<script src="assets/js/plugins/bootstrap-notify.js"></script>
<!--  jVector -->
<script src="assets/js/plugins/jquery-jvectormap.js" type="text/javascript"></script>
<!--  Plugin ate Time Picker and Full Calendar Plugin-->
<script src="assets/js/plugins/moment.min.js"></script>
<!--  Datetimer   -->
<script src="assets/js/plugins/bootstrap-datetimepicker.js"></script>
<!--  Sweet A -->
<script src="assets/js/plugins/sweetalert2.min.js" type="text/javascript"></script>
<!--  Tags In-->
<script src="assets/js/plugins/bootstrap-tagsinput.js" type="text/javascript"></script>
<!--  Sliders -->
<script src="assets/js/plugins/nouislider.js" type="text/javascript"></script>
<!--  Bootstrlect  -->
<script src="assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  jQueryVte  -->
<script src="assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
<!--  Plugin he Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="assets/js/plugins/jquery.bootstrap-wizard.js"></script>
<!--  Bootstrble Plugin -->
<script src="assets/js/plugins/bootstrap-table.js"></script>
<!--  DataTabugin -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<!--  Full Car   -->
<script src="assets/js/plugins/fullcalendar.min.js"></script>
<!-- Control r for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
<script src="assets/js/light-bootstrap-dashboard.js?v=2.0.1" type="text/javascript"></script>
<!-- Light Dard DEMO methods, don't include it in your project! -->
<script src="assets/js/demo.js"></script>

<script type="text/javascript" src="assets/csstambahan/datatable/dataTables.buttons.min.js"></script>
<script type="text/javascript" src="assets/csstambahan/datatable/jszip.min.js"></script>
<script type="text/javascript" src="assets/csstambahan/datatable/pdfmake.min.js"></script>
<script type="text/javascript" src="assets/csstambahan/datatable/vfs_fonts.js"></script>
<script type="text/javascript" src="assets/csstambahan/datatable/buttons.html5.min.js"></script>


<!-- CODINGAN JQUERY  -->
<script type="text/javascript">
	$(document).ready(function() {
		$('#datatables').DataTable({
			"pagingType": "full_numbers",
			"lengthMenu": [
			[5, 25, 50, -1],
			[5, 25, 50, "All"]
			],
			responsive: true,
			language: {
				search: "_INPUT_",
				searchPlaceholder: "Search records",
			}

		});


		var table = $('#datatables').DataTable();

        // Edit record
        table.on('click', '.edit', function() {
        	$tr = $(this).closest('tr');

        	if ($tr.hasClass('child')) {
        		$tr = $tr.prev('.parent');
        	}

        	var data = table.row($tr).data();
        	alert('You press on Row: ' + data[0] + ' ' + data[1] + ' ' + data[2] + '\'s row.');
        });

        // Delete a record
        table.on('click', '.remove', function(e) {
        	$tr = $(this).closest('tr');
        	table.row($tr).remove().draw();
        	e.preventDefault();
        });

        //Like record
        table.on('click', '.like', function() {
        	alert('You clicked on Like button');
        });
    });
</script>

</html>