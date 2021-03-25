<?php
/**
 * Law Theme Customizer
 *
 * @package Law
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function law_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'law_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'law_customize_partial_blogdescription',
			)
		);
	}

	$wp_customize->add_section(
		'law_contact',
		[
			'title'			=> __( 'Contact Us', 'law' ),
			'description'	=> __( 'List of Contacts', 'law' ),
			'priority'		=> 200,
		]
	);

	$setting = 'law_address';

	$wp_customize->add_setting(
		$setting,
		[
			'default'	=> 'No address',
			'transport'	=> 'refresh'
		]
	);

	$wp_customize->add_control(
		$setting,
		[
			'section'	=> 'law_contact',
			'label'		=> __( 'Address', 'law' ),
			'type'		=> 'text'
		]
	);

	$setting = 'law_phone';

	$wp_customize->add_setting(
		$setting,
		[
			'default'	=> 'No phone',
			'transport'	=> 'refresh'
		]
	);

	$wp_customize->add_control(
		$setting,
		[
			'section'	=> 'law_contact',
			'label'		=> __( 'Phone', 'law' ),
			'type'		=> 'text'
		]
	);

	$setting = 'law_email';

	$wp_customize->add_setting(
		$setting,
		[
			'default'	=> 'No email',
			'transport'	=> 'refresh'
		]
	);

	$wp_customize->add_control(
		$setting,
		[
			'section'	=> 'law_contact',
			'label'		=> __( 'Email', 'law' ),
			'type'		=> 'text'
		]
	);

	$setting = 'law_site';

	$wp_customize->add_setting(
		$setting,
		[
			'default'	=> 'No site',
			'transport'	=> 'refresh'
		]
	);

	$wp_customize->add_control(
		$setting,
		[
			'section'	=> 'law_contact',
			'label'		=> __( 'Site', 'law' ),
			'type'		=> 'text'
		]
	);

}
add_action( 'customize_register', 'law_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function law_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function law_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function law_customize_preview_js() {
	wp_enqueue_script( 'law-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'law_customize_preview_js' );
