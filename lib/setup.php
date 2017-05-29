<?php

/**
  * Description
  *
  * @package	CarlesGoodvalley\Developer
  * @since		1.0.0.
  * @author		Carles Goodvalley
  * @link		https://cameraski.com
  * @license	GNU General Public License 2.0+
  */

namespace CarlesGoodvalley\Developer;

add_action( 'genesis_setup', __NAMESPACE__ . '\setup_child_theme', 15 );
/**
  * Set up Child Theme.
  * 
  * @since 1.0.0
  * 
  * @return void
  */
function setup_child_theme() {
	
	//* Set Localization (do not remove)
	load_child_theme_textdomain( CHILD_TEXT_DOMAIN, apply_filters( 'child_theme_textdomain', CHILD_THEME_DIR . '/languages', CHILD_TEXT_DOMAIN ) );
	
	unregister_genesis_callbacks();
	
	adds_theme_supports();
	adds_new_image_sizes();
	
}

/**
  * Unregister Genesis callbacks. We do this here because the Child Theme loads before Genesis.
  *
  * @since	1.0.0
  *
  * @return	void
  */
function unregister_genesis_callbacks() {
	//unregister_menu_callbacks();
	// unregister_header_callbacks();
	// unregister_footer_callbacks();
	// add each of the unregister structure callbacks here.
}



/**
  * Adds Theme supports to the Site.
  * 
  * @since 1.0.0
  * 
  * @return void
  */
function adds_theme_supports() {
	
	//* Add HTML5 markup structure
	add_theme_support( 'html5', array( 'caption', 'comment-form', 'comment-list', 'gallery', 'search-form' ) );

	//* Add Accessibility support
	add_theme_support( 'genesis-accessibility', array( '404-page', 'drop-down-menu', 'headings', 'rems', 'search-form', 'skip-links' ) );

	//* Add viewport meta tag for mobile browsers
	add_theme_support( 'genesis-responsive-viewport' );

	//* Add support for custom header
	add_theme_support( 'custom-header', array(
		'width'           => 600,
		'height'          => 160,
		'header-selector' => '.site-title a',
		'header-text'     => false,
		'flex-height'     => true,
	) );

	//* Add support for custom background
	add_theme_support( 'custom-background' );

	//* Add support for after entry widget
	add_theme_support( 'genesis-after-entry-widget-area' );

	//* Add support for 3-column footer widgets
	add_theme_support( 'genesis-footer-widgets', 3 );

	//* Rename primary and secondary navigation menus
	add_theme_support( 'genesis-menus' , array(
		'primary' => __( 'After Header Menu', CHILD_TEXT_DOMAIN ),
		'secondary' => __( 'Footer Menu', CHILD_TEXT_DOMAIN )
	) );
	
}

/**
  * Adds new Image sizes.
  * 
  * @since 1.0.0
  * 
  * @return void
  */
function adds_new_image_sizes() {
	
	add_image_size( 'featured-image', 720, 400, TRUE );
	
}

add_filter( 'genesis_theme_settings_defaults', __NAMESPACE__ . '\set_theme_settings_defaults' );
/**
  * Sets the Theme settings defaults.
  *
  * @since	1.0.0
  *
  * @param	array $defaults
  *
  * @return	array
  */
function set_theme_settings_defaults( array $defaults ) {
	
	$config 	= get_theme_settings_defaults();
	$defaults 	= wp_parse_args( $config, $defaults );
	
	return $defaults;
	
}

add_action( 'after_switch_theme', __NAMESPACE__ . '\update_theme_settings_defaults' );
/**
  * Sets the Theme setting defaults.
  *
  * @since	1.0.0
  *
  * @return	void
  */
function update_theme_settings_defaults() {
	
	$config = get_theme_settings_defaults();
	
	if ( function_exists( 'genesis_update_settings' ) ) {
		genesis_update_settings( $config );
	} 

	update_option( 'posts_per_page', $config['blog_cat_num'] );
	
}
/**
  * Get the Theme settings defaults.
  *
  * @since	1.0.0
  *
  * @return	array
  */
function get_theme_settings_defaults() {
	
	return array(
		'blog_cat_num'              => 6,	
		'content_archive'           => 'full',
		'content_archive_limit'     => 0,
		'content_archive_thumbnail' => 0,
		'posts_nav'                 => 'numeric',
		'site_layout'               => 'content-sidebar',
	);
	
}

