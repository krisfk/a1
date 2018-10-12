<?php
/******************************************************************/
/* Begin page of the Online-written Test                          */
/* Created by Barry on 12th April, 2010                           */
/******************************************************************/

   include "modules.php";

   $aryText = array("zh" => array("TimerDescription" => "剩餘時間：",
                                  "TestSummary" => "考試總結",
                                  "ReviewBox" => "覆覽欄",
                                  "AnsweredQuestion" => "已經回答的題目",
                                  "BookmarkedQuestion" => "被標示的題目",
                                  "UnansweredQuestion" => "尚未回答的題目",
                                  "BackButtonDescription" => "返回考試",
                                  "FinishButtonDescription" => "交卷",
                                  "AnsweredCount" => " 條題目已經回答",
                                  "UnansweredCount" => " 條題目尚未回答"),
                    "en" => array("TimerDescription" => "Time Left:",
                                  "TestSummary" => "Test Summary",
                                  "ReviewBox" => "Review Box",
                                  "AnsweredQuestion" => "Question answered",
                                  "BookmarkedQuestion" => "Question marked for review",
                                  "UnansweredQuestion" => "Question not answered",
                                  "BackButtonDescription" => "Back to Test",
                                  "FinishButtonDescription" => "Confirm End",
                                  "AnsweredCount" => " question(s) is/are answered",
                                  "UnansweredCount" => " question(s) is/are unanswered"));

   include "procedures.php";

   include "header.php";
?>

<script language="JavaScript">
   var ExamReminder = <?php echo ExamReminder; ?>;
   var iTimerID = null;

   iTimerID = setInterval("countDown()", 930);

   function countDown() {
      var indent = "<?php echo $aryText[$Lang]["TimerDescription"]; ?>".length;
      var iMinute = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 0, 2));
<?php
   if ($Lang == "en") { ?>
      var iSecond = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 7, 2)) - 1;
<?php
      } else { ?>
      var iSecond = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 6, 2)) - 1;
<?php
   } ?>

      if (iSecond < 0) {
         iMinute--;
         iSecond = 59;
      }

<?php
   if ($Lang == "zh") { ?>
      document.all.ExamTimer.innerHTML = "<?php echo $aryText[$Lang]["TimerDescription"]; ?>" + 
                                         (iMinute < 10 ? "0" + iMinute : iMinute) + " 分鐘 " + 
                                         (iSecond < 10 ? "0" + iSecond : iSecond) + " 秒";
<?php
   } else { ?>
      document.all.ExamTimer.innerHTML = "<?php echo $aryText[$Lang]["TimerDescription"]; ?>" + 
                                         (iMinute < 10 ? "0" + iMinute : iMinute) + " min " + 
                                         (iSecond < 10 ? "0" + iSecond : iSecond) + " sec";
<?php
   } ?>

      if (iMinute * 60 + iSecond <= ExamReminder) {
         document.all.ExamTimer.style.textDecoration = document.all.ExamTimer.style.color == "red" ? "none" : "underline";
         document.all.ExamTimer.style.color = document.all.ExamTimer.style.color == "red" ? "black" : "red";
      }

      if (iMinute <= 0 && iSecond <= 0) {
         clearInterval(iTimerID);
         finishTest();
      }
   }
   
   function jump2Question(QuestionID) {
      if (QuestionID > 0)
         document.frmSummary.qseq.value = QuestionID;
		 document.frmSummary.action = "test.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CheckSum; ?>&grpno=<?php echo $GrpNo; ?>";
		 document.frmSummary.submit();
   }
   
   function finishTest() {
      document.frmSummary.action = "result.php?<?php echo $_SERVER["QUERY_STRING"]; ?>";
      document.frmSummary.submit();
   }
</script>


<form name="frmSummary" method="post">
<table border=0 cellpadding=0 cellspacing=3 width="100%" height="100%">
  <tr>
    <td height="7%">
      <!-- Header Area -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="70%" style="text-align:left;"><?php echo $aryText[$Lang]["TestSummary"]; ?></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <td height="78%">
		<!-- Question ID Area -->
		<input type="hidden" name="txtQuestionID">
		<input type="hidden" name="qseq" value="<?php echo $LastQuestionID; ?>">
		<input type="hidden" name="grpno" value="<?php echo $GrpNo; ?>">
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="70%" height="100%">
            <table border=0 cellpadding=3 cellspacing=0 width="100%" style="border:1px solid black;" height="100%">
              <tr>
                <td colspan=4><?php echo $aryText[$Lang]["ReviewBox"]; ?></td>
              </tr>
