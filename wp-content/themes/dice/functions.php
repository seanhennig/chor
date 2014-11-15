<?php
# Actions
add_action( 'wp_enqueue_scripts', 'dice_styles' );
add_action( 'after_setup_theme', 'dice_after_theme' );
add_action( 'widgets_init', 'dice_widgets' );
add_action('customize_register', 'dice_theme_customizer');

# Filter
add_filter('wp_title', 'dice_filter_wp_title');

function dice_styles() {
	wp_register_style( 'dice-dash', get_stylesheet_uri(), array('dashicons'), '1.0' );
	wp_register_style( 'dice-google-font', '//fonts.googleapis.com/css?family=Archivo+Narrow:400,400italic,700,700italic|Roboto+Slab:400,100,300,700' );

	wp_register_script( 'dice-mobile-menu', get_template_directory_uri() . '/assets/scripts/mobile-menu.js', array('jquery') );

	wp_enqueue_style( 'dice-dash' );
	wp_enqueue_style( 'dice-google-font' );

	wp_enqueue_script( "dice-mobile-menu" );

	if ( is_singular() )
		wp_enqueue_script( "comment-reply" );
}

function dice_after_theme() {
	global $content_width;

	add_theme_support( 'post-thumbnails' );
	add_theme_support('automatic-feed-links');
	register_nav_menus( array(
		'primary_menu' => 'Primary menu',
	) );

	if ( ! isset( $content_width ) ) $content_width = 660;
}

function dice_widgets() {
	register_sidebar( array(
		'id'          => 'primary-sidebars',
		'name'        => 'Primary sidebar',
		'description' => 'This sidebar is located above the age logo.',
	) );
}

function dice_filter_wp_title( $title ) {
	global $page, $paged;

	if ( is_feed() )
		return $title;

	$site_name = get_bloginfo( 'name' );
	$site_description = get_bloginfo( 'description' );

	$filtered_title = $title . get_bloginfo( 'name' );
	if( is_archive() ) {
		$the_title[] = $title;
		if( 2 <= $paged || 2 <= $page ) {
			$the_title[] = ' - ' . sprintf( _x('Page', 'post type singular name') . ' %s', max( $paged, $page ) );
		}
		if( ! empty( $site_name ) ) {
			$the_title[] = ' - ' . $site_name;
		}
	} elseif( is_home() ) {
		if( ! empty( $site_name ) ) {
			$the_title[] = $site_name;
		}

		if( ! empty( $site_description ) ) {
			$the_title[] = ' - ' . $site_description;
		}

		if( 2 <= $paged || 2 <= $page ) {
			$the_title[] = ' - ' . sprintf( _x('Page', 'post type singular name') . ' %s', max( $paged, $page ) );
		}
	} elseif( is_singular() ) {
		$the_title[] = $title;
		if( ! empty( $site_name ) ) {
			$the_title[] = ' - ' . $site_name;
		}
	} else {
		$the_title[] = $title;
	}
	$filtered_title = implode($the_title);

	return $filtered_title;
}

function dice_theme_customizer( $wp_customize ) {
	$wp_customize->add_section( 'dice_logo_section' , array(
		'title'       => __( 'Logo', 'dice' ),
		'priority'    => 30,
		'description' => 'Upload a logo to replace the default site name and description in the header',
	) );
	$wp_customize->add_setting( 'dice_logo' );
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize, 'dice_logo', array(
				'label'    => __( 'Logo', 'dice' ),
				'section'  => 'dice_logo_section',
				'settings' => 'dice_logo',
			)
		)
	);
}