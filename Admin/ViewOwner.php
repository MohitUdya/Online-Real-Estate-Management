<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {color: #869629}
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
      <div>
<h2 class="style3">Welcome To Control Panel</h2>
      <br/>
       <?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "select * from customer_reg where CustomerId='".$_GET['CustId']."' ";
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
                    <td height="35" bgcolor="#E2E2E2"><span class="style5 style4 style11"><strong>ID:</strong></span></td>
                    <td bgcolor="#E2E2E2"><span class="style5 style4 style11"><strong><?php echo $CustomerId;?></strong></span></td>
                  </tr>
                  <tr>
                    <td height="37"><span class="style5 style4 style11"><strong>Name:</strong></span></td>
                    <td><span class="style5 style4 style11"><strong><?php echo $CustomerName;?></strong></span></td>
                  </tr>
                 
                  
                  <tr>
                    <td height="32" bgcolor="#E9E9E9"><span class="style5 style4 style11"><strong>Mobile:</strong></span></td>
                    <td bgcolor="#E9E9E9"><span class="style5 style4 style11"><strong><?php echo $Address;?></strong></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>City:</strong></span></td>
                    <td bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong><?php echo $City;?></strong></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#E8E8E8"><span class="style5 style4 style11"><strong>Mobile Number:</strong></span></td>
                    <td bgcolor="#E8E8E8"><span class="style5 style4 style11"><strong><?php echo $MobileNo;?></strong></span></td>
                  </tr>
                   <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>EmailId:</strong></span></td>
                    <td bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong><?php echo $EmailId;?></strong></span></td>
                  </tr>
                    <tr>
                    <td height="32" bgcolor="#E0E0E0"><span class="style5 style4 style11"><strong>Gender:</strong></span></td>
                    <td bgcolor="#E0E0E0"><span class="style5 style4 style11"><strong><?php echo $Gender;?></strong></span></td>
                  </tr>
                    <tr>
                    <td height="32" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>BirthDate:</strong></span></td>
                    <td bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong><?php echo $BirthDate;?></strong></span></td>
                  <tr>
                    <td><span class="style9"></span></td>
                    <td>&nbsp;</td>
                  </tr>
          </table>
<?php
// Close the connection
mysql_close($con);
?>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
      <br/>
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
