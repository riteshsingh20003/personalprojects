<?php
if(!isset($_SESSION)) { 
            session_start(); 
          } 
include "connection.php";
?>
<?php 
if(isset($_POST['Login'])){
    $EmailId = $_POST['EmailId'];
    $Password = sha1($_POST['Password']);
    $sql = "SELECT * FROM `tblusers`;";
   $flag = 0;
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_array($result)){
        if( ($EmailId == $row['EmailId']) and ($Password == $row['Password'])){
                      
          $_SESSION['Email']=$EmailId;
          echo $_SESSION['Email'];
          $flag = 1;
          header('Location:http://localhost/Project/tourism/PhpFile/myProject.php');
          break;
        
        }
    }
    if($flag == 0){
        
      header('Location:http://localhost/Project/tourism/login/login.html');
      echo '<div class="alert alert-danger" role="alert">
        Login Unsuccessful
      </div>';
    }

}
?>

<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    </head>
</html> 