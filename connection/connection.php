<?php 
require_once('include/session.php');
$username="root";
$password="mntz";
$db="datainsert";

try{
	$mainconn=new PDO('mysql:host=127.0.0.1;dbname='.$db.'',$username,$password);
	$mainconn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}
catch(PDOException $e){

}
