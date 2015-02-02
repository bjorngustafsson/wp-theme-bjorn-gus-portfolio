<?php
/**
 * Jetpack Compatibility File
 * See: http://jetpack.me/
 *
 * @package bjorn-gus-portfolio
 */

/**
 * Add theme support for Infinite Scroll.
 * See: http://jetpack.me/support/infinite-scroll/
 */
function bjorn_gus_portfolio_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'bjorn_gus_portfolio_jetpack_setup' );
