<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Admin login</h3>
				</div>
				<div class="panel-body">
					<?php if (isset($error)): ?><div class="alert alert-danger"><?php echo $error; ?></div><?php endif; ?>
					<?php echo form_open('admin/login'); ?>
					<input type="hidden" name="is_postback" value="1" />
						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Account" name="username" type="text" autofocus>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="">
							</div>
							<input type="submit" class="btn btn-lg btn-success btn-block" value="Login" />
						</fieldset>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>