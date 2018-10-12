<?php	

$cn = openConn();
$rs = openQuery($sql, $cn, 1);
$sql= "select f_vid, f_gno, f_qno_start, f_qno_end, f_random_of_qno from control_categories";

$sql_result = mysql_query($sql) or die("Could not select database - $sql");
$num_rows = mysql_num_rows($sql_result);



$tmp_g='';
$tmp_seq='';

$gno21_array='';
$gno21_seq='';
$GrpNo = requestQuerystring("grpno");
   // check the no. of rows (records) after running the query
	
		if ($num_rows == 0){
			echo "Sorry, there is no record found.";
		} //if
	    else {        
			while($rows = mysql_fetch_array($sql_result)){
				if ($rows[4]==0){
					//create an array for Group No.21
					for ($rno=$rows[2]; $rno<=$rows[3]; $rno++){
						$gno21_seq = $gno21_seq + 1;
						$gno21_array[$gno21_seq] = $rno;						
					}				
				} else {					
					$tmp='/';		// clear the temp value					
					
					//Seeds the random number generator with seed
					list($usec, $sec) = explode(" ", microtime());
					srand((int)($usec*10000000));
					
					for ($qno=1; $qno<=$rows[4]; $qno++) {
						$tmp_g = '/' . rand($rows[2],$rows[3]) . '/';	
						if (strpos($tmp, $tmp_g)==true) {			
							//echo 'The number of <b>' . $tmp_g . '</b> is generated. **** ' . $rows[4] . ' -- ';
							$rows[4] = $rows[4] + 1;
							//echo 'XXXXX ' . $rows[4] . ' XXXXX <br><br>';
						} else {
							//echo 'gno:' . $rows[1];
							//echo ' - ';
							//echo 'qno_start:' . $rows[2];
							//echo ' - ';
							//echo 'qno_end:' . $rows[3];
							//echo ' - ';
							//echo 'random_of_qno:' . $rows[4];
							//echo ' - ';
							//echo 'tmp_g: ' . $tmp_g. ' @@@@<br>';		
							$tmp_seq = $tmp_seq + 1;
							$tmp = $tmp . $tmp_g;
							$rs  = "insert into writtentest_member_details values ('";
							$rs .= "A1-" . str_pad($GrpNo,7,"0",STR_PAD_LEFT) . "',";
							$rs .= $tmp_seq . "," ;
							$rs .= substr($tmp_g,1,strlen($tmp_g)-2) . ",";
							$rs .= "''" . ",";
							$rs .= "'" . date("Ymd G:i:s") . "')";
							//echo $rs."<br>";
							$cn = openConn();
							openQuery($rs, $cn, 0);
						}
					}
				}
			} //while
		} //else
		

?>