<?php
require "Mail/gmail.php";
include('includes/connection.php');

	// code for cancel
if(isset($_REQUEST['bkid']))
	{
$bid=$_GET['bkid'];
$status=2;
$cancelby='a';
$sql = "UPDATE `tblbooking` SET `status`='$status',`CancelledBy`='$cancelby' WHERE  `BookingId`='$bid';";
$result = mysqli_query($conn,$sql);
$msg="Booking Cancelled successfully";
$sql12 = "select * from tblbooking WHERE `BookingId` ='$bid' ";
$re = mysqli_query($conn,$sql12);
while($row = mysqli_fetch_array($re)){
gmail($row['UserEmail'],"Cancel Booking","Welcome to Tourism Management System, Your Booking  is Canceled By Company so Thanks for use our Service");
}
}

//code for confirm
if(isset($_REQUEST['bckid']))
{
$bcid=$_GET['bckid'];
$status=1;
$cancelby='a';
$sql = "UPDATE `tblbooking` SET `status`='$status' WHERE `BookingId`='$bcid';";
$result = mysqli_query($conn,$sql);
$msg="Booking Confirm successfully";

$sql12 = "select * from tblbooking WHERE `BookingId` ='$bcid' ";
$re = mysqli_query($conn,$sql12);
while($row = mysqli_fetch_array($re)){
gmail($row['UserEmail'],"Confirm Booking","Welcome to Tourism Management System, Your Booking  is confirmed By Company so Thanks for use our Service");
}
}




	?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/table-style.css" />
<link rel="stylesheet" type="text/css" href="css/basictable.css" />
<script type="text/javascript" src="js/jquery.basictable.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
      $('#table').basictable();

      $('#table-breakpoint').basictable({
        breakpoint: 768
      });

      $('#table-swap-axis').basictable({
        swapAxis: true
      });

      $('#table-force-off').basictable({
        forceResponsive: false
      });

      $('#table-no-resize').basictable({
        noResize: true
      });

      $('#table-two-axis').basictable();

      $('#table-max-height').basictable({
        tableWrapper: true
      });
    });
</script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
  <style>
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
		</style>
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				<?php include('includes/header.php');?>
				     <div class="clearfix"> </div>	
				</div>
<!--heder end here-->
<ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Manage Bookings</li>
            </ol>
<div class="agile-grids">	
				<!-- tables -->
				<!-- <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?> -->
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2>Manage Bookings</h2>
					    <table id="table">
						<thead>
						  <tr>
						  <th>Booking id</th>
							<th>Name</th>
							<th>Package Name</th>
							<th>Mobile No.</th>
							<th>Email Id</th>
							<th>Passenger Details</th>
							<th>RegDate </th>
							<th>FromDate </th>
							<th>Comment </th>
							<th>Status </th>
							<th>Action </th>
						  </tr>
						</thead>
						<tbody>
<?php


 $sql1 =  "SELECT tblbooking.BookingId as bookid,tblusers.FullName as fname,tblusers.MobileNumber as mnumber,tblusers.EmailId as email,tblbooking.PassengersDetails as pdetails,tbltourpackages.PackageName as pckname,tblbooking.PackageId as pid,tblbooking.Comment as comment,tblbooking.status as status,tblbooking.CancelledBy as cancelby,
 tblbooking.UpdationDate as upddate,tblbooking.RegDate as regdate,tblbooking.FromDate as FromDate from tblusers join  tblbooking on  tblbooking.UserEmail=tblusers.EmailId join tbltourpackages on tbltourpackages.PackageId=tblbooking.PackageId";


$results = mysqli_query($conn,$sql1);
$cnt=1;


while($row = mysqli_fetch_array($results))
{	
			
		?>		
	
						  <tr>
							<td>#BK-<?php echo $cnt;?></td>
							<td><?php echo $row["fname"]?></td>
							<td>
								
								 <a href="update-package.php?pid=<?php echo $row["pid"]?>"><?php echo $row["pckname"];?></a> 
							</td>
							<td><?php echo  $row["mnumber"];?></td>
							<td><?php echo $row["email"];?></td>
							<td><?php echo $row["pdetails"];?></td>
							<td><?php echo $row["regdate"];?></td>
							<td><?php echo $row["FromDate"];?></td>
                            <td><?php echo $row["comment"]?></td>
                           
				

							<td>
<?php 
if($row["status"]==0)
{
echo "Pending";
}
if($row["status"]==1)
{
echo "Confirmed";
}
if($row["status"]==2 and  $row["cancelby"]=='a')
{
echo "Canceled by Admin at ".$row["upddate"] ;
} 
if($row["status"]==2 and $row["cancelby"]=='u')
{
echo "Canceled by User at ".$row["upddate"];

}
?></td>

<?php if($row["status"]==2)
{
?>
<td>Cancelled</td>
<?php 
} else {
?>
<td><a href="manage-bookings.php?bkid=<?php echo $row["bookid"];?>" onclick="return confirm('Do you really want to cancel booking')" >Cancel</a> 
/
 <a href="manage-bookings.php?bckid=<?php echo $row["bookid"];?>" onclick="return confirm('booking has been confirm')" >Confirm</a></td>
<?php }?>

		


						  </tr>
						 <?php $cnt=$cnt+1;} ?>
						</tbody>
					  </table>
					</div>
				  </table>

				
			</div>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop(); 
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });
			 
		});
		</script>
		<!-- /script-for sticky-nav -->
<!--inner block start here-->
<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->
<?php include('includes/footer.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						<?php include('includes/sidebarmenu.php');?>
							  <div class="clearfix"></div>		
							</div>
							<script>
							var toggle = true;
										
							$(".sidebar-icon").click(function() {                
							  if (toggle)
							  {
								$(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
								$("#menu span").css({"position":"absolute"});
							  }
							  else
							  {
								$(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
								setTimeout(function() {
								  $("#menu span").css({"position":"relative"});
								}, 400);
							  }
											
											toggle = !toggle;
										});
							</script>
<!--js -->
<script src="js/jquery.nicescroll.js"></script>
<script src="js/scripts.js"></script>
<!-- Bootstrap Core JavaScript -->
   <script src="js/bootstrap.min.js"></script>
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
