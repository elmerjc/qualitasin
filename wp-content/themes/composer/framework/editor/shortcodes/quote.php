<?php 

$pix_options =array(


	array(
		'name' 	=> 	esc_html__('Author Name (Optional)', 'composer' ),
		'desc' 	=> 	esc_html__('Enter the author name', 'composer' ),
		'id'	=>	'author_name',
		'std'	=>	'John Deo', //optional
		'type'	=>	'text'
		),

	array(
		'name' 	=> 	esc_html__('Content', 'composer' ),
		'desc' 	=> 	esc_html__('Enter the  blockquote content', 'composer' ),
		'id'	=>	'blockquote_con',
		'std'	=>	'Content Goes Here',
		'type'	=>	'textarea',
		'con'	=>	true //true to display inbetween shortcodes
		),

	array(
		'name' 	=> 	esc_html__('Alignment', 'composer' ),
		'desc' 	=> 	esc_html__('BlockQuote alignment left or right', 'composer' ),
		'id'	=>	'align',
		'std'	=>	'left',
		'options'=> array('left','right'),
		'type'	=>	'select'
		),

);

?>