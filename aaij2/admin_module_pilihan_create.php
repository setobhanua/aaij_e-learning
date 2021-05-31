<?php
    include("connections/config.php");

    if(!empty($_POST)){
        $data = $_POST;
        $message = "Berhasil menambahkan data";

        $sql = "SELECT MAX(id) as max FROM el_module";
        $data_book = sqlsrv_query($conn, $sql);
        $data_book = sqlsrv_fetch_array($data_book, SQLSRV_FETCH_ASSOC);
        $data['id'] = $data_book['max'] + 1;
        
        foreach($data['judul'] as $key=>$title){
            $gambar = $_FILES['image']['name'][$key];
            if(!empty($gambar)){
                $microtime = microtime();
                $microtime = explode(" ", $microtime);
                $date = date("Y-m-d H:i:s",$microtime[1]);
                $date = $date.':'.$microtime[0];
                $filetype = explode('.',$_FILES['image']['name'][$key]);
                $target_file = "assets/uploads/MODULEDet".md5($date).'.'.$filetype[1];
                $isi = $data['isi'][$key];
                $isi = str_replace("'","''",$isi);

                $sql = "INSERT INTO el_module_detail (id_module, title, [content], [file])
                        VALUES ('".$data['id']."','$title','$isi','$target_file')";
            
                move_uploaded_file($_FILES['image']['tmp_name'][$key], $target_file);
            }else{
                $sql = "INSERT INTO el_module_detail (id_module, title, [content])
                VALUES ('".$data['id']."','$title','".$data['isi'][$key]."')";
            }
            sqlsrv_query($conn, $sql);
        }

        $microtime = microtime();
        $microtime = explode(" ", $microtime);
        $date = date("Y-m-d H:i:s",$microtime[1]);
        $date = $date.':'.$microtime[0];
        $filetype = explode('.',$_FILES['file']['name']);
        $target_file = "assets/uploads/MODULEHead".md5($date).'.'.$filetype[1];

        $sql = "INSERT INTO el_module (title, description, thumbnail, closed, created_at)
                VALUES ('".$data['title']."','".$data['description']."','$target_file','".$data['date']."',GETDATE())";
        if(!sqlsrv_query($conn, $sql)){
            $message = 'Gagal menambahkan data';
        }
        if(!move_uploaded_file($_FILES['file']['tmp_name'], $target_file)){
            $message = "Gagal menambahkan data";
        }

        echo "<script>
                alert('".$message."');
                window.location.href='admin_module_pilihan.php';
            </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <script src="https://cdn.tiny.cloud/1/9snydccn6b6kqhsm1gbme5plbaw3g01ynmuowkn6n6vpre3r/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    
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
        $page = 'admin_module_pilihan'; // current page is about, do the same for other page
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
                                        <h4 class="card-title">Add Module</h4>
                                        <p class="card-category">Add Module Pilihan</p>
                                    </div>
                                </div>
                                <div class="card-body table-full-width table-responsive">



                                    <input type="hidden" value="0" id="latest-row">
                                    <form method="post" enctype="multipart/form-data">
                                        <div class="form-left-to-w3l ">
                                            <label style="font-weight:900;">Thumbnail</label>
                                            <input type="file" name="file" placeholder="File" class="form-control" required>
                                            <div class="clear"></div>
                                        </div><br>

                                        <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">Title</label>
                                            <input type="text" name="title" placeholder="Title" class="form-control" required>
                                            <div class="clear"></div>
                                        </div><br>
                                        
                                        <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">Description</label>
                                            <textarea name="description" class="form-control" placeholder="Description"></textarea>
                                            <div class="clear"></div>
                                        </div><br>

                                        <div class="form-left-to-w3l">
                                            <label style="font-weight:900;">Closed </label>
                                            <input type="date" name="date" placeholder="Date" class="form-control">
                                            <div class="clear"></div>
                                        </div><br>
                                        
                                        <hr style="border: 1px solid darkgrey;">

                                        <div id="article-row">
                                        </div>

                                        <br>
                                        <a href=".." class="btn btn-info">Kembali</a>
                                        <button type="submit" class="btn btn-primary">Simpan</button>
                                        <button type="button" class="btn btn-success float-right" onclick="addRow()"><i class="fa fa-plus"></i></button>
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

<script>
    addRow();
    function addRow(){
        var id = $('#latest-row').val()-1+2;
        $('#latest-row').val(id);
        var html = '<div id="row'+id+'">\
                        <div class="form-left-to-w3l">\
                            <label style="font-weight:600;">Judul Bab</label>\
                            <input type="text" name="judul[]" class="form-control">\
                            <div class="clear"></div>\
                        </div><br>\
                        <div class="form-left-to-w3l">\
                            <label style="font-weight:600;">Isi</label>\
                            <textarea name="isi[]" class="mytextarea form-control"></textarea>\
                            <div class="clear"></div>\
                        </div><br>\
                        <div class="form-left-to-w3l">\
                            <label style="font-weight:600;">Media</label>\
                            <input type="file" name="image[]" class="form-control">\
                            <div class="clear"></div>\
                        </div><br>\
                        <div class="form-left-to-w3l text-right">\
                            <button type="button" class="btn btn-danger" onclick="$(\'#row'+id+'\').remove()"><i class="fa fa-trash"></i></button>\
                        </div><hr>\
                    </div>';
        $('#article-row').append(html);

            tinymce.init({
                selector: 'textarea.mytextarea',
                plugins: 'link media',
                toolbar: 'undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify |\
                            outdent indent | link media |'
            });
    }
</script>

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