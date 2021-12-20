	<div class="page-header">
		<h1>
			<?php echo $menus?>
			<small>
				<i class="ace-icon fa fa-angle-double-right"></i>
				<?php if(isset($sub_menus)){echo $sub_menus;}else{echo $titles;}?>
			</small>
	
		</h1>
	</div><!-- /.page-header -->

	<div class="row">
        <div class="col-xs-12">
            <?php echo $output?>
        </div>
    </div>