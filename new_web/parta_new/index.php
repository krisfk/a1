<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

  ga('create', 'UA-78524347-3', 'auto');
  ga('send', 'pageview');

</script>
<?php
/******************************************************************/
/* Begin page of the Online-written Test                          */
/* Created by Barry on 12th April, 2010                           */
/******************************************************************/

   	include "modules.php";
   	
   	$BeginTime = 0;
   	session_unregister("BeginTime");
   	session_unregister("Student");
   	
      $ValidLogin = "success";
      session_register("ValidLogin");
         	
   	$Lang = $HTTP_GET_VARS["lang"];
   	if (!haveData($Lang))
   	   $Lang = "zh";
   	else
   	   if ($Lang != "zh" && $Lang != "en")
   	      $Lang = "zh";

	$cn = openConn();
	//paper id
	$rs = openQuery("select max(right(f_paper_id,7)) from writtentest_member", $cn, 2);
	if ($rs[0]=='') {
		$RndGrpNo='1';
	} else {
		$RndGrpNo = (int)$rs[0]+1;
	}
	//echo $RndGrpNo;
	//die;
	//version id
	$rs = openQuery("select max(f_vid) from control_categories", $cn, 2);
	$f_vid = $rs[0];
	
	
	$Factor = rand(100000000, 999999999);
	$CheckSum = genCheckSum($Lang, $Factor);
	
	
		
   // remark by Barry
   //if (!session_is_registered("Login") || strlen($Login) <= 0 || $Login == null)
	//$RndGrpNo = 1;			
		
	
	$CSValue = $CheckSum.($Factor + $RndGrpNo);

/*   $aryText = array("zh" => array("Title" => "網上模擬筆試",
                                  "Introduction" => "每 次 您 可 從 下 列 <font color=\"red\"><b>十 四</b></font> 組 (每 組 ".
                                                    "<font color=\"red\"><b>二 十</b></font> 題) 的 問 題 組 別 內 選 擇 一 組".
                                                    " 題 目 作 練 習 。",
                                  "NotFinished" => " 已 經 作 答 之 組 別 將 不 能 再 被 作 答 。",
                                  "AllFinished" => " <font color=\"#00CC00\"><b>您 已 完 成 所 有 題 目</b></font> 。",
                                  "Introduction2" => "<br><br>筆 試 限 時 為 <font color=\"red\"><b>二 十</b></font> 分 鐘 ﹗".
                                                     "如 答 錯 <font color=\"red\"><b>四</b></font> 條 以 上 的 問 題 便 不 合".
                                                     " 格 。<br><br>祝 您 好 運 ﹗",
                                  "Selection" => "請選擇題目組別"),
                    "en" => array("Title" => "Online Written Test",
                                  "Introduction" => "You may choose one of the <font color=\"red\"><b>14</b></font>".
                                                    " question groups to attempt, each group contains <font color=".
                                                    "\"red\"><b>20</b></font> questions.",
                                  "NotFinished" => " Each group can be answered one time only.",
                                  "AllFinished" => " <font color=\"#00CC00\"><b>You have finished all question groups.</b></font>",
                                  "Introduction2" => "<br><br>Total time for test is <font color=\"red\"><b>20</b></font>".
                                                     " minutes!<br><br>Any submitted question set with more than ".
                                                     "<font color=\"red\"><b>4</b></font> incorrect answer will be".
                                                     " treated as fail!<br><br>Good Luck!",
                                  "Selection" => "Please select group"));
*/
   $aryText = array("zh" => array("BeginTest" => "開始考試"),
                    "en" => array("BeginTest" => "Begin Test"));

   include "header.php"; ?>

   <script language="JavaScript">
      if (location.href)
         //location.href = "test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CSValue; ?>&grpno=<?php echo $RndGrpNo; ?>";
         location.href = "test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CSValue; ?>&grpno=<?php echo $RndGrpNo; ?>&f_vid=<?php echo $f_vid; ?>";
      else
         //location.replace("test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CSValue; ?>&grpno=<?php echo $RndGrpNo; ?>");
         location.replace("test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CSValue; ?>&grpno=<?php echo $RndGrpNo; ?>&f_vid=<?php echo $f_vid; ?>");
</script>

<script language="JavaScript">
/*   function jumpGroup(CSValue, GrpNo) {
      if (location.href)
         location.href = "test.php?lang=<?php echo $Lang; ?>&cs=" + CSValue + "&grpno=" + GrpNo;
      else
         location.replace("test.php?lang=<?php echo $Lang; ?>&cs=" + CSValue + "&grpno=" +GrpNo);
   }
   
   function mOver(obj) {
      obj.background = "images\\test\\button_1.gif";
   }
   
   function mOut(obj) {
      obj.background = "images\\test\\button.gif";
   }
*/
   function beginTest() {

      if (location.href)
         //location.href = "test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CSValue; ?>&grpno=<?php echo $RndGrpNo; ?>";
         location.href = "test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CSValue; ?>&grpno=<?php echo $RndGrpNo; ?>&f_vid=<?php echo $f_vid; ?>";
      else
         //location.replace("test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CSValue; ?>&grpno=<?php echo $RndGrpNo; ?>");
         location.replace("test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CSValue; ?>&grpno=<?php echo $RndGrpNo; ?>&f_vid=<?php echo $f_vid; ?>");
   }
</script>

<table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
  <tr>
    <!--modified By Barry-->
    <td height="73" align="center"><img src="images\test\title_<?php echo $Lang; ?>.gif"><br><b>網上模擬筆試</b></td>
  </tr>

  <tr>
    <td height="100%" align="center" colspan="2">
      <iframe src="introduction_<?php echo $Lang; ?>.html" width="90%" height="350" frameborder=0 style="border:1px solid black;"></iframe>
    </td>
  </tr>
  <tr>
    <td align="center">
		<?php echo genCoverButton($aryText[$Lang]["BeginTest"], "beginTest();", 70, 150); ?>
    </td>
  </tr>
</table>

<?php
   include "footer.php";
   
   function genButton($QuestionList, $Lang, $GrpNo) {
      if (strstr($QuestionList, ",".(string)$GrpNo.",") === false)
         return("<table border=0 cellpadding=0 cellspacing=0 width=\"73\" height=\"75\"><tr><td background=\"images\\test\\button_2.gif\"".
                "style=\"vertical-align:middle;text-align:center;font-family:Arial;font-size:30px;font-weight:bold;".
                "color:#999999;\">".$GrpNo."</td></tr></table>");
      else {
         $Factor = rand(100000000, 999999999);
         $CheckSum = genCheckSum($Lang, $Factor);
         return("<table border=0 cellpadding=0 cellspacing=0 width=\"73\" height=\"75\"><tr><td background=\"images\\test\\button.gif\"".
                "style=\"font-family:Arial;vertical-align:middle;text-align:center;font-size:30px;font-weight:bold;color:#660066;\"".
                " onMouseOver=\"mOver(this);\" onMouseOut=\"mOut(this);\"".
                " onClick=\"jumpGroup('".$CheckSum.($Factor + $GrpNo)."',".$GrpNo.");\">".$GrpNo."</td></tr></table>");
      }
   }
?>