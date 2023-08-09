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
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
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
<style type="text/css">
<!--
.style1 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style2 {font-size: small}
-->
</style>
</head>

<body>
<form id="form1" name="form1" method="post" action="">
  <table width="100%" border="0">
    <tr>
      <td height="32">Select State:</td>
      <td>Select City:</td>
      <td>Select Area:</td>
    </tr>
    <tr>
      <td height="33"><select name="country" class="country">
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
      <td><select name="state" class="state">
    <option selected="selected">--Select City--</option>
  </select></td>
      <td><select name="city" class="city">
    <option selected="selected">--Select Area--</option>
  </select></td>
    </tr>
    <tr>
      <td height="30">Select Category:</td>
      <td>Approximate Cost:</td>
      <td>Property Age:</td>
    </tr>
    <tr>
      <td height="37"><label>
        <select name="cmbCat" id="cmbCat">
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
        </select>
      </label></td>
      <td><label>
        <select name="cmbCost" id="cmbCost">
          <option>2000000</option>
          <option>200000</option>
          <option>3000000</option>
          <option>30000</option>
        </select>
      </label></td>
      <td><label>
        <select name="cmbAge" id="cmbAge">
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
        </select>
      </label></td>
    </tr>
    <tr>
      <td height="38">&nbsp;</td>
      <td><label>
        
        <div align="left">
          <input type="submit" name="button" id="button" value="Display Report" />
        </div>
      </label></td>
      <td>&nbsp;</td>
    </tr>
  </table>
</form>
<p><br/>
</p>
  <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
			
              </td>
            </tr>
            <tr>
              <td>
              <?php
			  if(isset($_POST['country']) and isset($_POST['state']) and isset($_POST['city']) and isset($_POST['cmbCat']) and isset($_POST['cmbCost']) and isset($_POST['cmbAge']))
			  {
$a=$_POST['country'];
$b=$_POST['state'];
$c=$_POST['city'];
$d=$_POST['cmbCat'];
$e=$_POST['cmbCost'];
$f=$_POST['cmbAge'];

// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "SELECT category_master.CategoryName, property_master.PropertyId, property_master.StateName, property_master.CityName, property_master.AreaName, property_master.PropertyName, property_master.PropertyImage, property_master.PropertyDesc, property_master.TotalArea, property_master.PropertyAge, property_master.TotalRoom, property_master.PropertyCost, property_master.Status, property_master.CustomerId
FROM  category_master, property_master
WHERE category_master.CategoryId=property_master.CategoryId AND property_master.StateName='".$a."' AND property_master.CityName='".$b."' AND property_master.AreaName='".$c."' AND property_master.CategoryId='".$d."' AND property_master.PropertyCost <='".$e."' AND property_master.PropertyAge<='".$f."'";
// Execute query
$result = mysql_query($sql,$con);
$records = mysql_num_rows($result);
echo $records." Property Found";


// Loop through each records 
while($row = mysql_fetch_array($result))
{
$PId=$row['PropertyId'];
$CategoryName=$row['CityName'];
$StateName=$row['StateName'];
$CityName=$row['CityName'];
$AreaName=$row['AreaName'];
$PropertyName=$row['PropertyName'];
$Area=$row['TotalArea'];
$Room=$row['TotalRoom'];
$Age=$row['PropertyAge'];
$Cost=$row['PropertyCost'];
$Status=$row['Status'];
$Description=$row['PropertyDesc'];
$Image1=$row['PropertyImage'];
$CID=$row['CustomerId'];

?>
			
              <table width="100%" height="344" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="4" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4" bgcolor="#FFFFFF"><span class="style23">
                    <?php 
			  // Retrieve Number of records returned
$records = mysql_num_rows($result);

			  ?>
                  </span></td>
                </tr>
                
                
                <tr>
                  <td width="18%" valign="middle"><div align="left"><img src="../upload/<?php echo $Image1;?>" alt="" width="200" height="200" border="3" /></div></td>
                  <td width="82%" colspan="3" valign="top"><table width="100%" height="251" border="3" cellpadding="3" cellspacing="3" bordercolor="#000000">
                    <tr>
                      <td width="18%" bordercolor="3"><span class="style10 style9 style1 style2"><strong>Property Code:</strong></span></td>
                      <td width="82%"><span class="style9 style10 style1 style2"><?php echo $PId ;?></span></td>
                    </tr>
                    <tr>
                      <td bordercolor="3"><span class="style10 style9 style1 style2"><strong>Property Name:</strong></span></td>
                      <td><span class="style9 style10 style1 style2"><?php echo $PropertyName ;?></span></td>
                    </tr>
                    <tr>
                      <td bordercolor="3"><span class="style10 style9 style1 style2"><strong>Area:</strong></span></td>
                      <td><span class="style9 style10 style1 style2"><?php echo $Area ;?></span></td>
                    </tr>
                    <tr>
                      <td bordercolor="3"><span class="style10 style9 style1 style2"><strong>Cost:</strong></span></td>
                      <td><span class="style9 style10 style1 style2"><?php echo $Cost ;?></span></td>
                    </tr>
                    <tr>
                      <td bordercolor="3"><span class="style10 style9 style1 style2"><strong>Total Rooms:</strong></span></td>
                      <td><span class="style9 style10 style1 style2"><?php echo $Room ;?></span></td>
                    </tr>
                    <tr>
                      <td bordercolor="3"><span class="style10 style9 style1 style2"><strong>Property Age:</strong></span></td>
                      <td><span class="style9 style10 style1 style2"><?php echo $Age ;?></span></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="4">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4" bgcolor="#FFFFFF">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4" bgcolor="#FFFFFF"><hr/></td>
                  </tr>

                <tr>
                  <td colspan="4">  </td>
                  </tr>
              </table>
              <?php
}

mysql_close($con);
}
?>
              </td>
            </tr>
          </table>
<p>&nbsp; </p>
</body>
</html>
<?php
mysql_free_result($Recordset1);
?>
