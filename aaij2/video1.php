
<?php

    include("connections/config.php");
    
    if(!empty($_POST['comment']) && !empty($_GET['id'])){
        $sql = "SELECT * FROM el_video WHERE id=".$_GET['id'];
        $data_video = sqlsrv_query($conn, $sql, array(), ['Scrollable' => SQLSRV_CURSOR_KEYSET]);
        $count = sqlsrv_num_rows($data_video);

        if($count){
            $id_video = $_GET['id'];
            $user_npk = $_SESSION['npk'];
            $comment = $_POST['comment'];
            $date = date("Y-m-d H:i:s");
            
            $raw_query = "INSERT INTO el_video_comment (id_video, user_npk, comment, created_at)
                            VALUES ('$id_video', '$user_npk', '$comment', '$date')";
            $query = sqlsrv_query($conn, $raw_query);
        }

        header("Location:video1.php?id=".$_GET['id']);
    }

    if(!empty($_GET['action']) && $_GET['action']=='deletecomment' && !empty($_GET['id']) && !empty($_GET['commentid'])){
        $sql = "SELECT * FROM el_video_comment WHERE id=".$_GET['commentid'];
        $data_video = sqlsrv_query($conn, $sql, array(), ['Scrollable' => SQLSRV_CURSOR_KEYSET]);
        $count = sqlsrv_num_rows($data_video);

        if($count){
            $raw_query = "DELETE FROM el_video_comment WHERE id=".$_GET['commentid'];
            $query = sqlsrv_query($conn, $raw_query);
        }

        header("Location:video1.php?id=".$_GET['id']);
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
					<h4 class="card-title">
                        AICast
                        <?php iF(!empty($_GET['id'])): ?>
                            <button class="btn btn-primary float-right" onclick="window.location.replace('video1.php')">Back</button>
                        <?php endif; ?>
                    </h4>
                </div>
				<div class="row">
					<div class="col-md-12">
						<div class="card data-tables">
							<div class="card-body table-striped table-no-bordered table-hover dataTable" style="padding: 0 15px;">

                              
								<div class="row" style="margin:20px 0 20px 0;">
                                    <?php if(!empty($_GET['id'])):
                                        $sql = "SELECT * FROM el_video WHERE id=".$_GET['id'];
                                        $data_video = sqlsrv_query($conn, $sql, array(), ['Scrollable' => SQLSRV_CURSOR_KEYSET]);
                                        $count = sqlsrv_num_rows($data_video);
                                        $data = sqlsrv_fetch_array($data_video, SQLSRV_FETCH_ASSOC);
                                        $youtube = preg_replace("/\s*[a-zA-Z\/\/:\.]youtube.com\/watch\?v=([a-zA-Z0-9\-]+)([a-zA-Z0-9\/\*\-\\-\_\-\_\?\&\;\%\=\.])/i","<iframe width=\"100%\" style=\"max-height:250px\" src=\"//www.youtube.com/embed/$1\" frameborder=\"0\" allowfullscreen></iframe>",$data['file']);
                                    ?>
                                        <div style="background:black; width:100%;">
                                            <center style="margin-bottom: -5px;">
                                                <?=$youtube?>
                                                <!-- <video controls width="100%" style="max-height:500px;">
                                                    <source src="<?=$data['file']?>" type="video/mp4" />
                                                </video> -->
                                            </center>
                                        </div>

                                        <div class="container">
                                            <h2 style="margin-bottom:5px;">
                                                <?=$data['title']?>
                                            </h2>
                                            <p>
                                                <small style="font-weight:900; color:grey;">
                                                    <?=$data['date']->format("d M Y")?> |
                                                </small>
                                                <?=$data['description']?>
                                            </p>

                                            <hr>

                                            <div class="row">
                                                <div class="col-12" style="margin-bottom:30px;">
                                                    
                                                    <?php
                                                        $sql = "SELECT A.*, U.user_nama FROM el_video_comment A
                                                                INNER JOIN el_user U ON A.user_npk = U.user_npk
                                                                WHERE A.id_video=".$_GET['id']."
                                                                ORDER BY A.id DESC";
                                                        $comment_query = sqlsrv_query($conn, $sql, array(), ['Scrollable' => SQLSRV_CURSOR_KEYSET]);$pagination['page'] = empty($_GET['page'])?1:$_GET['page'];
                                                        $pagination['page'] = empty($_GET['page'])?1:$_GET['page'];
                                                        $pagination['limit'] = 5;
                                                        $pagination['start'] = $pagination['page']>1 ? ($pagination['page'] * $pagination['limit']) - $pagination['limit'] : 0;
                                                        $pagination['total_data'] = sqlsrv_num_rows($comment_query);
                                                        $pagination['total_page'] = ceil($pagination['total_data'] / $pagination['limit']);
                                                        
                                                        $sql .= " OFFSET ".$pagination['start']." ROWS FETCH NEXT ".$pagination['limit']." ROWS ONLY";
                                                        $comment_query = sqlsrv_query($conn, $sql, array(),['Scrollable' => SQLSRV_CURSOR_KEYSET]);
                                                        
                                                        while($comment = sqlsrv_fetch_array($comment_query, SQLSRV_FETCH_ASSOC)):
                                                    ?>
                                                    
                                                    <div style="border: 1px solid darkgrey; display:grid; padding: 20px 30px; margin-bottom:10px;">
                                                        <!-- Comment Header -->
                                                        <div style="margin-bottom:15px;">
                                                            <div class="float-left">
                                                                <img src="assets/img/ava.png" height="25" style="margin-top:-3px;">
                                                                <span style="text-transform:uppercase; font-weight:300;"><?=$comment['user_nama']?></span>  <?=$comment['created_at']->format("d M, H:i")?>
                                                            </div>
                                                            <?php if($comment['user_npk'] == $_SESSION['npk']): ?>
                                                                <div class="float-right">
                                                                    <a href="?action=deletecomment&id=<?=$_GET['id']?>&commentid=<?=$comment['id']?>"><i class="fa fa-trash"></i></a>
                                                                </div>
                                                            <?php endif; ?>
                                                        </div>
                                                        <!-- Comment -->
                                                        <div>
                                                            <p style="margin:unset;"><?=$comment['comment']?></p>
                                                        </div>
                                                    </div>

                                                    <?php endwhile; ?>
                                                    <div style="width:100%; display:flex;">
                                                        <div style="width:50%;">
                                                            <?php if($pagination['page']>1): ?>
                                                                <a href="video1.php?id=<?=$_GET['id']?>&page=<?=$pagination['page']-1?>">Newer Comment</a>
                                                            <?php endif; ?>
                                                        </div>
                                                        <div style="width:50%; text-align:right;">
                                                            <?php if($pagination['page']<$pagination['total_page']): ?>
                                                                <a href="video1.php?id=<?=$_GET['id']?>&page=<?=$pagination['page']+1?>">Older Comment</a>
                                                            <?php endif; ?>
                                                        </div>
                                                    </div>
                                                    
                                                </div>



                                                <div class="col-md-6">
                                                    <form method="POST">
                                                    <textarea name="comment" class="form-control" placeholder="Add a comment..." style="height:100px; width:100%; border:1px solid darkgrey;"></textarea>
                                                    <br>

                                                    <div class="float-right">
                                                        <button type="submit" class="btn btn-primary">Save</button>
                                                        
                                                        <button type="reset" class="btn btn-primary">Cancel</button>
                                                    </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>

                                    <?php if(empty($count)): ?>
                                        <?php
                                            if(empty($data)){
                                                $message = "Data tidak ditemukan";
                                            }
                                            $sql = "SELECT * FROM el_video ORDER BY id DESC";
                                            $data_video = sqlsrv_query($conn, $sql);
                                            while($data = sqlsrv_fetch_array($data_video, SQLSRV_FETCH_ASSOC)):
                                        ?>
                                            <div class="col-sm-3">
                                                <div style="width:100%; height:200px; text-align:center;">
                                                    <a href="?id=<?=$data['id']?>">
                                                        <img src="assets/img/thumb.png" width="100%">
                                                    </a>
                                                    
                                                    <strong><?=$data['title']?></strong>
                                                    <center><h9 style="color:#C0C0C0;"><?=$data['date']->format("d M Y")?> </center>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    <?php endif; ?>

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