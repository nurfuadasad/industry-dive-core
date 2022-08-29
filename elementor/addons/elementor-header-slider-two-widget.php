<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Header_Area_Slider_Two_Widget extends Widget_Base
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
        return 'yotta-header-slider-two-widget';
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
        return esc_html__('Header Slider: 02', 'yotta-core');
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
        return 'eicon-archive-title';
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
            'left_settings_section',
            [
                'label' => esc_html__('Header Left Section Contents', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $repeater = new \Elementor\Repeater();
        $repeater->add_control(
            'background_image', [
                'label' => esc_html__('Background Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $repeater->add_control(
            'subtitle', [
                'label' => esc_html__('Sub Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('#1 MIXED MARTIAL ARTS SCHOOL IN MIAMI', 'yotta-core'),
                'description' => esc_html__('enter description', 'yotta-core'),
            ]
        );
        $repeater->add_control(
            'title', [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('BE A WORRIOR IN LIFE', 'yotta-core'),
                'description' => esc_html__('enter title', 'yotta-core')
            ]
        );
        $repeater->add_control(
            'feature-title', [
                'label' => esc_html__('Feature Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('MIND.BODY & SPIRIT IMPROVED', 'yotta-core'),
                'description' => esc_html__('enter description', 'yotta-core'),
            ]
        );
        $repeater->add_control(
            'description', [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('KUNG FU SCHOOL IN CHINA', 'yotta-core'),
                'description' => esc_html__('enter description', 'yotta-core'),
            ]
        );
        $repeater->add_control(
            'btn_status', [
                'label' => esc_html__('Button Show/Hide', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide button', 'yotta-core')
            ]
        );
        $repeater->add_control(
            'btn_text', [
                'label' => esc_html__('Button Text', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Apply Now', 'yotta-core'),
                'description' => esc_html__('enter button text', 'yotta-core'),
                'condition' => ['btn_status' => 'yes']
            ]
        );
        $repeater->add_control(
            'btn_link', [
                'label' => esc_html__('Button URL', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'yotta-core'),
                'condition' => ['btn_status' => 'yes']
            ]
        );
        $repeater->add_control(
            'btn_status_02', [
                'label' => esc_html__('Button Two Show/Hide', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'default' => 'yes',
                'description' => esc_html__('show/hide button', 'yotta-core')
            ]
        );
        $repeater->add_control(
            'btn_text_02', [
                'label' => esc_html__('Button Text', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Training Classes', 'yotta-core'),
                'description' => esc_html__('enter button text', 'yotta-core'),
                'condition' => ['btn_status_02' => 'yes']
            ]
        );
        $repeater->add_control(
            'btn_link_02', [
                'label' => esc_html__('Button URL', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'default' => [
                    'url' => '#'
                ],
                'description' => esc_html__('enter button url', 'yotta-core'),
                'condition' => ['btn_status_02' => 'yes']
            ]
        );
        $this->add_control('header_sliders', [
            'label' => esc_html__('Header Slider Items', 'neateller-master'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'background_image' => array(
                        'url' => Utils::get_placeholder_image_src()
                    ),
                    'description' => esc_html__('KUNG FU SCHOOL IN CHINA', 'neateller-master'),
                    'feature-title' => esc_html__('MIND.BODY & SPIRIT IMPROVED', 'neateller-master'),
                    'title' => esc_html__('BE A WORRIOR IN LIFE', 'neateller-master'),
                    'subtitle' => esc_html__('#1 MIXED MARTIAL ARTS SCHOOL IN MIAMI', 'neateller-master'),
                ]
            ],

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
                'default' => 'yes'
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

        $this->start_controls_section(
            'css_styles',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('sub_title_color', [
            'label' => esc_html__('Slider Subtitle Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-section .banner-content .sub-title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('slider_title_color', [
            'label' => esc_html__('Slider Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-section .banner-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('feature_title_color', [
            'label' => esc_html__('Slider Feature Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-section-two .banner-content .inner-title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('slider_para_color', [
            'label' => esc_html__('Slider Paragraph Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .banner-section-two .banner-content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_responsive_control('padding', [
            'label' => esc_html__('Padding', 'yotta-core'),
            'type' => Controls_Manager::DIMENSIONS,
            'size_units' => ['px', 'em'],
            'allowed_dimensions' => ['top', 'bottom'],
            'selectors' => [
                '{{WRAPPER}} .banner-section-two' => 'padding-top: {{TOP}}{{UNIT}};padding-bottom: {{BOTTOM}}{{UNIT}};'
            ],
            'description' => esc_html__('set padding for header area ', 'yotta-core')
        ]);
        $this->add_control('overlay_color', [
            'label' => esc_html__('Overlay Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                '{{WRAPPER}} .bg-overlay-black:after' => 'background-color:{{VALUE}};'
            ],
        ]);

        $this->end_controls_section();

        /* button styling */
        $this->start_controls_section('header_button_section', [
            'label' => esc_html__('Button Settings', 'yotta-core'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);

        $this->start_controls_tabs('button_styling_two');
        $this->start_controls_tab('normal_style', [
            'label' => esc_html__('Button Normal', "yotta-core")
        ]);
        $this->add_control('button_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn--base" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base"
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'header_button_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base"
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab('hover_style', [
            'label' => esc_html__('Button Hover', "yotta-core")
        ]);
        $this->add_control('button_hover_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn--base:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_hover_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base:hover"
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'header_hover_button_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base:hover"
        ]);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control('divider_0565', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn--base' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        /* button styling end */


        /* button styling */
        $this->start_controls_section('header_button_two_section', [
            'label' => esc_html__('Button Blank Settings', 'yotta-core'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);

        $this->start_controls_tabs('button_styling');
        $this->start_controls_tab('normal_style_two', [
            'label' => esc_html__('Button Normal', "yotta-core")
        ]);
        $this->add_control('button_two_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn--base.active" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_two_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base.active"
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'header_button_two_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base.active"
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab('hover_style_two', [
            'label' => esc_html__('Button Hover', "yotta-core")
        ]);
        $this->add_control('button_two_hover_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn--base.active:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_two_hover_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base.active:hover"
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'header_hover_button_two_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base.active:hover"
        ]);
        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control('divider_05', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control(
            'button_two_border_radius',
            [
                'label' => esc_html__('Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn--base.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        /* button styling end */

        /* typography settings start */
        $this->start_controls_section('typography_settings', [
            'label' => esc_html__('Typography Settings', 'yotta-core'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .banner-section .banner-content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'subtitle_typography',
            'label' => esc_html__('Sub Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .banner-section .banner-content .sub-title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'feature_title_typography',
            'label' => esc_html__('Feature Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .banner-section-two .banner-content .inner-title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'paragraph_title_typography',
            'label' => esc_html__('Paragraph Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .banner-section-two .banner-content p"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => esc_html__('Button Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'info_number_button_typography',
            'label' => esc_html__('Request Button Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn--base.active"
        ]);
        $this->end_controls_section();
        /* typography settings end */

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
        $all_header_items = $settings['header_sliders'];
        $rand_numb = rand(333, 999999999);
        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "navleft" => yotta_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => yotta_core()->render_elementor_icons($settings['nav_right_arrow'])
        ];

        ?>
        <div class="header-carousel-wrapper">
            <div class="header-carousel-one header-slider-one"
                 id="header-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php foreach ($all_header_items as $item):
                    $image_id = $item['background_image']['id'];
                    $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';


                    if (!empty($item['icon_box_link']['url'])) {
                        $this->add_link_attributes('link_wrapper', $item['icon_box_link']);
                    }
                    if (!empty($item['icon_box_link_two']['url'])) {
                        $this->add_link_attributes('link_wrapper_two', $item['icon_box_link_two']);
                    }
                    ?>
                    <div class="banner-section banner-section-two">
                        <div class="banner-bg bg-overlay-black bg_img"
                             style="background-image: url(<?php echo esc_url($image_url) ?>)"></div>
                        <div class="container-fluid">
                            <div class="row justify-content-center align-items-end mb-30-none">
                                <div class="col-xl-12 col-lg-12 text-center mb-30">
                                    <div class="banner-content" data-aos="fade-up" data-aos-duration="1800">

                                        <span class="sub-title"> <?php echo esc_html($item['subtitle']) ?></span>
                                        <h1 class="title"><?php echo esc_html($item['title']) ?></h1>
                                        <h3 class="inner-title"><?php echo esc_html($item['feature-title']) ?></h3>
                                        <p><?php echo esc_html($item['description']) ?></p>
                                        <div class="banner-btn">
                                            <?php if ($item['btn_status'] == 'yes'): ?>
                                                <a href="<?php echo esc_url($item['btn_link']['url']) ?>"
                                                   class="btn--base"><?php echo esc_html($item['btn_text']) ?> <i
                                                            class="fas fa-arrow-right ml-2"></i></a>
                                            <?php endif; ?>
                                            <?php if ($item['btn_status_02'] == 'yes'): ?>
                                                <a href="<?php echo esc_url($item['btn_link_02']['url']) ?>"
                                                   class="btn--base active"><?php echo esc_html($item['btn_text_02']) ?>
                                                    <i
                                                            class="fas fa-arrow-right ml-2"></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php if (!empty($settings['nav'])) : ?>
                <div class="slick-carousel-controls">
                    <div class="slider-nav"></div>
                    <div class="slider-dots"></div>
                </div>
            <?php endif; ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Header_Area_Slider_Two_Widget());