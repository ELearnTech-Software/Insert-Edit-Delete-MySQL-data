<?php 
date_default_timezone_set('Asia/Kolkata');
require_once('include/session.php');
require_once('connection/connection.php');
if (isset($_GET['id'])){
	$payno=$_GET['id'];
}

	$sql="delete from tbl_receipt where vch_no=:vid";
	$stmt=$mainconn->prepare($sql);
	$stmt->bindParam(":vid",$payno);
	$stmt->execute();
	$maxID=$payno;

header("refresh:1;url=index.php");	