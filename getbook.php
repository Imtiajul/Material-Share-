<?php
include_once("session.php");
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>GetBook</title>
	<link rel="stylesheet" type="text/css" href="index.css">


	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  	<title>Live Searching</title>
  	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  	<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />



	<style>
		.error {color: #FF0000;}
	</style>
</head>
<body>
	
	<div class="container">
   <br />
   <h2 align="center">Search Book</h2><br />
   <div class="form-group">
    <div class="input-group">
     <span class="input-group-addon">Search</span>
     <input type="text" name="search_text" id="search_text" placeholder="Search by Book Details" class="form-control" />
    </div>
   </div>
   <br />
   <div id="result"></div>
  </div>

</body>
</html>

<?php
include_once 'dbMySql.php';
$con = new DB_con();

if($_SERVER["REQUEST_METHOD"] == "POST")
{
	$searchtype=$_POST['searchtype'];
	$key=$_POST['key'];
	$bookfor=$_POST['for'];
  	$key = trim($key);
  	$key = stripslashes($key);
  	$key = htmlspecialchars($key);
  	$authorName = "authorname";
  	$bookName = "bookname";

  	$authorComp = strcmp($searchtype, $authorName);
  	$bookComp = strcmp($searchtype, $bookName);

	if($key == ""){
		if($authorComp ==0){
			$res = $con->searchbook_author($bookfor);
			//search all order by author
  		}
	  	if($bookComp ==0){
	  		$res = $con->searchbook_name($bookfor);
	  		//search all order by book name
	  	}
	  	else{
	  		$res = $con->searchbook_book_type($searchtype,$bookfor);
	  		//search all order by book type
	  	}
	}
	else{
		if($authorComp ==0){
			$res = $con->searchbook_author_key($authorName,$key,$bookfor);
			//search all  author = imtiaz
  		}
	  	if($bookComp ==0){
	  		$res = $con->searchbook_name_key($key,$bookfor);
	  		//search all by book name = cse40
	  	}
		else{
	  		$res = $con->searchbook_book_type_key($searchtype,$bookfor);
	  		//search all  booktype = ""
	  	}
	}


	//$res = $con->searchbook($searchtype,$key,$bookfor);


	/*if($res)
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
		}*/
}

?>



<script>
$(document).ready(function(){ // A page can't be manipulated safely until the document is "ready." jQuery detects this state . $( document ).ready() will only run once the page Document Object Model (DOM) is ready for JavaScript code to execute.

 load_data();

 function load_data(query)
 {
  $.ajax({
   url:"fetch.php",   // The data are send to the "fetch.php" file through POST method.
   method:"POST",
   data:{query:query},     
   success:function(data)     // The response from the server is placed into an HTML element which has id="result". This is output of ajax function
   {
    $('#result').html(data);    
   }
  });
 }
 $('#search_text').keyup(function(){    // jquery key-upevent
  var search = $(this).val();           // set search text to search variable
  if(search != '')
  {
   load_data(search);
  }
  else
  {
   load_data();
  }
 });
});
</script>