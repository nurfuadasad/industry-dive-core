<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Counterup_One_Widget extends Widget_Base
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
        return 'yotta-counterup-one-widget';
    }

      /**
     * Get tags name.
     *
     * Retrieve Elementor widget by tag / keyword name.
     *
     * @return string[] Tag name.
     * @since 1.0.0
     * @access public
     *
     */
    public function  get_keywords()
    {
        return ['Counterup' , 'statistics' , 'Clock' , "Ir Tech" , 'Yotta'];
    }
    /**
     * Get widget title
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
        return esc_html__('Yotta : Counterup 01', 'yotta-core');
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
        return 'eicon-counter';
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
			'counterup_icon',
			[
				'label' => esc_html__( 'Icon', 'plugin-name' ),
				'type' => Controls_Manager::ICONS,
				'default' => [
					'value' => 'fas fa-globe',
					'library' => 'fa-solid',
				],
			]
		);
        $this->add_control('title', [
            'label' => esc_html__('Title', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Complete Training', 'yotta-core'),
            'description' => esc_html__('enter title', 'yotta-core')
        ]);
        $this->add_control('number', [
            'label' => esc_html__('Number', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('1,025', 'yotta-core'),
            'description' => esc_html__('enter counterup number', 'yotta-core')
        ]);
        $this->add_control('sign', [
            'label' => esc_html__('sign', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('+', 'yotta-core'),
            'description' => esc_html__('enter counterup sign', 'yotta-core')
        ]);

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
        // End Content

        /* Start Styling */
        // Title
        $this->start_controls_section(
            'styling_title_section',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

         // Normal Tab
        $this->start_controls_tabs(
            'title_style_tabs'
        );
        $this->start_controls_tab(
            'title_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'plugin-name' ),
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .statistics-item .statistics-content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Typography', 'yotta-core'),
                'selector' => '{{WRAPPER}} .statistics-item .statistics-content p',
            ]
        );
        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'title_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'plugin-name' ),
            ]
        );
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .statistics-content:hover p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title__hover_typography',
                'label' => esc_html__('Typography', 'yotta-core'),
                'selector' => '{{WRAPPER}} .statistics-item .statistics-content p',
            ]
        );
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section(); // End of Title Section
        

        // Number
        $this->start_controls_section(
            'styling_number_section',
            [
                'label' => esc_html__('Number', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'number_style_tabs'
        );
        // Normal Tab
        $this->start_controls_tab(
            'number_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'plugin-name' ),
            ]
        );
        $this->add_control('number_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .statistics-item .statistics-content .odo-title" => "color: {{VALUE}}",
                "{{WRAPPER}} .statistics-item .statistics-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'number_typography',
                'label' => esc_html__('Number Typography', 'yotta-core'),
                'selectors' => [
                    "{{WRAPPER}} .statistics-item .statistics-content .odo-area .odo-title",
                    "{{WRAPPER}} .statistics-item .statistics-content .odo-area .title",
                ]
            ]
        );
        $this->end_controls_tab();
        // Hover Tab
        $this->start_controls_tab(
            'number_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'plugin-name' ),
            ]
        );

        $this->add_control('number_hover_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .statistics-item:hover .statistics-content .odo-title" => "color: {{VALUE}}",
                "{{WRAPPER}} .statistics-item:hover .statistics-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section(); // End of Number Section

        // Icon
        $this->start_controls_section(
            'styling_icon_section',
            [
                'label' => esc_html__(' Icon', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'icon_style_tabs'
        );
        // Normal Tab
        $this->start_controls_tab(
            'icon_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'plugin-name' ),
            ]
        );
        $this->add_control('icon_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                "{{WRAPPER}} .statistics-item .counterup-icon" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'icon_bg',
            'selector' => "{{WRAPPER}} .statistics-item .counterup-icon"
        ]);
        $this->add_control(
			'counterup_icon_padding',
			[
				'label' => esc_html__( 'Padding', 'yotta-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .statistics-item .counterup-icon' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Border', 'yotta-core' ),
				'selector' => '{{WRAPPER}} .statistics-item .counterup-icon',
			]
		);
		$this->add_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'yotta-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .statistics-item .counterup-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'icon_typography',
                'label' => esc_html__('Typography', 'yotta-core'),
                'selector' => '{{WRAPPER}} .statistics-item .counterup-icon',
            ]
        );
        $this->end_controls_tab();

        // Hover Tab
        $this->start_controls_tab(
            'icon_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'plugin-name' ),
            ]
        );
        $this->add_control('icon_hover_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'default' => '#333333',
            'selectors' => [
                "{{WRAPPER}} .statistics-item:hover .counterup-icon" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'icon_hover_bg',
            'selector' => "{{WRAPPER}} .statistics-item:hover .counterup-icon"
        ]);
		$this->add_control(
            'icon_border_radius_hover',
            [
                'label' => esc_html__('Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .statistics-item .counterup-icon' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_tab();
        $this->end_controls_tabs();

        $this->end_controls_section();  //End of Icon Section


        //  Separator
        $this->start_controls_section(
            'styling_separator_section',
            [
                'label' => esc_html__('Separator', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('separator_color_1', [
            'label' => esc_html__('Color 1', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .statistics-item::before" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('separator_color_2', [
            'label' => esc_html__('Color 2', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .statistics-item::after" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->end_controls_section(); // End of Number Section


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

        $title = $settings['title'];
        $number = $settings['number'];
        $icon = $settings['counterup_icon'];

        $rand_numb = rand(333, 999999999);
 
        $this->add_render_attribute('counterup_wrapper', 'class', 'statistics-item');
        $this->add_render_attribute('counterup_wrapper', 'style', 'text-align:' . $settings['text_align']);
        $this->add_render_attribute('counterup_display', 'style', 'display:inline-block');
        ?>

        <!-- Yotta Counterup -->
        <div <?php echo $this->get_render_attribute_string('counterup_wrapper'); ?> id="statistics_id-<?php echo esc_attr($rand_numb); ?>">
                <div class="counterup-icon" <?php echo $this->get_render_attribute_string('counterup_display'); ?>>
                    <?php if (isset($icon)) : ?>
                            <span class="<?php echo esc_attr($icon['value']); ?>"></span>                  
                    <?php endif; ?>
                    <!-- <img src="assets/images/icon/icon-5.png" alt="icon"> -->
                </div>
                <div class="statistics-content">
                    <div class="odo-area">
                        <h3 class="count-num odo-title odometer" data-odometer-final="<?php echo esc_html($number); ?>">0</h3>
                        <h3 class="title">
                            <?php if (!empty($settings['sign'])) : ?>
                                <?php echo esc_html($settings['sign']) ?>
                            <?php endif; ?>
                        </h3>
                    </div>
                    <p><?php echo esc_html($title); ?></p>
                </div>
            </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Counterup_One_Widget());