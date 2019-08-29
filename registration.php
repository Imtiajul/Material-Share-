<?php
include_once ('dbMySql.php');
$con = new DB_con();

//variable defineing 
$userName = $userPassword = $userMail = $userAddress
= $userInstitute = $userMobile = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
	$userpass = $_POST['userpass'];
	$cuserpass = $_POST['cuserpass'];


	//user will see what they putted
	$userName= $_POST['username'];
	$userPassword= $_POST['userpass'];
	$userMail= $_POST['usermail'];
	$userAddress= $_POST['useraddress'];
	$userInstitute= $_POST['userinstitute'];
	$userMobile= $_POST['usermobile'];


	
	$res = strcmp($userpass, $cuserpass);

	if($res == 0){
		//checking data for DB
		$userName= check_input($userName);
		$userPassword= check_input($userPassword);
		$userMail= check_input($userMail);
		$userAddress= trim($userAddress);
		$userInstitute= check_input($userInstitute);
		$userMobile= check_input($userMobile);

		if(!filter_var($userMail, FILTER_VALIDATE_EMAIL)) {
			$email_err = 'Invalid Email Address';
		}


		$result = $con->insert($userName,$userPassword,$userMail,$userAddress,$userInstitute,$userMobile);
		if($result)
		{
			?>
			<script>
			alert('Record inserted...');
	        window.location='index.php'
	        </script>
			<?php

		}
		else
		{
			?>
			<script>
			alert('error inserting record...');
	        </script>
			<?php
		}
	}
	else{
		echo '<script language="javascript">';
		echo 'alert("Password did not match")';
		echo '</script>';
	}
}

function check_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Registration</title>
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="index.css">

	<script src="assets/js/jquery-3.3.1.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/script.js"></script>

	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<div id="container">
		<div id="login">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<fieldset>
					<legend>Registration Info : </legend>

					<p><span class="error">* required field</span></p>
					<label>Username : </label><span class="error">*</span><br>
					<div>
						<input autofocus="autofocus" type="text" class="form-control" name="username" id="username" required value="<?php echo $userName?>"><br>
					</div>
					<div>
						<p id="userNameStatus"></p>
					</div>

					<label>E-mail : </label><span class="error">*</span><br>
					<input type="text" name="usermail" required value="<?php echo $userMail?>"><br>

					<label>Institution name : </label><span class="error">*</span><br>
					<input type="text" name="userinstitute" required value="<?php echo $userInstitute?>"><br>

					<label>Address : </label><span class="error">*</span><br>
					<textarea name="useraddress" rows="4" required><?php echo $userAddress?></textarea>

					<label>Mobile : </label><span class="error">*</span><br>
					<input type="text" name="usermobile" required value="<?php echo $userMobile?>"><br>

					<label>Password : </label><span class="error">*</span><br>
					<input type="password" name="userpass" required><br>
					<label>Confirm Password : </label><span class="error">*</span><br>
					<input type="password" name="cuserpass" required><br><br>

					<input id="submit" type="submit" value="Submit"><br><br>
					<p>Please fill all information in the form.</p>

				</fieldset>
			</form>
		</div>
	</div>

</body>
</html>
