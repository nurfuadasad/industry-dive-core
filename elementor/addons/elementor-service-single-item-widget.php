<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Service_Single_Item_Widget extends Widget_Base
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
        return 'yotta-service-single-item-widget';
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
        return esc_html__('Service Single Item : 01', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['ThemeIM', 'yotta', 'image box'];
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
            'column',
            [
                'label' => esc_html__('Column', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '3' => esc_html__('04 Column', 'yotta-core'),
                    '4' => esc_html__('03 Column', 'yotta-core'),
                    '2' => esc_html__('06 Column', 'yotta-core'),
                    '6' => esc_html__('02 Column', 'yotta-core'),
                    '12' => esc_html__('01 Column', 'yotta-core'),
                ),
                'description' => esc_html__('select grid column', 'yotta-core'),
                'default' => '4'
            ]
        );
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many course you want in masonry , enter -1 for unlimited course.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'yotta-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => yotta()->get_terms_names('service-cat', 'id'),
            'description' => esc_html__('select category as you want, leave it blank for all category', 'yotta-core'),
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'yotta-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'yotta-core'),
                'DESC' => esc_html__('Descending', 'yotta-core'),
            ),
            'default' => 'ASC',
            'description' => esc_html__('select order', 'yotta-core')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'yotta-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'yotta-core'),
                'title' => esc_html__('Title', 'yotta-core'),
                'date' => esc_html__('Date', 'yotta-core'),
                'rand' => esc_html__('Random', 'yotta-core'),
                'comment_count' => esc_html__('Most Comments', 'yotta-core'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'yotta-core')
        ]);

        $this->end_controls_section();

        $this->start_controls_section(
            'settings_button_section',
            [
                'label' => esc_html__('Button Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('button_txt', [
            'label' => esc_html__('Button Text', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Get Started', 'yotta-core'),
            'description' => esc_html__('Enter Your Button Text.', 'yotta-core'),
            'label_block' => true
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'slider_settings_section',
            [
                'label' => esc_html__('Slider Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'items',
            [
                'label' => esc_html__('slidesToShow', 'yotta-core'),
                'type' => Controls_Manager::NUMBER,
                'description' => esc_html__('you can set how many item show in slider', 'yotta-core'),
                'default' => '3',
            ]
        );
        $this->add_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'yotta-core'),
                'description' => esc_html__('you can set margin for slider', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'size_units' => ['px']
            ]
        );
        $this->add_control(
            'loop',
            [
                'label' => esc_html__('Loop', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
            ]
        );
        $this->add_control(
            'autoplay',
            [
                'label' => esc_html__('Autoplay', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => 'no'
            ]
        );
        $this->add_control(
            'dots',
            [
                'label' => esc_html__('Dots', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'nav_left_arrow',
            [
                'label' => esc_html__('Nav Left Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-arrow-left',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label' => esc_html__('Nav Right Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'center',
            [
                'label' => esc_html__('Center', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),

            ]
        );
        $this->add_control(
            'autoplaytimeout',
            [
                'label' => esc_html__('Autoplay Timeout', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10000,
                        'step' => 2,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 5000,
                ],
                'size_units' => ['px'],
                'condition' => array(
                    'autoplay' => 'yes'
                )
            ]
        );
        $this->end_controls_section();


        // General
        $this->start_controls_section(
            'styling_general_section',
            [
                'label' => esc_html__('General', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_responsive_control(
            'content_alignment',
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .hosting-item' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();


        // Title
        $this->start_controls_section(
            'styling_title_section',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .hosting-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'background',
            'selector' => "{{WRAPPER}} .hosting-content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_title_typography',
            'label' => esc_html__('Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .hosting-content .title"
        ]);
        $this->end_controls_section();

        // Icon
        $this->start_controls_section(
            'styling_icon_section',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
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
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .hosting-item .hosting-icon' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_control('icon_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .hosting-item .hosting-icon span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'icon-bg',
            'selector' => "{{WRAPPER}} .hosting-item .hosting-icon span"
        ]);
		$this->add_control(
			'icon_padding',
			[
				'label' => esc_html__( 'Padding', 'yotta-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .hosting-item .hosting-icon span' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);

		$this->add_group_control(
			Group_Control_Border::get_type(),
			[
				'name' => 'icon_border',
				'label' => esc_html__( 'Border', 'yotta-core' ),
				'selector' => '{{WRAPPER}} .hosting-item .hosting-icon span',
			]
		);
		$this->add_control(
			'icon_border_radius',
			[
				'label' => esc_html__( 'Border Radius', 'yotta-core' ),
				'type' => Controls_Manager::DIMENSIONS,
				'size_units' => [ 'px', '%', 'em' ],
				'selectors' => [
					'{{WRAPPER}} .hosting-item .hosting-icon span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
				],
			]
		);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'icon_typography',
            'label' => esc_html__('Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .hosting-item .hosting-icon"
        ]);
        
        $this->end_controls_section();


        // Content
        $this->start_controls_section(
            'styling_content_section',
            [
                'label' => esc_html__('Content', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('content_txt_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .hosting-content .hosting-list" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'content_txt_typography',
            'label' => esc_html__('Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .hosting-content .hosting-list"
        ]);
        $this->end_controls_section();

        // Button
        $this->start_controls_section(
            'styling_button_section',
            [
                'label' => esc_html__('Button', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );
        // Normal Mode
        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__( 'Normal', 'plugin-name' ),
            ]
        );
        $this->add_control('normal_txt_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .hosting-item .hosting-content .hosting-btn a::after" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'button-normal-bg',
            'selector' => "{{WRAPPER}} .hosting-item .hosting-content .hosting-btn a::before"
        ]);
        $this->end_controls_tab();

        // Hover Mode
        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__( 'Hover', 'plugin-name' ),
            ]
        );
        $this->add_control('hover_txt_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}}  .hosting-item:hover .hosting-content .hosting-btn a" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'button-bg-hover',
            'selector' => "{{WRAPPER}} .hosting-item:hover .hosting-content .hosting-btn a::before, .hosting-item.active .hosting-content .hosting-btn a::before"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        

        $this->end_controls_section();

        /* icon hover controls tabs end */


        // $this->start_controls_section(
        //     'typography_section',
        //     [
        //         'label' => esc_html__('Typography Settings', 'yotta-core'),
        //         'tab' => Controls_Manager::TAB_STYLE,
        //     ]
        // );

        // $this->add_group_control(Group_Control_Typography::get_type(), [
        //     'name' => 'hover_title_typography',
        //     'label' => esc_html__('Title Typography', 'yotta-core'),
        //     'selector' => "{{WRAPPER}} .hosting-content .title"
        // ]);

        // $this->end_controls_section();
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

        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];

        //setup query
        $args = [
            'post_type' => 'service',
            'post_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        ];
        if (!empty($category)) {
            $args['tex_query'] = [
                [
                    'taxonomy' => 'service-cat',
                    'field' => 'term_id',
                    'terms' => $category
                ]
            ];
        }
        $post_data = new \WP_Query($args);
        ?>
        <div class="service-wrapper">
            <div class="row">
                <?php
                while ($post_data->have_posts()): $post_data->the_post();
                    $post_id = get_the_ID();
                    $service_single_meta_data = get_post_meta(get_the_ID(), 'yotta_service_options',true);
                    $service_image_selector = $service_single_meta_data['service_selector'];
                    $service_image = $service_single_meta_data['service_image'];
                    $service_image_id = $service_image['id'];
                    $service_single_repeater = isset($service_single_meta_data['service_repeater']) && !empty($service_single_meta_data['service_repeater']) ? $service_single_meta_data['service_repeater'] : '';
                    ?>
                    <div class="col-lg-<?php echo esc_attr($settings['column']); ?> col-md-6">
                        <div class="hosting-item">
                            <div class="hosting-icon">
                                <?php
                                if ($service_image_selector === 'service_icon' && isset($service_single_meta_data['service_icon'])){
                                        echo "<i class=".esc_attr($service_single_meta_data['service_icon'])."></i>";
                                }
                                if ($service_image_selector === 'service_image' && !empty($service_image_id)){
                                    printf('<img src="%1$s" alt="%2$s">' , esc_url( $service_image['url']), esc_attr( $service_image['alt']));
                                }
                                ?>
                            </div>
                            <div class="hosting-content">
                                <?php
                                 if (!empty(get_the_title($post_id))) {
                                    printf('<a href="%1$s" ><h5 class="title">%2$s</h5></a>', esc_url(get_the_permalink()), esc_html(get_the_title($post_id)));
                                } ?>
                                <ul class="hosting-list">
                                    <?php
                                    if (!empty($service_single_repeater)){
                                        foreach ($service_single_repeater as $repeater){
                                            printf('<li>%1$s</li>',$repeater['title']);
                                        }
                                    }
                                    ?>
                                </ul>
                                <div class="hosting-btn">
                                    <a href="<?php the_permalink() ?>"><?php echo esc_html($settings['button_txt']); ?></a>
                                </div>
                            </div>
                            <div class="bottom-shape"></div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Service_Single_Item_Widget());