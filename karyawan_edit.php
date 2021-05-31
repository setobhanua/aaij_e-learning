<?php
    include("connections/config.php");

    if(empty($_GET['user_npk'])){
        header("Location:karyawan.php");
        die();
    }

    $sql = "SELECT * FROM el_user WHERE user_npk=".$_GET['user_npk'];
    $data_user = sqlsrv_query($conn, $sql);
    $data = sqlsrv_fetch_array($data_user, SQLSRV_FETCH_ASSOC);
    if(empty($data)){
        $message = "Data tidak ditemukan";
    }

    if(!empty($_POST) && !empty($data)){
        if($data['user_password'] != $_POST['user_password']){
            $_POST['user_password'] = md5($_POST['user_password']);
        }
        $_POST['user_aktif'] = !empty($_POST['user_aktif']);
        $_POST['user_admin'] = !empty($_POST['user_admin']);
        $message = "Berhasil mengubah data";

        $sql = "UPDATE el_user SET user_npk='".$_POST['user_npk']."',user_nama='".$_POST['user_nama']."',user_desc_dept='".$_POST['user_desc_dept']."',
                                    user_gol='".$_POST['user_gol']."',user_aktif='".$_POST['user_aktif']."',user_admin='".$_POST['user_admin']."',
                                    user_desc_sie='".$_POST['user_desc_sie']."',user_password='".$_POST['user_password']."' 
                                    WHERE user_npk = ".$_GET['user_npk'];
        $data_user = sqlsrv_query($conn, $sql);
    }

    if(!empty($message)){
        echo "<script>
                alert('".$message."');
                window.location.href='karyawan.php';
            </script>";
    }
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
        $page = 'karyawan'; // current page is about, do the same for other page
        $collapsePage = 'menu3';
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
                <!-- SQL QUERY -->
                <?php
                

                ?>
                <!-- SQL QUERY END -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover" style="padding: 10px 20px;">
                                <div class="card-header ">
                                    <div class="float-left">
                                        <h4 class="card-title">Karyawan</h4>
                                        <p class="card-category">Menambah data karyawan</p>
                                    </div>
                                </div>
                                <div class="card-body table-full-width table-responsive">

                                    <form method="post" enctype="multipart/form-data">
                                    <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">NPK</label>
                                            <input type="number" name="user_npk" value="<?=$data['user_npk']?>" placeholder="NPK" class="form-control" required>
                                            <div class="clear"></div>
                                        </div><br>

                                        <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">Nama</label>
                                            <input type="text" name="user_nama" value="<?=$data['user_nama']?>" placeholder="Nama" class="form-control" required>
                                            <div class="clear"></div>
                                        </div><br>

                                        <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">Golongan</label>
                                            <select class="form-control" name="user_gol" id="combo1">
                                                <option value="">-- Pilih Golongan --</option>
                                                <option value="1" <?=$data['user_gol']!=1?:'selected'?>>Golongan 1</option>
                                                <option value="2" <?=$data['user_gol']!=2?:'selected'?>>Golongan 2</option>
                                                <option value="3" <?=$data['user_gol']!=3?:'selected'?>>Golongan 3</option>
                                                <option value="4" <?=$data['user_gol']!=4?:'selected'?>>Golongan 4</option>
                                            </select>
                                            <div class="clear"></div>
                                        </div><br>

                                        <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">Departemen</label>
                                            <input type="text" name="user_desc_dept" value="<?=$data['user_desc_dept']?>" placeholder="Departemen" class="form-control" required>
                                            <div class="clear"></div>
                                        </div><br>

                                        <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">Seksi</label>
                                            <input type="text" name="user_desc_sie" value="<?=$data['user_desc_sie']?>" placeholder="Seksi" class="form-control" required>
                                            <div class="clear"></div>
                                        </div><br>

                                        <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">Password</label>
                                            <input type="password" name="user_password" value="<?=$data['user_password']?>" placeholder="Password" class="form-control" required>
                                            <div class="clear"></div>
                                        </div><br>

                                        <div class="form-left-to-w3l" style="padding-left:20px;">
                                            <input type="checkbox" name="user_aktif" <?=!$data['user_aktif']?:'checked'?>>
                                            <label style="font-weight:900;">Aktif <em class="text-capitalize" style="font-weight:500;">(Centang jika karyawan ini aktif)</em></label>
                                            <div class="clear"></div>

                                            <input type="checkbox" name="user_admin" <?=!$data['user_admin']?:'checked'?>>
                                            <label style="font-weight:900;">Admin <em class="text-capitalize" style="font-weight:500;">(Centang jika karyawan ini adalah admin)</em></label>
                                            <div class="clear"></div>
                                        </div><br>

                                    
                                        <br>
                                        <a href="karyawan.php" class="btn btn-info">Kembali</a>
                                        <button type="submit" class="float-right btn btn-primary">Submit</button>
                                    </form>
                





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