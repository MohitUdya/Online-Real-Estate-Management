<?php
// Establish Connection with MYSQL
$con = mysql_connect ("localhost","root");
// Select Database
mysql_select_db("pms", $con);
if($_POST['StateName'])
{
$id=$_POST['StateName'];
$sql=mysql_query("select * from City_Master where StateName='$id' ");
echo '<option selected="selected">--Select State--</option>';
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['CityName'].'">'.$row['CityName'].'</option>';
}
}

?>