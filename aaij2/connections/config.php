<?php
    date_default_timezone_set("Asia/Jakarta");
    if(session_id()==''){
        // Start Session
        session_start();
    }

     $serverName = "LAPTOP-R6QLCRTF";
    

    // Since UID and PWD are not specified in the $connectionInfo array,
    // The connection will be attempted using Windows Authentication.
     $uid = "sa";
     $pwd = "pocong123";
    
    $connectionInfo = array(
        "UID"=> $uid,
        "PWD"=> $pwd,
        "MultipleActiveResultSets"=>true,
        "Database"=>"EL",
        "CharacterSet"=>"UTF-8");
    $conn = sqlsrv_connect( $serverName, $connectionInfo);

    if(!function_exists('print_debug')){
        function print_debug($data, $die=TRUE){
            echo '__________________________________________________________________________<br>';
            echo '<pre>';
            print_r($data);
            echo '</pre>';

            if($die){
                die();
            }
        }
    } 
?>