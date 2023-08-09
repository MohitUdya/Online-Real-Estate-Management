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
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; }
.style9 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; }
.style23 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; color: #FFFFFF; }
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
      <div class="rightpannel2">
        <div class="welcome">
          <div class="style3" style="height:30px; padding-bottom:5px">Welcome <?php echo $_SESSION['CustomerName'];?></div>
          
          <table width="100%" border="0" cellspacing="0" cellpadding="0">
            <tr>
              <td>
			
              </td>
            </tr>
            <tr>
              <td>
              <?php
$a=$_GET['StateName'];
$b=$_GET['CityName'];
$c=$_GET['AreaName'];
$d=$_GET['CatId'];
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "SELECT category_master.CategoryName, property_master.PropertyId, property_master.StateName, property_master.CityName, property_master.AreaName, property_master.PropertyName, property_master.PropertyImage, property_master.PropertyDesc, property_master.TotalArea, property_master.PropertyAge, property_master.TotalRoom, property_master.PropertyCost, property_master.Status, property_master.CustomerId, property_master.Furnished,property_master.Parking,property_master.DistRail
FROM  category_master, property_master
WHERE category_master.CategoryId=property_master.CategoryId AND property_master.StateName='".$a."' AND property_master.CityName='".$b."' AND property_master.AreaName='".$c."' AND property_master.CategoryId='".$d."'";
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
$Furnished=$row['Furnished'];
$Parking=$row['Parking'];
$DistRail=$row['DistRail'];
$Description=$row['PropertyDesc'];
$CID=$row['CustomerId'];
?>
			
              <table width="100%" height="344" border="0" cellpadding="0" cellspacing="0">
                <tr>
                  <td colspan="4" bgcolor="#93A537">&nbsp;</td>
                </tr>
                <tr>
                  <td colspan="4" bgcolor="#93A537"><span class="style23">
                    <?php 
			  // Retrieve Number of records returned
$records = mysql_num_rows($result);

			  ?>
                  </span></td>
                  </tr>
                
                
                <tr>
                  <td valign="middle"><div align="center"><img src="../upload/<?php echo $Image1;?>" alt="" width="200" height="200" border="3" /></div></td>
                  <td colspan="3" valign="top"><table width="100%" height="251" border="0" cellpadding="0" cellspacing="0">
                    <tr>
                      <td><span class="style9">Property Code:</span></td>
                      <td><span class="style9"><?php echo $PId ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9">Property Name:</span></td>
                      <td><span class="style9"><?php echo $PropertyName ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9">Area:</span></td>
                      <td><span class="style9"><?php echo $Area ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9">Cost:</span></td>
                      <td><span class="style9"><?php echo $Cost ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9">Total Rooms:</span></td>
                      <td><span class="style9"><?php echo $Room ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9">Property Age:</span></td>
                      <td><span class="style9"><?php echo $Age ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9">Is Furnished?</span></td>
                      <td><span class="style9"><?php echo $Furnished ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9">Parking?</span></td>
                      <td><span class="style9"><?php echo $Parking ;?></span></td>
                    </tr>
                    <tr>
                      <td><span class="style9">Dist From Railway:</span></td>
                      <td><span class="style9"><?php echo $DistRail ;?></span></td>
                    </tr>
                  </table></td>
                  </tr>
                <tr>
                  <td colspan="4"><table width="100%" border="0" cellspacing="0" cellpadding="0">
                    <tr>
                      <td><span class="style9">Owner Detail:</span></td>
                      <td><a href="ViewOwner.php?CustId=<?php echo $CID;?>" class="style9">View</a></td>
                      <td><span class="style9">View Documents:</span></td>
                      <td><a href="ViewImage.php?PId=<?php echo $PId;?>" class="style9">View</a></td>
                    </tr>
                  </table></td>
                </tr>
                <tr>
                  <td colspan="4" bgcolor="#93A537">&nbsp;</td>
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
?>
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
</body>
</html>
