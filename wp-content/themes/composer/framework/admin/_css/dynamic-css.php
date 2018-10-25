<?php 

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$custom_fonts = composer_dynamic_css_option( 'custom_fonts', array() );

if( !empty( $custom_fonts ) ) {
	$user_fonts = '';

	foreach ( $custom_fonts as $font ) {

		if( $font['font_title'] && ( $font['woff'] || $font['ttf'] || $font['eot'] || $font['svg'] ) ) {

			$user_fonts .= '@font-face {';
				$user_fonts .= 'font-family: "' . $font['font_title'] . '";';

				if( !empty( $font['eot'] ) ) {
					$user_fonts .= 'src: url("' . $font['eot'] . '");';
					$user_fonts .= 'src: url("' . $font['eot'] . '?#iefix") format("embedded-opentype"),';
				} else {
					$user_fonts .= 'src:';
				}
				
				$user_fonts .= ( !empty( $font['woff'] ) ) ? 'url("' . $font['woff'] . '") format("woff"),' : '';
				$user_fonts .= ( !empty( $font['ttf'] ) ) ? 'url("' . $font['ttf'] . '") format("truetype"),' : '';
				$user_fonts .= ( !empty( $font['svg'] ) ) ? 'url("' . $font['svg'] . '") format("svg"),' : '';

				$user_fonts = preg_replace('/\,$/', '', $user_fonts);

				$user_fonts .= ';';

			$user_fonts .= '}';

		}

	}

	echo $user_fonts;
}

$body_font = composer_dynamic_css_option( 'custom_font_body', array('size'  => '14px', 'g_face' => 'Raleway', 'face'  => 'Arial, sans-serif', 'style' => 'regular' ) );
	
$body_gf    = composer_get_font_family( $body_font );   //Choosen Google webfont
$body_fv    = composer_get_font_style( $body_font );    //Google web font variant (eg; 300italic)
$body_fsize = composer_get_font_size( $body_font );     //Font size
$body_ff    = composer_get_font_fallback( $body_font ); // Fallback font

$body_fvs = composer_font_variant( $body_fv ); //Seperated font variation

/* Heading/Primary Custom Fonts */
$heading_font = composer_dynamic_css_option( 'custom_font_primary', array('g_face' => 'Poppins', 'face'  => 'Arial, sans-serif' ) );

$heading_gf = composer_get_font_family( $heading_font );
$heading_ff = composer_get_font_fallback( $heading_font );

/* Content Custom Fonts */
$con_font = composer_dynamic_css_option( 'custom_font_content', array('g_face' => 'Raleway', 'face'  => 'Arial, sans-serif' ) );

$con_gf = composer_get_font_family( $con_font );
$con_ff = composer_get_font_fallback( $con_font );

$afs = composer_dynamic_css_option( 'ad_font_settings', 'no' );


$custom_styles = composer_dynamic_css_option( 'custom_styles', 'no' );
$custom_header_styles = composer_dynamic_css_option( 'custom_header_styles', 'no' );

/* Custom Body Styles */
$customize_body_bg = composer_dynamic_css_option( 'customize_body_bg', 'no' );
$custom_body_bg_color = composer_dynamic_css_option( 'body_background', '' );
$custom_body_bg = composer_dynamic_css_option( 'custom_body_bg', '' );
$custom_body_bg_pattern = composer_dynamic_css_option( 'custom_body_bg_pattern', '' );
$custom_body_bg_attachment = composer_dynamic_css_option( 'custom_body_bg_attachment', '' );
$custom_body_bg_size = composer_dynamic_css_option( 'custom_body_bg_size', '' );
$custom_body_bg_repeat = composer_dynamic_css_option( 'custom_body_bg_repeat', '' );

