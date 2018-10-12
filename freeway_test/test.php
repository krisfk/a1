<?php
/******************************************************************/
/* Begin page of the Online-written Test                          */
/* Created by Barry on 12th April, 2010                           */
/******************************************************************/

	include "modules.php";
   
	

	if (!session_is_registered("BeginTime")) {
		$GrpNo = requestQuerystring("grpno");
	   $BeginTime = time();
	   session_register("BeginTime");
		$rs  = "insert into writtentest_member values ('";
		$rs .= "A1-" . str_pad($GrpNo,7,"0",STR_PAD_LEFT) . "',";
		//$rs .= $f_vid . ",'" . $_SESSION['username'] . "',";
		$rs .= $f_vid . ",'" . "guest" . "',";			
		$rs .= "'" . date("Ymd G:i:s") . "')";
		$cn = openConn();
		openQuery($rs, $cn, 0);
		
		include "randomquestion.php";
	}
	
	if (!session_is_registered("Student")) {
	   $Student = array("Bookmark" => array("1" => "N", "2" => "N", "3" => "N", "4" => "N", "5" => "N", "6" => "N", "7" => "N", 
	                                        "8" => "N", "9" => "N", "10" => "N", "11" => "N", "12" => "N", "13" => "N", "14" => "N", 
	                                        "15" => "N", "16" => "N", "17" => "N", "18" => "N", "19" => "N", "20" => "N"),
	                    "Answer" => array("1" => "", "2" => "", "3" => "", "4" => "", "5" => "", "6" => "", "7" => "", 
	                                      "8" => "", "9" => "", "10" => "", "11" => "", "12" => "", "13" => "", "14" => "", 
	                                      "15" => "", "16" => "", "17" => "", "18" => "", "19" => "", "20" => ""));
	   session_register("Student");
	}
	
	
	$aryText = array("zh" => array("TimerDescription" => "剩餘時間：",
	                               "AnswerDescription" => "您選擇的答案是：",
	                               "PictureQuestion" => "此交通標誌表示：",
	                               "Bookmark" => "此題已被標示",
	                               "ReviewBox" => "覆覽欄",
	                               "PreviousQuestion" => "上一條題目",
	                               "NextQuestion" => "下一條題目",
	                               "MarkQuestion" => "覆覽標示",
	                               "UnMarkQuestion" => "刪除覆覽標示",
	                               "AnsweredQuestion" => "已經回答的題目",
	                               "BookmarkedQuestion" => "被標示的題目",
	                               "UnansweredQuestion" => "尚未回答的題目",
	                               "ConfirmAnswer" => "確認本題答案",	        
	                               "CorrectAnswerDescription" => "此題正確答案是：",	                               
	                               "CorrectQuestion" => "<font style=\"padding:3px;color:white;background-color:#00CC00;\">此題正確</font>", 
	                               "WrongQuestion" => "<font style=\"padding:3px;color:white;background-color:red;\">此題不正確</font>",	                               
	                               "SubmitTest" => "完成並交卷"),
	                 "en" => array("TimerDescription" => "Time Left:",
	                               "AnswerDescription" => "Your answer is:",
	                               "PictureQuestion" => "This traffic sign means:",
	                               "Bookmark" => "Bookmarked",
	                               "ReviewBox" => "Review Box",
	                               "PreviousQuestion" => "Previous",
	                               "NextQuestion" => "Next",
	                               "MarkQuestion" => "Mark for Review",
	                               "UnMarkQuestion" => "Unmark for Review",
	                               "AnsweredQuestion" => "Question answered",
	                               "BookmarkedQuestion" => "Question marked for review",
	                               "UnansweredQuestion" => "Question not answered",
	                               "ConfirmAnswer" => "Confirm this answer",
	                               "CorrectAnswerDescription" => "The correct answer is:",	                               
	                               "CorrectQuestion" => "<font style=\"padding:3px;color:white;background-color:#00CC00;\">Correct answered question</font>",
	                               "WrongQuestion" => "<font style=\"padding:3px;color:white;background-color:red;\">Wrong answered question</font>",	                               
	                               "SubmitTest" => "Finish and Submit"));
	
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
   var ExamReminder = <?php echo ExamReminder; ?>;
   var iTimerID = null;

   iTimerID = setInterval("countDown()", 940);

   function countDown() {
      var indent = "<?php echo $aryText[$Lang]["TimerDescription"]; ?>".length;
    	if ((document.all.ExamTimer.innerHTML).substr(indent + 0, 2)<"10") {
    	var iMinute = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 1, 1));	    	
    	}
    	else
    	{
    	var iMinute = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 0, 2));	    	
    	}
    	
