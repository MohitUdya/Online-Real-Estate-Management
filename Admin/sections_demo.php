<?php require('config.php'); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" >
<title>PHP-Ajax, Country State City</title>
<script type="text/javascript" src="jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function()
{
	
$(".country").change(function()
{
var dataString = 'id='+ $(this).val();
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
var dataString = 'id='+ $(this).val();
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
body {
	font-family: Arial, Helvetica, sans-serif;
	font-size: 12px;
	color: #333;
	background-color: #FFF;
	margin: 0px;
}
#frame1 {
	background-color: #F7F7F7;
	margin: 30px auto auto;
	padding: 10px;
	width: 700px;
}
#frame1 label {
	width:60px;
	display: inline-block;
	text-align:right;
	padding-right:10px;
}
</style>
</head>
<body>
<div id="frame1">
  <label>Country :</label>
  <select name="country" class="country">
    <option selected="selected">--Select Country--</option>
    <?php
$sql=mysql_query("select * from countries order by id ASC");
while($row=mysql_fetch_array($sql))
{
echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
 } ?>
  </select>
  <label>State :</label>
  <select name="state" class="state">
    <option selected="selected">--Select State--</option>
  </select>
  <label>City :</label>
  <select name="city" class="city">
    <option selected="selected">--Select City--</option>
  </select>
</div>
</body>
</html>
