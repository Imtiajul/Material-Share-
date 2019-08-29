<?php
include_once ('dbMySql.php');
session_start();
$con = new DB_con();

$db = mysqli_connect('localhost', 'root', '', 'material_share');

if(isset($login_session)){
	hearder('Location:homepage.php');
}


	$Username = "";
	$Password = "";
// data insert code starts here.
if(isset($_POST['btn_login']))
{

	$Username = $_POST['username'];
	$Password = $_POST['password'];

	$sql_u = "SELECT * FROM studentinfo WHERE username='$Username'";
    $sql_p = "SELECT * FROM studentinfo WHERE password='$Password'";
    $res_u = mysqli_query($db, $sql_u) or die(mysqli_error($db));
    $res_p = mysqli_query($db, $sql_p) or die(mysqli_error($db));

    if(mysqli_num_rows($res_u) == 0) {
    	$name_error = "Invalid username";

    }elseif(mysqli_num_rows($res_p) == 0 ) {
    	$pass_error = "Invalid password";

    }else {

    	$res = $con->checkUserName($Username, $Password);
		if($res)
		{   
			$_SESSION['login_user'] = $Username;
			header('location:homepage.php');
		}
		/*else
		{
			?>
			<script>
			alert('User details invalid');
 	       	window.location='Index.php'
	        </script>
			<?php
		}
*/    }

	
}

?>

<html>
<head>
	<meta charset="utf-8">
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
	<div id="container">
		<div id="animation">
			
		</div>
		<div id="login">
			<form method="POST" class="form_error">
				<fieldset>
					<legend>Login Info : </legend>
					<label>Username :</label><br>
					<div <?php if (isset($name_error)): ?> class="form_error" <?php endif?> >
						<input autofocus="autofocus" type="text" name="username"  value="<?php echo $Username;?>" >
							<?php if (isset($name_error)): ?>
	  						<span class="form_error" ><?php echo $name_error; ?></span>
	  						<?php endif ?>	
					</div>
					<br>
					<label>Password :</label><br>
					<div <?php if (isset($pass_error)): ?> class="form_error"	 <?php endif ?>>
						<input type="password" name="password" required >
							<?php if (isset($pass_error)): ?>
      						<span><?php echo $pass_error; ?></span>
      						<?php endif ?>	
      						<br><br>
					</div>

					<input id="checkbox" type="checkbox" name="checkpass"> Remember my password <br><br>
					
					<input id="submit" type="submit" name='btn_login' value="Login"><br><br>

					<a href="confirmbymail.html">Forget Your Password?</a><br><br>
					<p>Don't have an accout?<a href="registration.php">Click Here</a></p>
				</fieldset>
			</form>
		</div>
	</div>
</body>
</html>
