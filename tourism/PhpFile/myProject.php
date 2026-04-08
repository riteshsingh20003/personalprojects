<?php

$username ="root";
$password= "";
$server = "localhost";
$db = "project";
$conn = mysqli_connect($server,$username,$password,$db);
if(!$conn){
echo "not Connected";
}
?>

<?php
include "header.php";
?>
   
<!doctype html>
<html lang="en">
  <head>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="myProject.css">
  <link rel="stylesheet" href="http://localhost/Project/tourism/PhpFile/myProject.css">
   
    
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <title>My Tourism</title>
    

  </head>
  <body>


    
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active" ></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
      </ol>
      <div class="carousel-inner">
       
 <div class="carousel-item active">
          <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2019/03/12/20/19/india-4051753__340.jpg" alt="First slide">
          <div class="carousel-caption d-none d-md-block">
            <h1>WELCOME TO OUR WEBSITE</h1>
          </div>
        </div> 
        




<?php

        $sql = "Select * from `tbltourpackages`";
       $result = mysqli_query($conn,$sql);
       while ($row = mysqli_fetch_assoc($result)){

      $ujash =strcasecmp($row["PackageType"],"Special Package");
       if($ujash == 0){

      echo ' <div class="carousel-item" id="tours3" >';
      // echo '  <img class="d-block w-100" src="https://cdn.pixabay.com/photo/2017/04/08/22/26/buddhism-2214532__480.jpg" alt="Third slide">';
      echo '<img src="http://localhost/Project/tourism/admin/pacakgeimages/'.$row["PackageImage"].'" width="100%">';
      echo '  <div class="carousel-caption d-none d-md-block" id="pushpa">';
     echo "<h1>".$row['PackageName']."</h1>";   
     echo "<h2>Price - ".$row['PackagePrice']."</h2>";  
     echo '<button class="btn btn-primary">'."<a href="."Packagelist.php?PackageId=".$row["PackageId"].">"."Book Now"."</a></button>";
     echo '
        </div>
      </div>
       ';
       
      
       
       }
      else{
          
      }
    }


      

        ?>
      </div>
      <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
      </a>
    </div>



    
    <div id="myhr">
      <hr>
    </div>
    <div class="variety">
      <h1>Variety of Package</h1>
      <div class="block">
        <ul>
          <li> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcShDKo9R8R_X9zPghvSbMwVLBz-F724v4JA1g&usqp=CAU" alt="">
          <div class="tagline">
            <b>Collage picnic Tours</b>
          </div>
        </li>
          <li> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSFBeICTaRRAfxFjhBCoTc9t6zu8IIaNnUavQ&usqp=CAU" alt="">
            <div class="tagline">
              <b>Family Vacation Tours</b>
            </div>
          </li>
          <li> <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTfjmZ2wFN2gsrsiRf5dWO8O-QPA4Sn7TtTHg&usqp=CAU" alt="">
            <div class="tagline">
              <b> Island-Beach Tours</b>
            </div>
          </li>
              <li>
                 <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSO0SnSjWuNzfemsjvJKM1-qSXP_cvAdWBWkw&usqp=CAU" alt="">
                 <div class="tagline">
                   <b> Corporate Tours</li> </b>
                 </div>
        </ul>
      </div>
    </div>

  <div class="labelMyInfo">
    <div id="bgImage">
      <img src="https://media.istockphoto.com/photos/family-bonding-while-out-on-a-picnic-picture-id1325645267?b=1&k=20&m=1325645267&s=170667a&w=0&h=leNP-r5f96TYtsq0onheyYrlRcUkvz7hjxINsFkGoIk=" alt="">
      <h1>Tour & Holiday Packages</h1>
    </div>
  </div>

<div id="mycard1"> 
<?php

       $sql = "Select * from `tbltourpackages`";
       $result = mysqli_query($conn,$sql);
       while ($row = mysqli_fetch_assoc($result)){
        $ujash =strcasecmp($row["PackageType"],"Special Package");
        if($ujash == 0){
       
       
       }
       else{
        echo '<div class="mycard1" id="tours2">';
        echo '<img src="http://localhost/Project/tourism/admin/pacakgeimages/'.$row["PackageImage"].'">';
    
      // echo '<img src="https://www.sarvteltours.com/wp-content/uploads/2021/08/Copy-of-Travel-21.png" class="card-img-top" alt="...">';
       echo "<h2>".$row['PackageName']."</h2><br>"; 
       echo "<h5>Package type-".$row['PackageType']."<br>"; 
       echo "Features - ".$row['PackageFetures']."<br>"; 
      //  echo "Details - ".$row['PackageDetails']."<br></h5>"; 
       echo "<h3>Price - ".$row['PackagePrice']."</h3><br>"; 
       echo  '<button class="btn btn-primary">'."<a href="."Packagelist.php?PackageId=".$row["PackageId"].">"."Book Now"."</a></button>";
       echo "</div>";
      }
       }
      
?>
        <!-- <img src="https://www.sarvteltours.com/wp-content/uploads/2021/08/Copy-of-Travel-21.png" class="card-img-top" alt="...">  -->

    </div>
<hr>

<div id="international">
  <div class="heading">
      <img src="https://cdn.pixabay.com/photo/2019/03/12/20/19/india-4051753__340.jpg" alt="">
      <h1>Special Packages</h1>
  </div>
</div>

