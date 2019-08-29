<?php
//session_start();

include_once ('dbMySql.php');
$con = new DB_con();

/*$bookname=$authorname=$booktype="";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  if (empty($_POST["bookname"])||empty($_POST["authorname"])||empty($_POST["booktype"])) {
  	echo '<script language="javascript">';
	echo 'alert("All information is required")';
	echo '</script>';
  } else {
    $bookname = test_input($_POST["bookname"]);
    $authorname = test_input($_POST["authorname"]);
    $booktype = test_input($_POST["booktype"]);
  }
  

}

function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}*/
	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Resestration</title>
	<link rel="stylesheet" type="text/css" href="index.css">
	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	<div id="container">
		<div id="login">
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
				<fieldset>
					<legend>Upload Book: </legend>

					<p><span class="error">* required field</span></p>

					<label>Book name : </label><span class="error">*</span><br>
					<input type="text" name="bookname" required><br>

					<label>Author name : </label><span class="error">*</span><br>
					<input type="text" name="authorname" required><br>

					<label>Price :<br>
					<input type="text" name="bookprice"><br><br>
					
					<label>Book type : </label><span class="error">*</span>
					<select name="booktype">
					  <option value="study">Study</option>
					  <option value="sciencefiction">Science Fiction</option>
					  <option value="drama">Drama</option>
					  <option value="actionadventure">Action and Adventure</option>
					  <option value="romance">Romance</option>
					  <option value="mystery">Mystery</option>
					  <option value="horror">Horror</option>
					  <option value="selfhelp">Self help</option>
					  <option value="travel">Travel</option>
					  <option value="religious">Religious</option>
					  <option value="anthologies">Anthologies</option>
					  <option value="biographies">Biographies</option>
					  <option value="fantasy">Fantasy</option>
					  <option value="children's">Children's</option>
					  <option value="poetry">Poetry</option>
					  <option value="history">History</option>
					</select><br><br>

					<label>Book For: </label>
					<select name="for">
					  <option value="loan">Loan</option>
					  <option value="sell">Sell</option>
					  <option value="both">Both</option>
					</select><br><br>
					

					<label>Loan duration : </label>
					<select name="loanduration" >
					  <option value="7 days">7 days</option>
					  <option value="15 days">15 days</option>
					  <option value="30 days">30 days</option>
					  <option value="90 days">90 days</option>
					  <option value="6 month">6 month</option>
					  <option value="1 year">1 year</option>
					</select><br><br>

					<input id="submit" type="submit" name='submit' value="Submit"><br><br>
					<p>Please fill all information in the form.</p>

				</fieldset>
			</form>
		</div>
	</div>

</body>
</html>

<?php

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$bookname=$_POST['bookname'];
	$authorname=$_POST['authorname'];
	$bookprice=$_POST['bookprice'];
	$booktype=$_POST['booktype'];
	$loanduration=$_POST['loanduration'];
	$bookfor=$_POST['for'];


	$res = $con->uploadbook($bookname,$authorname,$bookprice,$booktype,$bookfor,$loanduration);
	if($res)
	{
		?>
		<script>
		alert('Record inserted...');
        window.location='homepage.php'
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

?>