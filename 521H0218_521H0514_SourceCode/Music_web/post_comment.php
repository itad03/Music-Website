<?php
include('connect.php');
include("php_set.php");
$function = $_POST["function"];

$comment = new comments();
$active_song = new active_song();
$active = new active();

$sqlActive = "select * from active";
$rows1 = $active->fetch($sqlActive);

$sqlSong = "select * from active_song";
$rows2 = $active_song->fetch($sqlSong);
$sql = "select * from comments";
$rows = $comment->fetch($sql);
$number = (int) $rows2[0]['song'];
$query = "insert into comments(SongID,UserID,CommentText) values ($number,1,'$function')";
$result = mysqli_query($con, $query);
?>