<?php
	if ($Lang == "en") { ?>
    	if ((document.all.ExamTimer.innerHTML).substr(indent + 7, 2)<"10") {   
      		var iSecond = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 8, 1)) - 1;	  	    	
    	}
    	else
    	{
      		var iSecond = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 7, 2)) - 1;	    	
    	}   

<?php
	} else { ?>
    	if ((document.all.ExamTimer.innerHTML).substr(indent + 6, 2)<"10") {   
      		var iSecond = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 7, 1)) - 1;	    	
    	}
    	else
    	{	    	      
      		var iSecond = parseFloat((document.all.ExamTimer.innerHTML).substr(indent + 6, 2)) - 1;
  		}
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
         document.frmTest.action = "result.php?<?php echo $_SERVER["QUERY_STRING"]; ?>";
         document.frmTest.submit();
      }
   }

   
   function selectAnswer(obj) {
      //document.all.Answer.innerHTML = obj.value;
      document.all.Answer.innerHTML = obj.value;
      document.frmTest.txtAnswer.value = obj.value;
      
      //if (document.frmTest.txtBookmark.value == "Y" && document.frmTest.txtAnswer.value != "")
         //document.all["Q" + document.frmTest.txtQuestionID.value].background = "<?php echo "images/test/legend_marked_answered.gif"; ?>";
      //else
         //if (document.frmTest.txtAnswer.value != "")
            //document.all["Q" + document.frmTest.txtQuestionID.value].background = "<?php echo "images/test/legend_answered.gif"; ?>";
            
      document.all["AnswerLabel"].style.color = "red";
   }
   

   function jumpQuestion(iDir) {
      //disableAll(true);
      document.frmTest.qseq.value = parseFloat(document.frmTest.qseq.value) + iDir;
      document.frmTest.submit();
   }
   
   function checkAnswer() {
      //disableAll(true);
      //document.frmTest.qseq.value = parseFloat(document.frmTest.qseq.value) + iDir;
<?php
	if ($Lang == "zh") { ?>      
      if (document.frmTest.txtAnswer.value == "") {
	      alert("請選擇答案!");
	      return;
  		}
<?php } ?>
<?php
	if ($Lang == "en") { ?> 
	  if (document.frmTest.txtAnswer.value == "") {
	      alert("Please select answer!");
	      return;
  	}
<?php } ?>
      
      document.frmTest.checkanswer.value = "Y";
      document.frmTest.submit();
   }   

   function bookmark(obj) {
      document.frmTest.txtBookmark.value = document.frmTest.txtBookmark.value == "Y" ? "N" : "Y";
      //document.frmTest.btnBookmark.value = document.frmTest.txtBookmark.value == "Y" ? "<?php echo $aryText[$Lang]["UnMarkQuestion"]; ?>" : "<?php echo $aryText[$Lang]["MarkQuestion"]; ?>";
      obj.innerHTML = document.frmTest.txtBookmark.value == "Y" ? "<?php echo $aryText[$Lang]["UnMarkQuestion"]; ?>" : "<?php echo $aryText[$Lang]["MarkQuestion"]; ?>";
      if (document.frmTest.txtAnswer.value != "")
         document.all["Q" + document.frmTest.txtQuestionID.value].background = document.frmTest.txtBookmark.value == "Y" ? "<?php echo "images/test/legend_marked_answered.gif"; ?>" : "<?php echo "images/test/legend_answered.gif"; ?>";
      else
         document.all["Q" + document.frmTest.txtQuestionID.value].background = document.frmTest.txtBookmark.value == "Y" ? "<?php echo "images/test/legend_marked.gif"; ?>" : "<?php echo "images/test/legend_unanswered.gif"; ?>";
   }

   function finishExam() {
      document.frmTest.action = "result.php?lang=<?php echo $Lang; ?>&cs=<?php echo $CheckSum; ?>&grpno=<?php echo $GrpNo; ?>";
      document.frmTest.submit();
   }
   
   function jump2Question(QuestionID) {
      document.frmTest.qseq.value = QuestionID;
      document.frmTest.submit();
   }
   
   function disableAll(Mode) {
      document.frmTest.btnAnswer1.disabled = Mode;
      document.frmTest.btnAnswer2.disabled = Mode;
      document.frmTest.btnAnswer3.disabled = Mode;
      document.frmTest.btnPrevious.disabled = Mode;
      document.frmTest.btnNext.disabled = Mode;
      document.frmTest.btnBookmark.disabled = Mode;
      document.frmTest.btnFinish.disabled = Mode;
   }

   var Answer = "";

   function mOver(obj) {
      if ((obj.style.backgroundColor).toUpperCase() != cGreen)
         obj.style.backgroundColor = cGrey;
      document.body.style.cursor = "hand";
   }

   function mOut(obj) {
      if ((obj.style.backgroundColor).toUpperCase() != cGreen)
         obj.style.backgroundColor = cWhite;
      document.body.style.cursor = "default";
   }
