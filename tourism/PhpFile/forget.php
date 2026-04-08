<?php
  if(!isset($_SESSION)){ 
    session_start(); 
  } 
  ?>
<?php
include "header.php";
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="forget.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="animation.js"></script>
    <title>Forget Password</title>
    
<style>
  #container input{
    display:block;
    margin: 10px;
}

#container{
    margin-top: 70px;
}
form input{
  margin:15px;
}
#mybtns{
  display:flex;
}
#mybtns button{
margin:10px;
position: relative;
    margin: 0% 42%;
}


</style>
  </head>
  <body>


<?php
include  "connection.php";
$sql = "select * from tblusers";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
  if($row['EmailId'] == $_SESSION['Email']){
?>

<div class="container" id="container">
      <div class="form-container sign-up-container">
        

<?php
$flag = 0;
$id = $row['id'];
if(isset($_POST['Submit'])){
  $newpassword = $_POST['Password'];
  $ConPassword = $_POST['ConPassword'];
  $eOTP = $_POST['OTP'];
  $sOTP = $_SESSION['otp'];
  $hash = sha1($newpassword);
  if ($newpassword == $ConPassword) {
    if($eOTP == $sOTP){
          $sql1 = "UPDATE `tblusers` SET `Password` = '$hash' WHERE `tblusers`.`id` = $id;";
          $result1 = mysqli_query($conn,$sql1);
            echo '<div class="alert alert-success">Password Changed Successful</div>';
            $flag++;
            break;
          }
          else{
              echo '<div class="alert alert-danger">OTP Doesnot Matched</div>';
            }
      }
      else{
        echo '<div class="alert alert-danger mt-3" role="alert">
        Password and Confirm Password Doesnot Match
       </div>'; 
       $flag++;
      }

  unset($_SESSION['otp']);
  if($flag == 0){
    echo '<div class="alert alert-danger mt-3" role="alert">
              Update UnSuccessful
             </div>'; 
    }
}


?>

        <form action="http://localhost/Project/tourism/PhpFile/forget.php" method="post">
          <h1>Forget Password</h1>
          
          <input type="email"  class= "form-control" placeholder="Email Id" value="<?php echo $row['EmailId'];?>"  name="EmailId"  readonly/>
        
          <?php
          
if(isset($_POST['SendOTP'])){
  OTPMail();
  echo ' 
  <style>
  #btnOTP{
  display:none;
  }
  </style>
  
  <input type="text" class= "form-control" 
  placeholder="Enter the OTP" name="OTP"/>
  <input type="password" class= "form-control" placeholder="Password" name="Password" id="Password" required>   
          
  <input type="password" class= "form-control" placeholder="Confirm Password" name="ConPassword" id="Password" required> 

  ';
}
          ?>
          
        
          <div id="mybtns">
            <button id="btnOTP" name="SendOTP" class="btn btn-primary">Send OTP</button>
            <?php
            if(isset($_POST['SendOTP'])){
  echo '<button name="Submit" class="btn btn-primary" type="Submit">Submit</button>';
            }
            ?>
          </div>
       
</form>
</div>
<?php
}
}
?>
   





<?php 
include "footer1.php";
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="file:///C:/xampp/htdocs/Project/tourism/tourism.js"></script>
  </body>
</html>
<?php
function OTPMail(){
  require "Mail/gmail.php";
  $otp = rand(100000,999999);
  $_SESSION['otp'] = $otp;
  gmail($_SESSION['Email'],"Forget Password","Your OTP is - ".$otp." Donot share with others");
}
?>