if($custom_body_bg != '' && $custom_body_bg != 'none'){
	$custom_body_bg = str_replace('[site_url]', site_url(), $custom_body_bg);
}


	$cf_h1 = $cf_h2 = $cf_h3 = $cf_h4 = $cf_h5 = $cf_h6 = '';
	if ( 'yes' === $afs ):

		/* H1 Custom Fonts */
		$cf_h1_font = composer_dynamic_css_option( 'cf_h1', array() );
		
		$cf_h1_gf = $cf_h1_font['g_face']; //Choosen Google webfont
		$cf_h1_fv = $cf_h1_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h1_fsize = $cf_h1_font['size']; //Font size
		$cf_h1_ff = $cf_h1_font['face']; // Fallback font

		$cf_h1_fv = composer_font_variant($cf_h1_fv); //Seperated font variation
	?>
	h1{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_h1_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_h1_ff ) ); ?>;
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_h1_fsize ) ); ?>;
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_h1_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_h1_fv[1] ) ); ?>;
	}

	<?php 
		/* H2 Custom Fonts */
		$cf_h2_font = composer_dynamic_css_option( 'cf_h2', array() );
		
		$cf_h2_gf = $cf_h2_font['g_face']; //Choosen Google webfont
		$cf_h2_fv = $cf_h2_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h2_fsize = $cf_h2_font['size']; //Font size
		$cf_h2_ff = $cf_h2_font['face']; // Fallback font

		$cf_h2_fv = composer_font_variant($cf_h2_fv); //Seperated font variation
	?>
	h2{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_h2_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_h2_ff ) ); ?>;
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_h2_fsize ) ); ?>;
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_h2_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_h2_fv[1] ) ); ?>;
	}

	<?php 
		/* H3 Custom Fonts */
		$cf_h3_font = composer_dynamic_css_option( 'cf_h3', array() );
		
		$cf_h3_gf = $cf_h3_font['g_face']; //Choosen Google webfont
		$cf_h3_fv = $cf_h3_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h3_fsize = $cf_h3_font['size']; //Font size
		$cf_h3_ff = $cf_h3_font['face']; // Fallback font

		$cf_h3_fv = composer_font_variant($cf_h3_fv); //Seperated font variation
	?>
	h3{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_h3_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_h3_ff ) ); ?>;   
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_h3_fsize ) ); ?>;
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_h3_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_h3_fv[1] ) ); ?>;
	}

	<?php 
		/* H4 Custom Fonts */
		$cf_h4_font = composer_dynamic_css_option( 'cf_h4', array() );
		
		$cf_h4_gf = $cf_h4_font['g_face']; //Choosen Google webfont
		$cf_h4_fv = $cf_h4_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h4_fsize = $cf_h4_font['size']; //Font size
		$cf_h4_ff = $cf_h4_font['face']; // Fallback font

		$cf_h4_fv = composer_font_variant($cf_h4_fv); //Seperated font variation
	?>
	h4{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_h4_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_h4_ff ) ); ?>;
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_h4_fsize ) ); ?>;          
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_h4_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_h4_fv[1] ) ); ?>;
	}

	<?php 
		/* H5 Custom Fonts */
		$cf_h5_font = composer_dynamic_css_option( 'cf_h5', array() );
		
		$cf_h5_gf = $cf_h5_font['g_face']; //Choosen Google webfont
		$cf_h5_fv = $cf_h5_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h5_fsize = $cf_h5_font['size']; //Font size
		$cf_h5_ff = $cf_h5_font['face']; // Fallback font

		$cf_h5_fv = composer_font_variant($cf_h5_fv); //Seperated font variation
	?>
	h5{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_h5_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_h5_ff ) ); ?>;
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_h5_fsize ) ); ?>;          
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_h5_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_h5_fv[1] ) ); ?>;
	}

	<?php 
		/* H6 Custom Fonts */
		$cf_h6_font = composer_dynamic_css_option( 'cf_h6', array() );
		
		$cf_h6_gf = $cf_h6_font['g_face']; //Choosen Google webfont
		$cf_h6_fv = $cf_h6_font['style'];  //Google web font variant (eg; 300italic)
		$cf_h6_fsize = $cf_h6_font['size']; //Font size
		$cf_h6_ff = $cf_h6_font['face']; // Fallback font

		$cf_h6_fv = composer_font_variant($cf_h6_fv); //Seperated font variation
	?>
	h6{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_h6_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_h6_ff ) ); ?>; 
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_h6_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_h6_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_h6_fv[1] ) ); ?>;
	}

	<?php 
	   /* List Item */
		$cf_list = composer_dynamic_css_option( 'cf_list', array() );
		
		$cf_list_gf = $cf_list['g_face']; //Choosen Google webfont
		$cf_list_fv = $cf_list['style'];  //Google web font variant (eg; 300italic)
		$cf_list_fsize = $cf_list['size']; //Font size
		$cf_list_ff = $cf_list['face']; // Fallback font

		$cf_list_fv = composer_font_variant($cf_list_fv); //Seperated font variation
	?>    
	li, li a {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_list_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_list_ff ) ); ?>; 
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_list_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_list_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_list_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Link */
		$cf_link = composer_dynamic_css_option( 'cf_link', array() );
		
		$cf_link_gf = $cf_link['g_face']; //Choosen Google webfont
		$cf_link_fv = $cf_link['style'];  //Google web font variant (eg; 300italic)
		$cf_link_fsize = $cf_link['size']; //Font size
		$cf_link_ff = $cf_link['face']; // Fallback font

		$cf_link_fv = composer_font_variant($cf_link_fv); //Seperated font variation
	?>   
	a{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_link_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_link_ff ) ); ?>; 
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_link_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_link_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_link_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Logo */
		$cf_logo = composer_dynamic_css_option( 'cf_logo', array() );
		
		$cf_logo_gf = $cf_logo['g_face']; //Choosen Google webfont
		$cf_logo_fv = $cf_logo['style'];  //Google web font variant (eg; 300italic)
		$cf_logo_fsize = $cf_logo['size']; //Font size
		$cf_logo_ff = $cf_logo['face']; // Fallback font

		$cf_logo_fv = composer_font_variant($cf_logo_fv); //Seperated font variation
	?>   
	#logo{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_logo_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_logo_ff ) ); ?>; 
		font-size:   <?php echo  stripslashes( wp_strip_all_tags( $cf_logo_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_logo_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_logo_fv[1] ) ); ?>;
	}
	
   
	<?php 
		/* blockquote */
		$cf_blockquote = composer_dynamic_css_option( 'cf_blockquote', array() );
		
		$cf_blockquote_gf = $cf_blockquote['g_face']; //Choosen Google webfont
		$cf_blockquote_fv = $cf_blockquote['style'];  //Google web font variant (eg; 300italic)
		$cf_blockquote_fsize = $cf_blockquote['size']; //Font size
		$cf_blockquote_ff = $cf_blockquote['face']; // Fallback font

		$cf_blockquote_fv = composer_font_variant($cf_blockquote_fv); //Seperated font variation
	?>  
	blockquote {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_blockquote_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_blockquote_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_blockquote_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_blockquote_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_blockquote_fv[1] ) ); ?>;
	}	
	
	<?php 
	   /* Main Menu */
		$cf_menu = composer_dynamic_css_option( 'cf_menu', array() );
		
		$cf_menu_gf = $cf_menu['g_face']; //Choosen Google webfont
		$cf_menu_fv = $cf_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_menu_fsize = $cf_menu['size']; //Font size
		$cf_menu_ff = $cf_menu['face']; // Fallback font

		$cf_menu_fv = composer_font_variant($cf_menu_fv); //Seperated font variation
	?> 
	.main-nav .menu li, .main-nav .menu li a{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_menu_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_menu_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_menu_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_menu_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_menu_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Sub Menu */
		$cf_sub_menu = composer_dynamic_css_option( 'cf_sub_menu', array() );
		
		$cf_sub_menu_gf = $cf_sub_menu['g_face']; //Choosen Google webfont
		$cf_sub_menu_fv = $cf_sub_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_sub_menu_fsize = $cf_sub_menu['size']; //Font size
		$cf_sub_menu_ff = $cf_sub_menu['face']; // Fallback font

		$cf_sub_menu_fv = composer_font_variant($cf_sub_menu_fv); //Seperated font variation
	?> 
	.main-nav .sub-menu, .main-nav .menu .sub-menu li a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_sub_menu_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_sub_menu_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_sub_menu_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_sub_menu_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_sub_menu_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Mega Menu Title*/
		$cf_mega_menu = composer_dynamic_css_option( 'cf_mega_menu', array() );
		
		$cf_mega_menu_gf = $cf_mega_menu['g_face']; //Choosen Google webfont
		$cf_mega_menu_fv = $cf_mega_menu['style'];  //Google web font variant (eg; 300italic)
		$cf_mega_menu_fsize = $cf_mega_menu['size']; //Font size
		$cf_mega_menu_ff = $cf_mega_menu['face']; // Fallback font

		$cf_mega_menu_fv = composer_font_variant($cf_mega_menu_fv); //Seperated font variation
	?>
	.main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li > a:hover, .main-nav li.pix-megamenu > ul.sub-menu > li:hover > a{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_mega_menu_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_mega_menu_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_mega_menu_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_mega_menu_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_mega_menu_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* TITLE Shortcode Default */
		$cf_main_title = composer_dynamic_css_option( 'cf_main_title', array() );
		
		$cf_main_title_gf = $cf_main_title['g_face']; //Choosen Google webfont
		$cf_main_title_fv = $cf_main_title['style'];  //Google web font variant (eg; 300italic)
		$cf_main_title_fsize = $cf_main_title['size']; //Font size
		$cf_main_title_ff = $cf_main_title['face']; // Fallback font

		$cf_main_title_fv = composer_font_variant($cf_main_title_fv); //Seperated font variation
	?>
	.title, .title a {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_main_title_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_main_title_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_main_title_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_main_title_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_main_title_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Button Default */
		$cf_btn = composer_dynamic_css_option( 'cf_btn', array() );
		
		$cf_btn_gf = $cf_btn['g_face']; //Choosen Google webfont
		$cf_btn_fv = $cf_btn['style'];  //Google web font variant (eg; 300italic)
		$cf_btn_fsize = $cf_btn['size']; //Font size
		$cf_btn_ff = $cf_btn['face']; // Fallback font

		$cf_btn_fv = composer_font_variant($cf_btn_fv); //Seperated font variation
	?>
	.btn{   
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_btn_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_btn_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_btn_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_btn_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_btn_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Button Small */
		$cf_btn_small = composer_dynamic_css_option( 'cf_btn_small', array() );
	?>
	.btn.btn-sm{
		font-size: <?php echo stripslashes( wp_strip_all_tags( $cf_btn_small ) ); ?>;
	}

	
	<?php 
	/* Button Large */
	$cf_btn_large = composer_dynamic_css_option( 'cf_btn_lg', array() );
	?>
	.btn-lg{
		font-size: <?php echo stripslashes( wp_strip_all_tags( $cf_btn_large ) ); ?>;
	}

	
	<?php 
	   /* Process Title */
		$cf_process_title = composer_dynamic_css_option( 'cf_process_title', array() );
		
		$cf_process_title_gf = $cf_process_title['g_face']; //Choosen Google webfont
		$cf_process_title_fv = $cf_process_title['style'];  //Google web font variant (eg; 300italic)
		$cf_process_title_fsize = $cf_process_title['size']; //Font size
		$cf_process_title_ff = $cf_process_title['face']; // Fallback font

		$cf_process_title_fv = composer_font_variant($cf_process_title_fv); //Seperated font variation
	?>
	.process .title {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_process_title_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_process_title_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_process_title_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_process_title_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_process_title_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Process Content */
		$cf_process_content = composer_dynamic_css_option( 'cf_process_content', array() );
		
		$cf_process_content_gf = $cf_process_content['g_face']; //Choosen Google webfont
		$cf_process_content_fv = $cf_process_content['style'];  //Google web font variant (eg; 300italic)
		$cf_process_content_fsize = $cf_process_content['size']; //Font size
		$cf_process_content_ff = $cf_process_content['face']; // Fallback font

		$cf_process_content_fv = composer_font_variant($cf_process_content_fv); //Seperated font variation
	?>
	.process .text {        
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_process_content_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_process_content_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_process_content_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_process_content_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_process_content_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Pie chart */
		$cf_percent_text = composer_dynamic_css_option( 'cf_percent_text', array() );
		
		$cf_percent_text_gf = $cf_percent_text['g_face']; //Choosen Google webfont
		$cf_percent_text_fv = $cf_percent_text['style'];  //Google web font variant (eg; 300italic)
		$cf_percent_text_fsize = $cf_percent_text['size']; //Font size
		$cf_percent_text_ff = $cf_percent_text['face']; // Fallback font

		$cf_percent_text_fv = composer_font_variant($cf_percent_text_fv); //Seperated font variation
	?>
	.percent-text{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_percent_text_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_percent_text_ff ) ); ?>; 
		font-size: <?php echo stripslashes( wp_strip_all_tags( $cf_percent_text_fsize ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_percent_text_fv[1] ) ); ?>;
	}

	<?php 
	   /* process outside text */
		$cf_percent_outside = composer_dynamic_css_option( 'cf_percent_outside', array() );
		
		$cf_percent_outside_gf = $cf_percent_outside['g_face']; //Choosen Google webfont
		$cf_percent_outside_fv = $cf_percent_outside['style'];  //Google web font variant (eg; 300italic)
		$cf_percent_outside_fsize = $cf_percent_outside['size']; //Font size
		$cf_percent_outside_ff = $cf_percent_outside['face']; // Fallback font

		$cf_percent_outside_fv = composer_font_variant($cf_percent_outside_fv); //Seperated font variation
	?>
	.percent, .outside-text{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_percent_outside_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_percent_outside_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_percent_outside_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_percent_outside_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_percent_outside_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Form input */
		$cf_txtfield = composer_dynamic_css_option( 'cf_txtfield', array() );
		
		$cf_txtfield_gf = $cf_txtfield['g_face']; //Choosen Google webfont
		$cf_txtfield_fv = $cf_txtfield['style'];  //Google web font variant (eg; 300italic)
		$cf_txtfield_fsize = $cf_txtfield['size']; //Font size
		$cf_txtfield_ff = $cf_txtfield['face']; // Fallback font

		$cf_txtfield_fv = composer_font_variant($cf_txtfield_fv); //Seperated font variation
	?>
	.textfield{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_txtfield_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_txtfield_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_txtfield_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_txtfield_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_txtfield_fv[1] ) ); ?>;
	}
	
	
	<?php 
	   /* Portfolio Filter */
		$cf_filter_normal = composer_dynamic_css_option( 'cf_filter_normal', array() );
		
		$cf_filter_normal_gf = $cf_filter_normal['g_face']; //Choosen Google webfont
		$cf_filter_normal_fv = $cf_filter_normal['style'];  //Google web font variant (eg; 300italic)
		$cf_filter_normal_ff = $cf_filter_normal['face']; // Fallback font

		$cf_filter_normal_fv = composer_font_variant($cf_filter_normal_fv); //Seperated font variation
	?>
	#filters.normal li a{   
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_filter_normal_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_filter_normal_ff ) ); ?>;      
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_filter_normal_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_filter_normal_fv[1] ) ); ?>;
	}

	
	<?php 
	   /* Pricing Table Title */
		$cf_plan_title = composer_dynamic_css_option( 'cf_plan_title', array() );
		
		$cf_plan_title_gf = $cf_plan_title['g_face']; //Choosen Google webfont
		$cf_plan_title_fv = $cf_plan_title['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_title_fsize = $cf_plan_title['size']; //Font size
		$cf_plan_title_ff = $cf_plan_title['face']; // Fallback font

		$cf_plan_title_fv = composer_font_variant($cf_plan_title_fv); //Seperated font variation
	?>
	.price-table .plan-title {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_plan_title_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_plan_title_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_plan_title_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_plan_title_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_plan_title_fv[1] ) ); ?>;
	}

	<?php 
	   /* Price */
		$cf_plan_value = composer_dynamic_css_option( 'cf_plan_value', array() );
		
		$cf_plan_value_gf = $cf_plan_value['g_face']; //Choosen Google webfont
		$cf_plan_value_fv = $cf_plan_value['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_value_fsize = $cf_plan_value['size']; //Font size
		$cf_plan_value_ff = $cf_plan_value['face']; // Fallback font

		$cf_plan_value_fv = composer_font_variant($cf_plan_value_fv); //Seperated font variation
	?>
	.price-table .value {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_plan_value_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_plan_value_ff ) ); ?>; 
		font-size:   <?php echo stripslashes( wp_strip_all_tags( $cf_plan_value_fsize ) ); ?>;       
		font-style:  <?php echo stripslashes( wp_strip_all_tags( $cf_plan_value_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_plan_value_fv[1] ) ); ?>;
	}

	<?php 
	   /* Currency */
		$cf_plan_valign = composer_dynamic_css_option( 'cf_plan_valign', array() );
		
		$cf_plan_valign_gf = $cf_plan_valign['g_face']; //Choosen Google webfont
		$cf_plan_valign_fv = $cf_plan_valign['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_valign_fsize = $cf_plan_valign['size']; //Font size
		$cf_plan_valign_ff = $cf_plan_valign['face']; // Fallback font

		$cf_plan_valign_fv = composer_font_variant($cf_plan_valign_fv); //Seperated font variation
	?>
	.price-table .value .vAlign {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_plan_valign_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_plan_valign_ff ) ); ?>; 
		font-size: <?php echo stripslashes( wp_strip_all_tags( $cf_plan_valign_fsize ) ); ?>;       
		font-style: <?php echo stripslashes( wp_strip_all_tags( $cf_plan_valign_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_plan_valign_fv[1] ) ); ?>;
	}

	<?php 
	   /* Price Period */
		$cf_plan_month = composer_dynamic_css_option( 'cf_plan_month', array() );
		
		$cf_plan_month_gf = $cf_plan_month['g_face']; //Choosen Google webfont
		$cf_plan_month_fv = $cf_plan_month['style'];  //Google web font variant (eg; 300italic)
		$cf_plan_month_fsize = $cf_plan_month['size']; //Font size
		$cf_plan_month_ff = $cf_plan_month['face']; // Fallback font

		$cf_plan_month_fv = composer_font_variant($cf_plan_month_fv); //Seperated font variation
	?>
	.price-table .value small {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_plan_month_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_plan_month_ff ) ); ?>; 
		font-size: <?php echo stripslashes( wp_strip_all_tags( $cf_plan_month_fsize ) ); ?>;       
		font-style: <?php echo stripslashes( wp_strip_all_tags( $cf_plan_month_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_plan_month_fv[1] ) ); ?>;
	}

	<?php 
	   /* Single Blog */
		$cf_single_banner_title = composer_dynamic_css_option( 'cf_single_banner_title', array() );
		
		$cf_single_banner_title_gf = $cf_single_banner_title['g_face']; //Choosen Google webfont
		$cf_single_banner_title_fv = $cf_single_banner_title['style'];  //Google web font variant (eg; 300italic)
		$cf_single_banner_title_fsize = $cf_single_banner_title['size']; //Font size
		$cf_single_banner_title_ff = $cf_single_banner_title['face']; // Fallback font

		$cf_single_banner_title_fv = composer_font_variant($cf_single_banner_title_fv); //Seperated font variation
	?>
	.single-banner-content .title, .single-blog-style3 .banner-content .title {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_title_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_title_ff ) ); ?>; 
		font-size: <?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_title_fsize ) ); ?>;       
		font-style: <?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_title_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_title_fv[1] ) ); ?>;
	}

	<?php 
		$cf_single_banner_meta = composer_dynamic_css_option( 'cf_single_banner_meta', array() );
		
		$cf_single_banner_meta_gf = $cf_single_banner_meta['g_face']; //Choosen Google webfont
		$cf_single_banner_meta_fv = $cf_single_banner_meta['style'];  //Google web font variant (eg; 300italic)
		$cf_single_banner_meta_fsize = $cf_single_banner_meta['size']; //Font size
		$cf_single_banner_meta_ff = $cf_single_banner_meta['face']; // Fallback font

		$cf_single_banner_meta_fv = composer_font_variant($cf_single_banner_meta_fv); //Seperated font variation
	?>
	.single-blog-style2 .single-banner-content .category a, .single-blog-style3 .banner-content .category a, .single-blog-style2 .single-banner-content .post-meta, .banner-content .post-meta, .single-blog-style2 .single-banner-content .pix-blog-comments, .banner-content .post-meta a, .single-blog-style2 .single-banner-content .post-meta p, .single-blog-style3 .banner-content .post-meta p {
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_meta_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_meta_ff ) ); ?>; 
		font-size: <?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_meta_fsize ) ); ?>;       
		font-style: <?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_meta_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_single_banner_meta_fv[1] ) ); ?>;
	}	
	
	<?php 
	   /* Widget Title */
		$cf_widget_title = composer_dynamic_css_option( 'cf_widget_title', array() );
		
		$cf_widget_title_gf = $cf_widget_title['g_face']; //Choosen Google webfont
		$cf_widget_title_fv = $cf_widget_title['style'];  //Google web font variant (eg; 300italic)
		$cf_widget_title_fsize = $cf_widget_title['size']; //Font size
		$cf_widget_title_ff = $cf_widget_title['face']; // Fallback font

		$cf_widget_title_fv = composer_font_variant($cf_widget_title_fv); //Seperated font variation
	?>
	.widget .widgettitle{
		font-family: '<?php echo stripslashes( wp_strip_all_tags( $cf_widget_title_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $cf_widget_title_ff ) ); ?>; 
		font-size: <?php echo stripslashes( wp_strip_all_tags( $cf_widget_title_fsize ) ); ?>;       
		font-style: <?php echo stripslashes( wp_strip_all_tags( $cf_widget_title_fv[0] ) ); ?>;
		font-weight: <?php echo stripslashes( wp_strip_all_tags( $cf_widget_title_fv[1] ) ); ?>;
	}

