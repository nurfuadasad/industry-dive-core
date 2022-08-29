<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;

class Video_Hover extends Widget_Base
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

        return 'yotta-video-hover-popup-widget';

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

        return esc_html__('Yotta : Video Popup Player', 'yotta-core');

    }


    public function get_keywords()
    {

        return ['Popup', 'player', 'Effect', "ThemeIM", 'Yotta'];

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

        return 'eicon-circle-o';

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
            'video_settings_section',
            [
                'label' => esc_html__('General Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(

            'link',
            [
                'label' => esc_html__('Link', 'yotta-core'),
                'type' => Controls_Manager::URL,
                'description' => esc_html__('enter url.', 'yotta-core'),
                'default' => [
                    'url' => ''
                ]
            ]
        );

        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-play',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'default' => esc_html__('Go Live in a Minutes', 'yotta-core')
            ]
        );
        $this->add_control('description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter description', 'yotta-core'),
                'default' => esc_html__('We make it simple to launch in the cloud and hosting our best pricing and team accounts.', 'yotta-core')
            ]);
        $this->end_controls_section();
   

        $this->start_controls_section(

            'settings_section',

            [

                'label' => esc_html__('General Settings', 'yotta-core'),

                'tab' => Controls_Manager::TAB_CONTENT,

            ]

        );
        $this->add_control('title_colors', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .about-video-content .inner-title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('desc_colors', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .about-video-content .inner-description" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('shape_bg_color', [
            'label' => esc_html__('Circle Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'default'   => '#D0DDF7',
            'selectors' => [
                '{{WRAPPER}} .video-play-btn-02' => "background-color:{{VALUE}}"
            ]
        ]);
        $this->add_control(
            'icon_size',
            [
                'label' => esc_html__('Icon Size', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 12,
                        'max' => 150,
                        'step' => 1,
                    ],
                ],
                'default' => [
                    'px' => 'px',
                    'size' => 30,
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-play-btn-02' => 'font-size: {{SIZE}}{{UNIT}};',
                ],
            ]

        );
        $this->add_control('icon_bg_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'default'   => '#1958D8',
            'selectors' => [
                '{{WRAPPER}} .video-play-btn-02' => "color:{{VALUE}}"
            ]

        ]);
        $this->add_control('border_bdr_color', [
            'label' => esc_html__('Icon Border Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'default'   => 'rgb(25 89 219 / 13%)',
            'selectors' => [
                '{{WRAPPER}} .video-play-btn-02:before' => "border-color:{{VALUE}}"
            ]
        ]);
        $this->add_control(
            'shape-radius',
            [
                'label' => esc_html__('Shape Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .video-play-btn-02' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]

        );

        $this->add_group_control(

            Group_Control_Border::get_type(),
            [
                'name' => 'shape_border',
                'label' => esc_html__('Shape Border', 'yotta-core'),
                'selector' => '{{WRAPPER}} .video-play-btn-02:before',
            ]
        );
        $this->add_control(
            'shape_height',
            [
                'label' => esc_html__('Shape Height', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'px' => 'px',
                    'size' => 120,
                ],
                'selectors' => [
                    '{{WRAPPER}} .video-play-btn-02' => 'height: {{SIZE}}{{UNIT}};',
                ],
            ]

        );

        $this->add_control(
            'shape_width',
            [

                'label' => esc_html__('Shape Width', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 5000,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'px' => 'px',
                    'size' => 120,
                ],
                'selectors' => [
                    '{{WRAPPER}}  .video-play-btn-02' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'name' => 'title_typographys',
            'description' => esc_html__('select title typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .about-video-content .inner-title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Description Typography', 'yotta-core'),
            'name' => 'desc_typographys',
            'description' => esc_html__('select title typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .about-video-content .inner-description"
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

        <div class="about-video-area">
            <div class="about-video">
                <div class="video-main">
                    <a <?php echo yotta_core()->render_elementor_link_attributes($settings['link']) ?> class="video-play-btn-02 mfp-iframe"><?php echo yotta_core()->render_elementor_icons($settings['icon']) ?></a>
                </div>
            </div>
            <div class="about-video-content">
                <h3 class="inner-title"><?php echo esc_html($settings['title']) ?></h3>
                <p  class="inner-description"><?php echo esc_html($settings['description']) ?></p>
            </div>
            <div class="bottom-shape"></div>
        </div>

        <?php
    }




    

}


Plugin::instance()->widgets_manager->register_widget_type(new Video_Hover());