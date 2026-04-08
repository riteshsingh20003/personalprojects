<?php
include('header.php');
include('connection.php');
if(!isset($_SESSION)) { 
  session_start(); 
}
?> 

<!DOCTYPE HTML>
<html>
<head>
	<style>
		#ujash{
			background-color:black;
		}
	
	</style>
<title>Issue</title>
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
<!-- top-header -->
<div class="top-header">

<!--- /banner-1 ---->
<!--- privacy ---->
<div class="privacy">
	<div class="container mt-5">
		<h3 class="wow fadeInDown animated animated" data-wow-delay=".5s" style="visibility: visible; animation-delay: 0.5s; animation-name: fadeInDown;">Issue Tickets</h3>
		<form name="chngpwd" id="ujash" method="post" onSubmit="return valid();">
		 <!-- <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?> -->
	<p>
	<table border="1" width="100%" class="table  table-dark table-striped">
<tr align="center">
<th>#</th>
<th>Ticket Id</th>
<th>Issue</th>	
<th>Description</th>
<th>Admin Remark</th>
<th>Reg Date</th>
<th>Remark date</th>

</tr>
<?php 

$uemail=$_SESSION['Email'];;
$sql = "SELECT * from `tblissues` where UserEmail='$uemail';";
$result = mysqli_query($conn,$sql);
$cnt=1;

while($row = mysqli_fetch_assoc($result))
{
?>
<tr align="center">
<td ><?php echo $cnt;?></td>
<td width="100">#TCK-<?php echo $row['Id'];?></td>
<td><?php echo $row['Issue'];?></td>
<td width="300"><?php echo $row['Description'];?></td>
<td><?php echo $row['AdminRemark'];?></td>
<td width="100"><?php echo $row['PostingDate'];?></td>
<td width="100"><?php echo $row['AdminremarkDate'];?></td>
</tr>
<?php $cnt=$cnt+1; } ?>
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

</body>
</html>
