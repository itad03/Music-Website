<?php
include('connect.php');
$function = $_POST["function"];
$query = "update active_song set song='$function'";
$result = mysqli_query($con, $query);
?>