<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Index</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div id="container">
		<div id="animation">
			
		</div>
		<div id="login">
			<form method="POST" action="finalLogout.php">
				<fieldset>
					<legend>Login Out : </legend>
					<p>Loging out......</p>
					<input id="submit" type="submit" name='logout' value="Logout"><br><br>
				</fieldset>
			</form>
		</div>
	</div>
</body>
</html>


<?php

if (isset($_POST['logout'])) {
	session_destroy();
	header('location:index.php');
}

?>