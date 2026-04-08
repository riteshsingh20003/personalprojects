<?php
if(!isset($_SESSION)) { 
            session_start(); 
          } 
include "connection.php";
?>
<?php
include "connection.php";
?>
<?php
if(isset($_POST['SignUp'])){
    $FullName = $_POST['FullName'];
    $MobileNumber = $_POST['MobileNumber'];
    $EmailId = $_POST['EmailId'];
    $Password = sha1($_POST['Password']);
    $sql = "INSERT INTO `tblusers` (`FullName`, `Password`, `EmailId`, `MobileNumber`) VALUES ('$FullName', '$Password', '$EmailId','$MobileNumber');";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<div class="alert alert-success" role="alert">
        Registration Successful
      </div>';
      $_SESSION['Email']=$EmailId;
      echo $_SESSION['Email'];
      header('Location:http://localhost/Project/tourism/PhpFile/myProject.php');
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
        Email already Registered
       </div>';
    }
}

?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
    <style>
      a{
        text-decoration:none;
        color:white;
      }
       a:hover{
        text-decoration:none;
        color:white;
      }
      button{
        display:block;
      }
    </style>
</html>