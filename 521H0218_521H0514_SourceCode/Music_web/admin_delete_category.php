<?php 
include_once('config.php');
if(isset($_REQUEST['delId']) and $_REQUEST['delId']!=""){
	$db->delete('category',array('category_id'=>$_REQUEST['delId']));
	header('location: admin_category.php?msg=rds');
	exit;
}
?>