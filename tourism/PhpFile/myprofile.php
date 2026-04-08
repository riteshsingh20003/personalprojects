<?php
include ("header.php");
include ("connection.php");
if(!isset($_SESSION)) { 
    session_start(); 
} 

if(isset($_POST['update'])){
    echo '<div class="alert alert-success" id ="jaiho" role="alert">
    Update Successful
  </div>';
    $name = $_POST['Fullname'];
    $no = $_POST['MobileNumber'];
    $email = $_POST['Email'];
    $id =  $_SESSION['Id'];
    $sql = "UPDATE `tblusers` SET `FullName` = '$name', `MobileNumber` = '$no', `EmailId` = '$email' WHERE `tblusers`.`id` = $id;";
    $result = mysqli_query($conn,$sql);
    unset($_SESSION['Id']);
} 

$sql = "SELECT * FROM `tblusers`;";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    if($row['EmailId'] == $_SESSION['Email']){
    echo '<form method="POST" >';    
    echo '<div id="update">';   
    echo '<label for="fullname">Full Name  </label>
    <input type="text" class="form-control" name="Fullname" id="fullname" value="'.$row['FullName'].'">';
    $_SESSION['Id'] = $row['id'];
    echo '<label for="email">Email Id  </label><input type="text" id="email" class="form-control" name="Email" value="'.$row['EmailId'].'">';
    echo '<label for="phone">Phone No  </label> <input type="text" id="phone" class="form-control"  name="MobileNumber" value="'.$row['MobileNumber'].'">';
    echo '<label class="info"><b> Last Updation Date : </b>'.$row["UpdationDate"].'</label>';
    echo '<br><label class="info"><b> Registration Date : </b>'.$row["RegDate"].'</label>';
    echo '<input type="submit" name="update" id="btn" value="Update" class="btn btn-primary"><br>';
    
    
    echo '</div>';
    echo '</form>';
    break;
    }
}


include ("footer1.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <style>
        .info{
            width:100%;
            text-align:center;
        }
        b{
            color:white;
        }
        .form-control{
            margin:10px;
        }
        #update{
            margin:auto;
            display:flex;
            flex-wrap:wrap;
            align-items:center;
            color:white;
            width:60%;
        }
        #btn{
            width:100px;
            margin:auto;
            position:relative;
            top:20;
        }
        form{
            background-color:black;
        }
        label{
            margin-top:10px;
            font-size:20px;
        }
        #jaiho{
            width:30%;
            margin:auto;
            position:relative;
            top:20;
        }
    </style>
    <title>My Profile</title>
</head>
<body>
    
</body>
</html>