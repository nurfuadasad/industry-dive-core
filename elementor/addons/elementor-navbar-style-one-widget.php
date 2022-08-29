<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Navbar_Style_One_Widget extends Widget_Base
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
        return 'yotta-navbar-style-01-widget';
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
        return esc_html__('Yotta Navbar Style 01', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Navbar', 'Menu', 'Navigation', "Themeim", 'Yotta'];
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
        return 'eicon-nav-menu';
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
        return ['yotta_builder_widgets'];
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
        $this->add_control('top_bar', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Topbar', 'yotta-core'),
            'description' => esc_html__('make navbar topbar', 'yotta-core'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $this->add_control(
            'responsive_topbar',
            [
                'label' => esc_html__('Responsive Topbar', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Show Desktop Tablet and Mobile', 'yotta-core'),
                    'hide_topbar' => esc_html__('Hide Tablet and Mobile', 'yotta-core'),
                ],
            ]
        );
        $this->add_control('logo_responsive', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Logo Responsive', 'yotta-core'),
            'description' => esc_html__('responsive logo switch', 'yotta-core'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $this->add_control(
            'logo_position',
            [
                'label' => esc_html__('Logo Position', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'topbar',
                'options' => [
                    'topbar' => esc_html__('Top bar', 'yotta-core'),
                    'menubar' => esc_html__('Menubar', 'yotta-core'),
                ],
            ]
        );
        $this->add_control(
            'nav_shape',
            [
                'label' => esc_html__('Navigation Shape', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Normal Navigation', 'yotta-core'),
                    'm-top' => esc_html__('Margin Top Navigation', 'yotta-core'),
                ],
            ]
        );
        $this->add_control(
            'margin_top',
            [
                'label' => esc_html__('Navigation Shape', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'for-triangle' => esc_html__('With Shape', 'yotta-core'),
                    '' => esc_html__('Without Shape', 'yotta-core'),
                ],
            ]
        );
        $this->add_control('logo', [
            'type' => Controls_Manager::MEDIA,
            'label' => esc_html__('Logo', 'yotta-core'),
            'description' => esc_html__('Upload logo for navbar', 'yotta-core'),
            'default' => [
                'src' => Utils::get_placeholder_image_src()
            ]
        ]);
        $this->add_control('menu', [
            'type' => Controls_Manager::SELECT,
            'label' => esc_html__('Menu', 'yotta-core'),
            'options' => yotta_core()->get_nav_menu_list(),
            'description' => esc_html__('select menu for navbar', 'yotta-core')
        ]);
        $this->add_control('is_absolute', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Absolute', 'yotta-core'),
            'description' => esc_html__('make navbar absolute', 'yotta-core')
        ]);
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
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .navbar-elementor-style-two-wrapper .navbar-area .nav-container .navbar-collapse .navbar-nav' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'search_section',
            [
                'label' => esc_html__('Search Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'placeholder_title',
            [
                'label' => esc_html__('Placeholder', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Search Your keyword', 'yotta-core'),
                'placeholder' => esc_html__('Search Your keyword', 'yotta-core'),
            ]
        );

        $this->add_control(
            'search_icon', [
                'label' => esc_html__('Search Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-search',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_responsive_control(
            'search_align',
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
                    'flex-end' => [
                        'title' => esc_html__('Right', 'yotta-core'),
                        'icon' => 'eicon-text-align-right',
                    ]
                ],
                'default' => 'right',
                'selectors' => [
                    '{{WRAPPER}} .info-bar-inner .left-content-area .search-form' => 'justify-content: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'top_right_menu_section',
            [
                'label' => esc_html__('Top Right Menu Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('top_nav_switch', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Top Nav Menu', 'yotta-core'),
            'description' => esc_html__('make navbar menu', 'yotta-core'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $repeater = new Repeater();
        $repeater->add_control(
            'nav_top_right_icon', [
                'label' => esc_html__('Nav Right Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select icon', 'yotta-core'),
                'default' => [
                    'value' => 'far fa-user',
                    'library' => 'solid',
                ],
            ]
        );
        $repeater->add_control(
            'nav_top_right_link', [
                'label' => esc_html__('Nav URL', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'yotta-core'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'nav_title',
            [
                'label' => esc_html__('Nav Title', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter  title.', 'yotta-core'),
                'default' => esc_html__('Become A Mentor', 'yotta-core')
            ]
        );
        $this->add_control('top_nav_list', [
            'label' => esc_html__('Nav Menu Items', 'yotta-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'nav_title' => esc_html__('Become A Mentor', 'yotta-core'),
                ]
            ]

        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'nav_right_section',
            [
                'label' => esc_html__('Nav Right Menu Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('nav_extra_switch', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Nav Right', 'yotta-core'),
            'description' => esc_html__('make navbar right nav', 'yotta-core'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $repeater = new Repeater();
        $repeater->add_control(
            'nav_right_menu_icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'far fa-user',
                    'library' => 'solid',
                ]
            ]
        );
        $repeater->add_control(
            'nav_right_link', [
                'label' => esc_html__('Nav URL', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'yotta-core'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $repeater->add_control(
            'nav_right_title',
            [
                'label' => esc_html__('Nav Title', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter  title.', 'yotta-core'),
                'default' => esc_html__('Popular Courses', 'yotta-core')
            ]
        );
        $this->add_control('right_nav_list', [
            'label' => esc_html__('Nav Right Menu Items', 'yotta-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'nav_right_title' => esc_html__('Popular Courses', 'yotta-core'),
                ]
            ]

        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('button_status', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Button One', 'yotta-core'),
            'description' => esc_html__('show/hide button', 'yotta-core')
        ]);
        $this->add_control('button_text', [
            'type' => Controls_Manager::TEXT,
            'label' => esc_html__('Button One Text', 'yotta-core'),
            'description' => esc_html__('set navbar button text', 'yotta-core'),
            'default' => esc_html__('Login', 'yotta-core'),
            'condition' => ['button_status' => 'yes']
        ]);
        $this->add_control('button_link', [
            'type' => Controls_Manager::URL,
            'label' => esc_html__('Button One Link', 'yotta-core'),
            'description' => esc_html__('set navbar button link', 'yotta-core'),
            'default' => [
                'url' => '#'
            ],
            'condition' => ['button_status' => 'yes']
        ]);
        $this->add_control('button_two_status', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Button Two', 'yotta-core'),
            'description' => esc_html__('show/hide button', 'yotta-core')
        ]);
        $this->add_control('button_two_text', [
            'type' => Controls_Manager::TEXT,
            'label' => esc_html__('Button Two Text', 'yotta-core'),
            'description' => esc_html__('set navbar button text', 'yotta-core'),
            'default' => esc_html__('Signup', 'yotta-core'),
            'condition' => ['button_two_status' => 'yes']
        ]);
        $this->add_control('button_two_link', [
            'type' => Controls_Manager::URL,
            'label' => esc_html__('Button Two Link', 'yotta-core'),
            'description' => esc_html__('set navbar button link', 'yotta-core'),
            'default' => [
                'url' => '#'
            ],
            'condition' => ['button_two_status' => 'yes']
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'offer_btn_section',
            [
                'label' => esc_html__('Offer Button Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control('offer_btn_switch', [
            'type' => Controls_Manager::SWITCHER,
            'label' => esc_html__('Offer Button', 'yotta-core'),
            'description' => esc_html__('make navbar Offer Button', 'yotta-core'),
            'return_value' => 'yes',
            'default' => 'yes',
        ]);
        $this->add_control('offer_btn_title', [
            'type' => Controls_Manager::TEXT,
            'label' => esc_html__('Offer Button Title', 'yotta-core'),
            'description' => esc_html__('set navbar offer text', 'yotta-core'),
            'default' => esc_html__('GET HOSTING', 'yotta-core')
        ]);
        $this->add_control('offer_btn_paragraph', [
            'type' => Controls_Manager::TEXT,
            'label' => esc_html__('Offer Button Paragraph', 'yotta-core'),
            'description' => esc_html__('set navbar offer text', 'yotta-core'),
            'default' => esc_html__('Start Free Trail', 'yotta-core')
        ]);
        $this->add_control(
            'offer_btn_link', [
                'label' => esc_html__('Offer Button URL', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter URL', 'yotta-core'),
                'default' => [
                    'url' => '#'
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'menu_styling_section',
            [
                'label' => esc_html__('Menu Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'menu_background_color',
            'label' => esc_html__('Menu Background Color', 'yotta-core'),
            'description' => esc_html__('change menu background color', 'yotta-core'),
            "selector" => "{{WRAPPER}} .navbar-area .nav-container"
        ]);
        $this->add_responsive_control(
            'menu_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-elementor-style-two-wrapper .navbar-area.navbar-default' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'menu_items_gap',
            [
                'label' => esc_html__('Menu Item Gap', 'yotta-core'),
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
                    '{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li + li' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'button_between_gap',
            [
                'label' => esc_html__('Button Between Gap', 'yotta-core'),
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
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li+li' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'button_left_margin_gap',
            [
                'label' => esc_html__('Button Left Margin', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'navigation_margin_top',
            [
                'label' => esc_html__('Navigation Margin Top', 'yotta-core'),
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
                    'default' => [
                        'unit' => 'px',
                        'size' => -40,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-elementor-style-two-wrapper .m-top' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('menu_area_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('menu_color', [
            'label' => esc_html__('Menu Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change menu color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('menu_active_color', [
            'label' => esc_html__('Menu Active Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change menu active color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.current-menu-item" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li:hover" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.current-menu-item a" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li:hover > a" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('dropdown_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control('dropdown_color', [
            'label' => esc_html__('Dropdown Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu .menu-item-has-children:before" => "color: {{VALUE}}"
            ]
        ]);

        $this->add_control('dropdown_border_bottom_color', [
            'label' => esc_html__('Dropdown Border Bottom Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown border bottom color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu" => "border-bottom-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('dropdown_item_border_bottom_color', [
            'label' => esc_html__('Dropdown Item Border Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown item border color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li + li" => "border-top-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('dropdown_hover_background_color', [
            'label' => esc_html__('Dropdown Hover Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown hover background color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a:hover" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('dropdown_hover_color', [
            'label' => esc_html__('Dropdown Hover Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change dropdown hover color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li.menu-item-has-children .sub-menu li a:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('_menu_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'menu_typography',
            'label' => esc_html__('Menu Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .navbar-collapse .navbar-nav li"
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'button_gd_two_section',
            [
                'label' => esc_html__('Button One Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'button_one_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:first-child .boxed-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('button_two_background');

        $this->start_controls_tab('normal_two_style', [
            'label' => esc_html__('Normal', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'gd_two_background',
            'selector' => "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn",
            'description' => esc_html__('button background', 'yotta-core')
        ]);
        $this->add_control('gd_two_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'default' => '#fff',
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:first-child .boxed-btn" => "color: {{VALUE}}",
                "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_normal_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn",
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('hover_two_style', [
            'label' => esc_html__('Hover', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'yotta_button_hover_background',
            'selector' => "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn:hover",
            'description' => esc_html__('button hover background', 'yotta-core')
        ]);
        $this->add_control('gd_two_hover_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'default' => '#fff',
            'selectors' => [
                "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_hover_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->add_control('button_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:first-child .boxed-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    '{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'button_style_two_section',
            [
                'label' => esc_html__('Button Two Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'button_two_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->start_controls_tabs('button_two_styling_background');

        $this->start_controls_tab('button_normal_two_style', [
            'label' => esc_html__('Normal', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_two_background',
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn",
            'description' => esc_html__('button background', 'yotta-core')
        ]);
        $this->add_control('button_two_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_two_normal_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('button_hover_two_style', [
            'label' => esc_html__('Hover', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'yotta_button_two_hover_background',
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn:hover",
            'description' => esc_html__('button hover background', 'yotta-core')
        ]);
        $this->add_control('button_two_hover_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'default' => '#fff',
            'selectors' => [
                "{{WRAPPER}} .info-bar-inner .right-content-area .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'button_two_hover_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->add_control('button_two_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control(
            'button_two_border_radius',
            [
                'label' => esc_html__('Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li:last-child .boxed-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'button_style_two_typography_section',
            [
                'label' => esc_html__('Button Typography', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => esc_html__('Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .navbar-area .nav-container .nav-right-content ul li .boxed-btn"
        ]);
        $this->end_controls_section();

        /* topbar search  styling */
        $this->start_controls_section(
            'top_search_styling_section',
            [
                'label' => esc_html__('Top bar Search Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'topbar_search_margin_left_gap',
            [
                'label' => esc_html__('Search Left Margin', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .search-form' => 'margin-left: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'topbar_search_margin_right_gap',
            [
                'label' => esc_html__('Search Right Margin', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .search-form' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('search_icon_top_color', [
            'label' => esc_html__('Search Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .search-form .search-form-page input" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('search_top_color', [
            'label' => esc_html__('Search Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .search-form .search-form-page .submit-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('search_top_bg_color', [
            'label' => esc_html__('Search Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .search-form .search-form-page input" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();

        //Topbar Menu
        $this->start_controls_section(
            'top_menu_styling_section',
            [
                'label' => esc_html__('Top bar Menu Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'topbar_menu_margin_left_gap',
            [
                'label' => esc_html__('Top Menu Right Margin', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 80,
                ],
                'selectors' => [
                    '{{WRAPPER}} .top-right-nav' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('top_menu_color', [
            'label' => esc_html__('Top Menu Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .top-right-nav li" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('top_menu_icon_color', [
            'label' => esc_html__('Top Menu Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .top-right-nav li a i" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('top_menu_hover_color', [
            'label' => esc_html__('Top Menu Hover Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .top-right-nav li:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();


        //Topbar Menu
        $this->start_controls_section(
            'nav_right_menu_styling_section',
            [
                'label' => esc_html__('Nav bar Right Menu Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'nav_menu_margin_left_gap',
            [
                'label' => esc_html__('Nav Menu Item Right Margin', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 1,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 20,
                ],
                'selectors' => [
                    '{{WRAPPER}} .navbar-area .nav-container .nav-right-content .top-right-nav li' => 'margin-right: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('nav_right_menu_color', [
            'label' => esc_html__('Nav Right Menu Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content .top-right-nav li a" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('nav_right_menu_icon_color', [
            'label' => esc_html__('Nav Right Menu Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content .top-right-nav li a i" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('nav_right_menu_hover_color', [
            'label' => esc_html__('Nav Right Menu Hover Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .navbar-area .nav-container .nav-right-content .top-right-nav li a:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        /* sticky navbar styling */
        $this->start_controls_section(
            'sticky_navbar_styling_section',
            [
                'label' => esc_html__('Sticky Navbar Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_menu_background_color',
            'label' => esc_html__('Menu Background Color', 'yotta-core'),
            'description' => esc_html__('change menu background color', 'yotta-core'),
            "selector" => "{{WRAPPER}} .navbar-elementor-style-two-wrapper .navbar-area.navbar-default.nav-fixed"
        ]);
        $this->add_control('nav_fixed_menu_color', [
            'label' => esc_html__('Menu Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change menu color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('nav_fixed_menu_active_color', [
            'label' => esc_html__('Menu Active Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change menu active color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li.current-menu-item" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li:hover" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li.current-menu-item a" => "color: {{VALUE}}",
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .navbar-collapse .navbar-nav li:hover > a" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();

        /* sticky navbar button one styling */
        $this->start_controls_section(
            'sticky_nav_button_style_one_section',
            [
                'label' => esc_html__('Sticky Nav Button One Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs('nav_fixed_button_two_background');

        $this->start_controls_tab('nav_fixed_normal_two_style', [
            'label' => esc_html__('Normal', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_gd_two_background',
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn",
            'description' => esc_html__('button background', 'yotta-core')
        ]);
        $this->add_control('nav_fixed_gd_two_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'nav_fixed_button_normal_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('nav_fixed_hover_two_style', [
            'label' => esc_html__('Hover', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_yotta_button_hover_background',
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn:hover",
            'description' => esc_html__('button hover background', 'yotta-core')
        ]);
        $this->add_control('nav_fixed_gd_two_hover_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'default' => '#333',
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'nav_fixed_button_hover_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:first-child .boxed-btn:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        /* sticky navbar button two styling */
        $this->start_controls_section(
            'sticky_nav_button_style_two_section',
            [
                'label' => esc_html__('Sticky Nav Button Two Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs('nav_fixed_button_two_styling_background');

        $this->start_controls_tab('nav_fixed_button_normal_two_style', [
            'label' => esc_html__('Normal', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_button_two_background',
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn",
            'description' => esc_html__('button background', 'yotta-core')
        ]);
        $this->add_control('nav_fixed_button_two_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'nav_fixed_button_two_normal_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab('nav_fixed_button_hover_two_style', [
            'label' => esc_html__('Hover', 'yotta-core')
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'nav_fixed_yotta_button_two_hover_background',
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn:hover",
            'description' => esc_html__('button hover background', 'yotta-core')
        ]);
        $this->add_control('nav_fixed_button_two_hover_text_color', [
            'label' => esc_html__('Button Text Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'description' => esc_html__('change button text color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'nav_fixed_button_two_hover_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .navbar-area.nav-fixed .nav-container .nav-right-content ul li:last-child .boxed-btn:hover"
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

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
        $site_logo_id = $settings['logo']['id'];
        $site_logo_url = !empty($site_logo_id) ? wp_get_attachment_image_src($site_logo_id, 'full')[0] : '';
        $site_logo_alt = !empty($site_logo_id) ? get_post_meta($site_logo_id, '_wp_attachment_image_alt', true) : '';
        $top_nav_list = $settings['top_nav_list'];
        //button attribute
        $this->add_render_attribute('button_attr', 'class', 'boxed-btn blank');
        if (!empty($settings['button_link']['url'])) {
            $this->add_link_attributes('button_attr', $settings['button_link']);
        }
        $this->add_render_attribute('button_two_attr', 'class', 'boxed-btn');
        if (!empty($settings['button_two_link']['url'])) {
            $this->add_link_attributes('button_two_attr', $settings['button_two_link']);
        }

        //is_absolute
        $this->add_render_attribute('navbar_wrapper_class', 'class', 'navbar-area');
        $this->add_render_attribute('navbar_wrapper_class', 'class', 'navbar');
        $this->add_render_attribute('navbar_wrapper_class', 'class', 'navbar-expand-lg');
        if (!empty($settings['is_absolute'])) {
            $this->add_render_attribute('navbar_wrapper_class', 'class', 'navbar-absolute');
        }
        ?>

        <div class="header-style-04">
            <?php if ($settings['top_bar'] === 'yes') : ?>
                <div class="topbar-area style-01">
                    <div class="container custom-container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="topbar-inner">
                                    <?php if ($settings['top_nav_switch'] === 'yes') : ?>
                                        <ul class="info-items">
                                            <?php
                                            foreach ($top_nav_list as $item) : ?>
                                                <li>
                                                    <a <?php echo yotta_core()->render_elementor_link_attributes($item['nav_top_right_link']) ?>>
                                                            <?php Icons_Manager::render_icon($item['nav_top_right_icon'], ['aria-hidden' => 'true']); ?>
                                                            <?php echo $item['nav_title'] ?>
                                                    </a>
                                                </li>
                                            <?php endforeach; ?>
                                        </ul>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
            <nav class="navbar navbar-area navbar-expand-lg navigation-style-01">
                <div class="container custom-container">
                    <div class="responsive-mobile-menu">
                        <div class="logo-wrapper">
                            <?php
                            printf('<a class="site-logo site-title" href="%1$s"><img src="%2$s" alt="%3$s"/></a>', get_home_url(), $site_logo_url, $site_logo_alt);
                            ?>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                                data-target="#yotta_main_menu"
                                aria-expanded="false" aria-label="<?php esc_attr__('Toggle navigation', 'yotta') ?>">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                    </div>

                    <?php
                    if (!empty($settings['menu'])) {
                        $menu_args = [
                            'theme_location' => 'main-menu',
                            'menu_class' => 'navbar-nav',
                            'container' => 'div',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'yotta_main_menu',
                            'menu' => $settings['menu']
                        ];
                        if (defined('YOTTA_CORE_SELF_PATH')) {
                            $menu_args['walker'] = new \Yotta_Megamenu_Walker();
                        }
                        wp_nav_menu($menu_args);
                    }
                    ?>
                    <div class="nav-right-content">
                        <div class="btn-wrap">
                            <a <?php echo yotta_core()->render_elementor_link_attributes($settings['offer_btn_link']) ?>
                                    class="boxed-btn btn-rounded"><?php echo $settings['offer_btn_title'] ?> </i></a>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Navbar_Style_One_Widget());