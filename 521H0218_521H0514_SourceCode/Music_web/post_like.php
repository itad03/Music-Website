<?php
include('connect.php');
include("php_set.php");

$function = $_POST["function"];

$songs = new like();
$number = (int) $function;
$sql = "select * from likes where songID=$number";
$rows = $songs->fetch($sql);

if (json_encode($rows) === "null") {
    $query = "insert into likes(songID) values ($function)";
    $result = mysqli_query($con, $query);
} else {

}

?>