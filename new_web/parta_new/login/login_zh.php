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

   $aryErr = array("", "登 入 名 稱 不 可 留 空 ﹗", "登 入 密 碼 不 可 留 空 ﹗",
                   "帳 號 資 料 不 正 確 ﹗");
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
                        歡 迎 來 到 「 學 員 天 地 」
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4" class="reg_normal">
                        如 要 繼 續 另 一 組 題 目 ， 請 先 登 入                        
                      </td>
                    </tr>
<?php if ($errfg > 0){ ?>
                      <td colspan="4" class="reg_normal">
                        <p><font class="errmsg"><?php echo $aryErr[$errfg]; ?></font></p>
                      </td>
<?php } ?>
                    <tr>
                      <td width="16%" valign="top" class="reg_normal">登 入 名 稱</td>
                      <td width="1%" valign="top" class="reg_normal">：</td>
                      <td valign="top" class="reg_normal">
                        <input name="txtLogin" size="20" maxlength="16" class="txtflat" value="<?php echo $HTTP_GET_VARS["txtLogin"]; ?>" onFocus="mySelAll(this);">
                      </td>
                      <td rowspan="2" class="reg_hints" valign="top">
                        如 若 您 還 沒 有 登 記 成 為 我 們 的 網 上 會 員 ， 
                        請 <a href="reg.php">按 這 裡 登 記</a> 。<br>
                        如 若 忘 記 您 的 登 入 密 碼 ， 請 <a href="forget_zh.php">按 這 裡</a> 。
                      <td>
                    </tr>
                    <tr>
                      <td width="16%" valign="top" class="reg_normal">登 入 密 碼</td>
                      <td width="1%" valign="top" class="reg_normal">：</td>
                      <td valign="top" class="reg_normal">
                        <input type="password" name="txtPwd" size="20" maxlength="8" class="txtflat" onFocus="mySelAll(this);">
                      </td>
                    </tr>
                    <tr>
                      <td colspan="4">
                        <hr noshade size="1" color="#BBBBE8">
                        <input type="submit" class="btn" name="btnSubmit" value="登 入">
                        <input type="reset" class="btn" name="btnReset" value="重 設">
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