<?php endif; 

if( $custom_header_styles === 'yes' ) { 

	$top_header_background_color = composer_dynamic_css_option( 'top_header_background_color', '' );
	$top_header_color = composer_dynamic_css_option( 'top_header_color', '' );

	if ( !empty( $top_header_background_color ) ): ?>
		.pageTopCon, .transparent-header .pageTopCon {
			background: <?php echo stripslashes( wp_strip_all_tags( $top_header_background_color ) ); ?> !important;

			<?php if ( !empty( $top_header_color ) ) { ?>
				color: <?php echo stripslashes( wp_strip_all_tags( $top_header_color ) ); ?>;
			<?php } ?>
		}
	<?php endif;

	$top_header_link_color = composer_dynamic_css_option( 'top_header_link_color', '' );
	
	if ( !empty( $top_header_link_color ) ): ?>
		.header-wrap .pageTopCon a, .header .pageTopCon .top-details a, .pageTop .pix-cart-icon{
			color: <?php echo stripslashes( wp_strip_all_tags( $top_header_link_color ) ); ?> !important;
		}
		.pageTop .searchsubmit{
			background-color: <?php echo stripslashes( wp_strip_all_tags( $top_header_link_color ) ); ?>;
		}
	<?php endif;

	$top_header_link_hover_color = composer_dynamic_css_option( 'top_header_link_hover_color', '' );
	
	if ( !empty( $top_header_link_hover_color ) ): ?>
		.header-wrap .pageTopCon a:hover, .header .pageTopCon .top-details a:hover{
			color: <?php echo stripslashes( wp_strip_all_tags( $top_header_link_hover_color ) ); ?> !important;
		}
		.pageTop .searchsubmit:hover, .pageTop .pix-item-icon{
			background-color: <?php echo stripslashes( wp_strip_all_tags( $top_header_link_hover_color ) ); ?>;
		}
	<?php endif;

	$main_header_background_color = composer_dynamic_css_option( 'main_header_background_color', '' );
	
	if ( !empty( $main_header_background_color ) ): ?>
		.header-wrap, .main-side-left .left-main-menu {
			background: <?php echo stripslashes( wp_strip_all_tags( $main_header_background_color ) ); ?> !important;
		}
	<?php endif;

	$main_header_color = composer_dynamic_css_option( 'main_header_color', '' );
	
	if ( !empty( $main_header_color ) ): ?>
		.header-wrap{
			color: <?php echo stripslashes( wp_strip_all_tags( $main_header_color ) ); ?> !important;
		}
	<?php endif;

	$main_header_height = composer_dynamic_css_option( 'main_header_height', '' );
	
	if ( !empty( $main_header_height ) ): ?>
		.header-wrap .header {
			height: <?php echo stripslashes( wp_strip_all_tags( $main_header_height ) ); ?>;
		}

		.main-nav, #logo, .search-btn, .header .custom-header-text {
			line-height: <?php echo stripslashes( wp_strip_all_tags( $main_header_height ) ); ?>;
		}

		.search-btn {
			height: <?php echo stripslashes( wp_strip_all_tags( $main_header_height ) ); ?>;
		}

		.header .pix-cart {
			padding-top: 0px;
		}

		.pix-item-icon {
			height: 18px !important;
			line-height: 20px !important;
		}

		.pix-cart-contents-con * {
			line-height: <?php echo stripslashes( wp_strip_all_tags( $main_header_height ) ); ?>;
			height: <?php echo stripslashes( wp_strip_all_tags( $main_header_height ) ); ?>;
			margin-top: 0;
		}

		.cart-trigger {
			padding-bottom: 0;
		}

		.pix-item-icon {
			top: calc( 50% - 20px );
		}

		.pix-cart-contents-con a.pix-cart-contents {
			height: <?php echo stripslashes( wp_strip_all_tags( $main_header_height ) ); ?>;
		}

		.woo-cart-dropdown {
			top: <?php echo stripslashes( wp_strip_all_tags( $main_header_height ) ); ?>;
		}

		@media (max-width: 991px) {
			.pix-menu, .pix-flyin-sidebar {
				height: <?php echo stripslashes( wp_strip_all_tags( $main_header_height ) ); ?>;
			}
		}
	<?php endif;

	$main_header_link_color = composer_dynamic_css_option( 'main_header_link_color', '' );
	if ( !empty( $main_header_link_color ) ): ?>
		.header .widget-right a, .header .top-details a, .search-btn, a.pix-cart-contents {
			color: <?php echo stripslashes( wp_strip_all_tags( $main_header_link_color ) ); ?> !important;
		}
		.header .searchsubmit {
			background-color: <?php echo stripslashes( wp_strip_all_tags( $main_header_link_color ) ); ?>;
		}
		.pix-cart .product_list_widget li a, .pix-cart .total strong, .pix-cart .buttons .button {
			color: initial !important;
		}
	<?php endif;

	$main_header_link_hover_color = composer_dynamic_css_option( 'main_header_link_hover_color', '' );
	
	if ( !empty( $main_header_link_hover_color ) ): ?>
		.header .widget-right a:hover, .header .top-details a:hover, .search-btn:hover, .main-nav .current-menu-item > a, a.pix-cart-contents:hover {
			color: <?php echo stripslashes( wp_strip_all_tags( $main_header_link_hover_color ) ); ?> !important;
		}
		.header .searchsubmit:hover {
			background-color: <?php echo stripslashes( wp_strip_all_tags( $main_header_link_hover_color ) ); ?>;
		}
	<?php endif;

	$menu_background_color = composer_dynamic_css_option( 'menu_background_color', '' );
	
	if ( !empty( $menu_background_color ) ): ?>
		.menu-wrap, .menu-light .menu-wrap, .dark .menu-wrap, .dark .menu-light .menu-wrap{
			background: <?php echo stripslashes( wp_strip_all_tags( $menu_background_color ) ); ?>;
		}
		.stuck .menu-wrap, .stuck.menu-light .menu-wrap, .dark .stuck .menu-wrap, .dark .stuck.menu-light .menu-wrap {
			background:none;
		}
	<?php endif;

	$menu_link_color = composer_dynamic_css_option( 'menu_link_color', '' );
	
	if ( !empty( $menu_link_color ) ): ?>
		.main-nav > ul > li > a, .dark .main-nav > ul > li > a, .menu-wrap .main-nav> ul > li > a, .menu-light .menu-wrap .main-nav> ul > li > a, .main-side-left .main-nav-left.main-nav> ul > li > a, .main-nav > ul > .current-menu-ancestor > a, .dark .main-nav > ul > .current-menu-ancestor > a {
			color: <?php echo stripslashes( wp_strip_all_tags( $menu_link_color ) ); ?>;
		}
		.stuck.sticky-light .main-nav > ul > li > a, .stuck.sticky-dark .main-nav > ul > li > a {
			color: <?php echo stripslashes( wp_strip_all_tags( $menu_link_color ) ); ?>;
		}
	<?php endif;

	$menu_link_hover_color = composer_dynamic_css_option( 'menu_link_hover_color', '' );
	
	if ( !empty( $menu_link_hover_color ) ): ?>
		.main-nav > ul > li > a:hover, .main-nav .sub-menu > ul > li > a:hover, .menu-wrap .main-nav > ul > li > a:hover, .main-side-left .main-nav > ul > li > a:hover, .main-side-left .main-nav-left.main-nav > ul > li > a:hover, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-nav ul > .current-menu-item > a, .main-nav > .menu > li.current-menu-item > a, .main-nav .menu > li.current-menu-ancestor > a, .main-nav li:hover > a, .dark .main-nav > ul > li:hover > a, .main-nav > ul > li.menu-item-has-children:hover > a {
			color: <?php echo stripslashes( wp_strip_all_tags( $menu_link_hover_color ) ); ?> !important;
		}
		.nav-border .main-nav > ul.menu > li > a:after, .nav-double-border .main-nav > ul.menu > li > a:before, .nav-double-border .main-nav > ul.menu > li > a:after, .background-nav .main-nav .menu > li.current-menu-ancestor > a, .background-nav.background-nav-round .main-nav .menu > li.current-menu-ancestor > a, .background-nav .main-nav .menu > li.current-menu-item > a, .background-nav.background-nav-round .main-nav .menu > li.current-menu-item > a, .solid-color-bg .main-nav .menu > li.current-menu-item, .solid-color-bg .main-nav .menu > li.current-menu-parent, .solid-color-bg .main-nav .menu > li.current-menu-ancestor{
			background-color: <?php echo stripslashes( wp_strip_all_tags( $menu_link_hover_color ) ); ?>;
		}
		.drive-nav .main-nav .menu > li.current-menu-ancestor:before, .drive-nav .main-nav .menu > li.current-menu-item:before{
			border-top-color: <?php echo stripslashes( wp_strip_all_tags( $menu_link_hover_color ) ); ?>;
		}
		.stuck.sticky-light .main-nav > ul > li:hover > a, .stuck.sticky-dark .main-nav > ul > li:hover > a {
			color: <?php echo stripslashes( wp_strip_all_tags( $menu_link_hover_color ) ); ?> !important;
		}
	<?php endif;

	$sub_menu_background_color = composer_dynamic_css_option( 'sub_menu_background_color', '' );
	$sub_menu_border_color = composer_dynamic_css_option( 'sub_menu_border_color', '' );
	
	if ( ! empty( $sub_menu_background_color ) || ! empty( $sub_menu_border_color ) ) : ?>
		.main-nav .sub-menu, .sub-menu-dark .main-nav .sub-menu {
		<?php if( !empty( $sub_menu_background_color ) ){ ?>
			background: <?php echo stripslashes( wp_strip_all_tags( $sub_menu_background_color ) ); ?>;
			box-shadow: none;
		<?php
		}
		if( !empty( $sub_menu_border_color ) ){ ?>
			border: 1px solid <?php echo stripslashes( wp_strip_all_tags( $sub_menu_border_color ) ); ?>;
		<?php } ?>
		}
		.main-nav li.pix-megamenu > ul.sub-menu:before{
		<?php if( !empty( $sub_menu_border_color ) ){ ?>
			border: 1px solid <?php echo stripslashes( wp_strip_all_tags( $sub_menu_border_color ) ); ?>;
		<?php } ?>
		}
		.main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children > a.current:after{
		<?php if( !empty( $sub_menu_background_color ) ){ ?>
			background: <?php echo stripslashes( wp_strip_all_tags( $sub_menu_background_color ) ); ?>;
			box-shadow: none;
			<?php } ?>
		}
	<?php endif;

	$mega_menu_title_color = composer_dynamic_css_option( 'mega_menu_title_color', '' );
	
	if ( !empty( $mega_menu_title_color ) ): ?>
		.main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li > a:hover {
			color: <?php echo stripslashes( wp_strip_all_tags( $mega_menu_title_color ) ); ?> !important;
		}
	<?php endif;

	$sub_menu_link_color = composer_dynamic_css_option( 'sub_menu_link_color', '' );
	
	if ( !empty( $sub_menu_link_color ) ): ?>
		.main-nav .sub-menu li > a, .header-wrap .pix-submenu .sub-menu li a, .menu-wrap .main-nav .sub-menu li a, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a, .main-side-left .main-nav-left.main-nav li ul li a{
			color: <?php echo stripslashes( wp_strip_all_tags( $sub_menu_link_color ) ); ?> !important;
		}
	<?php endif;

	$sub_menu_link_hover_color = composer_dynamic_css_option( 'sub_menu_link_hover_color', '' );
	
	if ( !empty( $sub_menu_link_hover_color ) ): ?>
		.main-nav .sub-menu li > a:hover, .header-wrap .pix-submenu .sub-menu li a:hover, .menu-wrap .main-nav .sub-menu li a:hover, .main-nav li.pix-megamenu > ul.sub-menu > li > ul li a:hover, .main-nav .pix-submenu:hover > ul li:hover > a.current, .main-nav .pix-submenu li a.current, .main-side-left .main-nav-left.main-nav li li a:hover, .main-side-left .main-nav-left.main-nav li li a.current, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children > a.current:after, .main-side-left.sub-menu-dark .main-nav .sub-menu .menu-item a.current, .main-side-left.dark.sub-menu-dark .main-nav .sub-menu .menu-item a.current, .main-nav ul .sub-menu li.menu-item-has-children:hover > a {
			color: <?php echo stripslashes( wp_strip_all_tags( $sub_menu_link_hover_color ) ); ?> !important;
		}
	<?php endif;

	} 

	if( 'yes' === $custom_styles): 
		if( 'yes' === $customize_body_bg ): 

			if($custom_body_bg_color != '' && $custom_body_bg == '' && $custom_body_bg_pattern == ''): ?>

				body {
					background-color: <?php echo stripslashes( wp_strip_all_tags( $custom_body_bg_color ) ); ?>;        
				}

			<?php endif; 

			if($custom_body_bg_color != '' && $custom_body_bg_pattern != '' && $custom_body_bg == '' ): ?>

				body {
					background: <?php echo stripslashes( wp_strip_all_tags( $custom_body_bg_color ) );

					if( $custom_body_bg_pattern != 'none') { ?> 
						url(<?php echo esc_url( get_template_directory_uri().'/_images/'.$custom_body_bg_pattern.'.png' ); ?>) repeat <?php } ?>;
				}

			<?php endif; 

			if($custom_body_bg != '' ): ?>

				body {
					background-image: url(<?php echo stripslashes( wp_strip_all_tags( $custom_body_bg ) ); ?>);
					background-attachment: <?php echo stripslashes( wp_strip_all_tags( $custom_body_bg_attachment ) ); ?>;
					background-repeat: <?php echo stripslashes( wp_strip_all_tags( $custom_body_bg_repeat ) ); ?>;
					background-size: <?php echo stripslashes( wp_strip_all_tags( $custom_body_bg_size ) ); ?>;
				}

			<?php endif; 

		 endif; 

	  endif; 

	$composer_pri_color = composer_dynamic_css_option( 'pri_color', '' );

	$hexStr = preg_replace( "/[^0-9A-Fa-f]/", '', $composer_pri_color ); // Gets a proper hex string
	$rgbArray = array();
	if ( strlen( $hexStr ) == 6 ) { //If a proper hex code, convert using bitwise operation. No overhead... faster
		$colorVal = hexdec( $hexStr );
		$rgbArray['red'] = 0xFF & ( $colorVal >> 0x10 );
		$rgbArray['green'] = 0xFF & ( $colorVal >> 0x8 );
		$rgbArray['blue'] = 0xFF & $colorVal;
	} elseif ( strlen( $hexStr ) == 3 ) { //if shorthand notation, need some string manipulations
		$rgbArray['red'] = hexdec( str_repeat( substr( $hexStr, 0, 1 ), 2 ) );
		$rgbArray['green'] = hexdec( str_repeat( substr( $hexStr, 1, 1), 2 ) );
		$rgbArray['blue'] = hexdec( str_repeat( substr( $hexStr, 2, 1), 2 ) );
	}
	$composer_rgb_color = implode( ', ', $rgbArray ); // returns the rgb string or the associative array


 if ( !empty( $composer_pri_color ) ): ?>

