<?php
session_start();
include "../../includes/php_func.php";

/********************************************************************
 Function  : generate different list from the array in session
 Parameter : $aryData       - the list data source
             $sesparam_name - the registered session variable name
             $name          - the select box name
             $listnum       - the list number
             $default       - the default value of the list
             $indent        - the indent
 Return    : a string stored the html tag of list
********************************************************************/
function genList($aryData, $sesparam_name, $name, $listnum, $default, $indent, $onChange = "")
{
   if (session_is_registered($sesparam_name))
   {
      if (is_array($aryData))
      {
         $lst = space($indent)."<select name=\"".$name."\" class=\"selflat\"";
         if (strlen($onChange) > 0) $lst .= " onChange=\"".$onChange."\"";
         $lst .= ">\n";
         while (list($key, $value) = each($aryData[$listnum]))
         {
            $lst .= space($indent + 2)."<option value=\"".$key."\"";
            if ($default == $key)
               $lst .= " selected";
            $lst .= ">".$value."</option>\n";
         }
         $lst .= space($indent)."</select>\n";
         return $lst;
      }
      else
         die("Error occur: cannot retrieve data array from session!");
   }
   else
      die("Error occur: cannot establish session!");
}

/********************************************************************
 Function  : generate different list from the array in session
 Parameter : $table   - the database table name
             $default - the default value of the list
             $lang    - the language for the list
             $indent  - the indent
 Return    : a string stored the html tag of list
********************************************************************/
function myGenList($table, $default, $lang, $indent)
{
   $conn = openConn(localhost, student, student_pwd, "member");
   $strSQL = "select ID, DESCRIPTION_".strtoupper($lang)." from ".strtoupper($table)." where ACTIVE = 1;";
   $result = execSQL($strSQL);
   $boxname = strtolower(substr($table, 3));
   $box = space($indent)."<select name=\"sel".$boxname."\">\n";
   while ($data = mysql_fetch_row($result))
   {
      $box .= space($indent + 2)."<option value=\"".$data[0]."\"";
      if ($data[0] == (integer)($default)) $box .= " selected";
      $box .= ">".$data[1]."</option>\n";
   }
   $box .= space(indent)."</select>\n";
   closeConn($conn);
   return $box;
}

/********************************************************************
 Function  : generate different list from the array in session
 Parameter : $aryData       - the list data source
             $sesparam_name - the registered session variable name
             $name          - the select box name
             $listnum       - the list number
             $default       - the default value of the list
             $indent        - the indent
 Return    : a string stored the html tag of list
********************************************************************/
function genCheck($aryData, $sesparam_name, $name, $listnum, $default, $indent)
{
   if (session_is_registered($sesparam_name))
   {
      if (is_array($aryData))
      {
         $lst = space($indent)."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"95%\">\n";
         $i = 0;
         while (list($key, $value) = each($aryData[$listnum]))
         {
            if ($key > 0)
            {
               if ($i % 4 == 0) $lst = $lst.space($indent + 2)."<tr>\n";
               $lst = $lst.space($indent + 4)."<td colspan=\"8\" class=\"reg_normal\" width=\"3%\">\n";
               $lst = $lst.space($indent + 6)."<input type=\"checkbox\" name=\"".$name."[]\"";
               $found = false;
               if (is_array($default))
               {
                  reset($default);
                  while ((list(, $value2) = each($default)) && !$found)
                     if ((integer)$value2 == (integer)$key)
                     {
                        $lst .= " checked";
                        $found = true;
                     }
               }
               else
                  if (havedata($default))
                     if (strstr($default, $key))
                        $lst .= " checked";
               $lst = $lst." value=\"".$key."\">\n";
               $lst = $lst.space($indent + 4)."</td>\n";
               $lst = $lst.space($indent + 4)."<td colspan=\"8\" class=\"reg_normal\" width=\"22%\">\n";
               $lst = $lst.space($indent + 6).$value."\n";
               $lst = $lst.space($indent + 4)."</td>\n";
               if ($i % 4 == 3) $lst = $lst.space($indent + 2)."<tr>\n";
               $i++;
            }
         }
         $lst = $lst.space($indent)."</table>\n";
         return $lst;
      }
      else
         die("Error occur: cannot retrieve data array from session!");
   }
   else
      die("Error occur: cannot establish session!");
}