</script>


<form name="frmTest" method="post">
<table border=0 cellpadding=0 cellspacing=3 width="100%" height="100%">
  <tr>
    <td height="8%">
      <!-- Header Area -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <!--<tr><td colspan="2"><img src="logo_png.gif" width="770" height="118"></td></tr>-->
        <tr>
          <td width="70%" style="text-align:left;">
            <?php if ($Lang == "zh")
                     //echo "使用者名稱: "."guest"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."試卷編號: P".str_pad($GrpNo,9,'0',str_pad_left)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第 ".$Sequence." 條";            
                     echo "試卷編號: A1-".str_pad($GrpNo,7,'0',STR_PAD_LEFT)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;第 ".$Sequence." 條";                                 
                  else
                     //echo "UserName: "."guest"."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;"."Paper ID: P".str_pad($GrpNo,9,'0',str_pad_left)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Question ".$Sequence;    
                     echo "Paper ID: A1-".str_pad($GrpNo,7,'0',STR_PAD_LEFT)."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Question ".$Sequence;                         
            ?>
          </td>
          <td id="ExamTimer" style="font-weight:bold;font-family:Verdena;"><?php echo $aryText[$Lang]["TimerDescription"].$TimeLeft; ?></td>
        </tr>
        <!--<tr>
        	<td>&nbsp;</td>
        	<td><?php echo TestTime?> - <?php echo $Now?> - <?php echo $BeginTime?> - <?php echo FormatTimer($Lang, $Now - $BeginTime); ?> - <?php echo myPadding("9","0",2,"l"); ?></td>
        </tr>-->
      </table>
    </td>
  </tr>
  <tr>
    <td height="36%">
      <!-- Question Area -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%">
        <tr>
          <td width="100%" height="85%" colspan="3" align="center">
            <table border=0 cellpadding=3 cellspacing=0 width="100%" height="100%" style="border:3px solid black;background-color:#FFFAD0;">
              <tr>
                <td style="text-align:left;vertical-align:top;">
                  <input type="hidden" name="txtGrpNo" value="<?php echo $GrpNo; ?>">                
                  <input type="hidden" name="qseq" value="<?php echo $Sequence; ?>">
                  <input type="hidden" name="checkanswer" value="">
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

					   if ($CheckAnswer=="Y") {
					   		echo "<tr><td style=\"text-align:left;\">&nbsp;A. ".$rs["f_a_".$Lang]."</td>";
					   		if ($HaveImage)
						      	echo "<td style=\"text-align:left;\" rowspan=3><img src=\"images/".$rs["f_pic"]."\" border=0></td>";
					   		echo "</tr>";
					   		echo "<tr><td style=\"text-align:left;\">&nbsp;B. ".$rs["f_b_".$Lang]."</td></tr>";
					   		echo "<tr><td style=\"text-align:left;\">&nbsp;C. ".$rs["f_c_".$Lang]."</td></tr>";						   
					   }
					   else
					   {
							   					
					   		echo "<tr><td style=\"text-align:left;\"><input type=\"radio\" name=\"chkAnswer\" value=\"A\" onClick=\"selectAnswer(this);\">&nbsp;A. ".$rs["f_a_".$Lang]."</td>";
					   		if ($HaveImage)
						      	echo "<td style=\"text-align:left;\" rowspan=3><img src=\"images/".$rs["f_pic"]."\" border=0></td>";
					   		echo "</tr>";
					   		echo "<tr><td style=\"text-align:left;\"><input type=\"radio\" name=\"chkAnswer\" value=\"B\" onClick=\"selectAnswer(this);\">&nbsp;B. ".$rs["f_b_".$Lang]."</td></tr>";
					   		echo "<tr><td style=\"text-align:left;\"><input type=\"radio\" name=\"chkAnswer\" value=\"C\" onClick=\"selectAnswer(this);\">&nbsp;C. ".$rs["f_c_".$Lang]."</td></tr>";
				   		}
				   		//echo "<tr><td>&nbsp;</td></tr>";

				   		
					?>
                  </table>
                </td>
              </tr>

            </table>
          </td>
          <!--<td><img src="images/test/title_en.gif" border=0><br><img src="images/test/title_en.gif" border=0><br><img src="images/test/title_en.gif" border=0></td>-->
                   

        </tr>
                            
        <!-- Answer Area -->
        <tr>
          <td style="text-align:left;<?php if ($Student["Answer"][$Sequence] != "") echo "color:red;" ?>" width="25%" id="AnswerLabel">
            <?php echo $aryText[$Lang]["AnswerDescription"]; ?>
            <input type="hidden" name="txtAnswer" value="<?php echo $Student["Answer"][$Sequence]; ?>">
            <input type="hidden" name="txtBookmark" value="<?php echo $Student["Bookmark"][$Sequence]; ?>">
          </td>
          <td id="Answer" style="color:red;text-align:left;font-weight:bold;" width="40%"><?php echo $Student["Answer"][$Sequence]; ?></td>
          <td width="35%">&nbsp;</td>          
        </tr>
        
		<?php  if ($CheckAnswer=="Y") {?>
       
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
        <?php  }?>

        <!-- Answer Chooses -->
        
      </table>
    </td>
  </tr>
  
  
  <tr>
    <td height="30%">
      <!-- Navigation -->
      <table border=0 cellpadding=3 cellspacing=0 width="100%">
        <tr>
           <td style="text-align:left;" width="140">
					<?php
					
   						if ($Sequence >= 20)
      						$Disabled = true;
   						else
      						$Disabled = false;					      
					     
					      echo "".updateAnswer(); 

					     //echo "<tr><td style=\"text-align:left;\">";
					    if ($CheckAnswer=="Y") {
   							//echo "<input type=\"button\" name=\"btnNext\" value=\"".$aryText[$Lang]["NextQuestion"].
        					//"\" onClick=\"jumpQuestion(1);\" class=\"Button4\"";      						

        					
        					//if ($Disabled == true) {
	        					//echo " disabled>";
        					//}
        					//else
        					//{
	        					//echo ">";
        					//}
        					if ($Disabled == true) {
   							//	echo "".genControlButton($aryText[$Lang]["NextQuestion"], "jumpQuestion(1)", 60, 150, true);        					
   								//echo "&nbsp;";        					
   							
        					}
        					else
        					{
   								echo "".genControlButton($aryText[$Lang]["NextQuestion"], "jumpQuestion(1)", 30, 120, false);        						        					
        					}        					
        					
    					}
        				else
        				{
   							//echo "<input type=\"button\" name=\"btnCheck\" value=\"".$aryText[$Lang]["ConfirmAnswer"].
        					//"\" onClick=\"checkAnswer();\" class=\"Button4\">";           				
   							echo "".genControlButton($aryText[$Lang]["ConfirmAnswer"], "checkAnswer()", 30, 120, false);        					        					
    					}			
    					
			   
					if (($Disabled == true) && ($CheckAnswer=="Y")) {
						echo genControlButton($aryText[$Lang]["SubmitTest"], "finishExam()", 30, 120, false)."</td>";						
					}
					else
					{
   						echo "</td><td style=\"text-align:left;\">".genControlButton($aryText[$Lang]["SubmitTest"], "finishExam()", 30, 120, false)."</td>";        					        					   						
					}
					?>                
              <!--&nbsp;&nbsp;<input type="button" name="btnFinish" value="<?php echo $aryText[$Lang]["SubmitTest"]; ?>" onClick="finishExam();" class="Button4"></td>-->
          </tr>
      </table>
    </td>
  </tr>
