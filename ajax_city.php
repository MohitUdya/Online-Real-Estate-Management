<?php
// Establish Connection with MYSQL
$con = mysql_connect ("localhost","root");
// Select Database
mysql_select_db("pms", $con);
if($_POST['CityName'])
{
$id=$_POST['CityName'];
$sql=mysql_query("select * from Area_Master where CityName='$id' ");
echo '<option selected="selected">--Select City--</option>';
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['AreaName'].'">'.$row['AreaName'].'</option>';
}
}

?>