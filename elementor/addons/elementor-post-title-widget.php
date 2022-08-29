<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Post_Title extends Widget_Base {

    public function get_name() {
        return 'power_site_builder_post_title';
    }

    public function get_title() {
        return esc_html__( 'Post Title', 'yotta-core' );
    }

    public function get_icon() {
        return 'eicon-button';
    }

    public function show_in_panel() {
        return 'page' != get_post_type();
    }
    public function get_categories() {
        return [ 'yotta_widgets' ];
    }

    protected function register_controls() {
        $this->start_controls_section(
            'psb_section_post_title_section',
            [
                'label' => esc_html__( 'Post Title', 'yotta-core' ),
            ]
        );
        $this->add_control(
            'psb_post_title_use_custom_title',
            [
                'label'        => esc_html__( 'Use Custom Title?', 'yotta-core' ),
                'type'         => Controls_Manager::SWITCHER,
                'label_on'     => esc_html__( 'Yes', 'yotta-core' ),
                'label_off'    => esc_html__( 'No', 'yotta-core' ),
                'return_value' => 'yes',
                'default'      => 'no',
            ]
        );
        $this->add_control(
            'psb_post_title_custom_title',
            [
                'label'       => esc_html__( 'Custom Title', 'yotta-core' ),
                'type'        => Controls_Manager::TEXT,
                'default'     => esc_html__( 'Post Title', 'yotta-core' ),
                'placeholder' => esc_html__( 'Type your title here', 'yotta-core' ),
                'condition' => [
                    'psb_post_title_use_custom_title' => 'yes',
                ],
            ]
        );

        $this->add_control(
            'psb_post_title_tag',
            [
                'label' => esc_html__( 'Title HTML Tag', 'elementskit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'h1' => 'H1',
                    'h2' => 'H2',
                    'h3' => 'H3',
                    'h4' => 'H4',
                    'h5' => 'H5',
                    'h6' => 'H6',
                    'div' => 'div',
                    'span' => 'span',
                    'p' => 'p',
                ],
                'default' => 'h2',
            ]
        );

        $this->add_responsive_control(
            'psb_post_title_align',
            [
                'label'        => esc_html__( 'Alignment', 'yotta-core' ),
                'type'         => Controls_Manager::CHOOSE,
                'options'      => [
                    'left'    => [
                        'title' => esc_html__( 'Left', 'yotta-core' ),
                        'icon'  => 'fa fa-align-left',
                    ],
                    'center'  => [
                        'title' => esc_html__( 'Center', 'yotta-core' ),
                        'icon'  => 'fa fa-align-center',
                    ],
                    'right'   => [
                        'title' => esc_html__( 'Right', 'yotta-core' ),
                        'icon'  => 'fa fa-align-right',
                    ],
                ],
                'prefix_class' => 'elementor%s-align-',
                'default'      => '',
            ]
        );
        $this->end_controls_section();
        $this->start_controls_section(
            'psb_heading_section_style',
            [
                'label' => esc_html__( 'Title', 'yotta-core' ),
                'tab'   => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name'     => 'psb_post_title_typography',
                'label'    => esc_html__( 'Title Typography', 'yotta-core' ),
                'selector' => '{{WRAPPER}} .power-post-title',
            ]
        );
        $this->add_control(
            'psb_post_title_text_color',
            [
                'label'     => esc_html__( 'Title Color', 'yotta-core' ),
                'type'      => Controls_Manager::COLOR,
                'default'   => '',
                'selectors' => [
                    '{{WRAPPER}} .power-post-title' => 'color: {{VALUE}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'psb_post_title_margin',
            [
                'label'      => esc_html__( 'Title Margin', 'yotta-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .power-post-title' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_responsive_control(
            'psb_post_title_padding',
            [
                'label'      => esc_html__( 'Title Padding', 'yotta-core' ),
                'type'       => Controls_Manager::DIMENSIONS,
                'size_units' => [ 'px', '%', 'em' ],
                'selectors'  => [
                    '{{WRAPPER}} .power-post-title' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Text_Shadow::get_type(),
            [
                'name'     => 'psb_post_title_text_shadow',
                'label'    => esc_html__( 'Title Text Shadow', 'yotta-core' ),
                'selector' => '{{WRAPPER}} .power-post-title',
            ]
        );
        $this->end_controls_section();
    }

    protected function render() {
        $settings = $this->get_settings_for_display();
        extract($settings);
        $post_title = $psb_post_title_use_custom_title == 'yes' ? $psb_post_title_custom_title : get_the_title();

        echo '<'.$psb_post_title_tag.' class="power-post-title">
				'.wp_kses($post_title, yotta_core()->kses_allowed_html('all')).'
			</'.$psb_post_title_tag.'>';

    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Post_Title());