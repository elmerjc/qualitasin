<?php 

$pix_options =array(


	array(
		'name' 	=> 	esc_html__('Tooltip Text', 'composer' ),
		'desc' 	=> 	esc_html__('Enter the tooltip text', 'composer' ),
		'id'	=>	'tooltip_title',
		'std'	=>	'Tooltip Text', //optional
		'type'	=>	'text',
		),

	array(
		'name' 	=> 	esc_html__('Alignment', 'composer' ),
		'desc' 	=> 	esc_html__('Choose the alignment you want', 'composer' ),
		'id'	=>	'align',
		'std'	=>	'top',
		'options'=> array('left','right','top','bottom'),
		'type'	=>	'select',
		),

	array(
		'name' 	=> 	esc_html__('Tooltip URL', 'composer' ),
		'desc' 	=> 	esc_html__('Enter the Tooltip URL', 'composer' ),
		'id'	=>	'link',
		'std'	=>	'#', //optional
		'type'	=>	'text',
		),

	array(
		'name' 	=> 	esc_html__('Tooltip Content', 'composer' ),
		'desc' 	=> 	esc_html__('Enter the tooltip content', 'composer' ),
		'id'	=>	'tooltip_content',
		'std'	=>	'Tooltip Content', //optional
		'type'	=>	'text',
		),

);

?>