a, .color, .base-color, .icon-list .pix-icon.color, .top-details a:hover, #lang-list a:hover, #lang-list a.active, .dark .search-btn:hover, .btn.color, .btn.color:hover, .btn.btn-simple:hover, .btn.btn-solid.btn-hover-outline.color:hover, .pix_icon_box:hover .icon100.color.bg-none, .pix_icon_box:hover .icon100.square-front.color, .pix_icon_box:hover .small-circle .icon, .pix_icon_box:hover .small-circle.color .icon, .pix_icon_box a.btn:hover, .pix_icon_box:hover .icon100, .process .text, .process .background .text:hover .process-style, .pix_tabs.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tabs_nav li a:hover, .staff-img .staff-icons a:hover, .staff-content a:hover, .full-width-icon.style3 .social-icons a, #filters.dropdown li a:hover, .single-portfolio-details .port-share-btn a:hover, .portfolio-hover .portfolio-icon.liked, .testimonial .star-icon.color, .blog .timeline a .entry-content.pix-blog-link:hover .icon-box, .blog .normal .pix-blog-link .link-text, .comment-form .form-submit #submit, .tweet-icon, .tweets.style3 .tweet-content a, #headerWidget.col3 .tab-widget #recentcomments li a, #pageFooterCon.col3 .tab-widget #recentcomments li a, #headerWidget.col4 .tab-widget #recentcomments li a, #pageFooterCon.col4 .tab-widget #recentcomments li a, .single-staff .staff-email a, .post .title a:hover, .post .link a:hover, .post .category a:hover, .blog .timeline .entry-content.pix-blog-link:hover .link-text, .pix-blog-link .link-text, .blog .masonry a .entry-content.pix-blog-link:hover .icon-box, .authorDetails .authorName a:hover, .comment-list .fn a:hover, .comment-list a:hover, .subNavigation a:hover, .widget li a:hover, .widget.popularpost li a:hover,.widget.recentpost li a:hover, .tab-widget #recentcomments li a, #headerWidget .widget li a:hover,#pageFooterCon .widget li a:hover, .menu-light .main-nav #lang-list a.active, .pix-cart .price-mini, .pix-cart .pix-woo-price,  .pix-cart .total .amount, .pix-cart .widget_shopping_cart_content .button:hover, .woocommerce .star-rating:before, .woocommerce-page .star-rating:before, .woocommerce .star-rating span:before, .woocommerce-page .star-rating span:before, .woo-products .staff-img-con:hover .onsale, .woo-products .staff-img-con:hover .price, .woo-product-item .title a:hover, .woocommerce-tabs .stars a.active, .woo-product-item .add_to_cart_button:before, .woo-product-item .add_to_cart_button span, .product_list_widget li a:hover, .product_list_widget .quantity, .widget_shopping_cart_content .button, .price_slider_amount .price_label .from,.price_slider_amount .price_label .to, .shop_table .product-name a:hover, .shop_table .button.checkout-button, .summary .woocommerce-review-link:hover, .summary .single_add_to_cart_button, .product_meta span a:hover, .woocommerce-tabs .stars .star-1:hover:after,.woocommerce-tabs .stars .star-1.active:after, .woocommerce-tabs .stars .star-2:hover:after,.woocommerce-tabs .stars .star-2.active:after, .woocommerce-tabs .stars .star-3:hover:after,.woocommerce-tabs .stars .star-3.active:after, .woocommerce-tabs .stars .star-4:hover:after,.woocommerce-tabs .stars .star-4.active:after, .woocommerce-tabs .stars .star-5:hover:after,.woocommerce-tabs .stars .star-5.active:after, .cart-collaterals h2 .shipping-calculator-button:hover, .light .portfolio-hover .portfolio-icon.liked .pix-heart-2, .btn.btn-simple.white:hover, .search-results .blog-container .author-name a, .main-side-left .main-nav-left.main-nav li a:hover, .main-side-left .main-nav-left.main-nav li a.current, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children a:hover:after, .main-side-left .main-nav-left.main-nav .menu li.menu-item-has-children > a.current:after, .main-side-left.sub-menu-dark .main-nav .sub-menu .menu-item a.current, .main-side-left.dark.sub-menu-dark .main-nav .sub-menu .menu-item a.current,  .pix-submenu .sub-menu li:hover > a, .dark .main-nav li:hover > a, .dark .main-nav .sub-menu li:hover > a, .stuck.sticky-light .main-nav li:hover > a, .stuck.sticky-light .main-nav .sub-menu li:hover > a, .sub-menu-dark .main-nav .sub-menu .menu-item .menu-item:hover > a, .dark.sub-menu-dark .main-nav .sub-menu .menu-item .menu-item:hover > a, .menu-light .menu-wrap .main-nav .menu > li.current-menu-item > a, .menu-light .menu-wrap .main-nav .menu > li.current-menu-ancestor > a, .menu-light .menu-wrap .main-nav .menu > li:hover > a, .mobile-menu-nav li a:hover, .mobile-menu-nav .menu-item-has-children > .pix-dropdown-arrow:hover:after, .mobile-menu-nav.menu-dark .menu-item-has-children > .pix-dropdown-arrow:hover:after, .mobile-menu-nav .current-menu-item > a, .mobile-menu-nav .current-menu-parent > a, .mobile-menu-nav .current-menu-ancestor > a, .mobile-menu-nav .sub-menu .current-menu-item > a, .mobile-menu-nav.menu-dark .current-menu-item > a, .mobile-menu-nav.menu-dark .current-menu-parent > a, .mobile-menu-nav.menu-dark .current-menu-ancestor > a, .mobile-menu-nav.menu-dark .sub-menu .current-menu-item > a, .mobile-menu-nav.menu-dark li a:hover, .sub-menu-dark .main-nav .sub-menu .menu-item:hover > a, .dark.sub-menu-dark .main-nav .sub-menu .menu-item:hover > a, .blog-post-content a, .breadcrumb li a:hover, .move-up a:hover, .pix-recent-blog-posts h3 a:hover, .popup-icon.style1 .video-popup-icon, .light .tweet-content a, .light .process .text .process-style, .btn.btn-hover-outline.btn-hover-color:hover, .stuck.sticky-light .main-nav > ul > .current-menu-item > a, .stuck.sticky-light .main-nav > ul > li.current-menu-parent > a, .main-nav .current-menu-item > a, .main-nav > ul > .current-menu-ancestor > a, .dark .main-nav .current-menu-item > a, .main-nav li:hover > a, .pix-megamenu .sub-menu li .sub-menu li:hover a, .overlay .main-nav > .menu > li.current-menu-item > a, .header-con .overlay .social-icons a:hover, .transparent-header .dark .header-con:not(.stuck) .main-nav > ul > li.current-menu-item > a, .main-side-left.dark .main-nav-left.main-nav > ul > li.current-menu-item > a, .main-side-left.dark .main-nav-left.main-nav > ul > li.current-menu-parent > a, .main-side-left.dark .main-nav-left.main-nav > ul > li.current-menu-ancestor > a, .button, input[type="submit"], .blog .post .category a, .blog .post .post-title a:hover, .widget #recentcomments a:hover, .list .pixicon-icon.color, .main-side-left .main-nav-left.main-nav li.current-menu-item > a, .main-side-left.dark .main-nav-left.main-nav li ul li a:hover, .composer-header-dark #sub-header .breadcrumb li a:hover, .grid-block-category a, .grid-blog-block .meta-info .post-format-icon i, .single-blog-style3 .category a {
	color: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
}

