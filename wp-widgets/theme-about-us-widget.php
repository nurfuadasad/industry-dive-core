<?php
/**
 * Theme About Us Widget
 * @package Yotta
 * @since 1.0.0
 */

if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}
// Control core classes for avoid errors
if (class_exists('CSF')) {


    // Create a About Widget
    CSF::createWidget('yotta_about_widget', array(
        'title' => esc_html__('Yotta: About Us', 'yotta-core'),
        'classname' => 'yotta-widget-about',
        'description' => esc_html__('Display about us widget', 'yotta-core'),
        'fields' => array(
            array(
                'id' => 'logo-area',
                'type' => 'media',
                'title' => esc_html__('Upload Your Photo', 'yotta-core'),
            ),
            array(
                'id' => 'description',
                'type' => 'textarea',
                'title' => esc_html__('Description', 'Yotta-core'),
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore.', 'yotta-core')
            ),

            array(
                'id' => 'yotta-footer-social-icon-repeater',
                'type' => 'repeater',
                'title' => esc_html__('Social Icon', 'yotta-core'),
                'fields' => array(

                    array(
                        'id' => 'yotta-footer-social-icon',
                        'type' => 'icon',
                        'title' => esc_html__('Icon', 'yotta-core'),
                        'default' => 'flaticon-call'
                    ),
                    array(
                        'id' => 'yotta-footer-social-text',
                        'type' => 'text',
                        'title' => esc_html__('Enter Your Url', 'yotta-core'),
                        'default' => esc_html__('#', 'yotta-core')
                    ),

                ),
            ),
        )
    ));


    if (!function_exists('yotta_about_widget')) {
        function yotta_about_widget($args, $instance)
        {

            echo $args['before_widget'];

            $logo = $instance['logo-area'];
            $img_id = $logo['id'] ?? '';
            $img_print = $img_id ? wp_get_attachment_image_src($img_id,'full')[0] : '';
            $alt_text = get_post_meta($img_id, '_wp_attachment_image_alt', true);
            $paragraph = $instance['description'] ?? '';
            $socialIcon = is_array($instance['yotta-footer-social-icon-repeater']) && !empty($instance['yotta-footer-social-icon-repeater']) ? $instance['yotta-footer-social-icon-repeater'] : [];


            ?>
            <div class="footer-widget widget">
                <div class="about_us_widget style-01">
                    <a href="<?php echo get_home_url(); ?>" class="footer-logo"><?php
                        if (!empty($img_print)) {
                            printf('<img src="%1$s" alt="%2$s"/>', esc_url($img_print), esc_attr($alt_text));
                        }
                        ?></a>
                    <p> <?php echo $paragraph; ?></p>
                    <ul class="contact_info_list">
                        <?php
                        foreach ($socialIcon as $icon) {
                            echo '<li class="single-info-item">
                            <div class="icon"><a href="'.$icon['yotta-footer-social-text'].'">
                                <i class="' . $icon['yotta-footer-social-icon'] . '"></i></a>
                            </div>
                        </li>';
                        };
                        ?>
                    </ul>
                </div>
            </div>

            <?php

            echo $args['after_widget'];

        }
    }

}

?>