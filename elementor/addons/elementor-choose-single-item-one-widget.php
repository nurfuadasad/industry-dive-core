<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Choose_Single_Item_Widget extends Widget_Base
{

    /**
     * Get widget name.
     *
     * Retrieve Elementor widget name.
     *
     * @return string Widget name.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_name()
    {
        return 'yotta-choose-single-item-widget';
    }

    /**
     * Get widget title.
     *
     * Retrieve Elementor widget title.
     *
     * @return string Widget title.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_title()
    {
        return esc_html__('Choose Single Item', 'yotta-core');
    }

    /**
     * Get widget icon.
     *
     * Retrieve Elementor widget icon.
     *
     * @return string Widget icon.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_icon()
    {
        return 'eicon-image';
    }

    /**
     * Get widget categories.
     *
     * Retrieve the list of categories the Elementor widget belongs to.
     *
     * @return array Widget categories.
     * @since 1.0.0
     * @access public
     *
     */
    public function get_categories()
    {
        return ['yotta_widgets'];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control(
            'number_switch',
            [
                'label' => esc_html__('Number Switch', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show number.', 'yotta-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Number', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter sub title.', 'yotta-core'),
                'default' => esc_html__('01', 'yotta-core'),
                'condition' => array('number_switch' => 'yes')
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'default' => esc_html__('FREE CONSULTATION', 'yotta-core')
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter description.', 'yotta-core'),
                'default' => esc_html__("Fight School has specialized in martial arts since 1986 and has one of the most", 'yotta-core')
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter link', 'yotta-core'),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'background_hover_settings_section',
            [
                'label' => esc_html__('Background Hover Image Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'hover_background',
                'label' => esc_html__('Background Image', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .choose-single-item.bg-image',
            ]
        );

        $this->end_controls_section();


        $this->start_controls_section(
            'content_styling_section',
            [
                'label' => esc_html__('Content Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'yotta-core'),
            ]
        );
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feature-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'yotta-core'),
                'selector' => '{{WRAPPER}} .feature-item',
            ]
        );
        $this->add_control(
            'background_border_radius',
            [
                'label' => esc_html__('Box Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .feature-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__('Background Image', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .feature-item',
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'yotta-core'),
                'selector' => '{{WRAPPER}} .feature-item',
            ]
        );
        $this->add_control('normal_number_color', [
            'label' => esc_html__('Number Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'condition' => array('number_switch' => 'yes'),
            'selectors' => [
                "{{WRAPPER}} .feature-number span" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-icon" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_icon_border_color', [
            'label' => esc_html__('Icon Border Bottom Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content::before" => "background-color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_description_color', [
            'label' => esc_html__('Description Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content p" => "color: {{VALUE}};"
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'yotta-core'),
            ]
        );
        $this->add_control('hover_title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content:hover .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('hover_icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-item:hover .feature-icon" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('hover_normal_number_color', [
            'label' => esc_html__('Number Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-item:hover .feature-number span" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('hover_description_color', [
            'label' => esc_html__('Description Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .feature-content:hover p" => "color: {{VALUE}};"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .feature-content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'sub_title_typography',
            'label' => esc_html__('Number Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .feature-number span"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .feature-content p"
        ]);

        $this->end_controls_section();
    }

    /**
     * Render Elementor widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $this->add_render_attribute('image_box_link', 'class', '');
        if (!empty($settings['link']['url'])) {
            $this->add_link_attributes('image_box_link', $settings['link']);
        }
        ?>
        <div class="feature-item">
            <div class="feature-icon-area">
                <div class="feature-icon">
                   <?php
                   Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                   ?>
                </div>
                <div class="feature-number">
                    <span><?php echo esc_html($settings['subtitle']) ?></span>
                </div>
            </div>
            <div class="feature-content">
                <a <?php echo $this->get_render_attribute_string('image_box_link'); ?>><h4
                            class="title"><?php echo esc_html($settings['title']) ?></h4>
                </a>
                <p><?php echo esc_html($settings['description']) ?></p>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Choose_Single_Item_Widget());