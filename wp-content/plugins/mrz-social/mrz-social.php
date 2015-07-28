<?php
/*
Plugin Name:  MRZ Social
Plugin URI:   http://michal.zalecki.pl
Description:  Friendly social links plugin.
Version:      1.1.0
Author:       Michał Załęcki
Author URI:   http://michal.zalecki.pl
*/

// If this file not called from WordPress, then exit
if ( ! defined( 'WPINC' ) ) {
	exit();
}

/**
 * Load MRZ Social textdomain
 *
 * @since 0.0.1
 */
function mrz_social_textdomain() {

  	load_plugin_textdomain( 'mrz_social', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

}

add_action('plugins_loaded', 'mrz_social_textdomain');

/**
 * Include options
 */
require_once('includes/options.php');

/**
 * Include MRZ_Social_Icons_Widget
 */
require_once('includes/social-counter-class.php');

/**
 * Include MRZ_Social_Icons_Widget
 */

require_once('includes/social-icons-widget.php');

/**
 * Include MRZ_Social_Icons_Widget
 */
require_once('includes/social-counter-widget.php');

/**
 * Register widgets.
 *
 * @since 0.0.1
 */
function mrz_social_widget_init() {

	register_widget('MRZ_Social_Icons_Widget');
	register_widget('MRZ_Social_Counter_Widget');

}
add_action( 'widgets_init', 'mrz_social_widget_init' );

?>
