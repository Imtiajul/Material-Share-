<?php
include_once('dbMySql.php');
include_once('session.php');
//session_start();
$conn = mysqli_connect('localhost', 'root', '', 'material_share');
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style>
	table, th, td {
	    border: 1px solid black;
	}
	</style>
</head>
<body>
	<div id="login">
		<h2>Your profile info :</h2>
		<?php

		$sql = "SELECT userName, Address, Institution, Email, Phone FROM studentinfo WHERE userName = '$login_session' ";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
		    echo "<table><tr><th>Name</th><th>Address</th><th>Institution</th><th>Mail</th><th>Phone number</th></tr>";
		    while($row = $result->fetch_assoc()) {
		        echo "<tr><td>" . $row["userName"]. "</td><td>" . $row["Address"]."</td><td>" . $row["Institution"]."</td><td>" . $row["Email"]."</td><td>" . $row["Phone"]."</td></tr>";
		    }
		    echo "</table>";
		} else {
		    echo "0 results";
		}

		
		?>
		<br><br>

		<form method="POST">
			<fieldset>
				<legend>Update Info : </legend>
				<select name="update_part">
					 <option value="name">Name</option>
					 <option value="address">Address</option>
					 <option value="ins">Institution</option>
					 <option value="mail">Mail</option>
					 <option value="phone">Phone</option>
				</select><br><br>
				
				<label>Update :</label><br>
				<input type="text" name="updateValue" required><br><br>
					
				<input id="submit" type="submit" name='btn_login' value="Update"><br><br>
			</fieldset>
		</form>
		
	</div>
</body>
</html>

<?php

//$con = mysqli_connect('localhost', 'root', '', 'material_share');

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$update_part=$_POST['update_part'];
	$updateValue=$_POST['updateValue'];

	$name= "name";
	$address= "address";
	$ins= "ins";
	$mail= "mail";
	$phone= "phone";

	$u_name = strcmp($update_part,$name);
	$u_address = strcmp($update_part,$address);
	$u_ins = strcmp($update_part,$ins);
	$u_mail = strcmp($update_part,$mail);
	$u_phone = strcmp($update_part,$phone);
	$currentUser = $login_session;
	//value passing to db
	if($u_phone == 0){
		$conn = new DB_con();
 		$res = $conn->update_phone($updateValue,$currentUser);
		if($res)
		{
			?>
			<script>
			alert('Phone Updated');
	        window.location='Profile.php'
	        </script>
			<?php

		}
		else
		{
			?>
			<script>
			alert('error updating...');
	        </script>
			<?php
		}
	}

	if($u_address == 0){
		$conn = new DB_con();
 		$res = $conn->update_address($updateValue,$currentUser);
		if($res)
		{
			?>
			<script>
			alert('Address Updated');
	        window.location='Profile.php'
	        </script>
			<?php

		}
		else
		{
			?>
			<script>
			alert('error updating...');
	        </script>
			<?php
		}	
	}
	//asdfasdfasdf
	if($u_ins == 0){
		$conn = new DB_con();
 		$res = $conn->update_ins($updateValue,$currentUser);
		if($res)
		{
			?>
			<script>
			alert('Institution Updated');
	        window.location='Profile.php'
	        </script>
			<?php

		}
		else
		{
			?>
			<script>
			alert('error updating...');
	        </script>
			<?php
		}	
	}
	//kljlksdjflkdjs
	if($u_mail == 0){
		$conn = new DB_con();
 		$res = $conn->update_mail($updateValue,$currentUser);
		if($res)
		{
			?>
			<script>
			alert('Mail Updated');
	        window.location='Profile.php'
	        </script>
			<?php

		}
		else
		{
			?>
			<script>
			alert('error updating...');
	        </script>
			<?php
		}	
	}
	//kljhkljkjkj
	if($u_name == 0){
		$conn = new DB_con();
 		$res = $conn->update_name($updateValue,$currentUser);
		if($res)
		{
			

			?>
			<script>
			alert('Name Updated');
	        window.location='finalLogout.php'
	        </script>
			<?php

		}
		else
		{
			?>
			<script>
			alert('error updating...');
	        </script>
			<?php
		}	
	}
	
}

?>