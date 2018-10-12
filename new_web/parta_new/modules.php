<?php
/******************************************************************/
/* File       : New online written include file                   */
/* Created by : Barry on 12th April, 2010                      */
/*                                                                */
/*                                                                */
/*           changed random method from one group selection to    */
/*           based on Cat_ID / Sub_Cat_ID / No_of_Random          */
/******************************************************************/
session_start();

//define("TestTime", 610);
define("TestTime", 1200);
define("ExamReminder", 300);


$Lang = $HTTP_GET_VARS["lang"];
if (!haveData($Lang))
   $Lang = "zh";
else
   if ($Lang != "zh" && $Lang != "en")
      $Lang = "zh";
     
if ((!session_is_registered("ValidLogin") || $ValidLogin != "success") && 
    !strstr($_SERVER["SCRIPT_NAME"], "index.php")) { ?>
<script language="JavaScript">
   if (location.href)
      location.href = "index.php?lang=<?php echo $Lang; ?>";
   else
      location.replace("index.php?lang=<?php echo $Lang; ?>");
</script>
<?php
   exit();
}

$QuestionList = $_COOKIE["questionlist"];

if (!haveData($QuestionList)) {
   //Reb: 20080305
   //$QuestionList = ",1,2,3,4,5,6,7,8,9,10,11,12,13,14,";
   $QuestionList = ",1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,";
   mySetCookie($QuestionList);
   //$AllFinished = false;
} else
   if ($QuestionList == "finished") {
      //$AllFinished = true;
      //Reb: 20080305
      //$QuestionList = ",1,2,3,4,5,6,7,8,9,10,11,12,13,14,";
      $QuestionList = ",1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,";
   }
   
   /* else
      $AllFinished = false;*/


/*==================================================================================================
   Begin of Database Module
==================================================================================================*/

/***************************************************************/
/* Function    : Establish database connection                 */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function openConn() {
   $cn = mysql_pconnect("localhost", "a1_user", "134679as");
   //$cn = mysql_pconnect("localhost", "admin", "239uw");
   mysql_query("SET SESSION character_set_results = 'BIG5'");   	
   return($cn);
}


/***************************************************************/
/* Function    : Retrieve query records.                       */
/* Created by  : Kan on 25th Nov, 2003                         */
/* Note        : $Mode ... 1 - mysql_fetch_array               */
/*                         2 - mysql_fetch_row                 */
/*                         3 - mysql_fetch_object              */
/***************************************************************/
function openQuery($SQL, $cn, $Mode) {
   $db = mysql_select_db("a1_db", $cn);	
   $QueryResult = mysql_query($SQL);
   if ($QueryResult) {
      switch($Mode) {
         case 1:
            $Result = mysql_fetch_array($QueryResult);
            break;
         case 2:
            $Result = mysql_fetch_row($QueryResult);
            break;
         case 3:
            $Result = mysql_fetch_object($QueryResult);
            break;
         default:
            $Result = $QueryResult;
            break;
      }
      return($Result);
   } else
      return(false);
}


/***************************************************************/
/* Function    : Close query result.                           */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function closeQuery($QueryResult) {
   mysql_free_result($QueryResult);
}


/***************************************************************/
/* Function    : Close database connection.                    */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function closeConn($cn) {
   mysql_close($cn);
}


/***************************************************************/
/* Function    : Format SQL string.                            */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function sqlString($SQL_Value) {
   return(str_replace("'", "\'", $SQL_Value));
}



/*==================================================================================================
   Begin of Normal Module
==================================================================================================*/

/***************************************************************/
/* Function    : Check whether the varaible contains value.    */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function haveData($inputvar)
{
   if ($inputvar == null || $inputvar == "" || strlen($inputvar) <= 0)
      return false;
   else
      return true;
}


/***************************************************************/
/* Function    : Return the left n characters of a string.     */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function left($inputstr, $chrnum)
{
   if ($chrnum == null || $chrnum < 0 || strlen($inputstr) <= 0)
      return "";
   else
      return (substr($inputstr, 0, $chrnum));
}


/***************************************************************/
/* Function    : Return the right n character of a string.     */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function right($inputstr, $chrnum)
{
   if ($chrnum == null || $chrnum < 0 || strlen($inputstr) <= 0)
      return $inputstr;
   else
      return (substr($inputstr, -$chrnum));
}


