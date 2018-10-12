<?php
/******************************************************************/
/* Begin page of the Online-written Test                          */
/* Created by Barry on 12th April, 2010                           */
/******************************************************************/
   include "modules.php";

   $aryText = array("zh" => array("TestResult" => "考試成績",
                                  "TestAgain" => "另一組題目",
                                  "CorrectQuestion" => "答對的題目",
                                  "WrongQuestion" => "答錯的題目",
                                  "CorrectAnswer" => " 條題目答對",
                                  "WrongAnswer" => " 條題目答錯",
                                  "Exit" => "離開網上模擬筆試"),
                    "en" => array("TestResult" => "Test Result",
                                  "TestAgain" => "Another Group",
                                  "CorrectQuestion" => "Correct answered question",
                                  "WrongQuestion" => "Wrong answered question",
                                  "CorrectAnswer" => " correct",
                                  "WrongAnswer" => " wrong",
                                  "Exit" => "Close Online Written Test"));

   include "procedures.php";
   include "header.php";
?>

<script language="JavaScript">
   function jump2Question(QuestionID) {
      if (QuestionID > 0)
         document.frmResult.qseq.value = QuestionID;
      document.frmResult.action = "check.php?<?php echo $_SERVER["QUERY_STRING"]; ?>";
      document.frmResult.submit();
   }
   
   function anotherSet() {
<?php   
// remark by Barry 
//if (!session_is_registered("Login") || strlen($Login) <= 0 || $Login == null)
if (1==2)
   {
      $burl = "http://".$HTTP_SERVER_VARS["HTTP_HOST"]."/onlinetest/test_".$Lang.".php";
      session_register("burl");

      echo "if (location.href) 
      		window.location.href = 'http://".$HTTP_SERVER_VARS['HTTP_HOST']."/member/login_".$lang.".php?errfg=4&txtLogin=';
   	    else
		window.location.replace('http://".$HTTP_SERVER_VARS['HTTP_HOST']."/member/login_".$lang.".php?errfg=4&txtLogin=');";
	
   }
   else
	echo "if (location.href)
         	location.href = 'index.php?lang=".$Lang."';
      	     else
         	location.replace('index.php?lang=".$Lang."');";
?>
   }
   
   function exitTest() {
      window.close();
   }
</script>


<form name="frmResult" method="post">
<table border=0 cellpadding=0 cellspacing=3 width="100%" height="70%">
<!--<table border=0 cellpadding=0 cellspacing=3 width="100%" height="100%">-->
  <tr>
    <td height="5%">
      <!-- Header Area -->
      <table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%">
      <!--<table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">-->
        <tr><td colspan="2"><img src="a1logo.jpg" width="770" height="118"></td></tr>      
        <tr>
          <td width="100%" style="text-align:left;"><b><?php echo $aryText[$Lang]["TestResult"]; ?></b></td>
        </tr>
      </table>
    </td>
  </tr>
  <tr>
    <!--<td height="78%"> by Barry-->
    <td height="30%">
      <!-- Question ID Area -->
      <input type="hidden" name="txtQuestionID">
      <input type="hidden" name="qseq" value="<?php echo $LastQuestionID; ?>">
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="70%" height="30%">
            <table border=0 cellpadding=3 cellspacing=0 width="100%" style="border:1px solid black;" height="100%">
<?php
   echo "".updateAnswer();

   $Correct = 0;
   $Wrong = 0;
   $Answer = "";
   $cn = openConn();
   for ($QuestionSequence = 1; $QuestionSequence <= 20; $QuestionSequence++) {
      //if ($QuestionSequence % 10 == 1)
      //if ($QuestionSequence % 10 == 1)      
         //echo "<tr>";
      //echo "<td width=\"20%\" align=\"center\">";
	  $rs = openQuery("select p.f_answer as Ans from parta p inner join writtentest_member_details d on p.f_qno=d.f_qno ".
	                  "where d.f_paper_id='A1-".str_pad($GrpNo,7,'0',STR_PAD_LEFT)."' and d.f_seq=".$QuestionSequence, $cn, 1);                   
      switch($rs["Ans"]) {
         case 0:
            $Answer = "A";
            break;
         case 1:
            $Answer = "B";
            break;
         case 2:
            $Answer = "C";
            break;
      }
      if ($Answer == $_SESSION["Student"]["Answer"][$QuestionSequence]) {
         $Correct++;
         //echo ("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".$QuestionSequence.
               //"\" background=\"images/test/legend_correct.gif\" style=\"vertical-align:middle;text-align".
               //":center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".$QuestionSequence."</a></td>".
               //"</tr></table>");
      } else {
         $Wrong++;
         //echo ("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".$QuestionSequence.
               //"\" background=\"images/test/legend_wrong.gif\" style=\"vertical-align:middle;text-align".
               //":center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".$QuestionSequence."</a></td>".
               //"</tr></table>");
      }
      //echo "</td>";
      //if ($QuestionSequence % 5 == 0)
      //if ($QuestionSequence % 10 == 0)
      
        // echo "</tr>";
   }
?>
              <tr>
                <td colspan=4>
                  <table border=0 cellpadding=3 cellspacing=3 width="100%">
                    <tr>
                      <td width="10%">&nbsp;</td>
                      <td width="10%"><?php echo $Correct; ?></td>
                      <td width="40%" align="left"><?php echo $aryText[$Lang]["CorrectAnswer"]; ?></td>
                      <td width="200" rowspan=2><img src="images/test/<?php if ($Wrong <= 4)
                                                                               echo "pass_".$Lang.".gif";
                                                                            else
                                                                               echo "fail_".$Lang.".gif";
                                                                      ?>"></td>
                    </tr>
                    <tr>
                      <td width="10%">&nbsp;</td>
                      <td width="10%"><?php echo $Wrong; ?></td>
                      <td><?php echo $aryText[$Lang]["WrongAnswer"]; ?></td>
                    </tr>
                  </table>
                </td>
              </tr>
            </table>
          </td>
          <td width="30%" >
<?php
   		echo "              ".genControlButton($aryText[$Lang]["TestAgain"], "anotherSet();", 60, 150, false)."<br><br>";
 	   echo "              ".genControlButton($aryText[$Lang]["Exit"], "exitTest();", 60, 150, false)."<br><br>";
?>
<!--
            <input type="button" name="btnAgain" value="<?php echo $aryText[$Lang]["TestAgain"]; ?>" onClick="anotherSet();" class="Button4"><Br><br>
-->
          </td>
        </tr>
      </table>
    </td>
  </tr>
  <!--<tr>
    <td height="15%" width="100%">
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="10%">&nbsp;</td>
          <td width="20%"><img src="images/test/legend_correct.gif">&nbsp;-&nbsp;<?php echo $aryText[$Lang]["CorrectQuestion"]; ?></td>
          <td width="20%"><img src="images/test/legend_wrong.gif">&nbsp;-&nbsp;<?php echo $aryText[$Lang]["WrongQuestion"]; ?></td>
          <td width="50%">&nbsp;</td>
        </tr>
      </table>
    </td>
  </tr>-->
</table>
</form>

<?php
   closeConn($cn);
   
   session_unregister("ValidLogin");   
   include "footer.php";
?>