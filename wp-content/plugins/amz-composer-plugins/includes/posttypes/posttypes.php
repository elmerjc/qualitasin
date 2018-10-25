<?php
/*
 *  Post Types Inialization
 */
	
    global $smof_data;

    //Portfolio Options
    $slug_portfolio = isset($smof_data['slug_portfolio']) ? esc_html(strtolower($smof_data['slug_portfolio'])) : 'portfolio';

	$por_arr = array(
		'menu_icon' =>'dashicons-portfolio',
		'supports' => array('title','editor'),
		'rewrite' 	=> array(
			'slug' => $slug_portfolio
			),
		);
	$por_tax_arr = array(
		"Categories"   => array( 
			'singular_name' => 'Category',
			'query_var' => 'portfolio_cat',
			'rewrite' => array( 'slug' => 'portfolio-category' ) 
		) 
	);

	$portfolio = new Amazee_Post_Type('Portfolio', 'Portfolio', $por_arr);
	$portfolio->taxonomies('Portfolio', $por_tax_arr);


/*
 *  Manage Custom Post Type Columns
 */

//adding column to portfolio posts type
add_filter( 'manage_edit-pix_portfolio_columns', 'my_edit_pix_portfolio_columns' ) ;

function my_edit_pix_portfolio_columns( $columns ) {
	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => esc_html__('All Portfolio', 'amz-composer-plugins' ),
		'id' => esc_html__('Portfolio Id', 'amz-composer-plugins' ),
		'thumb' => esc_html__('Portfolio Image', 'amz-composer-plugins' ),
		'date' => esc_html__('Date', 'amz-composer-plugins' )
		);
	return $columns;
}

//adding column to portfolio posts type
add_action( 'manage_pix_portfolio_posts_custom_column', 'my_manage_portfolio_columns', 10, 2 );
function my_manage_portfolio_columns( $column, $post_id ) {
	global $post;
	switch( $column ) {
		case 'id' :		
			printf( $post_id );
		break;

		case 'thumb' :
			//Get Porfolio Image
			$post_details = get_post_meta($post_id,'portfolio_meta_value');
			if( !empty($post_details)){
				extract($post_details[0]);
			}
			$image = isset($portfolio_gallery) ? json_decode($portfolio_gallery) : '';

			if(!empty($image)){
				$image_thumb_url = wp_get_attachment_image_src( $image[0]->itemId, 'full');
				$img = aq_resize($image_thumb_url[0], 75 , 75, true, true);
				if($img){
					printf( '<img src="'.$img.'">' );
				}
			}
		break;

		default :
		break;
	}
}