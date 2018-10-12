<!--<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr> 
    <td height="50" align="right" valign="middle" style="background: #000000;"><table border="0" cellspacing="0" cellpadding="0">
      <tr> 
        <td width="10%" class="style3"><a name="top" id="top"></a></td>
        <td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/meg_logo.png" alt="gc_logo" width="87" height="50" border="0" /></a></div></td>
		--><!--td width="150" class="style3"><div align="center"><a href="http://hksm.com.hk/" title="前往官方網站" target="_top"><img src="img/hksm_logo.png" alt="gc_logo" width="78" height="50" border="0" /></a></div></td>
		<td width="150" class="style3"><div align="center"><a href="http://freewaydriving.com.hk/catalog/index.php" title="前往官方網站" target="_top"><img src="img/freeway_logo.png" alt="gc_logo" width="72" height="50" border="0" /></a></div></td>
		<td width="150" class="style3"><div align="center"><a href="http://a1driving.com.hk/" title="前往官方網站" target="_top"><img src="img/A1_logo.png" alt="gc_logo" width="150" height="50" border="0" /></a></div></td-->
    <!--  </tr>
    </table></td> 

  </tr>
</table>
-->

<div align="center">
  <table width="1008" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><?php echo $event['banner'];?></td>
    </tr>
    <tr>
      <td height="6"></td>
    </tr>
    <tr>
      <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" id="navMain">
        <tr>
          <td width="200" height="40" style="background:url(img/b01.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b02a.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b03.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b04.png) top center no-repeat;"></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td height="13" style="background:url(img/ibg_top.png) top center no-repeat;"></td>
    </tr>
    <tr>
      <td align="center" valign="top" style="background:url(img/ibg.png) top center repeat-y;">
	   <table  width="896" border="0" cellspacing="0" cellpadding="0">
          <tr>
            <td height="8"></td>
          </tr>
          <tr>
            <td><table style="padding: 20px 0 20px 0;" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
                <td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">請確認您所選擇的課程內容：</td>
                <td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td align="left" valign="top">
                
                <table class="result-table"  border="0" cellspacing="0" cellpadding="0" width="100%">
              <tr>
                <td  align="left" valign="middle" class="bold first">所選課程：</td>
                <td  align="left" valign="middle" class="txt01"><?php echo $info['course']['name'];?></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="bold">價錢：</td>
                  
                  <?php
                  $price = $info['course']['price'];
                  
                  
                  $price  =  $info['join_megclub'] ? $price  -MEGCLUB_DISCOUNT:  $price;
                  
				  
				  $price  =  $price - $info['coupon_discount'];
                  
//				  echo $info['coupon_discount'];
//				  echo 789;
				  //$data['info']['coupon_discount']
				  
				  
                  $info['course']['price']=    $price ; 

             /*    if( $info['join_megclub'])
                  { 
                     $price -=MEGCLUB_DISCOUNT;
                  }*/
               
                  ?>
                <td align="left" valign="middle" class="txt01">HK $<?php 
                    
                
                    $this->load->library("session");

                    $addition_str='';
				    
					if( $info['join_megclub'])
					{
			            $this->session->set_userdata("MEGCLUB_DISCOUNT",'1');
						$addition_str.=' (已扣除MEG Club 提供的會員折扣優惠$200)';
					}
					else
					{
				        $this->session->set_userdata('MEGCLUB_DISCOUNT', '0');
					}
			//		echo 99999;
	//				print_r($info);
	//				echo $info['coupon_discount'];
					if( $info['coupon_code'])//code
					{
						//: 已使用優惠代碼XXX扣除$200
//					    $this->session->set_userdata("USE_COUPON_DISCOUNT",$info['coupon_discount']);
						
//						$used_coupon_input_code =  $this->session->userdata("USED_COUPON_INPUT_CODE");

						
						$addition_str.=' (已使用優惠代碼'.$info['coupon_code'].'扣除$'.$info['coupon_discount'].')';
					}
/*					else
					{
		//				$this->session->set_userdata("USE_COUPON_DISCOUNT",'0');
					}
*/					
					
					echo $price . $addition_str;
					
                    /* if( $info['join_megclub'])
                    { 
                        echo $price . ' (已扣除MEG Club 提供的會員折扣優惠$200)';
                         $this->session->set_userdata("MEGCLUB_DISCOUNT",'1');

                          
                     }
                    else{ 
                        echo $price ;
                        
                          $this->session->set_userdata('MEGCLUB_DISCOUNT', '0');

                    }*/

                
                    
                    
                    
    //               echo $this->meg_club_discount;

                    
                    ;?></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="26" valign="middle" class="it remark">* 備註：<?php echo $info['course']['remark'];?></td>
          </tr>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td><table style="padding: 20px 0 20px 0;" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
                <td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">請確認您所填寫的個人資料：</td>
                <td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
                </tr>
              </table></td>
          </tr>
          <tr>
            <td class="it"><table border="0" cellspacing="0" cellpadding="0" class="confirm result-table">
			
                 <tr>
                <td  align="left" valign="middle" class="bold">稱謂 ：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $this->gender[$info['student_gender']]['name'];?></td>
                </tr>
                
                <?php if($event['show_staff']){?>
              <tr>
                <td width="70" align="left" valign="middle" class="bold first">員工編號：</td>
                <td width="300" align="left" valign="middle" class="txt01"><?php echo $info['staff_code'];?></td>
                </tr>
              <tr>
                <td align="left" valign="middle" class="bold">員工姓名：</td>
                <td align="left" valign="middle" class="txt01"><?php echo strtoupper($info['staff_name']);?></td>
                </tr>
                       <tr>
                <td align="left" valign="middle" class="bold">學員姓名：</td>
                <td align="left" valign="middle" class="txt01"><?php echo strtoupper($info['student_name']);?></td>
                </tr>
                
			 <?php }
                else
                {
                    ?>
                
              <tr>
                <td align="left" valign="middle" class="bold first">學員姓名：</td>
                <td align="left" valign="middle" class="txt01"><?php echo strtoupper($info['student_name']);?></td>
                </tr>
                
                <?php
                }
                
                ?>
              <tr>
             
              <tr style="display: none;">
                <td align="left" valign="middle" class="bold">出生日期：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_birthday'];?></td>
                </tr>
              <tr style="display: none;">
                <td align="left" valign="middle" class="bold">身份證：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_id'];?></td>
                </tr>
              <tr>
                <td align="left" valign="middle" class="bold">聯絡電話：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_tel'];?></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="bold">電郵地址：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_email'];?></td>
                </tr>
