<div>
	<table>
		<tr>
			<td style="width: 120px;">所選課程</td>
            <?php
			/*
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
					
					if( $info['coupon_discount'])
					{
					    $this->session->set_userdata("USE_COUPON_DISCOUNT",$info['coupon_discount']);
						$addition_str.=' (已使用 -$'.$info['coupon_discount'].' 優惠代碼)';
					}
					else
					{
						$this->session->set_userdata("USE_COUPON_DISCOUNT",'0');
					}
					
					
					echo $price . $addition_str;
					
			*/
			$addition_str ='';
			
			if($join_megclub=='1')
			{
				$price-=MEGCLUB_DISCOUNT;
				$addition_str.=' (已扣除MEG Club 提供的會員折扣優惠$200)';
			}
			
			$this->session->set_userdata;
			
			
			if($used_coupon!='0') 
			{
		        $this->load->library("session");
				$coupon_discount = $this->session->userdata("USE_COUPON_DISCOUNT");
				$price-=$coupon_discount;

				
				$used_coupon_input_code =  $this->session->userdata("USED_COUPON_INPUT_CODE");
				$addition_str.=' (已使用優惠代碼'.$used_coupon_input_code.'扣除$'.$coupon_discount.')';
				
			}
			
			
//                $price = ($join_megclub=='1') ? ($price-MEGCLUB_DISCOUNT).' (已扣除MEG Club 提供的會員折扣優惠$200)' : $price;
            ?>
			<td><?php echo $c_code . ' - ' . $c_name . ' $' . $price.$addition_str;?></td>
		</tr>
		<tr>
			<td>上課地點</td>
			<td><?php echo $l_name;?></td>
		</tr>
		
			<?php
		if ($retake_part!=0)
		{
		?>
		<tr>
			<td>重考部份</td>
			<td><?php echo $this->retake_part[$retake_part];?></td>
		</tr>
		<?php
		}
		?>
		
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
		</tr>
        <!--
            <?php
             if  ($ask_reg_enquiry)
             {
            
            ?>
        
          <tr>
			<td>登記查詢</td>
			<td><?php echo $this->need[$reg_enquiry]; ?></td>
		</tr>
        
               
        
          <?php
             }
           ?>
        -->
        
        <tr>
			<td>備註</td>
			<td><?php echo $apply_remark;?></td>
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
			<td>稱謂</td>
			<td><?php echo $this->gender[$student_gender]['name'];?></td>
		</tr>
		<tr>
			<td>學員姓名</td>
			<td><?php echo $student_name;?></td>
		</tr>

		<tr style="display: none;">
			<td>出生日期</td>
			<td><?php echo $student_birthday;?></td>
		</tr>
		<tr style="display: none;">
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