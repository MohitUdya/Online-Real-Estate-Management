<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style2 {
	color: #FD821B;
	font-weight: bold;
}
.style3 {color: #000000}
.style3 {color: #FFFFFF;
	font-weight: bold;
}
.style4 {color: #FFFFFF}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif}
.style7 {font-size: small}
.style8 {color: #006600}
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
      <div class="rightpannel">
      <div>
      <h2>Feedback From Customers</h2>
      <table width="100%" border="1" bordercolor="#1BB9F6" >
        <tr>
          <th height="32" bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style2 style4 style6 style7"><strong>Id</strong></div></th>
          <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style2 style4 style6 style7"><strong>Customer Name</strong></div></th>
          <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style2 style4 style6 style7"><strong>Email</strong></div></th>
          <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style9 style2 style4 style6 style7"><strong>Mobile</strong></div></th>
          <th bgcolor="#1CB5F1" class="style3"><div align="left" class="style12 style2 style4 style6 style7">Feedback</div></th>
        </tr>
        <?php
// Establish Connection with Database
$con = mysql_connect("localhost","root");
// Select Database
mysql_select_db("pms", $con);
// Specify the query to execute
$sql = "select * from feedback";
// Execute query
$result = mysql_query($sql,$con);
// Loop through each records 
while($row = mysql_fetch_array($result))
{
$Id=$row['FeedbackId'];
$CustomerName=$row['CustomerName'];
$EmailId=$row['EmailId'];
$MobileNumber=$row['MobileNumber'];
$Message=$row['Message'];

?>
        <tr>
          <td ><div align="left" ><strong><?php echo $Id;?></strong></div></td>
          <td ><div align="left" ><strong><?php echo $CustomerName;?></strong></div></td>
          <td ><div align="left" ><strong><?php echo $EmailId;?></strong></div></td>
          <td ><div align="left" ><strong><?php echo $MobileNumber;?></strong></div></td>
          <td ><div align="left" ><strong><?php echo $Message;?></strong></div></td>
        </tr>
        <?php
}
// Retrieve Number of records returned
$records = mysql_num_rows($result);
?>
        
        <?php
// Close the connection
mysql_close($con);
?>
      </table>
      <br/>
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
