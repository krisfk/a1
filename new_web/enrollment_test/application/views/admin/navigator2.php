<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="margin-bottom: 0">

	<div class="navbar-header">
		<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
			<span class="sr-only">Toggle navigation</span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
			<span class="icon-bar"></span>
		</button>
		<a class="navbar-brand" href="admin/">MEG Administration</a>
	</div>

	<ul class="nav navbar-top-links navbar-right">
		<li>
			<?php echo $this->user['username'];?>
		</li>
		<li>
			<a href="admin/logout"><i class="fa fa-sign-out fa-fw"></i>登出</a>
		</li>
	</ul>
	
	<div class="navbar-default navbar-static-side" role="navigation">
		<div class="sidebar-collapse">
			<ul class="nav" id="side-menu">
				<li>
					<a href="admin/apply_list/">申請記錄</a>
				</li>
				<?php 
				$active = '';
				switch($this->uri->segment(2)){
					case 'event_list':
					case 'event':
						$active = "active";
					default:
				}
				?>
				<li class="<?php echo $active;?>" >
					<a href="#">活動管理<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse" style="height: auto;">
						<li>
							<a href="admin/event_list/">活動列表</a>
						</li>
						<li>
							<a href="admin/event/">新增活動</a>
						</li>
					</ul>
				</li>
				<?php 
				$active = '';
				switch($this->uri->segment(2)){
					case 'course_list':
					case 'course':
						$active = "active";
					default:
				}
				?>
				<li class="<?php echo $active;?>" >
					<a href="#">課程管理<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse" style="height: auto;">
						<li>
							<a href="admin/course_list/">課程列表</a>
						</li>
						<li>
							<a href="admin/course/">新增課程</a>
						</li>
					</ul>
				</li>
				<?php 
				$active = '';
				switch($this->uri->segment(2)){
					case 'location_list':
					case 'location':
						$active = "active";
					default:
				}
				?>
				<li class="<?php echo $active;?>" >
					<a href="#">地址管理<span class="fa arrow"></span></a>
					<ul class="nav nav-second-level collapse" style="height: auto;">
						<li>
							<a href="admin/location_list/">地址列表</a>
						</li>
						<li>
							<a href="admin/location/">新增地址</a>
						</li>
					</ul>
				</li>
				<li>
					<a href="admin/admin/">修改密碼</a>
				</li>
			</ul>
		</div>
	</div>
</nav>