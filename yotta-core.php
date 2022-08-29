<?php
/*
Plugin Name: Yotta Core
Plugin URI: https://themeforest.net/user/themeim/portfolio
Description: Plugin to contain short codes and custom post types of the Yotta theme.
Author: Themeim
Author URI: https://themeim.com/
Version: 1.0.0
Text Domain: yotta-core
*/


/**
 * If this file is called directly, abort.
 * @package yotta
 * @since 1.0.0
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}


/**
 * Plugin directory path
 * @package yotta
 * @since 1.0.0
 */
define( 'YOTTA_CORE_ROOT_PATH', plugin_dir_path( __FILE__ ) );
define( 'YOTTA_CORE_ROOT_URL', plugin_dir_url( __FILE__ ) );
define( 'YOTTA_CORE_SELF_PATH', 'yotta-core/yotta-core.php' );
define( 'YOTTA_CORE_VERSION', '1.0.0' );
define( 'YOTTA_CORE_INC', YOTTA_CORE_ROOT_PATH .'/inc');
define( 'YOTTA_CORE_LIB', YOTTA_CORE_ROOT_PATH .'/lib');
define( 'YOTTA_CORE_ELEMENTOR', YOTTA_CORE_ROOT_PATH .'/elementor');
define( 'YOTTA_CORE_DEMO_IMPORT', YOTTA_CORE_ROOT_PATH .'/demo-import');
define( 'YOTTA_CORE_ADMIN', YOTTA_CORE_ROOT_PATH .'/admin');
define( 'YOTTA_CORE_ADMIN_ASSETS', YOTTA_CORE_ROOT_URL .'admin/assets');
define( 'YOTTA_CORE_WP_WIDGETS', YOTTA_CORE_ROOT_PATH .'/wp-widgets');
define( 'YOTTA_CORE_ASSETS', YOTTA_CORE_ROOT_URL .'assets/');
define( 'YOTTA_CORE_CSS', YOTTA_CORE_ASSETS .'css');
define( 'YOTTA_CORE_JS', YOTTA_CORE_ASSETS .'js');
define( 'YOTTA_CORE_IMG', YOTTA_CORE_ASSETS .'img');

//require_once __DIR__. "/themeim-header-footer-builder/droit-header-footer.php";

/**
 * Load additional helpers functions
 * @package yotta
 * @since 1.0.0
 */
if (!function_exists('yotta_core')){
	require_once YOTTA_CORE_INC .'/theme-core-helper-functions.php';
	if (!function_exists('yotta_core')){
		function yotta_core(){
			return class_exists('Yotta_Core_Helper_Functions') ? new Yotta_Core_Helper_Functions() : false;
		}
	}
}
//ob flash
remove_action( 'shutdown', 'wp_ob_end_flush_all', 1 );


/**
 * Load Codestar Framework Functions
 * @package yotta
 * @since 1.0.0
 */
if ( !yotta_core()->is_yotta_active()) {
	if ( file_exists( YOTTA_CORE_ROOT_PATH . '/inc/csf-functions.php' ) ) {
		require_once YOTTA_CORE_ROOT_PATH . '/inc/csf-functions.php';
	}
}

/**
 * Header Footer Init
 * @package yotta
 * @since 1.0.0
 */

if ( file_exists( YOTTA_CORE_ROOT_PATH . '/theme-builder/themeim-header-footer.php' ) ) {
    require_once YOTTA_CORE_ROOT_PATH . '/theme-builder/themeim-header-footer.php';
}




/**
 * Core Plugin Init
 * @package yotta
 * @since 1.0.0
 */
if ( file_exists( YOTTA_CORE_ROOT_PATH . '/inc/theme-core-init.php' ) ) {
	require_once YOTTA_CORE_ROOT_PATH . '/inc/theme-core-init.php';
}
