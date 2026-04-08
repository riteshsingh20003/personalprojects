<?php
include "connection.php";
include "header.php";
?>
<html>
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Project/tourism/PhpFile/myProject.css">
    <link rel="stylesheet" href="Packagelist.css">
    <title>Packages</title>

  </head>
  
  <body>
   

    <div id="Packages" class="Packages">
    <form action="http://localhost/Project/tourism/PhpFile/packageBook.php" method="POST" >
   
   <?php
   $id = $_GET['PackageId'];
$sql = "Select * from `tbltourpackages`";
$result = mysqli_query($conn,$sql);
while ($row = mysqli_fetch_assoc($result)){
    if ($row['PackageId'] == $id) {
echo '<div class="mycard1 ">';
echo '<img src="http://localhost/ujash/Project/tourism/admin/pacakgeimages/'.$row["PackageImage"].'">';
echo "<h2>".$row['PackageName']."</h2><br>"; 
echo '<h4>'.$row['PackageLocation']."</h4><br>"; 
echo "<h5>Package type - ".$row['PackageType']."<br></h5>"; 
echo "<h5>Features - ".$row['PackageFetures']."<br></h5>"; 
echo "<h5>Details - ".$row['PackageDetails']."<br></h5>"; 
echo '<h5>From Date:- <input type="date" name="fdate" min="'.date('Y-m-d', strtotime('+2 week')).'"></h5>';


echo "<h5><b>Day/Night - ".$row['Day/Night']."</b><br></h5>"; 
 
echo '<div id="PackageDate">';
echo '<div class="alert alert-danger"><b>Note:</b>Children under the age of 10 will receive the package at half price </div>';
echo 'Total Adult :- <select  width="300px" name="Passengers">
<option selected value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select> <br>';
echo 'Total Child :- <select  width="300px" name="PassengersChild">
<option selected value="0">0</option>
<option value="1">1</option>
<option value="2">2</option>
<option value="3">3</option>
<option value="4">4</option>
<option value="5">5</option>
</select> <br>';
echo "</div>";
echo '<input type="hidden" name="idno" value="'.$id.'">';
echo '<input type="hidden" name="money" value="'.$row['PackagePrice'].'">';
echo '<textarea name="Comment" row="10" cols="50" placeholder="Enter the Comment"></textarea><br>';
echo '<a href="http://localhost/Project/tourism/PhpFile/packageBook.php"><input type="submit" class="btn btn-primary" Value="Next" name="next"></a>';
// echo '<input type="submit" >';
echo "<hr>";
echo "</div>";
}
}
?>
</div>
</form>

<!-- Optional JavaScript -->

<script src="animation.js">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>  </body>
  <style>
    a{
      text-decoration :none;
      color:white;
    }
    a:hover{
      text-decoration :none;
      color:white;
    }
    select{
      margin-top:10px;
      border-radius:10px;
      width:15%;
      height:34px;
      text-align:center;
    }
  </style>

</html>