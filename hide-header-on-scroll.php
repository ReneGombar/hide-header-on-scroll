<?php

/**
 * Plugin Name:         Hide Header On Scroll
 * Plugin URI:          https://renegombar.com/wordpress/plugin
 * Description:         Default settings work with OceanWP theme, but can be used with other themes. Plugin makes the header fade in/out at a specified amount of scroll value. By default the plugin uses OceanWP's Theme header id and main-div id, but it can be set up for any Theme that uses a header element and main-content element. Plugin does not support top bar! To access the Plugin Settings open Admin Bar > Settings > Hide Header Plugin.
 * Version:             1.0.0
 * Author:              Rene Gombar
 * Author URI:          https://renegombar.com
 * Requires at least:   5.6
 * Tested up to:        6.2.2
 * Text Domain:         hideonscroll
 * License:             GPLv2
 */

 //Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define ('HIDE_HEADER_PLUGIN_URL',plugin_dir_url( __FILE__));
define ('HIDE_HEADER_PLUGIN_BASENAME',plugin_basename( __FILE__));
define ('HIDE_HEADER_PLUGIN_PATH', plugin_dir_path(__FILE__) );
define ('HIDE_HEADER_PLUGIN_FOLDER', __FILE__ );


// register plugin activation and deactivation functions
include ( HIDE_HEADER_PLUGIN_PATH .  'includes/hide-header-on-scroll-activation-deactivation.php');

// add the plugin link into the admin panel
include ( HIDE_HEADER_PLUGIN_PATH .  'includes/hide-header-on-scroll-menus.php');

//enqueue scripts
include ( HIDE_HEADER_PLUGIN_PATH .  'includes/hide-header-on-scroll-scripts.php');

//enqueue styles
include ( HIDE_HEADER_PLUGIN_PATH .  'includes/hide-header-on-scroll-styles.php');

// add a settings link to the plugin when it is activated on General Plugins Page
include ( HIDE_HEADER_PLUGIN_PATH .  'includes/hide-header-on-scroll-settings.php');

//setup settings fields
include( HIDE_HEADER_PLUGIN_PATH . 'includes/hide-header-on-scroll-fields.php');


/* add ajax hook 
function my_ajax_handler(){
	$options = get_option('hide_header_on_scroll_option');
	wp_send_json_success( $options );
};

add_action( 'wp_ajax_get_data', 'my_ajax_handler' );		//hook for logged in user
add_action( 'wp_ajax_nopriv_get_data', 'my_ajax_handler' );	//hook for user that is not logged in
*/