.bg_text, .line, .pix-icons .icon.solid, .pageTop .pix-item-icon,  .main-nav li.pix-megamenu > ul.sub-menu:before, .btn.btn-hover-solid.color:hover, .btn.btn-solid.color, .pix_icon_box .color .hover-gradient:before, .no-touch .process .text:hover:after, .process .background .text:after, .pix_accordion.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active.ui-state-active, .pix_accordion.background.wpb_content_element .wpb_tour_tabs_wrapper .wpb_tab, .pix_accordion.background.wpb_content_element .wpb_accordion_wrapper .wpb_accordion_content, .pix_tabs.style2.wpb_content_element.tabs-left .wpb_tabs_nav li.ui-tabs-active a:after, .pix_tabs.style2.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a:after, .pix_tabs.style3.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a, .style3 .border-bg, .staff-content .line, .pix-staffs .style5:hover, .full-width-icon.style2 .social-icons a, #filters.normal li a.selected, #filters.normal.simple li a.selected, #filters.normal.simple li a:hover, .sorter .top-active, .single-port-like:hover, .single-port-like.liked, .single-port-nav a:hover, .single-portfolio-details .portfolio-icons:hover .share-top, .price-table.bestPlan .price-header, .price-table.style2.bestPlan .value, .testimonial.style3 .testimonial-author .pix-author-name, .testimonial.style6 .testimonial-author .pix-author-name, .blog-container .author-name, .post .icon-box, .blog .timeline .entry-content.pix-blog-link .icon-box, .blog .timeline a .entry-content.pix-blog-link:hover,.blog .masonry a .entry-content.pix-blog-link:hover, .blog .masonry .post .bg, .subNavigation .current-menu-item:after, .subNavigation.top .current-menu-item:after, .widget .tagcloud a, #pageFooterCon .widget.widget_shopping_cart .button.wc-forward:hover, .wpcf7-submit, .vc_progress_bar.pix-progress-bar .vc_single_bar .vc_bar, .testimonial.style6 .content, .blog .masonry .owl-theme .owl-controls .owl-nav div, .blog .masonry .entry-content.pix-blog-link .bg,.masonry .entry-content.pix-blog-quote .bg, .blog .masonry .entry-content.pix-blog-quote .bg, .pagination li.active, .comment-form .form-submit #submit:hover, #wp-calendar #today, .line.line-2:after, .menu-header1 #inner-header .pix-item-icon, .menu-header2 #inner-header .pix-item-icon, .menu-header3 #inner-header .pix-item-icon, .pix-cart .widget_shopping_cart_content .button, .woocommerce-result-count, .woo-product-item .staff-content .line, .onsale, .woo-product-item .price, .widget_shopping_cart_content .button.wc-forward:hover, .price_slider, .ui-slider-handle, .shop_table .product-remove a, .button:hover, .shop_table .button.checkout-button:hover, .woocommerce-tabs ul.tabs li.active a:after, .owl-theme .owl-controls .owl-nav div:hover, .flex-control-nav.flex-control-paging li a.flex-active, .flex-control-nav.flex-control-paging li a:hover, .testimonials.owl-theme .owl-controls .owl-nav div:hover, .tweets.owl-theme .owl-controls .owl-nav div:hover,.open-playlist, div.tp-leftarrow.tparrows.default, div.tp-rightarrow.tparrows.default,.mejs-audio .mejs-controls .mejs-time-rail .mejs-time-current,.mejs-audio .mejs-controls .mejs-horizontal-volume-slider .mejs-horizontal-volume-current,.mejs-video .mejs-controls .mejs-time-rail .mejs-time-current,.mejs-video .mejs-controls .mejs-volume-button .mejs-volume-slider .mejs-volume-current, .pix-weather-wrap,.pix-item-icon, .wpb_images_carousel .vc_images_carousel .vc_carousel-indicators .vc_active, .wpb_images_carousel .vc_images_carousel.vc_carousel_vertical .vc_carousel-indicators li.vc_active, .btn.btn-hover-solid.btn-hover-color:hover, .dot, .port-bg-color .portfolio-container.portfolio-style4, .background-nav .main-nav .menu > li.current-menu-ancestor > a, .background-nav .main-nav .menu > li:hover > a, .background-nav.background-nav-round .main-nav .menu > li.current-menu-ancestor > a, .background-nav .main-nav .menu > li.current-menu-item > a, .background-nav.background-nav-round .main-nav .menu > li.current-menu-item > a,.solid-color-bg .main-nav li.current-menu-item, .solid-color-bg .main-nav li.current-menu-ancestor, .owl-dot.active span, .subscribe-widget .subcribe-button .btn, .single-blog-style3 .category a, .sub-navigation .current-menu-item > a, #load-more-btn a, #block-load-more-btn a, #block-load-more-btn .loaded-msg, .spinner-inner .double-bounce1, .spinner-inner .double-bounce2, .blog .post .post-quote, .single-blog-style2 .category a {
	background-color: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
}

