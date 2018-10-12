<div id="page-wrapper">

	<legend>申請資料</legend>
	
	<table class="table table-striped table-bordered table-hover">
		
      <tr>
			<td>活動編號</td>
			<td><?php
                
      $e_code =  ($join_megclub=='1')  ?$e_code.JOIN_MEGCLUB_SUFFIX :  $e_code ;
                                                     echo $e_code;            
                ?></td>
		</tr>

        
        <tr>
			<td>所選課程</td>
			<td><?php
                
  //              $price = ($join_megclub=='1') ? $price-MEGCLUB_DISCOUNT : $price;
    //            $meg_txt = ($join_megclub=='1') ? ' (已扣除MEG Club 提供的會員折扣優惠$200)' : '';
             

				
				
					$addition_str='';
				    
					if($join_megclub =='1')
					{
			//            $this->session->set_userdata("MEGCLUB_DISCOUNT",'1');
						$price-=MEGCLUB_DISCOUNT;
						$addition_str.=' (已扣除MEG Club 提供的會員折扣優惠$200)';
					}
				
					if($used_coupon!='0')
					{
					 //  	$addition_str.=' (已使用 -$'.$coupon_discount.' 優惠代碼)';
				   	
	//					$this->load->library("session");
						$used_coupon_code = $this->Meg_model->get_coupon_code($used_coupon);
						$coupon_discount = $this->Meg_model->get_coupon_discount($used_coupon);
									$price-=$coupon_discount;

							//$this->session->userdata("USED_COUPON_INPUT_CODE");
						$addition_str.=' (已使用優惠代碼'.$used_coupon_code.'扣除$'.$coupon_discount.')';
					}
											   
				              echo $c_code . ' - ' . $c_name . ' $' . $price.$addition_str;

				
            
                ?></td>
		</tr>
        
        <tr>
			<td>加入MEG Club</td>
			<td><?php echo $join_megclub;?></td>
		</tr>
        
      <!--   <tr>
			<td>登記查詢</td>
			<td><?php echo $reg_enquiry;?></td>
		</tr>-->
        
        
        <tr>
			<td>選擇跟進網上報名服務地點</td>
            <?php
              $shop = explode("|", $shop);
                $shop = $shop[0];
            ?>
            
			<td><?php echo $shop;?></td>
		</tr>
        
        <tr>
			<td>聯絡時間</td>
			<td><?php echo $contact_timeslot;?></td>
		</tr
            
        <tr>
			<td>備註</td>
			<td><?php echo $apply_remark;?></td>
		</tr>
        
        
        
		<tr>
			<td>上課地點</td>
			<td><?php echo $l_name;?></td>
		</tr>
        
		<tr>
			<td>員工編號</td>
			<td><?php echo $staff_code;?></td>
		</tr>
		<tr>
			<td>員工姓名</td>
			<td><?php echo $staff_name;?></td>
		</tr>
		<tr>
			<td>學員姓名</td>
			<td><?php echo $student_name;?></td>
		</tr>
		<tr>
			<td>性別</td>
			<td><?php echo $this->gender[$student_gender]['name'];?></td>
		</tr>
		<tr>
			<td>出生日期</td>
			<td><?php echo $student_birthday;?></td>
		</tr>
		<tr>
			<td>身份證</td>
			<td><?php echo $student_id;?></td>
		</tr>
		<tr>
			<td>聯絡電話</td>
			<td><?php echo $student_tel;?></td>
		</tr>
		<tr>
			<td>電郵地址</td>
			<td><?php echo $student_email;?></td>
		</tr>
		<tr>
			<td>郵寄地址</td>
			<td><?php echo $student_address;?></td>
		</tr>
		<tr>
			<td>同意接收優惠資訊</td>
			<td><?php echo $allow_promo==1 ? 'Yes' : 'No';?></td>
		</tr>
		<tr>
			<td>付款狀態</td>
			<td><?php echo $this->pay_status[$pay_status]['name'];?></td>
		</tr>
		<tr>
			<td>交易編號</td>
			<td><?php echo $pay_reference;?></td>
		</tr>
		<tr>
			<td>付款日期</td>
			<td><?php echo $pay_time;?></td>
		</tr>
		<tr>
			<td>IP</td>
			<td><?php echo $ip;?></td>
		</tr>
		<tr>
			<td>日期</td>
			<td><?php echo $create_time;?></td>
		</tr>
	</table>
</div>