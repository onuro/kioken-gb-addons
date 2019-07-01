<?php
function kirki_header_additional_array(){

	$fields = array(

    


		// Header Stickyness
		'header_sticky'                     => array(
			'type'        	=> 'select',
			'label'       	=> esc_html__( 'Sticky Header', 'gutenbooster' ),
			'description' 	=> esc_html__( 'Make header always stick to top on scroll', 'gutenbooster' ),
			'section'     	=> 'header',
			'default'     	=> 'none',
			'choices'     	=> array(
				'none'      	=> esc_html__( 'None', 'gutenbooster' ),
				'sticky' 	=> esc_html__( 'Sticky Header', 'gutenbooster' ),
				'headroom' 	=> esc_html__( 'Smart Sticky Header', 'gutenbooster' ),
			),
		),
		'shrink'             				=> array(
			'type'    => 'toggle',
			'label'   => esc_html__( 'Resize header on scroll', 'gutenbooster' ),
			'description' => esc_html__( 'Header will resize to a smaller height on scroll', 'gutenbooster' ),
			'section' => 'header',
			'default' => false,
			'active_callback' => array(
				array(
					'setting'  => 'header_sticky',
					'operator' => '!=',
					'value'    => 'none',
				),
			),
		),
		'shrinkbg'             			=> array(
			'type'    => 'color',
			'label'   => esc_html__( 'Header background color on resize', 'gutenbooster' ),
			'section' => 'header',
			'default'         => 'rgba(255,255,255,1)',
			'transport' => 'auto',
			'output'    => array(
				array(
					'element'  => '.menu-wrapper.shrink, .header--bg-transparent .menu-wrapper.sticking.shrink,
												.header--v2 .menu-wrapper.shrink .nav-menu, .header--v2 .header--bg-transparent .menu-wrapper.sticking.shrink .nav-menu,
												.header--v2 .menu-wrapper.shrink .site-logo, .header--v2 .header--bg-transparent .menu-wrapper.sticking.shrink .site-logo',
					'property' => 'background-color'
				),
			),
			'choices'         => array(
				'alpha' => true,
			),
			'active_callback' => array(
				array(
					'setting'  => 'shrink',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'header_sticky',
					'operator' => '!=',
					'value'    => 'none',
				),
			),
		),
		'shrink_txt_color'					=> array(
			'type'    => 'radio',
			'label'   => esc_html__( 'Header Text Color on Resize', 'gutenbooster' ),
			'section' => 'header',
			'default'     	=> 'dark',
			'choices'     	=> array(
				'dark'       => esc_html__( 'Dark', 'gutenbooster' ),
				'white' => esc_html__( 'White', 'gutenbooster' ),
			),
			'active_callback' => array(
				array(
					'setting'  => 'shrink',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'header_sticky',
					'operator' => '!=',
					'value'    => 'none',
				),
			),
		),
		'shrinkshadow'             			=> array(
			'type'    => 'toggle',
			'label'   => esc_html__( 'Add Box Shadow', 'gutenbooster' ),
			'section' => 'header',
			'default' => false,
			'output'    => array(
				array(
					'element'  => '.menu-wrapper.shrink.sticking',
					'property' => 'box-shadow',
					'value_pattern'=>'0 5px 25px -5px rgba(0,0,0,0.25)',
					'exclude'       => array( false ),
				),
			),
			'active_callback' => array(
				array(
					'setting'  => 'shrink',
					'operator' => '==',
					'value'    => true,
				),
				array(
					'setting'  => 'header_sticky',
					'operator' => '!=',
					'value'    => 'none',
				),
				array(
					'setting'  => 'shrink_txt_color',
					'operator' => '!=',
					'value'    => 'white',
				),
			),
		),






	);
	return $fields;
}
