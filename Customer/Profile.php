<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #1B3B00;
}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #1B3B00; font-size: small; }
.style8 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
	font-weight: bold;
}
.style9 {font-size: small}
.style11 {font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #003300; font-size: small; }
-->
</style>
</head>
<body>
<div class="main">
  <?php
  include "Headermenu.php"
  ?>
  
  <div class="content">
    <div class="innercontent">
      <?php
	  include "left.php"
	  ?>
      <div class="rightpannel">
        <div class="welcome">
          <div class="style3" style="height:30px; padding-bottom:5px">Welcome <?php echo $_SESSION['CustomerName'];?></div>
          <div style="width:573px; height:auto;font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#3f3f3f; line-height:20px; text-align:justify"></div>
          <?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "select * from customer_reg where CustomerId='".$_SESSION['CustomerId']."' ";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$CustomerId=$row['CustomerId'];
$CustomerName=$row['CustomerName'];
$Address=$row['Address'];
$City =$row['City'];
$MobileNo=$row['Mobile'];
$EmailId=$row['Email'];
$Gender =$row['Gender'];
$BirthDate=$row['BirthDate'];
$UserName  =$row['UserName'];
$Password =$row['Password'];
}
			?>
				<table width="100%" height="141" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="35" bgcolor="#DFDFDF"><span class="style11">ID:</span></td>
                    <td bgcolor="#DFDFDF"><span class="style11"><?php echo $CustomerId;?></span></td>
                  </tr>
                  <tr>
                    <td height="37"><span class="style11">Name:</span></td>
                    <td><span class="style11"><?php echo $CustomerName;?></span></td>
                  </tr>
                 
                  
                  <tr>
                    <td height="32" bgcolor="#E6E6E6"><span class="style11">Mobile:</span></td>
                    <td bgcolor="#E6E6E6"><span class="style11"><?php echo $Address;?></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style11">City:</span></td>
                    <td bgcolor="#FFFFFF"><span class="style11"><?php echo $City;?></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#E6E6E6"><span class="style11">Mobile Number:</span></td>
                    <td bgcolor="#E6E6E6"><span class="style11"><?php echo $MobileNo;?></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style11">EmailId:</span></td>
                    <td bgcolor="#FFFFFF"><span class="style11"><?php echo $EmailId;?></span></td>
                  </tr>
                    <tr>
                    <td height="32" bgcolor="#E2E2E2"><span class="style11">Gender:</span></td>
                    <td bgcolor="#E2E2E2"><span class="style11"><?php echo $Gender;?></span></td>
                  </tr>
                    <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style11">BirthDate:</span></td>
                    <td bgcolor="#FFFFFF"><span class="style11"><?php echo $BirthDate;?></span></td>
                  <tr>
                    <td><span class="style9"></span></td>
                    <td><a href="EditProfile.php?Id=<?php echo $CustomerId;?>" class="style8">Edit Profile</a></td>
                  </tr>
                </table>
<?php
// Close the connection
mysql_close($con);
?>
        </div>
       
      </div>
    </div>
  </div>
  <div>
   <?php
   include "footer.php"
   ?>
  </div>
</div>
</body>
</html>
