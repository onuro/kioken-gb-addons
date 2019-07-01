<?php
function kirki_pagebanner_additional_array(){



 $fields = array(

       // Page Banner
       'enable_page_banner_bgparallax'	=> array(
         'type'    => 'toggle',
         'label'   => esc_html__( 'Parallax Background & Contents', 'gutenbooster' ),
         'description' => esc_html__( 'Once activated, the background image and titles will have parallax properties', 'gutenbooster' ),
         'section' => 'page_banner',
         'default' => 0,
         'active_callback' => array(
           array(
             'setting'  => 'page_banner_bg',
             'operator' => '!==',
             'value'    => '',
           ),
           array(
             'setting'  => 'enable_page_banner',
             'operator' => '==',
             'value'    => true,
           ),
         ),
       ),
       'enable_page_banner_animate'	=> array(

         'type'    => 'toggle',
         'label'   => esc_html__( 'Animate on Load?', 'gutenbooster' ),
         'description' => esc_html__( 'Displays a background zoom in and title animation on page load', 'gutenbooster' ),
         'section' => 'page_banner',
         'default' => 0,
         'active_callback' => array(
         // 	array(
         // 		'setting'  => 'page_banner_bg',
         // 		'operator' => '!==',
         // 		'value'    => '',
         // 	),
           array(
             'setting'  => 'enable_page_banner',
             'operator' => '==',
             'value'    => true,
           ),
         ),
       ),
 );
 return $fields;
}