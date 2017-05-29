<?php
/**
 * Description
 *
 * @package KnowTheCode\Developer
 * @since   1.0.0
 * @author  Carles Goodvalley
 * @link    cameraski.com
 * license  GNU General Public License 2.0+
 */

namespace KnowTheCode\Developer\Lib\Structure;

/* CARLES - 01-17 */
/**
  * Unregister Menu callbacks
  *
  * @since	1.0.0
  *
  * @return	void
  */
  function unregister_menu_callbacks() {
	  remove_action( 'genesis_after_header', 'genesis_do_subnav' );
  }
/* /CARLES - 01-17 */

//* Reposition the secondary navigation menu
remove_action( 'genesis_after_header', 'genesis_do_subnav' );
add_action( 'genesis_footer', 'genesis_do_subnav', 5 );

add_filter( 'wp_nav_menu_args', __NAMESPACE__ . '\setup_secondary_menu_args' );
/**
  * Reduce the Secondary Navigation Menu to one level depth.
  *
  * @since	1.0.0
  *
  * @param	array $args
  *
  * @return	array
  */
function setup_secondary_menu_args( array $args ) {

	if ( 'secondary' != $args['theme_location'] ) {
		return $args;
	}

	$args['depth'] = 1;

	return $args;

}