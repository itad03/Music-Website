<?php
include('connect.php');
$function = $_POST["function"];
$query = "insert into library(songID) values ($function)";
$result = mysqli_query($con, $query);
?>