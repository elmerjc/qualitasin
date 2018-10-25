<?php 

$pix_options =array(


	array(
		'name' 	=> 	esc_html__('Emphasis Text', 'composer' ),
		'desc' 	=> 	esc_html__('Enter the Emphasis Content', 'composer' ),
		'id'	=>	'emphasis_con',
		'std'	=>	'Content Goes Here',
		'type'	=>	'textarea'
		),
	
	array(
		'name' 	=> 	esc_html__('Animation', 'composer' ),
		'desc' 	=> 	esc_html__('Do you like to animate this element?', 'composer' ),
		'id'	=>	'animate',		
		'std'	=>	false,
		'type'	=>	'checkbox',
		'val'   =>  array('No', 'Yes') // False Value First
		),

	array(
		'name' 	=> 	esc_html__('Animation Transition', 'composer' ),
		'desc' 	=> 	esc_html__('Choose Animation Transition', 'composer' ),
		'id'	=>	'transition',
		'std'	=>	'fadeIn',
		'options'=> array('flash','bounce','shake','tada','swing','wobble','pulse','flip','flipInX','flipInY','fadeIn','fadeInUp','fadeInDown','fadeInLeft','fadeInRight','fadeInUpBig','fadeInDownBig','fadeInLeftBig','fadeInRightBig','slideInDown','slideInLeft','slideInRight','bounceIn','bounceInUp','bounceInDown','bounceInLeft','bounceInRight','rotateIn','rotateInDownLeft','rotateInDownRight','rotateInUpLeft','rotateInUpRight','lightSpeedIn','hinge','rollIn'),
		'type'	=>	'select',
		),

	array(
		'name' 	=> 	esc_html__('Animation Duration', 'composer' ),
		'desc' 	=> 	esc_html__('Enter the Duration (Ex: 500ms or 1s)', 'composer' ),
		'id'	=>	'duration',
		'std'	=>	'1s', //optional
		'type'	=>	'text',
		),

	array(
		'name' 	=> 	esc_html__('Animation Delay', 'composer' ),
		'desc' 	=> 	esc_html__('Enter the Delay (Ex: 100ms or 1s)', 'composer' ),
		'id'	=>	'delay',
		'std'	=>	'100ms', //optional
		'type'	=>	'text',
		),

);

?>