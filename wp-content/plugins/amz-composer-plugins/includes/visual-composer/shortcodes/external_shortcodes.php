<?php

/* =============================================================================
	 Theme Item Shortcodes
   ========================================================================== */

function composer_theme_filter( $atts, $content = null, $code ) {
	extract( shortcode_atts( array(
		'filter_text' => ''
	),$atts ) );

	$output = '';

	$filter_text = explode(',', $filter_text);

	$output = '<div class="demo-portfolio"><div class="filter-portfolio">';

		$output .= '<ul id="filters" class="filter clearfix option-set">
						 <li><a href="#" class="selected" data-filter="*">'. esc_html__( 'All', 'amz-composer-plugins' ) .'</a></li>';

						 foreach ($filter_text as $cat) {
						 	$output .= '<li><a href="#" data-filter=".'. esc_attr( strtolower( $cat ) ) .'">'. esc_html( str_replace('-', ' ', $cat ) ) .'</a></li>';
						 }
		$output .= '</ul></div>';

		$output .= '<div class="demo-filter portfolio-contents"><div class="demo-filter-inner">'.

		 wpb_js_remove_wpautop( $content ) .

		 '</div></div>';

	$output .= '</div>';

	return $output;
}

add_shortcode( 'filter_wrap', 'composer_theme_filter' );

function composer_demo_theme_item($atts, $content = null, $code){
	extract(shortcode_atts(array(
		'theme_img'    => '',
		'title'        => '',
		'desc'         => '',
		'preview_link' => '',
		'style'        => '',
		'batch_name'   => '',
		'cate'          => '',
	), $atts));

	$btn_att = vc_build_link($preview_link);		
	$btn_att['href'] = (isset($btn_att['url']) && !empty($btn_att['url'])) ? $btn_att['url'] : '#';
	$btn_att['title'] = (isset($btn_att['title'])) ? $btn_att['title'] : 'Preview';
	$btn_att['target'] = (isset($btn_att['target'])) ? $btn_att['target'] : '_blank';

	$output = '<div class="theme-wrap portfolio-grid-sizer vc_col-md-3 element pix-portfolio-item '. esc_attr( strtolower( $cate ) ) .'" data-type="'. $cate .'">
				<a href="'. $btn_att['href'] .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').'>
					<div class="theme-img">';

						$img = "";

						$image_thumb_url = wp_get_attachment_image_src( $theme_img, 'full');
						if(!empty($image_thumb_url)){									
							$img = aq_resize($image_thumb_url[0], 430, 550, true, true);
						}
						if($img){
							$temp_thumb = "<img src='$img' alt='' width='430' height='550'>";
						}else{
							$temp_thumb = "<img src='$image_thumb_url[0]' alt=''>";
						}							
						
						$output .= $temp_thumb;

						if( $style == 'date' && ! empty( $batch_name ) ){
							$output .= '<span class="new-batch date-batch">'. $batch_name .'</span>';
						} elseif( $style == 'new' && ! empty( $batch_name ) ) {
							$output .= '<span class="new-batch">'. $batch_name .'</span>';
						} else {
							$output .= '';
						}

						$output .= '
					</div>
					<h3 class="theme-title">'. $title .'</h3>
					<p class="theme-desc">'. $desc .'</p>
				</a>
	</div>';

	return  $output;

}

add_shortcode( 'demo_port_item', 'composer_demo_theme_item' );

