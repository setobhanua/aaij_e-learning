<?php
    include "connections/config.php";
    if(!empty($_POST)){
        $data = $_POST;
        
        $message = "New Password not Match!";
        if($data['new']==$data['renew']){
            $old = md5($data['old']);
            $new = md5($data['new']);
            
            $sql = "SELECT * FROM el_user WHERE user_npk=".$_SESSION['npk'];
            $sql = sqlsrv_query( $conn, $sql);
            $data = sqlsrv_fetch_array($sql);

            // echo $data['user_password']==$old;
            // echo $old;
            // print_debug($data, false);

            $message = "Old Password not Match!";
            if($data['user_password']==$old){
                // print_debug($data);
                // print_debug($_SESSION);
                        
                $sql = "UPDATE el_user SET user_password='$new' WHERE user_npk=".$_SESSION['npk'];
                
                if(sqlsrv_query($conn, $sql)){
                    $message = 'Berhasil mengubah pasword';
                }else{
                    $message = 'Gagal mengubah pasword';
                }
                // print_debug($message, false);
            }
            // print_debug($message, false);
        }
        // print_debug($message);

        echo "<script>
                alert('".$message."');
                window.location.href='change_password.php';
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
                <div class="container-fluid">
                    <div class="card">
                        <div class="card-header ">
                            <h4 class="card-title ml-2"> Change Password</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card data-tables" style="margin:unset;">
                                    <div class="card-body table-striped table-no-bordered table-hover dataTable">
                                    
                                        <form class="row" style="margin:0px 0 90px 0;" method="POST">
                                            <div class="col-sm-2"></div>
                                            <div class="col-sm-8">
                                                <label class="control-label">Old Password</label>
                                                <input type="password" name="old" placeholder="Enter Old Password" class="form-control" required>
                                                <label class="control-label">New Password</label>
                                                <input type="password" name="new" placeholder="Enter New Password" class="form-control" required>
                                                <label class="control-label">New Password</label>
                                                <input type="password" name="renew" placeholder="re-Enter New Password" class="form-control" required>
                                                <div class="text-right">
                                                    <button type="submit" class="mt-4 btn btn-primary">SAVE</button>
                                                </div>
                                            </div>

                                            
                                            <!-- <div class="col-sm-5">
                                                <img src="assets/img/ava.png" width="200px" style="position:absolute; left:15%; top:15%;">
                                            </div> -->
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