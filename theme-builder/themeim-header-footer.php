<?php
/**
 * @package yotta header footer builder
 */

// define the main file 
define( 'YOTTA_HEAD_FILE_', __FILE__ );
define( 'PLUGIN_DIR', dirname(__FILE__).'/' );  

// controller page
include 'controller.php';

// load of controller files
// after theme switch
add_action( 'after_switch_theme', 'yotta_head_active' );
// when plugin active
register_activation_hook(__FILE__, 'yotta_head_active');


if ( ! function_exists('yotta_head_active') ) {
    function yotta_head_active(){
        $cpt_support = get_option( 'elementor_cpt_support', [ 'page', 'post', 'portfolio' ] );
        foreach ( $cpt_support as $cpt_slug ) {
            add_post_type_support( $cpt_slug, 'elementor' );
        }
        // add custom posttype
        if( !in_array('themeim-builder', $cpt_support) ){
            add_post_type_support( 'themeim-builder', 'elementor' );
            $cpt_support[] = 'themeim-builder';
            update_option('elementor_cpt_support', $cpt_support);
            flush_rewrite_rules();
        }

    }
}

if ( ! function_exists('yotta_kses_html') ) {
    function yotta_kses_html( $content = '') {
        return $content;
    }
}

// load plugin
add_action( 'plugins_loaded', function(){
	// load plugin instance
    \yottahead_\Dtdr_Controller::instance()->load();

    // load include
    \yottahead_\Includes\Dtdr_Load::_instance()->_init();

}, 10); 
require PLUGIN_DIR.'includes/templates/init.php';