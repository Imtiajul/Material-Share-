<?php
	include_once 'dbMySql.php';
	session_start();

	$conn = new DB_con();

	$db = mysqli_connect('localhost', 'root', '', 'material_share');

	$user_check = $_SESSION['login_user'];

	$ses_sql = mysqli_query($db, "select UserName from studentinfo where UserName = '$user_check'");

	$row = mysqli_fetch_array($ses_sql, MYSQLI_ASSOC);

	$login_session = $row['UserName'];

	if(!isset($_SESSION['login_user'])) {
		header('location:index.php');
	}
?>