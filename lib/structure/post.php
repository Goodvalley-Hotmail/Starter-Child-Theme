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

add_filter( 'genesis_author_box_gravatar_size', __NAMESPACE__ . '\setup_author_box_gravatar_size' );
/**
  * Modify size of the Gravatar in the author box.
  *
  * @since	1.0.0
  *
  * @param	$size
  *
  * @return	int
  */
function setup_author_box_gravatar_size( $size ) {

	return 90;

}