<?php 
session_start();
echo $_SESSION['status'] ;
if ($_SESSION['status'] != "login") {
    header("location:login/login/index.php");
}
header("location:home.php");    


?>