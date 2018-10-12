<div>
	<table>
		<tr>
			<td>所選課程</td>
            <?php
                $price = ($join_megclub=='1') ? ($price-MEGCLUB_DISCOUNT).' (MEG CLUB 會員優惠價)' : $price;
            ?>
			<td><?php echo $c_code . ' - ' . $c_name . ' $' . $price;?></td>
		</tr>
		<tr>
			<td>上課地點</td>
			<td><?php echo $l_name;?></td>
		</tr>
        
        <tr>
			<td>加入MEG CLUB</td>
			<td><?php echo ($join_megclub=='1') ? 'Yes' : 'No';?></td>
		</tr>
        
         <tr>
			<td>選擇分店</td>
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