<div id="page-wrapper">

	<legend><?php echo $id==0 ? '新增活動' : '活動資料';?>
	</legend>
	
	<div class="row">
		<div class="col-lg-12">
			<?php foreach($message as $msg){?>
				<div class="alert <?php echo $msg[0];?>"><?php echo $msg[1]; ?></div>
			<?php }?>
		</div>
	</div>
	
	<?php if($id>0){?>
	<a href="<?php echo site_url('app/index/'.$info['code']);?>" target="_blank">前往頁面</a>
	<span style="float: right;">負責人:<?php echo $info['a_username'];?></span>
	<?php }?>
	<?php echo form_open('admin/event/'.$id);?>
	<input type="hidden" id="submit_type" name="submit_type" value="<?php echo SUBMIT_SAVE;?>" />
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label" style="margin-top:10px">活動名稱</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="text" class="form-control" name="name" value="<?php echo $info['name'];?>">
			</div>
		</div>
		<div class="form-group">
			<label for="code" class="col-sm-2 control-label" style="margin-top:10px">活動編號</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="text" class="form-control" name="code" value="<?php echo $info['code'];?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="status" class="col-sm-2 control-label" style="margin-top:10px">狀態</label>
			<div class="col-sm-10" style="margin-top:10px">
				<select name="status" class="form-control" >
					<?php foreach($this->event_status as $key=>$val){?>
					<option value="<?php echo $key;?>" <?php echo $key==$info['status'] ? 'selected' : '';?> ><?php echo $val['name'];?></option>
					<?php }?>
				</select>
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
			<label for="start_time" class="col-sm-2 control-label" style="margin-top:10px">開始時間</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="text" class="form-control" id="start_time" name="start_time" value="<?php echo $info['start_time'];?>" />
			</div>
		</div>
		<div class="form-group">
			<label for="end_time" class="col-sm-2 control-label" style="margin-top:10px">結束時間</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="text" class="form-control" id="end_time" name="end_time" value="<?php echo $info['end_time'];?>" />
			</div>
		</div>
	<div class="form-group">
			<label for="ask_megclub" class="col-sm-2 control-label" style="margin-top:10px">詢問加入MEG CLUB</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="checkbox" class="form-control" style="width:30px;height:30px;margin: 0;" name="ask_megclub" value="1" <?php echo $info['ask_megclub'] ? 'checked' : '';?> />
			</div>
		</div>
    
    
    <div class="form-group">
			<label for="show_staff" class="col-sm-2 control-label" style="margin-top:10px">需要員工資料</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="checkbox" class="form-control" style="width:30px;height:30px;margin: 0;" name="show_staff" value="1" <?php echo $info['show_staff'] ? 'checked' : '';?> />
			</div>
		</div>
		<div class="form-group">
			<label for="full_id" class="col-sm-2 control-label" style="margin-top:10px">需要完整HKID</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="checkbox" class="form-control" style="width:30px;height:30px;margin: 0;" name="full_id" value="1" <?php echo $info['full_id'] ? 'checked' : '';?> />
			</div>
		</div>
		<div class="form-group">
			<label for="selected_course" class="col-sm-2 control-label" style="margin-top:10px">課程</label>
			<div class="col-sm-10" style="margin-top:10px">
				<select multiple name="selected_course[]" class="form-control" size="10">
					<?php foreach($course_list as $val){?>
						<option value="<?php echo $val['id'];?>" <?php echo in_array($val['id'], $info['selected_course']) ? 'selected' : '';?>><?php echo $val['name'] . " $" . $val['price'];?></option>
					<?php }?>
				</select>
			</div>
		</div>
		<div class="form-group">
			<label for="selected_location" class="col-sm-2 control-label" style="margin-top:10px">地點</label>
			<div class="col-sm-10" style="margin-top:10px">
				<select multiple name="selected_location[]" class="form-control">
					<?php foreach($location_list as $val){?>
						<option value="<?php echo $val['id'];?>" <?php echo in_array($val['id'], $info['selected_location']) ? 'selected' : '';?>><?php echo $val['name'];?></option>
					<?php }?>
				</select>
			</div>
		</div>
		
		<legend></legend>
		
		<div class="form-group">
			<label class="col-sm-2 control-label" style="margin-top:10px">Title</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="text" class="form-control" name="title" value="<?php echo $info['title'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" style="margin-top:10px">Banner</label>
			<div class="col-sm-10" style="margin-top:10px">
				<textarea name="banner" class="ckeditor">
					<?php echo $info['banner'];?>
				</textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" style="margin-top:10px">上款文字</label>
			<div class="col-sm-10" style="margin-top:10px">
				<textarea name="header" class="ckeditor">
					<?php echo $info['header'];?>
				</textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" style="margin-top:10px">條款</label>
			<div class="col-sm-10" style="margin-top:10px">
				<textarea name="policy" rows="5" cols="20" class="form-control" ><?php echo empty($info['policy']) ? DEFAULT_POLICY : $info['policy'];?></textarea>
			</div>
		</div>
		
		<legend>    </legend>
		
		<div class="form-group">
			<label for="pay_email" class="col-sm-2 control-label" style="margin-top:10px">自動發送Email</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="checkbox" class="form-control" style="width:30px;height:30px;margin: 0;" name="pay_email" value="1" <?php echo $info['pay_email'] ? 'checked' : '';?> />
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" style="margin-top:10px">Email標題</label>
			<div class="col-sm-10" style="margin-top:10px">
				<input type="text" class="form-control" name="pay_email_subject" value="<?php echo $info['pay_email_subject'];?>">
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" style="margin-top:10px">Email內容</label>
			<div class="col-sm-10" style="margin-top:10px">
				<textarea name="pay_email_content" class="ckeditor">
					<?php echo $info['pay_email_content'];?>
				</textarea>
			</div>
		</div>
		<div class="form-group">
			<label class="col-sm-2 control-label" style="margin-top:10px">Email附件</label>
			<div class="col-sm-10" style="margin-top:10px">
				<span class="btn btn-success fileinput-button">
					<i class="glyphicon glyphicon-plus"></i>
					<span>上傳附件</span>
					<!-- The file input field used as target for the file upload widget -->
					<input id="fileupload" type="file" name="files[]" multiple />
				</span>
				<input type="text" id="pay_email_attach" name="pay_email_attach" value="<?php echo $info['pay_email_attach'];?>" size="50px" readonly />
			</div>
		</div>
		
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10" style="margin-top:50px;margin-bottom:100px">
				<button type="submit" class="btn btn-large btn-primary" style="padding-left: 30px;padding-right: 30px;">       儲存       </button>
				<button type="button" id="btn_del" class="btn btn-large btn-danger" style="padding-left: 30px;padding-right: 30px;">       刪除       </button>
			</div>
		</div>
	</form>
</div>