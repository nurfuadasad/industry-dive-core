<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Post_Image extends Widget_Base
{

    public function get_name()
    {
        return 'power_site_builder_post_featured_image';
    }

    public function get_title()
    {
        return esc_html__('Post Featured Image', 'yotta-core');
    }

    public function get_icon()
    {
        return 'eicon-button';
    }

    public function show_in_panel()
    {
        return 'page' != get_post_type();
    }

    public function get_categories()
    {
        return ['yotta_widgets'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'psb_section_post_featured_image_section',
            [
                'label' => esc_html__('Post Featured Image', 'yotta-core'),
            ]
        );
        $this->add_control(
            'psb_post_featured_image_fallback',
            [
                'label' => esc_html__('Fallback Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => '',
                ],
            ]
        );
        $this->add_control(
            'psb_post_featured_image',
            [
                'label' => esc_html__('Image', 'yotta-core'),
                'type' => Controls_Manager::HIDDEN,
                'default' => [
                    'url' => get_the_post_thumbnail_url(get_the_ID()),
                    'id' => get_post_thumbnail_id(get_the_ID()),
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Image_Size::get_type(),
            [
                'name' => 'psb_post_featured_image_size',
                'default' => 'full',
                'separator' => 'none',
            ]
        );
        $this->add_responsive_control(
            'psb_post_featured_image_align',
            [
                'label' => esc_html__('Alignment', 'yotta-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'yotta-core'),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'yotta-core'),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'yotta-core'),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'default' => '',
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        extract($settings);
        $image_html = $psb_post_featured_image['url'] != '' ?
            Group_Control_Image_Size::get_attachment_image_html($settings, 'psb_post_featured_image_size', 'psb_post_featured_image') :
            Group_Control_Image_Size::get_attachment_image_html($settings, 'psb_post_featured_image_size', 'psb_post_featured_image_fallback');;
        echo '<div class="power-post-featured-image">
				' .$image_html. '
			</div>';

    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Post_Image());