<!DOCTYPE html>
<html lang="en">
<head>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
</html>
<?php
include "connection.php";

if(isset($_POST['Submit'])){
    $FullName = $_POST['FullName'];
    $MobileNumber = $_POST['MobileNumber'];
    $EmailId = $_POST['EmailId'];
    $Subject = $_POST['Subject'];
    $Description = $_POST['Description'];
    
    $sql = "INSERT INTO `tblenquiry` (`Id`, `FullName`, `EmailId`, `MobileNumber`, `Subject`, `Description`, `PostingDate`) VALUES (NULL, '$FullName', '$EmailId', '$MobileNumber', '$Subject', '$Description', current_timestamp());";
    $result = mysqli_query($conn,$sql);

    if($result){
        echo '<div class="alert alert-success" role="alert">
        Thank you for submitting your Query
      </div>';
      echo '<div class="alert alert-info" role="alert">
      Our support Staff will contact you in Sometimes
    </div>';
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
        Maintanance Error 
      </div>';
    }
}
?>