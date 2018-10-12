<div id="page-wrapper">

	<legend>優惠代碼資料</legend>
	
	<span style="float: right;">負責人:<?php echo $info['a_username'];?></span>
	
	<table class="table table-striped table-bordered table-hover">
		
		<tr>
			<td>優惠代碼名稱</td>
			<td><?php echo $info['coupon_name'];?></td>
		</tr>
		<tr>
			<td>優惠代碼編號</td>
			<td><?php echo $info['coupon_code'];?></td>
		</tr>
		<tr>
			<td>優惠銀碼</td>
			<td><?php echo $info['discount'];?></td>
		</tr>
		<tr>
			<td>開始時間</td>
			<td><?php echo $info['start_time'];?></td>
		</tr>
		<tr>
			<td>結束時間</td>
			<td><?php echo $info['end_time'];?></td>
		</tr>
		<tr>
			<td>審批狀態</td>
			<td>已審批</td>
		</tr>
	</table>
</div>