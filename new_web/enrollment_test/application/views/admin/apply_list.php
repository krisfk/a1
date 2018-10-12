<div id="page-wrapper">
		
	<legend>申請記錄</legend>
	
	<div class="row">
		<div class="col-lg-12">
			<?php foreach($message as $msg){?>
				<div class="alert <?php echo $msg[0];?>"><?php echo $msg[1]; ?></div>
			<?php }?>
		</div>
	</div>
	
	<?php echo form_open('admin/apply_excel/', array('target' => '_blank', 'method' => 'GET'));?>
	<div class="row">
		<div class="form-group">
			<label for="start_time" class="col-sm-2 control-label">開始時間</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="start_time" name="start_time" value="" style="width:400px" />
			</div>
		</div>
		<div class="form-group">
			<label for="end_time" class="col-sm-2 control-label">結束時間</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" id="end_time" name="end_time" value="" style="width:400px" />
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" class="btn btn-large btn-primary">Export</button>
			</div>
		</div>
	</div>
	</form>
		
	<div class="row">
		<div class="col-lg-12">
			<div class="table-responsive">
				<table class="table table-striped table-bordered table-hover dataTable no-footer">
					<thead>
						<tr>
							<th><a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=e_code&sortas=<?php echo $sortby=='e_code'&&$sortas=='asc'?'desc':'asc';?>">活動編號  <?php if($sortby=='e_code')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=e.name&sortas=<?php echo $sortby=='e.name'&&$sortas=='asc'?'desc':'asc';?>">活動名稱  <?php if($sortby=='e.name')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=student_name&sortas=<?php echo $sortby=='student_name'&&$sortas=='asc'?'desc':'asc';?>">學員姓名  <?php if($sortby=='student_name')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th style="width: 108px;">
                                
     <a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=join_megclub&sortas=<?php echo $sortby=='join_megclub'&&$sortas=='asc'?'desc':'asc';?>">加入MEG Club <?php if($sortby=='join_megclub')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a>                           
                            
                            </th>
                            
                            						<!--	<th style="width: 108px;">
                                 
     <a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=reg_enquiry&sortas=<?php echo $sortby=='reg_enquiry'&&$sortas=='asc'?'desc':'asc';?>">登記查詢<?php if($sortby=='reg_enquiry')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a>                           
                            
                            </th>-->
                            
                            
                            <th style="width: 108px;">
                                
     <a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=shop&sortas=<?php echo $sortby=='shop'&&$sortas=='asc'?'desc':'asc';?>">選擇跟進網上報名服務地點	  <?php if($sortby=='shop')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a>                           
                            
                            </th>
                            
                            <th style="width: 108px;">
                                
     <a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=contact_timeslot&sortas=<?php echo $sortby=='contact_timeslot'&&$sortas=='asc'?'desc':'asc';?>">聯絡時間	 <?php if($sortby=='contact_timeslot')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a>                           
                            
                            </th>
                            
                            <th style="width: 108px;">
                                
     <a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=remark&sortas=<?php echo $sortby=='remark'&&$sortas=='asc'?'desc':'asc';?>">備註	 <?php if($sortby=='remark')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a>                           
                            
                            </th>
                            
                            
                            <th><a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=pay_status&sortas=<?php echo $sortby=='pay_status'&&$sortas=='asc'?'desc':'asc';?>">付款狀態  <?php if($sortby=='pay_status')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th><a href="<?php echo site_url('admin/apply_list/');?>?page=<?php echo $page;?>&sortby=a.create_time&sortas=<?php echo $sortby=='a.create_time'&&$sortas=='asc'?'desc':'asc';?>">日期  <?php if($sortby=='a.create_time')echo $sortas=='asc'?'<img src="img/down.png"/>':'<img src="img/up.png"/>';?></a></th>
							<th></th>
						</tr>
					</thead>
					<tbody>
						<?php foreach($list as $val){ ?>
						<tr>
							<td><?php 
                                                
                                                 $e_code =   ($val['join_megclub'] == '1') ?$val['e_code'].JOIN_MEGCLUB_SUFFIX :  $val['e_code']  ;
                                                     echo $e_code;
                                
                                
                                ?></td>
                            
                         	
                            
							<td><?php echo $val['name'];?></td>
							<td><?php echo $val['student_name'];?></td>
							<td><?php echo $val['join_megclub'];?></td>
                            
<!--                               <td><?php echo $val['reg_enquiry'];?></td>
-->						
                            
                            
                            <?php
                              $shop = explode("|", $val['shop']);
                $shop = $shop[0];
                            ?>
                            <td><?php echo $shop;?></td>
                            <td><?php echo $val['contact_timeslot'];?></td>
                            <td><?php echo $val['apply_remark'];?></td> 

                            
                            <td><?php echo $this->pay_status[$val['pay_status']]['name'];?></td>
							<td><?php echo $val['create_time'];?></td>
							<td>
								<a href="<?php echo site_url('admin/apply/'.$val['id']);?>">詳細資料</a>
							</td>
						</tr>
						<?}?>
					</tbody>
				</table>
			</div>
		</div>
	</div>