/***************************************************************/
/* Function    : Format the Chinese string.                    */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function showChinese($inputstr)
{
   $outstr = "";
   $zhchr = "";
   for ($i = 0; $i < strlen($inputstr); $i++)
   {
      $zhchr = ord(substr($inputstr, $i, 1));
      if ($zhchr > 127)
      {
         $outstr .= substr($inputstr, $i, 2)." ";
         $i++;
      }
      else
      {
         $outstr .= substr($inputstr, $i, 1);
         if (ord(substr($inputstr, $i + 1, 1)) > 127)
            $outstr .= " ";
      }
   }
   return $outstr;
}


/***************************************************************/
/* Function    : Add colen to english and chinese answers.     */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function formatAnswer($answer, $lang)
{
   if (haveData($answer))
      if (strcmp(trim($lang), "zh") == 0)
         return $answer."¡C";
      else
         return $answer.".";
   else
      return "";
}


/***************************************************************/
/* Function    : Refresh the cookie values.                    */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function mySetCookie($CkyVal)
{
   /*$expiretime = (string)gmdate("l, d-M-Y H:i:s", time() + 604800);
   $cookiestr = sprintf("questionlist=%s; expires=%s", $CkyValue, $expiretime);
   $mycky = "Set-Cookie: $cookiestr";
   header($mycky);*/
   setcookie("questionlist", $CkyVal, time() + 604800);
}


/***************************************************************/
/* Function    : Delete the cookie.                            */
/* Created by  : Kan on 25th Nov, 2003                         */
/***************************************************************/
function myDelCookie() {
   setcookie("questionlist", "", time() - 1);
}


/***************************************************************/
/* Function    : Generate the check sum value.                 */
/* Created by  : Kan on 26th Nov, 2003                         */
/***************************************************************/
function genCheckSum($Lang, $Factor) {
   if ($Lang == "zh")
      $CheckSum = 18022;
   else
      $CheckSum = 92815;
   $CheckSum = (string)($CheckSum + $Factor);
   $CheckSumValue = "";
   for ($i = 0; $i < strlen($CheckSum); $i += 2)
      if ($CheckSum - $i > 1)
         $CheckSumValue .= chr((integer)substr($CheckSum, $i, 1) + (integer)substr($CheckSum, ($i + 1), 1) + 65);
      else
         $CheckSumValue .= chr((integer)substr($CheckSum, $i, 1) + 65);
   return($CheckSumValue);
}


/***************************************************************/
/* Function    : Get the HTTP Variables (GET)                  */
/* Created by  : Kan on 27th Nov, 2003                         */
/***************************************************************/
function requestQuerystring($VariableName) {
   return($_GET[$VariableName]);
}


/***************************************************************/
/* Function    : Get the HTTP Variable (POST)                  */
/* Created by  : Kan on 27th Nov, 2003                         */
/***************************************************************/
function requestForm($VariableName) {
   return($_POST[$VariableName]);
}


/***************************************************************/
/* Function    : Pad the input string.                         */
/* Created by  : Kan on 28th Nov, 2003                         */
/***************************************************************/
function myPadding($Value, $PadCharacter, $Length, $Direction) {
   if (strlen($Value) >= $Length)
      return($Value);
   else {
      $ReturnValue = $Value;
      while(strlen($ReturnValue) < $Length)
         if ($Direction == "r")
            $ReturnValue = $PadCharacter.$ReturnValue;
         else
            $ReturnValue .= $PadCharacter;
      return($ReturnValue);
   }
}


/***************************************************************/
/* Function    : Format the timer display.                     */
/* Created by  : Kan on 28th Nov, 2003                         */
/***************************************************************/
function FormatTimer($Lang, $Second) {
   $Second = TestTime - $Second;
   if ($Second <= 0) {
      //echo "<script language=\"JavaScript\">location.replace(\"index.php\");</script>";
      $BeginTime = null;
      return("00:00");
   } else
      if ($Lang == "zh")
         return(myPadding((string)(integer)($Second / 60), "0", 2, "r")." ¤ÀÄÁ ".
                myPadding((string)($Second % 60), "0", 2, "r"))." ¬í";
      else
         return(myPadding((string)(integer)($Second / 60), "0", 2, "r")." min ".
                myPadding((string)($Second % 60), "0", 2, "r"))." sec";
}
?>