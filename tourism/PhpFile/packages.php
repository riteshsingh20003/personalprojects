<?php
include('header.php');
include('connection.php');

	?>
<!DOCTYPE HTML>
<html>
<head>
	<style>
		#viewdetails{
			text-decoration:none;
			color:white;
				}
                #image1{
                    width:300px;
                    height:200px;
                }
                #containers{
                    display:flex;
                    margin:20px;
                    margin-top:30px;
                    border:2px solid white;
                    border-radius:10px;
                    padding:20px;
                    width:70vw;
                    margin-left:200px;
                }
                #package{
                    margin-top:20px;
                    font-size:39px;
                }
                #text{
                        margin-left:20px;
                }
                #containers strong,#containers button{
                    position: absolute;
                }
                #pname{
                    color: #ffe400;
                    font-size:24px;
                }
                #ptype{
                    margin-top:45px;
                }
                #plocation{
                    margin-top:87px;
                    opacity:0.8;
                }
                #pf{
                    margin-top:120px;
                    opacity:0.8;
                    width:300px;
                }
                #pprice{
                    margin-top:4%;
                    margin-left:35%;
                    font-size:26px;
                    color:lightGreen;
                }
                #view{
                    margin-top:7.5%;
                    margin-left:38%;
                }

	</style>
<title>Packages</title>

<!-- //jQuery -->
<!-- tables -->


<!-- //tables -->
<!-- lined-icons -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

<!-- //lined-icons -->
</head> 
<body>
   <div class="page-container">
   <!--/content-inner-->
<div class="left-content">
	   <div class="mother-grid-inner">
            <!--header start here-->
				

<div class="agile-grids">	
				<!-- tables -->
				
		
				<div class="agile-tables">
					<div class="w3l-table-info">
					  <h2 id="package" align="center">Packages</h2>
					    <table id="table" class="table table-dark table-striped">
						<thead>
						 
<?php $sql = "SELECT * FROM `tbltourpackages`";
$result = mysqli_query($conn,$sql);

$cnn=1;

while($row = mysqli_fetch_array($result))
{						
	echo '<div id="containers">';
    echo '<img src="http://localhost/Project/tourism/admin/pacakgeimages/'.$row["PackageImage"].'" id="image1">';
    echo '<div id="text">';
	echo '<strong id="pname">Package Name :- '.$row["PackageName"]."</strong>";
	echo '<strong id="ptype">Package Type :- '.$row["PackageType"]."</strong>";
	echo '<strong id="plocation">Location :- '.$row["PackageLocation"]."</strong>";
	echo '<strong id="pf">Fetures :- '.$row["PackageFetures"]."</strong>";
	echo '<strong id="pprice">Price :- ₹'.$row["PackagePrice"]."</strong>";
	echo '<button class="btn btn-primary" id="view"><a id="viewdetails" href=http://localhost/Project/tourism/PhpFile/Packagelist.php?PackageId='.$row["PackageId"].'>View Details</a></button>';
    echo '</div>';
    echo '</div>';
  $cnn++;
}  
						 ?>
						</tbody>
					</div>
				  </table>

				
			</div>
<!-- script-for sticky-nav -->

<div class="inner-block">

</div>
<!--inner block end here-->
<!--copy rights start here-->

<?php


include('footer1.php');?>
<!--COPY rights end here-->
</div>
</div>
  <!--//content-inner-->
		<!--/sidebar-menu-->
						
						
							  <div class="clearfix"></div>		
							</div>
				
   <!-- /Bootstrap Core JavaScript -->	   

</body>
</html>
