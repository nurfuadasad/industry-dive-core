<?php
/**
 * Theme Post Search Widget
 * @package Yotta
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('yotta_post_search_widget', array(
        'title' => esc_html__('Yotta Post Search', 'yotta-core'),
        'classname' => 'widget_search',
        'description' => esc_html__('Display about me widget', 'yotta-core'),
        'fields' => array(
            array(
                'id' => 'title',
                'type' => 'text',
                'title' => esc_html__('Title', 'flycore-core'),
            ),
        )
    ));


    if (!function_exists('yotta_post_search_widget')) {
        function yotta_post_search_widget($args, $instance)
        {

            echo $args['before_widget'];
            $title = $instance['title'] ?? '';

            ?>
                <h4 class="widget-headline"><?php echo esc_html($title); ?></h4>
                <form role="search" action="<?php echo esc_url(home_url('/')) ?>" method="get"
                      class="search-form">
                    <div class="post-inside-wrapper">
                        <div class="form-group">
                            <input class="form-control" type="text" name="s" placeholder="<?php echo esc_html__('Search here','yotta-core')?>">
                            <input type="hidden" name="post_type" value="post">
                        </div>
                        <button type="submit" class="submit-btn">
                         <i class="fas fa-search"></i>
                        </button>
                    </div>
                </form>

            <?php
            echo $args['after_widget'];
        }
    }
}
?>