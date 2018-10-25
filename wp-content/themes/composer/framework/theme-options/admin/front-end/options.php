<div class="wrap" id="of_container">

	<div id="of-popup-save" class="of-save-popup">
		<div class="of-save-save"><i class="icon-check-mark"></i> <?php esc_html_e('Options Updated','composer' );?></div>
	</div>
	
	<div id="of-popup-reset" class="of-save-popup">
		<div class="of-save-reset"><i class="icon-refresh"></i> <?php esc_html_e('Options Reset','composer' ); ?></div>
	</div>
	
	<div id="of-popup-fail" class="of-save-popup">
		<div class="of-save-fail"><i class="icon-remove"></i> <?php esc_html_e('Error! Not Saved','composer' ); ?></div>
	</div>

	<div id="of-popup-saving" class="ajax-loading-img ajax-loading-img-bottom" style="display:none">
		<i class="icon-img"></i> saving
	</div>
	
	<span style="display: none;" id="hooks"><?php echo json_encode(of_get_header_classes_array()); ?></span>
	<input type="hidden" id="reset" value="<?php if(isset($_REQUEST['reset'])) echo esc_attr( $_REQUEST['reset'] ); ?>" />
	<input type="hidden" id="security" name="security" value="<?php echo wp_create_nonce('of_ajax_nonce'); ?>" />

	<form id="of_form" method="post" action="<?php echo esc_attr( $_SERVER['REQUEST_URI'] ) ?>" enctype="multipart/form-data" >
	
		<div id="header">
		
			<div class="logo">
				<img src="<?php echo esc_url( COMPOSER_ADMIN_DIR. 'assets/images/theme-options-logo.png' ); ?>" class="" alt="" />
			</div>
		
			<div id="js-warning"><?php esc_html_e('Warning- This options panel will not work properly without javascript!','composer' ); ?></div>

			<div id="info_bar">

				<a>
					<div class="expand-class">
						<div id="expand_options" class="expand"><?php esc_html_e('Expand','composer' ); ?></div>
						<span class="switch-class"><?php esc_html_e('Switch View','composer' ); ?></span>
					</div>
				</a>
				<div class="theme-search">
					<i class="pix-icon icon-page-search"></i>
					<input id="search" type="text" name="" value="" placeholder="<?php esc_attr_e( 'Search', 'composer' ); ?>">
				</div>

				<div class="btn-bg">
					<button id="of_save" type="button" class="btn-pri">
						<i class="pix-icon icon-pix-fonts-22"></i>
						<?php esc_html_e('Save All Changes', 'composer' );?>
					</button>
				</div>

			</div><!--.info_bar--> 

			<div class="clear"></div>
		
    	</div>	
		
		<div id="main">
		
			<div id="of-nav">
				<ul>
				  <?php echo $options_machine->Menu; // No need escape, its html fragment and its already escaped properly inside class "options_machine" ?>
				</ul>
			</div>

			<div id="content">
				<div id="no-result" class="section-info">
					<div class="controls">
						<div class="of-info">
							<h3><?php esc_html_e('No Result Found!', 'composer' ); ?></h3>
						</div>
					</div>
				</div>
				<?php echo $options_machine->Inputs /* Settings */  // No need escape, its html fragment and its already escaped properly inside class "options_machine" ?>

				<div class="save_bar"> 
					
					
					<button id ="of_save" type="button" class="btn-sec"><i class="pix-icon icon-pix-fonts-22"></i> <?php esc_html_e('Save All Changes', 'composer' );?></button>			
					<button id ="of_reset" type="button" class="button submit-button reset-button" ><?php esc_html_e( 'Options Reset', 'composer' );?></button>
					<img style="display:none" src="<?php echo esc_url( COMPOSER_ADMIN_DIR.'assets/images/loading-bottom.gif' ); ?>" class="ajax-reset-loading-img ajax-loading-img-bottom" alt="Working..." />

				</div><!--.save_bar--> 
		  	</div>
		  	
			<div class="clear"></div>
			
		</div>
 
	</form>
	
	<div style="clear:both;"></div>

</div><!--wrap-->
<div class="smof_footer_info"></div>