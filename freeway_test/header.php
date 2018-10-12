<!--
**********************************************************************      
      All rights reserved by A1 Driving School Ltd.
**********************************************************************
-->

<?php

   function updateAnswer(){
	   $html = "";	  
	   
	  $rs  ="update writtentest_member_details";
	  $rs .=" set f_answer='" . $_POST['txtAnswer'];
	  $rs .="', f_testdate='" . date("Ymd G:i:s");
	  $rs .="' where f_paper_id='A1-" . str_pad($_POST['txtGrpNo'],7,'0',STR_PAD_LEFT);
	  $rs .="' and f_seq=" .$_POST['txtQuestionID'];
	  
	  //echo $rs.'<br>';
	  
	  $cn = openConn();
	  openQuery($rs, $cn, 0);	
	  	   					                    
      return($html);	    
   }   
   
   function genControlButton($ButtonLabel, $JavaScript, $Height, $Width, $Disabled) {
      if ($Disabled)
         $html = "<table border=0 cellpadding=3 cellspacing=0 width=\"".$Width."\" height=\"".$Height."\" style=".
                 "\"background-color:#F8FFF7;border:1px solid #F8FFF7;font-weight:bold;text-align:center;vertical-align:".
                 "middle\"><tr><td id=\"".$ButtonLabel."\">&nbsp;</td></tr></table>";
      else
         $html = "<table border=0 cellpadding=3 cellspacing=0 width=\"".$Width."\" height=\"".$Height."\" style=".
                 "\"background-color:#7CFC00;border:1px solid black;font-weight:bold;text-align:center;vertical-align:".
                 "middle\"><tr><td id=\"".$ButtonLabel."\" onMouseOver=\"mOverControl(this);\" onMouseOut=\"".
                 "mOutControl(this);\" onClick=\"".$JavaScript.";\">".$ButtonLabel."</td></tr></table>";
 					                    
      return($html);
   }

   function genCoverButton($ButtonLabel, $JavaScript, $Height, $Width) {
	   // for Begin Test Button
      $html = "<table border=0 cellpadding=3 cellspacing=0 width=\"".$Width."\" height=\"".$Height."\" style=".
              "\"background-color:white;border:1px solid black;font-weight:bold;text-align:center;vertical-align:".
              "middle;\"><tr><td id=\"".$ButtonLabel."\" onMouseOver=\"mOverControl(this);\" onMouseOut=\"".
              "mOutControl(this);\" onClick=\"".$JavaScript.";\" style=\"font-size:20px;font-family:Arial;\">".
              $ButtonLabel."</td></tr></table>";
      return($html);
   }
?>

<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=big5">
<title></title>
<link rel="stylesheet" href="stylesheet.css" type="text/css">
<style type="text/css">
   a {font-family:Arial;font-size:12px;text-decoration:none;color:black;}
<?php
   if ($HTTP_GET_VARS["lang"] == "en")
      echo "   td {font-family:Arial;}";
   else
      echo "   td {font-family:·s²Ó©úÅé;}";
?>
</style>
<script language="JavaScript">
   var cGreen = "#A3F994";
   var cWhite = "white";
   var cGrey = "#CCCCCC";
   var cOrange = "#FF6600";
   var cLawngreen = "#7CFC00"

   function clickThis(obj) {
      obj.style.backgroundColor = cGreen;
      //obj.style.backgroundColor = cOrange;
      if (Answer != obj.id) {
         Answer = obj.id;
         if (obj.id != "A") document.all["A"].style.backgroundColor = cWhite;
         if (obj.id != "B") document.all["B"].style.backgroundColor = cWhite;
         if (obj.id != "C") document.all["C"].style.backgroundColor = cWhite;
      }
      selectAnswer(obj);
   }

   function mOverControl(obj) {
      //obj.style.backgroundColor = cGrey;
      obj.style.backgroundColor = cOrange;      
      document.body.style.cursor = "hand";
   }

   function mOutControl(obj) {
      //obj.style.backgroundColor = cWhite;
	  obj.style.backgroundColor = cLawngreen;
      document.body.style.cursor = "default";
   }
</script>
</head>

<!--<body bgcolor="#66a600">-->
<body bgcolor="white">

<table border=0 cellpadding=0 cellspacing=0 width="100%" height="100%"><tr><!--bgcolor="#666699"-->
<!--<td align="center" valign="middle">-->
<td align="left" valign="top">

<table border=0 cellpadding=0 cellspacing=0 width="640" height="400" bgcolor="white" align="left"><!-- bgcolor="#CCCCFF"-->
  <tr>
    <td colspan="2">
      
      <!-- Begin of Content -->
      
