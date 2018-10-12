<div id="page-wrapper">

	<legend>活動資料</legend>
	
	<a href="<?php echo site_url('app/index/'.$info['code']);?>" target="_blank">前往頁面</a>
	<span style="float: right;">負責人:<?php echo $info['a_username'];?></span>
	
	<table class="table table-striped table-bordered table-hover">
		<tr>
			<td>活動名稱</td>
			<td><?php echo $info['name'];?></td>
		</tr>
		<tr>
			<td>活動編號</td>
			<td><?php echo $info['code'];?></td>
		</tr>
		<tr>
			<td>狀態</td>
			<td><?php echo $this->event_status[$info['status']]['name'];?></td>
		</tr>
		<tr>
			<td>審批狀態</td>
			<td>已審批</td>
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
			<td>需要員工資料</td>
			<td><?php echo $info['show_staff'] ? '是' : '否';?></td>
		</tr>
		<tr>
			<td>需要完整HKID</td>
			<td><?php echo $info['full_id'] ? '是' : '否';?></td>
		</tr>
		<tr>
			<td>課程</td>
			<td>
			<?php foreach($course_list as $val){?>
				<?php if(in_array($val['id'], $info['selected_course'])){?>
					<?php echo $val['name'] . " $" . $val['price'];?><br/>
				<?php }?>
			<?php }?>
			</td>
		</tr>
		<tr>
			<td>地點</td>
			<td>
			<?php foreach($location_list as $val){?>
				<?php if(in_array($val['id'], $info['selected_location'])){?>
					<?php echo $val['name'];?><br/>
				<?php }?>
			<?php }?>
			</td>
		</tr>
		<tr>
			<td>Title</td>
			<td><?php echo $info['title'];?></td>
		</tr>
		<tr>
			<td>Banner</td>
			<td><?php echo $info['banner'];?></td>
		</tr>
		<tr>
			<td>上款文字</td>
			<td><?php echo $info['header'];?></td>
		</tr>
		<tr>
			<td>條款</td>
			<td><textarea readonly rows="10" cols="20" class="form-control" ><?php echo empty($info['policy']) ? DEFAULT_POLICY : $info['policy'];?></textarea></td>
		</tr>
		<tr>
			<td>自動發送Email</td>
			<td><?php echo $info['pay_email'] ? '是' : '否';?></td>
		</tr>
		<tr>
			<td>Email標題</td>
			<td><?php echo $info['pay_email_subject'];?></td>
		</tr>
		<tr>
			<td>Email內容</td>
			<td><?php echo $info['pay_email_content'];?></td>
		</tr>
	</table>
</div>