blockquote, .pix_icon_box:hover .circle, .pix_icon_box:hover .square:after, .pix_icon_box:hover .double-circle, .pix_icon_box:hover .double-circle:after, .btn.btn-solid.color:hover, .pix_icon_box:hover .small-circle, .pix_icon_box:hover .double-square:before, .pix_icon_box:hover .double-square:after, .pix_icon_box:hover .square-front:before, .pix_icon_box:hover .square-front:after, .pix_accordion.wpb_accordion .wpb_accordion_wrapper .wpb_accordion_header.ui-accordion-header-active.ui-state-active, .pix_tabs.style3.wpb_content_element .wpb_tabs_nav li.ui-tabs-active, .price-table.bestPlan, .pix-icons .icon.outline, .btn.color:hover, .btn.btn-outline.color, .btn.btn-outline.color:hover, .btn.btn-solid.color, .icon100.circle.color, .square.color:after, .icon100.double-circle.color, .icon100.double-circle.color:after, .double-square.color:after, .double-square.color:before, .square-front.color:before, .square-front.color:after, .full-width-icon.style3 .social-icons a,  #filters.normal li a.selected, #filters.normal.simple li a.selected, #filters.normal.simple li a:hover, .single-port-nav a:hover, .single-portfolio-details .share-top, .blog .timeline .entry-content.pix-blog-link,.blog .masonry .entry-content.pix-blog-link, .comment-form .form-submit #submit, .tweets.center.style2 .tweet-icon, .tweets.center.style3 .tweet-icon, #pageFooterCon .widget.widget_shopping_cart .button.wc-forward:hover, .wpcf7-submit, .pix-chart.style3.style7 .border-top, .style3.style7 .border-bg, .pix-chart.style3.style8 .border-top, .blog .timeline a .entry-content.pix-blog-link:hover .icon-box, .blog .masonry a .entry-content.pix-blog-link:hover .round, .box-small:before, .woo-products .staff-img-con:hover .price, .woo-product-item .btn.btn-outline.color:hover, .widget_shopping_cart_content .button, .widget_shopping_cart_content .button.wc-forward:hover, .button:hover, .shop_table .button.checkout-button, .shop_table .button.checkout-button:hover, .summary .price, .summary .single_add_to_cart_button, .cart-collaterals .order-total, .checkout .shop_table tfoot .order-total, .counter.border, .pix-recent-blog-posts .blog-icon, .blog .normal .icon-box, .single-blog .icon-box, .flex-control-nav.flex-control-paging li a, .testimonials.owl-theme .owl-controls .owl-nav div:hover, .tweets.owl-theme .owl-controls .owl-nav div:hover, .tweets.style2 .tweet-icon, .tweets.style3 .tweet-icon, .single-dot-nav a:after, blockquote:before, blockquote:after, blockquote.pull-right:before, blockquote.pull-right:after, .wpb_images_carousel .vc_images_carousel .vc_carousel-indicators .vc_active, .wpb_images_carousel .vc_images_carousel.vc_carousel_vertical .vc_carousel-indicators li.vc_active, .btn.btn-hover-outline.btn-hover-color:hover, .btn.btn-hover-solid.btn-hover-color:hover, .drive-nav .main-nav .menu > li.current-menu-ancestor:before, .drive-nav .main-nav .menu > li.current-menu-item:before, .nav-double-border .main-nav > ul.menu > li.current-menu-ancestor > a, .nav-double-border .main-nav > ul.menu > li.current-menu-item > a, .button, input[type="submit"], .subscribe-widget .subcribe-button .btn, .smart-form-1 input:focus, .smart-form-1 textarea:focus, .smart-form-1.smart-form-2 input:focus, .smart-form-1.smart-form-2 textarea:focus, #load-more-btn .spinner, #block-load-more-btn .spinner {
	border-color: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
}

.bg_text:after, .pix_tabs.style3.wpb_content_element .wpb_tabs_nav li.ui-tabs-active a:before, .testimonial.style3 .testimonial-author .pix-author-name:after, .testimonial.style6 .testimonial-author .pix-author-name:after, .testimonial.style6 .content:after, .onsale:after {
	border-top-color: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
}

.pix_tabs.style3.wpb_content_element.tabs-bottom .wpb_tabs_nav li.ui-tabs-active a:before, .author-details-content, .widget #recentcomments a:hover, .widget.widget_rss a:hover, .woo-product-item .price:before{
	border-bottom-color: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
}

