<?php
/**
 * Theme Social Share Widget
 * @package Yotta
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('yotta_social_share_widget', array(
        'title' => esc_html__('Yotta: Social Share', 'yotta-core'),
        'classname' => 'yotta-social-share-about',
        'description' => esc_html__('Display Social Share widget', 'yotta-core'),
        'fields' => array(
            array(
                'id' => 'heading',
                'type' => 'text',
                'title' => esc_html__('Enter Your Header Title', 'yotta-core'),
                'default' => esc_html__('Never Miss News', 'yotta-core')
            ),
            array(
                'id' => 'yotta-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'yotta-core'),
                'fields' => array(
                    array(
                        'id' => 'yotta-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'yotta-core'),
                        'default' => 'fab fa-facebook'
                    ),
                    array(
                        'id' => 'yotta-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Ulr', 'yotta-core'),
                        'default' => '#'
                    ),
                ),
            ),
        )
    ));


    if (!function_exists('yotta_social_share_widget')) {
        function yotta_social_share_widget($args, $instance)
        {

            echo $args['before_widget'];
            

            $heading_title = $instance['heading'] ?? '';
            $socialIcon = is_array($instance['yotta-social-icon-repeater']) && !empty($instance['yotta-social-icon-repeater']) ? $instance['yotta-social-icon-repeater'] : [];


            ?>
            <div class="social-share-widget">
                <h4 class="widget-headline"><?php echo esc_html($heading_title); ?></h4>
                <ul class="social-icon style-03">
                    <?php
                    foreach ($socialIcon as $icon) {
                        printf('<li><a href="%2$s"><i class="%1$s"></i></a></li>', esc_html($icon['yotta-social-icon']), esc_url($icon['yotta-social-text']));
                    };
                    ?>
                </ul>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>