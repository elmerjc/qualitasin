<?php
	get_header();

	$prefix = composer_get_prefix();

    //Get Theme Option Value
    $composer_custom_404_bg = composer_get_option_value( $prefix.'bg', get_template_directory_uri().'/_images/404.png' );
    $composer_title = composer_get_option_value( $prefix.'text', esc_html__( 'Page Not Found', 'composer' ) );
    $composer_description = composer_get_option_value( $prefix.'description', esc_html__( 'Sorry, but the page you were looking for can\'t be found. Please inform us about this error.', 'composer' ) );
    $composer_menu = composer_get_option_value( $prefix.'menu', 'show' );
    $composer_search = composer_get_option_value( $prefix.'search', 'show' );

?>

    <div class=" container boxed">
		<div class="row">
			<div class="col-md-12">
				<div id="errorCon">
					<?php
						if( !empty( $composer_custom_404_bg ) ){
							echo '<p class=""><img src="'. esc_url( $composer_custom_404_bg ) .'" alt=""></p>';
						}

						if( !empty( $composer_title )){
							echo '<h3 class="error-text">'. esc_html( $composer_title ). '</h3>';
						}

						if( !empty( $composer_description )){
							echo '<p class="emphasis>'. esc_html( $composer_description ). '</p>';
						}

						if( 'show' === $composer_menu ){
							composer_404_nav();
						}

						if( 'show' === $composer_search ){
							echo '<section class="search">';
								echo '<p>'. get_search_form() .'</p>';
							echo '</section>';
						}
					?>
					
				</div>
			</div>
		</div>
	</div>				

<?php get_footer(); ?>
