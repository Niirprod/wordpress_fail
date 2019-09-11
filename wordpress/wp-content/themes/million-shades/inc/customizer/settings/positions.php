<?php 

/*
*
* All option related settings and controls
*
*/

$controls = million_shades_layout_options_param_style('control');
$sections = million_shades_layout_options_param_style('section');
$labels = million_shades_layout_options_param_style('label');
$priorities = million_shades_layout_options_param_style('priority');
$defaults = million_shades_layout_options_param_style('default');
$transports = million_shades_layout_options_param_style('transport');
$callbacks = million_shades_layout_options_param_style('callback');
$control_choices = million_shades_layout_options_param_style('choice');
$control_types = million_shades_layout_options_param_style('type');

$i=0;
	
foreach ($controls  as $control) {
   
	
	$wp_customize->add_setting(
		$control,
		array(
			'sanitize_callback' =>$callbacks[$i],
			
			'default'         => $defaults[$i],
			'transport'         => $transports[$i],
		)
	);

	$wp_customize->add_control($control,array(
		
			'type' =>$control_types[$i],
			'section' => $sections[$i],
			'priority' => $priorities[$i],
		
			'label' =>$labels[$i],
			'choices'   => $control_choices[$i]
		)
		
		
		
	);
$i++;
}



