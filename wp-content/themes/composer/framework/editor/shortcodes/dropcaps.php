<?php 

$pix_options =array(

	array('break' =>  false),

	array(
		'name' 	=> 	esc_html__('Dropcaps Style', 'composer'),
		'desc' 	=> 	esc_html__('Choose the style you want', 'composer'),
		'id'	=>	'style',
		'std'	=>	'default',
		'options'=> array('default','square','circle'),
		'type'	=>	'select'
		),

	array(
		'name' 	=> 	esc_html__('Dropcaps Text', 'composer'),
		'desc' 	=> 	esc_html__('Enter the dropcaps text', 'composer'),
		'id'	=>	'dropcap_text',
		'std'	=>	'S', //optional
		'type'	=>	'text',
		'con'   =>  true 
	)

);

?>