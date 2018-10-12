<?php
/***************************************************************/
/* File       : Steps to retrieve variables.                   */
/* Created by : Barry on 12th April, 2010                   */
/***************************************************************/
   $LastQuestionID = requestForm("txtQuestionID");
   if (haveData($LastQuestionID)) {
      $LastAnswer = requestForm("txtAnswer");
      $LastBookmark = requestForm("txtBookmark");
      if (haveData($LastAnswer))
         $Student["Answer"][(integer)$LastQuestionID] = $LastAnswer;
      if (haveData($LastBookmark))
         $Student["Bookmark"][(integer)$LastQuestionID] = $LastBookmark;
   }

   $Lang = requestQuerystring("lang");
   if (!haveData($Lang)) $Lang = "zh";
   $GrpNo = requestQuerystring("grpno");
   $CheckSum = requestQuerystring("cs");

   if (strpos($_SERVER["SCRIPT_NAME"], "result.php") === false && strpos($_SERVER["SCRIPT_NAME"], "check.php") === false)
      if (!haveData($CheckSum))
           echo "<script language=\"JavaScript\">alert(\"index 1\");</script>";
           //echo "<script language=\"JavaScript\">location.replace(\"index.php\");</script>";
      else {
         $Factor = (integer)right($CheckSum, strlen($CheckSum) - 5);
         $Factor = $Factor - (integer)$GrpNo;
         if ($CheckSum != genCheckSum($Lang, $Factor).($Factor + $GrpNo))
            echo "<script language=\"JavaScript\">alert(\"index 2\");</script>";
            //echo "<script language=\"JavaScript\">location.replace(\"index.php\");</script>";
      }

   if (haveData($BeginTime)) {
      $Now = time();
      $TimeLeft = FormatTimer($Lang, $Now - $BeginTime);
   } else
      echo "<script language=\"JavaScript\">alert(\"index 3\");</script>";
      //echo "<script language=\"JavaScript\">location.replace(\"index.php\");</script>";

   //if (strstr($QuestionList, ",".(string)$GrpNo.",") && !$AllFinished) {
   if (strstr($QuestionList, ",".(string)$GrpNo.",")) {
      $Temp = left($QuestionList, strpos($QuestionList, ",".(string)$GrpNo.",")).",";
      if (strlen($QuestionList) - strpos($QuestionList, ",".(string)$GrpNo.",") - strlen(",".(string)$GrpNo.",") > 0)
         $Temp .= right($QuestionList, strlen($QuestionList) - strpos($QuestionList, ",".(string)$GrpNo.",") - strlen(",".(string)$GrpNo.","));
      $QuestionList = $Temp;
      if ($QuestionList == ",") $QuestionList = "";
      if (haveData($QuestionList))
         mySetCookie($QuestionList);
      else
         mySetCookie("finished");
   }

   $PreviousQuestionSequence = requestForm("qseq");
   if (!haveData($PreviousQuestionSequence) || (integer)$PreviousQuestionSequence <= 0)
      $PreviousQuestionSequence = 1;
      
   // added by Barry
   $CheckAnswer = requestForm("checkanswer");
   if (!haveData($CheckAnswer))
   		$CheckAnswer="";

?>