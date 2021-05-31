<?php
    include("connections/config.php");

    if(!empty($_GET['id']) && !empty($_GET['do']) && $_GET['do'] = "delete"){
        $sql = "SELECT * FROM el_sic2  WHERE id=".$_GET['id'];
        $data_video = sqlsrv_query($conn, $sql);
        $data = sqlsrv_fetch_array($data_video, SQLSRV_FETCH_ASSOC);
        $message = "Gagal menghapus data. Silahkan coba lagi dalam beberapa menit kedepan.";

        if(!empty($data)){
            if(!empty($data['file']) && file_exists($data['file'])){
                unlink($data['file']);
            }

            $sql = "DELETE FROM el_sic2 WHERE id=".$_GET['id'];
            if(sqlsrv_query($conn, $sql)){
                $message = "Berhasil menghapus data";
            }
        }else{
            $message = "Data tidak ditemukan";
        }

        echo "<script>
                alert('".$message."');
                window.location.href='admin_sic2.php';
            </script>";
    }

    // Setup Pagination
    $sql = "SELECT * FROM el_sic2
            ORDER BY id DESC";
    $stmt = sqlsrv_query($conn, $sql, array(),['Scrollable' => SQLSRV_CURSOR_KEYSET]);
    $pagination['page'] = empty($_GET['page'])?1:$_GET['page'];
    $pagination['limit'] = 10;
    $pagination['start'] = $pagination['page']>1 ? ($pagination['page'] * $pagination['limit']) - $pagination['limit'] : 0;
    $pagination['total_data'] = sqlsrv_num_rows($stmt);
    $pagination['total_page'] = ceil($pagination['total_data'] / $pagination['limit']);
    
    $last = $pagination['page']+2;
    if($last > $pagination['total_page']){
        $last = $pagination['total_page'];
    }
    $pagination['last'] = $last;
    
    $first = $pagination['page']-2;
    if($first < 1){
        $first = 1;
    }
    $pagination['first'] = $first;

    unset($first); unset($last);
    // print_debug($pagination, false);
    
    // Getting Data
    $sql .= " OFFSET ".$pagination['start']." ROWS FETCH NEXT ".$pagination['limit']." ROWS ONLY";
    $data_video = sqlsrv_query($conn, $sql, array(),['Scrollable' => SQLSRV_CURSOR_KEYSET]);
    // $data_video = sqlsrv_num_rows($data_video);

    // print_debug($sql, false);
    // print_debug($data_video);
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
        $page = 'admin_sic2'; // current page is about, do the same for other page
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
                <!-- SQL QUERY END  -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card strpied-tabled-with-hover" style="padding: 10px 20px;">
                                <div class="card-header ">
                                    <div class="float-left">
                                        <h4 class="card-title">Video Master</h4>
                                        <p class="card-category">Here is list of video course</p>
                                    </div>
                                    <div class="float-right">
                                        <a href="admin_sic2_create.php" class="btn btn-primary">+ Tambah</a>
                                    </div>
                                </div>
                                <div class="card-body table-full-width table-responsive">
                                    <table class="table table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center">ID</th>
                                                <th class="text-center">Tanggal</th>
                                                <th class="text-center">Judul</th>
                                                <th class="text-center">Deskripsi</th>
                                                <th class="text-center">File</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i=$pagination['start']+1; while($data = sqlsrv_fetch_array($data_video, SQLSRV_FETCH_ASSOC)): ?>
                                                <tr style="cursor:pointer;">
                                                    <td class="text-center"><?=$i++?></td>
                                                    <td class="text-center"><?=$data['date']->format('d M Y')?></td>
                                                    <td><?=$data['title']?></td>
                                                    <td width="50%"><?=$data['description']?></td>
                                                    <td>
                                                        <a class="btn btn-link" href="<?=$data['file']?>" target="_blank">
                                                            <i class="fa fa-eye"></i> Lihat File
                                                        </a>
                                                    </td>
                                                    <td class="text-right">
                                                        <a class="btn btn-info" style="color:white; width:125px;" href="admin_sic2_edit.php?id=<?=$data['id']?>">
                                                            <i class="fa fa-pencil"></i> Edit
                                                        </a>
                                                        <a class="btn btn-danger" style="color:white; width:125px;" href="admin_sic2.php?do=delete&id=<?=$data['id']?>">
                                                            <i class="fa fa-trash"></i> Delete
                                                        </a>
                                                    </td>   
                                                </tr>
                                            <?php endwhile; ?>
                                        </tbody>
                                    </table>
                                        <ul class="pagination float-right">
                                            <li class="paginate_button page-item <?=$pagination['page']==1?'disabled':''?>">
                                                <a href="admin_sic2.php?page=<?=$pagination['page']!=1?$pagination['page']-1:''?>" class="page-link">Previous</a>
                                            </li>
                                            <?php for($i=$pagination['first'];$i<=$pagination['last'];$i++): ?>
                                                <li class="paginate_button page-item <?=$pagination['page']==$i?'active':''?>">
                                                    <a href="admin_sic2.php?page=<?=$i?>" class="page-link"><?=$i?></a>
                                                </li>
                                            <?php endfor; ?>
                                            <li class="paginate_button page-item <?=$pagination['page']>=$pagination['total_page']?'disabled':''?>">
                                                <a href="admin_sic2.php?page=<?=$pagination['page']<$pagination['total_page']?$pagination['page']+1:''?>" class="page-link">Next</a>
                                            </li>
                                        </ul>
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