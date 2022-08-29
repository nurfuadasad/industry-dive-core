<?php
/**
 *  yotta nav menu widget
 * @package Yotta
 * @since 1.0.0
 */
if (!defined('ABSPATH')) {
    exit(); //exit if access directly
}

class Yotta_Widget_Nav_Menu extends WP_Widget
{
    public function __construct()
    {
        parent::__construct(
            'yotta_nav_menu',
            esc_html__('Yotta Nav Menu', 'yotta-core'),
            array('description' => esc_html__('Display Nav Menu', 'yotta-core'))
        );
    }

    public function form($instance)
    {
        $title = $instance['title'] ?? '';
        $menu = $instance['menu'] ?? '';
        $menu_option = yotta_core()->get_nav_menu_list('id');

        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>"><?php esc_html_e('Title:', 'yotta-core'); ?></label>
            <input type="text" class="widefat" id="<?php echo esc_attr($this->get_field_id('title')) ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                   value="<?php echo esc_attr($title) ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('menu')) ?>"><?php esc_html_e('Navigation Menu', 'yotta-core'); ?></label>
            <select type="select" name="<?php echo esc_attr($this->get_field_name('menu')) ?>" class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('menu')) ?>">
                <?php foreach ($menu_option as $menu_id => $menu_name) :
                    $selected = $menu == $menu_id ? 'selected' : '';
                    ?>
                    <option value="<?php echo esc_attr($menu_id) ?>" <?php echo esc_attr($selected); ?>><?php echo esc_attr($menu_name) ?></option>
                <?php
                endforeach;
                ?>
            </select>
        </p>

        <?php

    }

    public function widget($args, $instance)
    {
        $title = $instance['title'] ?: '';
        $menu = $instance['menu'] ?: '';
        echo wp_kses_post($args['before_widget']);
        ?>
        <div class="footer-widget widget footer-menu-item">
            <div class="footer-title">
                <h4 class="widget-headline">
                    <?php
                    $title_span = str_replace(['{c}', '{/c}', '\n'], ['<span>', '</span>', '<br/>'], $title);
                    print wp_kses($title_span, yotta_core()->kses_allowed_html());
                    ?>
                </h4>
            </div>
            <?php
            if (!empty($menu)) {
                $menu_args = [
                    'container_class' => 'navbar-collapse',
                    'menu_class' => 'navbar-nav',
                    'menu' => $menu
                ];
                wp_nav_menu($menu_args);
            }
            ?>
        </div>
        <?php
        echo wp_kses_post($args['after_widget']);
    }

    public function update($new_instance, $old_instance): array
    {
        $instance['title'] = sanitize_text_field($new_instance['title']);
        $instance['menu'] = sanitize_text_field($new_instance['menu']);

        return $instance;
    }
}

if (!function_exists('Yotta_Widget_Nav_Menu')) {
    function Yotta_Widget_Nav_Menu()
    {
        register_widget('Yotta_Widget_Nav_Menu');
    }

    add_action('widgets_init', 'Yotta_Widget_Nav_Menu');
}