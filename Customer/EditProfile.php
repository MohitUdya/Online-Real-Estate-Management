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
.style4 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style5 {font-size: small}
.style6 {font-weight: bold}
.style9 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; }
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

      <div class="rightpannel1">
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
          <form id="form1" name="form1" method="post" action="UpdateProfile.php?Id=<?php echo $CustomerId;?>">
              <table width="100%" height="394" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td height="31" bgcolor="#DCDCDC"><span class="style5 style4 style11"><strong>ID:</strong></span></td>
                  <td bgcolor="#DCDCDC"><span class="style11"><?php echo $CustomerId;?></span></td>
                </tr>
                <tr>
                  <td height="37"><span class="style5 style4 style11"><strong>Name:</strong></span></td>
          <td><label>
                    <input type="text" name="txtName" id="txtName"  value="<?php echo $CustomerName;?>"/>
                  </label></td>
                </tr>
                <tr>
                  <td height="34" bgcolor="#DFDFDF"><span class="style5 style4 style11"><strong>Address:</strong></span></td>
                <td bgcolor="#DFDFDF"><span class="style11">
              <label>
                    <input name="txtAdd" type="text" id="txtMobile" value="<?php echo $Address;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="37" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>City:</strong></span></td>
              <td bgcolor="#FFFFFF"><span class="style11">
                    <label>
                    <input type="text" name="txtCity" id="txtCity" value="<?php echo $City;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="34" bgcolor="#D6D6D6"><span class="style5 style4 style11"><strong>Mobile Number:</strong></span></td>
              <td bgcolor="#D6D6D6"><span class="style11">
                <label>
                    <input type="text" name="txtMobile" id="txtMobile" value="<?php echo $MobileNo;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="39" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>EmailId:</strong></span></td>
              <td bgcolor="#FFFFFF"><span class="style11">
                    <label>
                    <input type="text" name="txtEmail" id="txtEmail" value="<?php echo $EmailId;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="34" bgcolor="#D8D8D8"><span class="style5 style4 style11"><strong>Gender:</strong></span></td>
              <td bgcolor="#D8D8D8"><span class="style11">
                <select name="cmbGender" id="cmbGender">
                      <option>Male</option>
                      <option>Female</option>
                    </select>
                  </span></td>
                </tr>
                <tr>
                  <td height="39" bgcolor="#FFFFFF"><span class="style5 style4 style11"><strong>BirthDate:</strong></span></td>
              <td bgcolor="#FFFFFF"><span class="style11">
                    <label>
                    <input type="text" name="txtDate" id="txtDate" value="<?php echo $BirthDate;?>" />
                    </label>
                  </span></td>
                </tr>
                <tr>
                  <td height="36" bgcolor="#D4D4D4"><span class="style9">User Name:</span></td>
              <td bgcolor="#D4D4D4"><label>
                    <input type="text" name="txtUser" id="txtUser" value="<?php echo $UserName;?>" />
                  </label></td>
                </tr>
                <tr>
                  <td height="38"><span class="style9">Password:</span></td>
                <td><label>
                    <input type="password" name="txtPass" id="txtPass" value="<?php echo $Password;?>" />
                  </label></td>
                </tr>
                <tr>
                  <td><span class="style9"></span></td>
                  <td><label>
                    <input type="submit" name="Update Profile" id="Update Profile" value="Update Profile" />
                  </label></td>
                </tr>
              </table>
          </form>
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
