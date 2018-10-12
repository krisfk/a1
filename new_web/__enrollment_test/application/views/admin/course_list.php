<div id="page-wrapper">
		
	<legend>課程列表</legend>
	
	<div class="row">
		<div class="col-lg-12">
			<?php foreach($message as $msg){?>
				<div class="alert <?php echo $msg[0];?>"><?php echo $msg[1]; ?></div>
			<?php }?>
		</div>
	</div>
	
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover dataTable no-footer">
					<thead>
						<tr>
							<th>課程編號</th>
							<th>課程名稱</th>
							<th>價錢</th>
							<th>審批</th>
							<th>負責人</th>
							<th>建立日期</th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $val){ ?>
						<tr>
							<td><?php echo $val['code'];?></td>
							<td><?php echo $val['name'];?></td>
							<td><?php echo $val['price'];?></td>
							<td><?php echo $val['allow'] ? '已審批':'未審批';?></td>
							<td><?php echo $val['a_username'];?></td>
							<td><?php echo $val['create_time'];?></td>
							<td>
								<a href="<?php echo site_url('admin/course/'.$val['id']);?>">詳細資料</a>
							</td>
						</tr>
						<?}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>