function amz_header ($atts, $content = null) {

		extract( shortcode_atts( array(
			'transparent_header' => '0',
			'header_hover_layout' => 'none',
			'header_layout' => 'header-1',
			'top_header' => 0,
			'top_header_position' => 'top',
			'transparent_header_opacity' => 0,
			'header_background_style' => 'dark',
		), $atts ) );

		//header background style
		if( '0' === $header_background_style || 'dark' === $header_background_style ){
			$header_class = ' dark ';
			$header_con_class= ' dark-con ';
		} else {
			$header_class = '';
			$header_con_class = '';
		}

		// Sub Menu Class - Dropdown menu light or dark
		$sub_menu = composer_get_option_value( 'sub_menu', 0 );
		if( $sub_menu ){
			$sub_class = ' sub-menu-dark ';
		} else {
			$sub_class = '';
		}

		/* Header Container Width */
		$header_width = composer_get_option_value( 'header_width', 0 );
		if($header_width == 1){
			$header_container_width = ' full-header';
		}else {
			$header_container_width = '';
		}	

		if( 'default' == $header_hover_layout ){
			$header_hover_layout = '';
		}

		/* Header Wrapper Div */
		ob_start();

		if( '1' === $transparent_header || 'show' === $transparent_header ) {
			echo '<div class="transparent-header opacity-'. $transparent_header_opacity .'">';
		}

		if( $header_layout != 'left-header' && $header_layout != 'right-header' ){
		?>
		<div class="header-wrap <?php echo esc_attr( $header_hover_layout . $header_class . $sub_class . $header_container_width ); ?>">

			<div class="header-con<?php echo esc_attr( $header_con_class . ' menu-'.$header_layout ); ?>">

				<?php 

					if ( ( '1' === $top_header || 'show' === $top_header  ) && ( '0' === $top_header_position || $top_header_position === 'top' ) ){
						get_template_part ( 'templates/headers/header-info' );
					}
					
						get_template_part ( 'templates/headers/'. $header_layout );

					if ( ( '1' === $top_header || 'show' === $top_header  ) && ( '1' === $top_header_position || $top_header_position === 'bottom' ) ){
						get_template_part ( 'templates/headers/header-info' );
					}

				?>
			</div>

		</div>

		<?php 
		}

		if( '1' === $transparent_header || 'show' === $transparent_header ){
			echo '</div>';
		}

		return ob_get_clean();

	}
	add_shortcode( 'amz_header', 'amz_header' );

	function amz_header_list ( $atts, $content = null ) {
		extract( shortcode_atts( array(
			'header_layout' => 'header-1',
			'top_header' => 0,
			'top_header_position' => 'top',
			'img_url' => '',
			'dark_img_url' => ''
		), $atts ) );

		ob_start();

			echo do_shortcode("

					[amz_header header_layout='".$header_layout."' header_hover_layout='none' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='drive-nav' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='nav-border' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='nav-double-border' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='right-arrow' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='right-arrow cross-arrow' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='background-nav' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='background-nav background-nav-round' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='solid-color-bg' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='square-left-right' header_background_style='light' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>

					[amz_header header_layout='".$header_layout."' header_hover_layout='none' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='drive-nav' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='nav-border' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='nav-double-border' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='right-arrow' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='right-arrow cross-arrow' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='background-nav' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='background-nav background-nav-round' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='solid-color-bg' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>
					[amz_header header_layout='".$header_layout."' header_hover_layout='square-left-right' header_background_style='dark' transparent_header='0'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']<br>

					[amz_header header_layout='".$header_layout."' header_hover_layout='none' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='drive-nav' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='nav-border' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='nav-double-border' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='right-arrow' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='right-arrow cross-arrow' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='background-nav' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='background-nav background-nav-round' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='solid-color-bg' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='square-left-right' header_background_style='dark' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $img_url .");'>&nbsp;</p>

					[amz_header header_layout='".$header_layout."' header_hover_layout='none' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='drive-nav' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='nav-border' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='nav-double-border' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='right-arrow' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='right-arrow cross-arrow' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='background-nav' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='background-nav background-nav-round' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='solid-color-bg' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>
					[amz_header header_layout='".$header_layout."' header_hover_layout='square-left-right' header_background_style='light' transparent_header='1'  transparent_header_opacity='0' top_header='". $top_header ."' top_header_position='". $top_header_position ."']
					<p style='height:300px;background:url(" . $dark_img_url .");'>&nbsp;</p>

				");

		return ob_get_clean();

	}
	add_shortcode( 'amz_header_list', 'amz_header_list' );


	/* =============================================================================
		 Theme Item Shortcodes
	   ========================================================================== */

	function composer_theme_item($atts, $content = null){
		extract(shortcode_atts(array(
			'theme_img'    => '',
			'title'        => '',
			'desc'         => '',
			'preview_link' => '',
			'style'        => '',
			'batch_name'   => '',
		), $atts));

		$btn_att = vc_build_link($preview_link);		
		$btn_att['href'] = (isset($btn_att['url']) && !empty($btn_att['url'])) ? $btn_att['url'] : '#';
		$btn_att['title'] = (isset($btn_att['title'])) ? $btn_att['title'] : 'Preview';
		$btn_att['target'] = (isset($btn_att['target'])) ? $btn_att['target'] : '_blank';

		$output = '<div class="theme-wrap">
					<a href="'. $btn_att['href'] .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').'>
						<div class="theme-img">';

							$img = "";

							$image_thumb_url = wp_get_attachment_image_src( $theme_img, 'full');
							if(!empty($image_thumb_url)){									
								$img = aq_resize($image_thumb_url[0], 430, 550, true, true);
							}
							if($img){
								$temp_thumb = "<img src='$img' alt='' width='430' height='550'>";
							}else{
								$temp_thumb = "<img src='$image_thumb_url[0]' alt=''>";
							}							
							
							$output .= $temp_thumb;

							if( $style == 'date' && ! empty( $batch_name ) ){
								$output .= '<span class="new-batch date-batch">'. $batch_name .'</span>';
							} elseif( $style == 'new' && ! empty( $batch_name ) ) {
								$output .= '<span class="new-batch">'. $batch_name .'</span>';
							} else {
								$output .= '';
							}

							$output .= '
						</div>
					</a>
					<a href="'. $btn_att['href'] .'" '. ((!empty($btn_att['target'])) ? ' target="'. $btn_att['target'] .'"' : '').'>
						<h3 class="theme-title">'. $title .'</h3>
						<p class="theme-desc">'. $desc .'</p>
					</a>
		</div>';



	   	return  $output;

	}

	add_shortcode( 'demo_item', 'composer_theme_item' );

	/* =============================================================================
		Skrollr Shortcodes
	========================================================================== */
	function composer_skroller($atts, $content = null){

		extract( shortcode_atts( array(
			'el_class' => '',
			'elem_width' => '',
			'elem_height' => '',
			'elem_position' => '',
			'elem_top' => '',
			'elem_left' => '',
			'elem_right' => '',
			'elem_bottom' => '',
			'z_index' => '',
			'elem_easing' => '',
			'start_animation' => 'top-bottom',
			'translate_x' => '',
			'translate_y' => '',
			'scale' => '',
			'rotate' => '',
			'opacity' => '',
			'end_animation' => 'bottom-top',
			'translate_x_end' => '',
			'translate_y_end' => '',
			'scale_end' => '',
			'rotate_end' => '',
			'opacity_end' => '',
			'advanced' => 'no',
			'advanced_data' => '',
		), $atts ) );

	$data = '';
	if( $advanced == 'no' ){

$easing = !empty($elem_easing) ? '['. $elem_easing .']' : '' ;

		$data_start = 'data-'. esc_attr( $start_animation ) .'="';
		
		
		if( ( ! empty( $translate_x ) || '0' == $translate_x ) || ( ! empty( $translate_y ) || '0' == $translate_y ) || ( ! empty( $scale ) || '0' == $scale ) || ( ! empty( $rotate ) || '0' == $rotate ) ) {

			$data_start .= 'transform'. $easing .':';

			if( ! empty( $translate_x ) || '0' == $translate_x ) {
				$data_start .= 'translateX('. esc_attr( $translate_x ) .')';
			}

			if( ! empty( $translate_y ) || '0' == $translate_y ) {
				$data_start .= 'translateY('. esc_attr( $translate_y ) .')';
			}

			if( ! empty( $rotate ) || '0' == $rotate ) {
				$data_start .= 'rotate('. esc_attr( $rotate ) .'deg)';
			}

			if( ! empty( $scale ) || '0' == $scale ) {
				$data_start .= 'scale('. esc_attr( $scale ) .')';
			}

			$data_start .= '; ';

		}
			

		if( ! empty( $opacity ) || '0' == $opacity ) {
			$data_start .= 'opacity:'. esc_attr( $opacity ) .';';
		}	

		$data_start .= '"';

		$data_end = 'data-'. esc_attr( $end_animation ) .'="';
		if( ( ! empty( $translate_x_end ) || '0' == $translate_x_end ) || ( ! empty( $translate_y_end ) || '0' == $translate_y_end ) || ( ! empty( $scale_end ) || '0' == $scale_end ) || ( ! empty( $rotate_end ) || '0' == $rotate_end ) ) {

			$data_end .= 'transform'. $easing .':';
			
			if( ! empty( $translate_x_end ) || '0' == $translate_x_end  ) {
				$data_end .= 'translateX('. esc_attr( $translate_x_end ) .')';
			}

			if( ! empty( $translate_y_end ) || '0' == $translate_x_end ) {
				$data_end .= 'translateY('. esc_attr( $translate_y_end ) .')';
			}

			if( ! empty( $rotate_end ) || '0' == $rotate_end ) {
				$data_end .= 'rotate('. esc_attr( $rotate_end ) .'deg)';
			}

			if( ! empty( $scale_end ) || '0' == $scale_end ) {
				$data_end .= 'scale('. esc_attr( $scale_end ) .')';
			}

			$data_end .= '; ';
		}

		if( ! empty( $opacity_end ) || '0' == $opacity_end ) {
			$data_end .= 'opacity:'. esc_attr( $opacity_end ) .';';
		}		

		$data_end .= '"';

		
		$data .= $data_start .' ';
		$data .= $data_end;
	} else{
		$data = $advanced_data;
	}
		$style = '';

	 	if( !empty( $elem_position ) || !empty( $elem_width ) || !empty( $elem_height ) || !empty( $elem_top ) || !empty( $elem_right ) || !empty( $elem_bottom ) || !empty( $z_index ) || !empty( $elem_left ) ){

	 		$style .= ' style="';

	 		$style .= !empty( $elem_position ) ? 'position:'. esc_attr( $elem_position ) .';' : '';

	 		$style .= !empty( $elem_width ) ? 'width:'. esc_attr( $elem_width ) .';' : '';

	 		$style .= !empty( $elem_height ) ? 'height:'. esc_attr( $elem_height ) .';' : '';

	 		$style .= !empty( $elem_top ) ? 'top:'. esc_attr( $elem_top ) .';' : '';

	 		$style .= !empty( $elem_right ) ? 'right:'. esc_attr( $elem_right ).';' : '';

	 		$style .= !empty( $elem_bottom ) ? 'bottom:'. esc_attr( $elem_bottom ) .';' : '';

	 		$style .= !empty( $elem_left ) ? 'left:'. esc_attr( $elem_left ) .';' : '';

	 		$style .= !empty( $z_index ) ? 'z-index:'. esc_attr( $z_index ) .';' : '';

	 		$style .= '"';

	 	}

		$output = '<div class="skroller ' . esc_attr( $el_class ) . '"'. $data .''. $style .'>'. do_shortcode( $content ) .'</div>';

		return $output;
	}

	add_shortcode( 'skroller', 'composer_skroller' );

	/* =============================================================================
		Anything Carousel Shortcodes
	========================================================================== */
	function composer_anything_carousel($atts, $content = null, $code){

		extract(shortcode_atts(array(
			'slides_per_view'   => 1,
			'loop'              => 'false',
			'margin'            => '30',
			'center'            => 'false',
			'stage_padding'     => '0',
			'start_position'    => '0',
			'pagination'        => 'true',
			'touch_drag'        => 'true',
			'mouse_drag'        => 'true',
			'stop_on_hover'     => 'true',
			'slide_arrow'       => 'true',
			'slide_arrow_style' => 'arrow-style-1',
			'slide_speed'       => '5000',
			'autoplay'          => 'false',
			'animate_out'       => 'false',
			'animate_in'        => 'false',
			'anything_css'      => ''
		),$atts));

	 	if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $anything_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );
		}

		$slides_per_view = ( $slides_per_view && is_numeric( $slides_per_view ) ) ? $slides_per_view : 3;

		$slider_data = ' data-items="'. esc_attr( $slides_per_view ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';

		$animateClass = ( $animate_in != 'false' ) ? ' amz-owl-animate' : '';

		$output = '<div class="owl-carousel row-carousel '. $slide_arrow_style .'' . esc_attr( $animateClass ) . ( ( $pagination == 'false' ) ? ' no-pagi-carousel' : '' ) .' ' . $css_class . '"'. $slider_data .'>';
			$output .= do_shortcode( $content );
		$output .= '</div>';
		return $output;
	}

	add_shortcode( 'anything_carousel', 'composer_anything_carousel' );

	/* =============================================================================
		Anything Carousel Shortcodes
	========================================================================== */
	function composer_image_carousel($atts, $content = null, $code){

		extract(shortcode_atts(array(
			'images'            => '',
			'img_size'          => 'medium',
			'large_img_size'    => 'large',
			'onclick'           => 'link_image',
			'slides_per_view'   => 4,
			'loop'              => 'false',
			'margin'            => '30',
			'center'            => 'false',
			'stage_padding'     => '0',
			'start_position'    => '0',
			'pagination'        => 'true',
			'touch_drag'        => 'true',
			'mouse_drag'        => 'true',
			'stop_on_hover'     => 'true',
			'slide_arrow'       => 'true',
			'slide_arrow_style' => 'arrow-style-1',
			'slide_speed'       => '5000',
			'autoplay'          => 'false',
			'animate_out'       => 'false',
			'animate_in'        => 'false',
			'anything_css'      => ''
		),$atts));

	 	if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $anything_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );
		}

		$slides_per_view = ( $slides_per_view && is_numeric( $slides_per_view ) ) ? $slides_per_view : 3;

		$slider_data = ' data-items="'. esc_attr( $slides_per_view ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';

		$animateClass = ( $animate_in != 'false' ) ? ' amz-owl-animate' : '';

		$output = '<div class="owl-carousel row-carousel '. $slide_arrow_style .'' . esc_attr( $animateClass ) . ( ( $pagination == 'false' ) ? ' no-pagi-carousel' : '' ) .' ' . $css_class . '"'. $slider_data .'>';
			
			$images = explode( ',', $images );	

			$thumbnail = $img = $large_img_src = $link_start = $link_end = '';

			$pretty_rel_random = ' data-rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"';	

			if( function_exists('vc_asset_url') ) {
				$default_src = vc_asset_url( 'vc/no_image.png' );
			} else {
				$default_src = '';
			}

			if ( 'link_image' === $onclick ) {
				wp_enqueue_script( 'prettyphoto' );
				wp_enqueue_style( 'prettyphoto' );
			}

			foreach ( $images as $i => $image ) {

				if ( $image > 0 ) {

					if( function_exists('wpb_getImageBySize') ){
						$img = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => $img_size ) );					
						$thumbnail = $img['thumbnail'];
						//$large_img_src = wp_get_attachment_image_src( $image, 'full' )[0];
						//$large_img_src = aq_resize( $icon_image_url[0], $width, $height, true, true ); 
						// $large_img_src = wpb_getImageBySize( array( 'attach_id' => $image, 'thumb_size' => $large_img_size ) );	
						$large_img_src_attr = wp_get_attachment_image_src( $image, $large_img_size );
						$large_img_src = $large_img_src_attr[0];

						if( 'link_image' === $onclick ){
							$link_start = '<a class="prettyphoto" href="' . $large_img_src . '"' . $pretty_rel_random . '>';
							$link_end = '</a>';
						}
						
					}

				} else {
					$large_img_src = $default_src;
					$thumbnail = '<img src="' . $default_src . '" />';
				}

				$output .= '<div>' . $link_start . $thumbnail . $link_end . '</div>';

			}

		$output .= '</div>';
		return $output;
	}

	add_shortcode( 'composer_image_carousel', 'composer_image_carousel' );

	/* =============================================================================
		Slider Shortcodes
	========================================================================== */
	function composer_slider($atts, $content = null, $code){
		extract(shortcode_atts(array(
			'pagination'        => 'true',
			'slide_arrow'       => 'false',
			'slide_arrow_style' => 'arrow-style-1',
			'autoplay'          => 'false',
			'slide_speed'       => '5000',
			'autoplay_pause'    => 'true',
			'loop'              => 'true'
		),$atts));
		$output = '<div class="composer-primary-slider '. $slide_arrow_style .'" data-items="1" data-loop="'. esc_attr( $loop ) .'" data-autoplay="'. esc_attr( $autoplay ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay_hover_pause="'. esc_attr( $autoplay_pause ) .'" data-dots="'. esc_attr( $pagination ) .'">';
			$output .= do_shortcode( $content );
		$output .= '</div>';
		return $output;
	}

	add_shortcode( 'slider', 'composer_slider' );

	/* =============================================================================
		Slide Shortcodes
	========================================================================== */
	function composer_slide($atts, $content = null, $code){
		extract(shortcode_atts(array(
			'align' => '',
			'title' => '',
			'header_text' => 'black',
			'title' => '',
			'title_color' => '',
			'content_color' => '',
			'display_button' => 'yes',
			'button_link'  => '',
			'button_style' => 'outline',
			'button_hover_style' => 'outline',
			'button_type' => 'oval',
			'button_color' => 'color',
			'button_hover_color' => 'color',
			'button_align' => '',
			'custom_size' => 'no',
			'font_size' => '',
			'padding_custom' => '',
			'btn_bg_color' => '',
			'btn_text_color' => '',
			'btn_border_color' => '',
			'target' => '_self',
			'slide_css' => '',
			'enable_header_text' => 'yes'
		),$atts));

		$css_class = $font_class = $font = $data = '';

		if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $slide_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );
		}		

		if( $enable_header_text == 'yes' ) {
			$data = ' data-header="' . esc_attr( $header_text ) . '"';
		} 

		if( $title_color != '' ){
			$title_color = ' style="color:'. esc_attr( $title_color ) .';"';
		}

		if( $content_color != '' ){
			$content_color = ' style="color:'. esc_attr( $content_color ) .';"';
		}


		if($custom_size == "yes" || $button_color == "custom_color"){
			$font = 'style="';
		}

		if($custom_size == "yes"){
			$font_class = " btn-custom";
			$font .= 'font-size:'. esc_attr( $font_size ) .';';
			$font .= 'padding: '. esc_attr( $padding_custom ) .';';
		}

		if($button_color == "custom_color"){
			$font .= 'background-color:'. esc_attr( $btn_bg_color ) .';';
			$font .= 'color: '. esc_attr( $btn_text_color ) .';';
			$font .= 'border-color: '. esc_attr( $btn_border_color ) .';';
		}

		if($custom_size == "yes" || $button_color == "custom_color"){
			$font .= '"';
		}

		$output = '<div class="slider-content '. esc_attr( $align ) .' ' . $css_class . '"' . $data . '>';

			$output .= '<div class="slider-wrap"><div class="slider-wrap-inner">';

				$output .= '<h2 class="slide-title"'. $title_color .'>'. wp_kses_post( $title, array( 'br' => array() ) ) .'</h2>';
				$output .= '<p class="slide-content"'. $content_color .'>'. esc_html( $content ). '</p>';
			
			
				if ( function_exists( 'vc_build_link' ) ) {
					$btn_att = vc_build_link( $button_link );
					$btn_att['href'] = ( isset( $btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
					$btn_att['title'] = ( isset( $btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__( 'Read More','amz-composer-plugins' );
					$btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : '';
					
					if( $display_button == 'yes' && !empty( $btn_att['href'] ) ){
						$output .= '<div class="pix_button '. esc_attr( $button_align ) .'"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty($btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '').' class="clear btn btn-'. esc_attr( $button_style ) .' btn-hover-'. esc_attr( $button_hover_style ) .' btn-'. esc_attr( $button_type ) .' '. esc_attr( $button_color ).' btn-hover-'. esc_attr( $button_hover_color ).''. $font_class .'"'. $font .'>'. esc_html( $btn_att['title'] ) .'</a></div>';
					}
				}

			$output .= '</div></div>';
		
		$output .= '</div>';

		return $output;

	}

	add_shortcode( 'slide', 'composer_slide' );

	/* =============================================================================
		Video Carousel Shortcodes
	========================================================================== */
	function composer_video_carousel($atts, $content = null, $code){

		extract(shortcode_atts(array(
			'video_url'         => '',
			'video_height'      => '400px',
			'slides_per_view'   => 1,
			'layout_style'      => 'big-center',
			'loop'              => 'true',
			'margin'            => '30',
			'center'            => 'true',
			'stage_padding'     => '0',
			'start_position'    => '0',
			'pagination'        => 'true',
			'touch_drag'        => 'true',
			'mouse_drag'        => 'true',
			'stop_on_hover'     => 'true',
			'slide_arrow'       => 'true',
			'slide_arrow_style' => 'arrow-style-1',
			'slide_speed'       => '5000',
			'autoplay'          => 'false',
			'animate_out'       => 'false',
			'animate_in'        => 'false',
			'anything_css'      => ''
		),$atts));

	 	if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $anything_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );
		}

		$slider_data = ' data-items="'. esc_attr( $slides_per_view ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'" data-video="true"';

		$animateClass = ( $animate_in != 'false' ) ? ' amz-owl-animate' : '';

		$video_url = ( $video_url ) ? explode(',', $video_url) : '';

		$output = '';

		if ( !empty( $video_url ) ) {

			$output .= '<div class="owl-carousel video-carousel '. $layout_style .' '. $slide_arrow_style .'' . esc_attr( $animateClass ) . ( ( $pagination == 'false' ) ? ' no-pagi-carousel' : '' ) .' ' . $css_class . '" style="height: '. $video_height .'" '. $slider_data .'>';

				foreach ($video_url as $key => $url) {
					$output .= '<div class="item-video">';
						$output .= '<a class="owl-video" href="'. esc_url( $url ) .'"></a>';		
					$output .= '</div>';
				}
				
			$output .= '</div>';

		}

		return $output;
	}

	add_shortcode( 'video_carousel', 'composer_video_carousel' );

	/* =============================================================================
		Blockquote Shortcodes
	========================================================================== */
	function composer_quote( $atts, $content = null ){
		extract( shortcode_atts( array(
			'align' => 'left',
			'author_name' => ''
		),$atts ) );
		$output = '<blockquote class="pull-'. esc_attr( $align ) .'"><p>'. do_shortcode( $content );
		if( !empty( $author_name ) ) {
		$output .='<small class="">'. esc_html( $author_name ) .'</small>';
		}
		$output .='</p></blockquote><div class="clear"></div>';
		return $output;
	}

	add_shortcode( 'quote', 'composer_quote' );

	/* =============================================================================
		Highlight Shortcodes
	========================================================================== */
	function composer_highlight( $atts, $content = null, $code ){   
	   $output = '<span class="highlight">'. esc_html( trim( $content ) ) .'</span>';	
	   return $output;
	}

	add_shortcode( 'highlight', 'composer_highlight' );

	/* =============================================================================
		Tool-tip Shortcodes
	========================================================================== */
	function composer_tooltip( $atts, $content = null ){	
		extract( shortcode_atts( array(
			'link'  => '#',
			'tooltip_title' => 'title',
			'tooltip_content' => 'content goes here',
			'align' => ''
		), $atts ) );
		
		$output  = '<a href="'. esc_url( $link ) .'" rel="tooltip" data-placement="'. esc_attr( $align ) .'" class="tool-tip" data-original-title="'. esc_attr( $tooltip_content ) .'">'. esc_html( $tooltip_title ) .'</a>';
		return $output;
	}

	add_shortcode( 'tooltip', 'composer_tooltip' );

	/* =============================================================================
		Youtube and Vimeo Popup Shortcodes
	========================================================================== */
	function composer_video_popup( $atts, $content = null ){	
		extract( shortcode_atts( array(
			'url'  => '',
			'text' => esc_html__( 'Title', 'amz-composer-plugins' ),
			'text_size' => '',
			'text_letter_spacing' => '',
			'text_padding' => '',
			'text_color' => '',
			'icon_name' => '',
			'icon_size' => '',
			'icon_bg_color' => '',
			'icon_color' => '',
			'icon_border_width' => '',
			'icon_border_style' => '',
			'icon_border_color' => '',
			'icon_width' => '',
			'icon_height' => '',
			'icon_line_height' => '',
			'icon_border_radius' => '',
			'align' => 'center',
			'video_popup_bg' => '',
			'width' => 300,
			'height' => 200
		), $atts ) );

		$text_title = $icon = $video_popup_img = $video_popup_class = $custom_text_style = $custom_icon_style = '';
		if( !empty( $video_popup_bg ) ) {
			if( function_exists( 'composer_get_image_by_id' ) ) {
				$video_popup_img = composer_get_image_by_id( (int)$width, (int)$height, $video_popup_bg, false );
				$video_popup_class = ' video_center_image';
			}
		}

		if ( !empty($text_size) || !empty($text_letter_spacing) || !empty($text_padding) ) {
			$custom_text_style .= ' style="';
			$custom_text_style .= ( !empty( $text_size ) ) ? ' font-size: '. $text_size .';': '';
			$custom_text_style .= ( !empty( $text_letter_spacing ) ) ? ' letter-spacing: '. $text_letter_spacing .';': '';
			$custom_text_style .= ( !empty( $text_padding ) ) ? ' padding: '. $text_padding .';': '';
			$custom_text_style .= ( !empty( $text_color ) ) ? ' color: '. $text_color .';': '';
			$custom_text_style .= '"';
		}

		if ( !empty($icon_size) || !empty($icon_bg_color) || !empty($icon_color) || !empty($icon_border_width) || !empty($icon_border_style) || !empty($icon_border_color) || !empty($icon_width) || !empty($icon_height) || !empty($icon_line_height) || !empty($icon_border_radius) ) {
			$custom_icon_style .= ' style="';
			$custom_icon_style .= ( !empty( $icon_size ) ) ? ' font-size: '. $icon_size .';': '';
			$custom_icon_style .= ( !empty( $icon_bg_color ) ) ? ' background-color: '. $icon_bg_color .';': '';
			$custom_icon_style .= ( !empty( $icon_color ) ) ? ' color: '. $icon_color .';': '';
			$custom_icon_style .= ( !empty( $icon_border_width ) ) ? ' border-width: '. $icon_border_width .';': '';
			$custom_icon_style .= ( !empty( $icon_border_style ) ) ? ' border-style: '. $icon_border_style .';': '';
			$custom_icon_style .= ( !empty( $icon_border_color ) ) ? ' border-color: '. $icon_border_color .';': '';
			$custom_icon_style .= ( !empty( $icon_width ) ) ? ' width: '. $icon_width .';': '';
			$custom_icon_style .= ( !empty( $icon_height ) ) ? ' height: '. $icon_height .';': '';
			$custom_icon_style .= ( !empty( $icon_line_height ) ) ? ' line-height: '. $icon_line_height .';': '';
			$custom_icon_style .= ( !empty( $icon_border_radius ) ) ? ' border-radius: '. $icon_border_radius .';': '';
			$custom_icon_style .= '"';
		}

		if( !empty( $icon_name ) ){
			$icon = '<span class="icon-popup"'. $custom_icon_style .'><i class="video-popup-icon '. esc_attr( $icon_name ) .'"></i></span>';
		}

		if ( !empty( $text ) ) {
			$text_title = '<span class="text-popup"'. $custom_text_style .'>'. esc_html( $text ) .'</span>';
		}
		
		$output  = '<div class="align-'. esc_attr( $align ) .' popup-icon '. esc_attr( $video_popup_class ) .'"><a href="'. esc_url( $url ) .'" class="video-icon popup-video">'. $video_popup_img .'<div class="video-content"><div class="video-content-inner">'. $icon .''. $text_title .'</div></div></a></div>';
		return $output;
	}

	add_shortcode( 'video_popup', 'composer_video_popup' );

	/* =============================================================================
		Dropcaps Shortcodes
	========================================================================== */
	function composer_dropcaps( $atts, $content = null, $code ){
		extract( shortcode_atts( array(
		"style" => 'default',
		), $atts ) ); 
		return '<span class="dropcaps '. esc_attr( $style ) . '">' . esc_html( $content ) . '</span>';
	}

	add_shortcode( 'dropcaps', 'composer_dropcaps' );

	/* =============================================================================
		Emphasis Shortcodes
	========================================================================== */
	function composer_emphasis( $atts, $content = null, $code ){
		return '<div class="emphasis">'. do_shortcode( $content ) .'</div>';
	}
	
	add_shortcode( 'emphasis', 'composer_emphasis' );

	/* =============================================================================
		 Animation Shortcodes
	   ========================================================================== */
	function composer_animation( $atts, $content= null ){
		extract( shortcode_atts( array(
			'transition' => 'fadeIn',
			'duration' => '',
			'delay' => ''
			), $atts ) );


		$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

		$slide_duration = isset($duration) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

		$slide_delay = isset($delay) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';


		$output = '<div class="pix-animate-cre"'. $slide_transition .''. $slide_duration .''. $slide_delay .'>'. do_shortcode( trim( $content ) ) .'</div>';

		return $output;
	}

	add_shortcode( 'animation', 'composer_animation' );

	/* =============================================================================
		 Social Shortcodes
	   ========================================================================== */

	function composer_social( $atts, $content = null ){	
		extract( shortcode_atts( array(
			'size' => 'normal',
			'style' => 'style1',
			'align' => 'left',
			'width' => '',
			'height' => '',
			'font_size' => '',
			'line_height' => '',
			'border_radius' => '',
			'color' => '',
			'bg_color' => '',
			'border_width' => '',
			'border_style' => '',
			'border_color' => '',
			'margin' => '',
			'facebook'  => '',
			'twitter' => '',
			'gplus' => '',
			'linkedin' => '',
			'dribble' => '',
			'flickr' => '',
			'pinterest' => '',
			'tumblr' => '',
			'instagrem' => '',		
			'rss' => ''
		), $atts ) );

		$custom_style = '';

		if( $size == 'custom' ) {
			if( !empty( $width ) || !empty( $height ) || !empty( $font_size ) || !empty( $line_height ) || !empty( $border_radius ) || !empty( $color ) || !empty( $bg_color ) || !empty( $border_width ) || !empty( $border_style ) || !empty( $border_color ) ){
				$custom_style = ' style="';
				$custom_style .= ( !empty( $width ) ) ? ' width: '. $width .';': '';
				$custom_style .= ( !empty( $height ) ) ? ' height: '. $height .';': '';
				$custom_style .= ( !empty( $font_size ) ) ? ' font-size: '. $font_size .';': '';
				$custom_style .= ( !empty( $line_height ) ) ? ' line-height: '. $line_height .';': '';
				$custom_style .= ( !empty( $border_radius ) ) ? ' border-radius: '. $border_radius .';': '';
				$custom_style .= ( !empty( $bg_color ) ) ? ' background-color: '. $bg_color .';': '';
				$custom_style .= ( !empty( $border_width ) ) ? ' border-width: '. $border_width .';': '';
				$custom_style .= ( !empty( $border_style ) ) ? ' border-style: '. $border_style .';': '';
				$custom_style .= ( !empty( $border_color ) ) ? ' border-color: '. $border_color .';': '';
				$custom_style .= ( !empty( $color ) ) ? ' color: '. $color .';': '';
				$custom_style .= ( !empty( $margin ) ) ? ' margin: '. $margin .';': '';
				$custom_style .= '"';
			}
		}

		//staff social icons
		$social_icons = '<div class="social-full '. esc_attr( $size ) .'-icon '. esc_attr( $style ) .' '. esc_attr( $align ) .'"><div class="social-icons">';

		if( !empty( $facebook ) ) {
			$social_icons .= '<a href="'. esc_url( $facebook ) .'" target="_blank" class="facebook"'. $custom_style .'><i class="pixicon-facebook"></i></a>';
		}

		if( !empty($twitter)) {
			$social_icons .= '<a href="'. esc_url( $twitter ) .'" target="_blank" class="twitter"'. $custom_style .'><i class="pixicon-twitter"></i></a>';
		}

		if( !empty($gplus)) {
			$social_icons .= '<a href="'. esc_url( $gplus ) .'" target="_blank" class="google-plus"'. $custom_style .'><i class="pixicon-gplus"></i></a>';
		}

		if( !empty($linkedin)) {
			$social_icons .= '<a href="'. esc_url( $linkedin ) .'" target="_blank" class="linkedin"'. $custom_style .'><i class="pixicon-linked-in"></i></a>';
		}

		if( !empty($dribble)) {
			$social_icons .= '<a href="'. esc_url( $dribble ) .'" target="_blank"  class="dribbble"'. $custom_style .'><i class="pixicon-dribbble"></i></a>';
		}

		if( !empty($flickr)) {
			$social_icons .= '<a href="'. esc_url( $flickr ) .'" target="_blank" class="flickr"'. $custom_style .'><i class="pixicon-flickr"></i></a>';
		}

		if( !empty($pinterest)) {
			$social_icons .= '<a href="'. esc_url( $pinterest ) .'" target="_blank" class="pinterest"'. $custom_style .'><i class="pixicon-pinterest"></i></a>';
		}

		if( !empty( $tumblr ) ) {
			$social_icons .= '<a href="'. esc_url( $tumblr ) .'" target="_blank" class="tumblr"'. $custom_style .'><i class="pixicon-tumblr"></i></a>';
		}

		if( !empty( $instagrem )) {
			$social_icons .= '<a href="'. esc_url( $instagrem ) .'" target="_blank" class="instagrem"'. $custom_style .'><i class="pixicon-instagram"></i></a>';
		}

		if( !empty( $rss ) ) {
			$social_icons .= '<a href="'. esc_url( $rss ).'" target="_blank" class="rss"'. $custom_style .'><i class="pixicon-rss"></i></a>';
		}

		$social_icons .= '</div></div>';

		return $social_icons;
	}

	add_shortcode( 'social', 'composer_social' );

	/* =============================================================================
	 Line Shortcodes
	 ========================================================================== */
	 function composer_line( $atts, $content = null, $code ){	
	 	extract( shortcode_atts( array(
	 		'width'  => '',
			'align' => 'left alignLeft', //left, right, center
			'thickness' => '1px',
			'color'	=> '',
			'line_style' => 'line-style1',
			'line_css' => ''
		), $atts ) );

	 	$line_border = $style = $css_class = '';

	 	if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $line_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );
		}

	 	if( $width != '50px' || $thickness != '1px' || !empty( $color ) ){

	 		$style .= 'style="';

	 		$style .= ( $width != '75px' && $width != '' ) ? 'width:'. esc_attr( $width ) .';' : '';

	 		$style .= ( $thickness != '1px' ) ? 'height:'. esc_attr( $thickness ) .';' : '';

	 		$style .= ( !empty( $color ) ) ? 'background:'. esc_attr( $color ) .';' : '';

	 		$style .= '"';

	 	}

		//Title Backround Line
	 	if( $line_style =='line-style1' ){
	 		$line_border .= '<div class="line-con '. esc_attr( $align ) . '"><div class="line '. esc_attr( $align ) . ' ' . $css_class  .'" '. $style .'></div></div>';

	 	}elseif ( $line_style =='line-style2' ) {
	 		$line_border .= '<div class="'. esc_attr( $align ) . ' ' . $css_class .'" ><span class="line line-2"></span></div>';

	 	}elseif ($line_style =='line-style3' ) {
	 		$line_border .= '<div class="'. esc_attr( $align ) . ' ' . $css_class  .'"><span class="line line-2 line-3"></span></div>';

	 	}elseif ($line_style =='line-style4' ) {
	 		$line_border .= '<div class="'. esc_attr( $align ) . ' ' . $css_class  .'"><span class="line line-2 line-4"></span></div>';

	 	}elseif ($line_style =='line-style5' ) {
	 		$line_border .= '<div class="'. esc_attr( $align ) . ' ' . $css_class  .'"><div class="line round-sep clearfix">
		 		<span class="round"></span>
		 		<span class="round"></span>
		 		<span class="round"></span>
		 		<span class="round"></span>
		 	</div></div>';  

		}

		return $line_border;
	}

	add_shortcode( 'line', 'composer_line' );

	/* =============================================================================
		 Gradient Button Shortcodes
	   ========================================================================== */

	function composer_gradient_button( $atts, $content = null ){	
		extract( shortcode_atts( array(
			'button_link'  => '',
			'title' => '',
			'button_type' => 'oval',
			'button_size' => 'md',
			'gradient1' => '#33cdd7',
			'gradient2' => '#2f4797',
			'button_align' => '',
			'button_icon' => '',
			'button_icon_align' => 'front',
			'custom_size' => 'no',
			'font_size' => '',
			'padding_custom' => '',
			'animate' => 'no',
			'transition' => 'fadeIn',
			'duration' => '',
			'delay' => ''
		), $atts ) );
		
		$btn_att = vc_build_link( $button_link );
		$btn_att['href'] = ( isset( $btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
		$btn_att['title'] = ( isset($btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__( 'Read More','amz-composer-plugins' );
		$btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : '';

		$animate_class = $slide_transition = $slide_duration = $slide_delay = $icon_btn = $font = $font_class = $button_icon_front = $button_icon_back = $button_icon_class = "";

		if( $animate == "yes" ){

			$animate_class = ' pix-animate-cre';

			$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slide_delay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		if( $button_icon != "" && $button_icon_align == 'front' ){
			$button_icon_front = '<span class="btn-icon button-front '. esc_attr( $button_icon ) .'"></span> ';
			$button_icon_class = ' btn-front';
		}elseif( $button_icon != "" && $button_icon_align == 'back' ){
			$button_icon_back = ' <span class="btn-icon '. esc_attr( $button_icon ) .'"></span>';
			$button_icon_class = ' btn-back';
		}

		if( $custom_size == "yes" ){
			$font_class = " btn-custom";
			$font = 'style=';
			$font .= "font-size:". esc_attr( $font_size ) .";";
			$font .= "padding: ". esc_attr( $padding_custom ) .";'";
		}

		$gradient_style = '';

		if( !empty( $gradient1 ) || !empty( $gradient2 ) ) {
		    	if( !empty($gradient1 ) ){
		    		$bg_gradient = $gradient1;
		    	} else {
		    		$bg_gradient = $gradient2;
		    	}
				$gradient_style .= ' style="';
		    	$gradient_style .= 'background: '. esc_attr( $bg_gradient ) .';
				    background: -webkit-linear-gradient(left, '. esc_attr( $gradient1 ) .','. esc_attr( $gradient2 ) .');
				    background: -o-linear-gradient(left, '. esc_attr( $gradient1 ) .','. esc_attr( $gradient2 ) .');
				    background: -moz-linear-gradient(left, '. esc_attr( $gradient1 ) .','. esc_attr( $gradient2 ) .');
				    background: linear-gradient(left, '. esc_attr( $gradient1 ) .','. esc_attr( $gradient2 ) .');';
				$gradient_style .= '"';
			}
		
		$output  = '<div class="pix_button '. esc_attr( $button_align ) .'"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '') .' class="clear btn btn-gradient btn-'. esc_attr( $button_type ) .' '. esc_attr( $button_icon_class ) .' btn-'. esc_attr( $button_size ) .' '. esc_attr( $animate_class ) .''. esc_attr( $font_class ) .'"'. $slide_transition .''. $slide_duration .''. $slide_delay .''. $font .''. $gradient_style .'>'. $button_icon_front .''. esc_html( $btn_att['title'] ) .''. $button_icon_back .'</a></div>';
		return $output;
	}

	add_shortcode( 'gradient_button', 'composer_gradient_button' );

	/* =============================================================================
		 Button Shortcodes
	   ========================================================================== */

	function composer_button( $atts, $content = null ){	
		extract( shortcode_atts( array(
			'button_link'  => '',
			'title' => '',
			'button_style' => 'outline',
			'button_hover_style' => 'outline',
			'button_type' => 'oval',
			'button_size' => 'md',
			'button_color' => 'color',
			'button_hover_color' => 'color',
			'button_align' => '',
			'button_icon' => '',
			'button_icon_align' => 'front',
			'custom_size' => 'no',
			'font_size' => '',
			'padding_custom' => '',
			'btn_bg_color' => '',
			'btn_text_color' => '',
			'btn_border_color' => '',
			'target' => '_self',
			'animate' => 'no',
			'transition' => 'fadeIn',
			'duration' => '',
			'delay' => ''
		), $atts ) );
		
		$btn_att = vc_build_link( $button_link );
		$btn_att['href'] = ( isset($btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
		$btn_att['title'] = ( isset($btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__( 'Read More','amz-composer-plugins' );
		$btn_att['target'] = ( isset($btn_att['target'] ) ) ? $btn_att['target'] : '_self';

		$animate_class = $slide_transition = $slide_duration = $slide_delay = $icon_btn = $font = $font_class = $button_icon_front = $button_icon_back = $button_icon_class = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slide_delay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		if( $button_icon != "" && $button_icon_align == 'front' ){
			$button_icon_front = '<span class="btn-icon button-front '. esc_attr( $button_icon ) .'"></span> ';
			$button_icon_class = ' btn-front';
		}elseif( $button_icon != "" && $button_icon_align == 'back' ){
			$button_icon_back = ' <span class="btn-icon '. esc_attr( $button_icon ) .'"></span>';
			$button_icon_class = ' btn-back';
		}


		if($custom_size == "yes" || $button_color == "custom_color"){
			$font = 'style="';
		}

		if($custom_size == "yes"){
			$font_class = " btn-custom";
			$font .= 'font-size:'. esc_attr( $font_size ) .';';
			$font .= 'padding: '. esc_attr( $padding_custom ) .';';
		}

		if($button_color == "custom_color"){
			$font .= 'background-color:'. esc_attr( $btn_bg_color ) .';';
			$font .= 'color: '. esc_attr( $btn_text_color ) .';';
			$font .= 'border-color: '. esc_attr( $btn_border_color ) .';';
		}

		if($custom_size == "yes" || $button_color == "custom_color"){
			$font .= '"';
		}
		
		$output  = '<div class="pix_button '. esc_attr( $button_align ) .'"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '' ).' class="clear btn btn-'. esc_attr( $button_style ) .' btn-hover-'. esc_attr( $button_hover_style ) .' btn-'. esc_attr( $button_type ) .' '. esc_attr( $button_icon_class ) .' btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ).' btn-hover-'. esc_attr( $button_hover_color ).''. esc_attr( $animate_class ) .''. esc_attr( $font_class ) .'"'. $slide_transition .''. $slide_duration .''. $slide_delay .''. $font .'>'. $button_icon_front .''. esc_html( $btn_att['title'] ) .''. $button_icon_back .'</a></div>';
		return $output;
	}

	add_shortcode( 'button', 'composer_button' );

	/* =============================================================================
		 Call Out Box Shortcodes
	   ========================================================================== */

	function composer_callout_box( $atts, $content = null ){
		extract( shortcode_atts( array(
			'el_class' => '',
			'animate' => '',
			'transition' => 'fadeIn',
			'duration' => '',
			'delay' => '',
			'callout_style' => 'default',
			'callout_align' => 'center',
			'title' => 'Title goes here',
			'title_tag' => 'h2',
			'display_button' => 'yes',
			'button_link'  => '',
			'button_style' => 'outline',
			'button_hover_style' => 'outline',
			'button_type' => 'oval',
			'button_color' => 'color',
			'button_hover_color' => 'color',
			'button_size' => 'md',
			'button_icon' => '',
			'button_icon_align' => 'front'
		), $atts ) );

		$btn_att = vc_build_link( $button_link );
		$btn_att['href'] = ( isset($btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
		$btn_att['title'] = ( isset($btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__( 'Read More','amz-composer-plugins' );
		$btn_att['target'] = ( isset($btn_att['target'] ) ) ? $btn_att['target'] : '';

		$animate_class = "";
		$slide_transition = "";
		$slide_duration = "";
		$slide_delay = "";

		if($animate == "yes"){

			$animate_class = ' pix-animate-cre';

			$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slide_duration = isset($duration) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slide_delay = isset($delay) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		$button = $button_icon_front = $button_icon_back = $button_icon_class = "";

		if( $button_icon != "" && $button_icon_align == 'front' ){
			$button_icon_front = '<span class="btn-icon button-front '. esc_attr( $button_icon ) .'"></span> ';
			$button_icon_class = 'btn-front';
		}elseif( $button_icon != "" && $button_icon_align == 'back' ){
			$button_icon_back = ' <span class="btn-icon '. esc_attr( $button_icon ) .'"></span>';
			$button_icon_class = 'btn-back';
		}

		if( $display_button == 'yes' && !empty($btn_att['href'] ) ){
			$button = '<p class="sepCenter"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '' ).' class="clear btn btn-'. esc_attr( $button_style ) .' btn-hover-'. esc_attr( $button_hover_style ) .' btn-'. esc_attr( $button_type ) .' '. esc_attr( $button_icon_class ) .' btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ).' btn-hover-'. esc_attr( $button_hover_color ).'">'. $button_icon_front .''. esc_html( $btn_att['title'] ) .''. $button_icon_back .'</a></p>';
		}

		if( $content ) {
			$add_content_class = '';
			$content_class = wpb_js_remove_wpautop( $content );
		}else {			
			$add_content_class = ' no-content';
			$content_class = '';
		}
		
		$output  = '<section class="callOut newSection '. esc_attr( $el_class ) .' '. esc_attr( $callout_style ) .' '. esc_attr( $callout_align ) .' '. esc_attr( $animate_class ) .''. esc_attr( $add_content_class ) .'"'. $slide_transition .''. $slide_duration .''. $slide_delay .'>';
		$output .= '<div class="callout-content">';
		$output .= '<'. composer_title_tag( $title_tag ) .' class="title">'. esc_html( $title ) .'</'. composer_title_tag( $title_tag ) .'>';
		$output .= $content_class;
		$output .= '</div>';
		$output .= '<div class="buttons clearfix">'. $button .'</div>';
		$output .= '</section>';

		return $output;
	}

	add_shortcode( 'callout_box', 'composer_callout_box' );

	/* =============================================================================
		Gradient Text Shortcodes
	========================================================================== */
	function composer_gradient_text( $atts, $content = null, $code ){
		extract(shortcode_atts( array(
			'title' => '',
			'align' => '',
			'font_size' => '',
			'font_weight' => '',
			'gradient1' => '#33cdd7',
			'gradient2' => '#2f4797',
			'animate' => 'no',
			'transition' => 'fadeIn',
			'duration' => '',
			'delay' => ''
		),$atts ) );

		if( !empty( $gradient1 ) || !empty( $gradient2 ) ) {
	    	if( !empty( $gradient1 ) ){
	    		$bg_gradient = $gradient1;
	    	} else {
	    		$bg_gradient = $gradient2;
	    	}
	    	$style = 'color:'. esc_attr( $bg_gradient ) .';
				    background: -webkit-linear-gradient(left, '. esc_attr( $gradient1 ) .','. esc_attr( $gradient2 ) .');background-color:transparent;';
		    if( !empty( $overlay_opacity ) ) {
			    $style .= 'opacity: '. esc_attr( $overlay_opacity ) .';';
			}
			if( !empty( $font_weight ) ) {
			    $style .= 'font-weight: '. esc_attr( $font_weight ) .';';
			}
			if( !empty($font_size) ) {
			    $style .= 'font-size: '. esc_attr( $font_size ) .';';
			}
	        return '<div class="gradient-text-con '. esc_attr( $align ) . '"><div class="gradient-text" style="'. $style .'">'. esc_html( $title ) .'</div></div>';     
	    }
	}

	add_shortcode( 'gradient_text', 'composer_gradient_text' );

	/* =============================================================================
		 Icon Shortcodes
	   ========================================================================== */

	function composer_icon($atts, $content= null){
		extract(shortcode_atts(array(
			'animate'           => 'no',
			'transition'        => 'fadeIn',
			'duration'          => '',
			'delay'             => '',
			'align'             => 'center',
			'icon_name'         => '',
			'icon_style'        => 'bg-none',
			'icon_type'         => 'icon-circle',
			'icon_color'        => '',
			'icon_size'         => '',
			'icon_bg_color'     => '',
			'icon_border_color' => '',
			'icon_link'         => '',
			'gradient1'         => '#33cdd7',
			'gradient2'         => '#2f4797',
			'title'             => '',
			'title_tag'         => 'h2',
			'text_font'         => '',
			'text_color'        => '',
			'margin'            => ''
		), $atts));

		$animate_class = $slide_transition = $slide_duration = $slide_delay = "";

		if( $animate == "yes" ){

			$animate_class = ' pix-animate-cre';

			$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slide_delay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		$custom_text_style = '';
		if( $text_font != '' || $text_color != '' || $margin != '' ){

			$custom_text_style .= ' style="';

			$custom_text_style .= ( $text_font != '' ) ? 'font-size:'. esc_attr( $text_font ) .';' : '';

			$custom_text_style .= ( $text_color != '' ) ? 'color:'. esc_attr( $text_color ) .';' : '';

			$custom_text_style .= ( $margin != '' ) ? 'margin:'. esc_attr( $margin ) .';' : '';

			$custom_text_style .= '"';

		}

		$custom_icon_style = '';
		if($icon_size != '' || $icon_color != '' || $icon_bg_color != '' || $icon_border_color != '' || $gradient1 != '' || $gradient2 != '' ){

			$custom_icon_style .= ' style="';

			$custom_icon_style .= ( $icon_size != '' ) ? 'font-size:'. esc_attr( $icon_size ) .';' : '';

			$custom_icon_style .= ( $icon_color != '' ) ? 'color:'. esc_attr( $icon_color ) .';' : '';

			$custom_icon_style .= ( $icon_bg_color != '' ) ? 'background:'. esc_attr( $icon_bg_color ) .';' : '';

			if( ( 'gradient' == $icon_style && !empty( $gradient1 ) ) || ( 'gradient' == $icon_style && !empty( $gradient2 ) ) ) {
		    	if( !empty( $gradient1 ) ){
		    		$bg_gradient = $gradient1;
		    	} else {
		    		$bg_gradient = $gradient2;
		    	}
		    	$custom_icon_style .= 'color:'. esc_attr( $bg_gradient ) .';
	    				       background: -webkit-linear-gradient(left, '. esc_attr( $gradient1 ) .','. esc_attr( $gradient2 ) .');';
			}

			$custom_icon_style .= ( $icon_border_color != '' ) ? 'border-color:'. esc_attr( $icon_border_color ) .';' : '';

			$custom_icon_style .= '"';

		}

		$btn_att = vc_build_link( $icon_link );
		$btn_att['href'] = ( isset($btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '';
		$btn_att['title'] = ( isset( $btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : '';
		$btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : '';

		$output = '<div class="pix-icons clearfix '. esc_attr( $align ) .'">';

		if( !empty( $btn_att['href'] ) ){
			$output .= '<a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty($btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '').'>';
		}

		$output .= '<span class="icon '. esc_attr( $icon_name ) .' '. esc_attr( $icon_style ) .' '. esc_attr( $icon_type ) .'"'. $custom_icon_style .'></span>';

		if( !empty( $btn_att['href'] ) ){
			$output .= '</a>';
		}

		if( $title != '' && $title_tag != '' ){
			$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $custom_text_style .'>'. esc_html( $title ) .'</'. composer_title_tag( $title_tag ) .'>';
		}

		$output .= '</div>';
		
		return $output;
	}

	add_shortcode( 'icon', 'composer_icon' );

	/* =============================================================================
	 Icon Box Shortcodes
   ========================================================================== */

	function composer_icon_box( $atts, $content= null ){
		extract( shortcode_atts( array(
			'el_class'         => '',
			'animate'          => 'no',
			'transition'       => '',
			'duration'         => '',
			'delay'            => '',
			'link_enable_on_box' => 'no',
			'box_url'     => '',
			'icon_image_con'   => 'no',
			'icon_image'       => '',
			'icon_image_style' => 'rectangle',
			'icon_type'        => 'icon',
			'icon_img'         => '',
			'align'            => 'center',
			'icon_align'       => 'no',
			'icon_below'       => 'no', 
			'icon_style'       => 'bg-none',
			'icon_color'       => 'color',
			'icon_name'        => '',
			'icon_hover'       => 'yes',
			'title'            => esc_html__( 'Section Title', 'amz-composer-plugins' ),
			'title_uppercase'  => 'yes',
			'title_tag'        => 'h2',
			'custom_size'      => '',
			'display_button'   => 'yes',
			'button_link'      => '',
			'button_style'     => 'outline',
			'button_hover_style' => 'outline',
			'button_type'      => 'oval',
			'button_size'      => 'md',
			'button_icon_align'=> 'front',
			'button_color'     => 'color',
			'button_hover_color' => 'color',
			'button_icon'      => '',
			'line'             => 'no',
			'line_style'       => 'line-style1'
		), $atts ) );

		$line_border = '';

		//Title Backround Line
	 	if($line_style =='line-style1'){
	 		$line_border .= '<div class="line '. esc_attr( $align ) .'"></div>';

	 	}elseif ($line_style =='line-style2' ) {
	 		$line_border .= '<div class="'. esc_attr( $align ) .'" ><span class="line line-2"></span></div>';

	 	}elseif ($line_style =='line-style3' ) {
	 		$line_border .= '<div class="'. esc_attr( $align ) .'"><span class="line line-2 line-3"></span></div>';

	 	}elseif ($line_style =='line-style4' ) {
	 		$line_border .= '<div class="'. esc_attr( $align ) .'"><span class="line line-2 line-4"></span></div>';

	 	}elseif ($line_style =='line-style5' ) {
		 		$line_border .= '<div class="'. esc_attr( $align ) .'"><div class="line round-sep clearfix">
		 		<span class="round"></span>
		 		<span class="round"></span>
		 		<span class="round"></span>
		 		<span class="round"></span>
		 	</div></div>';  

		}

		$box_url_att = vc_build_link( $box_url );
		$box_url_att['href'] = ( isset($box_url_att['url'] ) && !empty( $box_url_att['url'] ) ) ? $box_url_att['url'] : '#';
		$box_url_att['title'] = ( isset( $box_url_att['title'] ) && !empty( $box_url_att['title'] ) ) ? $box_url_att['title'] : esc_html__('Read More','amz-composer-plugins');
		$box_url_att['target'] = ( isset( $box_url_att['target'] ) ) ? $box_url_att['target'] : '';

		$btn_att = vc_build_link( $button_link );
		$btn_att['href'] = ( isset($btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
		$btn_att['title'] = ( isset( $btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__('Read More','amz-composer-plugins');
		$btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : '';
		$btn_att['rel'] = ( isset( $btn_att['rel'] ) ) ? $btn_att['rel'] : '';

		$animate_class = $slide_transition = $slide_duration = $slide_delay = $icon_image_class = $icon_image_link = $img="";
		if( $icon_align == "yes" ){
			$icon_align = "content-collapse";
		}else{
			$icon_align = '';
		}

		if( $icon_below == "yes" ){
			$icon_below = "icon-below-content";
		}else{
			$icon_below = '';
		}

		if( $animate == "yes" ){

			$animate_class = ' pix-animate-cre';

			$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slide_delay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		$icon_div = "";
		if( $icon_color == 'color' ){
			$icon_div = '<span class="hover-gradient"></span>';
		}

		$hover_icon = '';
		if( $icon_hover == 'yes' ){
			$hover_icon = ' icon_hover';
		}

		if( $icon_image_style == "rectangle" ){
			$width = 600;
			$height = 400;
		}elseif( $icon_image_style == "rounded" ){
			$width = 250;
			$height = 250;
		}

		$icon_image_url = wp_get_attachment_image_src( $icon_image, 'full' );
		if( !empty( $icon_image_url ) ){
			$img = aq_resize( $icon_image_url[0], $width, $height, true, true ); 
		}
		
		if(!$img){
		 	$img = $icon_image_url[0]; 
		}

		$icon_image_class = !empty( $icon_image ) ? '<img class="icon-img-class" src="'. esc_url( $img ) .'" alt="">' : '';

		if( $display_button == 'yes' && $button_link != '' ){
			$icon_image_link = '<div class="icon-center">';				
				if($link_enable_on_box != 'yes' && $button_link != '' ){
					$icon_image_link .= '<a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty($btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '') . ( ( !empty($btn_att['rel'] ) ) ? ' rel="'. esc_attr( $btn_att['rel'] ) .'"' : '').'>';
				}
				$icon_image_link .= '<i class="pixicon-eleganticons-3"></i>';
				if($link_enable_on_box != 'yes' && $button_link != '' ){
					$icon_image_link .= '</a>';
				}
			$icon_image_link .= '</div>';
		}

		$button = $button_icon_front = $button_icon_back = $button_icon_class = "";

		if( $button_icon != "" && $button_icon_align == 'front' ){
			$button_icon_front = '<span class="btn-icon button-front '. esc_attr( $button_icon ) .'"></span> ';
			$button_icon_class = ' btn-front';
		}elseif( $button_icon != "" && $button_icon_align == 'back' ){
			$button_icon_back = ' <span class="btn-icon '. esc_attr( $button_icon ) .'"></span>';
			$button_icon_class = ' btn-back';
		}

		if( $display_button == 'yes' && !empty( $btn_att['href'] ) ){
			$button = '<p class="sepCenter">';
				if($link_enable_on_box != 'yes' && $button_link != ''){
					$button .= '<a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty($btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '') . ( ( !empty($btn_att['rel'] ) ) ? ' rel="'. esc_attr( $btn_att['rel'] ) .'"' : '') . ' class="clear btn btn-'. esc_attr( $button_style ) .' btn-hover-'. esc_attr( $button_hover_style ) .' btn-'. esc_attr( $button_type ) .' '. esc_attr( $button_icon_class ) .' btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ).' btn-hover-'. esc_attr( $button_hover_color ).'">';
				} else {					
					$button .= '<span class="clear btn btn-'. esc_attr( $button_style ) .' btn-hover-'. esc_attr( $button_hover_style ) .' btn-'. esc_attr( $button_type ) .' '. esc_attr( $button_icon_class ) .' btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ).' btn-hover-'. esc_attr( $button_hover_color ).'">';
				}
					$button .= $button_icon_front .''. esc_html( $btn_att['title'] ) .''. $button_icon_back;
				if($link_enable_on_box != 'yes' && $button_link != ''){
					$button .= '</a>';
				} else {
					$button .= '</span>';
				}
			$button .= '</p>';
		}

		$output = '<div class="pix_icon_box '. esc_attr( $hover_icon ) .''. esc_attr( $el_class ) .' '. esc_attr( $align ) .' '. esc_attr( $animate_class ) .'"'. $slide_transition .' '. $slide_duration .' '. $slide_delay .'>';	
		if($link_enable_on_box == 'yes' && $box_url != '' ){
			$output .= '<a href="'. esc_url( $box_url_att['href'] ) .'" '. ( ( !empty($box_url_att['target'] ) ) ? ' target="'. esc_attr( $box_url_att['target'] ) .'"' : '').'>';
		}
		if( $icon_image_con != 'yes' && $icon_name != '' ){
			$output .= '<div class="icon100 '. esc_attr( $icon_style ) .' '. esc_attr( $icon_color ) .'">'. $icon_div;
		}elseif( $icon_image_con != 'yes' && $icon_type == 'image' && !empty( $icon_img ) ){
			$output .= '<div class="image '. esc_attr( $icon_image_style ) .'">'. $icon_image_class .''. $icon_image_link;
		}

		if( $icon_image_con == 'yes' && !empty( $icon_image ) ){
			$output .= '<div class="image '. esc_attr( $icon_image_style ) .'">'. $icon_image_class .''. $icon_image_link .'</div>';
		}
		
		if( $icon_image_con != 'yes' && $icon_type == 'icon' && $icon_name != '' ){
			$output .= '<span class="icon '. esc_attr( $icon_name ) .'"></span>';
		}elseif ( $icon_image_con != 'yes' && $icon_type == 'image' && !empty( $icon_img ) ){
			$icon_img = wp_get_attachment_image_src( $icon_img, 'full');
			$output .= '<span class="icon"><img src="'. esc_url( $icon_img[0] ) .'" alt=""></span>';
		}

		if( $icon_image_con != 'yes' && $icon_name != '' ){
			$output .= '</div>';
		}elseif( $icon_image_con != 'yes' && $icon_type == 'image' && !empty( $icon_img ) ){
			$output .= '</div>';
		}
		$output .= '<div class="icon-box-content '. esc_attr( $icon_align ) .' '. esc_attr( $icon_below ) .'">';
		$title_uppercase_class = ( 'yes' == $title_uppercase ) ? ' uppercase': '';
		if( !empty( $custom_size ) ){
			$output .= '<'. composer_title_tag( $title_tag ) .' class="title'. esc_attr( $title_uppercase_class ) .'" style="font-size:'. esc_attr( $custom_size ) .'">'. esc_html( $title ) .'</'. composer_title_tag( $title_tag ) .'>';
			if( $line == 'yes' ){
				$output .= $line_border;
			}
		}else{
			$output .= '<'. composer_title_tag( $title_tag ) .' class="title'. esc_attr( $title_uppercase_class ) .'">'. esc_html( $title ) .'</'. composer_title_tag( $title_tag ) .'>';		
			if($line == 'yes'){
				$output .= $line_border;
			}
		}
		$output .= '<p class="content">'.wpb_js_remove_wpautop( $content ).'</p>';
		$output .= $button;
		$output .= '</div>';
		if( $link_enable_on_box == 'yes' && $box_url != '' ){
			$output .= '</a>';
		}
		$output .= '</div>';
		
		return $output;
	}

	add_shortcode( 'icon_box', 'composer_icon_box' );

	/* =============================================================================
		 Process Shortcodes
	   ========================================================================== */

	function composer_process( $atts, $content = null ){
		extract( shortcode_atts( array(
			'el_class' => '',
			'type' => 'default',
			'style' => 'default',
			'text' => 'number',
			'circle_text' => '01',
			'icon_name' => '',
			'title' => 'title',
			'animate' => '',
			'transition' => 'fadeIn',
			'duration' => '',
			'delay' => '',
			'process_style' => 'nav-style',
			'process_content' => 'no'
		), $atts ) );

		$animate_class = $slide_transition = $slide_duration = $slide_delay = $process_arrow = $arrow_left = $arrow_right = '';

		if( $process_style == 'nav-style' || $process_style == 'nav-style straight' ){
			$process_arrow = ' <div class="'. esc_attr( $process_style ) .'"><p class="center-arrow"></p></div>';
		}elseif($process_style == 'nav-style straight round'){
			$process_arrow = ' <div class="'. esc_attr( $process_style ) .'"><p class="center-arrow"></p></div>';
			$arrow_left = '<span class="round-left"></span>';
			$arrow_right = '<span class="round-right"></span>';
		}

		if($text == "icon"){
			$inner_text = '<span class="process-style '. esc_attr( $icon_name ) .'"></span>';
			$inner_style = $style;
		}elseif($text == "text"){
			$inner_text = '<span class="process-style inner-text">'. esc_html( $title ) .'</span>';
			$inner_style = $style;
		}else{
			$inner_text = '<span class="process-style">'. esc_html( $circle_text ) .'</span>';
			$inner_style = $style;
		}

		if( $animate == "yes" ){

			$animate_class = ' pix-animate-cre';

			$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slide_delay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';
		}
		
		$output = '<div class="process '. esc_attr( $el_class ) .' '. esc_attr( $animate_class ) .'"'. $slide_transition .''. $slide_duration .''. $slide_delay .'><div class="process_circle '. esc_attr( $inner_style ) .' '. esc_attr( $type ) .'"><div class="text hi-icon">'. $arrow_left.' '. $inner_text .' '. $arrow_right.'</div>'. $process_arrow .'</div>';
		if( $text != "text" ){
			$output .= '<p class="title">'. esc_html( $title ) .'</p>';
		}
		if( $process_content == 'yes' ){
			$output .= '<p class="content">'.wpb_js_remove_wpautop( $content ).'</p>';
		}
		$output .= '</div>';
				
		return $output;
		
	}

	add_shortcode( 'process', 'composer_process' );

	/* =============================================================================
		 Pie Chart Shortcodes
	   ========================================================================== */

	function composer_pie_chart( $atts, $content= null ){
		global $pix_theme_pri_color;
		extract( shortcode_atts( array(
			'el_class' => '',
			'percentage' => '90',
			'custom_color'=> 'default',
			'icon_percentage' => 'text',
			'icon_name' => '',
			'icon_font_size' => '',
			'barcolor' => '',
			'animate_duration' => '2000',
			'size' => '200',
			'line_width' => '6',
			'style' => 'style1',
			'linecap' => 'butt',
			'text' =>'',
			'text_position' => ''
		), $atts ) );

		$background_style = $border_style = $inside_style = $inside = $outside = $icon_percent = '';

		if( $custom_color == 'default' ){
			$barcolor = $pix_theme_pri_color;
		}else{
			$border_style = 'style="border-color: '. esc_attr( $barcolor ) .';"';
			$background_style = 'style="background-color: '. esc_attr( $barcolor ) .';"';
		}

		if( $text_position == 'inside' && $icon_percentage != 'icon' ){
			$inside .= $text;
			$inside_style = ' inside-style';
		}else{
			$outside .= '<p class="outside-text">'. esc_html( $text ) .'</p>';
		}

		$output = '<div class="text-con '. esc_attr( $el_class ) .'"><div class="pix-chart '. esc_attr( $style ) .'" data-percent="'. esc_attr( $percentage ) .'" data-bar-color="'. esc_attr( $barcolor ) .'" data-line-width="'. esc_attr( $line_width ) .'" data-track-color="false" data-scale-color="false" data-animate="'. esc_attr( $animate_duration ) .'" data-size="'. esc_attr( $size ) .'" data-line-cap="'. esc_attr( $linecap ) .'">';
		$output .= '<span class="border-top" '. $border_style .'></span>';
		if( $style == "style3" ){
			$output .= '<span class="border-bg" '. $background_style .'></span>';
		}else{
			$output .= '<span class="border-bg" '. $border_style .'></span>';		
		}

		$icon_size = ( $icon_font_size != '' ) ? ' style="font-size:'. $icon_font_size .';"' : '' ;

		if( $icon_percentage == 'text' && !empty($percentage) ){
			$icon_percent .= '<span class="percent-text">'. esc_html( $percentage ) .'</span>';
		} elseif( $icon_percentage == 'icon' && !empty( $icon_name ) && !empty($percentage) ) {
			$icon_percent .= '<span class="percent-icon"'. $icon_size .'><i class="'. esc_attr( $icon_name ) .'"></i></span>';
		}

		$output .= '<p class="percent'. esc_attr( $inside_style .' style-'. $icon_percentage  ) .'">'. $icon_percent . esc_html( $inside ) .'</p></div>
		'. $outside .'</div>'; 	
		
		return $output;
	}

	add_shortcode( 'pie_chart', 'composer_pie_chart' );

	/* =============================================================================
		 List Style
	   ========================================================================== */

	function composer_list( $atts, $content = null, $code ) {
		extract( shortcode_atts( array(
			'el_class' => ''
		),$atts ) );
		$output = '<ul class="list '. esc_attr( $el_class ) .'">'. wpb_js_remove_wpautop( $content ) .'</ul>';
		return $output;
	}

	add_shortcode( 'list', 'composer_list' );

	function composer_li( $atts, $content = null, $code ) {
		extract( shortcode_atts( array(
			'content_size' => '',
			'content_margin' => '',
			'content_color' => '',
			'content_line_height' => '',
			'content_letter_spacing' => '',
			'icon_name' => '',
			'icon_color' => '',
			'icon_size' => '',
			'icon_margin' => '',
			'icon_line_height' => '',
			'user_icon_color' => '',
		),$atts ) );

		$li_item = $icon_item = '';

		if( !empty( $content_size ) || !empty( $content_margin ) || !empty( $content_color ) || !empty( $content_line_height ) || !empty( $content_letter_spacing ) ) {
			$li_item .= ' style="';
				$li_item .= ( !empty( $content_size ) ) ? ' font-size: '. $content_size .';': '';
				$li_item .= ( !empty( $content_margin ) ) ? ' margin: '. $content_margin .';': '';
				$li_item .= ( !empty( $content_color ) ) ? ' color: '. $content_color .';': '';
				$li_item .= ( !empty( $content_line_height ) ) ? ' line-height: '. $content_line_height .';': '';
				$li_item .= ( !empty( $content_letter_spacing ) ) ? ' letter-spacing: '. $content_letter_spacing .';': '';
			$li_item .= '"';
		}

		if( !empty( $icon_size ) || !empty( $icon_margin ) || !empty( $user_icon_color ) ) {
			$icon_item .= ' style="';
				$icon_item .= ( !empty( $icon_size ) ) ? ' font-size: '. $icon_size .';': '';
				$icon_item .= ( !empty( $icon_margin ) ) ? ' margin: '. $icon_margin .';': '';
				$icon_item .= ( $icon_color == 'custom' && !empty( $user_icon_color ) ) ? ' color: '. $user_icon_color .';': '';
				$icon_item .= ( !empty( $icon_line_height ) ) ? ' line-height: '. $icon_line_height .';': '';
			$icon_item .= '"';
		}

		if( !empty( $icon_name ) ){
			$output = '<li class="icon-list"'. $li_item .'><i class="pixicon-icon '. esc_attr( $icon_name ) .' '. esc_attr( $icon_color ) .'" '. $icon_item .'></i>'. wpb_js_remove_wpautop( $content ) .'</li>';
		}else{
			$output = '<li'. $li_item .'>'. wpb_js_remove_wpautop( $content ) .'</li>';
		}
		return $output;
	}

	add_shortcode( 'li', 'composer_li' );

	/* =============================================================================
		 Hover Box
	   ========================================================================== */

	function composer_hover_box( $atts, $content = null, $code ) {
		extract( shortcode_atts( array(
			'front_image'        => '',
			'front_image_width'  => 480,
			'front_image_height' => 670,
			'hover_box_css'      => '',
			'animate_in'         => 'fadeIn',
			'duration_in'        => '',
			'delay_in'           => '',
			'animate_out'        => 'fadeOut',
			'duration_out'       => '',
			'delay_out'          => '',
			'hover_color'        => '',
			'overlay_css'        => '',
			'overlay'            => 'yes'
		),$atts ) );

		if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {
			$class_to_filter = vc_shortcode_custom_css_class( $hover_box_css, ' ' );
			$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );

			$overlay_class_to_filter = vc_shortcode_custom_css_class( $overlay_css, ' ' );
			$overlay_css = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $overlay_class_to_filter, $code, $atts );

		}

		$animate_data = '';

		if( $overlay == 'yes' ) {

			$animate_class = !empty( $animate_out ) ? ' '. esc_attr( $animate_out ) : ' fadeout';

			$animate_data .= ' data-hover-animate';
			$animate_data .= !empty( $animate_in ) ? ' data-trans-in="'. esc_attr( $animate_in ) .'"' : 'fadeInUp';
			$animate_data .= !empty( $animate_out ) ? ' data-trans-out="'. esc_attr( $animate_out ) .'"' : 'fadeOutDown';

			$animate_data .= !empty( $duration_in ) 	? ' data-duration-in="'. esc_attr( $duration_in ) .'"' 	: '';
			$animate_data .= !empty( $duration_out ) ? ' data-duration-out="'. esc_attr( $duration_out ) .'"' : '';

			$animate_data .= !empty( $delay_in )		? ' data-delay-in="'. esc_attr( $delay_in ) .'"' 		: '';
			$animate_data .= !empty( $delay_out ) 	? ' data-delay-out="'. esc_attr( $delay_out ) .'"' 		: '';

			$hover_class = !empty( $hover_color ) ? ' style="background-color: '. $hover_color .';"': '';

		}
		
		$output = '<div class="hover-box">';
			if( !empty( $front_image ) ) {
				$image = composer_get_image_by_id( $front_image_width, $front_image_height, $front_image, 0, 0, 1 );
				$output .= '<div class="hover-box-front">'. $image .'</div>';
			}
			$output .= '<div class="hover-box-back '. $css_class .'">';

			if( $overlay == 'yes' ) {
				$output .= '<div class="hover-box-overlay ' . $overlay_css .' '. esc_attr( $animate_class ) . '"'. $hover_class .'' . $animate_data . '></div>';
			}

			$output .= '<div class="hover-box-element-wrap">'. wpb_js_remove_wpautop( $content ) .'</div>';

			$output .= '</div>';
		$output .= '</div>';

		return $output;
	}

	add_shortcode( 'hover_box', 'composer_hover_box' );

	function composer_hover_elements( $atts, $content = null, $code ) {
		extract( shortcode_atts( array(
			'text_color' => 'light', // black, white, custom_color
			'custom_color' => '',
			'horizontal_align' => 'center', // center, left, right
			'vertical_align' => 'top', // middle, top, bottom
			'animate_in' => 'fadeIn',
			'duration_in' => '',
			'delay_in' => '',
			'animate_out' => 'fadeOut',
			'duration_out' => '',
			'delay_out' => '',
			'hover_box_css' => '',
			'on_hover' => 'yes',
		),$atts ) );

		// Empty Assignment
		$style = $animate_data = $animate_class = '';

		if ( function_exists( 'vc_shortcode_custom_css_class' ) ) {

			$class_to_filter = vc_shortcode_custom_css_class( $hover_box_css, ' ' );
			$hover_box_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $class_to_filter, $code, $atts );

		}

		$text_color = ( 'default' != $text_color ) ? $text_color : '';

		if( $on_hover == 'yes' ) {

			//Animation
			$animate_class = ! empty( $animate_out ) ? ' '. esc_attr( $animate_out ) : ' fadeOut';

			$animate_data .= ' data-hover-animate';
			$animate_data .= ! empty( $animate_in ) 	? ' data-trans-in="'. esc_attr( $animate_in ) .'"' 		: 'fadeIn';
			$animate_data .= ! empty( $animate_out ) 	? ' data-trans-out="'. esc_attr( $animate_out ) .'"' 	: 'fadeOut';

			$animate_data .= ! empty( $duration_in ) 	? ' data-duration-in="'. esc_attr( $duration_in ) .'"' 	: '';
			$animate_data .= ! empty( $duration_out ) ? ' data-duration-out="'. esc_attr( $duration_out ) .'"' : '';

			$animate_data .= !empty( $delay_in )		? ' data-delay-in="'. esc_attr( $delay_in ) .'"' 		: '';
			$animate_data .= !empty( $delay_out ) 	? ' data-delay-out="'. esc_attr( $delay_out ) .'"' 		: '';

		}
		

		$output = '<div class="hover-box-element '. $hover_box_class .' '. esc_attr( $animate_class . ' ' . $text_color . ' '. $horizontal_align . ' ' . $vertical_align ) .'" '. $animate_data . ' ' . $style .'>';

			if( $vertical_align == 'middle' ) {
				$output .= '<div class="hover-box-element-middle">';
			}

			$output .= wpb_js_remove_wpautop( $content );

			if( $vertical_align == 'middle' ) {
				$output .= '</div>';
			}

		$output .= '</div>';

		
		return $output;
	}

	add_shortcode( 'hover_elements', 'composer_hover_elements' );

	/* =============================================================================
		 Pricing Tables
	   ========================================================================== */

	function composer_pricing_tables( $atts, $content = null ){
		extract( shortcode_atts( array(
			'el_class' => '',
			'style' => 'style1',
			'highlight_box' => 'no',
			'animate' => 'no',
			'transition' => 'fadeIn',
			'duration' => '',
			'delay' => '',
			'title_tag' => 'h2',
			'title' => esc_html__( 'Title', 'amz-composer-plugins' ),
			'currency' => '$',
			'currency_align' => 'before',
			'price' => '99.99',
			'period' => 'per month',
			'display_button' => 'yes',
			'button_link'  => '',
			'button_style' => 'outline',
			'button_hover_style' => 'outline',
			'button_type' => 'oval',
			'button_size' => 'md',
			'button_color' => 'color',
			'button_hover_color' => 'color',
			'button_icon' => '',
			'button_icon_align' => 'front'
			),$atts ) );

		$btn_att = vc_build_link( $button_link );		
		$btn_att['href'] = ( isset( $btn_att['url'] ) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
		$btn_att['title'] = ( isset( $btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__( 'Read More','amz-composer-plugins' );
		$btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : '';

		$animate_class = $slide_transition = $slide_duration = $slide_delay = $pricing_table_img = $pricing_table_bg = "";

		if( $animate == "Yes" ){

			$animate_class = ' pix-animate-cre';

			$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

			$slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

			$slide_delay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

		}

		$button = $line = $button_icon_front = $button_icon_back = $button_icon_class = "";

		if( $button_icon != "" && $button_icon_align == 'front' ){
			$button_icon_front = '<span class="btn-icon button-front '. esc_attr( $button_icon ) .'"></span> ';
			$button_icon_class = ' btn-front';
		}elseif( $button_icon != "" && $button_icon_align == 'back' ){
			$button_icon_back = ' <span class="btn-icon '. esc_attr( $button_icon ) .'"></span>';
			$button_icon_class = ' btn-back';
		}

		if( $display_button == 'yes' && !empty( $btn_att['href'] ) ){
			$button = '<p class="sepCenter"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty($btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '').' class="clear btn btn-'. esc_attr( $button_style ) .' btn-hover-'. esc_attr( $button_hover_style ) .' btn-'. esc_attr( $button_type ) .' '. esc_attr( $button_icon_class ) .' btn-'. esc_attr( $button_size ) .' '. esc_attr( $button_color ).' btn-hover-'. esc_attr( $button_hover_color ).'">'. $button_icon_front .''. esc_html( $btn_att['title'] ) .''. $button_icon_back .'</a></p>';
		}

		$output = '<div class="pricing-table newSection">';

		if( $highlight_box == 'yes' ){
			$output .= '<div class="price-table bestPlan '. esc_attr( $style ) .''. esc_attr( $animate_class ) .'"'. $slide_transition .''. $slide_duration .''. $slide_delay .'>';
		}else{
			$output .= '<div class="price-table '. esc_attr( $style ) .''. esc_attr( $animate_class ) .'"'. $slide_transition .''. $slide_duration .''. $slide_delay .'>';	
		}

		if( $style != 'style2' ){
			$line = '<span class="line"></span>';
		}

		if( $style != 'style7' ){
			$output .= '<div class="price-header"><'. composer_title_tag( $title_tag ) .' class="plan-title">'. esc_html( $title ) .''. $line .'</'. composer_title_tag( $title_tag ) .'>';
		}

		$price_table_imgbg = wp_get_attachment_image_src( $pricing_table_img, 'full' );

		if( !empty( $price_table_imgbg ) ){
			$price_table_imgbg2 = aq_resize( $price_table_imgbg[0], 358, 100, true, true ); 			
		}

		$pricing_table_bg .= ' style="';
		$pricing_table_bg .= ( $pricing_table_img != '' ) ? ' background-image: url('. esc_url( $price_table_imgbg2 ) .'); background-position: center center; background-size: cover; background-repeat: no-repeat; -webkit-filter: grayscale(1);' : '';
		$pricing_table_bg .= '"';

		if($style == 'style7'){
			$output .= '<div class="price-header">
			<div '.$pricing_table_bg.' >
			<'. composer_title_tag( $title_tag ) .' class="plan-title">'. esc_html( $title ) .''. $line .'</'. composer_title_tag( $title_tag ) .'>
			</div>	';
		}

		$output .= '<p class="value">';
			if($currency_align == 'before'){
				$output .= '<span class="vAlign">'.esc_html( $currency ).'</span>';
			}
			$output .= esc_html( $price );
			if($currency_align == 'after'){
				$output .= '<span class="vAlign">'.esc_html( $currency ).'</span>';
			}
			$output .= '<small>'. esc_html( $period ) .'</small>';
		$output .= '</p>';

			if( $highlight_box == 'yes' && ( $style == 'style3' || $style == 'style5' || $style == 'style7' || $style == 'style8' || $style == 'style9' || $style == 'style10' ) ){
				$output .='<div class="bestplan-icon"></div>';
				$output .='<i class="pixicon-star"></i>';
			}	

			if( $highlight_box == 'yes' && $style == 'style4' ){
				$output .='<p class="bestplan">BEST VALUE</p>';
			}

		if( $style == 'style10' ){
			$output .= $button;
		}	
			
		$output .= '</div>';

		$output .= '<div class="price-table-content">'.wpb_js_remove_wpautop( $content ).'</div>';

		if( $style != 'style10' ){
			$output .= $button;
		}

		$output .= '</div></div>';
		return $output;
	}

	add_shortcode( 'pricing_tables', 'composer_pricing_tables' );

	/* =============================================================================
		 Clients Shortcodes
	========================================================================== */

	function composer_clients( $atts, $content = null ){
		extract( shortcode_atts( array(
			'link'                => 'yes',
			'custom_links'        => '',
			'custom_links_target' => '_self',
			'title_on_hover'      => 'yes',
			'style'               => '',
			'titles'              => '',
			'images'              => '',
			'items'               => '4',
			'slider'              => 'yes',
			'autoplay'            => 'false',
			'slide_speed'         => '5000',
			'slide_arrow'         => 'true',
			'arrow_type'          => '',
			'slider_height'       => 'false',	
			'pagination'          => 'true',
			'stop_on_hover'       => 'true',
			'mouse_drag'          => 'true',
			'loop'                => 'false',
			'margin'              => '30',
			'center'              => 'false',
			'stage_padding'       => '0',
			'start_position'      => '0',
			'animate_in'          => 'false',
			'animate_out'         => 'false',
			'touch_drag'          => 'true'
		), $atts ) );

		$class = $data = $client_class = $pagi = $img = $page_class = '';

		if ( $link == 'yes' ) { $custom_links = explode( ',', $custom_links ); }
		if ( $title_on_hover == 'yes' ) { $titles = explode( ',', $titles ); }
		$images = explode( ',', $images );
		$i = -1;

		if( $pagination == 'false' ){
			$page_class = ' no-pagi-carousel';
		}
		
		if( $slider == 'yes' ){
			$client_class = " owl-carousel {$page_class}";

			$data = ' data-items="'. esc_attr( $items ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';
		}else{
			$client_class = ' no-clients-carousel';
		}

		if( $pagination == "false" ){
			$pagi .= " no-pagination";
		}

		if( $items == "2" ){
			$class = " item-2";
		}elseif( $items == "5" ){
			$class = " item-5";
		}elseif( $items == "6" ){
			$class = " item-6";
		}

		$output =	'<div class="clients'. esc_attr( $client_class ) . esc_attr( $pagi ) . esc_attr( $class ) .' '. esc_attr( $arrow_type ) .' '. esc_attr( $style ) .' clearfix"'. $data .'>';

		foreach ( $images as $attach_id ) {
			$i++;

			if ( $attach_id > 0 ) {
				$image_thumb_url = wp_get_attachment_image_src( $attach_id, 'full' );
				if( !empty( $image_thumb_url ) ){
					$img = aq_resize( $image_thumb_url[0], 280, 140, true, true ); 
				}

				if(!$img){
					$img = $image_thumb_url[0];
				}

				$output .= '<div class="client">';

					if( $link == 'yes' && !empty( $custom_links[$i] ) ){
						$output .= '<a href="'. esc_url( $custom_links[$i] ) .'" target="_blank">';
					}

						$output .= '<img src="'. esc_url( $img ) .'" alt="">';

						if( $title_on_hover == 'yes' && !empty( $titles[$i] ) ){
							$output .= '<div class="client-title-hover"><span>'. esc_html( $titles[$i] ) .'</span></div>';
						}
					
					if( $link == 'yes' && !empty( $custom_links[$i] ) ){
						$output .= '</a>';
					}    		

				$output .= '</div>';

			}
		}
						
		$output .=	'</div>';
		return $output;		
	}

	add_shortcode( 'clients', 'composer_clients' );

	/* =============================================================================
		 Counters Shortcodes
	   ========================================================================== */
	function composer_counter( $atts, $content = null ){
		extract(shortcode_atts( array(
			'el_class' => '',
			'number'  => '5000',
			'text' => esc_html__( 'Pizzas ordered', 'amz-composer-plugins' ),
			'icon' => 'yes',
			'icon_name' => '',
			'icon_align' => 'left',
			'icon_color' => 'color',
			'border'  =>  'border',
			'text_font_size' => '',
			'number_font_size' => ''
		), $atts ) );

		$number_size = $text_size = '';
		
		if ( $number_font_size != '' ) {
			$number_size = ' style="font-size: '. esc_attr( $number_font_size ) .'";';
		}

		if ( $text_font_size != '' ) {
			$text_size = ' style="font-size: '. esc_attr( $text_font_size ) .'";';
		}

		$output ='<div class="counter '. esc_attr( $el_class ) .' '. esc_attr( $border ) .' clearfix"><div class="absolute-center">';
		
		if( $icon == 'yes' && $icon_name != '' ){
			$output .=' <i class="'. esc_attr( $icon_align ) .' pix-icon '. esc_attr( $icon_name ) .' '. esc_attr( $icon_color ) .'"></i>';
		}
			
		$output .= '<div class="counter-box '. esc_attr( $icon_align ) .'">
					<span class="counter-value"'. $number_size .'>'. esc_html( $number ) .'</span>
					<span class="content"'. $text_size .'>'. esc_html( $text ) .'</span>
					</div></div>	
					</div>';
		return $output;
	}

	add_shortcode( 'counter', 'composer_counter' );

	function composer_theme_gallery_shortcode( $attr ) {
		
		wp_enqueue_style( 'flexslider' );
		wp_enqueue_script( 'flexslider-js' );
		wp_enqueue_script( 'gallery-script' );
		
		$post = get_post();

		static $instance = 0;
		$instance++;

		if ( ! empty( $attr['ids'] ) ) {
			// 'ids' is explicitly ordered, unless you specify otherwise.
			if ( empty( $attr['orderby'] ) )
				$attr['orderby'] = 'post__in';
			$attr['include'] = $attr['ids'];
		}

		// Allow plugins/themes to override the default gallery template.
		$output = apply_filters( 'post_gallery', '', $attr );
		if ( $output != '' )
			return $output;

		// We're trusting author input, so let's at least make sure it looks like a valid orderby statement
		if ( isset( $attr['orderby'] ) ) {
			$attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
			if ( !$attr['orderby'] )
				unset( $attr['orderby'] );
		}

		extract(shortcode_atts(array(
			'order'      => 'ASC',
			'orderby'    => 'menu_order ID',
			'id'         => $post->ID,
			'itemtag'    => 'li',
			'columns'    => 3,
			'size'       => 'large',
			'include'    => '',
			'exclude'    => ''
		), $attr));

		$id = intval($id);
		if ( 'RAND' == $order )
			$orderby = 'none';

		if ( !empty( $include ) ) {
			$_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

			$attachments = array();
			foreach ( $_attachments as $key => $val ) {
				$attachments[$val->ID] = $_attachments[$key];
			}
		} elseif ( !empty( $exclude ) ) {
			$attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
		} else {
			$attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
		}

		if ( empty($attachments) )
			return '';

		if ( is_feed() ) {
			$output = "\n";
			foreach ( $attachments as $att_id => $attachment )
				$output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
			return $output;
		}

		$itemtag = tag_escape( $itemtag );
		$columns = intval( $columns );
		$itemwidth = $columns > 0 ? floor( 100/$columns ) : 100;
		$float = is_rtl() ? 'right' : 'left';

		$selector = "gallery-{$instance}";

		$gallery_style = $gallery_div = '';
			
		$size_class = sanitize_html_class( $size );
		$gallery_div = '<section class="gallery-container"><div id="'. esc_attr( $selector ) .'" class="flexslider gallery-slider"><ul class="slides">';
		$output = apply_filters( 'gallery_style', $gallery_style . "\n\t\t" . $gallery_div );

		$i = 0;
		foreach ( $attachments as $id => $attachment ) {		
			add_filter('wp_get_attachment_image_attributes', 'unset', 10, 2);	
		
			$url = wp_get_attachment_url( $attachment->ID );
			$text = '';
			if ( trim( $text ) == '' )
				$text = $attachment->post_title;
			
			$crop = true; //resize but retain proportions
			$single = true; //return array
				
			if( !empty( $url ) ){
				$url_resize = aq_resize( $url, 817, 400, $crop, $single );
				if(!$url_resize){
					$url_resize = $url;
				}
			}
			$link = "$url_resize";

			$output .= "<{$itemtag}>";
			$output .= '<img src="'. esc_url( $link ) .'"  alt="">';
			$output .= "</{$itemtag}>";
			if ( $columns > 0 && ++$i % $columns == 0 )
				$output .= '';
		}
		$output .= '</ul></div>';
		$output .= '<div class="carousel flexslider"><ul class="slides">';
		foreach ( $attachments as $id => $attachment ) {
			add_filter('wp_get_attachment_image_attributes', 'unsets', 10, 2);	
		
			$url = wp_get_attachment_url( $attachment->ID );
			if ( trim( $text ) == '' )
				$text = $attachment->post_title;
			
			$crop = true; //resize but retain proportions
			$single = true; //return array
				
			if( !empty( $url ) ){
				$url_resize = aq_resize( $url, 140, 100, $crop, $single );
				if( !$url_resize ){
					$url_resize = $url;
				}
			}
			$link = "$url_resize";

			$output .= "<{$itemtag}>";
			$output .= '<img src="'. esc_url( $link ) .'"  alt="">';
			$output .= "</{$itemtag}>";
			if ( $columns > 0 && ++$i % $columns == 0 )
				$output .= '';
		}

		$output .= '</ul></div><div class="sep"></div></section>';

		return $output;
	}

	add_shortcode( 'theme_gallery_shortcode', 'composer_theme_gallery_shortcode' );

	/* =============================================================================
	 Background Text Shortcodes
	 ========================================================================== */

	 function composer_background_text( $atts, $content = null, $code ){
	 	extract( shortcode_atts( array(
	 		'el_class' => '',
	 		'title_tag' => 'h3',
	 		'title'	=> esc_html__( 'Title Goes Here', 'composer' ),
	 		'background' => 'text', // text , icon
	 		'title_size'	=> '',
	 		'title_color'	=> '',
	 		'uppercase'	=> 'yes',
	 		'title_letter_space'	=> '',
	 		'title_margin'	=> '',
	 		'title_padding'	=> '',
	 		'background_text'	=> esc_html__( 'Title Goes Here', 'composer' ),
	 		'background_text_letter_space'	=> '',
	 		'background_text_tag' => 'h2',
	 		'background_icon'	=> '',
	 		'background_v_align'	=> 'middle', // middle, top, bottom
	 		'background_h_align'	=> 'center', // center, left, right
	 		'background_margin'	=> '',
	 		'background_padding'	=> '',
	 		'background_size'	=> '',
	 		'background_color'	=> '',
	 		'background_opacity'	=> '0.15' // decimal value

        ), $atts ) );

	 	// Empty assignment
	 	$output = $background_style = $title_style = '';

	 	//Uppercase
	 	$uppercase = ( 'yes' == $uppercase ) ? ' uppercase' : '';

	 	$output .= '<div class="background-text-wrap '. esc_attr( $background_v_align .' '.$background_h_align . $uppercase ).'">';

	 		// Background Icon or Text Custom Style
	 		if( !empty( $background_text ) ||  !empty( $background_icon ) ) {
	 			$background_style .= 'style="';
	 			$background_style .= !empty( $background_size ) ? 'font-size: '. esc_attr( $background_size ) .';' : '';
	 			$background_style .= !empty( $background_color ) ? 'color: '. esc_attr( $background_color ) .';' : '';
	 			$background_style .= !empty( $background_opacity ) ? 'opacity: '. esc_attr( $background_opacity ) .';' : '';
	 			$background_style .= !empty( $background_text_letter_space ) ? 'letter-spacing: '. esc_attr( $background_text_letter_space ) .';' : '';
	 			$background_style .= !empty( $background_margin ) ? 'margin: '. esc_attr( $background_margin ) .';' : '';
	 			$background_style .= !empty( $background_padding ) ? 'padding: '. esc_attr( $background_padding ) .';' : '';
	 			$background_style .= '"';
	 		}

	 		if( 'text' == $background && !empty( $background_text ) ) {
	 			$output .= '<'. $background_text_tag .' class="background-text" '. $background_style .'>'. esc_html( $background_text ). '</'. $background_text_tag .'>';
	 		}
	 		elseif( 'icon' == $background && !empty( $background_icon ) ) {
	 			$output .= '<span class="background-icon"><i class="'. esc_attr( $background_icon ) .'"></i></span>';
	 		}

	 		// Background Icon or Text Custom Style
	 		if( !empty( $title ) ) {
	 			$title_style .= 'style="';
	 			$title_style .= !empty( $title_size ) ? 'font-size: '. esc_attr( $title_size ) .';' : '';
	 			$title_style .= !empty( $title_color ) ? 'color: '. esc_attr( $title_color ) .';' : '';
	 			$title_style .= !empty( $title_letter_space ) ? 'letter-spacing: '. esc_attr( $title_letter_space ) .';' : '';
	 			$title_style .= !empty( $title_margin ) ? 'margin: '. esc_attr( $title_margin ) .';' : '';
	 			$title_style .= !empty( $title_padding ) ? 'padding: '. esc_attr( $title_padding ) .';' : '';
	 			$title_style .= '"';
	 		}

	 		$output .= '<'. $title_tag .' class="front-text" '. $title_style .'>'. esc_html( $title ). '</'. $title_tag .'>';

	 	$output .= '</div>';

		return $output;
	}

	add_shortcode( 'background_text', 'composer_background_text' );

	/* =============================================================================
	 Heading Shortcodes
	 ========================================================================== */

	 function composer_title( $atts, $content = null, $code ){
	 	extract(shortcode_atts( array(
	 		'el_class' => '',
	 		'title_tag' => 'h2',
	 		'style' => 'normal-title',
	 		'title' => esc_html__( 'Title', 'amz-composer-plugins' ),
	 		'title_color' => '',
	 		'title_bg_color' => '',
	        'title_margin' => '',
	        'title_padding' => '',
	        'title_border_radius' => '',
	        'title_display' => '',
	        'title_uppercase'  => 'yes',
	 		'font_size' => 'size-sm',
	 		'title_letter_space' => '',
	 		'custom_font_size' => '',
	 		'sub_title'=> 'no',
	 		'sub_title_style' => '',
	 		'sub_title_text' => 'Subtitle text',
	 		'sub_title_color' => '',
	        'sub_title_margin' => '', 
	        'sub_title_size' => '', 
	 		'align' => 'left',
	 		'line' => 'yes',
	        'line_style' => 'line-style1', // line_style1 | line_style2 | line_style3 | line_style4 | line_style5
	        'line_positions' => 'below-title', // below-sub-title |  below-title
	 		'line_color' => '',
	        'animate' => 'no',
	        'transition' => 'fadeIn',
	        'duration' => '',
	        'delay' => '',
	        'sub_animate' => 'no',
	        'sub_transition' => 'fadeIn',
	        'sub_duration' => '',
	        'sub_delay' => '',
        ), $atts ) );

	 	$output = $animate_class = $slide_transition = $slide_duration = $slide_delay = $animate_class2 = $slide_transition2 = $slide_duration2 = $slide_delay2 = $sub_text = $sub_class = "";
	 	
		$title_uppercase_class = ( 'yes' == $title_uppercase ) ? ' uppercase': '';

	 	if( $animate == "yes" ){

	 		$animate_class = ' pix-animate-cre';

	 		$slide_transition = isset( $transition ) ? ' data-trans="'. esc_attr( $transition ) .'"' : '';

	 		$slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'"' : '';

	 		$slide_delay = isset( $delay ) ? ' data-delay="'. esc_attr( $delay ) .'"' : '';

	 	}

	 	if( $sub_animate == "yes" ){

	 		$animate_class2 = ' pix-animate-cre';

	 		$slide_transition2 = isset( $sub_transition ) ? ' data-trans="'. esc_attr( $sub_transition ) .'"' : '';

	 		$slide_duration2 = isset( $sub_duration ) ? ' data-duration="'. esc_attr( $sub_duration ) .'"' : '';

	 		$slide_delay2 = isset( $sub_delay ) ? ' data-delay="'. esc_attr( $sub_delay ) .'"' : '';

	 	}

		$class = $css_style = $sub_title_option = '';
		
		//Checking Title Style
		if( !empty( $title_margin ) || !empty( $custom_font_size ) || !empty( $title_letter_space ) || !empty( $title_color ) || !empty( $title_bg_color ) || !empty( $title_padding ) ) {
		 	$css_style = 'style="';
		 	$css_style .= !empty( $title_margin ) ? 'margin: '. esc_attr( $title_margin ) .'; ' : '';
		 	$css_style .= !empty($custom_font_size) ? 'font-size: '. esc_attr( $custom_font_size ) .'; ' : '';
		 	$css_style .= !empty($title_letter_space) ? 'letter-spacing: '. esc_attr( $title_letter_space ) .'; ' : '';
		 	$css_style .= !empty($title_color) ? 'color: '. esc_attr( $title_color ) .'; ' : '';
		 	$css_style .= !empty($title_bg_color) ? 'background-color: '. esc_attr( $title_bg_color ) .'; ' : '';
		 	$css_style .= !empty($title_padding) ? 'padding: '. esc_attr( $title_padding ) .'; ' : '';
		 	$css_style .= !empty($title_border_radius) ? 'border-radius: '. esc_attr( $title_border_radius ) .'; ' : '';
		 	$css_style .= !empty($title_display) ? 'display: '. esc_attr( $title_display ) .'; ' : '';
		 	$css_style .= '"';
		 }

	 	if( $sub_title == "yes" && $sub_title_text != '' ){

			if( !empty( $sub_title_margin ) || !empty( $sub_title_color ) || !empty( $sub_title_size ) ) {
		 		$sub_title_option = 'style="';
	 			$sub_title_option .= ( !empty( $sub_title_margin ) ) ? 'margin-bottom:'. esc_attr( $sub_title_margin ) .'; ' : '';
	 			$sub_title_option .= ( !empty( $sub_title_color ) ) ? 'color:'. esc_attr( $sub_title_color ) .'; ' : '';
	 			$sub_title_option .= ( !empty( $sub_title_size ) ) ? 'font-size:'. esc_attr( $sub_title_size ) .'; ' : '';
		 		$sub_title_option .= '"';
	 		}

	 		$sub_text = '<p class="sub-title '. esc_attr( $sub_title_style ) .' '. $animate_class2 .'"'. $slide_transition2 .' '. $slide_duration2 .' '. $slide_delay2 .' '. $sub_title_option .'>'. esc_html( $sub_title_text ) .'</p>';
	 		$sub_class = ' sub-title-con';
	 	}

	 	/* Font Size */
	 	if( $font_size == "size-md" ){
	 		$class .= ' size-md';
	 	}elseif ( $font_size == 'size-lg' ) {
	 		$class .= ' size-lg';
	 	}else{
	 		$class .= ' size-sm';
	 	}

		//Check Alignment
	 	if ( $align == 'right' ){
	 		$class .= ' alignRight';
	 	}elseif ( $align == 'center' ) {
	 		$class .= ' alignCenter';
	 	}
	 	$line_border = $line_option = '';

	 	if( !empty($line_color) ) {
	 		$line_option = 'style="';
	 		$line_option .= ( !empty( $line_color ) ) ? 'background:'. esc_attr( $line_color ) .';' : '';
	 		$line_option .= '"';
	 	}

		//Title Backround Line
	 	if( $line == 'yes' && $line_style == 'line-style1' ){
	 		$line_border = ' <span class="line"'. $line_option .'></span>';

	 	}elseif ( $line == 'yes' && $line_style == 'line-style2' ) {
	 		$line_border = ' <span class="line line-2"'. $line_option .'></span>';

	 	}elseif ($line == 'yes' && $line_style == 'line-style3' ) {
	 		$line_border = ' <span class="line line-2 line-3"'. $line_option .'></span>';

	 	}elseif ($line == 'yes' && $line_style == 'line-style4' ) {
	 		$line_border = '  <span class="line line-2 line-4"'. $line_option .'></span>';

	 	}elseif ($line == 'yes' && $line_style == 'line-style5' ) {
	 		$line_border = '<div class="line round-sep clearfix">
		 		<span class="round"'. $line_option .'></span>
		 		<span class="round"'. $line_option .'></span>
		 		<span class="round"'. $line_option .'></span>
		 		<span class="round"'. $line_option .'></span>
		 	</div> ';  

		}	 

		if( ( $line_positions == 'below-sub-title' || $line_positions == 'below-title' ) && ( $style != 'box-title' && $style != 'box-small' && $style != 'title-sep' ) ){

	 		$output .='<div class="'. esc_attr( $class ) .' clearfix'. ( ( $line_positions == 'below-sub-title') ? ' below-sub-title' : '' ) .'">';
		}   

		if( $style == 'box-title' || $style == 'box-small' || $style == 'title-sep' ){
	 		$output .= '<div class="'. esc_attr( $class ) .' clearfix '. ( ( $style == 'title-sep') ? 'title-sep-border clearfix' : '' ) .'">';
		}

		$output  .= '<'. composer_title_tag( $title_tag ) .' class="main-title title'. esc_attr( $title_uppercase_class . $sub_class .' '. $el_class .''. $style .''.$class.' '.$line_style.' '. $animate_class ) .'"'. $slide_transition .' '. $slide_duration .' '. $slide_delay .' '. $css_style .'>';

		if( $style == 'box-title' || $style == 'box-small' || $style == 'title-sep' ){
	 		$output .= "<span>";
		}
		$output .= str_replace( '{br}', '<br>', esc_html( $title ) );
		if( $style == 'box-title' || $style == 'box-small' || $style == 'title-sep' ){
	 		$output .= "</span>";
		}
		if( $line_positions == 'below-title' ){
	 		$output .= $line_border;
		}
		$output .= '</'. composer_title_tag( $title_tag ) .'>';
		$output .= $sub_text;
		if($style == 'box-title' || $style == 'box-small' || $style == 'title-sep'){
	 		$output .= '</div>';
		}
		if( $style == "bg_text" ){
	 		$sub_text = '';
		}
		if( $line_positions == 'below-sub-title' ){
	 		$output .= $line_border;
		}
		if( ( $line_positions == 'below-sub-title' || $line_positions == 'below-title') && ( $style != 'box-title' && $style != 'box-small' && $style != 'title-sep' ) ){

	 		$output .='</div>';
		} 

		return $output;
	}

	add_shortcode( 'title', 'composer_title' );

	/* =============================================================================
		Blog Shortcodes
	========================================================================== */
	function composer_blog( $atts, $content = null ){
		extract( shortcode_atts( array(
			'style'               => 'normal', //normal, overlay, grey_box, static_bg, simple
			'no_of_items'         => 6,
			'insert_type'         => 'posts', //posts, id, category
			'order_by'            => 'date', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand'
			'order'               => 'DESC', //DESC, ASC
			'id'                  => '',
			'category'            => '',
			'exclude_id'          => '',
			'exclude_category'    => '',
			'align'               => 'text-left',
			'title_length'        => 30,
			'excerpt_length'      => 90,
			'columns'             => 'col3', //col1, col2, col3, col4
			'top_meta'            => 'date', // date, category, author, none
			'bottom_meta'         => 'like_comment', // like_comment, link, none
			'show_like'           => 'yes',
			'show_comment'        => 'yes',
			'link_text'           => esc_html__( 'Read More', 'amz-composer-plugins' ),
			'show_featured_image' => 'yes',
			'show_description'    => 'yes',
			'slider'              => 'no',
			'slides_per_view'     => 1,
			'loop'                => 'false',
			'margin'              => '30',
			'center'              => 'false',
			'stage_padding'       => '0',
			'start_position'      => '0',
			'pagination'          => 'true',
			'touch_drag'          => 'true',
			'mouse_drag'          => 'true',
			'stop_on_hover'       => 'true',
			'slide_arrow'         => 'true',
			'slide_speed'         => '5000',
			'autoplay'            => 'false',
			'animate_out'         => 'false',
			'animate_in'          => 'false',
		), $atts ) );

		//Build id and category as array
		$post_in = array_filter( explode( ",", $id ) );
		$category = array_filter( explode( ",", $category ) );

		//convert category slug into category id
		$term = $term_id = array();
		if( !empty( $category ) ) {
			foreach ( $category as $key => $cat ) {
				$term[] = get_category_by_slug( $cat );
				$term_id[] = $term[$key]->term_id;
			}
		}

		//Build post__not_in and category__not_in as array
		$id = get_the_ID();
		$post_not_in = array_filter( explode( ",", $exclude_id ) );
		$post_not_in = array_merge( ( array )$id, $post_not_in );
		$category_not_in = array_filter( explode( ",", $exclude_category ) );

		//convert exclude category slug into category id
		$exclude_term = $exclude_term_id = array();
		if(!empty($category_not_in)) {
			foreach ($category_not_in as $key => $exclude_cat) {
				$exclude_term[] = get_category_by_slug($exclude_cat);
				$exclude_term_id[] = $exclude_term[$key]->term_id;
			}
		}

		//Query arguement for Insert type: Posts, Category, ID
		if( $insert_type == 'id' && !empty( $post_in ) ){
			$args = array(				
				'order' => $order,
				'orderby' => $order_by,
				'posts_per_page' => ( !empty($no_of_items) && is_numeric($no_of_items)) ? $no_of_items : 6,
				'post__in' => $post_in,
				'post__not_in' => $post_not_in,
				'ignore_sticky_posts' => 1
			);
		}

		else if( $insert_type == 'category' && !empty( $category ) ){
			$args = array(
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty($no_of_items) && is_numeric($no_of_items) ) ? $no_of_items : 6,
				'post__not_in' => $post_not_in,
				'category__in' => $term_id,
				'category__not_in'=> $exclude_term_id,
				'ignore_sticky_posts' => 1
			);
		}
		else{
			$args = array(
				'orderby' => $order_by,
				'order' => $order,
				'posts_per_page' => ( !empty($no_of_items) && is_numeric($no_of_items) ) ? $no_of_items : 6,
				'post__not_in' => $post_not_in,
				'ignore_sticky_posts' => 1
			);
		}

		//Build taxonomy query for removing quote and link post format posts
		$tax_query = array(
			array(
				'taxonomy' => 'post_format',
				'field' => 'slug',
				'terms' => array( 'post-format-quote', 'post-format-link' ),
				'operator' => 'NOT IN',
			)
		);

		//Combine taxonomy query with main query
		$args = array_merge( $args, array( 'tax_query' => $tax_query, 'post_status' => 'publish' ) );

		//Set column class, slider count, width and height
		if ( $columns == 'col2' ) {
			$class = 'col-md-6';				
			$slide_items = 2;
			$width = 567;
			$height = 220;
		} 
		else if ( $columns == 'col3' ) {
			$class = 'col-md-4';				
			$slide_items = 3;
			$width = 377;
			$height = 220;
		} 
		else if ( $columns == 'col4' ) {
			$class = 'col-md-3';			
			$slide_items = 4;
			$width = 282;
			$height = 220;
		} 
		else { //col1
			$class = 'col-md-12';				
			$slide_items = 1;
			$width = 1000;
			$height = 350;
		}

		if( $slider == 'yes' ){
			$class = '';	
		}

		if( ! empty( $excerpt_length ) && is_numeric( $excerpt_length ) ){
			$shorten_length = absint( $excerpt_length );
		}		

		//Display slider pagination
		$page_class = ( $pagination == 'false' ) ? ' no-pagi-carousel' : '';

		if( $slider == 'yes' ){
			
			$slides_per_view = ( $slides_per_view && is_numeric( $slides_per_view ) ) ? $slides_per_view : 3;

			$slider_data = ' data-items="'. esc_attr( $slides_per_view ).'" data-loop="'. esc_attr( $loop ).'" data-margin="'. esc_attr( $margin ).'" data-center="'. esc_attr( $center ).'" data-stage-padding="'. esc_attr( $stage_padding ).'" data-start-position="'. esc_attr( $start_position ).'" data-dots="'. esc_attr( $pagination ).'" data-touch-drag="'. esc_attr( $touch_drag ).'" data-mouse-drag="'. esc_attr( $mouse_drag ).'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ).'" data-nav="'. esc_attr( $slide_arrow ).'" data-autoplay-timeout="'. esc_attr( $slide_speed ).'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ).'" data-animate-out="'. esc_attr( $animate_out ).'"';

			$animateClass = ( $animate_in != 'false' ) ? ' amz-owl-animate' : '';

			$output = '<div class="pix-recent-blog-posts owl-carousel '. esc_attr( $columns ) .'' . esc_attr( $animateClass ) . esc_attr( $page_class ) .' blog-' . esc_attr( $style ).'"'. $slider_data .'>';
		}else{
			$output = '<div class="pix-recent-blog-posts '. esc_attr( $columns ) .' blog-' . esc_attr( $style ).'">';
			$data = $auto = '';
		}

		query_posts( $args );

		if ( have_posts() ) : while ( have_posts() ) : the_post();

			//Empty Assignment
			$top = $bottom = '';	

            if( $top_meta == 'category' ){
            	$top = composer_post_category( 'single' );
            }
            else if( $top_meta == 'author' ){
            	global $post;
	            $author_id = $post->post_author;
	            $author_name = get_the_author_meta( 'display_name', $author_id );

	            $top = '<p class="top-meta author"><a href="'. esc_url( get_author_posts_url( $author_id ) ) .'">'. esc_html( ucwords( $author_name ) ).'</a></p>';
            }
            else if( $top_meta == 'date' ){
            	$top = '<p class="top-meta date">'. esc_html( strtoupper( get_the_time( get_option('date_format', 'd M Y') ) ) ).'</p>';
            }

            if( 'like_comment' == $bottom_meta && ( 'yes' == $show_like || 'yes' == $show_comment ) ){

            	if( 'yes' == $show_like ){
            		$like_count = get_post_meta( get_the_ID(), '_pix_like_me', true );
		            $like_class = ( isset( $_COOKIE['pix_like_me_'. get_the_ID()] ) ) ? 'liked' : '';
		            if( $like_count == '' ){
		                $like_count = 0;
		            }

            		$bottom .= '<a href="#void" class="pix-like-me '. esc_attr( $like_class ) .'" data-id="'. esc_attr( get_the_ID() ) .'"><i class="pixicon-heart-2"></i><span class="like-count">'. esc_html( $like_count ) .'</span></a>';
            	}
            	if( 'yes' == $show_comment ) { 
            		$bottom .= '<a href="'. esc_url( get_comments_link() ).'">';
	            		$bottom .= '<span class="pix-blog-comments">';
	            			$bottom .= '<i class="pixicon-comments"></i>';
	            			$bottom .= esc_html( get_comments_number() ); //comments_number( '0', '1', '%' );
	            		$bottom .= '</span>';
            		$bottom .= '</a>';                                
            	} 
	        }
	        else if( 'link' == $bottom_meta ){
	        	$bottom = '<a href="'. esc_url( get_permalink() ) .'" class="read-more">'. esc_html( $link_text ) .'</a>';
	        }

			//Shorten Blog Content 
			$post_title = composer_shorten_text( get_the_title(), $title_length );
			$content = strip_shortcodes( composer_shorten_text( get_the_excerpt(), $excerpt_length ) );      

			//Get permalink
			$href = get_permalink();

			$output .= '<div class="post post-container '. esc_attr( $class ) .'">';
				$output .= '<div class="inner-post">';

					//Overlay Background
					if( 'yes' == $show_featured_image && 'normal' == $style ){
						$output .= '<div class="featured-thumb"><a href="'.esc_url( get_permalink() ).'">';
							$output .= composer_featured_thumbnail( $width, $height, 0, 1, 1 );			
						$output .= '</a></div>';
					}

					if( 'overlay' == $style || 'grey_box' == $style || 'static_bg' == $style ){
						$overlay_bg = composer_featured_thumbnail( $width, $height, 1, 0, 1 );
					}
					$css = !empty( $overlay_bg ) ? 'style="background-image:url('.esc_url( $overlay_bg ).');"' : '';				

					$output .= '<div class="content" '. $css .'>';

					if( 'overlay' == $style || 'grey_box' == $style || 'static_bg' == $style ){
						$output .= '<div class="content-inner">';
					}

						$output .= $top;

						if( !empty( $post_title ) ){
							$output .= '<h3 class="title"><a href="'.esc_url( get_permalink() ).'">'.esc_html( $post_title ).'</a></h3>';
						}
						if( !empty( $content ) && 'yes' == $show_description ){
							$output .= '<p class="post-desc">'. esc_html( $content ) .'</p>';
						}
						
						$output .= $bottom;

					if( 'overlay' == $style || 'grey_box' == $style || 'static_bg' == $style ){
						$output .= '</div>';
					}

					$output .= '</div>';

				$output .= '</div>';

			$output .= '</div>';

		endwhile; 

		else:
			$output .= '<div class="col-md-12">'. esc_html__('Post Not Found.', 'composer'). '</div>';
		endif;
	   
		wp_reset_query();

		$output .= '</div>';
		return  $output;
	}

	add_shortcode( 'blog', 'composer_blog' );

	/* =============================================================================
		 Portfolio Shortcodes
	   ========================================================================== */

	//Portfolio Loop
	function composer_portfolio( $atts, $content = null, $code ){
		extract( shortcode_atts( array(
			'portfolio_style'        => 'grid',//grid,masonry, masonry-fixed
			'append_content'         => 'no',
			'append_content_pos'     => 1,
			'append_content_align'   => 'left',
			'portfolio_title'        => esc_html__( 'Our Work', 'amz-composer-plugins' ),
			'button_link'            => '',
			'no_of_items'            => 6,
			'exclude_portfolio'      => '',
			'pix_filterable'         => 'yes',
			'filter_style'           => 'normal simple',
			'order_by'               => 'modified', //'none', ID', 'author' , 'title', 'name', 'date', 'modified', 'parent', 'rand', 'menu_order'
			'order'                  => 'DESC', //desc, asc
			'columns'                => 'col4', //col2, col3, col4
			'margin'                 => 'margin-no',
			'style'                  => 'style1',
			'grayscale'              => 'no',
			'title_tag'              => 'h2',
			'title_font_size'        => '',
			'cat_font_size'          => '',
			'insert_type'            => 'posts',
			'portfolio_id'           => '',
			'portfolio_category'     => '',
			'show_sub_category_only' => 'no',
			'port_hover_color'       => '',
			'lightbox'               => 'yes',
			'like'                   => 'yes',
			'on_click'               => 'single_port_link',
			'link_target'            => '_self',
			'show_search'            => 'no',
			'pagination'             => 'none', // none, load_more, autoload, number, text
			'loadmore_text'          => esc_html__( 'Load More', 'composer' ),
			'allpost_loaded_text'    => esc_html__( 'All Portfolio Loaded', 'composer' ),
			'slider'                 => 'no',
			'autoplay'               => 'false',
			'slide_speed'            => '5000',
			'slide_arrow'            => 'true',
			'arrow_type'             => '',
			'slider_height'          => 'false',	
			'slider_pagination'      => 'true',	
			'animate'                => 'yes',
			'transition'             => 'fadeInUp',
			'duration'               => '500ms',
			'delay'                  => '200',
			'stop_on_hover'          => 'true',
			'mouse_drag'             => 'true',
			'loop'                   => 'false',
			'slide_margin'           => '30',
			'center'                 => 'false',
			'stage_padding'          => '0',
			'start_position'         => '0',
			'animate_in'             => 'false',
			'animate_out'            => 'false',
			'touch_drag'             => 'true',
			'grid_animation'         => 'enable',
			'grid_transition'        => 'fadeInUp',
			'style2_click'           => 'lightbox'
		), $atts ) );

		if( !empty( $exclude_portfolio ) ){
			$exclude_portfolio= explode( ',', $exclude_portfolio );
		}
		else{
			$exclude_portfolio = '';
		}

		if ( get_query_var( 'paged' ) ) { $paged = get_query_var( 'paged' ); }
		elseif ( get_query_var( 'page' ) ) { $paged = get_query_var( 'page' ); }
		else { $paged = 1; }

		//Query arguement for Insert type: Posts, Category, ID
		if( $insert_type == 'id' && !empty( $portfolio_id ) ){

			$portfolio_id = explode( ',', $portfolio_id );

			$args = array(
				'post_type'      => 'pix_portfolio',
				'order'          => $order,
				'orderby'        => 'post__in',
				'post__in'       => $portfolio_id,
				'post__not_in'   => $exclude_portfolio,
				'posts_per_page' => -1,
				'paged'          => $paged
			);
		}
		else if( $insert_type == 'category' && !empty( $portfolio_category ) ){

			$portfolio_category = explode( ',', $portfolio_category );

			$args = array(
				'post_type'    => 'pix_portfolio',
				'order'        => $order,
				'orderby'      => 'post__in',
				'posts_per_page' => $no_of_items,
				'post__not_in' => $exclude_portfolio,
				'paged'        => $paged,
				'tax_query'    => array(
			        array(
						'taxonomy' => 'pix_categories',
						'field'    => 'slug',
						'terms'    => $portfolio_category
			        )
			    )

			);
		}
		else{
			$args = array(
				'post_type'      => 'pix_portfolio',
				'orderby'        => $order_by,
				'order'          => $order,
				'posts_per_page' => $no_of_items,
				'post__not_in'   => $exclude_portfolio,
				'paged'          => $paged
			);
		}

		$tablet_slide = $page_class = '';

		$pix_filterable = isset( $pix_filterable ) ? $pix_filterable : 'yes';
		$filter_style = isset( $filter_style ) ? $filter_style : 'normal'; //normal, dropdown, simple
		   
		if( $columns == 'col3' ){
			$shorten_length = 50;
			$class = 'vc_col-sm-4';
			$width = '640';
			$slide_items = 3;
			$tablet_slide = 2;
		}elseif( $columns == 'col2' ){
			$shorten_length = 120;
			$class = 'vc_col-sm-6';
			$width = '960';
			$slide_items = 2;
			$tablet_slide = 1;
		}else{
			$class = 'vc_col-sm-3';
			$shorten_length = 120;
			$width = '480';
			$slide_items = 4;
			$tablet_slide = 3;
		}

		if( $columns == 'col3' && ( $portfolio_style == 'grid' || $portfolio_style == 'masonry-fixed' ) ) {			
			$height = '640';
		}
		elseif( $columns == 'col2' && ( $portfolio_style == 'grid' || $portfolio_style == 'masonry-fixed' ) ) {			
			$height = '800';
		}
		elseif( ( $columns == 'col4' || $columns == '' ) && ( $portfolio_style == 'grid' || $portfolio_style == 'masonry-fixed' ) ) {			
			$height = '480';
		}


		$masonry_class = '';

		if ( $portfolio_style == 'masonry' ){
			$height = NULL;
			$masonry_class = ' masonry-class';
		}

		if ( $grayscale == 'yes' ){
			$grayscale_class = 'grayscale-yes';
		} else {
			$grayscale_class = '';			
		}


		$output = '';

		// Set page number
		if( get_query_var( 'paged' ) ) {
            $paged = get_query_var( 'paged' );
        }
        elseif( get_query_var( 'page' ) ) {
            $paged = get_query_var( 'page' );
        }
        else {
            $paged = 1;
        }

		// Custom Styles
		$title_custom_style = !empty( $title_font_size ) ? ' style="font-size: '. $title_font_size .'"' : '';
		$category_custom_style = !empty( $cat_font_size )  ? ' style="font-size: '. $cat_font_size .'"' : '';

		// Values array
	    $values = array();

		$values['style']                 = $pagination;    
		$values['loadmore_text']         = $loadmore_text;
		$values['allpost_loaded_text']   = $allpost_loaded_text;
		$values['action']                = 'portfolio_loadmore';
		$values['columns']               = $columns;
		$values['hover_style']           = $style;
		$values['portfolio_style']       = $portfolio_style;
		$values['title_tag']             = $title_tag;
		$values['title_custom_style']    = $title_custom_style; 
		$values['category_custom_style'] = $category_custom_style;
		$values['paged']                 = $paged;
		$values['like']                  = $like;
		$values['on_click']              = $on_click;
		$values['link_target']           = $link_target;
		$values['style2_click']          = $style2_click;


		if( $slider != 'yes' ){
			$output = '<div class="loadmore-wrap no-portfolio-carousel '. esc_attr( $portfolio_style .' '. $masonry_class .' '. $port_hover_color ) .'">';
		}

		// Filter categories
		$terms = false;

		if( 'category' != $insert_type ) {
			$terms = get_terms( 'pix_categories' );
		}
		else if( 'category' == $insert_type && 'yes' == $show_sub_category_only ) {

			$term_obj = isset( $portfolio_category ) ? get_term_by( 'slug', $portfolio_category[0], 'pix_categories' ) : '';

			// Get all the sub categories
			if( !empty( $term_obj ) ) {
				$terms = get_terms( array(
				    'taxonomy' => 'pix_categories',
				    'hide_empty' => true,
				    'parent' => $term_obj->term_id
				) );
			}
		}

		if( $slider != 'yes' && ( ( $pix_filterable == 'yes' && $terms ) || $show_search == 'yes' ) ) {

			$output .= '<div class="sorter '. esc_attr( $filter_style ) .'">';

				if( $pix_filterable == 'yes' ) {
					
					if( $terms ){
						$output .= '<div class="filter-wrapper">';
							if( $filter_style == 'dropdown' ){
								$output .= '<div class="top-active"><span class="txt">'. esc_html__( 'All', 'amz-composer-plugins' ) .' </span><span class="pixicon-arrows-down"></span></div>';
							}

							$output .= '<ul id="filters" class="filter-sort option-set '. esc_attr( $filter_style ) .' clearfix" >';
								$output .= '<li><a href="#" class="selected" data-filter="*">'. esc_html__( 'All', 'amz-composer-plugins' ) .'</a></li>';
								foreach( $terms as $term ){ 
									$output .= '<li><a href="#" data-filter=".'. esc_attr( strtolower( str_replace( ' ','-',$term->slug ) ) ) .'">'. esc_html( $term->name ) .'</a></li>';    
								}
							$output .= '</ul>';

						$output .= '</div>';
					}
					
				}

				if( $show_search == 'yes' ){
					$output .= "<div class='portfolio-search' data-args='". json_encode( $args ) ."' data-values='". json_encode( $values ) ."'><input type='text' class='textfield search-field' placeholder='". esc_html__('Search Portfolio','amz-composer-plugins' ) ."'><span class='clear-search'><i class='pixicon-close'></i></span></div>";
				}

			$output .= '</div>';

		}

		if( $slider_pagination == 'false' ){
			$page_class = ' no-pagi-carousel';
		}

		//VC_COLUMNS
		if($slider == 'yes'){
			$data = ' data-items="'. esc_attr( $slide_items ) .'" data-loop="'. esc_attr( $loop ) .'" data-margin="'. esc_attr( $slide_margin ) .'" data-center="'. esc_attr( $center ) .'" data-stage-padding="'. esc_attr( $stage_padding ) .'" data-start-position="'. esc_attr( $start_position ) .'" data-dots="'. esc_attr( $slider_pagination ) .'" data-touch-drag="'. esc_attr( $touch_drag ) .'" data-mouse-drag="'. esc_attr( $mouse_drag ) .'" data-autoplay-hover-pause="'. esc_attr( $stop_on_hover ) .'" data-nav="'. esc_attr( $slide_arrow ) .'" data-autoplay-timeout="'. esc_attr( $slide_speed ) .'" data-autoplay="'. esc_attr( $autoplay ) . '" data-animate-in="'. esc_attr( $animate_in ) .'" data-animate-out="'. esc_attr( $animate_out ) .'"';

			$output .= '<div class="pix-portfolio portfolio-wrap-'. esc_attr( $style .' '. $port_hover_color .' '. $grayscale_class .' '. $margin .' owl-carousel '. $columns .' '. $arrow_type .''. $page_class ) .'" '. $data .'>';
		}else{
			$output .= '<div class="wpb_row vc_row-fluid"><div class="portfolio-contents load-container'. esc_attr( $port_hover_color .' '. $margin .' '. $grayscale_class ) .'">';
			$data = $auto = '';
		}		

		$q = new WP_Query( $args );

		// Get max page
		$max = $q->max_num_pages;
		$values['max'] = $max;

		$i = 1;
		if ( $slider != 'yes') {
			$output .= '<div class="portfolio-grid-sizer '. $class .'"></div>';
		}

		if ( $q->have_posts() ) : while ( $q->have_posts() ) : $q->the_post();		

			$portfolio_image_style = composer_get_meta_value( get_the_id(), '_amz_portfolio_image_style', 'square' );

			if ( $portfolio_style == 'masonry-fixed' ) {

				if( $columns == 'col3' ){
					$temp_class = 'vc_col-sm-4';
					$temp_width = '640';
					$temp_height = '640';
				} elseif( $columns == 'col2' ){
					$temp_class = 'vc_col-sm-6';
					$temp_width = '960';
					$temp_height = '960';
				} else{
					$temp_class = 'vc_col-sm-3';
					$temp_width = '480';
					$temp_height = '480';
				}

				if ( $portfolio_image_style == 'boxed' ) {
					$width = $temp_width * 2;
					$height = $temp_height * 2;

					if( $columns == 'col3' ){
						$class = 'vc_col-sm-8';
					}elseif( $columns == 'col2' ){
						$class = 'vc_col-sm-12';
					}else{
						$class = 'vc_col-sm-6';
					}

				} elseif ( $portfolio_image_style == 'horizontal' ) {
					$width = $temp_width * 2;
					$height = $temp_height;

					if( $columns == 'col3' ){
						$class = 'vc_col-sm-8';
					}elseif( $columns == 'col2' ){
						$class = 'vc_col-sm-12';
					}else{
						$class = 'vc_col-sm-6';
					}

				} elseif ( $portfolio_image_style == 'vertical' ) {

					$width = $temp_width;
					$height = $temp_height * 2;

					$class = $temp_class;

				} else {
					$width = $temp_width;
					$height = $temp_height;

					$class = $temp_class;
				}

				$masonry_class = ' masonry-class';

			}	

			$terms = get_the_terms( get_the_ID(),'pix_categories' );

			$temp_title = get_the_title(); //title
			$temp_content = composer_shorten_text( get_the_content(), $shorten_length ); //content
			$temp_link = get_permalink(); //permalink
			$like_count = get_post_meta( get_the_ID(), '_pix_like_me', true );
			$like_class = ( isset( $_COOKIE['pix_like_me_'. get_the_ID()] ) ) ? 'liked' : '';


			if($like_count == ''){
				$like_count = 0;
			}

			$img = '';

			$composer_portfolio_thumb = composer_get_meta_value( get_the_id(), '_amz_portfolio_image' );

			$pix_images_gallery = htmlspecialchars_decode( $composer_portfolio_thumb );
			$images_gallery = json_decode( $pix_images_gallery,true );

			$append_text = '';

			if( 'yes' == $append_content ){

				$append_text = '<div class="'. esc_attr( $class ) .' pix-portfolio-item portfolio-text-content '. esc_attr( $style ) .' append-'. esc_attr( $append_content_align ) .'">';
					$append_text .= '<div class="portfolio-inner-text">';
						$append_text .= '<h2>'. esc_html( $portfolio_title ) .'</h2>';
						$append_text .= '<p>'. esc_html( $content ). '</p>';

						$btn_att = vc_build_link( $button_link );
						$btn_att['href'] = ( isset( $btn_att['url']) && !empty( $btn_att['url'] ) ) ? $btn_att['url'] : '#';
						$btn_att['title'] = ( isset($btn_att['title'] ) && !empty( $btn_att['title'] ) ) ? $btn_att['title'] : esc_html__('Read More','amz-composer-plugins' );
						$btn_att['target'] = ( isset( $btn_att['target'] ) ) ? $btn_att['target'] : '';	

						if( !empty( $btn_att['href'] ) && !empty( $btn_att['title'] ) ){
							$append_text .= '<div class="pix_button"><a href="'. esc_url( $btn_att['href'] ) .'" '. ( ( !empty( $btn_att['target'] ) ) ? ' target="'. esc_attr( $btn_att['target'] ) .'"' : '' ).' class="clear btn btn-solid btn-oval color btn-hover-solid">'. esc_html( $btn_att['title'] ) .'</a></div>';
						}
					$append_text .= '</div>';
				$append_text .= '</div>';

			}
			
			$temp_thumb = '';
			if( !empty( $images_gallery ) ){				
				
				$temp_thumb = composer_get_image_by_id( (int)$width, (int)$height, $images_gallery[0]['itemId'], 0, 1, 1 );

				$img_fullsize = composer_get_image_by_id( (int)$width, (int)$height, $images_gallery[0]['itemId'], 1, 1, 1 );
			}

			if( $slider == 'yes' ){
				if( 'yes' == $append_content && ( int )$append_content_pos === $i ){
					$output .= $append_text;
				}

				$output .= '<div class="pix-portfolio-item '. esc_attr( $style ) .'">';

			} else {	
				
				if( 'yes' == $append_content && ( int )$append_content_pos === $i ){ 
					$output .= $append_text;
				}

				if( $portfolio_style != 'grid' ){

					$output .= '<div class="load-element '. esc_attr( $class ) .' pix-portfolio-item element '. esc_attr( $style );

					if( !empty( $terms ) ) {
						foreach( $terms as $term ) {
							$output .= ' ' . esc_attr( strtolower( str_replace( ' ','-',$term->slug ) ) ) . ' '; 
						}
					}

					$output .= '">';

				} else {

					$output .= '<div class="'. esc_attr( $class ) .' pix-portfolio-item element '. esc_attr( $style );

					if( !empty( $terms ) ) {
						foreach( $terms as $term ) {
							$output .= ' ' . esc_attr( strtolower( str_replace( ' ','-',$term->slug ) ) ) . ' '; 
						}
					}

					$output .= '">';

				}
			}	        

				$output .= '<div class="portfolio-container portfolio-'. esc_attr( $style ) .'">'; //portfolio Container

				//Assign animation values
				if( 'enable' == $grid_animation && 'yes' != $slider ) {

					$animate_class = 'pix-animate-portfolio';
					$delay = 200;

					$slide_transition = isset( $grid_transition ) ? ' data-trans="'. esc_attr( $grid_transition ) .'" ' : '';
					// $slide_duration = isset( $duration ) ? ' data-duration="'. esc_attr( $duration ) .'" ' : '';
					$slide_duration = ' data-duration="300ms"';
					$slide_delay = ' data-delay="'. esc_attr( $delay ) .'ms" ';

					$output .= '<div class="'. esc_attr( $animate_class ) .'"' . $slide_transition . $slide_duration . $slide_delay.'>'; // variable $slide_transition, $slide_duration, $slide_delay are already escaped on above
				}

    			$id = get_the_id();

				//terms
				$pix_cats = get_the_term_list( get_the_ID() , 'pix_categories','',', ' );
				$pix_cats = !empty( $pix_cats ) ? strip_tags( $pix_cats ) : '';

					if( $style == 'style1' ){
						//portfolio Image
						$output .= '<div class="portfolio-img">
									'.$temp_thumb.'
								</div>';
								
						$output .=	'<div class="portfolio-hover">';
						
							$output .= '<div class="portfolio-link">';

								if( $on_click == 'single_port_link' ) {
									$output .= '<a href="'. esc_url( get_permalink() ) .'" target"'. $link_target .'" class="inner-content">';
								} elseif( $on_click == 'single_button_link' ) {
									$output .= '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
								}
									
									$output .= '<div class="portfolio-content">'; //portfolio Container

										$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

										$output .= '<p'. $category_custom_style .'>';
										
										$output .= $pix_cats; 

										$output .= '</p>';

									$output .= '</div>'; //End of portfolio Content

								if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
									$output .= '</a>';
								}			

								//Lightbox icon
								if( $lightbox == 'yes' && !empty( $img_fullsize ) ){

									$output .= '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container	

										$output .= '<a href="'. esc_url( $img_fullsize ) .'" class="port-icon-hover popup-gallery" data-title="'. esc_attr( get_the_title() ) .'"><i class="pixicon-plus"></i></a>';

									$output .= '</div></div>'; //End of portfolio icons
								}

							$output .= '</div>';

						$output .=	'</div>'; //End of portfolio hover
					}

					if($style == 'style2'){
						$output .= '<div class="portfolio-style2-img">';
							//portfolio Image
							$output .= '<div class="portfolio-img">
											'.$temp_thumb.'
										</div>';

							$output .=	'<div class="portfolio-hover">';
							
								if( $style2_click == 'lightbox' ){
									$output .= '<a href="'. esc_url( $img_fullsize ) .'" class="inner-content popup-gallery">';
								} elseif( $style2_click == 'single_port_link' ) {
									$output .= '<a href="'. esc_url( get_permalink() ) .'" target"'. $link_target .'" class="inner-content">';
								} elseif( $style2_click == 'single_button_link' ) {
									$output .= '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
								}

								$output .= '<div class="portfolio-link">';
								
									$output .= '<div class="portfolio-content">'; //portfolio Container

										$output .= '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container			
											//Lightbox icon
											$output .= '<span class="port-icon-hover"><i class="pixicon-plus"></i></span>';

										$output .= '</div></div>'; //End of portfolio icons

									$output .= '</div>'; //End of portfolio Content

								$output .= '</div>';

							$output .= '</a>';

							$output .=	'</div>'; //End of portfolio hover

						$output .= '</div>';
						
						$output .= '<div class="portfolio-style2-content">';
								//Author name
								if( $on_click == 'single_port_link' ) {
									$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'><a href="'. esc_url( $temp_link ) .'" target"'. $link_target .'">'.esc_html( $temp_title ).'</a></'. composer_title_tag( $title_tag ) .'>';
								} elseif( $on_click == 'single_button_link' ) {
									$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'><a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'">'.esc_html( $temp_title ).'</a></'. composer_title_tag( $title_tag ) .'>';
								} else {
									$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title
								}

								$output .= '<p'. $category_custom_style .'>';

								$output .= $pix_cats; 

								$output .= '</p>';

								if( $like == 'yes' ){
									$output .= '<div class="portfolio-style2-like">';
										$like_count = get_post_meta( get_the_ID(), '_pix_like_me', true );
										$like_class = ( isset($_COOKIE['pix_like_me_'. get_the_ID()])) ? 'liked' : '';

										if($like_count == ''){
											$like_count = 0;
										}

										$output .= '<a href="#void" class="pix-like-me '. $like_class .'" data-id="'. get_the_ID() .'"><i class="pixicon-heart-2"></i><span class="like-count">'. $like_count .'</span></a>';
									$output .= '</div>';
								}
						$output .= '</div>';

					}

					if( $style == 'style3' ){

						$output .= $temp_thumb;
						
						$output .= '<div class="portfolio-style3-content">';

								$output .= '<div class="portfolio-link">';

									if( $on_click == 'single_port_link' ) {
										$output .= '<a href="'. esc_url( get_permalink() ) .'" target"'. $link_target .'" class="inner-content">';
									} elseif( $on_click == 'single_button_link' ) {
										$output .= '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
									}

										$output .= '<div class="portfolio-content">';
											//Author name
											$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

											$output .= '<p'. $category_custom_style .'>';

											$output .= $pix_cats; 

											$output .= '</p>';

										$output .= '</div>';
									
									if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
										$output .= '</a>';
									}	

								$output .= '</div>';

							$output .= '</div>';

					}

					if($style == 'style4'){

						$output .= $temp_thumb;
						
						$output .= '<div class="portfolio-style4-content">';

							if( $on_click == 'single_port_link' ) {
								$output .= '<a href="'. esc_url( get_permalink() ) .'" target"'. $link_target .'" class="inner-content">';
							} elseif( $on_click == 'single_button_link' ) {
								$output .= '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
							}

								$output .= '<div class="portfolio-link">';

									$output .= '<div class="portfolio-content">';
										//Author name
										$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

										$output .= '<p'. $category_custom_style .'>';

										$output .= $pix_cats; 

										$output .= '</p>';

									$output .= '</div>';

								$output .= '</div>';

							if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
								$output .= '</a>';
							}	

							//Lightbox icon
							if( $lightbox == 'yes' && !empty( $img_fullsize ) ){
								$output .= '<div class="portfolio-icons"><div class="center-wrap">'; //portfolio Container							

									$output .= '<a href="'. $img_fullsize .'" class="port-icon-hover popup-gallery" data-title="'. esc_attr( get_the_title() ) .'"><i class="pixicon-plus"></i></a>';

								$output .= '</div></div>'; //End of portfolio icons
							}

						$output .= '</div>';

					}

					if( $style == 'style5' ){
						//portfolio Image
						$output .= '<div class="portfolio-img">
									'.$temp_thumb.'
								</div>';
								
						$output .=	'<div class="portfolio-hover">';
						
							$output .= '<div class="portfolio-link">';

							if( $on_click == 'single_port_link' ) {
								$output .= '<a href="'. esc_url( get_permalink() ) .'" class="inner-content">';
							} elseif( $on_click == 'single_button_link' ) {
								$output .= '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
							}
								
									$output .= '<div class="portfolio-content">'; //portfolio Container

										$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

										$output .= '<p'. $category_custom_style .'>';
										
										$output .= $pix_cats; 

										$output .= '</p>';

									$output .= '</div>'; //End of portfolio Content

							if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
								$output .= '</a>';
							}	

							$output .= '</div>';

						$output .=	'</div>'; //End of portfolio hover
					}

					if( $style == 'style6' ){
						//portfolio Image
						$output .= '<div class="portfolio-img">
									'.$temp_thumb.'
								</div>';
								
						$output .=	'<div class="portfolio-hover">';
						
							$output .= '<div class="portfolio-link">';

							if( $on_click == 'single_port_link' ) {
								$output .= '<a href="'. esc_url( get_permalink() ) .'" class="inner-content">';
							} elseif( $on_click == 'single_button_link' ) {
								$output .= '<a href="'. esc_url( composer_get_meta_value( $id, '_amz_project_url', '' ) ) .'" target"'. $link_target .'" class="inner-content">';
							}
								
									$output .= '<div class="portfolio-content">'; //portfolio Container

										$output .= '<'. composer_title_tag( $title_tag ) .' class="title"'. $title_custom_style .'>'.esc_html( $temp_title ).'</'. composer_title_tag( $title_tag ) .'>'; //title

										$output .= '<span class="port-line"></span><p'. $category_custom_style .'>';
										
										$output .= $pix_cats; 

										$output .= '</p>';

									$output .= '</div>'; //End of portfolio Content

							if( $on_click == 'single_port_link' || $on_click == 'single_button_link' ){
								$output .= '</a>';
							}	

							$output .= '</div>';

						$output .=	'</div>'; //End of portfolio hover
					}

					//Assign animation values
					if( 'enable' == $grid_animation && 'yes' != $slider ) {

						$output .= '</div>'; // variable $slide_transition, $slide_duration, $slide_delay are already escaped on above
					}

				$output .= '</div>'; //End of portfolio Container

			$output .= '</div>'; //End of pix portfolio Item

			$i++;
		endwhile;
		
		else:
		  $output .= '<div>'. esc_html__( 'No Portfolio Items Found.', 'amz-composer-plugins' ) .'</div>';
		endif;

		$i = $i-1;

		if( 'yes' == $append_content && (int)$append_content_pos > $i ){
			$output .= $append_text;
		}

		
		if( $slider == 'yes' ){
			$output .= '</div>';
		}
		else{

			$output .= '</div>';

			$output .= '</div>';
		}

		if( $slider != 'yes' ){
			
			if( $max > 1 ) {
				$output .= composer_pagination( $args, $values ); // args, values
			}

			$output .= '</div>';
		}

		wp_reset_postdata();
		return  $output;
	}

	add_shortcode( 'portfolio', 'composer_portfolio' );

	function composer_login_register_form($atts, $content = null) {
		extract(shortcode_atts(array(
			'login_form_title' => esc_html__( 'Login', 'composer' ),
			'login_btn_txt'    => esc_html__( 'Submit', 'composer' ),
			'reset_title' => esc_html__( 'Reset Password', 'composer' ),
			'reset_btn_txt'    => esc_html__( 'Submit', 'composer' ),
			'my_account_title'    => esc_html__( 'My Account', 'composer' ),
			'update_btn_txt'    => esc_html__( 'Update', 'composer' ),
			'register_form_title'    => esc_html__( 'Register', 'composer' ),
			'register_btn_txt'    => esc_html__( 'Submit', 'composer' )

		), $atts));

		// Empty assignment
		$output = '';

		$action = isset( $_GET['action'] ) ? $_GET['action'] : '';
		$key = isset( $_GET['key'] ) ? $_GET['key'] : '';
		$login = isset( $_GET['login'] ) ? $_GET['login'] : '';

		$output .= '<div class="form-wrap">';

			if( $action == 'rp' ) {
				$output .= '<div class="reset-password-con">';

					$output .= '<form method="post" class="reset-form" data-key="'. esc_attr( $key ) .'">';

						$output .= '<h3 class="title">'. esc_html( $reset_title ) .'</h3>';

						$output .= '<p class="field">';
							$output .= '<label>'. esc_html__( 'Password', 'composer' ) .'</label>';
							$output .= '<input type="password" class="password" name="password" value="'. esc_attr( $key ) .'">';
						$output .= '</p>';

						$output .= '<p><a href="#" data-login="'. esc_attr( $login ) .'" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-reset-form">'. esc_html( $reset_btn_txt ) .'</a><span class="success"></span></p>';

					$output .= '</form>';

				$output .= '</div>'; // .reset-password-con
			}
			else if( !is_user_logged_in() ) {
				$output .= '<div class="login-form-cover">';
					$output .= '<div class="login-form-con">';

						$output .= '<form method="post" class="login-form">';
							$output .= '<span class="reset-notice"></span>';

							$output .= '<h3 class="title">'. esc_html( $login_form_title ) .'</h3>';

							$output .= '<p class="field">';
								$output .= '<label for="login-username">'. esc_html__( 'Username', 'composer' ) .'</label>';
								$output .= '<input id="login-username" type="text" class="username" name="username">';
								$output .= '<span class="username-notice error"></span>';
							$output .= '</p>';

							$output .= '<p class="field">';
								$output .= '<label for="login-password">'. esc_html__( 'Password', 'composer' ) .'</label>';
								$output .= '<input id="login-password" type="password" class="password" name="password">';
								$output .= '<span class="password-notice error"></span>';
							$output .= '</p>';

							$output .= '<p class="form-field form-checkbox"><input type="checkbox" name="remember_me" class="remember_me"><label for="remember_me">'. esc_html__( 'Remember Me?', 'composer' ) .'</label><span class="remember-me"></span></p>';

							$output .= '<p class="field">'. esc_html__( 'Cant\'t access your account?', 'composer' ) .'<a href="#" class="forgot-password">'. esc_html__( 'Forget Password?', 'composer' ) .'</a></p>';

							$output .= '<p><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-login-form">'. esc_html( $login_btn_txt ) .'</a><span class="success"></span></p>';

						$output .= '</form>';

					$output .= '</div>'; // .login-form-con

					$output .= '<div class="forgot-password-con">';

						$output .= '<form method="post" class="forgot-form">';

							$output .= '<h3 class="title">'. esc_html( $reset_title ) .'</h3>';

							$output .= '<p>'. esc_html__( 'Enter your email address and we\'ll send you a link you can use to pick a new password', 'composer' ) .'</p>';

							$output .= '<p class="field">';
								$output .= '<label>'. esc_html__( 'Username or Email', 'composer' ) .'</label>';
								$output .= '<input type="text" class="user_login" name="user_login">';
								$output .= '<span class="user-login-notice error"></span>';
							$output .= '</p>';

							$output .= '<p><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-forgot-form">'. esc_html( $reset_btn_txt ) .'</a><span class="or">'. esc_html__( '-OR-', 'composer' ) .'</span><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color show-login-form">'. esc_html__( 'Cancel', 'composer' ) .'</a><span class="success"></span></p>';

						$output .= '</form>';

					$output .= '</div>'; // .forgot-password-con
				$output .= '</div>'; // .forgot-password-con

				$member = get_option( 'users_can_register', '0' );

				if( '1' == $member ) {
					$output .= '<form method="post" class="register-form">';
						$output .= '<h3 class="title">'. esc_html( $register_form_title ) .'</h3>';

						$output .= '<p class="general-notice"></p>';
						$output .= '<div class="row">';

							$output .= '<p class="field col-md-12">';
								$output .= '<label>'. esc_html__( 'Username', 'composer' ) .'</label>';
								$output .= '<input type="text" class="username" name="username">';
								$output .= '<span class="username-notice error"></span>';
							$output .= '</p>';

							$output .= '<p class="field col-md-12">';
								$output .= '<label>'. esc_html__( 'Email', 'composer' ) .'</label>';
								$output .= '<input type="email" class="email" name="email">';
								$output .= '<span class="email-notice error"></span>';
							$output .= '</p>';

							$output .= '<p class="field col-md-12"><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-register-form">'. esc_html( $register_btn_txt ) .'</a><span class="success"></span></p>';

						$output .= '</div>'; // .row

					$output .= '</form>'; // .register-form
				}
				else {
					$output .= '<div class="disable-registration"><p>'. esc_html__( 'Registration has been disabled for this site', 'composer' ) .'</p></div>'; // .register-form
				}
			}
			else if( is_user_logged_in() ) {

				// Get redirect link
		        $redirect = composer_get_option_value( 'login_page_id', '' );

		        // Login page url
		        if( !empty( $redirect ) ) {
		                $url = esc_url( get_permalink( $redirect ) );
		        }
		        else {
		            $url = esc_url( home_url( '/' ) );               
		        }
	        
				$output .= '<div class="my-account-con">';

					$output .= '<form method="post" class="update-form">';

						$output .= '<h3 class="title">'. esc_html( $my_account_title ) .'<a href="'. esc_url( wp_logout_url( $url ) ) .'">'. esc_html__( 'Logout?', 'composer' ) .'</a></h3>';

						$output .= '<div class="row">';

							$output .= '<p class="field col-md-6">';
								$output .= '<label>'. esc_html__( 'First Name', 'composer' ) .'</label>';
								$output .= '<input type="text" class="first_name" name="first_name">';
								$output .= '<span class="error"></span>';
							$output .= '</p>';

							$output .= '<p class="field col-md-6">';
								$output .= '<label>'. esc_html__( 'Last Name', 'composer' ) .'</label>';
								$output .= '<input type="text" class="last_name" name="last_name">';
								$output .= '<span class="error"></span>';
							$output .= '</p>';

							$output .= '<p class="field col-md-6">';
								$output .= '<label>'. esc_html__( 'Website', 'composer' ) .'</label>';
								$output .= '<input type="text" class="website" name="website">';
								$output .= '<span class="error"></span>';
							$output .= '</p>';

							$output .= '<p class="field col-md-6">';
								$output .= '<label>'. esc_html__( 'Email', 'composer' ) .'</label>';
								$output .= '<input type="text" class="email" name="email">';
								$output .= '<span class="error"></span>';
							$output .= '</p>';

							$output .= '<p class="field col-md-6">';
								$output .= '<label>'. esc_html__( 'Old Password', 'composer' ) .'</label>';
								$output .= '<input type="text" class="old_password" name="old_password">';
								$output .= '<span class="password-notice error"></span>';
							$output .= '</p>';

							$output .= '<p class="field col-md-6">';
								$output .= '<label>'. esc_html__( 'New Password', 'composer' ) .'</label>';
								$output .= '<input type="text" class="new_password" name="new_password">';
								$output .= '<span class="new-password-notice error"></span>';
							$output .= '</p>';

						$output .= '</div>';

						$output .= '<p><a href="#" class="btn btn-solid btn-hover-solid btn-oval color btn-hover-color submit-update-form">'. esc_html( $update_btn_txt ) .'</a><span class="success"></span></p>';

					$output .= '</form>';

				$output .= '</div>'; // .change-password-con
			}

		$output .= '</div>'; // .form-wrap

		return  $output;
	}
	add_shortcode('login_register_form', 'composer_login_register_form');

	function blog_link() {
		return '<a href="'.esc_url( home_url( '/' ) ) .'">'. get_bloginfo('name') .'</a>';
	}
	add_shortcode('blog-link', 'blog_link');

	function composer_time_line($atts, $content = null) {
		extract(shortcode_atts(array(
			'theme_img'    => '',
			'title'        => '',
			'desc'         => '',
			'preview_link' => '',
			'style'        => '',
			'batch_name'   => '',
		), $atts));

		$output ='<div class="composer-time-line">';
			$output .='<div class="time-line">';
				$output .='<span class="timeline-date">Present</span>';
				$output .='<h2 class="title">instructor, <span class="color"> Amazee </span></h2>';
				$output .='<p>Donec vitae sapien ut libero venenatis faucibus. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien, a accumsan nisi.</p>';	
			$output .='</div>';
			$output .='<div class="time-line">';
				$output .='<span class="timeline-date">2012-2014</span>';
				$output .='<h2 class="title">instructor, <span class="color"> Amazee </span></h2>';
				$output .='<p>Donec vitae sapien ut libero venenatis faucibus. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien, a accumsan nisi.</p>';	
			$output .='</div>';
			$output .='<div class="time-line">';
				$output .='<span class="timeline-date">Present</span>';
				$output .='<h2 class="title">instructor, <span class="color"> Amazee </span></h2>';
				$output .='<p>Donec vitae sapien ut libero venenatis faucibus. Proin viverra, ligula sit amet ultrices semper, ligula arcu tristique sapien, a accumsan nisi.</p>';	
			$output .='</div>';
		$output .='</div>';
		return  $output;
	}
	add_shortcode('timeline', 'composer_time_line');

	/* =============================================================================
		 Single Image with Link
	   ========================================================================== */

	function composer_single_image_link($atts, $content = null) {
		extract(shortcode_atts(array(
			'front_image'        => '',
			'image_link'         => 'img_con_with_link',
			'link_url'           => '',
			'link_target'        => '_self',
			'background_color'   => '',
			'title'              => esc_html__( 'Section Title', 'amz-composer-plugins' ),
			'title_tag'          => 'h2',
			'title_uppercase'    => 'yes',
			'title_color'        => '',
			'custom_size'        => '',
			'text_color'         => ''
			), $atts));
		
		$text_color_style = $custom_text_style = $bg_color_style = '';

		$output = '<div class="single_image_link">';

		if( !empty( $front_image ) ) {
			$image = composer_get_image_by_id( 'full', 'full', $front_image, 0, 0, 1 );
		}

		if( $image_link == 'img_con_with_link'  ) {
			$output .='<a href="'.$link_url.'" class="image_link">';
		}

		$output .='<div class="post-img">';
		
		if(!empty($image)){			
			$output .= $image;
		}
		
		$output .='</div>';

		if(!empty($background_color)){
			$bg_color_style = ' style="background-color:'. esc_attr( $background_color ) .'"';
		}	

		if( $image_link == 'con_with_link'  ) {
			$output .='<a href="'.$link_url.'" class="image_link">';
		}

		$output .='<div class="content"'. $bg_color_style .'>';

		$title_uppercase_class = ( 'yes' == $title_uppercase ) ? ' uppercase': '';

		if ( !empty($custom_size) || !empty($title_color) ) {
			$custom_text_style .= ' style="';
			$custom_text_style .= ( !empty( $custom_size ) ) ? ' font-size: '. $custom_size .';': '';
			$custom_text_style .= ( !empty( $title_color ) ) ? ' color: '. $title_color .';': '';
			$custom_text_style .= '"';
		}

		$output .='<'. composer_title_tag( $title_tag ) .' class="title'. esc_attr( $title_uppercase_class ) .'"'. $custom_text_style .'>'. esc_html( $title ) .'</'. composer_title_tag( $title_tag ) .'>';

		if(!empty($text_color)){
			$text_color_style = ' style="color:'. esc_attr( $text_color ) .'"';
		}	

		$output .= '<p class="content-text"'. $text_color_style .'>'. wpb_js_remove_wpautop( $content ) .'</p>';

		$output .='</div>';

		if( $image_link == 'con_with_link' || $image_link == 'img_con_with_link'  ) {
			$output .= '</a>';
		}

		$output .='</div>';

		return  $output;
		
	}

	add_shortcode('single_image_link', 'composer_single_image_link');


	/* =============================================================================
		 Single Portfolio Project Details
	   ========================================================================== */

	function composer_single_portfolio_project_details($atts, $content = null) {
		extract(shortcode_atts(array(
			'details' => '',
			'el_class' => ''
			), $atts));

		// Empty assignment
		$output = '';

		$output .= '<aside class="portfolio-info">';

            $output .= '<div class="portfolio-info-inner">';

            	$details = !empty( $details ) ? vc_param_group_parse_atts( $details ) : array();

            	if( !empty( $details ) ) {
            		$output .= '<dl>';
	            		foreach( $details as $key => $detail ) {
	            			$output .= '<dt>'. esc_html( $detail['title'] ) .'</dt>';
			                $output .= '<dd class="author">'. esc_html( $detail['value'] ) .'</dd>';
	            		}
            		$output .= '</dl>';
            	}

                

            $output .= '</div>'; // portfolio-info-inner
        $output .= '</aside>'; // col-md-4

		return  $output;
		
	}

	add_shortcode('single_portfolio_project_details', 'composer_single_portfolio_project_details');
