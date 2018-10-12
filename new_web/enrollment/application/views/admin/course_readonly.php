<div id="page-wrapper">

	<legend>課程資料</legend>
	
	<span style="float: right;">負責人:<?php echo $info['a_username'];?></span>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>課程名稱</td>
			<td><?php echo $info['name'];?></td>
		</tr>
		<tr>
			<td>課程編號</td>
			<td><?php echo $info['code'];?></td>
		</tr>
		<tr>
			<td>價錢</td>
			<td><?php echo $info['price'];?></td>
		</tr>
		<tr>
			<td>備註</td>
			<td><?php echo $info['remark'];?></td>
		</tr>
		<tr>
			<td>審批狀態</td>
			<td>已審批</td>
		</tr>
	</table>
</div>