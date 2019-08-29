<?php
include_once('session.php');
include_once('dbMySql.php');
$con = new DB_con();
$currentUser = $login_session;

//fetch.php
$connect = mysqli_connect("localhost", "root", "", "material_share");

function select(){
   echo "The select function is called.";
}

$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($connect, $_POST["query"]);
 $query = "
  SELECT * FROM bookinfo
  WHERE 
  bookName LIKE '%".$search."%'
  OR authorName LIKE '%".$search."%'
  OR bookPrice LIKE '%".$search."%' 
  OR bookType LIKE '%".$search."%' 
  OR bookFor LIKE '%".$search."%'
  OR loanDuration LIKE '%".$search."%'
  OR bookOwner LIKE '%".$search."%'
 ";
}
else
{
 $query = "
  SELECT * FROM bookinfo ORDER BY bookName
 ";
}

$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
 $output .= '
  <div class="table-responsive">
   <table class="table table bordered">
    <tr>
     <th>Book Name</th>
     <th>Author name</th>
     <th>Book Price</th>
     <th>Book Type</th>
     <th>Loan Type </th>
     <th>Loan Duration</th>
     <th>Book Owner</th>
    </tr>
 ';
 while($row = mysqli_fetch_array($result))
 {
  $output .= '
   <tr style="color: White; ">
    <td>'.$row["bookName"].'</td>
    <td>'.$row["authorName"].'</td>
    <td>'.$row["bookPrice"].'</td>
    <td>'.$row["bookType"].'</td>
    <td>'.$row["bookFor"].'</td>
    <td>'.$row["loanDuration"].'</td>
    <td>'.$row["bookOwner"].'</td>
    <td style="color: Black;"><button type="button" onclick="window.location.href="homepage.php"">Get Book</button></td>
    </tr>
  ';

 }
 echo $output;
}
else
{
 echo 'Data Not Found';
}

?>
