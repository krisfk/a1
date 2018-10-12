<?php
   session_start();
   include "../../includes/php_func.php";

   if (havedata($Login))
   {
      header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
                            .dirname($HTTP_SERVER_VARS['PHP_SELF'])
                            ."/main_zh.php");
      exit();
   }
   
   if (session_is_registered("Login") && strlen($Login) > 0 && strlen($Login) != null)
   {
      header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
                            .dirname($HTTP_SERVER_VARS['PHP_SELF'])
                            ."/main_".$lang.".php");
      exit();
   }

   $aryErr = array("", "�n �J �W �� �� �i �d �� �T", "�n �J �K �X �� �i �d �� �T",
                   "�b �� �� �� �� �� �T �T");
   if (havedata($HTTP_GET_VARS["errfg"]))
      $errfg = $HTTP_GET_VARS["errfg"];
   else
      $errfg = 0;
?>

<?php include $DOCUMENT_ROOT."/phpinc/session_header_zh.inc"; ?>

<!-- Content -->
            <Script Language="JavaScript" src="member.js"></Script>
            <link rel="stylesheet" href="stylesheets/member_zh.css">
            <table width="100%" border="0" cellspacing="0" cellpadding="12">
              <tr>
                <td>
                  <form action="login.php" name="frmReg" method="post">
                  <table width="100%" border="0" cellspacing="3" cellpadding="3" class="">
                    <tr>
                      <td colspan="4" class="reg_title">
                        �w �� �� �� �u �� �� �� �a �v
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="reg_normal">
                        �p �n �~ �� �t �@ �� �D �� �A �� �� �n �J                        
                      </td>
                    </tr>
<?php if ($errfg > 0){ ?>
                      <td colspan="4" class="reg_normal">
                        <p><font class="errmsg"><?php echo $aryErr[$errfg]; ?></font></p>
                      </td>
<?php } ?>
                    <tr>
                      <td width="16%" valign="top" class="reg_normal">�n �J �W ��</td>
                      <td width="1%" valign="top" class="reg_normal">�G</td>
                      <td valign="top" class="reg_normal">
                        <input name="txtLogin" size="20" maxlength="16" class="txtflat" value="<?php echo $HTTP_GET_VARS["txtLogin"]; ?>" onFocus="mySelAll(this);">
                      </td>
                      <td rowspan="2" class="reg_hints" valign="top">
                        �p �Y �z �� �S �� �n �O �� �� �� �� �� �� �W �| �� �A 
                        �� <a href="reg.php">�� �o �� �n �O</a> �C<br>
                        �p �Y �� �O �z �� �n �J �K �X �A �� <a href="forget_zh.php">�� �o ��</a> �C
                      <td>
                    </tr>
                    <tr>
                      <td width="16%" valign="top" class="reg_normal">�n �J �K �X</td>
                      <td width="1%" valign="top" class="reg_normal">�G</td>
                      <td valign="top" class="reg_normal">
                        <input type="password" name="txtPwd" size="20" maxlength="8" class="txtflat" onFocus="mySelAll(this);">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4">
                        <hr noshade size="1" color="#BBBBE8">
                        <input type="submit" class="btn" name="btnSubmit" value="�n �J">
                        <input type="reset" class="btn" name="btnReset" value="�� �]">
                      </td>
                    </tr>
                  </table>
                  </form>
                </td>
              </tr>
            </table>
            <Script Language="JavaScript">
            <!--
               document.frmReg.txtLogin.tabIndex = 0;
               document.frmReg.txtPwd.tabIndex = 0;
            //-->
            </Script>

<!-- End of Content -->

<?php include $DOCUMENT_ROOT."/phpinc/footer_zh.inc"; ?>