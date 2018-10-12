<?php
/******************************************************************/
/* Begin page of the Online-written Test                          */
/* Created by Barry on 12th April, 2010                           */
/******************************************************************/

	include "modules.php";
	
	$aryAnswer = array("A", "B", "C");
	
	$aryText = array("zh" => array("AnswerDescription" => "您選擇的答案是：",
	                               "PictureQuestion" => "此交通標表示：",
	                               "CorrectAnswerDescription" => "此題正確答案是：",
	                               "CorrectQuestion" => "<font style=\"padding:3px;color:white;background-color:#00CC00;\">此題正確</font>", 
	                               "WrongQuestion" => "<font style=\"padding:3px;color:white;background-color:red;\">此題不正確</font>",
	                               "BackResult" => "考試成績"),
	                 "en" => array("AnswerDescription" => "Your answer is:",
	                               "PictureQuestion" => "This traffic sign means:",
	                               "CorrectAnswerDescription" => "The correct answer is:",
	                               "CorrectQuestion" => "<font style=\"padding:3px;color:white;background-color:#00CC00;\">Correct answered question</font>",
	                               "WrongQuestion" => "<font style=\"padding:3px;color:white;background-color:red;\">Wrong answered question</font>",
	                               "BackResult" => "Test Result"));
	
	include "procedures.php";
	
	$cn = openConn();
	$rs = openQuery("select min(f_seq) from writtentest_member_details where f_paper_id='A1-".str_pad($GrpNo,7,'0',STR_PAD_LEFT).
					"' and f_seq=".$PreviousQuestionSequence, $cn, 2);
	$Sequence = $rs[0];
	$rs = openQuery("select q.f_qno, q.f_quest_".$Lang.", q.f_a_".$Lang.", q.f_b_".$Lang.", q.f_c_".$Lang.
	                ", q.f_pic, q.f_answer from parta q inner join writtentest_member_details d on q.f_qno = d.f_qno ".
		                "where d.f_paper_id='A1-".str_pad($GrpNo,7,'0',STR_PAD_LEFT)."' and d.f_seq=".$Sequence, $cn, 1);
	
	include "header.php";
?>


<script language="JavaScript">
   function goResult() {
      if (location.href)
         location.href = "result.php?<?php echo $_SERVER["QUERY_STRING"]; ?>";
      else
         location.replace("result.php?<?php echo $_SERVER["QUERY_STRING"]; ?>");
   }
</script>


<form name="frmCheck" method="post">
<table border=0 cellpadding=0 cellspacing=3 width="100%" height="100%">
  <tr>
    <td height="8%">
      <!-- Header Area -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="70%" style="text-align:left;">
            <?php if ($Lang == "zh")
                     echo "試卷編號: A1-".str_pad($GrpNo,7,'0',STR_PAD_LEFT)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第 ".$Sequence." 條";
                  else
                     echo "Paper ID: A1-".str_pad($GrpNo,7,'0',STR_PAD_LEFT)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Question ".$Sequence;
            ?>
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="62%" style="border:3px solid black;background-color:#FFFAD0;">
      <!-- Question Area -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td style="text-align:left;vertical-align:top;">
            <input type="hidden" name="qseq" value="<?php echo $Sequence; ?>">
            <input type="hidden" name="txtQuestionID" value="<?php echo $Sequence; ?>">
            <?php 
               if (!haveData($rs["f_quest_".$Lang])) {
                  echo $aryText[$Lang]["PictureQuestion"];
               } else
                  echo $rs["f_quest_".$Lang]; ?>
          </td>
        </tr>
        <tr>
          <td>&nbsp;</td>
        </tr>
        <tr>
          <td width="100%" valign="top">
            <table border=0 cellpadding=3 cellspacing=0 width="100%">
<?php
   if (!haveData($rs["f_quest_".$Lang])) {
      $HaveImage = true;
      $QLen = 70;
   } else {
      $HaveImage = false;
      $QLen = 90;
   }
   
   if ($rs["f_answer"] == 0)
      $Style = " style=\"color:white;background-color:#00CC00;\"";
   else
      $Style = "";
   echo "<tr><td align=\"right\" width=\"10%\"".$Style.">A.</td><td align=\"left\" width=\"".$QLen."%\"".$Style.">".
        $rs["f_a_".$Lang]."</td>";
        
   if ($HaveImage)
      echo "<td align=\"center\" width=\"20%\" rowspan=3><img src=\"images/".$rs["f_pic"]."\" border=0></td>";
   echo "</tr>";
   
   if ($rs["f_answer"] == 1)
      $Style = " style=\"color:white;background-color:#00CC00;\"";
   else
      $Style = "";
   echo "<tr><td align=\"right\" width=\"10%\"".$Style.">B.</td><td align=\"left\" width=\"".$QLen."%\"".$Style.">".
        $rs["f_b_".$Lang]."</td></tr>";
        
   if ($rs["f_answer"] == 2)
      $Style = " style=\"color:white;background-color:#00CC00;\"";
   else
      $Style = "";
   echo "<tr><td align=\"right\" width=\"10%\"".$Style.">C.</td><td align=\"left\" width=\"".$QLen."%\"".$Style.">".
        $rs["f_c_".$Lang]."</td></tr>";
?>
            </table>
          </td>
        </tr>
        <tr>
          <td height="100%">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="20%">
      <!-- Answer Chooses -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td style="text-align:left;" width="25%">
            <?php echo $aryText[$Lang]["AnswerDescription"]; ?>
            <input type="hidden" name="txtAnswer" value="<?php echo $Student["Answer"][$Sequence]; ?>">
            <input type="hidden" name="txtBookmark" value="<?php echo $Student["Bookmark"][$Sequence]; ?>">
          </td>
          <td id="Answer" style="text-align:left;font-weight:bold;" width="40%"><?php echo $Student["Answer"][$Sequence]; ?></td>
          <td width="35%">&nbsp;</td>
        </tr>
        <tr>
          <td style="text-align:left;"><?php echo $aryText[$Lang]["CorrectAnswerDescription"]; ?></td>
          <td style="text-align:left;font-weight:bold;"><?php switch($rs["f_answer"]) {
                                                                 case 0:
                                                                    echo "A";
                                                                    break;
                                                                 case 1:
                                                                    echo "B";
                                                                    break;
                                                                 case 2:
                                                                    echo "C";
                                                                    break;
                                                              } ?></td>
          <td></td>
        </tr>
        <tr>
          <td style="text-align:left;" colspan=2><?php if ($rs["f_answer"] == 0 && $Student["Answer"][$Sequence] == "A")
                                                          echo $aryText[$Lang]["CorrectQuestion"];
                                                       else
                                                          if ($rs["f_answer"] == 1 && $Student["Answer"][$Sequence] == "B")
                                                             echo $aryText[$Lang]["CorrectQuestion"];
                                                          else
                                                             if ($rs["f_answer"] == 2 && $Student["Answer"][$Sequence] == "C")
                                                                echo $aryText[$Lang]["CorrectQuestion"];
                                                             else
                                                                echo $aryText[$Lang]["WrongQuestion"];
                                       ?></td>
          <td></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="10%" align="right">
<?php
   echo "                ".genControlButton($aryText[$Lang]["BackResult"], "goResult();", 60, 150, false);
?>
<!--
      <input type="button" name="btnGoResult" value="<?php echo $aryText[$Lang]["BackResult"]; ?>" onClick="goResult();" class="Button4">
-->
    </td>
  </tr>
</table>
</form>

<?php
   closeConn($cn);
   include "footer.php"; ?>