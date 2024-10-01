<?php

add_action( 'customize_register', function( WP_Customize_Manager $wp_customize ){
    $wp_customize -> add_section('wooeshop-settings', array(
        'title' => __('wooeshop-settings', 'wooeshop')
        
    ));
    // phone
	$wp_customize->add_setting( 'wooeshop_phone' );
	$wp_customize->add_control( 'wooeshop_phone', array(
		'label' => __( 'Phone in header', 'wooeshop' ),
		'section' => 'wooeshop-settings',
	) );
} );


function wooeshop_theme_options() {
	return array(
		'phone' => get_theme_mod( 'wooeshop_phone' ),
	);
}