<?php
include('header.php');
if(!isset($_SESSION)) { 
    session_start(); 
  } 
include "connection.php";

?>
<?php
if(isset($_POST['submit'])){
    $desc=  $_POST['Description'];
    $star= $_POST['star'];
    $bid= $_POST['bid'];
    $email=  $_SESSION['Email'];
    $pname= $_POST['pname'];
    $sql1= "INSERT INTO `userreview` (`BookingId`,`PackageName`, `EmailId`, `Star`, `Description`) VALUES ('$bid','$pname','$email', '$star', '$desc');";
    $result = mysqli_query($conn,$sql1);
    if($result){
        echo '<div class="alert alert-success" id ="jaiho" role="alert">
         Thank You for Submitting Review
      </div>
      <a href="http://localhost/Project/tourism/PhpFile/myProject.php#" class="btn btn-primary">Home</a>';
    }
    else{
        echo '<div class="alert alert-danger" id ="jaiho" role="alert">
        Maintenance Error to send Review
      </div>
      <a href="http://localhost/Project/tourism/PhpFile/myProject.php#" class="btn btn-primary">Home</a>';
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <style>
        body,form{
            background-color:black;
            color:white;
        }
       
       form{
           width:70%;
           margin:auto;
           margin-top:40px;
           background-color:white;
            color:black;
       }
       form input,textarea,form button{
           margin-top:10px;
       }
       label{
           margin-top:20px;
           font-family:"Trebuchet MS";
           font-size:18px;
       }

       div.stars {
  width: 270px;
}
input.star { display: none; }
label.star {
  float: right;
  padding: 10px;
  font-size: 36px;
  color: #444;
  transition: all .2s;
}
input.star:checked ~ label.star:before {
  content: '\f005';
  color: #FD4;
  transition: all .25s;
}
input.star-5:checked ~ label.star:before {
  color: #FE7;
  text-shadow: 0 0 20px #952;
}
input.star-1:checked ~ label.star:before { color: #F62; }
label.star:hover { transform: rotate(-15deg) scale(1.3); }
label.star:before {
  content: '\f006';
  font-family: "FontAwesome";
}
form button{
    margin-top:30px;
    margin-left:42%;
    width:140px;
}
    </style>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Review</title>



</script>
</head>
<body>
    <?php 
    if(isset($_GET['BKid'])){
        $bid = $_GET['BKid'];

    $sql = "SELECT * FROM `tblbooking` JOIN `tbltourpackages`ON `tblbooking`.`PackageId` = `tbltourpackages`.`PackageId`  WHERE BookingId = $bid;";
    $result = mysqli_query($conn,$sql);
    while($row = mysqli_fetch_assoc($result)){
    ?>
    <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <label for="pname">Package Name</label>
     <input type="email" id="pname" name="pname" class="form-control" Value="<?php echo  $row['PackageName']?>"  readonly>  
      
     <label for="grating">Give us Rating</label>
     <div class="stars" id="grating">
    <input class="star star-5" id="star-5" type="radio" value="5" name="star"/>
    <label class="star star-5" for="star-5"></label>
    <input type="hidden" name="bid" value="<?php echo $bid?>">
    <input type="hidden" name="pname" value="<?php echo $row['PackageName']?>">
    <input class="star star-4" id="star-4" type="radio" value="4" name="star"/>
    <label class="star star-4" for="star-4"></label>
    <input class="star star-3" id="star-3" type="radio" value="3" name="star"/>
    <label class="star star-3" for="star-3"></label>
    <input class="star star-2" id="star-2" type="radio" value="2" name="star"/>
    <label class="star star-2" for="star-2"></label>
    <input class="star star-1" id="star-1" type="radio" value="1" name="star"/>
    <label class="star star-1" for="star-1"></label>
  
</div>

    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3" required></textarea>
 
    <button type="submit" id="sub" name="submit" class="btn btn-primary">Submit</button>
    </div>

     <?php
    }
}

     ?>
</form>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
