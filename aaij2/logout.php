<?php
session_start();
session_unset();
session_destroy();
// if(isset($_COOKIE['cookielogin']))      
// {
// $time = time();
//     setcookie("cookielogin[user]", $time - 3600);
//     setcookie("cookielogin[pass]", $time - 3600);
// }
header("location:login/login/index.php");

?>