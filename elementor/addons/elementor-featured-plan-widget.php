<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Featured_plan_Widget extends Widget_Base
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
        return 'yotta-featured-plan-widget';
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
        return esc_html__('Yotta: Featured Plan', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Plan', 'Featured', 'Pricing', "ThemeIM", 'Yotta'];
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
        return 'eicon-price-list';
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
        $this->add_control('feature-image',
            [
                'label' => esc_html__('Feature Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('Choose Image.', 'yotta-core'),
                'default' => array(
                    'url' => Utils::get_placeholder_image_src()
                )
            ]);
        $this->add_control(
            'image_alignment',
            [
                'label' => esc_html__( 'Image Alignment', 'yotta-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'yotta-core' ),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'yotta-core' ),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'yotta-core' ),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
                'default' => 'left',
                'toggle' => true,
            ]
        );

        $this->add_control('feat_title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter Location Name', 'yotta-core'),
                'label_block' => true,
                'default' => esc_html__('Web Hosting', 'yotta-core')
            ]);
        $this->add_control('feat_desc',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('Enter Description', 'yotta-core'),
                'label_block' => true,
                'default' => esc_html__('Unlimited storage, Unmetered bandwidth, Unbeatable hosting.a', 'yotta-core')
            ]);

        $this->add_control('feat_btn',
            [
                'label' => esc_html__('Button Text', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter Button Text', 'yotta-core'),
                'label_block' => true,
                'default' => esc_html__('GET STARTED', 'yotta-core')
            ]);
        $this->add_control('feat_btn_link',
            [
                'label' => esc_html__('Button Link', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter Button Link', 'yotta-core'),
                'label_block' => true,
                'default' => esc_html__('yourlink', 'yotta-core')
            ]);
        $this->end_controls_section();
        

        // STYLE TAB
        $this->start_controls_section(
            'feature_image_section',
            [
                'label' => esc_html__('Image', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
		$this->add_control(
			'image_alignment',
			[
				'label' => esc_html__( 'Alignment', 'yotta-core' ),
				'type' => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'yotta-core' ),
						'icon' => 'eicon-text-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'yotta-core' ),
						'icon' => 'eicon-text-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'yotta-core' ),
						'icon' => 'eicon-text-align-right',
					],
				],
				'default' => 'left',
				'toggle' => true,
			]
		);

        $this->end_controls_section();



        $this->start_controls_section(
            'feature_title_section',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .data-inner-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'name' => 'title_typography',
            'description' => esc_html__('select title typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .data-inner-content .title"
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'feature_desc_section',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('desc_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .data-inner-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Typography', 'yotta-core'),
            'name' => 'desc_typography',
            'description' => esc_html__('Select Description Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .data-inner-content .title"
        ]);
        $this->end_controls_section();



    //     $this->start_controls_section(
    //         'feature_button_section',
    //         [
    //             'label' => esc_html__('Button', 'yotta-core'),
    //             'tab' => Controls_Manager::TAB_STYLE,
    //         ]
    //     );
	// 	$this->start_controls_tabs(
	// 		'style_tabs'
	// 	);

	// 	$this->start_controls_tab(
	// 		'btn_normal_tab',
	// 		[
	// 			'label' => esc_html__( 'Normal', 'yotta-core' ),
	// 		]
	// 	);
    //     $this->add_control('button_color', [
    //         'label' => esc_html__('Color', 'yotta-core'),
    //         'type' => Controls_Manager::COLOR,
    //         'selectors' => [
    //             "{{WRAPPER}} .data-inner-content .title" => "color: {{VALUE}}"
    //         ]
    //     ]);
	// 	$this->add_group_control(
	// 		Group_Control_Background::get_type(),
	// 		[
	// 			'name' => 'button_bg_color',
	// 			'label' => esc_html__( 'Background', 'yotta-core' ),
	// 			'types' => [ 'classic', 'gradient', 'video' ],
	// 			'selector' => '{{WRAPPER}} .your-class',
	// 		]
	// 	);


    //     $this->add_control('button_icon', [
    //         'label' => esc_html__('Icon', 'yotta-core'),
    //         'type' => Controls_Manager::ICONS,
    //         'selectors' => [
    //             "{{WRAPPER}} .data-inner-content .title" => "color: {{VALUE}}"
    //         ]
    //     ]);
    //     $this->add_group_control(Group_Control_Typography::get_type(), [
    //         'label' => esc_html__('Typography', 'yotta-core'),
    //         'name' => 'button_typography',
    //         'description' => esc_html__('Select Button Typography', 'yotta-core'),
    //         'selector' => "{{WRAPPER}} .data-inner-content .title"
    //     ]);


    //     $this->end_controls_tab();

    // // Hover
	// 	$this->start_controls_tab(
	// 		'btn_hover_tab',
	// 		[
	// 			'label' => esc_html__( 'Hover', 'yotta-core' ),
	// 		]
	// 	);
	// 	$this->end_controls_tabs();
    // // End Tabs

    //     $this->end_controls_section();

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

        // $img_id = $settings['flag-image']['id'];
        // $img_url = !empty($img_id) ? wp_get_attachment_image_src($img_id, 'full')[0] : '';
        // $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

        ?>
        <div class="hosting-area">
            <div class="hosting-item">
                <div class="hosting-icon" style="text-align: <?php echo esc_attr( $settings['image_alignment'] ); ?>;">

                
                    <img src="https://www.fillmurray.com/100/150" alt="icon">
                </div>
                <div class="hosting-content">
                    <h5 class="title">Web Hosting</h5>
                    <ul class="hosting-list">

                        <li>Unlimited storage,</li>
                        <li>Unmetered bandwidth,</li>
                        <li>Unbeatable hosting.</li>
                    </ul>
                    <div class="hosting-btn">
                        <a href="plan.html">Get Started</a>
                    </div>
                </div>
                <div class="bottom-shape"></div>
            </div>
    </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Featured_plan_Widget());