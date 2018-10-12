<div id="page-wrapper">

	<legend><?php echo $id==0 ? '新增優惠代碼' : '優惠代碼資料';?></legend>
	
	<div class="row">
		<div class="col-lg-12">
			<?php foreach($message as $msg){?>
				<div class="alert <?php echo $msg[0];?>"><?php echo $msg[1]; ?></div>
			<?php }?>
		</div>
	</div>
	
	<?php if($id>0){?>
	<span style="float: right;">負責人:<?php echo $info['a_username'];?></span>
	<?php }?>
	
	<?php echo form_open('admin/coupon_code/'.$id);?>
	
		<input type="hidden" id="submit_type" name="submit_type" value="<?php echo SUBMIT_SAVE;?>" />
		
		<!--<div class="form-group">
			<label for="name" class="col-sm-2 control-label">地址</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="name" value="<?php echo $info['name'];?>">
			</div>
		</div>-->
	
		<div class="form-group">
			<label for="coupon_name" class="col-sm-2 control-label">優惠代碼名稱</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="coupon_name" value="<?php  echo $info['coupon_name'];?>">
			</div>
		</div>
	
	
		<div class="form-group">
			<label for="coupon_code" class="col-sm-2 control-label">優惠代碼編號</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="coupon_code" value="<?php  echo $info['coupon_code'];?>">
			</div>
		</div>
	
		<div class="form-group">
			<label for="coupon_code" class="col-sm-2 control-label">優惠銀碼</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="discount" value="<?php  echo $info['discount'];?>">
			</div>
		</div>
	
	
	
		<div class="form-group">
			<label for="selected_course" class="col-sm-2 control-label" style="margin-top:10px">對應課程<br/><span style="font-size: 10px;">(Remarks: Value 對應select display content)</span></label>
			<div class="col-sm-10" style="margin-top:10px">
				<select multiple name="selected_course[]" class="form-control" size="10">
					<?php foreach($course_list as $val){?>
						<option value="<?php echo $val['id'];?>" <?php echo in_array($val['id'], $info['selected_course']) ? 'selected' : '';?>>(value:<?php echo $val['id']; ?>) <?php echo $val['name'] . " $" . $val['price'];?></option>
					<?php }?>
				</select>
			</div>
		</div>
	
	
		<div class="form-group">
			<label for="start_time" class="col-sm-2 control-label" style="margin-top:10px">開始時間</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="text" class="form-control" id="start_time" name="start_time" value="<?php  echo $info['start_time'];?>" />
			</div>
		</div>
	
		<div class="form-group">
			<label for="end_time" class="col-sm-2 control-label" style="margin-top:10px">結束時間</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="text" class="form-control" id="end_time" name="end_time" value="<?php echo $info['end_time'];?>" />
			</div>
		</div>
	
	
	
	
		<?php if($this->user['admin']){?>
		<div class="form-group">
			<label for="allow" class="col-sm-2 control-label" style="margin-top:10px">審批</label>
			<div class="col-sm-10" style="margin-top:10px">
				<select name="allow" class="form-control" >
					<option value="1" <?php echo $info['allow'] ? 'selected' : '';?> >已審批</option>
					<option value="0" <?php echo !$info['allow'] ? 'selected' : '';?> >未審批</option>
				</select>
			</div>
		</div>
		<?php } else {?>
		<input type="hidden" name="allow" value="<?php echo $info['allow'];?>" />
		<?php }?>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<span>儲存</span>
					</button>
					<button type="button" id="btn_del" class="btn btn-large btn-danger">
						<span>刪除</span>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>

