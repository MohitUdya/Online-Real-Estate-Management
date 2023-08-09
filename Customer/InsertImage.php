<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
	$PId=$_POST['cmbProperty'];
	$Title=$_POST['txtTitle'];
	$Path1=$_FILES["txtFile"]["name"];
	
	move_uploaded_file($_FILES["txtFile"]["tmp_name"],"../upload/"  .$_FILES["txtFile"]["name"]);
	// Establish Connection with MYSQL
	$con = mysql_connect ("localhost","root");
	// Select Database
	mysql_select_db("pms", $con);
	// Specify the query to Insert Record
	$sql = "insert into property_image(PropertyId,Title,ImagePath) values('".$PId."','".$Title."','".$Path1."')";
	// execute query
	mysql_query ($sql,$con);
	// Close The Connection
	mysql_close ($con);
	
	echo '<script type="text/javascript">alert("Image Uploaded Succesfully");window.location=\'Image.php\';</script>';

?>
</body>
</html>
