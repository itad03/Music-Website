<?php 

    $sever_name = "localhost";
    $user_name = 'root';
    $user_password = '';
    $database_name = "music_database";

    $con = mysqli_connect($sever_name,$user_name,$user_password,$database_name);
    if (!$con) {
        die('Connection Failed');
    }
?>