<!--              <tr>
                <td align="left" valign="middle" class="bold">郵寄地址：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['student_address'];?></td>
                </tr>-->
                
                
                <?php
                $shop = explode("|", $info['shop']);
                $shop = $shop[0];
                ?>
              <tr>
                <td align="left" valign="middle" class="bold">選擇跟進網上報名服務地點：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $shop; ?></td>
                </tr>
                
				<tr>
                <td align="left" valign="middle" class="bold">聯絡時間：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $this->contact_timeslot[$info['contact_timeslot']];?></td>
                </tr>
				
				<?php
				if($info['retake_part'])
				{
				?>
              <tr>
                <td align="left" valign="middle" class="bold">重考部份：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $this->retake_part[$info['retake_part']];?></td>
                </tr>
                <?php
				}
				?>
              <!--  <?php
            //     if  ($event['ask_reg_enquiry'])
            //     {
                ?>
            
              <tr>
                <td align="left" valign="middle" class="bold">登記查詢：</td>
                <td align="left" valign="middle" class="txt01"><?php //echo $this->need[$info['reg_enquiry']];?></td>
                </tr>
                <?
            //     }
                ?>-->
                
                
                <tr>
                <td align="left" valign="middle" class="bold">備註：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $info['remark'];?></td>
                </tr>
                
                
            </table></td>
          </tr>
          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td class="it"><table border="0" cellspacing="0" cellpadding="0" class="confirm">
              <tr>
                <td valign="top" class="tnc-title"><br/>條款及細則：</td>
              </tr>
              <tr>
                <td><label for="textfield"></label>
                  <textarea name="textfield" readonly class="textbox02 txt01" id="textfield"><?php echo $event['policy'];?></textarea></td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="26" align="center" valign="middle"><table class="choose-table" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td><input type="checkbox" name="agreement" id="agreement" />
                  <label for="checkbox"></label></td>
                <td class="agree-statement">本人已閱讀，並同意所有以上列出之課程相關條款及細則</td>
              </tr>
            </table></td>
          </tr>
          <tr>
            <td height="26" align="center" valign="middle"><table class="choose-table" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td>
				<form id="form1" name="form1" method="post" action="<?php echo site_url('app/save/'.$event['code']);?>">
				<input type="checkbox" name="allow_promo" id="allow_promo" value="1" />
				</form>
                  <label for="checkbox"></label></td>
                <td class="agree-statement"> 本人同意接收由 A1Driving 發出的任何最新優惠資訊 </td>
              </tr>
            </table></td>
          </tr>

          <tr>
            <td><hr /></td>
          </tr>
          <tr>
            <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td class="rbtn01"><a href="<?php echo site_url('app/index/'.$event['code']);?>?a=1" title="修改資料">《 修改資料</a></td>
                <td width="10"></td>
                <td class="rbtn01"><a href="#" onClick="javascript:if(document.getElementById('agreement').checked){document.getElementById('form1').submit()}else{alert('必須同意條款')};return false;"  title="下一步">下一步 》</a></td>
              </tr>
            </table></td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td height="13" style="background:url(img/ibg_bottom.png) top center no-repeat;"></td>
    </tr>
    <tr>
      <td height="50"></td>
    </tr>
  </table>
</div>

<style type="text/css">
    .thx-statement{
        font-size: 36px;
    font-weight: bold;
    }
    
    .table-title{
        font-size: 22px; font-weight: bold;
    }
    
    .result-table{
        line-height: 25px;
            border-top: 1px #d3d3d3  solid;
        width: 100%;
        margin: 10px auto 30px auto;

    }
    
    .result-table td{
            padding: 10px;
    border-left: 1px #d3d3d3  solid;
    border-bottom: 1px #d3d3d3  solid;
    border-right: 1px #d3d3d3  solid;
        
    }
    
    .confirm.result-table {
		margin: 10px 0 0 0;
/*        border-right: 1px #000000 solid;
*/
    }
    
    .footer-statement {
    font-weight: bold;
    font-size: 16px;
    line-height: 26px;
    margin: 40px 0 40px 0;
}
    
    .result-table td.bold{
       font-weight: bold;
    background: #144080;
    color: #ffffff;
    border-right: none;
    /* font-size: 20px; */
    width: 120px;
    }
    
    .result-table td.bold.first{
/*        border-top: 1px #d3d3d3 solid;
*/    }
    
    .result-table td.no-border{
        border-right: none;
                border-left: none;
                border-top: none;
        

        padding: 0 0 10px 0;
        text-align: center;
    }
    
    .remark{
        text-align: center;
    }
    
    .textbox02{
        margin: 0 0  40px 0 ;
    }
    .confirm{
        
        width: 100%;
        margin: 0 auto;
    }
    
    .tnc-title{
        text-align: left;font-size: 18px;padding: 0 0 10px 0;
    }
	.iframe-nav{
		display: none;
	}
	
	
    </style>

<script type="text/javascript">
	window.location.hash='s';

	</script>
