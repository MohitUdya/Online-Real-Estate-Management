<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Real Estate</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="css/style1.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style1 {
	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #FFFFFF;
}
.style6 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; }
.style8 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; font-weight: bold; color: #000000; }
-->
</style>
<script src="SpryAssets/SpryValidationTextarea.js" type="text/javascript"></script>
<link href="SpryAssets/SpryValidationTextarea.css" rel="stylesheet" type="text/css" />
<style type="text/css">
<!--
.style15 {font-family: Verdana, Arial, Helvetica, sans-serif; font-size: small; }
-->
</style>
</head>
<body>
<SCRIPT language="JavaScript1.2" src="gen_validation.js"></SCRIPT>
<SCRIPT language="JavaScript1.2">
var arrFormValidation=
             [
			 		[//Name
						  ["minlen=1",
		"Please Enter Name "
						  ]

                     ],
				   [//Mobile

						  ["num",
		"Please Enter valid Mobile "
						  ],
						  ["minlen=10",
		"Please Enter valid Mobile "
						  ]



                   ],
				   [//Email
						   ["minlen=1",
		"Please Enter Email "
						  ],
						  ["email",
		"Please Enter valid email "
						  ]

                   ],
				   [//Feedback

						  ["minlen=1",
		"Please Give Feedback "
						  ]

                   ]
            ];
</SCRIPT>

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
      <table width="100%" height="249" border="0" cellpadding="0" cellspacing="0">
        <tr>
          <td bgcolor="#FFFFFF">&nbsp;</td>
        </tr>
        <tr>
          <td height="29" bgcolor="#1BB2EB"><span class="style1">Contact Us</span></td>
        </tr>
        <tr>
          <td height="28"><span class="style8">Real Estate Limited,</span></td>
        </tr>
        <tr>
          <td height="28"><span class="style8">Address,</span></td>
        </tr>
        <tr>
          <td height="27"><span class="style8">MyCity(000000)</span></td>
        </tr>
        <tr>
          <td height="30"><span class="style8">Mobile:9876543210</span></td>
        </tr>
        <tr>
          <td height="29"><span class="style8">Email:codeprojectsorg@gmail.com</span></td>
        </tr>
        <tr>
          <td height="29" bgcolor="#FB811C"><span class="style1">Feedback</span></td>
        </tr>
        <tr>
          <td><form id="form2" name="form2" method="post" action="InsertFeedback.php" onSubmit="return validateForm(this,arrFormValidation);">
            <table width="100%" height="206" border="0" cellpadding="0" cellspacing="0">
              <tr>
                <td><span class="style15">Full Name:</span></td>
                <td><span id="sprytextfield3">
                  <label>
                  <input type="text" name="txtName" id="txtName" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td><span class="style15">Mobile Number:</span></td>
                <td><span id="sprytextfield4">
                  <label>
                  <input type="text" name="txtMobile" id="txtMobile" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td><span class="style15">Email ID:</span></td>
                <td><span id="sprytextfield5">
                  <label>
                  <input type="text" name="txtEmail" id="txtEmail" />
                  </label>
                  <span class="textfieldRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td><span class="style15">Feedback:</span></td>
                <td><span id="sprytextarea1">
                  <label>
                  <textarea name="txtFeedback" id="txtFeedback" cols="35" rows="3"></textarea>
                  </label>
                  <span class="textareaRequiredMsg">A value is required.</span></span></td>
              </tr>
              <tr>
                <td>&nbsp;</td>
                <td><label>
                  <input type="submit" name="button2" id="button2" value="Submit" />
                </label></td>
              </tr>
            </table>
                    </form>
          </td>
        </tr>
      </table>
      <br/>
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
<script type="text/javascript">
<!--
var sprytextfield3 = new Spry.Widget.ValidationTextField("sprytextfield3");
var sprytextfield4 = new Spry.Widget.ValidationTextField("sprytextfield4");
var sprytextfield5 = new Spry.Widget.ValidationTextField("sprytextfield5");
var sprytextarea1 = new Spry.Widget.ValidationTextarea("sprytextarea1");
//-->
</script>
</body>
</html>
