<?php

require 'Mail/gmail.php';

include "connection.php";
if(!isset($_SESSION)) { 
  session_start(); 
} 
?>
<html>
    <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/Project/tourism/PhpFile/myProject.css">
    <style>
      input::-webkit-outer-spin-button,
input::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
} 
      .form-group{
        margin:auto;
        margin-top:20px;
        border-radius:10px;
        WIDTH:70%;
        display:flex;
      }
      .form-group input{
        text-align:center;
        margin:10px;
        width:60%;
      }
      #jai{
        background-color:black;
      }
      #condition{
        text-align:center;
        margin-top:20px;
        color:white;
        font-family:'Trebuchet MS';
      }
      #btnBook{
        margin:auto;
        display:block;
        margin-top:20px;
      }
      #gender{
        width:100px;
      }
      .price{
        color:white;
      }
      </style>
      </head>
    <body>

<?php
if(isset($_POST["next"]))
{ 
  

    if(!isset($_SESSION['Email'])){
     
        header('Location: http://localhost/Project/tourism/login/login.html');
        
    }   
    else{ 


      $Passengers = $_POST['Passengers'];
      $Child = $_POST['PassengersChild'];
      $pp = (int)$_POST['money'];
      $_SESSION['fromdate'] = $_POST['fdate'];
      $_SESSION['Idno'] = $_POST['idno'];
      $_SESSION['Comment'] = $_POST['Comment'];
      $_SESSION['Passengers'] = $_POST['Passengers'];
      $_SESSION['Child'] = $_POST['PassengersChild'];
      
      $cp = $pp/2;
      $childPrice =  $cp*$Child;
      $total = ($pp*$Passengers) +$childPrice;  
      $_SESSION['Total'] = $total;

     include "header.php";
      
      for ($i=0; $i <$Passengers ; $i++) { 
        echo '<form action= "'.$_SERVER["PHP_SELF"].'" method="post" id="jai">';
        echo '<div class="form-group" id="details">';
        echo '<input type="text" class="form-control" name="Pname'.$i.'" placeholder="Enter the Name - '.($i+1).'"id="name" required>';
        echo '<input type="Number" MAX="120" min="11" class="form-control" name="Page'.$i.'"  placeholder="Enter the Age " id="age" required>';
        ECHO '
        <select id="gender" name="gender'.$i.'" class="form-control mt-2" width="100px"><option value="Male">Male</option><option value="Female">Female</option></option> </select>
        ';
        echo '</div>';
      }  
      for ($i=0; $i <$Child ; $i++) { 
        echo '<form action= "'.$_SERVER["PHP_SELF"].'" method="post" id="jai">';
        echo '<div class="form-group" id="details">';
        echo '<input type="text" class="form-control" name="Pcname'.$i.'" placeholder="Enter the Child Name - '.($i+1).'"id="name" required>';
        echo '<input type="Number" MAX="10" class="form-control" name="Pcage'.$i.'"  placeholder="Enter the Age " id="age" required>';
        ECHO '
        <select id="gender" name="cgender'.$i.'" class="form-control mt-2" width="100px"><option value="Boy">Boy</option><option value="Girl">Girl</option></option> </select>
        ';
        echo '</div>';
      }  
  
      echo '<h2 style="color:red;" align="center">Grand Total :- '.$total.'</h2>';

      echo '<div class="alert alert-danger" align:"center"><b>Note:</b>Payment will be accept after completed tour</div>';

      echo '<div id="condition"><input type="checkbox" required>I am agree with terms and Conditions</div>';
      echo '<input type="submit" class="btn btn-primary" name="Book" id="btnBook" Value="Book">Book</a>';
      echo "</form>";

      }
      } 
      
elseif(isset($_POST['Book'])){

   include "header.php";
   $id = $_SESSION['Idno'];
   $fdate = $_SESSION['fromdate'];
   $email = $_SESSION['Email'];
  $Passengers = $_SESSION['Passengers'];
   $total = $_SESSION['Total'];
   $Comment = $_SESSION['Comment'];
   $combine = "";
   $childs = $_SESSION['Child'];
   for ($i=0; $i <$Passengers ; $i++) { 
     $combine .= "Name :- ".$_POST['Pname'.$i]."\tAge :- ".$_POST['Page'.$i]."\t Gender :- ".$_POST['gender'.$i].",\n";
    }
    for ($i=0; $i <$childs ; $i++) { 
      $combine .= "Child Name :- ".$_POST['Pcname'.$i]."\tChild Age :- ".$_POST['Pcage'.$i]."\t Gender :- ".$_POST['cgender'.$i].",\n";
    }
    $Passengers+=$childs;


    $sql = "INSERT INTO `tblbooking` (`BookingId`, 
    `PackageId`, `UserEmail`,`Passengers`,`PassengersDetails`,`TotalPrice`,`FromDate`, `Comment`, `RegDate`, `CancelledBy`) VALUES (NULL, '$id', '$email',  '$Passengers','$combine','$total','$fdate','$Comment', current_timestamp(), '');";
    $result = mysqli_query($conn,$sql);
    if($result){
        echo '<div class="alert alert-success" role="alert">
    Booking Successful
  </div>';
      gmail($email,"Booking for Package","Welcome to Tourism Management System, Your Boooking is Successful. Total Price is - ".$total." so Happy Journey");
    }
    else{
        echo '<div class="alert alert-danger mt-3" role="alert">
    Booking Unsuccessful
  </div>';
    } 
    unset($_SESSION['Idno']);
    unset($_SESSION['Passengers']);
    unset($_SESSION['Total']);
    unset($_SESSION['Comment']);
    unset($_SESSION['fromdate']);
}
else{
    echo '<div class="alert alert-danger" role="alert">
    Maintenance Error
  </div>';
}
include "footer1.php";
?>
</body>
</html> 
