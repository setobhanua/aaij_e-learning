<?php
    include("connections/config.php");

    if(!empty($_GET['id'])){
        $sql = "SELECT * FROM el_module WHERE id=".$_GET['id'];
        $sql = sqlsrv_query($conn, $sql);
        $data = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
        
        if(!empty($data)){
            $sql = "SELECT * FROM el_user_class WHERE user_npk=$_SESSION[npk] AND subject_id=$_GET[id]";
            $sql = sqlsrv_query($conn, $sql);
            $user_class = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
            
            if(empty($user_class)){
                $sql = "INSERT INTO el_user_class (user_npk, type, subject_id)
                        VALUES ('$_SESSION[npk]','module','$_GET[id]')";
                sqlsrv_query($conn, $sql);
                
                $sql = "SELECT * FROM el_user_class WHERE user_npk=$_SESSION[npk] AND subject_id=$_GET[id]";
                $sql = sqlsrv_query($conn, $sql);
                $user_class = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
            }

            $sql = "SELECT * FROM el_module_detail WHERE id_module=".$_GET['id'];
            $sql = sqlsrv_query($conn, $sql);
            while($detail = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
                $data['detail'][] = $detail;
            }
        }
    }

    if(empty($_GET['id']) && empty($data)){
        $sql = "SELECT el_module.*, el_user_class.progress, el_user_class.id as id_pro FROM el_module
			    LEFT JOIN el_user_class ON el_module.id = el_user_class.subject_id AND el_user_class.user_npk = $_SESSION[npk]
                WHERE COALESCE(el_module.golongan,0)=0
                AND CONVERT(varchar(10), el_module.closed, 102) >= CONVERT(varchar(10), GETDATE(), 102)
                ORDER BY id DESC";
        
        $sql = sqlsrv_query($conn, $sql, array(),['Scrollable' => SQLSRV_CURSOR_KEYSET]);
        if(sqlsrv_num_rows($sql)){
            while($raw_data = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC)){
                $sql_detail = "SELECT title FROM el_module_detail WHERE id_module=$raw_data[id]";
                $sql_detail = sqlsrv_query($conn, $sql_detail, array(),['Scrollable' => SQLSRV_CURSOR_KEYSET]);
                while($raw_data['detail'][] = sqlsrv_fetch_array($sql_detail, SQLSRV_FETCH_ASSOC)){}
 
                $datas[$raw_data['id']] = $raw_data;
            }
        }
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
        $page = 'kelas_pilihan'; // current page is about, do the same for other page
        if(!empty($data['golongan'])){
            $page = 'kelas_wajib'; // current page is about, do the same for other page
        }

        $collapsePage = 'menu2';
        include('sidebar.php');
        ?>
        <!-- Include End Sidebar -->

        <div class="main-panel">
            <!-- Iinclude Navbar -->
            <?php
            $navbar_brand = 'Beranda'; // current page is about, do the same for other page
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
                    <div class="card">



                        
                        <div class="card-header ">
                            <h4 class="card-title">Modul</h4>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="card data-tables">
                                    <div class="card-body table-striped table-no-bordered table-hover dataTable">

                                        <div class="row">

                                            <?php if(!empty($data)): ?>
                                                <div class="col-12">
                                                    <h2>
                                                        <?=$data['title']?>
                                                        <br>
                                                        <small style="font-size:16px; margin-top:-7px;">
                                                            Closed Date : <?=$data['closed']->format("d/m/Y")?>
                                                            |
                                                            Upload Date : <?=$data['created_at']->format("d/m/Y")?>
                                                        </small>
                                                    </h2>
                                                    <br>
                                                    <?php if(!empty($data['detail'])): ?>
                                                        <h3 style="margin-bottom:10px; font-size:30px;">Daftar Isi</h3>
                                                        <?php foreach($data['detail'] as $key=>$detail):?>
                                                            <div>
                                                                <a href="#<?=$key?>"><?=$detail['title']?></a><br>
                                                            </div>
                                                        <?php endforeach; ?>
                                                        
                                                        <?php foreach($data['detail'] as $key=>$detail):?>
                                                            <!-- <br> -->
                                                            <div id="<?=$key?>" style="padding-top:50px;">
                                                                <h3><?=$detail['title']?></h3>
                                                                <hr style="border:1px solid darkgrey;">
                                                                <div class="text-center">
                                                                    <?php
                                                                        if(!empty($detail['file']) && file_exists($detail['file'])){
                                                                            $type = strtolower(explode('.', $detail['file'])[1]);
                                                                            if($type=="pdf"){
                                                                                echo "<iframe src='$detail[file]' width='100%' height='600px'></iframe>";
                                                                            }
                                                                            if($type=="png" || $type=="gif" || $type=="jpg" || $type=="jpeg"){
                                                                                echo "<img src='$detail[file]'  width='40%'>";
                                                                            }
                                                                            
                                                                            if($type=="pptx"){
                                                                                echo "<iframe src='$detail[file]' width='100%' height='1000px'></iframe>";
                                                                            }
                                                                            if($type=="mp4" || $type=="ogg" || $type=="webm"){
                                                                                echo "<video  width='100%' controls>
                                                                                    <source src='$detail[file]'>
                                                                                </video>";
                                                                            }
                                                                        }
                                                                    ?>
                                                                </div>
                                                                <br>
                                                                <center><p><?=$detail['content']?></p></center>
                                                            </div>
                                                        <?php endforeach; ?>
                                                    <?php else: ?>
                                                        <p style="background:red; color:white; text-align:center;">Empty Content</p>
                                                    <?php endif; ?>
                                                </div>
                                                
                                            <?php endif; ?>

                                            <?php if(empty($_GET['id']) && empty($data) && !empty($datas)): ?>
                                                <?php foreach($datas as $data): ?>
                                                    <div class="col-sm-3">
                                                        <div style="width:100%; height:150px; text-align:center; vertical-align:middle;">
                                                            <img src="<?=$data['thumbnail']?>" style="max-height:100%; max-width:80%;">
                                                        </div>
                                                        <div style=" margin:15px 0; background:darkgrey; width:100%; border-radius:5px;">
                                                            <div style="background:#2a9df4; border-radius:5px; height:10px; width:<?=$data['progress']?:'0'?>%;"></div>
                                                        </div>
                                                        <center>
                											<strong><?=$data['title']?> <em><?=$data['progress']>=100?'<i class="fa fa-check-circle" style="color:#37CA19;"></i>':''?></em> </strong><br>
                                                            <a style="color: red">closed :<br><?=$data['closed']->format("d/m/Y")?></a>
                                                        </center>
                                                        <center>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="mt-4 btn btn-primary" data-toggle="modal" data-target="#confirmOpen<?=$data['id']?>">
                                                                Akses
                                                            </button>
                                                        </center>
                                                    </div>
                                                <?php endforeach; ?>
                                            <?php elseif(empty($_GET['id']) && empty($data) && empty($datas)): ?>
        										<div class="col-md-12"><em>Modul belum tersedia</em></div>
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
        </div>



            <!-- Include Footer Start -->
            <?php
            include('footer.php');
            ?>
            <!-- Include End Footer -->
        </div>
    </div>

