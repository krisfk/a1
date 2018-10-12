<div class="row">
	<div class="col-sm-6">
		<div class="dataTables_info">顯示第 <?php echo $from_offset;?> - <?php echo $to_offset;?> 列, 總計 <?php echo $total;?> 筆資料</div>
	</div>
	<div class="col-sm-6">
		<div class="dataTables_paginate paging_simple_numbers" id="dataTables-example_paginate">
			<?php echo $links;?>
		</div>
	</div>
</div>