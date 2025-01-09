<?php
include('connect.php');
$function = $_POST["function"];
$query = "insert into playlist(songID) values ($function)";
$result = mysqli_query($con, $query);
?>