<div id="mycard1"> 
<?php

       $sql = "Select * from `tbltourpackages`";
       $result = mysqli_query($conn,$sql);
       while ($row = mysqli_fetch_assoc($result)){

      $ujash =strcasecmp($row["PackageType"],"Special Package");
       if($ujash == 0){
       echo '<div class="mycard1" id="special">';
       echo '<img src="http://localhost/Project/tourism/admin/pacakgeimages/'.$row["PackageImage"].'">';
      // echo '<img src="https://www.sarvteltours.com/wp-content/uploads/2021/08/Copy-of-Travel-21.png" class="card-img-top" alt="...">';
       echo "<h2>".$row['PackageName']."</h2><br>"; 
       echo "<h5>Package type-".$row['PackageType']."<br>"; 
       echo "Features - ".$row['PackageFetures']."<br>"; 
       echo "Details - ".$row['PackageDetails']."<br></h5>"; 
       echo "<h3>Price - ".$row['PackagePrice']."</h3><br>";  
       echo '<button class="btn btn-primary">'."<a href="."Packagelist.php?PackageId=".$row["PackageId"].">"."Book Now"."</a></button>";
       echo "</div>";
       }
      else{
          
      }
    }
?>
        <!-- <img src="https://www.sarvteltours.com/wp-content/uploads/2021/08/Copy-of-Travel-21.png" class="card-img-top" alt="...">  -->

    </div>
<hr>



<div class="sponsor">
<img src="" alt="">
</div>
  
<div class="box">
  <div class="appointment">
    <img src="https://cdn-icons-png.flaticon.com/128/159/159832.png" alt="">
    <h3>Make An Appoitment</h3>
    <h6>Have a Question? Submit an inquiry and we will get back to you</h6>
  </div>
  <div class="time">
    <img src="https://cdn2.iconfinder.com/data/icons/pittogrammi/142/10-512.png" alt="">
    <h3>Working Hours</h3>
    <ul>
  <li> Week Days : 05:00 - 22:00</li>
  <li> Saturday : 05:00 - 18:00</li>
  <li> Sunday : CLOSED</li>
    </ul>
  </div>
  <div class="calling">
    <img src="https://t4.ftcdn.net/jpg/01/58/21/69/240_F_158216984_zSFxdd273rSrPmwnsK1mwukR5c2N0zWq.jpg" alt="">
    <h3>Emergency Calls 24/7</h3>
    <h2>
      +91-7984603703
    </h2>
    <h2>
      +91-9377949448
    </h2>
  </div>
</div>

<hr>

<div class="feedback">
  <div id="mybgImg">
    <img src="https://cdn.pixabay.com/photo/2019/10/26/13/40/autumn-4579561__480.jpg" alt="">
  </div>
<div class="details">
<h1>Why Book With Us?</h1>  
<h3>We offer best carfaies, special discount..</h3>

<div class="security">
  <div class="first">
    <img src="https://cdn-icons-png.flaticon.com/128/25/25473.png" alt="">
    <h4>End-to-End Connectivity with Afforadable Price</h4>
  </div>
  <div class="Second">
    <img src="https://cdn-icons-png.flaticon.com/128/159/159832.png" alt="">
    <h4>Convenience in Timing, Booking, Modification & Cancellation etc</h4>
  </div>
  <div class="Third">
    <img src="https://static.thenounproject.com/png/6479-200.png" alt="">
    <h4>Greater Flexiblity</h4>
  </div>
  <div class="Fourth">
    <img src="https://cdn-icons-png.flaticon.com/128/388/388531.png" alt="">
    <h4>Sophisticated,latest System</h4>
  </div>
</div>
</div>

<div class="formDetails">
<form action="http://localhost/Project/tourism/PhpFile/packageenquiry.php" method="post">
  <h1 style="text-align: center;">Request call back</h1>
  <div class="form-group">
    <label for="formGroupExampleInput">FullName</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter the Name" name="FullName" required>
  </div>
  <div class="form-group">
    <label for="formGroupExampleInput">Phone Number</label>
    <input type="text" class="form-control" id="formGroupExampleInput" placeholder="Enter the Number" name="MobileNumber" required>
  </div>
  <div class="form-group ">
    <label for="inputEmail4">Email</label>
    <input type="email" class="form-control" id="inputEmail4" placeholder="Email" name="EmailId" required>
  </div>
  <div class="form-group">
    <label for="Subject">Subject</label>
    <input type="Text" class="form-control" id="Subject" placeholder="Subject" name="Subject" required>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea class="form-control" name="Description" id="exampleFormControlTextarea1" rows="3" required></textarea>
  </div>
  <button class="btn btn-primary" name="Submit">Submit</button>
</form>
</div>
</div>

<div id="review" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <h1><b>Reviews<b></h1>
    </div>
    <?php
$sql3 = "SELECT * FROM `userreview`LEFT JOIN`tblusers` ON `userreview`.`EmailId` = `tblusers`.`EmailId`";
$result3 = mysqli_query($conn,$sql3);
while($row = mysqli_fetch_assoc($result3)){
  

 echo '
  <div class="carousel-item">
  <h1>'.$row['PackageName'].'</h1>';
  echo '<div id="ratings">';
  for ($i=1; $i <= 5; $i++) { 
    if($i <= $row['Star'] ){
   echo '<span class="fa fa-star checked"></span>';
  }
  else{
    echo '<span class="fa fa-star"></span>';
  }
}
echo '</div>';
  echo '<h3>" '.$row['Description'].' "</h3>
  <h6>- '.$row['FullName'].'</h6>
  </div>';
}
?>  
  </div>
  <a class="carousel-control-prev" href="#review" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#review" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>


<?php 
$sql2 = "SELECT * FROM tblpages";
$result2 = mysqli_query($conn,$sql2);
while($row = mysqli_fetch_array($result2)){
  if($row["type"] == "contact"){
    echo $row["detail"];
  }
  else{

  }
} 
include("footer.php"); 
include("footer1.php"); 
?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="animation.js"></script>

    </script>
  </body>
</html>