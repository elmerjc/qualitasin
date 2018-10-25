		</div> <!-- End of Wrapper -->
	</div> <!-- End of Main Wrap -->

<?php

	$prefix = composer_get_prefix();

	${'composer_'.$prefix.'header_layout'} = composer_get_meta_value( $id, '_amz_header_layout', 'default', 'header_layout', 'header-1' ); // id, meta_key, meta_default, themeoption_key, themeoption_default
	${'composer_'.$prefix.'boxed_content'} = composer_get_meta_value( $id, '_amz_boxed_content', 'default', 'boxed_content', 'wide' ); // id, meta_key, meta_default, themeoption_key, themeoption_default

	$composer_page_slug =  get_page_template_slug(); 

	$composer_footer_fixed = composer_get_option_value( 'footer_fixed', 'no' );


	$composer_f_widget_mobile_hide = composer_get_option_value( 'f_widget_mobile_hide', 'show' );
	$composer_f_small_mobile_hide = composer_get_option_value( 'f_small_mobile_hide', 'show' );

	if( $composer_page_slug != 'templates/page-blank.php' ) {
		$composer_footer_fixed_class = ( $composer_footer_fixed === 'yes' ) ? ' footer-fixed' : '';

		$composer_footer_style = composer_get_option_value( 'footer_style', 'dark' );
		$composer_footer_style = ( $composer_footer_style == 'light' ) ? ' footer-light ' : ' footer-dark ';


	$composer_footer = composer_get_meta_value( $id, '_amz_footer', 'show' ); // id, meta_key, meta_default

	$f_widget_mobile_hide_class = $f_small_mobile_hide_class = '';

	if( 'show' == $composer_footer ) {

		if( $composer_f_widget_mobile_hide == 'hide' ){
			$f_widget_mobile_hide_class .= ' f_widget_hide_on_mobile ';
		} 
		if ( $composer_f_small_mobile_hide == 'hide' ){
			$f_small_mobile_hide_class .= ' f_small_hide_on_mobile ';
		}

	?>
		<footer id="footer" class="<?php echo esc_attr( $composer_footer_style . $composer_footer_fixed_class . $f_widget_mobile_hide_class . $f_small_mobile_hide_class ); ?>">
			<?php 
				$composer_footer_widget = composer_get_option_value( 'f_widget', 'show' );

				$composer_sidebar_name = composer_get_option_value( 'f_select_sidebar', '0' );
				$composer_sidebar_name = ( '0' == $composer_sidebar_name ) ? 'footer-widgets' : $composer_sidebar_name;
				$composer_footer_widget_layout = composer_get_option_value( 'f_widget_col', 'col3' );

				if( 'show' === $composer_footer_widget ){

					if( ( 'col3' == $composer_footer_widget_layout || 'col4' == $composer_footer_widget_layout ) ) {
						
						if( is_active_sidebar( $composer_sidebar_name ) ) {
							echo '<div id="pageFooterCon" class="pageFooterCon '. esc_attr( $composer_footer_widget_layout ) .' clearfix">';
							
								echo '<div id="pageFooter" class="container">';
									dynamic_sidebar( $composer_sidebar_name );
								echo '</div>'; // pageFooter

							echo '</div>'; // pageFooterCon
						}
						
					}
					else {
						echo '<div id="pageFooterCon" class="pageFooterCon clearfix amz-custom-footer-layout amz-footer-' . esc_attr( $composer_footer_widget_layout ) . '">';
							echo '<div id="pageFooter" class="container">';
								echo '<div class="row">';

									// Load footer layouts
									get_template_part ( 'templates/footers/'. $composer_footer_widget_layout );

								echo '</div>'; // row
							echo '</div>'; // pageFooter
						echo '</div>'; // pageFooterCon
					}

		 		}

				$composer_f_small = composer_get_option_value( 'f_small', 'show' );

				if( 'show' === $composer_f_small ){
			?>
				<!-- Copyright -->
				<div class="footer-bottom">
					<div class="container">
						<div class="copyright row">

							<?php 
								$composer_copyright_side = composer_get_option_value( 'copyright_side', 'center' );

								$copyright = array( 
									"left" => array (
										"copyright_text" => esc_html__("Copyright Text", "composer")
									),
									"right" => array (
										"placebo" => "placebo", //REQUIRED!
										"menu"    => esc_html__("Menu", "composer")
									),
									"center" => array (
										"copyright_text" => esc_html__("Copyright Text", "composer")
									),
								);

								if( $composer_copyright_side === 'left_right' ){
									$composer_copyright_side_left = composer_get_option_array_value('copyright_sorter','left', $copyright['left'] );

									echo '<div class="col-md-6">';
										foreach ( $composer_copyright_side_left as $key => $value ) {
											composer_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
										}
									echo '</div>';

									$composer_copyright_side_right = composer_get_option_array_value('copyright_sorter','right', $copyright['right'] );

									echo '<div class="col-md-6 copyright-right">';
										foreach ( $composer_copyright_side_right as $key => $value ) {
											composer_display_header_elements( $key, 'lang-list-wrap', 'page-top-main' );
										}
									echo '</div>';
								}
								else {
									$composer_copyright_side_center = composer_get_option_array_value('copyright_center_sorter','center', $copyright['center'] );

									echo '<div class="col-md-12">';
										foreach ( $composer_copyright_side_center as $key => $value ) {
											composer_display_header_elements( $key, '', '' );
										}			
									echo '</div>';

								}
							?>
						</div>
					</div>
				</div>
			
			<?php } ?>

		</footer>
	<?php } // $composer_footer ?>

	<?php
		if ( ${'composer_'.$prefix.'header_layout'} == 'left-header' || ${'composer_'.$prefix.'header_layout'} == 'right-header' ){ 
			echo '</div>';
		}

		if ( ${'composer_'.$prefix.'boxed_content'} === 'boxed' ) {
			echo '</div>';
		}
	?>
	<?php } // $composer_page_slug ?>

</div>

<?php

	$flyin_sidebar = composer_get_option_value( 'flyin_sidebar', 'off' );
	$flyin_sidebar_widgets = composer_get_option_value( 'flyin_select_sidebar', 'blog-sidebar' );

	if( 'on' === $flyin_sidebar ){
		echo '<div class="pix-flyin-content">';
			echo '<div class="pix-flyin-widgets">';

				if ( is_active_sidebar( $flyin_sidebar_widgets ) ) {
					dynamic_sidebar( $flyin_sidebar_widgets );
				}

			echo '</div>';
		echo '</div>';
	}

	wp_footer(); ?>

</body>

</html>
