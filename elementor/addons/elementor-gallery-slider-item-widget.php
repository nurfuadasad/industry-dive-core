<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Video_Gallery_Widget extends Widget_Base
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
        return 'yotta-image-gallery-widget';
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
        return esc_html__('Image Gallery: 01', 'yotta-core');
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
        return 'eicon-person';
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
        $repeater = new Repeater();
        $repeater->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'hover_background',
                'label' => esc_html__('Background Image', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .single-image-gallery .thumb::before',
            ]
        );

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('enter image.', 'yotta-core'),
                'default' => array(
                    'url' => Utils::get_placeholder_image_src()
                )
            ]
        );
        $repeater->add_control(

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

        $repeater->add_control(
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
        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('enter title', 'yotta-core'),
                'default' => esc_html__('Senior Party 2019', 'yotta-core')
            ]
        );
        $this->add_control('gallery_items', [
            'label' => esc_html__('Gallery Item', 'yotta-core'),
            'type' => Controls_Manager::REPEATER,
            'fields' => $repeater->get_controls(),
            'default' => [
                [
                    'title' => esc_html__('William Evans', 'yotta-core'),
                    'description' => esc_html__("Convallis convallis tellus id interdum velit laoreet id donec ultrices. the for pulvinar neque laoreet suspendisse interdum consectetur libero id. cras adipiscing enim eu turpis.", 'yotta-core'),
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
                'label' => esc_html__('Items', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('you can set how many item show in slider', 'yotta-core'),
                'default' => '3'
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
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'nav_position',
            [
                'label' => esc_html__('Nav Position', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Normal', 'yotta-core'),
                    'style-06' => esc_html__('Bottom Position', 'yotta-core'),
                ],
            ]
        );
        $this->add_control(
            'nav_slider_position',
            [
                'label' => esc_html__('Slider Nav Position', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => -200,
                        'max' => 500,
                        'step' => 5,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => -120,
                ],
                'selectors' => [
                    '{{WRAPPER}} .slick-carousel-controls .slider-nav' => 'bottom: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label' => esc_html__('Nav Right Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-angle-right',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'nav_left_arrow',
            [
                'label' => esc_html__('Nav Left Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-angle-left',
                    'library' => 'solid',
                ],
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
            'galley_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'plugin-domain'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .tutorial-thumb::after',
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .tutorial-thumb .tutorial-overlay .tutorial-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_color', [
            'label' => esc_html__('Video Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .tutorial-thumb .tutorial-overlay .tutorial-video .video-icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_bg_color', [
            'label' => esc_html__('Video Icon Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .tutorial-thumb .tutorial-overlay .tutorial-video .video-icon" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_effect_color', [
            'label' => esc_html__('Video Icon Effect Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .video-play-btn-02:before" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->add_control('team_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .tutorial-thumb .tutorial-overlay .tutorial-content .title"
        ]);
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
        $all_gallery_items = $settings['gallery_items'];
        $rand_numb = rand(333, 999999999);

        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 3),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "navleft" => yotta_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => yotta_core()->render_elementor_icons($settings['nav_right_arrow'])

        ]
        ?>
        <div class="gallery-carousel-wrapper yotta-rtl-slider">
            <div class="brands-carousel training-carousel-one-wrapper"
                 id="gallery-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                foreach ($all_gallery_items as $item):

                    $image_id = $item['image']['id'];
                    $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
                    $image_alt = !empty($img_id) ? get_post_meta($img_id, '_wp_attachment_image_alt', true) : '';

                    ?>
                    <div class="training-outer-wrap">
                        <div class="tutorial-item">
                            <div class="tutorial-thumb">
                                <img src="<?php echo esc_url($image_url); ?>" alt="<?php echo esc_attr($image_alt); ?>">
                                <div class="tutorial-overlay">
                                    <div class="tutorial-video">
                                        <a <?php echo yotta_core()->render_elementor_link_attributes($item['link']) ?>
                                                class="video-play-btn-02 video-icon mfp-iframe"><?php echo yotta_core()->render_elementor_icons($item['icon']) ?></a>
                                    </div>
                                    <div class="tutorial-content">
                                        <h4 class="title"><?php echo esc_html($item['title']); ?></h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="container">
                <div class="row">
                    <div class="slick-carousel-controls">
                        <div class="slider-nav <?php echo $settings['nav_position'] ?>"></div>
                        <div class="slider-controlprogress">
                            <span class="slider__label sr-only"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Video_Gallery_Widget());