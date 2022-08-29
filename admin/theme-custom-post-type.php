<?php
/**
 * Theme Custom Post Type(CPTs)
 * @package Yotta
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

if (!class_exists('Yotta_Custom_Post_Type')) {
    class Yotta_Custom_Post_Type
    {

        //$instance variable
        private static $instance;

        public function __construct()
        {
            //register post type
            add_action('init', array($this, 'register_custom_post_type'));
        }

        /**
         * get Instance
         * @since  2.0.0
         */
        public static function getInstance()
        {
            if (null == self::$instance) {
                self::$instance = new self();
            }

            return self::$instance;
        }

        /**
         * Register Custom Post Type
         * @since  2.0.0
         */
        public function register_custom_post_type()
        {
            if (!defined('ELEMENTOR_VERSION')) {
                return;
            }
            $all_post_type = array(
                [
                    'post_type' => 'service',
                    'args' => array(
                        'label' => esc_html__('Service', 'yotta-core'),
                        'description' => esc_html__('Service', 'yotta-core'),
                        'labels' => array(
                            'name' => esc_html_x('Service', 'Post Type General Name', 'yotta-core'),
                            'singular_name' => esc_html_x('Service', 'Post Type Singular Name', 'yotta-core'),
                            'menu_name' => esc_html__('Service', 'yotta-core'),
                            'all_items' => esc_html__('Services', 'yotta-core'),
                            'view_item' => esc_html__('View Service', 'yotta-core'),
                            'add_new_item' => esc_html__('Add New Service', 'yotta-core'),
                            'add_new' => esc_html__('Add New Service', 'yotta-core'),
                            'edit_item' => esc_html__('Edit Service', 'yotta-core'),
                            'update_item' => esc_html__('Update Service', 'yotta-core'),
                            'search_items' => esc_html__('Search Service', 'yotta-core'),
                            'not_found' => esc_html__('Not Found', 'yotta-core'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'yotta-core'),
                            'featured_image' => esc_html__('Service Image', 'yotta-core'),
                            'remove_featured_image' => esc_html__('Remove Service Image', 'yotta-core'),
                            'set_featured_image' => esc_html__('Set Service Image', 'yotta-core'),
                        ),
                        'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
                        'hierarchical' => false,
                        'public' => true,
                        "publicly_queryable" => true,
                        'show_ui' => true,
                        'show_in_menu' => 'yotta_theme_options',
                        "rewrite" => array('slug' => 'all-service', 'with_front' => true),
                        'can_export' => true,
                        'capability_type' => 'post',
                        "show_in_rest" => true,
                        'query_var' => true
                    )
                ],
                [
                    'post_type' => 'training',
                    'args' => array(
                        'label' => esc_html__('Training', 'yotta-core'),
                        'description' => esc_html__('Training', 'yotta-core'),
                        'labels' => array(
                            'name' => esc_html_x('Training', 'Post Type General Name', 'yotta-core'),
                            'singular_name' => esc_html_x('Training', 'Post Type Singular Name', 'yotta-core'),
                            'menu_name' => esc_html__('Training', 'yotta-core'),
                            'all_items' => esc_html__('Training', 'yotta-core'),
                            'view_item' => esc_html__('View Training', 'yotta-core'),
                            'add_new_item' => esc_html__('Add New Training', 'yotta-core'),
                            'add_new' => esc_html__('Add New Training', 'yotta-core'),
                            'edit_item' => esc_html__('Edit Training', 'yotta-core'),
                            'update_item' => esc_html__('Update Training', 'yotta-core'),
                            'search_items' => esc_html__('Search Training', 'yotta-core'),
                            'not_found' => esc_html__('Not Found', 'yotta-core'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'yotta-core'),
                            'featured_image' => esc_html__('Training Image', 'yotta-core'),
                            'remove_featured_image' => esc_html__('Remove Training Image', 'yotta-core'),
                            'set_featured_image' => esc_html__('Set Training Image', 'yotta-core'),
                        ),
                        'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
                        'hierarchical' => false,
                        'public' => true,
                        "publicly_queryable" => true,
                        'show_ui' => true,
                        'show_in_menu' => 'yotta_theme_options',
                        "rewrite" => array('slug' => 'all-training', 'with_front' => true),
                        'can_export' => true,
                        'capability_type' => 'post',
                        "show_in_rest" => true,
                        'query_var' => true
                    )
                ],
                [
                    'post_type' => 'team',
                    'args' => array(
                        'label' => esc_html__('team', 'yotta-core'),
                        'description' => esc_html__('team', 'yotta-core'),
                        'labels' => array(
                            'name' => esc_html_x('Team', 'Post Type General Name', 'yotta-core'),
                            'singular_name' => esc_html_x('Team', 'Post Type Singular Name', 'yotta-core'),
                            'menu_name' => esc_html__('Teams', 'yotta-core'),
                            'all_items' => esc_html__('Teams', 'yotta-core'),
                            'view_item' => esc_html__('View Teams', 'yotta-core'),
                            'add_new_item' => esc_html__('Add New Team Member', 'yotta-core'),
                            'add_new' => esc_html__('Add New Team Member', 'yotta-core'),
                            'edit_item' => esc_html__('Edit Team', 'yotta-core'),
                            'update_item' => esc_html__('Update Team', 'yotta-core'),
                            'search_items' => esc_html__('Search Team', 'yotta-core'),
                            'not_found' => esc_html__('Not Found', 'yotta-core'),
                            'not_found_in_trash' => esc_html__('Not found in Trash', 'yotta-core'),
                            'featured_image' => esc_html__('Team Image', 'yotta-core'),
                            'remove_featured_image' => esc_html__('Remove Team Image', 'yotta-core'),
                            'set_featured_image' => esc_html__('Set Team Image', 'yotta-core'),
                        ),
                        'supports' => array('title', 'thumbnail', 'excerpt', 'editor', 'comments'),
                        'hierarchical' => false,
                        'public' => true,
                        "publicly_queryable" => true,
                        'show_ui' => true,
                        'show_in_menu' => 'yotta_theme_options',
                        "rewrite" => array('slug' => 'all-team', 'with_front' => true),
                        'can_export' => true,
                        'capability_type' => 'post',
                        "show_in_rest" => true,
                        'query_var' => true
                    )
                ]
            );

            if (!empty($all_post_type) && is_array($all_post_type)) {

                foreach ($all_post_type as $post_type) {
                    call_user_func_array('register_post_type', $post_type);
                }
            }


            /**
             * Custom Taxonomy Register
             * @since 1.0.0
             */

            $all_custom_taxonmy = array(
                array(
                    'taxonomy' => 'service-cat',
                    'object_type' => 'service',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Service Category", 'yotta-core'),
                            "singular_name" => esc_html__("Service Category", 'yotta-core'),
                            "menu_name" => esc_html__("Service Category", 'yotta-core'),
                            "all_items" => esc_html__("All Service Category", 'yotta-core'),
                            "add_new_item" => esc_html__("Add New Service Category", 'yotta-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'service-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'training-cat',
                    'object_type' => 'training',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Training Category", 'yotta-core'),
                            "singular_name" => esc_html__("Training Category", 'yotta-core'),
                            "menu_name" => esc_html__("Training Category", 'yotta-core'),
                            "all_items" => esc_html__("All Training Category", 'yotta-core'),
                            "add_new_item" => esc_html__("Add New Training Category", 'yotta-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'training-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                ),
                array(
                    'taxonomy' => 'team-cat',
                    'object_type' => 'team',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Team Category", 'yotta-core'),
                            "singular_name" => esc_html__("Team Category", 'yotta-core'),
                            "menu_name" => esc_html__("Team Category", 'yotta-core'),
                            "all_items" => esc_html__("All Team Category", 'yotta-core'),
                            "add_new_item" => esc_html__("Add New Team Category", 'yotta-core')
                        ),
                        "public" => true,
                        "hierarchical" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'team-cat', 'with_front' => true),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                    )
                )
            );

            if (is_array($all_custom_taxonmy) && !empty($all_custom_taxonmy)) {
                foreach ($all_custom_taxonmy as $taxonomy) {
                    call_user_func_array('register_taxonomy', $taxonomy);
                }
            }


            /**
             * Custom Tags Register
             * @since 1.0.0
             */

            $all_custom_tags = array(
                array(
                    'taxonomy' => 'service-tag',
                    'object_type' => 'service',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Service Tag", 'yotta-core'),
                            "singular_name" => esc_html__("Service Tag", 'yotta-core'),
                            "menu_name" => esc_html__("Service Tag", 'yotta-core'),
                            "all_items" => esc_html__("All Service Tag", 'yotta-core'),
                            "add_new_item" => esc_html__("Add New Service Tag", 'yotta-core')
                        ),
                        "public" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'service-tag'),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                        'hierarchical' => false,
                        'update_count_callback' => '_update_post_term_count',
                    )
                ),
                array(
                    'taxonomy' => 'training-tag',
                    'object_type' => 'training',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Training Tag", 'yotta-core'),
                            "singular_name" => esc_html__("Training Tag", 'yotta-core'),
                            "menu_name" => esc_html__("Training Tag", 'yotta-core'),
                            "all_items" => esc_html__("All Training Tag", 'yotta-core'),
                            "add_new_item" => esc_html__("Add New Training Tag", 'yotta-core')
                        ),
                        "public" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'training-tag'),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                        'hierarchical' => false,
                        'update_count_callback' => '_update_post_term_count',
                    )
                ),
                array(
                    'taxonomy' => 'team-tag',
                    'object_type' => 'team',
                    'args' => array(
                        "labels" => array(
                            "name" => esc_html__("Team Tag", 'yotta-core'),
                            "singular_name" => esc_html__("Team Tag", 'yotta-core'),
                            "menu_name" => esc_html__("Team Tag", 'yotta-core'),
                            "all_items" => esc_html__("All Team Tag", 'yotta-core'),
                            "add_new_item" => esc_html__("Add New Team Tag", 'yotta-core')
                        ),
                        "public" => true,
                        "show_ui" => true,
                        "show_in_menu" => true,
                        "show_in_nav_menus" => true,
                        "query_var" => true,
                        "rewrite" => array('slug' => 'team-tag'),
                        "show_admin_column" => true,
                        "show_in_rest" => true,
                        "show_in_quick_edit" => true,
                        'hierarchical' => false,
                        'update_count_callback' => '_update_post_term_count',
                    )
                ),
            );

            if (is_array($all_custom_tags) && !empty($all_custom_tags)) {
                foreach ($all_custom_tags as $tags) {
                    call_user_func_array('register_taxonomy', $tags);
                }
            }


            flush_rewrite_rules();
            //add header/footer/megamenu builder support for elementor page builder
            if (defined('ELEMENTOR_VERSION')){
                $all_custom_ctp = array('yotta-foobuilder','yotta-hebuilder','yotta-mega-menu');
                $get_elementor_cpt_support = get_option('elementor_cpt_support');

                if (!empty($get_elementor_cpt_support) && !in_array($all_custom_ctp,$get_elementor_cpt_support)){
                    $get_elementor_cpt_support[] = 'yotta-foobuilder';
                    $get_elementor_cpt_support[] = 'yotta-hebuilder';
                    $get_elementor_cpt_support[] = 'yotta-mega-menu';
                    $get_elementor_cpt_support[] = 'post';
                    $get_elementor_cpt_support[] = 'page';
                    update_option( 'elementor_cpt_support',$get_elementor_cpt_support );
                }
            }
        }

        /**
         * set meta box value
         * @since 2.0.0
         * */
        public function add_meta_boxes_value(){
            global $post;
            $all_custom_ctp = array('yotta-foobuilder','yotta-hebuilder','yotta-mega-menu');

            if ( !in_array( $post->post_type, $all_custom_ctp ) ) {return;}
            if ( '' !== $post->page_template ) {return;}

            update_post_meta($post->ID, '_wp_page_template', 'elementor_canvas');
        }
    }//end class

    if (class_exists('Yotta_Custom_Post_Type')) {
        Yotta_Custom_Post_Type::getInstance();
    }
}