<?php if(empty($_GET['id']) && !empty($datas)): ?>
    <?php foreach($datas as $data): ?>
        <!-- Modal -->
        <div class="modal fade" id="confirmOpen<?=$data['id']?>" tabindex="-1" role="dialog" aria-labelledby="confirmOpenTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="confirmOpenTitle"><?=$data['title']?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <?php if(!empty($data['description'])): ?>
                    <p><?=$data['description']?></p>
                <?php endif; ?>
                <ul>
                    <?php foreach($data['detail'] as $detail){
                        if(!empty($detail['title'])){
                            echo "<li>$detail[title]</li>";
                        }
                    } ?>
                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary" onclick="location.href='module.php?id=<?=$data['id']?>'">Buka Modul</button>
            </div>
            </div>
        </div>
        </div>
    <?php endforeach; ?>

<?php else: ?>
    
    <script>
        var start = Date.now();
        var lastScrollPercent = 0;
        var id_userClass = <?=$user_class['id']?>;
        $(window).on('scroll', function(){
            // setTimeout(() => {
            //     const milis = Date.now() - start;

            //     console.log(`Test:${Math.floor(milis/1000)}`);
            // }, 2000);

            var milis = Date.now() - start;
            var time = Math.floor(milis/1000);
            // console.log(`Test:${time}`);

            var s = $(window).scrollTop(),
                d = $(document).height(),
                c = $(window).height();

            var scrollPercent = (s /  (d - c)) * 100;
            var scrollPercent = Math.round(scrollPercent);

            if(lastScrollPercent != scrollPercent){
                $.ajax({
                    type : "POST",
                    url : "module_update_progress.php",
                    data : {id:id_userClass, progress:scrollPercent, time:time},
                    success : function(res){
                        // console.log(res);
                    }
                });
            }else if(time!=0){
                $.ajax({
                    type : "POST",
                    url : "module_update_progress.php",
                    data : {id:id_userClass, progress:scrollPercent, time:time},
                    success : function(res){
                        // console.log(res);
                    }
                });
            }
            
            lastScrollPercent = scrollPercent;
            if(time>0){
            start = Date.now();
            }
        })
    </script>

<?php endif; ?>


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