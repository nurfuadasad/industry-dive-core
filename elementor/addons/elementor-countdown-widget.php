<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Countdown_Widget extends Widget_Base {

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
    public function get_name() {
        return 'yotta-countdownn-widget';
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
    public function get_title() {
        return esc_html__( 'Countdown', 'yotta-core' );
    }


    public function  get_keywords()
    {
        return ['Countdown' , 'Time Left' , 'Clock' , "Ir Tech" , 'Yotta'];
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
    public function get_icon() {
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
    public function get_categories() {
        return [ 'yotta_widgets' ];
    }

    /**
     * Register Elementor widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {

        $this->start_controls_section(
            'settings_section',
            [
                'label' => esc_html__( 'General Settings', 'yotta-core' ),
                'tab'   => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control( 'countdown_date', [
            'label'       => esc_html__( 'Countdown Time', 'yotta-core' ),
            'type'        => Controls_Manager::DATE_TIME,
            'default'     => esc_html__( '14', 'yotta-core' ),
            'description' => esc_html__( 'enter counterup date', 'yotta-core' )
        ] );
        $this->add_control(
            'countdown_alignment',
            [
                'label' => esc_html__( 'Alignment', 'yotta-core' ),
                'type' => Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__( 'Left', 'yotta-core' ),
                        'icon' => 'fa fa-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__( 'Center', 'yotta-core' ),
                        'icon' => 'fa fa-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__( 'Right', 'yotta-core' ),
                        'icon' => 'fa fa-align-right',
                    ],
                ],
                'toggle' => true,
                'selectors' => [
                    "{{WRAPPER}} .counter-single-item " => "text-align: {{VALUE}}"
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'styling_section',
            [
                'label' => esc_html__( 'Styling Settings', 'yotta-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'icon_box_border_radius',
            [
                'label' => esc_html__('Text Icon Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .counter-single-item .counter-item span' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('bg_color',[
            'label' => esc_html__('Background Color','yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .counter-single-item .counter-item span" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color',[
            'label' => esc_html__('Title Color','yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .counter-item h6" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('number_color',[
            'label' => esc_html__('Number Color','yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .counter-item span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('styling_divider',[
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(),[
            'label' => esc_html__('Title Typography'),
            'name' => 'title_typography',
            'selector' => "{{WRAPPER}} .counter-item span"
        ]);
        $this->add_control('styling_divider_01',[
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(),[
            'label' => esc_html__('Number Typography'),
            'name' => 'number_typography',
            'selector' => "{{WRAPPER}} .counter-item h6"
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
    protected function render() {
        $settings  = $this->get_settings_for_display();
        ?>
        <div class="counter-single-item mycountdown" data-countdown="<?php echo esc_attr($settings['countdown_date']);?>">
            <ul>
                <li class="counter-item">
                    <span class="days"></span>
                    <h6> <?php echo esc_html__('Month','yotta-core');?> </h6>
                </li>
                <li class="counter-item">
                    <span class="hours"></span>
                    <h6> <?php echo esc_html__('Hours','yotta-core');?> </h6>
                </li>
                <li class="counter-item">
                    <span class="mins"></span>
                    <h6> <?php echo esc_html__('Minute','yotta-core');?> </h6>
                </li>
                <li class="counter-item">
                    <span class="secs"></span>
                    <h6> <?php echo esc_html__('Second','yotta-core');?> </h6>
                </li>
            </ul>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type( new Yotta_Countdown_Widget() );