/****************************************************************
 Function  : generate different list from the array in session
 Parameter : $table   - the database table name
             $default - the default value of the list
             $lang    - language of the list
             $indent  - the indent
 Return    : a string stored the html tag of list
****************************************************************/
function myGenCheck($table, $default = "", $lang, $indent)
{
   $conn = openConn(localhost, student, student_pwd, "member");
   $strSQL = "select ID, DESCRIPTION_".strtoupper($lang)." from ".strtoupper($table)." where ACTIVE = 1;";
   $result = execSQL($strSQL);
   $boxname = strtolower(substr($table, 3));
   $lst = space($indent)."<table border=\"0\" cellpadding=\"3\" cellspacing=\"0\" width=\"95%\">\n";
   $i = 0;

   while ($data = mysql_fetch_row($result))
      if ((integer)$data[0] > 0)
      {
         if ($i % 4 == 0) $lst = $lst.space($indent + 2)."<tr>\n";
         $lst = $lst.space($indent + 4)."<td colspan=\"8\" class=\"reg_normal\" width=\"3%\">\n";
         $lst = $lst.space($indent + 6)."<input type=\"checkbox\" name=\"chk".$boxname."[]\"";
         if (strstr($default, $data[0]))
            $lst .= " checked";
         $lst = $lst." value=\"".$data[0]."\">\n";
         $lst = $lst.space($indent + 4)."</td>\n";
         $lst = $lst.space($indent + 4)."<td colspan=\"8\" class=\"reg_normal\" width=\"22%\">\n";
         $lst = $lst.space($indent + 6).$data[1]."\n";
         $lst = $lst.space($indent + 4)."</td>\n";
         if ($i % 4 == 3) $lst = $lst.space($indent + 2)."<tr>\n";
         $i++;
      }
   $lst = $lst.space($indent)."</table>\n";
   return $lst;
}

/**********************************************************
 Function  : generate the date list
 Parameter : $name     - the select box name
             $default  - the default value of the list
             $indent   - the indent
             $lang     - the language of the list
 Return    : a string stored the html tag of list
**********************************************************/
function genDate($name, $default, $indent, $lang = "zh")
{
   $aryDateHead = array("zh" => "日 期", 
                       "en" => "Day");
   $tbl = space($indent)."<select name=\"".$name."\">\n";
   $tbl .= space($indent + 2)."<option value=\"0\"";
   if ($default == 0) $tbl .= " selected";
   $tbl .= ">".$aryDateHead[$lang]."\n";
   $total_date = 31;
   for ($i = 1; $i <= $total_date; $i++)
   {
      $tbl .= space($indent + 2)."<option value=\"".$i."\"";
      if ($default == $i) $tbl .= " selected";
      $tbl .= ">".$i."</option>\n";
   }
   $tbl .= space($indent)."</select>\n";
   return $tbl;
}

/**********************************************************
 Function  : generate the month list
 Parameter : $name     - the select box name
             $default  - the default value of the list
             $indent   - the indent
             $lang     - the language of the list
 Return    : a string stored the html tag of list
**********************************************************/
function genMonth($name, $default, $indent, $lang = "zh")
{
   $aryDateHead = array("zh" => "月 份",
                        "en" => "Month");
   $tbl = space($indent)."<select name=\"".$name."\">\n";
   $tbl .= space($indent + 2)."<option value=\"0\"";
   if ($default == 0) $tbl .= " selected";
   $tbl .= ">".$aryDateHead[$lang]."\n";
   $total_mth = 12;
   for ($i = 1; $i <= $total_mth; $i++)
   {
      $tbl .= space($indent + 2)."<option value=\"".$i."\"";
      if ($default == $i) $tbl .= " selected";
      $tbl .= ">".$i."</option>\n";
   }
   $tbl .= space($indent)."</select>\n";
   return $tbl;
}

