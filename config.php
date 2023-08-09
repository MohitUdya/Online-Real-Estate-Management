<?php
$con = mysql_connect("localhost", "root", "") or die("Failed to connect to MySql.");
mysql_select_db("hms", $con) or die("Failed to connect to database");
?>