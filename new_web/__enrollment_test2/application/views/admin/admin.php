<div id="page-wrapper">

	<legend>修改密碼</legend>
	
	<div class="row">
		<div class="col-lg-12">
			<?php foreach($message as $msg){?>
				<div class="alert <?php echo $msg[0];?>"><?php echo $msg[1]; ?></div>
			<?php }?>
		</div>
	</div>
	
	<?php echo form_open('admin/admin/');?>
	
		<input type="hidden" id="is_submit" name="is_submit" value="1" />
		<?php if(false){?>
		<div class="form-group">
			<label for="name" class="col-sm-2 control-label">用戶名</label>
			<div class="col-sm-10">
				<input type="text" class="form-control" name="username" value="<?php echo $username;?>" >
			</div>
		</div>
		<?php }?>
		<div class="form-group">
			<label for="code" class="col-sm-2 control-label">舊密碼</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="old_password" value="">
			</div>
		</div>
		<div class="form-group">
			<label for="code" class="col-sm-2 control-label">新密碼</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="new_password1" value="">
			</div>
		</div>
		<div class="form-group">
			<label for="code" class="col-sm-2 control-label">新密碼確認</label>
			<div class="col-sm-10">
				<input type="password" class="form-control" name="new_password2" value="">
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<div class="form-group">
					<button type="submit" class="btn btn-primary">
						<span>儲存</span>
					</button>
				</div>
			</div>
		</div>
	</form>
</div>