<?php

//$this->load->library("session");

//echo $this->session->userdata("MEGCLUB_DISCOUNT");
/*
        if ($this->session->userdata("MEGCLUB_DISCOUNT")=='1')
        {
                        $price -= MEGCLUB_DISCOUNT;
        }*/
//echo $data['price'];
?>
<!--
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td height="50" align="right" valign="middle" style="background: #000000;"><table border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="10%" class="style3"><a name="top" id="top"></a></td>
        <td width="150" class="style3"><div align="center"><a href="http://meg.com.hk/" title="前往官方網站" target="_top"><img src="img/meg_logo.png" alt="gc_logo" width="87" height="50" border="0" /></a></div></td>
		--><!--td width="150" class="style3"><div align="center"><a href="http://hksm.com.hk/" title="前往官方網站" target="_top"><img src="img/hksm_logo.png" alt="gc_logo" width="78" height="50" border="0" /></a></div></td>
		<td width="150" class="style3"><div align="center"><a href="http://freewaydriving.com.hk/catalog/index.php" title="前往官方網站" target="_top"><img src="img/freeway_logo.png" alt="gc_logo" width="72" height="50" border="0" /></a></div></td>
		<td width="150" class="style3"><div align="center"><a href="http://a1driving.com.hk/" title="前往官方網站" target="_top"><img src="img/A1_logo.png" alt="gc_logo" width="150" height="50" border="0" /></a></div></td-->
  <!--    </tr>
    </table></td>

  </tr>
</table>-->


