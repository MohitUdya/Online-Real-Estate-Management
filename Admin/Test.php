<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php
$a=$_POST['country'];
$b=$_POST['state'];
$c=$_POST['city'];
$d=$_POST['cmbCat'];
header("location:Search.php?StateName=".$a."&CityName=".$b."&AreaName=".$c."&CatId=".$d."")
?>
</body>
</html>
