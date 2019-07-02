<?php
function kirki_blog_additional_array(){
	$fields = array(

		//blog settings

		'blog_layout'                      => array(
			'type'        => 'radio-buttonset',
			'label'       => esc_html__( 'Blog Posts Style', 'gutenbooster' ),
			'description' => esc_html__( 'Select the style display of the blog posts', 'gutenbooster' ),
			'section'     => 'blog',
			'default'     => 'classic',
			'priority'     => 1,
			'choices'     => array(
				'classic'       => esc_html__( 'Classic', 'gutenbooster' ),
				'grid' 					=> esc_html__( 'Grid', 'gutenbooster' ),
				'cards' 				=> esc_html__( 'Cards', 'gutenbooster' ),
			),
		),
		'blog_categories'                 => array(
			'type'    => 'toggle',
			'label'   => esc_html__( 'Show Category Navigation', 'gutenbooster' ),
			'description' => esc_html__( 'Shows category navigation on top of blog posts', 'gutenbooster' ),
			'section' => 'blog',
      'priority'     => 2,
			'default' => false,
		),



    'blog_posts_radius'					=> array(
			'type'            => 'dimensions',
			'label'           => esc_html__( 'Post Image Border Radius', 'gutenbooster' ),
			'description'		=> esc_html__( 'Apply border radius to blog posts\' featured images. Enter dimension values like px,%,em etc.' , 'gutenbooster'),
			'section'         => 'blog',
      'priority'     => 5,
      'default' => array(
        'border-top-left-radius'    => '',
				'border-top-right-radius' => '',
				'border-bottom-left-radius'   => '',
				'border-bottom-right-radius'  => '',
			),
      'choices'     => [
    		'labels' => [
    			'border-top-left-radius'  => esc_html__( 'Top Left Radius', 'gutenbooster' ),
    			'border-top-right-radius'  => esc_html__( 'Top Right Radius', 'gutenbooster' ),
    			'border-bottom-left-radius'  => esc_html__( 'Bottom Left Radius', 'gutenbooster' ),
    			'border-bottom-right-radius'  => esc_html__( 'Bottom Right Radius', 'gutenbooster' ),
    		],
    	],
			'transport' => 'auto',
			'output'    => array(
				array(
					'element'  			=> array(
						'.k-content-inner a.post-thumbnail',
					),
				),
			),
		),
    'blog_posts_summary_radius'					=> array(
			'type'            => 'dimensions',
			'label'           => esc_html__( 'Post Summary Border Radius', 'gutenbooster' ),
			'description'		=> esc_html__( 'Apply border radius to blog posts\' post summary. Enter dimension values like px,%,em etc.' , 'gutenbooster'),
			'section'         => 'blog',
      'priority'     => 6,
      'default' => array(
        'border-top-left-radius'    => '',
				'border-top-right-radius' => '',
				'border-bottom-left-radius'   => '',
				'border-bottom-right-radius'  => '',
			),
      'choices'     => [
    		'labels' => [
    			'border-top-left-radius'  => esc_html__( 'Top Left Radius', 'gutenbooster' ),
    			'border-top-right-radius'  => esc_html__( 'Top Right Radius', 'gutenbooster' ),
    			'border-bottom-left-radius'  => esc_html__( 'Bottom Left Radius', 'gutenbooster' ),
    			'border-bottom-right-radius'  => esc_html__( 'Bottom Right Radius', 'gutenbooster' ),
    		],
    	],
			'transport' => 'auto',
			'output'    => array(
				array(
					'element'  			=> array(
						'.k-content-inner .kt-large-post .post-summary',
					),
				),
			),
		),

    'show_post_thumb'                 => array(
			'type'        => 'toggle',
			'label'       => esc_html__( 'Show Post Featured Image', 'gutenbooster' ),
			'description' => esc_html__( 'Show post featured image before content', 'gutenbooster' ),
			'section'     => 'blog',
			'default'     => true,
			'active_callback' => array(
				array(
					'setting'  => 'enable_page_banner',
					'operator' => '==',
					'value'    => false,
				),
			),
		),
		'meta_title_pos'                 => array(
			'type'        => 'radio',
			'label'       => esc_html__( 'Meta and Title Position', 'gutenbooster' ),
			'description' => esc_html__( 'Select where you want to see the post title and meta information in single post', 'gutenbooster' ),
			'section'     => 'blog',
			'default'     => 'above',
			'choices'     => array(
				'above'     => esc_html__( 'Above featured image', 'gutenbooster' ),
				'within' 		=> esc_html__( 'Inside featured image', 'gutenbooster' ),
			),
			'active_callback' => array(
				// array(
				// 	'setting'  => 'show_post_thumb',
				// 	'operator' => '==',
				// 	'value'    => true,
				// ),
				// array(
				// 	'setting'  => 'enable_page_banner',
				// 	'operator' => '==',
				// 	'value'    => false,
				// ),
				array(
					'setting'  => 'disable_blog_pb',
					'operator' => '==',
					'value'    => true,
				),
			),
		),


	);
	return $fields;
}