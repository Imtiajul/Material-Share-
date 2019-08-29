<?php

include_once ('session.php');
include_once ('dbMySql.php');
$con = new DB_con();
$currentUser = $login_session;

$res = $con->getbook($currentuser);
	
?>

