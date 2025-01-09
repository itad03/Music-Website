<?php 
include_once('config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('comments',array('CommentID'=>$_REQUEST['delId']));
	header('location: admin_comment.php?msg=rds');
	exit;
}
?>