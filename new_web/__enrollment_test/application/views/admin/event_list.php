<div id="page-wrapper">
		
	<legend>活動列表</legend>
	
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
							<th><a href="<?php echo site_url('admin/event_list/');?>?page=<?php echo $page;?>&sortby=code&sortas=<?php echo $sortby=='code'&&$sortas=='asc'?'desc':'asc';?>">活動編號  <?php if($sortby=='code')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/event_list/');?>?page=<?php echo $page;?>&sortby=name&sortas=<?php echo $sortby=='name'&&$sortas=='asc'?'desc':'asc';?>">活動名稱  <?php if($sortby=='name')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/event_list/');?>?page=<?php echo $page;?>&sortby=start_time&sortas=<?php echo $sortby=='start_time'&&$sortas=='asc'?'desc':'asc';?>">開始日期  <?php if($sortby=='start_time')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/event_list/');?>?page=<?php echo $page;?>&sortby=end_time&sortas=<?php echo $sortby=='end_time'&&$sortas=='asc'?'desc':'asc';?>">結束日期  <?php if($sortby=='end_time')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/event_list/');?>?page=<?php echo $page;?>&sortby=status,ended,start_time&sortas=<?php echo $sortby=='status,ended,start_time'&&$sortas=='asc'?'desc':'asc';?>">狀態  <?php if($sortby=='status,ended,start_time')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/event_list/');?>?page=<?php echo $page;?>&sortby=allow&sortas=<?php echo $sortby=='allow'&&$sortas=='asc'?'desc':'asc';?>">審批  <?php if($sortby=='allow')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/event_list/');?>?page=<?php echo $page;?>&sortby=a_username&sortas=<?php echo $sortby=='a_username'&&$sortas=='asc'?'desc':'asc';?>">負責人  <?php if($sortby=='a_username')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/event_list/');?>?page=<?php echo $page;?>&sortby=create_time&sortas=<?php echo $sortby=='create_time'&&$sortas=='asc'?'desc':'asc';?>">建立日期  <?php if($sortby=='create_time')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $val){ ?>
						<tr>
							<td><?php echo $val['code'];?></td>
							<td><?php echo $val['name'];?></td>
							<td><?php echo $val['start_time'];?></td>
							<td><?php echo $val['end_time'];?></td>
							<td><?php 
							if($val['status']==EVENT_STATUS_NORMAL){
								$now = date('Y-m-d H:i:s');
								if($now < $val['start_time']){
									echo '未開始';
								} else if($now > $val['end_time']){
									echo '已結束';
								} else {
									echo '進行中';
								}
							} else {
								echo $this->event_status[$val['status']]['name'];
							}
							?></td>
							<td><?php echo $val['allow'] ? '已審批':'未審批';?></td>
							<td><?php echo $val['a_username'];?></td>
							<td><?php echo $val['create_time'];?></td>
							<td>
								<a href="<?php echo site_url('app/index/'.$val['code']);?>" target="_blank" >前往頁面</a> /
								<a href="<?php echo site_url('admin/event/'.$val['id']);?>">詳細資料</a>
							</td>
						</tr>
						<?}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>