<?php
    include("connections/config.php");
    date_default_timezone_set('Asia/Jakarta');
?>

<!DOCTYPE html>
<html lang="en">
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
    <!-- COSTUME CSS -->
    <link rel="stylesheet" href="assets/css/costume.css">
    <style type="text/css">
    div.dt-buttons {
        float: right;
        padding-left: 100px;
    }
    /* .tableHead th{
        DOESEN'T WORK IDK :( 
        color: white;
    } */
</style>
</head>

<body>
    <div class="wrapper">
        <!-- Include Sidebar Start -->
        <?php
        $page = 'home'; // current page is about, do the same for other page
        $collapsePage = 'menu1';
        include('sidebar.php');
        ?>
        <!-- Include End Sidebar -->

        <div class="main-panel">
            <!-- Iinclude Navbar -->
            <?php
            $navbar_brand = ''; // current page is about, do the same for other page
            include('navbar.php');
            ?>
            <!-- Include End Navbar -->
            <!-- End Navbar -->
            <div class="content">
                <!-- SQL QUERY END -->
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title">
                                Library
                                <i class="fa fa-angle-right"></i>
                                <?=!empty($_GET['genre'])?$_GET['genre']:'Genre'?>

                                <button class="btn btn-primary float-right" value="Go Back" onclick="window.history.back()">Back</button>
                            </h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card data-tables">
                                    <div class="card-body table-striped table-no-bordered table-hover dataTable">
                                    <div class="toolbar">
                                            <!--        Here you can write extra buttons/actions for the toolbar              -->
                                        </div>
                                    <!-- Editable table -->
                                    <div class="fresh-datatables">


                                        <?php if(!empty($_GET['id_genre']) && !empty($_GET['genre'])): ?>
                                            <!-- SQL QUERY -->
                                            <?php
                                                $sql = "SELECT el_ebook.*, el_ebook_genre.genre FROM el_ebook
                                                        LEFT JOIN el_ebook_genre ON el_ebook.id_genre = el_ebook_genre.id
                                                        WHERE id_genre=".$_GET['id_genre']." ORDER BY el_ebook.id DESC";
                                                $data_video = sqlsrv_query($conn, $sql, array(), ['Scrollable' => SQLSRV_CURSOR_KEYSET]);
                                                $count = sqlsrv_num_rows($data_video);
                                            ?>

                                            <table id="datatables"  class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100% margin:0; border:1px solid #FFFFFF;">
                                                <thead style="background-color: #2c3e50; color: #FFFFFF">
                                                        <tr>
                                                            <!-- <th class="text-center" style="color:white;">NO</th> -->
                                                            <th class="text-center" style="color:white;">Tanggal</th>
                                                            <!-- <th class="text-center" style="color:white;">Genre</th> -->
                                                            <th class="text-center" style="color:white;">Judul</th>
                                                            <th class="text-center" style="color:white;">Sinopsis</th>
                                                            <th class="text-center" style="color:white;">File</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  align="center">
                                                    
                                                        <?php $i=1; while($data = sqlsrv_fetch_array($data_video, SQLSRV_FETCH_ASSOC)): ?>
                                                            <tr>
                                                                <!-- <td class="text-center"><?=$i++?></td> -->
                                                                <td class="text-center"><?=$data['date']->format('d M Y')?></td>
                                                                <!-- <td class="text-center"><?=$data['genre']?:'-'?></td> -->
                                                                <td><?=$data['title']?></td>
                                                                <td width="70%"><?=$data['sinopsis']?></td>
                                                                <td>
                                                                    <a class="btn btn-link" href="<?=$data['file']?>" target="_blank">
                                                                        <i class="fa fa-eye"></i> Baca
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        <?php $i++; endwhile; ?>

                                                    </tbody>
                                                </table>
                                                <?php if(!$count): ?>
                                                    <p class="text-center">No Data Found!</p>
                                                <?php endif; ?>
                                        <?php endif; ?>


                                        <?php if((empty($_GET['id_genre']) || empty($_GET['genre'])) && empty($data)): ?>
                                            <!-- SQL QUERY -->
                                            <?php
                                                $sql = "SELECT * FROM el_ebook_genre";
                                                $data_video = sqlsrv_query($conn, $sql, array(), ['Scrollable' => SQLSRV_CURSOR_KEYSET]);
                                                $count = sqlsrv_num_rows($data_video);
                                            ?>

                                            <table id="datatables"  class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100% margin:0; border:1px solid #EEE;">
                                                <thead style="background-color: #2c3e50; color: white">
                                                        <tr>
                                                            <th style="color:white;" class="text-center">Books Genre</th>
                                                            <th style="color:white;" class="text-center">Action</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody  align="center">
                                                    
                                                        <?php while($data = sqlsrv_fetch_array($data_video, SQLSRV_FETCH_ASSOC)): ?>
                                                            <tr>
                                                                <td><?=$data['genre']?></td>
                                                                <td> <a href='?id_genre=<?=$data['id']?>&genre=<?=$data['genre']?>'>View</td>
                                                            </tr>
                                                        <?php endwhile; ?>

                                                    </tbody>
                                                </table>
                                        <?php endif; ?>

                                                
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
<script src="/assets/js/plugins/nouislider.js" type="text/javascript"></script>
<!--  Bootstrlect  -->
<script src="assets/js/plugins/bootstrap-selectpicker.js" type="text/javascript"></script>
<!--  jQueryVte  -->
<script src="assets/js/plugins/jquery.validate.min.js" type="text/javascript"></script>
<!--  Plugin he Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
<script src="/assets/js/plugins/jquery.bootstrap-wizard.js"></script>
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



</script>

</html>