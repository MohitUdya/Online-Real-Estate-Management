<?php require_once('../Connections/PMS.php'); ?>

<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? "'" . doubleval($theValue) . "'" : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

mysql_select_db($database_PMS, $PMS);
$query_Recordset1 = "SELECT * FROM city_master";
$Recordset1 = mysql_query($query_Recordset1, $PMS) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
.style11 {font-size: small}
.style12 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style14 {color: #003300}
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
     <h2>Area Management</h2>
        
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="30" bgcolor="#D05F01"><span class="style4">Create New Area</span></td>
        </tr>
        <tr>
          <td height="26"><form id="form1" name="form1" method="post" action="InsertArea.php">
            <table width="100%" height="102" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td height="38">Select City:</td>
                <td><label>
                  <select name="cmbCity" id="cmbCity">
                    <?php
do {  
?>
                    <option value="<?php echo $row_Recordset1['CityName']?>"><?php echo $row_Recordset1['CityName']?></option>
                    <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                  </select>
                </label></td>
              </tr>
              <tr>
                <td height="34">Area Name:</td>
                <td><span id="sprytextfield1">
                  <label>
                  <input type="text" name="txtAreaName" id="txtAreaName" />
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
                    </form>           </td>
        </tr>
        <tr>
          <td height="25" bgcolor="#1CB5F1"><span class="style3">Area List</span></td>
        </tr>
        <tr>
          <td>
          <table width="100%" border="1" bordercolor="#1CB5F1" >
<tr>
<th height="32" bgcolor="#1CB5F1"><div align="left" class="style8 style9 style11 style12 style14">Id</div></th>
<th bgcolor="#1CB5F1"><div align="left" class="style8 style9 style11 style12 style14">City</div></th>
<th height="32" bgcolor="#1CB5F1"><div align="left" class="style8 style9 style11 style12 style14">Area</div></th>
<th bgcolor="#1CB5F1"><div align="left" class="style8 style9 style11 style12 style14">Edit</div></th>
<th bgcolor="#1CB5F1"><div align="left" class="style5 style11 style12 style14">Delete</div></th>
</tr>
<?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "select * from Area_Master";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['AreaId'];
$CityName=$row['CityName'];
$AreaName=$row['AreaName'];
?>
<tr>
<td><div align="left" class="style9 style8 style11 style12 style14"><?php echo $Id;?></div></td>
<td><div align="left" class="style9 style8 style11 style12 style14"><?php echo $CityName;?></div></td>
<td><div align="left" class="style9 style8 style11 style12 style14"><?php echo $AreaName;?></div></td>
<td><div align="left" class="style9 style8 style11 style12 style14"><a href="EditArea.php?AreaId=<?php echo $Id;?>">Edit</a></div></td>
<td><div align="left" class="style9 style8 style11 style12 style14"><a href="DeleteArea.php?AreaId=<?php echo $Id;?>">Delete</a></div></td>
</tr>
<?php
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
?>
<tr>
<td colspan="5"><div align="left" class="style11 style12 style14"><?php echo "Total ".$records." Records"; ?> </div></td>
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
//-->
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
