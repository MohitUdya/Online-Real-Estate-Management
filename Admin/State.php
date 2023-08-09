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
	font-size: small;
	font-weight: bold;
	color: #000000;
}
.style4 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
	font-weight: bold;
	color: #FFFFFF;
}
.style12 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
}
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
      <h2>State Management</h2>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="27" bgcolor="#D05F01"><span class="style4">Create New State</span></td>
        </tr>
        <tr>
          <td height="26"><form id="form1" name="form1" method="post" action="InsertState.php">
            <table width="100%" height="71" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="34">State Name:</td>
                <td><span id="sprytextfield1">
                  <label>
                  <input type="text" name="txtStateName" id="txtStateName" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="button" id="button" value="Submit" />
                </label></td>
              </tr>
            </table>
              </form>            </td>
        </tr>
        <tr>
          <td height="25" bgcolor="#1CB5F1"><span class="style3">State List</span></td>
        </tr>
        <tr>
          <td>
          <table width="100%" border="1" bordercolor="#1CB5F1" >
<tr>
<th height="32" bgcolor="#1CB5F1"><div align="left" class="style12">State Id</div></th>
<th bgcolor="#1CB5F1"><div align="left" class="style12">State Name</div></th>
<th height="32" bgcolor="#1CB5F1"><div align="left" class="style12">Edit</div></th>
<th bgcolor="#1CB5F1"><div align="left" class="style12">Delete</div></th>
</tr>
<?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "select * from State_Master";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['StateId'];
$Name=$row['StateName'];
?>
<tr>
<td><div align="left" class="style12"><?php echo $Id;?></div></td>
<td><div align="left" class="style12"><?php echo $Name;?></div></td>
<td><div align="left" class="style12"><a href="EditState.php?StateId=<?php echo $Id;?>">Edit</a></div></td>
<td><div align="left" class="style12"><a href="DeleteState.php?StateId=<?php echo $Id;?>">Delete</a></div></td>
</tr>
<?php
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
?>
<tr>
<td colspan="4"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
</tr>
<?php
// Close the connection
mysql_close($con);
?>
</table>

          </td>
        </tr>
      </table>
      </p>
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

<script type="text/javascript">
<!--
var sprytextfield1 = new Spry.Widget.ValidationTextField("sprytextfield1");
//-->
</script>
</body>
</html>

