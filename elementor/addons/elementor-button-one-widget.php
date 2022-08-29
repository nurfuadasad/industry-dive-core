<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Boxed_Button_Widget extends Widget_Base
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
        return 'boxed-button-widget';
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
        return esc_html__('Yotta : Button 01', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Button', 'Anchor', 'Click', "Themeim", 'Yotta'];
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
        return 'eicon-button';
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
    protected function register_controls ()
    {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__('General Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'btn_animation_color',
            [
                'label' => esc_html__('Button Animation', 'aapside-master'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('enable button white color.', 'appside-core'),
                'default' => 'no'
            ]
        );
        $this->add_control(
            'btn_custom_class',
            [
                'label' => esc_html__('Button Custom Class', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter custom button class.', 'yotta-core'),
                'condition' => [
                    'btn_animation_color' => 'yes'
                ]
            ]
        );
        $this->add_control(
            'btn_custom_css',
            [
                'label' => esc_html__('Custom Button CSS', 'aapside-master'),
                'type' => Controls_Manager::CODE,
                'description' => esc_html__('enable button white color.', 'appside-core'),
                'language' => 'css',
                'rows' => 20,
                'condition' => [
                    'btn_animation_color' => 'yes'
                ]
            ]
        );

        $this->add_control(
            'btn_text',
            [
                'label' => esc_html__('Button Text', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter button text.', 'yotta-core'),
                'default' => esc_html__('Learn More', 'yotta-core')
            ]
        );

        $this->add_control(
            'btn_link',
            [
                'label' => esc_html__('Button Link', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'default' => array(
                    'url' => '#'
                ),
                'description' => esc_html__('enter button url.', 'yotta-core'),
            ]
        );

        $this->add_control(
            'button_icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-phone-alt',
                    'library' => 'solid',
                ],
            ]
        );

        $this->add_control(
            'button_icon_alignment',
            [
                'label' => esc_html__('Icon Position', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'left',
                'options' => [
                    'left' => esc_html__('Before', 'yotta-core'),
                    'right' => esc_html__('After', 'yotta-core'),
                ],
            ]
        );

        $this->add_responsive_control(
            'button_icon_indent',
            [
                'label' => esc_html__('Icon Spacing', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'max' => 60,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .button-icon-right' => 'margin-left: {{SIZE}}px;',
                    '{{WRAPPER}} .button-icon-left' => 'margin-right: {{SIZE}}px;'
                ],
            ]
        );
        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'yotta-core'),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'yotta-core'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'yotta-core'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'yotta-core'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('button_background');
        // Normal Tab
        $this->start_controls_tab('normal_style', [
            'label' => esc_html__('Normal', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'background',
            'description' => esc_html__('button background', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .btn--base"
        ]);
        $this->add_control('text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'default' => '#fff',
            'selectors' => [
                "{{WRAPPER}} .btn-wrap .btn--base " => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_normal_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .btn--base "
        ]);
        $this->add_control(
            'background_border_radius',
            [
                'label' => esc_html__('Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn--base' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .btn--base' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'yotta-core'),
                'selector' => '{{WRAPPER}} .btn-wrap .btn--base',
            ]
        );
        $this->end_controls_tab();
        // Hover Tab
        $this->start_controls_tab('hover_style', [
            'label' => esc_html__('Hover', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'yotta_button_hover_background',
            'selector' => "{{WRAPPER}} .btn-wrap .btn--base :hover , {{WRAPPER}} .btn-wrap .btn--base.button-animation::before",
            'description' => esc_html__('button hover background', 'yotta-core')
        ]);
        $this->add_control('hover_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'default' => '#333',
            'selectors' => [
                "{{WRAPPER}} .btn-wrap .btn--base:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'yotta_hover_background',
            'selector' => "{{WRAPPER}} .btn-wrap .btn--base :hover",
            'description' => esc_html__('button hover background', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_hover_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .btn--base :hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        // Button Typography Start

        $this->start_controls_section(
            'typography_section',
            [
                'label' => esc_html__('Button Typography', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => esc_html__('Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .btn--base "
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


        $this->add_render_attribute('button_attr', 'class', ['btn--base', $settings['btn_custom_class']]);
        if (!empty($settings['btn_link']['url'])) {
            $this->add_link_attributes('button_attr', $settings['btn_link']);
        }
        if (('yes' == $settings['btn_animation_color'])) {
            $this->add_render_attribute('button_attr', 'class', 'button-animation');
        }
        ?>
        <div class="btn-wrap">
            <a <?php echo $this->get_render_attribute_string('button_attr'); ?> <?php if (!empty($settings['btn_custom_css'])): ?>
                    style="<?php echo $settings['btn_custom_css'] .'"'; endif;?> >
                <?php

                if ($settings['button_icon_alignment'] == 'left') {
                    echo '<span class="button-icon-left">';
                    Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']);
                    echo '</span>';
                    echo esc_html($settings['btn_text']);
                }
                if ($settings['button_icon_alignment'] == 'right') {
                    echo esc_html($settings['btn_text']);
                    echo '<span class="button-icon-right">';
                    Icons_Manager::render_icon($settings['button_icon'], ['aria-hidden' => 'true']);
                    echo '</span>';
                }
                ?>
            </a>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Boxed_Button_Widget());