/********************************************************************
 Function  : generate the TD tag
 Parameter : $snum    - the space number           (required)
             $colspan - the column span of td      (default 1)
             $class   - class of the td            (default empty)
             $style   - the user defined style     (default empty)
             $width   - width of the td            (default empty)
             $valign  - vertical alignment of td   (default top)
             $align   - horizontal alignment of td (default left)
 Return    : a string of the TD tag
********************************************************************/
function td($snum, $colspan = 1, $class = "", $style = "", $width = "", $valign = "top", $align = "left")
{
   $td = space($snum)."<td colspan=\"".$colspan."\"";
   if (havedata($class)) $td .= " class=\"".$class."\"";
   if (havedata($style)) $td .= " style=\"".$style."\"";
   if (havedata($width)) $td .= " width=\"".$width."\"";
   if (havedata($valign)) $td .= " valign=\"".$valign."\"";
   if (havedata($align)) $td .= " align=\"".$align."\"";
   $td .= ">\n";
   return $td;
}

/**********************************************************
 Function  : generate the TR tag
 Parameter : $snum - the space number
 Return    : a string of the TR tag
**********************************************************/
function tr($snum)
{
   return space($snum)."<tr>\n";
}

/**********************************************************
 Function  : generate the /TD tag
 Parameter : $snum - the space number
 Return    : a string of the /TD tag
**********************************************************/
function etd($snum)
{
   return space($snum)."</td>\n";
}

/**********************************************************
 Function  : generate the /TR tag
 Parameter : $snum - the space number
 Return    : a string of the /TR tag
**********************************************************/
function etr($snum)
{
   return space($snum)."</tr>\n";
}

/**********************************************************
 Function  : return the Occupation description
 Parameter : $table - the database table
             $id    - the description identifier
             $lang  - language of the description
 Return    : the description
**********************************************************/
function getValue($table, $id, $lang)
{
   $conn = openConn(localhost, student, student_pwd, "member");
   $rtn = "";

   if (havedata($id) && $id != "0" && $id != 0)
   {
      if (!is_array($id))
         $strSQL = "select DESCRIPTION_".strtoupper($lang)." from ".strtoupper($table)." where ACTIVE = 1 and ID = ".$id.";";
      else
      {
         reset($id);
         $strSQL = "select DESCRIPTION_".strtoupper($lang)." from ".strtoupper($table)." where ACTIVE = 1 and ID in (";
         while (list(, $value) = each($id))
            $strSQL .= $value.",";
         $strSQL = left($strSQL, strlen($strSQL) - 1);
         $strSQL .= ");";
      }

      $result = execSQL($strSQL);
   
      if (!is_array($id))
      {
         if ($data = mysql_fetch_row($result))
            $rtn = $data[0];
      }
      else
      {
         while ($data = mysql_fetch_row($result))
            $rtn .= $data[0].", ";
         $rtn = left($rtn, strlen($rtn) - 2);
      }
      
      closeConn($conn);
   }
   else
      $rtn = "N/A";
   return $rtn;
}

/********************************************************************
 Function  : check the format of UserName
 Parameter : $p_UserName - the user name
 Return    : true if the format is valid, or false will be returned
********************************************************************/
function isUserName($p_UserName)
{
   if (strlen($p_UserName) < 8 || strlen($p_UserName) > 16)
      $rtn = false;
   else
   {
      $vStr = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_";
      $rtn = true;
      for ($i = 0; $i < strlen($p_UserName); $i++)
      /*{
         $tmp1 = ord(substr($p_UserName, $i, 1));
         if ($tmp1 <= 127)*/
            if (!strstr($vStr, substr($p_UserName, $i, 1)))
            {
               $i = strlen($p_UserName);
               $rtn = false;
            }
      /*}*/
   }
   return $rtn;
}
?>