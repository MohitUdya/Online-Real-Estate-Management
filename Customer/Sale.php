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
$query_Recordset1 = "SELECT * FROM category_master";
$Recordset1 = mysql_query($query_Recordset1, $PMS) or die(mysql_error());
$row_Recordset1 = mysql_fetch_assoc($Recordset1);
$totalRows_Recordset1 = mysql_num_rows($Recordset1);

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
<script src="../SpryAssets/SpryValidationTextField.js" type="text/javascript"></script>
<link href="../SpryAssets/SpryValidationTextField.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #1B3B00;
}
.style6 {font-size: small; font-family: Verdana, Arial, Helvetica, sans-serif; }
.style8 {font-size: small; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; }
.style10 {font-size: small; font-family: Verdana, Arial, Helvetica, sans-serif; font-weight: bold; color: #FFFFFF; }
-->
</style>
<script type="text/javascript" src="jquery.min.js"></script>
<script src="../SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
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

$('.state').live("change",function(){									   
var dataString = 'CityName='+ $(this).val();
$.ajax
({
type: "POST",
url: "ajax_city.php",
data: dataString,
cache: false,
success: function(html)
{
$(".city").html(html);
} 
});

});



});
</script>
<link href="../SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
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
 			
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            
            <tr>
              <td><form action="InsertProperty.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
                <table width="100%" height="388" border="0" cellpadding="0" cellspacing="0">
                  <tr>
                    <td height="22" colspan="2" bgcolor="#819126"><span class="style10">Upload Property</span></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Select Category:</span></td>
                    <td><select name="cmbCat" id="cmbCat">
                      <?php
do {  
?>
                      <option value="<?php echo $row_Recordset1['CategoryId']?>"><?php echo $row_Recordset1['CategoryName']?></option>
                      <?php
} while ($row_Recordset1 = mysql_fetch_assoc($Recordset1));
  $rows = mysql_num_rows($Recordset1);
  if($rows > 0) {
      mysql_data_seek($Recordset1, 0);
	  $row_Recordset1 = mysql_fetch_assoc($Recordset1);
  }
?>
                    </select></td>
                  </tr>
                  <tr>
                    <td height="35"><span class="style8">Select State:</span></td>
                    <td><select name="country" class="country">
    <option selected="selected">--Select State--</option>
    <?php
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("pms", $con);
$sql=mysql_query("select * from State_Master order by StateId ASC");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['StateName'].'">'.$row['StateName'].'</option>';
 } ?>
  </select></td>
                  </tr>
                  <tr>
                    <td height="35"><span class="style8">Select City:</span></td>
                    <td><select name="state" class="state">
    <option selected="selected">--Select City--</option>
  </select></td>
                  </tr>
                  <tr>
                    <td height="35"><span class="style8">Select Area:</span></td>
                    <td><select name="city" class="city">
    <option selected="selected">--Select Area--</option>
  </select></td>
                  </tr>
                  <tr>
                    <td height="35"><span class="style8">Property Name:</span></td>
                    <td><label><span id="sprytextfield3">
                      <input type="text" name="txtName" id="txtName" />
                      <span class="textfieldRequiredMsg">A value is required.</span></span></label></td>
                  </tr>
                  <tr>
                    <td height="87"><span class="style8">Description:</span></td>
                    <td><label><span id="sprytextarea1">
                      <textarea name="txtDesc" id="txtDesc" cols="35" rows="3"></textarea>
                      <span class="textareaRequiredMsg">A value is required.</span></span></label></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Upload Image:</span></td>
                    <td><label>
                      <input type="file" name="txtFile" id="txtFile" />
                    </label></td>
                  </tr>
                  <tr>
                    <td height="37"><span class="style8">Total Area:</span></td>
                    <td><label><span id="sprytextfield4">
                      <input type="text" name="txtArea" id="txtArea" />
                      <span class="textfieldRequiredMsg">A value is required.</span></span></label></td>
                  </tr>
                  <tr>
                    <td height="33"><span class="style8">Property Age:</span></td>
                    <td><label>
                      <select name="cmbAge" id="cmbAge">
                        <option>1 Year</option>
                        <option>2 Year</option>
                        <option>3 Year</option>
                        <option>4 Year</option>
                        <option>5 Year</option>
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="36"><span class="style8">Total Rooms::</span></td>
                    <td><label>
                      <select name="cmbRoom" id="cmbRoom">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Is Furnished?</span></td>
                    <td><label>
                      <select name="cmbFur" id="cmbFur">
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Parking Available?</span></td>
                    <td><label>
                      <select name="cmbPark" id="cmbPark">
                        <option>Yes</option>
                        <option>No</option>
                      </select>
                    </label></td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Distance From Railway:</span></td>
                    <td><span id="sprytextfield2">
                      <label>
                      <input type="text" name="txtDist" id="txtDist" />
                      </label>
                      <span class="textfieldRequiredMsg">A value is required.</span></span>(Km)</td>
                  </tr>
                  <tr>
                    <td height="38"><span class="style8">Property Cost:</span></td>
                    <td><label><span id="sprytextfield5">
                      <input type="text" name="txtCost" id="txtCost" />
                      <span class="textfieldRequiredMsg">A value is required.</span></span></label></td>
                  </tr>
                  <tr>
                    <td>&nbsp;</td>
                    <td><label>
                      <input type="submit" name="button" id="button" value="Upload" />
                    </label></td>
                  </tr>
                </table>
                            </form>              </td>
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
var sprytextfield2 = new Spry.Widget.ValidationTextField("sprytextfield2");
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
//-->
</script>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