</table>
</form>

<?php
   closeConn($cn);
   include "footer.php";
   function genReviewButton($QuestionSequence) {
      if ($_SESSION["Student"]["Bookmark"][$QuestionSequence] == "Y" && haveData($_SESSION["Student"]["Answer"][$QuestionSequence]))
         return("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".$QuestionSequence.
                "\" background=\"images/test/legend_marked_answered.gif\" style=\"vertical-align:middle;text-align".
                ":center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".$QuestionSequence."</a></td>".
                "</tr></table>");
      else
         if (haveData($_SESSION["Student"]["Answer"][$QuestionSequence]))
            return("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".
                   $QuestionSequence."\" background=\"images/test/legend_answered.gif\" style=\"vertical-align:middle;".
                   "text-align:center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".
                   $QuestionSequence."</a></td></tr></table>");
         else
            if ($_SESSION["Student"]["Bookmark"][$QuestionSequence] == "Y")
               return("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".
                      $QuestionSequence."\" background=\"images/test/legend_marked.gif\" style=\"vertical-align:middle;".
                      "text-align:center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".
                      $QuestionSequence."</a></td></tr></table>");
            else
               return("<table border=0 cellpadding=0 cellspacing=0 width=\"32\" height=\"32\"><tr><td id=\"Q".
                      $QuestionSequence."\" background=\"images/test/legend_unanswered.gif\" style=\"vertical-align:".
                      "middle;text-align:center;\"><a href=\"JavaScript:jump2Question(".$QuestionSequence.");\">".
                      $QuestionSequence."</a></td></tr></table>");
   }

   function genAnswerButton($ButtonLabel, $Height, $Width, $StudentAnswer) {
      $html = "<table border=0 cellpadding=3 cellspacing=0 width=\"".$Width."\" height=\"".$Height."\" style=".
              "\"background-color:";
      if ($StudentAnswer == $ButtonLabel)
         $html .= "#A3F994";
      else
         $html .= "white";
      $html .= ";border:1px solid black;font-weight:bold;text-align:center;vertical-align:middle;\"><tr><td id=\"".
               $ButtonLabel."\" onMouseOver=\"mOver(this);\" onMouseOut=\"mOut(this);\" onClick=\"clickThis(this);\"".
               "style=\"font-size:20px;font-weight:bold;font-family:Arial;\">".$ButtonLabel."</td></tr></table>";
      return($html);
   }
?>