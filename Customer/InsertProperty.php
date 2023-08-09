<?php
if (!isset($_SESSION)) 
{
  session_start();
  
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$cmbCat=$_POST['cmbCat'];
	$txtName=$_POST['txtName'];
	$txtDesc=$_POST['txtDesc'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$txtArea=$_POST['txtArea'];
	$cmbAge=$_POST['cmbAge'];
	$Path1=$_FILES["txtFile"]["name"];
	$cmbRoom=$_POST['cmbRoom'];
	$Furnished=$_POST['cmbFur'];
	$Parking=$_POST['cmbPark'];
	$Dist=$_POST['txtDist'];
	$txtCost=$_POST['txtCost'];
	move_uploaded_file($_FILES["txtFile"]["tmp_name"],"../upload/"  .$_FILES["txtFile"]["name"]);
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("pms", $con);
	// Specify the query to Insert Record
	$sql = "insert into property_master(CategoryId,StateName,CityName,AreaName,PropertyName,PropertyImage,PropertyDesc,TotalArea,PropertyAge,TotalRoom,Furnished,Parking,DistRail,PropertyCost,Status,CustomerId) values('".$cmbCat."','".$country."','".$state."','".$city."','". $txtName."','".$Path1."','".$txtDesc."','".$txtArea."','".$cmbAge."','".$cmbRoom."','".$Furnished."','".$Parking."','".$Dist."','".$txtCost."','Open','".$_SESSION['CustomerId']."')";
	// execute query
	mysql_query ($sql,$con);
	// Close The Connection
	mysql_close ($con);
	
	echo '<script type="text/javascript">alert("Property Uploaded Succesfully");window.location=\'Sale.php\';</script>';

?>
</body>
</html>
