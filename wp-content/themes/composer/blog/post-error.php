<?php if( is_search () ) :
	$no_search_result_title = composer_get_option_value( 'search_no_search_result_title', esc_html__( 'Oops, Search Result Not Found!', 'composer' ) );
	$no_search_result_content = composer_get_option_value( 'search_no_search_result_content', esc_html__( 'Uh Oh. Something is missing. Try double checking things.', 'composer' ) );
	?>
	<article id="post-not-found">
		<header class="article-header">
			<h1><?php echo esc_html( $no_search_result_title ); ?></h1>
		</header>
		<section>
			<p><?php echo esc_html( $no_search_result_content ); ?></p>
		</section>
	</article>
<?php else: ?>
	<article id="post-not-found">
		<header class="article-header">
			<h1><?php esc_html_e( 'Oops, Post Not Found!', 'composer' ); ?></h1>
		</header>
		<section>
			<p><?php esc_html_e( 'Uh Oh. Something is missing. Try double checking things.', 'composer' ); ?></p>
		</section>
	</article>
<?php endif; ?>