<?php
  if(!isset($_SESSION)){ 
    session_start(); 
  } 
include "header.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Forget Password</title>
    <script src="animation.js"></script>

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
  
<div class="container" id="container">
      <div class="form-container sign-up-container">


      <?php
include "connection.php";
if(isset($_POST['Submit'])){

  $flag = 0;
$id = $_SESSION['id'];
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

    


  <form action="http://localhost/Project/tourism/PhpFile/fwe.php" method="post">
    <?php
            if(isset($_POST['SendOTP'])){

  echo '  <input type="email"  class= "form-control" placeholder="Email Id" value='.$_POST['EmailId'].'  name="EmailId" id="jaiho" readonly>';
            }
            else{
              echo ' <input type="email"  class= "form-control" placeholder="Email Id" placeholder="Enter the EmailID"  name="EmailId" id="jaiho" required>';
            }
            ?>
  
    <?php
    include "connection.php";
if(isset($_POST['SendOTP'])){

$sql = "select * from tblusers";
$result3 = mysqli_query($conn,$sql);
$flag= 0;
while($row = mysqli_fetch_assoc($result3)){
  if($row['EmailId'] == $_POST['EmailId']){ 
$email = $_POST['EmailId'];
$_SESSION['id'] = $row['id'];
OTPMail($email);
echo ' 
<style>
#btnOTP{
display:none;
}
#jaiho{
  display:none;}
</style>

<input type="text" class= "form-control" 
placeholder="Enter the OTP" name="OTP"/>
<input type="password" class= "form-control" placeholder="Password" name="Password" id="Password" required>   
        
<input type="password" class= "form-control" placeholder="Confirm Password" name="ConPassword" id="Password" required> 

';
$flag++;
  }
}
if($flag == 0){
  echo '<div class="alert alert-danger">Email is not Matched</div>';
  echo '<style>#btnOTP,#ujash{display:none;}</style>';
  echo '<a href="http://localhost/Project/tourism/PhpFile/fwe.php"><button class="btn btn-primary" name = "retry">Retry</button></a>';
}


}
?>
    <div id="mybtns">
      <button name="SendOTP" id = "btnOTP" class="btn btn-primary">Send OTP</button>
      <?php
            if(isset($_POST['SendOTP'])){
  echo '<button name="Submit" class="btn btn-primary" id="ujash" type="Submit">Submit</button>';
            }
            ?>
    </div>
  </form>
  </div>
  </div>
  <?php
  include "footer1.php";
  ?>
</body>
</html>

<?php
function OTPMail($email){
  require "Mail/gmail.php";
  $otp = rand(100000,999999);
  $_SESSION['otp'] = $otp;
  gmail($email,"Forget Password","Your OTP is - ".$otp." Donot share with others");
}
?>


