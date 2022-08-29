<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Section_Title_One_Widget extends Widget_Base
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
        return 'yotta-theme-heading-title-one-widget';
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
        return esc_html__('Heading Title: 01', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Section', 'Heading', 'Title', "ThemeIM", 'Yotta'];
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
        return 'eicon-heading';
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
            'white_section_title',
            [
                'label' => esc_html__('Subtitle Plane Animation', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'white' => esc_html__('White Style', 'yotta-core'),
                    '' => esc_html__('Default Style', 'yotta-core'),
                ],
            ]
        );
        $this->add_control(
            'subtitle',
            [
                'label' => esc_html__('Sub Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('About Yotta', 'yotta-core'),
                'description' => esc_html__('enter title. use {c} color text {/c} for color text', 'yotta-core'),
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('What We Do', 'yotta-core'),
            ]
        );
        $this->add_control(
            'feature_status',
            [
                'label' => esc_html__('Feature Show/Hide', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'yotta-core'),
            ]
        );
        $this->add_control(
            'feature-title',
            [
                'label' => esc_html__('Feature Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('To Make Yourself An Expert Driver', 'yotta-core'),
                'condition' => ['feature_status' => 'yes']
            ]
        );
        $this->add_control(
            'description_status',
            [
                'label' => esc_html__('Description Show/Hide', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('show/hide description', 'yotta-core'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter  description.', 'yotta-core'),
                'default' => esc_html__('Top Packages', 'yotta-core'),
                'condition' => ['description_status' => 'yes']
            ]
        );
        $this->add_responsive_control(
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
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );


        $this->add_control(
            'shape_top_space',
            [
                'label' => esc_html__('Shape Top Space', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme-heading-title .subtitle' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'title_bottom_space',
            [
                'label' => esc_html__('Title Bottom Space', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme-heading-title .title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
		Group_Control_Border::get_type(),
			[
				'name' => 'border',
				'label' => esc_html__( 'Border', 'yotta-core' ),
				'selector' => '{{WRAPPER}} .theme-heading-title .subtitle',
			]
		);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'background',
            'description' => esc_html__('Subtitle background', 'yotta-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .subtitle"
        ]);
        $this->add_control('subtitle_color', [
            'label' => esc_html__('Sub Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .subtitle" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('subtitle_extra_color', [
            'label' => esc_html__('Sub Title Extra Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .subtitle span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('description_color', [
            'label' => esc_html__('Description Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title p" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_extra_color', [
            'label' => esc_html__('Title Extra Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .title span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('feature_color', [
            'label' => esc_html__('Feature Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'condition' => ['feature_status' => 'yes'],
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .feature-title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('feature_extra_color', [
            'label' => esc_html__('Feature Extra Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'condition' => ['feature_status' => 'yes'],
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .feature-title span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control(
            'feature_title_bottom_space',
            [
                'label' => esc_html__('Feature Bottom Space', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 1000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .theme-heading-title .feature-title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
                'condition' => ['feature_status' => 'yes']
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'styling_typography_section',
            [
                'label' => esc_html__('Typography Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_extra_typography',
            'label' => esc_html__('Title Extra Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .title span"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'feature_typography',
            'label' => esc_html__('Feature Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .feature-title",
            'condition' => ['feature_status' => 'yes']
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'feature_extra_typography',
            'label' => esc_html__('Feature Extra Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .feature-title span",
            'condition' => ['feature_status' => 'yes']
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title p",
            'condition' => ['description_status' => 'yes']
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
        ?>
        <div class="theme-heading-title <?php echo $settings['white_section_title'] ?>"
             style="text-align:<?php echo $settings['text_align']; ?>">
            <?php if (!empty($settings['subtitle'])) : ?>
                <div class="subtitle">
                    <?php
                    $subtitle = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['subtitle']);
                    print wp_kses($subtitle, yotta_core()->kses_allowed_html('all'));
                    ?>
                </div>
            <?php endif; ?>
            <h3 class="title">
                <?php
                $title = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['title']);
                print wp_kses($title, yotta_core()->kses_allowed_html('all'));
                ?>
            </h3>
            <?php if (!empty($settings['feature-title'])): ?>
                <h4 class="feature-title">
                    <?php
                    $title = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['feature-title']);
                    print wp_kses($title, yotta_core()->kses_allowed_html('all'));
                    ?>
                </h4>
            <?php endif; ?>
            <?php
            if (!empty($settings['description_status'])) {
                printf('<p>%1$s</p>', esc_html($settings['description']));
            }
            ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Section_Title_One_Widget());