<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Single_Skill_Item_Widget extends Widget_Base
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
        return 'yotta-skill-item-widget';
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
        return esc_html__('Skill Item: 01', 'yotta-core');
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
        return 'eicon-post-slider';
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
            'title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'default' => esc_html__('TRAINING EXPERIENCE', 'yotta-core')
            ]
        );
        $this->add_control(
            'number',
            [
                'label' => esc_html__('Count Number', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter number.', 'yotta-core'),
                'default' => esc_html__('60', 'yotta-core')
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter text.', 'yotta-core'),
                'default' => esc_html__('Driving is a skill many of us desire but do not possess..', 'yotta-core')
            ]
        );
        $this->add_control(
            'text_align',
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
                'default' => 'center',
                'toggle' => true,
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_nav_style_tabs'
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
                    '{{WRAPPER}} .choose-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Border', 'yotta-core'),
                'selector' => '{{WRAPPER}} .choose-item',
            ]
        );
        $this->add_control(
            'background_border_radius',
            [
                'label' => esc_html__('Box Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .choose-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background_color',
                'label' => esc_html__('Background Image', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .choose-item',
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .choose-item .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control(
            'title_margin_top',
            [
                'label' => esc_html__('Title Margin Top', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .choose-item .title' => 'margin-top: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_margin_bottom',
            [
                'label' => esc_html__('Title Margin Bottom', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%', 'em'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .choose-item .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('number_title_color', [
            'label' => esc_html__('Number Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .choose-item .chart span" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();


        $this->start_controls_tab(
            'slider_navigation_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'yotta-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'yotta-core'),
                'selector' => '{{WRAPPER}} .choose-item:hover',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border_hover',
                'label' => esc_html__('Border', 'yotta-core'),
                'selector' => '{{WRAPPER}} .choose-item:hover',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'yotta-core'),
                'selector' => '{{WRAPPER}} .choose-item .title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'count_typography',
                'label' => esc_html__('Number Typography', 'yotta-core'),
                'selector' => '{{WRAPPER}} .choose-item .chart span',
            ]
        );
        $this->end_controls_section();

    }

    /**
     * Render Elementor widget output on the frontend.
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function render()
    {
        $settings = $this->get_settings_for_display();

        ?>
        <div class="choose-item" style="text-align:<?php echo $settings['text_align']; ?>">
            <div class="chart" data-percent="<?php echo esc_attr($settings['number']); ?>">
                <span><?php echo esc_attr($settings['number']); ?>%</span></div>
            <h3 class="title"><?php echo esc_html($settings['title']) ?></h3>
            <?php
            if (!empty($settings['description'])) {
                printf('<p>%1$s</p>', esc_html($settings['description']));
            } ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Single_Skill_Item_Widget());