.callOut.background.border, .pix_tabs.style3.wpb_content_element.tabs-left .wpb_tabs_nav li.ui-tabs-active a:before, .title-right-border.alignRight, .title-right-border.alignCenter,  .single-dot-nav a span:after {
	border-left-color: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
}

.pix_tabs.style3.wpb_content_element.tabs-left.tabs-right .wpb_tabs_nav li.ui-tabs-active a:before, .title-right-border, .title-right-border.alignCenter, .blockquote-reverse, blockquote.pull-right{
	border-right-color: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
}

.no-touch .process .text:hover, .process .background .text, .owl-dot.active {
	box-shadow: 0 0 0 2px <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
}

.staff-img:hover .staff-icons, .style2:hover .staff-img .staff-icons, .blog-img .lightbox.popup-gallery, .port-light {
	background: rgba(<?php echo $composer_rgb_color; ?>,0.8);	
}

.port-bg-color .portfolio-hover, .theme-btn {
	background: rgba(<?php echo $composer_rgb_color; ?>,0.7);
}

.port-bg-color .portfolio-container.portfolio-style3 .portfolio-style3-content::before {
	background: -webkit-linear-gradient(top, rgba(0,0,0,0) 0%, rgba(<?php echo $composer_rgb_color; ?>,0.8) 75%);
	background: linear-gradient(to bottom, rgba(0,0,0,0) 0%, rgba(<?php echo $composer_rgb_color; ?>,0.8) 75%);
}

::-moz-selection {
  background: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
  color: #fff;
}

::selection {
  background: <?php echo stripslashes( wp_strip_all_tags( $composer_pri_color ) ); ?>;
  color: #fff;
}

<?php endif; 

	$con_bg_color = composer_dynamic_css_option( 'container_bg_color', '' );

	$hexStr = preg_replace( "/[^0-9A-Fa-f]/", '', $con_bg_color ); // Gets a proper hex string
	$rgbArray = array();
	if ( strlen( $hexStr ) == 6 ) { //If a proper hex code, convert using bitwise operation. No overhead... faster
		$colorVal = hexdec( $hexStr );
		$rgbArray['red'] = 0xFF & ( $colorVal >> 0x10 );
		$rgbArray['green'] = 0xFF & ( $colorVal >> 0x8 );
		$rgbArray['blue'] = 0xFF & $colorVal;
	} elseif ( strlen( $hexStr ) == 3 ) { //if shorthand notation, need some string manipulations
		$rgbArray['red'] = hexdec( str_repeat( substr( $hexStr, 0, 1 ), 2 ) );
		$rgbArray['green'] = hexdec( str_repeat( substr( $hexStr, 1, 1), 2 ) );
		$rgbArray['blue'] = hexdec( str_repeat( substr( $hexStr, 2, 1), 2 ) );
	}
	$composer_rgb_color = implode( ', ', $rgbArray ); // returns the rgb string or the associative array


 if ( !empty( $con_bg_color ) ): ?>

#main-wrapper {
	background-color: <?php echo stripslashes( wp_strip_all_tags( $con_bg_color ) ); ?>;
}

<?php endif; 

$selection_bg_color = composer_dynamic_css_option( 'selection_bg_color', '' );
$selection_text_color = composer_dynamic_css_option( 'selection_text_color', '' );

/* Selection Color */
if ( !empty( $selection_bg_color ) || !empty( $selection_text_color ) ){ ?>

::-moz-selection {
<?php echo ( !empty ( $selection_bg_color )? 'background:' . stripslashes( wp_strip_all_tags( $selection_bg_color ) ) : '');?>;
<?php echo ( !empty ( $selection_text_color )? 'color:' . stripslashes( wp_strip_all_tags( $selection_text_color ) ) : '');?>;
}
::selection {
<?php echo ( !empty ( $selection_bg_color ) ? 'background:' . stripslashes( wp_strip_all_tags( $selection_bg_color ) ) : '');?>;
<?php echo ( !empty ( $selection_text_color ) ? 'color:' . stripslashes( wp_strip_all_tags( $selection_text_color ) ) : '');?>;
}

<?php
}

$single_banner_top_meta_color = composer_dynamic_css_option( 'single_banner_top_meta_color', '' );
$single_banner_top_meta_background_color = composer_dynamic_css_option( 'single_banner_top_meta_background_color', '' );
$single_banner_title_color = composer_dynamic_css_option( 'single_banner_title_color', '' );
$single_banner_meta_color = composer_dynamic_css_option( 'single_banner_meta_color', '' );
$single_banner_meta_link_color = composer_dynamic_css_option( 'single_banner_meta_link_color', '' );
$single_banner_caption_color = composer_dynamic_css_option( 'single_banner_caption_color', '' );
$single_banner_background_color = composer_dynamic_css_option( 'single_banner_background_color', '' );

if ( !empty( $single_banner_top_meta_color ) || !empty( $single_banner_top_meta_background_color ) ){ ?>

.single-banner-content .category a, .single-blog-style3 .banner-content .category a {
	<?php echo ( !empty ( $single_banner_top_meta_color ) ? 'color:' . stripslashes( wp_strip_all_tags( $single_banner_top_meta_color ) ) : '');?>;
	<?php echo ( !empty ( $single_banner_top_meta_background_color ) ? 'background:' . stripslashes( wp_strip_all_tags( $single_banner_top_meta_background_color ) ) : '');?>;
}

<?php } 

if ( !empty( $single_banner_title_color ) ){ ?>

.single-banner-content .title, .single-blog-style3 .banner-content .title {
	<?php echo ( !empty ( $single_banner_title_color ) ? 'color:' . stripslashes( wp_strip_all_tags( $single_banner_title_color ) ) : '');?>;
}

<?php } 

if ( !empty( $single_banner_meta_color ) ){ ?>

.single-blog-style2 .single-banner-content .post-meta, .banner-content .post-meta {
	<?php echo ( !empty ( $single_banner_meta_color ) ? 'color:' . stripslashes( wp_strip_all_tags( $single_banner_meta_color ) ) : '');?>;
}

<?php } 

if ( !empty( $single_banner_meta_link_color ) ){ ?>

.single-blog-style2 .single-banner-content .pix-blog-comments, .banner-content .post-meta a {
	<?php echo ( !empty ( $single_banner_meta_link_color ) ? 'color:' . stripslashes( wp_strip_all_tags( $single_banner_meta_link_color ) ) : '');?>;
}

<?php } 

if ( !empty( $single_banner_caption_color ) ){ ?>

.single-blog-style1 .caption, .single-blog-style2 .caption, .single-blog-style3 .caption {
	<?php echo ( !empty ( $single_banner_caption_color ) ? 'color:' . stripslashes( wp_strip_all_tags( $single_banner_caption_color ) ) : '');?>;
}

<?php } 

if ( !empty( $single_banner_background_color ) ){ ?>

.single-blog-style2 .banner, .single-blog-style3 .banner {
	<?php echo ( !empty ( $single_banner_background_color ) ? 'background:' . stripslashes( wp_strip_all_tags( $single_banner_background_color ) ) : '');?> !important;
}

<?php }

/* Footer Custom Styles */
$f_customization = composer_dynamic_css_option( 'f_customization', 'no' );
$custom_f_bg_pattern = composer_dynamic_css_option( 'custom_f_bg_pattern', '' );
$custom_f_bg_color = composer_dynamic_css_option( 'custom_f_bg_color', '' );
$custom_f_bg = composer_dynamic_css_option( 'custom_f_bg', '' );
$custom_f_bg_attachment = composer_dynamic_css_option( 'custom_f_bg_attachment', '' );
$custom_f_bg_size = composer_dynamic_css_option( 'custom_f_bg_size', '' );
$custom_f_bg_repeat = composer_dynamic_css_option( 'custom_f_bg_repeat', '' );

$custom_f_title_color = composer_dynamic_css_option( 'custom_f_title_color', '' );
$custom_f_txt_color = composer_dynamic_css_option( 'custom_f_txt_color', '' );
$custom_f_link_color = composer_dynamic_css_option( 'custom_f_link_color', '' );
$custom_f_link_hover_color = composer_dynamic_css_option( 'custom_f_link_hover_color', '' );
$custom_fc_bg_color = composer_dynamic_css_option( 'custom_fc_bg_color', '' );
$custom_fc_txt_color = composer_dynamic_css_option( 'custom_fc_txt_color', '' );
$custom_fc_link_color = composer_dynamic_css_option( 'custom_fc_link_color', '' );
$custom_fc_link_hover_color = composer_dynamic_css_option( 'custom_fc_link_hover_color', '' );


$boxed_content = composer_dynamic_css_option( 'boxed_content', 0 );
$main_wrap = composer_dynamic_css_option( 'main_wrap', 1366 );
$content_wrap = composer_dynamic_css_option( 'content_wrap', 1170 );
$mobile_break_menu = composer_dynamic_css_option( 'mobile_break_menu', 991 );

//Change Background URL

if($custom_f_bg){
	$custom_f_bg = str_replace( '[site_url]', site_url(), $custom_f_bg );
}


