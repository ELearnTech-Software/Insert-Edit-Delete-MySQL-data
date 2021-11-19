<?php 
date_default_timezone_set('Asia/Kolkata');
require_once('include/session.php');
require_once('connection/connection.php');

$data=$_POST;

if (isset($data['data']) && !empty($data['data'])){
	$data=$data['data'];
}
$count=0;
	foreach ($data as $value){
		if (!empty($value['pname'])) $count++;
	}
if ($count==0)
{

	echo "<script type='text/javascript'> alert('There are nothings to save') </script>";
	echo "<script>setTimeout(\"location.href='frmreceipt.php';\,100);</script>";
}
else
{
	$paydate=$_POST['paydate'];
	$gid=$mainconn->prepare("SELECT max(vch_no) as kotno from tbl_receipt");
	$gid->execute();
	$maxrow=$gid->fetch(PDO::FETCH_ASSOC);
	$maxID=$maxrow['kotno'];
	$maxID++;
	$payno=$maxID;
	$add=$mainconn->prepare("INSERT INTO tbl_receipt(vch_no,date,trn_code,party_name,naration,amount) VALUES(:a,:b,:c,:d,:e,:f)");

	foreach($data as $item)
	{
		$add->bindParam(":a",$maxID);
		$add->bindParam(":b",$paydate);
		$add->bindParam(":c",$item['code_id']);
		$add->bindParam(":d",$item['pname']);
		$add->bindParam(":e",$item['remark']);
		$add->bindParam(":f",$item['total']);
		$add->execute();
	}
	header("refresh:1;url=index.php");

}