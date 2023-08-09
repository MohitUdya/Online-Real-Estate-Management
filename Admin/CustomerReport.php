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
$query_Recordset1 = "SELECT DISTINCT City FROM customer_reg";
$Recordset1 = mysql_query($query_Recordset1, $PMS) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
 
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	
$(".country").change(function()
{
var dataString = 'StateName='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_state.php",
data: dataString,
cache: false,
success: function(html)
{
$(".state").html(html);
} 
});

});





});
</script>
<style type="text/css">
<!--
.style1 {
	font-size: 24px;
	font-weight: bold;
}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td>Select City::</td>
      <td><label>
        <select name="city" id="city">
          <?php
do {  
?>
          <option value="<?php echo $row_Recordset1['City']?>"><?php echo $row_Recordset1['City']?></option>
          <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
        </select>
      </label>      </td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td></td>
      <td></td>
      <td><label>
        <input type="submit" name="button" id="button" value="Display Report" />
      </label></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>

<?php
if(isset($_POST['city']))
{
 $city = $_POST['city'];

?>

<table width="100%" border="3" cellpadding="3" cellspacing="3" bordercolor="#000000">
  <tr>
    <td colspan="7"><div align="center" class="style1">Property Buy Sale</div></td>
  </tr>
  
  <tr>
    <td>Name    </td>
    <td>Address    </td>
    <td>Mobile    </td>
    <td>Email    </td>
     <td>Gender    </td>
    <td>BirthDate    </td>
  </tr>
   
 
 <?php 
	// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "select * from customer_reg where City='".$city."'";
// Execute query
$result = mysql_query($sql,$con);
//Loop through each records 
while($row = mysql_fetch_array($result))
{
$CustomerName=$row['CustomerName'];
$Address=$row['Address'];
$MobileNo=$row['Mobile'];
$EmailId=$row['Email'];
$Gender=$row['Gender'];
$BirthDate=$row['BirthDate'];

?>
<tr>
 <td><?php echo $CustomerName;?>    </td>
    <td><?php echo $Address;?>    </td>
    <td><?php echo $MobileNo;?>    </td>
    <td><?php echo $EmailId;?>    </td>
      <td><?php echo $Gender;?>    </td>
    <td><?php echo $BirthDate;?>    </td>
  
</tr>
<?php 
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
mysql_close($con);
}
?>
</table>

<p>&nbsp;</p>

</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
