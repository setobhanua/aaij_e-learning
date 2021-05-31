<?php
    include("connections/config.php");

    if(!empty($_POST['progress']) && !empty($_POST['id'])){
        $id = $_POST['id'];
        $progress = $_POST['progress'];
        $time = $_POST['time'];
        
        $sql = "SELECT * FROM el_user_class WHERE id=$id";
        $sql = sqlsrv_query($conn, $sql);
        $user_class = sqlsrv_fetch_array($sql, SQLSRV_FETCH_ASSOC);
        $time = $user_class['time'] + $time;

        if($user_class['progress']<$progress){
            $sql = "UPDATE el_user_class SET progress='$progress', time='$time' WHERE id = $id";
            if(sqlsrv_query($conn, $sql)){
                $message = "Berhasil";
            }else{
                $message = "Gagal";
            }
        }else{
            $sql = "UPDATE el_user_class SET time='$time' WHERE id = $id";
            if(sqlsrv_query($conn, $sql)){
                $message = "Berhasil";
            }else{
                $message = "Gagal";
            }
        }
        echo $time;
        // echo$message;
    }
?>