<?php
   include "db_func.inc";
   include "../../includes/config.php";
   include "member.inc";
   
   $lang = getLang($HTTP_REFERER);

   $errfg = 0;
   if (!havedata($HTTP_GET_VARS["txtLogin"]) && !havedata($HTTP_POST_VARS["txtLogin"]))
      $errfg = 1;
   else
   {
      $Login = $HTTP_GET_VARS["txtLogin"];
      if (!havedata($Login)) $Login = $HTTP_POST_VARS["txtLogin"];
      if (!havedata($HTTP_GET_VARS["txtPwd"]) && !havedata($HTTP_POST_VARS["txtPwd"]))
         $errfg = 2;
      else
      {
         $Pwd = $HTTP_GET_VARS["txtPwd"];
         if (!havedata($Pwd)) $Pwd = $HTTP_POST_VARS["txtPwd"];
         $conn = openConn(localhost, student, student_pwd, "member");
         $strSQL = "select * from TB_MEMBERS where USERNAME = ".sqlString($Login).
                   " and PASSWORD = ".sqlString($Pwd).";";
         $result = execSQL($strSQL);
         if (mysql_num_rows($result) <= 0)
            $errfg = 3;
         else
         {
            $strSQL = "select * from TB_MEMBERS where USERNAME = ".sqlString($Login).
                      " and PASSWORD = ".sqlString($Pwd).";";
            $result = execSQL($strSQL);
            //$active = mysql_fetch_row($result);
            $data = mysql_fetch_array($result);
            $HKID = strtoupper($data["HKID"]);
            $BDay = strtoupper($data["BIRTHDAY"]);
            //$BDay = $data["BIRTHDAY"];
            $Name_zh = $data["NAME_ZH"];
            $Name_en = $data["NAME_EN"];
            $UserName = $data["USERNAME"];
            $IsStudent = $data["ISSTUDENT"];
            
            $strSQL = "select ACTIVE from TB_MEMBERS where USERNAME = ".sqlString($Login).
                      " and PASSWORD = ".sqlString($Pwd).";";
            $result = execSQL($strSQL);
            if ($active = mysql_fetch_row($result))
               if (strtoupper($active[0]) != "Y")
                  $errfg = 4;
         }
         closeConn($conn);
      }
   }

   if ($errfg > 0 && $errfg < 4)
   {
      header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
                            .dirname($HTTP_SERVER_VARS['PHP_SELF'])
                            ."/login_".$lang.".php?errfg=".$errfg."&txtLogin=".$Login);
      exit();
   }
   else
      if ($errfg == 4)
      {
         header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
                               .dirname($HTTP_SERVER_VARS['PHP_SELF'])
                               ."/confirm_".$lang.".php?txtHKID=".$Login."&txtFirmCode=".$Pwd);
         exit();
      }
      else
      {
         session_start();
         session_register("Login");
         session_register("BDay");
         session_register("Name_zh");
         session_register("Name_en");
         session_register("UserName");
         session_register("HKID");
         session_register("IsStudent");
         //$tmp = strrpos($HTTP_REFERER, "confirm.php");
         //if ($tmp === false)
            if (havedata($burl))
            {
               header("Location: ".$burl);
               exit();
            }
            else
            {
               header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
                                     .dirname($HTTP_SERVER_VARS['PHP_SELF'])
                                     ."/main_".$lang.".php");
               exit();
            }
         //else
         //{
           // header("Location: http://".$HTTP_SERVER_VARS['HTTP_HOST']
             //                     .dirname($HTTP_SERVER_VARS['PHP_SELF'])
               //                   ."/success_".$lang.".php");
            //exit();
         //}
      }
?>