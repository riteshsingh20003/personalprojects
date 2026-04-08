<?php
  if(!isset($_SESSION)) { 
    session_start(); 
  } 
  ?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Project/tourism/PhpFile/myProject.css">
    </head>

<footer>

<?php
include "connection.php";
$sql2 = "SELECT * FROM tblpages";
$result2 = mysqli_query($conn,$sql2);
while($row = mysqli_fetch_array($result2)){
  if($row["type"] == "footer1"){
    echo $row["detail"];
  }
  else{

  }
}
?> 
</footer>
</head>