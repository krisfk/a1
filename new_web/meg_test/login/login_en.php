<?php
   session_start();
   include "../includes/php_func.php";

   if (havedata($Login))
   {
      header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
                            .dirname($HTTP_SERVER_VARS['PHP_SELF'])
                            ."/main_en.php");
      exit();
   }
   
   if (session_is_registered("Login") && strlen($Login) > 0 && strlen($Login) != null)
   {
      header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
                            .dirname($HTTP_SERVER_VARS['PHP_SELF'])
                            ."/main_".$lang.".php");
      exit();
   }

   $aryErr = array("", "Login Name cannot be blank!", "Password cannot be blank!",
                   "Invalid member information!");
   if (havedata($HTTP_GET_VARS["errfg"]))
      $errfg = $HTTP_GET_VARS["errfg"];
   else
      $errfg = 0;
?>

<?php include $DOCUMENT_ROOT."/phpinc/session_header_en.inc"; ?>

<?php include $DOCUMENT_ROOT."/phpinc/body1_en.inc"; ?>

<!-- Content -->
            <Script Language="JavaScript" src="member.js"></Script>
            <link rel="stylesheet" href="stylesheets/member_en.css">
            <table width="100%" border="0" cellspacing="0" cellpadding="12">
              <tr>
                <td>
                  <form action="login.php" name="frmReg" method="post">
                  <table width="100%" border="0" cellspacing="3" cellpadding="3" class="">
                    <tr>
                      <td colspan="4" class="reg_title">
                        Welcome to Student Area!
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="reg_normal">
                        "Student Area" is specially designed for HKSM students. 
                        You may enjoy the following services through this website.
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="reg_normal">
                        <ul>
                          <li>Checking Your Lessons Schedule</li>
                          <li>Checking Lecture Time Table</li>
                          <li>Lesson Tentative Booking Services</li>
                        </ul>
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="reg_normal">
                        To enjoy the above services, please log-in.
                      </td>
                    </tr>
<?php if ($errfg > 0){ ?>
                      <td colspan="4" class="reg_normal">
                        <p><font class="errmsg"><?php echo $aryErr[$errfg]; ?></font></p>
                      </td>
<?php } ?>
                    <tr>
                      <td width="16%" valign="top" class="reg_normal">Login Name</td>
                      <td width="1%" valign="top" class="reg_normal">:</td>
                      <td valign="top" class="reg_normal"><input name="txtLogin" size="20" maxlength="16" class="txtflat" value="<?php echo $HTTP_GET_VARS["txtLogin"]; ?>" onFocus="mySelAll(this);"></td>
                      <td valign="top" rowspan="2" class="reg_hints">
                        If you have not registered as our member, 
                        please <a href="reg.php">click here to join us</a>.<br>
                        If you forget your login password, please <a href="forget_en.php">click here</a>.
                      </td>
                    </tr>
                    <tr>
                      <td width="16%" valign="top" class="reg_normal">Password</td>
                      <td width="1%" valign="top" class="reg_normal">:</td>
                      <td valign="top" class="reg_normal"><input type="password" name="txtPwd" size="20" maxlength="8" class="txtflat" onFocus="mySelAll(this);"></td>
                      <td valign="top"></td>
                    </tr>
                    <tr>
                      <td colspan="4">
                        <hr noshade size="1" color="#BBBBE8">
                        <input type="submit" class="btn" name="btnSubmit" value="Login">
                        <input type="reset" class="btn" name="btnReset" value="Reset">
                      </td>
                    </tr>
                  </table>
                  </form>
                </td>
              </tr>
            </table>
<!-- End of Content -->

<?php include $DOCUMENT_ROOT."/phpinc/footer_en.inc"; ?>