//Footer Customization 
if( 'yes' === $f_customization): 
	if($custom_f_bg_color != '' && $custom_f_bg == '' && $custom_f_bg_pattern == ''): ?>
		#pageFooterCon {
			background-color: <?php echo stripslashes( wp_strip_all_tags( $custom_f_bg_color ) ); ?>;        
		}
	<?php endif; 

	if($custom_f_bg_color != '' && $custom_f_bg_pattern != ''  && $custom_f_bg == '' ): ?>
		#pageFooterCon, .footer-light #pageFooterCon {
			background: <?php echo stripslashes( wp_strip_all_tags( $custom_f_bg_color ) ); if( $custom_f_bg_pattern != 'none') { ?> url(<?php echo esc_url( get_template_directory_uri().'/_img/'.$custom_f_bg_pattern.'.png' ); ?>) repeat <?php } ?>;
		}
	<?php endif; 

	 if($custom_f_bg != '' ): ?>
		.pageFooterCon, .footer-bottom{
				background: none !important;
		}

		footer{
			background-image: url(<?php echo stripslashes( wp_strip_all_tags( $custom_f_bg ) ); ?>);
			background-attachment: <?php echo stripslashes( wp_strip_all_tags( $custom_f_bg_attachment ) ); ?>;
			background-repeat: <?php echo stripslashes( wp_strip_all_tags( $custom_f_bg_repeat ) ); ?>;
			background-size: <?php echo stripslashes( wp_strip_all_tags( $custom_f_bg_size ) ); ?>;
		}
	<?php endif; 

	if($custom_f_title_color != '' ): ?>
		#pageFooterCon .widget .widgettitle, #pageFooterCon .widget .widgettitle, #pageFooterCon #wp-calendar caption {        
			color: <?php echo stripslashes( wp_strip_all_tags( $custom_f_title_color ) ); ?> !important;
		}
	<?php endif; 

	if($custom_f_txt_color != '' ): ?>
		.pageFooterCon, .footer-light #pageFooterCon, #pageFooterCon .textwidget,#pageFooterCon thead{        
			color: <?php echo stripslashes( wp_strip_all_tags( $custom_f_txt_color ) ); ?> !important;
		}
	<?php endif; 

	if($custom_f_link_color != '' ): ?>
		#pageFooterCon .widget li a, .pageFooterCon #wp-calendar a, .footer-light #pageFooterCon .widget a {        
			color: <?php echo stripslashes( wp_strip_all_tags( $custom_f_link_color ) ); ?> !important;
		}
		.widget.widget_rss a {
			border-bottom-color: <?php echo stripslashes( wp_strip_all_tags( $custom_f_link_color ) ); ?>;
		}
		.searchsubmit,#wp-calendar #today {
			  background-color: <?php echo stripslashes( wp_strip_all_tags( $custom_f_link_color ) ); ?>;
		}
	<?php endif; 

	if($custom_f_link_hover_color != '' ): ?>
		#pageFooterCon .widget li a:hover, .pageFooterCon #wp-calendar td a:hover{        
			color: <?php echo stripslashes( wp_strip_all_tags( $custom_f_link_hover_color ) ); ?> !important;
		}        
		.widget.widget_rss a:hover{
			border-bottom-color: <?php echo stripslashes( wp_strip_all_tags( $custom_f_link_hover_color ) ); ?>;
		}
	<?php endif; 

	if($custom_fc_bg_color != '' ): ?>
		.footer-bottom, .footer-light .footer-bottom {        
		   background-color: <?php echo stripslashes( wp_strip_all_tags( $custom_fc_bg_color ) ); ?> !important;
		   border: none;
		}
	<?php endif; 

	if($custom_fc_txt_color != '' ): ?>
		.copyright, .footer-light .copyright-text {        
			color: <?php echo stripslashes( wp_strip_all_tags( $custom_fc_txt_color ) ); ?> !important;
		}
	<?php endif;  

	if($custom_fc_link_color != '' ): ?>
		.footer-bottom .copyright a {        
			color: <?php echo stripslashes( wp_strip_all_tags( $custom_fc_link_color ) ); ?> !important;
		}
	<?php endif; 

	if($custom_fc_link_hover_color != '' ): ?>
		.footer-bottom .copyright a:hover {        
			color: <?php echo stripslashes( wp_strip_all_tags( $custom_fc_link_hover_color ) ); ?> !important;
		}
	<?php endif; 

endif; 


if($content_wrap != 1170){ ?>
	.pix-container, .container, .wpb_row.vc_row-fluid.normal {
		max-width: <?php echo stripslashes( wp_strip_all_tags( $content_wrap ) ) . 'px'; ?>;
		width: 100%;
	}
<?php }

if($boxed_content){ ?>
	.pix-boxed-content, .pix-boxed-content .footer-fixed, .pix-boxed-content .header-con.stuck {
		max-width: <?php echo stripslashes( wp_strip_all_tags( $main_wrap ) ) .'px'; ?>;
		margin-left: auto;
		margin-right: auto;
	}
	@media (max-width: 991px) {
		.pix-boxed-content, .pix-boxed-content .footer-fixed, .pix-boxed-content .header-con.stuck {
			max-width: 748px;
		}
		.pix-container, .container {
			max-width: 682px;
			width: 100%;
		}
	}
	@media (max-width: 767px) {
		.pix-boxed-content, .pix-boxed-content .footer-fixed, .pix-boxed-content .header-con.stuck {
			width: 468px;
		}
		.pix-container, .container {
			max-width: 428px;
		}
	}
	@media (max-width: 480px) {
		.pix-boxed-content, .pix-boxed-content .header-con.stuck {
			max-width: 80%;
		}
		.pix-boxed-content .footer-fixed {
		    max-width: 100%;
			width: 100%;
		}
		.pix-container, .container {
			max-width: 80%;
		}
	}
<?php } 

if($mobile_break_menu != ''){ ?>
@media (max-width: <?php echo stripslashes( wp_strip_all_tags( $mobile_break_menu ) ) . 'px'; ?>) {

	.pix-menu {
		display: block;
	}

	.main-nav, .side-header-widget {
		display: none !important;
	}

	.widget-right, .right-side-wrap, .right-side, .left-side {
		display: none !important;
	}

	.pix-overlay {
		display: block;
	}	

	.mobile-menu-nav.moved {
		opacity: 1;
		visibility: visible;
	}

	#content-pusher.content-pushed {
		left: 250px;		
	}

	/*.menu-responsive, */
	.menu-wrap {
		text-align: center;
		display: none;
	}

	.pix-megamenu .sub-menu li .sub-menu li a {
		margin-top: 0;
		margin-bottom: 0;
	}

}

@media (min-width: <?php echo stripslashes( wp_strip_all_tags( $mobile_break_menu ) ) . 'px'; ?>) {

	.pix-megamenu .sub-menu li > a, .pix-megamenu .sub-menu li > a:hover {
		padding: 0;
	}

	.pix-megamenu .sub-menu li .sub-menu li a:hover {
		padding-left: 5px;
	}

	.pix-megamenu .sub-menu .new-tag {
		margin-top: -4px;
	}

}

<?php } ?>


body {
	font-family: '<?php echo stripslashes( wp_strip_all_tags( $body_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $body_ff ) ); ?>;
	font-size:   <?php echo  stripslashes( wp_strip_all_tags( $body_fsize ) ); ?>;
	font-style:  <?php echo stripslashes( wp_strip_all_tags( $body_fvs[0] ) ); ?>;
	font-weight: <?php echo stripslashes( wp_strip_all_tags( $body_fvs[1] ) ); ?>;
}

h1, h2, h3, blockquote, .top-details, #logo, .main-nav .menu li, .main-nav li.pix-megamenu > ul.sub-menu > li > a, .main-nav li.pix-megamenu > ul.sub-menu > li:hover > a, .header-con .main-nav li.pix-megamenu > ul.sub-menu > li > a, .textfield, #sub-header h2, .btn, .title, .process .text .process-style, .process .text span.inner-text, .percent-text, .gradient-text, #filters.normal li a, #filters.normal.simple li a, .price-table .plan-title, .counter .counter-value, .blog .post .quote-author, .pix-recent-blog-posts .content .top-meta, .single .post_format-post-format-quote .quote-link-content .quote-author, .authorDetails .authorName a, .comment-list .fn a, .comment-list .fn, .footer-dark #pageFooterCon .widget .tagcloud a, .widget select, .widget_archive select, .widget_categories select, .screen-reader-text, footer .widget .widgettitle, .recentpost .content, .popularpost .content, .wpcf7-submit, .contactform .textfield, .wpcf7-text, .wpcf7-number, .wpcf7-date, .wpcf7-select, .wpcf7-quiz, .wpcf7-captchar, .contactform .message, .wpcf7-textarea, #amz-settings-inner h3, .amz-setting .amz-setting-inner a, .pix-item-icon, .pix-cart .product_list_widget li.empty, .pix-cart .product_list_widget li a, .pix-cart .woocommerce-price-amount.amount, .pix-cart .product_list_widget .quantity, .pix-cart .widget_shopping_cart_content .total, .pix-cart .total, .woo-product-item .price, .button, input[type="submit"], .summary .price ins, .summary .price .amount, .product_meta span, .woocommerce-tabs  #commentform label, .woocommerce-message, .woocommerce-error, .woocommerce-info, .cart-collaterals table tbody th, .cart-collaterals table tbody td, table.shop_table thead th, table.shop_table tbody td, .add_to_cart_button, .added_to_cart, .ajax_add_to_cart, .product_type_external, .product_type_grouped, .summary .cart .group_table td.label a, .summary .cart .group_table .price p, .checkout.woocommerce-checkout, .stock, .quantity .qty, .copyright-text, .copyright-text a {   
	font-family: '<?php echo stripslashes( wp_strip_all_tags( $heading_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $heading_ff ) ); ?>;
}

.single-blog .post-author .author-name, .addresses h3  {
	font-family: '<?php echo stripslashes( wp_strip_all_tags( $con_gf ) ); ?>', <?php echo stripslashes( wp_strip_all_tags( $con_ff ) ); ?>;
}