<?php
   $AnsweredCount = 0;
   $UnansweredCount = 0;
   for ($QuestionSequence = 1; $QuestionSequence <= 20; $QuestionSequence++) {
      if ($QuestionSequence % 5 == 1)
         echo "<tr>";
      echo "<td width=\"20%\" align=\"center\">";
      if ($_SESSION["Student"]["Bookmark"][$QuestionSequence] == "Y" && haveData($_SESSION["Student"]["Answer"][$QuestionSequence]))
         echo ("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".$QuestionSequence.
               "\" background=\"images/test/legend_marked_answered.gif\" style=\"vertical-align:middle;text-align".
               ":center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".$QuestionSequence."</a></td>".
               "</tr></table>");
      else
         if (haveData($_SESSION["Student"]["Answer"][$QuestionSequence]))
            echo ("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".
                  $QuestionSequence."\" background=\"images/test/legend_answered.gif\" style=\"vertical-align:middle;".
                  "text-align:center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".
                  $QuestionSequence."</a></td></tr></table>");
         else
            if ($_SESSION["Student"]["Bookmark"][$QuestionSequence] == "Y")
               echo ("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".
                     $QuestionSequence."\" background=\"images/test/legend_marked.gif\" style=\"vertical-align:middle;".
                     "text-align:center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".
                     $QuestionSequence."</a></td></tr></table>");
            else
               echo ("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".
                     $QuestionSequence."\" background=\"images/test/legend_unanswered.gif\" style=\"vertical-align:".
                     "middle;text-align:center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".
                     $QuestionSequence."</a></td></tr></table>");
      echo "</td>";
      if ($QuestionSequence % 5 == 0)
         echo "</tr>";
      if (haveData($_SESSION["Student"]["Answer"][$QuestionSequence]))
         $AnsweredCount++;
      else
         $UnansweredCount++;
   }
?>
              <tr>
                <td colspan=4>
                  <table border=0 cellpadding=3 cellspacing=3 width="100%">
                    <tr>
                      <td width="10%">&nbsp;</td>
                      <td width="10%"><?php echo $AnsweredCount; ?></td>
                      <td width="80%" align="left"><?php echo $aryText[$Lang]["AnsweredCount"]; ?></td>
                    </tr>
                    <tr>
                      <td width="10%">&nbsp;</td>
                      <td width="10%"><?php echo $UnansweredCount; ?></td>
                      <td><?php echo $aryText[$Lang]["UnansweredCount"]; ?></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
          <td width="30%">
            <table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%">
              <tr>
                <td id="ExamTimer" style="font-weight:bold;font-family:Verdena;"><?php echo $aryText[$Lang]["TimerDescription"].$TimeLeft; ?></td>
              </tr>
              <tr>
                <td>
<?php
   echo "                  ".genControlButton($aryText[$Lang]["BackButtonDescription"], "jump2Question(-1);", 60, 150, false)."<br><br>";
   echo "                  ".genControlButton($aryText[$Lang]["FinishButtonDescription"], "finishTest();", 60, 150, false);
?>
<!--
                  <input type="button" name="btnBack" value="<?php echo $aryText[$Lang]["BackButtonDescription"]; ?>" onClick="jump2Question(-1);" class="Button4"><br><br>
                  <input type="button" name="btnFinishTest" value="<?php echo $aryText[$Lang]["FinishButtonDescription"]; ?>" onClick="finishTest();" class="Button4">
-->
                </td>
              </tr>
              <tr>
                <td height="40%">&nbsp;</td>
              </tr>
            </table>
          </td>
        </tr>
      </table>
    </td>
    <td>
    </td>
  </tr>
  <tr>
    <td height="15%">
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="10%">&nbsp;</td>
          <td><img src="images/test/legend_answered.gif">&nbsp;-&nbsp;<?php echo $aryText[$Lang]["AnsweredQuestion"]; ?></td>
          <td><img src="images/test/legend_marked.gif">&nbsp;-&nbsp;<?php echo $aryText[$Lang]["BookmarkedQuestion"]; ?></td>
          <td><img src="images/test/legend_unanswered.gif">&nbsp;-&nbsp;<?php echo $aryText[$Lang]["UnansweredQuestion"]; ?></td>
          <td width="10%">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php
   include "footer.php";
?>