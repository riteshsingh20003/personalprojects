<?php
include('includes/connection.php');
require "Mail/gmail.php";


function sentGmail($packagename){
include('includes/connection.php');
	$pid = $_GET['pid'];
	$sql12 = "select * from tblbooking WHERE `tblbooking`.`PackageId` = '$pid';";
	$re = mysqli_query($conn,$sql12);
	while($row1 = mysqli_fetch_array($re)){
		$email = $row1['UserEmail'];
	gmail($email,"Cancel Package","Welcome to Tourism Management System, Your Package ".$packagename." is Terminated by Company so Thanks for use our Services");

}
}
?>
<?php
function click(){
include('includes/connection.php');

$pid=$_GET['pid'];	
if(isset($_POST['submit']))
{
    $pname=$_POST['packagename'];
    $ptype=$_POST['packagetype'];	
    $plocation=$_POST['packagelocation'];
    $pprice=$_POST['packageprice'];	
    $pfeatures=$_POST['packagefeatures'];
    $pfdate = $_POST['fromDate'];
    $pdetails=$_POST['packagedetails'];	
    // $pimage=$_FILES["packageimage"]["name"];
    $sql="UPDATE `tbltourpackages` SET `PackageName` = '$pname', `PackageType` = '$ptype', `PackageLocation` = '$plocation', `PackagePrice` = '$pprice', `Day/Night` = '$pfdate',  `PackageFetures` = '$pfeatures', `PackageDetails` = '$pdetails'WHERE `tbltourpackages`.`PackageId` = '$pid';";
    $result = mysqli_query($conn,$sql);
    $msg = "Data Updated Successfully"; 
    $error = "Data cannot to Modified"; 
             
                 if($result){
                    echo '<div class="succWrap"><strong>SUCCESS</strong> : '.$msg.'</div>'; 
                 }
                 else{
                     echo '<div class="errorWrap"><strong>ERROR</strong> : '.$error.'</div>'; 
                 }
            
}

if(isset($_POST['delete']))
{
	echo '
	<style>#ubtn{display:none;}</style>
	';

    
	$sql4= "SELECT `PackageName` FROM tbltourpackages WHERE `tbltourpackages`.`PackageId` = '$pid';";
	$fd = mysqli_query($conn,$sql4);
	$row = mysqli_fetch_array($fd);
	$packagename = $row["PackageName"];
	sentGmail($packagename);
    $sql="DELETE FROM tbltourpackages WHERE `tbltourpackages`.`PackageId` = '$pid';";
// $sql = "select * from tblbooking";

    $result = mysqli_query($conn,$sql);
    $msg = "Package Deleted  Successfully"; 
    $error = "Not Deleted"; 
             
                 if($result){


                    echo '<div class="succWrap"><strong>SUCCESS</strong> : '.$msg.'</div>'; 
					echo '<a href="http://localhost/ujash/Project/tourism/admin/dashboard.php" class="btn btn-primary">Home</a>';
					
					$status=2;
					$cancelby='a';
					$sql3 = "UPDATE `tblbooking` SET `status`='$status',`CancelledBy`='$cancelby' WHERE 
					`tblbooking`.`PackageId` = $pid";
					$result4 = mysqli_query($conn,$sql3);

					
				 }

                 }
                 else{
                    //   echo '<div class="errorWrap"><strong>ERROR</strong> : '.$error.'</div>'; 
                 }

            
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Admin</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
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
                <li class="breadcrumb-item"><a href="dashboard.php">Home</a><i class="fa fa-angle-right"></i>Update Tour Package </li>
            </ol>
		<!--grid-->
 	<div class="grid-form">
 
<!---->
  <div class="grid-form1">
  	       <h3>Update Package</h3>
             
             <?php

            click();
        
             ?>
  	        	  
  	         <div class="tab-content">
						<div class="tab-pane active" id="horizontal-form">
						
<?php 
$pid=$_GET['pid'];
$sql = "SELECT * from `tbltourpackages` where `PackageId`='$pid'";
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result))
{	?>

							<form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
								<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Name</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagename" id="packagename" placeholder="Create Package" value="<?php echo $row["PackageName"];?>" required>
									</div>
								</div>
<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Type</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagetype" id="packagetype" placeholder=" Package Type eg- Family Package / Couple Package" value="<?php echo $row["PackageType"];?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Location</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagelocation" id="packagelocation" placeholder=" Package Location" value="<?php echo  $row["PackageLocation"];?>" required>
									</div>
								</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Price</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packageprice" id="packageprice" placeholder=" Package Price" value="<?php echo  $row["PackagePrice"];?>" required>
									</div>
								</div>



                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Day/Night</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="fromDate" id="fromDate"  placeholder=""  value="<?php echo $row["Day/Night"];?>" required>
									</div>
								</div>		

    		
                                


                                <div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Features</label>
									<div class="col-sm-8">
										<input type="text" class="form-control1" name="packagefeatures" id="packagefeatures" placeholder="Package Features Eg-free Pickup-drop facility" value="<?php echo $row["PackageFetures"];?>" required>
									</div>
								</div>		


<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Package Details</label>
									<div class="col-sm-8">
										<textarea class="form-control" rows="5" cols="50" name="packagedetails" id="packagedetails" placeholder="Package Details" required><?php echo $row["PackageDetails"];?></textarea> 
									</div>
								</div>															
<div class="form-group">
<label for="focusedinput" class="col-sm-2 control-label">Package Image</label>
<div class="col-sm-8">
<img src="pacakgeimages/<?php echo $row["PackageImage"];?>" width="200" alt="click">
&nbsp;&nbsp;&nbsp;<a href="change-image.php?imgid=<?php echo $row["PackageId"];?>">Change Image</a>
</div>
</div>

<div class="form-group">
									<label for="focusedinput" class="col-sm-2 control-label">Last Updation Date</label>
									<div class="col-sm-8">
<?php  echo $row["UpdationDate"];;?>
									</div>
								</div>		
								<?php } ?>

								<div class="row">
			<div class="col-sm-8 col-sm-offset-2" id="ubtn">
				<button type="submit" name="submit" class="btn-primary btn">Update</button>
				<button type="delete"  name="delete" class="btn btn-danger" onclick="return confirm('Do you want to Delete Package?')" >Delete</button>
			</div>
		</div>
						
					
						
						
						
					</div>
					
					</form>

     
      

      
      <div class="panel-footer">
		
	 </div>
    </form>
  </div>
 	</div>
 	<!--//grid-->

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
