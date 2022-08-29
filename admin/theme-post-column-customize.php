<?php
/**
 * Post Column Customize Custom Function
 * @package Yotta
 * @since 1.0.0
 */

if (!defined('ABSPATH')){
    exit(); //exit if access directly
}

if (!class_exists('Yotta_Post_Column_Customize')){
    class Yotta_Post_Column_Customize{
        //$instance variable
        private static $instance;

        public function __construct() {
            //event admin add table value hook
            add_filter("manage_edit-event_columns", array($this, "edit_event_columns") );
            add_action('manage_event_posts_custom_column', array($this, 'add_event_thumbnail_columns'), 10,2);
            //event category icon
            add_filter("manage_edit-event-cat_columns", array($this, "edit_event_cat_columns") );
            add_filter('manage_event-cat_custom_column', array($this, 'add_event_category_columns'), 13, 3);
            //training admin add table value hook
            add_filter("manage_edit-training_columns", array($this, "edit_training_columns") );
            add_action('manage_training_posts_custom_column', array($this, 'add_training_thumbnail_columns'), 20,4);
            //training category icon
            add_filter("manage_edit-training-cat_columns", array($this, "edit_training_cat_columns") );
            add_filter('manage_training-cat_custom_column', array($this, 'add_training_category_columns'), 23, 4);
            //team admin add table value hook
            add_filter("manage_edit-team_columns", array($this, "edit_team_columns") );
            add_action('manage_team_posts_custom_column', array($this, 'add_team_thumbnail_columns'), 20,4);
            //team category icon
            add_filter("manage_edit-team-cat_columns", array($this, "edit_team_cat_columns") );
            add_filter('manage_team-cat_custom_column', array($this, 'add_team_category_columns'), 23, 4);
        }

        /**
         * get Instance
         * @since 1.0.0
         */
        public static function getInstance(){
            if (null == self::$instance){
                self::$instance = new self();
            }
            return self::$instance;
        }


        /**
         * Edit event
         * @since 1.0.0
         */
        public function edit_event_columns($columns){

            $order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
            $cat_title = $columns['taxonomy-event-cat'];
            $tag_title = $columns['taxonomy-event-tag'];
            unset($columns);
            $columns['cb'] = '<input type="checkbox" />';
            $columns['title'] = esc_html__('Title','yotta-core');
            $columns['thumbnail'] = '<a href="edit.php?post_type=event&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','yotta-core').'</a>';
            $columns['taxonomy-event-cat'] = '<a href="edit.php?post_type=event&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
            $columns['taxonomy-event-tag'] = '<a href="edit.php?post_type=service&orderby=taxonomy&order='.urlencode($order).'">'.$tag_title.'<span class="sorting-indicator"></span></a>';
            $columns['icon'] = esc_html__('Icon','yotta-core');
            $columns['date'] = esc_html__('Date','yotta-core');
            return $columns;
        }

        /**
         * Add event thumbnail
         * @since 1.0.0
         */
        public function add_event_thumbnail_columns($column,$post_id) {
            switch ( $column ) {
                case 'thumbnail' :
                    echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
                    break;
                case 'icon' :
                    $event_meta_option = get_post_meta($post_id ,'yotta_event_options', true);
                    $event_icon = $event_meta_option['event_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($event_icon));
                    break;
                default:
                    break;
            }
        }

        /**
         * Event category column customize
         * @since 1.0.0
         */
        public function edit_event_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','yotta-core');
            return $columns;
        }

        /**
         * Event Category column add
         * @since 1.0.0
         */
        public function add_event_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'yotta_event_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

        /**
         * Edit training
         * @since 1.0.0
         */
        public function edit_training_columns($columns){

            $order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
            $cat_title = $columns['taxonomy-training-cat'];
            $tag_title = $columns['taxonomy-training-tag'];
            unset($columns);
            $columns['cb'] = '<input type="checkbox" />';
            $columns['title'] = esc_html__('Title','yotta-core');
            $columns['thumbnail'] = '<a href="edit.php?post_type=training&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','yotta-core').'</a>';
            $columns['taxonomy-training-cat'] = '<a href="edit.php?post_type=training&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
            $columns['taxonomy-training-tag'] = '<a href="edit.php?post_type=service&orderby=taxonomy&order='.urlencode($order).'">'.$tag_title.'<span class="sorting-indicator"></span></a>';
            $columns['icon'] = esc_html__('Icon','yotta-core');
            $columns['date'] = esc_html__('Date','yotta-core');
            return $columns;
        }

        /**
         * Add training thumbnail
         * @since 1.0.0
         */
        public function add_training_thumbnail_columns($column,$post_id) {
            switch ( $column ) {
                case 'thumbnail' :
                    echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
                    break;
                case 'icon' :
                    $training_meta_option = get_post_meta($post_id ,'yotta_training_options', true);
                    $training_icon = $training_meta_option['training_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($training_icon));
                    break;
                default:
                    break;
            }
        }

        /**
         * Training category column customize
         * @since 1.0.0
         */
        public function edit_training_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','yotta-core');
            return $columns;
        }

        /**
         * Training Category column add
         * @since 1.0.0
         */
        public function add_training_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'yotta_training_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

        /**
         * Edit team
         * @since 1.0.0
         */
        public function edit_team_columns($columns){

            $order = ( 'asc' == $_GET['order'] ) ? 'desc' : 'asc';
            $cat_title = $columns['taxonomy-team-cat'];
            $tag_title = $columns['taxonomy-team-tag'];
            unset($columns);
            $columns['cb'] = '<input type="checkbox" />';
            $columns['title'] = esc_html__('Title','yotta-core');
            $columns['thumbnail'] = '<a href="edit.php?post_type=team&orderby=title&order='.urlencode($order).'">'.esc_html__('Thumbnail','yotta-core').'</a>';
            $columns['taxonomy-team-cat'] = '<a href="edit.php?post_type=team&orderby=taxonomy&order='.urlencode($order).'">'.$cat_title.'<span class="sorting-indicator"></span></a>';
            $columns['taxonomy-team-tag'] = '<a href="edit.php?post_type=service&orderby=taxonomy&order='.urlencode($order).'">'.$tag_title.'<span class="sorting-indicator"></span></a>';
            $columns['icon'] = esc_html__('Icon','yotta-core');
            $columns['date'] = esc_html__('Date','yotta-core');
            return $columns;
        }

        /**
         * Add team thumbnail
         * @since 1.0.0
         */
        public function add_team_thumbnail_columns($column,$post_id) {
            switch ( $column ) {
                case 'thumbnail' :
                    echo '<a class="row-thumbnail" href="' . esc_url( admin_url( 'post.php?post=' . $post_id . '&amp;action=edit' ) ) . '">' . get_the_post_thumbnail( $post_id, 'thumbnail' ) . '</a>';
                    break;
                case 'icon' :
                    $team_meta_option = get_post_meta($post_id ,'yotta_team_options', true);
                    $team_icon = $team_meta_option['team_icon'];
                    printf('<i class="neaterller-font-size50 %s"></i>',esc_attr($team_icon));
                    break;
                default:
                    break;
            }
        }

        /**
         * Team category column customize
         * @since 1.0.0
         */
        public function edit_team_cat_columns($columns){
            $columns['icon'] = esc_html__('Icon','yotta-core');
            return $columns;
        }

        /**
         * Team Category column add
         * @since 1.0.0
         */
        public function add_team_category_columns($string,$columns,$post_id){
            $post_term_meta = get_term_meta($post_id,'yotta_team_category',true);
            $icon = isset($post_term_meta['icon']) ? $post_term_meta['icon'] : '';
            switch ( $columns ) {
                case 'icon' :
                    echo '<i class="neaterller-font-size50 '.$icon.'"></i>';
                    break;
                default:
                    break;
            }
        }

    }//end class
    if ( class_exists('Yotta_Post_Column_Customize')){
        Yotta_Post_Column_Customize::getInstance();
    }
}