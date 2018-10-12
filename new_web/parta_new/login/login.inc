<?php
   session_start();
   $lang = strpos($HTTP_REFERER, "_en");
   if ($lang === false)
      $lang = "zh";
   else
      $lang = "en";
   if (!session_is_registered("Login") || strlen($Login) <= 0 || strlen($Login) == null)
   {
      header("Location: http://".$HTTP_SERVER_VARS["HTTP_HOST"]
                            .dirname($HTTP_SERVER_VARS["PHP_SELF"])
                            ."/login_".$lang.".php");
      exit();
   }
?>