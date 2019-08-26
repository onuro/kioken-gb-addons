<?php
$gb_addons_active_theme = esc_attr( wp_get_theme( get_template() )->get( 'TextDomain' ) );
// echo $gb_addons_active_theme;
if ( 'bavarian' !== $gb_addons_active_theme  ) :
	function kirki_preloader_array(){
		$fields = array(
			'preloader'                      => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Enable Preloader', 'gutenbooster' ),
				'description' => esc_html__( 'Show a waiting screen when page is loading', 'gutenbooster' ),
				'section'     => 'preloader',
				'default'     => false,
			),
			'preloader_bg_switch'                      => array(
				'type'        => 'radio',
				'label'       => esc_html__( 'Preloader Background Color', 'gutenbooster' ),
				'section'     => 'preloader',
				'default'     => 'default',
				'choices'     => array(
					'default'       => esc_html__( 'Theme Main Accent Color', 'gutenbooster' ),
					'custom' => esc_html__( 'Custom Color', 'gutenbooster' ),
				),
				'active_callback' => array(
					array(
						'setting'  => 'preloader',
						'operator' => '==',
						'value'    => true,
					),
				),
			),
			'preloader_trans_duration'			=> array(
				'type'            => 'slider',
				'label'           => esc_html__( 'Preloading Animation Duration', 'gutenbooster' ),
				'description'		=> esc_html__( 'Set the animation duration of the preloader' , 'gutenbooster'),
				'section'         => 'preloader',
				'default'         => 1.2,
				'choices'     => array(
					'min'  => 0.5,
					'max'  => 2,
					'step' => 0.01,
				),
				'active_callback' => array(
					array(
						'setting'  => 'preloader',
						'operator' => '==',
						'value'    => true,
					),
				),
			),
			'move_wrapper_down'                      => array(
				'type'        => 'toggle',
				'label'       => esc_html__( 'Move Site Down', 'gutenbooster' ),
				'description' => esc_html__( 'Adds a moving up/down effect other than opacity', 'gutenbooster' ),
				'section'     => 'preloader',
				'default'     => false,
				'active_callback' => array(
					array(
						'setting'  => 'preloader',
						'operator' => '==',
						'value'    => true,
					),
				),
			),
			'preloader_bg_color'     => array(
				'type'            => 'color',
				'label'           => esc_html__( 'Background Color', 'gutenbooster' ),
				'section'         => 'preloader',
				'default'         => 'rgba(255,255,255,0.95)',
				// 'transport' => 'auto',
				'output'    => array(
					array(
						'element'  => '.kt-preloader-obj',
						'property' => 'background-color'
					),
				),
				'choices'         => gutenbooster_theme_colors(),
				'active_callback' => array(
					array(
						'setting'  => 'preloader',
						'operator' => '==',
						'value'    => true,
					),
					array(
						'setting'  => 'preloader_bg_switch',
						'operator' => '==',
						'value'    => 'custom',
					),
				),
			),
			'preloader_loading_color'     => array(
				'type'            => 'color',
				'label'           => esc_html__( 'Loading Indicator Color', 'gutenbooster' ),
				'section'         => 'preloader',
				'default'         => '#ffffff',
				// 'transport' => 'auto',
				'output'    => array(
					array(
						'element'  => '.kt-preloader-obj .lds-ellipsis div',
						'property' => 'background-color'
					),
				),
				'choices'         => gutenbooster_theme_colors(),
				'active_callback' => array(
					array(
						'setting'  => 'preloader',
						'operator' => '==',
						'value'    => true,
					),
				),
			),
			'notice_preloader_info'                 => array(
				'type'     => 'notice',
				'label'       => esc_html__( 'Important Info', 'gutenbooster' ),
				'description' => esc_html__( 'The preloader for this theme is a full page transition utility which means your whole site works as a single page. By default, it is optimized to play well with common popular plugins such as Woocommerce and caching plugins, but if you have other plugins that rely on css and javascript to be updated on each page, you might have issues. In that case, please disable the plugin that is causing the issue or disable this preloader.', 'gutenbooster' ),
				'section'  => 'preloader',
			),
		);
		return $fields;
	}
endif;