<?php 
include_once('config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('songs',array('id'=>$_REQUEST['delId']));
	header('location: admin_song.php?msg=rds');
	exit;
}
?>