<div align="center">
  <table width="1008" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td height="10"></td>
    </tr>
    <tr>
      <td><?php echo $banner;?></td>
    </tr>
    <tr>
      <td height="6"></td>
    </tr>
    <tr>
      <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0" id="navMain">
        <tr>
          <td width="200" height="40" style="background:url(img/b01.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b02.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b03.png) top center no-repeat;"></td>
          <td width="32" style="background:url(img/b_d.png) top center no-repeat;"></td>
          <td width="200" height="40" style="background:url(img/b04a.png) top center no-repeat;"></td>
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
      <td align="center" valign="top" style="background:url(img/ibg.png) top center repeat-y;"><table width="896" border="0" cellspacing="0" cellpadding="0">
        <tr>
          <td height="8"></td>
        </tr>
        <tr>
          <td><table border="0" cellspacing="0" cellpadding="0"  style="margin: 0 auto;width: 95%; display: none;">
            <tr>
              <td width="11" height="31" style="background:url(img/itbg_left.png) top center no-repeat;"></td>
              <td width="874" align="left" valign="middle" class="ibgt" style="background:url(img/itbg.png) top left repeat-x;">交易狀況</td>
              <td width="11" style="background:url(img/itbg_right.png) top center no-repeat;"></td>
            </tr>
          </table></td>
        </tr>
		
		<?php if($pay_status==PAY_STATUS_PAID){?>
        <tr>
          <td class="it"><p>&nbsp; </p>
            <p align="center" class="thx-statement">交易完成！<br/>感謝您的選購。</p>
            <p align="center">&nbsp; </p>
			<table align="center" border="0" cellspacing="0" cellpadding="0" class="result-table">
				
                <tr>
                    <td colspan="2" class="table-title no-border">- 交易資料 -</td>

                </tr>
                
                <tr>
				  <td class="bold">交易編號：</td>
				  <td><?php echo $pay_reference?></td>
				</tr>
				<tr>
				  <td class="bold">所選課程：</td>
				  <td><?php echo $c_name?></td>
				</tr>
				<tr>
				  <td class="bold">數量：</td>
				  <td>1</td>
				</tr>
				<tr>
				  <td class="bold">價錢：</td>
				  <td><?php echo '$'.$price?><?php echo $megclub_discount =='1' ? ' (已扣除MEG Club 提供的會員折扣優惠$200)':'';?></td>
				</tr>
                <tr>
                    <td colspan="2"  class="table-title no-border"><br/>- 個人資料 -</td>

                </tr>
                
                
                
                <tr>
                <td align="left" valign="middle" class="bold">稱謂：</td>
                <td align="left" valign="middle" ><?php echo $this->gender[$student_gender]['name'];?></td>
                </tr>
                
                <?php
                if ($staff_code)
                {
                ?>
                <tr>
                <td align="left" valign="middle" class="bold">員工編號：</td>
                <td align="left" valign="middle" ><?php echo $staff_code?></td>
                </tr>
                <tr>
                <td align="left" valign="middle" class="bold">員工姓名：</td>
                <td align="left" valign="middle" ><?php echo $staff_name?></td>
                </tr>
                <?php
                }
                ?>
                <tr>
                <td align="left" valign="middle" class="bold">學員姓名：</td>
                <td align="left" valign="middle" ><?php echo $student_name?></td>
                </tr>
              <tr>
              </tr>
             <!-- <tr>
                <td align="left" valign="middle" class="bold">出生日期：</td>
                <td align="left" valign="middle" >1900-1-1</td>
                </tr>-->
             <!-- <tr>
                <td align="left" valign="middle" class="bold">身份證：</td>
                <td align="left" valign="middle" >3333</td>
                </tr>--> 
              <tr>
                <td align="left" valign="middle" class="bold">聯絡電話：</td>
                <td align="left" valign="middle" ><?php echo $student_tel;?></td>
              </tr>
              <tr>
                <td align="left" valign="middle" class="bold">電郵地址：</td>
                <td align="left" valign="middle" ><?php echo $student_email;?></td>
                </tr>
           <!--   <tr>
                <td align="left" valign="middle" class="bold">郵寄地址：</td>
                <td align="left" valign="middle" ><?php echo $student_address;?></td>
                </tr>-->
                    <tr>
                <td align="left" valign="middle" class="bold">選擇跟進網上報名服務地點：</td>
                        <?php
                                $shop = explode("|", $shop);
                                $shop = $shop[0];
                        ?>
                <td align="left" valign="middle" class="txt01"><? echo $shop;?></td>
                </tr>
                
              <tr>
                <td align="left" valign="middle" class="bold">聯絡時間：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $contact_timeslot;?></td>
                </tr>
                
              <!--         <?php
                // if  ($ask_reg_enquiry)
                // {
                ?>
            
              <tr>
                <td align="left" valign="middle" class="bold">登記查詢：</td>
                <td align="left" valign="middle" class="txt01"><?php // echo $this->need[$reg_enquiry]; ?></td>
                </tr>
                <?
          //       }
                ?>-->
                
                
                
                   <tr>
                <td align="left" valign="middle" class="bold">備註：</td>
                <td align="left" valign="middle" class="txt01"><?php echo $apply_remark;?></td>
                </tr>
                
                
                
			</table>
              

              
              
              
              
              
			 <p align="center">&nbsp; </p>
            <p align="center" class="footer-statement">我們將有專人於兩個工作天內聯絡您核對個人資料及完成報名手續。<br/>
<b>*閣下無需於收到我們的電話前致電或親身前往報名中心或安全駕駛中心辦理手續。</b></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
        </tr>
		<?php } else {?>
		<tr>
          <td class="it"><p>&nbsp; </p>
            <p align="center">交易尚未完成</p>
            <p align="center">&nbsp; </p>
			<table align="center" border="0" cellspacing="0" cellpadding="0">
				<tr>
				  <td>所選課程：</td>
				  <td><?php echo $c_name?></td>
				</tr>
				<tr>
				  <td>數量：</td>
				  <td>1</td>
				</tr>
				<tr>
				  <td>價錢：</td>
				  <td><?php echo '$'.$price?></td>
				</tr>
			</table>
			 <p align="center">&nbsp; </p>
            <p align="center"><a href="<?php echo site_url('app/payment/'.$id);?>" >前往付款</a></p>
            <p>&nbsp;</p>
            <p>&nbsp;</p></td>
        </tr>
		<?php }?>
        <tr>
          <td><hr /></td>
        </tr>
        <tr>
          <td align="center" valign="top"><table border="0" cellspacing="0" cellpadding="0">
            <tr>
			<?php if($pay_status==PAY_STATUS_PAID){?>
              <td class="rbtn02"><a href="<?php echo COMPLETE_REDIRECT;?>" title="完成報名">完成報名</a></td>
              <td width="10"></td>
			<?php }?>
              <td class="rbtn01"><a href="#" onClick="javascript:window.print();return false;" title="列印本頁">列印本頁</a></td>
              </tr>
            </table></td>
        </tr>
      </table></td>
    </tr>
    <tr>
      <td height="13" style="background:url(img/ibg_bottom.png) top center no-repeat;"></td>
    </tr>
    <tr>
      <td height="50"></td>
    </tr>
  </table>
</div>

<script type="text/javascript">
	window.location.hash='s';

	</script>

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
        width: 95%;
    }
    
    .result-table td{
            padding: 10px;
    border-left: 1px #d3d3d3  solid;
    border-bottom: 1px #d3d3d3  solid;
    border-right: 1px #d3d3d3  solid;
        
    }
    
	.iframe-nav{
		display: none;
	}
	
    .result-table {
/*        border-right: 1px #000000 solid;
*/
    }
    
    .footer-statement {
    font-weight: bold;
    font-size: 16px;
    line-height: 26px;
    margin: 40px 0 40px 0;
}
    
    .bold{
  
	    font-weight: bold;
    background: #144080;
    color: #ffffff;
    border-right: none;
    /* font-size: 20px; */
    width: 120px;
		
	}
    
    .result-table td.no-border{
        border-right: none;
                border-left: none;
                border-top: none;
        

        padding: 0 0 10px 0;
        text-align: center;
    }
    
    .thx-statement br{
        display: none;
    }
    
    @media all and (max-width:500px){
    .thx-statement br{
        display: block;
    }
    
    }
	
	 @media print
   {
	   .contact-us-banner,.menu-blk,.header,.iframe-nav,.enrollment-style img,.bottom-blk,.breadcrumb,.section .middle .section-title{
		   display: none;
	   }
	
	   .thx-statement{
		   margin: 0 0 40px 0;
	   }
	   .section{
		   margin: 0;
	   }
	}
	
    </style>
