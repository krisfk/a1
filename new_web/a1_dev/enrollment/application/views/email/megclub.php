新會員加入MEG&nbsp;CLUB通知（<?php echo $create_time;?>）
<div>
	<table>
		<tr>
			<td>稱謂</td>
			<td><?php echo $this->gender[$student_gender]['name'];?></td>
		</tr>
        <tr>
			<td>學員姓名</td>
			<td><?php echo $student_name;?></td>
		</tr>

		<tr>
			<td>聯絡電話</td>
			<td><?php echo $student_tel;?></td>
		</tr>
		<tr>
			<td>電郵</td>
			<td><?php echo $student_email;?></td>
		</tr>
		<tr>
			<td>日期</td>
			<td><?php echo $create_time;?></td>
		</tr>
	</table>
</div>