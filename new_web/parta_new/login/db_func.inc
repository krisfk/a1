<?php
/**********************************************************
 Function  : open connection to MySQL - member
 Parameter : $host     - the database host
             $user     - the logon user
             $password - the user password
 Return    : an active connection or error msg
**********************************************************/
function openConn($host, $user, $password, $db)
{
   $hksm_conn = mysql_connect($host, $user, $password)
      or die("Error occur: Cannot connect to MySQL server.");
   $hksm_db = mysql_select_db($db, $hksm_conn)
      or die("Error occur: Cannot open Database - member.");
   
   return $hksm_conn;
}   

/**********************************************************
 Function  : Close the active connection to MysQL
 Parameter : $conn - the active connection
 Return    : void
**********************************************************/
function closeConn($conn)
{
   mysql_close($conn);
}

/**********************************************************
 Function  : Execute the sql statement
 Parameter : $sql - the input sql statement
 Return    : the result set
**********************************************************/
function execSQL($sql)
{
   $result = mysql_query($sql)
      or die("Error occur: Cannot execute SQL statement.");
   return $result;
}

/**********************************************************
 Function  : change string to sql valid format
 Parameter : $str - the input string
 Return    : formatted string
**********************************************************/
function sqlString($str)
{
   if (strlen($str) <= 0 || $str == null)
      $str = "''";
   else
   {
      if (left($str, 1) != "'") $str = "'".$str;
      if (right($str, 1) != "'") $str .= "'";
   }
   return $str;
}
?>