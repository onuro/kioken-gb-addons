<?php
function kirki_footer_additional_array(){

	$fields = array(


    // Footer Structure
		'footer_hide_submenus'                  => array(
			'type'        => 'toggle',
			'label'       => esc_html__( 'Hide Submenus', 'gutenbooster' ),
			'section'     => 'footer_structure',
			'default'     => false,
			'transport' => 'postMessage',
      'priority' => 3,
			'js_vars'     => array(
				array(
					'element'  => '#colophon.site-footer .inner',
					'function' => 'toggleClass',
					'class'    => 'hide-submenus',
					'value'    => true,
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'footer_widgets',
					'operator' => '==',
					'value'    => true,
				),
			),
		),
		'fixed_footer'                      => array(
			'type'        => 'toggle',
			'label'       => esc_html__( 'Stick footer to the bottom', 'gutenbooster' ),
			'description' => esc_html__( 'Once enabled, footer sticks to the bottom creating a reveal effect', 'gutenbooster' ),
			'section'     => 'footer_structure',
			'default'     => false,
      'priority' => 4,
		),





	);
	return $fields;
}















