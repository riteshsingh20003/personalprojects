<?php
include('header.php');
require "Mail/gmail.php";
if(!isset($_SESSION)) { 
    session_start(); 
  } 
  
include "connection.php";

$email = $_SESSION['Email'];   
if(isset($_REQUEST['bkid']))
{
        $bid=$_GET['bkid'];
$sql2 = "UPDATE tblbooking SET status=2,CancelledBy='u' WHERE UserEmail='$email' and BookingId=$bid";
$results2 = mysqli_query($conn,$sql2);
gmail($_SESSION['Email'],"Cancel Booking","Welcome to Tourism Management System, Your Cancellation is Successful so Thanks for use our Service");
}



?>
<!DOCTYPE HTML>
<html>
<head>
<title>History</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Tourism Management System In PHP" />
<script type="applijewelleryion/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,700,600' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Roboto+Condensed:400,700,300' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Oswald' rel='stylesheet' type='text/css'>
<link href="css/font-awesome.css" rel="stylesheet">
<!-- Custom Theme files -->
<script src="js/jquery-1.12.0.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--animate-->
<link href="css/animate.css" rel="stylesheet" type="text/css" media="all">
<script src="js/wow.min.js"></script>
	<script>
		 new WOW().init();
	</script>

  <style>
    body{
      color:white;
    }
		.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
#ujash{
			background-color:black;
		}
		#link,#link2{
      text-decoration:none;
    }
    #review1{
      text-decoration:none;
      color:white;
    }
		</style>
</head>
<body>
<!-- top-header -->
<div class="top-header">

<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy mt-5">
	<div class="container">
		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">My Tour History</h3>
		<form name="chngpwd" id="ujash" method="post" onSubmit="return valid();">
		 <!-- <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?> -->
	<p>
	<table border="1" width="100%" class="table table-striped table-dark">
<tr align="center">
<th>#</th>
<th>Booking Id</th>
<th>Package Name</th>	
<th>Day/Night</th>
<th>Comment</th>
<th>Status</th>
<th>Booking Date</th>
<th>FromDate</th>
<th>Action</th>
<th>Review</th>
</tr>
<?php 

$uemail=$_SESSION['Email'];
$sql1 = "SELECT tblbooking.BookingId as bookid,tblbooking.PackageId as pkgid,tbltourpackages.PackageName as packagename,tbltourpackages.`Day/Night` as `Day/Night`,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.FromDate as fd,tblbooking.RegDate as regdate,tblbooking.CancelledBy as cancelby,tblbooking.UpdationDate as upddate from tblbooking join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId where UserEmail='$uemail'";
// $sql1 = "SELECT * FROM `tblbooking`;";
$results1 = mysqli_query($conn,$sql1); 
$cnt=1;
while($row = mysqli_fetch_assoc($results1)){



echo '<tr align="center">';
echo "<td>".$cnt."</td>";
echo "<td>#BK".$row['bookid']."</td>";
echo '<td><a id="link" href="Packagelist.php?PackageId='.$row["pkgid"].'">'.$row["packagename"].'</a></td>';
// echo "<td>".$row['pkgid']."</td>";
echo "<td>".$row['Day/Night']."</td>";
echo "<td>".$row['comment']."</td>";
echo "<td>";
if($row['status']==0)
{
  echo "Pending";
}
if($row['status']==1)
{
  echo "Confirmed";
}
if($row['status']==2 and  $row['cancelby']=='u')
{
  echo "Canceled by you at " .$row['upddate'];
} 
if($row['status']==2 and $row['cancelby']=='a')
{
  echo "Canceled by admin at " .$row['upddate'];
  
}
echo "</td>";
echo "<td>".$row['regdate']."</td>";

echo "<td>".$row['fd']."</td>";
if($row['status']==2)
{
  echo "<td>Cancelled</td>";
} 
else 
{
  ?>
    <td><a id ="link2" href="tourHistory.php?bkid=<?php echo $row['bookid'];?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a></td>
    <?php
    } 
    // onclick="return confirm('Are you sure, you want to delete it?')"
    $cnt=$cnt+1; 
    // if(strcmp(date('Y-m-d'),$row['fd'])>0){
    if(strcmp(date('Y-m-d'),$row['fd'])>0){
      echo "Ujash Solanki";
    echo '<td><button class="btn btn-primary"><a href="http://localhost/Project/tourism/PhpFile/review.php?BKid='.$row["bookid"].'" id="review1">Review</a></button><br></td>';
    }
    else{
      echo "<td>You cannot Submit Review before Starting Date of Package</td>";
    }
  } 
?>
	</table>
		
			</p>
			</form>
		
	</div>
</div>
<!--- /privacy ---->
<!--- footer-top ---->
<!--- /footer-top ---->
<?php include('footer1.php');?>
<!-- signup -->

</script>
</body>
</html>
