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
.style1 {
	color: #1CBCFA;
	font-weight: bold;
}
.style2 {
	color: #FD821B;
	font-weight: bold;
}
.style3 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #1B3B00;
}
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
        <div class="welcome">
          <div class="style3" style="height:30px; padding-bottom:5px">Welcome <?php echo $_SESSION['CustomerName'];?></div>
          <div style="width:573px; height:auto;font-family:Arial, Helvetica, sans-serif; font-size:12px; color:#3f3f3f; line-height:20px; text-align:justify">We Welcome You To Real Estate Property Management System. This Portal is designed to provide the facility where customer can BUY or SELL their properties such as land, shop and house. Just click on Buy or Sell tab to contiue with our system</div>
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
