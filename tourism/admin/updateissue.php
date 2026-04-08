<?php

include('includes/connection.php');

  
  $iid=$_GET['iid'];
if(isset($_POST['submit2']))
  {
$remark=$_POST['remark'];

$sql = "UPDATE `tblissues` SET `AdminRemark` = '$remark' WHERE `tblissues`.`Id` = $iid;";
$result = mysqli_query($conn,$sql);

$msg="Remark  successfully Updated";
}



 ?>
<script language="javascript" type="text/javascript">
function f2()
{
window.close();
}ser
function f3()
{
window.print(); 
}
</script>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin</title>
<link href="style.css" rel="stylesheet" type="text/css" />
<link href="anuj.css" rel="stylesheet" type="text/css">
</head>
<body>

<div style="margin-left:50px;">
 <form name="updateticket" id="updateticket" method="post"> 
<table width="100%" border="0" cellspacing="0" cellpadding="0">

    <tr height="50">
      <td colspan="2" class="fontkink2" style="padding-left:0px;"><div class="fontpink2"> <b>Update Remark !</b></div></td>
      
    </tr>


   

      <tr>
     <td colspan="2"> 
     <!--
     <?php if($error){?><div class="errorWrap"><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
        else if($msg){?><div class="succWrap"><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?></td>
     -->
    </tr>

            <tbody>
<?php 
$sql1 = "SELECT * from tblissues where id=$iid";
$results = mysqli_query($conn,$sql1);

if(mysqli_num_rows($results) > 0)
{
while ($row = mysqli_fetch_array($results))
{ 
  if($row["AdminRemark"]=="")
  {
?>

     <tr style=''>
      <td class="fontkink1" >Remark:</td>
      <td class="fontkink" align="justify" ><span class="fontkink">
        <textarea cols="50" rows="7" name="remark" required="required" ></textarea>
        </span></td>
    </tr>
    <tr>
      <td class="fontkink1">&nbsp;</td>
      <td  >&nbsp;</td>
    </tr>
    <tr>
      <td class="fontkink">       </td>
      <td  class="fontkink"> <input type="submit" name="submit2"  value="update"   size="40" style="cursor: pointer;" /></td>
    </tr> 
    <?php } else { ?>
     <tr>
      <td class="fontkink1" ><b>Remark:</b></td>
      <td class="fontkink" align="justify" ><?php echo $row["AdminRemark"];?></td>
    </tr>
    <tr>
      <td class="fontkink1" ><b>Remark Date:</b></td>
      <td class="fontkink" align="justify" ><?php echo $row["AdminremarkDate"];?></td>
    </tr>
    <?php }}}?>
    
 

 
</table>
 </form>
</div>

</body>
</html>


     