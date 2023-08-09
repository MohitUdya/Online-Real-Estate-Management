<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
	font-weight: bold;
	color: #000000;
}
.style4 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
	font-weight: bold;
	color: #FFFFFF;
}
.style5 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-size: small;
}
-->
</style>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style9 {font-size: small}
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
      <h2>Category Management</h2>
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="27" bgcolor="#D05F01"><span class="style4">Create New Category</span></td>
        </tr>
        <tr>
          <td height="26"><form id="form1" name="form1" method="post" action="InsertCategory.php">
            <table width="100%" height="170" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="39"><span class="style5">Category Name:</span></td>
                <td><span id="sprytextfield1">
                  <label>
                  <input type="text" name="txtCategoryName" id="txtCategoryName" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td height="99"><span class="style5">Description:</span></td>
                <td><span id="sprytextarea1">
                  <label>
                  <textarea name="txtDesc" id="txtDesc" cols="45" rows="5"></textarea>
                  </label>
                  <span class="textareaRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="button" id="button" value="Submit" />
                </label></td>
              </tr>
            </table>
                    </form>
          </td>
        </tr>
        <tr>
          <td height="25" bgcolor="#1CB5F1"><span class="style3">Category List</span></td>
        </tr>
        <tr>
          <td>
          <table width="100%" border="1" bordercolor="#1CB5F1" >
<tr>
<th height="32" bgcolor="#1CB5F1"><div align="left" class="style12 style8 style9">Id</div></th>
<th bgcolor="#1CB5F1"><div align="left" class="style12 style8 style9">Category</div></th>
<th height="32" bgcolor="#1CB5F1"><div align="left" class="style12 style8 style9">Description</div></th>
<th bgcolor="#1CB5F1"><div align="left" class="style12 style8 style9">Edit</div></th>
<th bgcolor="#1CB5F1"><div align="left" class="style12 style5">Delete</div></th>
</tr>
<?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "select * from Category_Master";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['CategoryId'];
$Name=$row['CategoryName'];
$Desc=$row['Category_Desc'];
?>
<tr>
<td><div align="left" class="style12 style9 style8"><?php echo $Id;?></div></td>
<td><div align="left" class="style12 style9 style8"><?php echo $Name;?></div></td>
<td><div align="left" class="style12 style9 style8"><?php echo $Desc;?></div></td>
<td><div align="left" class="style12 style9 style8"><a href="EditCategory.php?CategoryId=<?php echo $Id;?>">Edit</a></div></td>
<td><div align="left" class="style12 style9 style8"><a href="DeleteCategory.php?CategoryId=<?php echo $Id;?>">Delete</a></div></td>
</tr>
<?php
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
?>
<tr>
<td colspan="5"><div align="left" class="style12"><?php echo "Total ".$records." Records"; ?> </div></td>
</tr>
<?php
// Close the connection
mysql_close($con);
?>
</table>
          </td>
        </tr>
      </table>
     
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
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//-->
</script>
</body>
</html>

