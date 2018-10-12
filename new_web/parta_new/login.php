<?php
/******************************************************************/
/* Begin page of the Online-written Test                          */
/* Created by Barry on 12th April, 2010                           */
/******************************************************************/

   include "modules.php";

   if ($_GET["login"] == "yes") {
      $ValidLogin = "success";
      session_register("ValidLogin"); ?>
<script language="JavaScript">
   if (location.href)
      location.href = "index.php?lang=<?php echo $Lang; ?>";
   else
      location.replace("index.php?lang=<?php echo $Lang; ?>");
</script>
<?php
      exit();
   }   

   $aryText = array("zh" => array("Title" => "請輸入駕駛考試號碼",
                                  "ClearButton" => "清除",
                                  "EnterButton" => "確認",
                                  "ErrorMessage" => "不正確駕駛考試號碼﹗", 
                                  "Hints" => "(例：TA123456)"),
                    "en" => array("Title" => "Please input your test form number",
                                  "ClearButton" => "Clear",
                                  "EnterButton" => "Enter",
                                  "ErrorMessage" => "Invalid test form number!",
                                  "Hints" => "(e.g. TA123456)"));

   include "header.php"; ?>

<script language="JavaScript">
   function inputTN(qNo) {
      if ((document.all["TestNo"].innerHTML).length < 8)
         document.all["TestNo"].innerHTML += qNo;
   }
   
   function clearTN() {
      document.all["TestNo"].innerHTML = "TA";
   }
   
   function enterTest() {
      if ((document.all["TestNo"].innerHTML).length != 8)
         alert("<?php echo $aryText[$Lang]["ErrorMessage"] ?>");
      else
         if (location.href)
            location.href = "login.php?lang=<?php echo $Lang; ?>&login=yes";
         else
            location.replace("login.php?lang=<?php echo $Lang; ?>&login=yes");
   }
</script>

<table border=0 cellpadding=3 cellspacing=0 width="100%">
  <tr>
    <!--modified By Barry-->  
    <td height="73" align="center"><img src="images\test\title_<?php echo $Lang; ?>.gif"><br><b>網上模擬筆試</b></td>
  </tr>
  <tr>
    <td align="center"><?php echo $aryText[$Lang]["Title"]; ?><br><?php echo $aryText[$Lang]["Hints"]; ?></td>
  </tr>
  <tr>
    <td align="center">
      <table border=0 cellpadding=0 cellspacing=0 width="300">
        <tr>
          <td id="TestNo" align="center" style="padding:5px;font-family:Arial;font-size:24px;font-weight:bold;border:1px solid black;">TA</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td align="center">
      <table border=0 cellpadding=3 cellspacing=0>
        <tr>
          <td align="right"><?php echo genCoverButton("1", "inputTN(1);", 70, 70); ?></td>
          <td><?php echo genCoverButton("2", "inputTN(2);", 70, 70); ?></td>
          <td><?php echo genCoverButton("3", "inputTN(3);", 70, 70); ?></td>
        </tr>
        <tr>
          <td align="right"><?php echo genCoverButton("4", "inputTN(4);", 70, 70); ?></td>
          <td><?php echo genCoverButton("5", "inputTN(5);", 70, 70); ?></td>
          <td><?php echo genCoverButton("6", "inputTN(6);", 70, 70); ?></td>
        </tr>
        <tr>
          <td align="right"><?php echo genCoverButton("7", "inputTN(7);", 70, 70); ?></td>
          <td><?php echo genCoverButton("8", "inputTN(8);", 70, 70); ?></td>
          <td><?php echo genCoverButton("9", "inputTN(9);", 70, 70); ?></td>
        </tr>
        <tr>
          <td align="right">&nbsp;</td>
          <td><?php echo genCoverButton("0", "inputTN(0);", 70, 70); ?></td>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td align="right"><?php echo genCoverButton($aryText[$Lang]["ClearButton"], "clearTN();", 70, 120); ?></td>
          <td>&nbsp;</td>
          <td><?php echo genCoverButton($aryText[$Lang]["EnterButton"], "enterTest(3);", 70, 120); ?></td>
        </tr>
      </table>
    </td>
  </tr>
</table>

<?php
   include "footer.php";
?>