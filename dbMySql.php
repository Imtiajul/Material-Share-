<?php
//include_once('session.php');

define('DB_SERVER','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME', "material_share");



class DB_con
{	
	public $con;
	function __construct()
	{
		$this->con = mysqli_connect(DB_SERVER,DB_USER,DB_PASS,DB_NAME) or die('localhost connection problem'.mysqli_connect_error());

	}
	
	public function insert($userName,$userPassword,$userMail,$userAddress,$userInstitute,$userMobile)
	{	
		$sql = "INSERT into studentInfo(Address , userName, Institution, Email, Phone, Password) VALUES('$userAddress', '$userName', '$userInstitute', '$userMail', '$userMobile', '$userPassword')";
		if(mysqli_query($this->con, $sql)){
			//echo "Records inserted successfully.";
			//$_SESSION['login_UserName'] = $username;
			return true;
		} else{
			//echo "ERROR: Could not able to execute '$sql'. " . mysqli_error($conn);
			return false;
		}
	}


	public function uploadbook($bookname,$authorname,$bookprice,$booktype,$bookfor,$loanduration)
	{	
		$sql = "INSERT into bookinfo(bookName, authorName, bookPrice, bookType, bookFor, loanDuration) VALUES('$bookname', '$authorname', '$bookprice', '$booktype', '$bookfor', '$loanduration')";
		if(mysqli_query($this->con, $sql)){
			//echo "Records inserted successfully.";
			//$_SESSION['login_UserName'] = $username;
			return true;
		} else{
			//echo "ERROR: Could not able to execute '$sql'. " . mysqli_error($conn);
			return false;
		}
	}

	public function checkUserName($username, $Password) 
	{
		$sql = "SELECT UserName FROM studentInfo where UserName = '$username' AND  Password = '$Password'";

		$query = mysqli_query($this->con, $sql);
		
/*		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$active = $row['active'];
*/
		$count = mysqli_num_rows($query);

		if($count == 1) {
			//$_SESSION['login_user'] = $username;
			//$_SESSION['login_UserName'] = $username;
			return true;
		} else {
			return false;
		}

	}
	
	public function checkMan($Id, $Password) 
	{
		$sql = "SELECT Id FROM manager_info where Id = '$Id' AND  Password = '$Password'";

		$query = mysqli_query($con, $sql);
		
/*		$row = mysqli_fetch_array($query, MYSQLI_ASSOC);
		$active = $row['active'];
*/
		$count = mysqli_num_rows($query);

		if($count == 1) {
			//session_register("Id");
			$_SESSION['login_id'] = $Id;

			return true;
		} else {
			return false;
		}

	}


	public function update_phone($value,$currentUser)
	{	
		$sql = "UPDATE studentinfo SET Phone = '".$value."' WHERE userName='".$currentUser."'";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function update_address($value,$currentUser)
	{	
		$sql = "UPDATE studentinfo SET Address = '".$value."' WHERE userName='".$currentUser."'";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function update_ins($value,$currentUser)
	{	
		$sql = "UPDATE studentinfo SET Institution = '".$value."' WHERE userName='".$currentUser."'";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function update_name($value,$currentUser)
	{	
		$sql = "UPDATE studentinfo SET userName = '".$value."' WHERE userName='".$currentUser."'";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}
	public function update_mail($value,$currentUser)
	{	
		$sql = "UPDATE studentinfo SET Email = '".$value."' WHERE userName='".$currentUser."'";
		$res = mysqli_query($this->con, $sql);
		return $res;
	}


}//end of class
	//userName Ajax
	if(!empty($_GET['username'])) {
		$username = $_GET['username'];

		$con = mysqli_connect('localhost', 'root', '', 'material_share')or die('localhost connection problem'.mysqli_connect_error());

		$sql = "SELECT * FROM studentinfo WHERE UserName='$username'";

		$result = mysqli_query($con, $sql);

		if(mysqli_num_rows($result)) {
			//$row = mysqli_fetch_assoc($result);

			echo json_encode(['status'=>'success']);
		}
		else {
			echo json_encode(['status'=>'error']);
		}

	}

?>