<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Event_Trainer_Item_Widget extends Widget_Base
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
        return 'yotta-event-trainer-widget';
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
        return esc_html__('Event Trainer', 'yotta-core');
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
        return 'eicon-image-rollover';
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
        $this->add_control('image',
            [
                'label' => esc_html__('Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'default' => array(
                    'url' => Utils::get_placeholder_image_src()
                )
            ]);
        $this->add_control('widget_title',
            [
                'label' => esc_html__('Widget Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter description', 'yotta-core'),
                'default' => esc_html__('EVENT TRAINER', 'yotta-core')
            ]);
        $this->add_control('trainer_title',
            [
                'label' => esc_html__('Trainer Title', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter description', 'yotta-core'),
                'default' => esc_html__('RANDALL SCHWARTZ', 'yotta-core')
            ]);
        $this->add_control('description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter description', 'yotta-core'),
                'default' => esc_html__('Suspendisse vel nisl sed viverra tindunt. Vivamus et lobortis felis...', 'yotta-core')
            ]);
        $this->add_control('trainer_profile', [
            'label' => esc_html__('Button Text', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('View Profile', 'yotta-core'),
            'description' => esc_html__('enter button text', 'yotta-core')

        ]);

        $this->add_control('trainer_profile_url', [
            'label' => esc_html__('Button Link', 'yotta-core'),
            'type' => Controls_Manager::URL,
            'default' => array(
                'url' => '#'
            ),
            'description' => esc_html__('enter button link', 'yotta-core')

        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'title_style_tabs'
        );

        $this->start_controls_tab(
            'title_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'yotta-core'),
            ]
        );
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .call-to-action-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('content_bg_color', [
            'label' => esc_html__('Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .call-to-action-item" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('content_border_color', [
            'label' => esc_html__('Border Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .call-to-action-item:after" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .call-to-action-item .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('paragraph_typography', [
            'label' => esc_html__('Paragraph Color', 'yotta-core'),
            'description' => esc_html__('select Paragraph Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .call-to-action-item .content p" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'yotta-core'),
            ]
        );

        $this->add_control('icon_hover_color', [
            'label' => esc_html__('Icon Hover Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .call-to-action-item:hover .icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('content_hover_bg_color', [
            'label' => esc_html__('Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .call-to-action-item" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_hover_color', [
            'label' => esc_html__('Title Hover Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .call-to-action-item:hover .content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('paragraph_hover_typography', [
            'label' => esc_html__('Paragraph Hover Color', 'yotta-core'),
            'description' => esc_html__('select Paragraph Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .call-to-action-item:hover .content p" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        /* button styling */
        $this->start_controls_section('price_plan_button_section', [

            'label' => esc_html__('Button Settings', 'yotta-core'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);

        $this->start_controls_tabs('button_styling');
        $this->start_controls_tab('normal_style', [
            'label' => esc_html__('Button Normal', "yotta-core")
        ]);
        $this->add_control('button_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}}  .btn-wrap .boxed-btn" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('divider_01', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}}  .btn-wrap .boxed-btn"
        ]);
        $this->add_control('divider_02', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'price_plan_button_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}}  .btn-wrap .boxed-btn"
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab('hover_style', [
            'label' => esc_html__('Button Hover', "yotta-core")
        ]);
        $this->add_control('button_hover_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}}  .btn-wrap .boxed-btn:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('divider_03', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_hover_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}}  .btn-wrap .boxed-btn:hover"
        ]);
        $this->add_control('divider_04', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'price_plan_hover_button_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .boxed-btn:hover"

        ]);

        $this->end_controls_tab();
        $this->end_controls_tabs();
        $this->add_control('divider_05', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .boxed-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /* button styling end */


        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'name' => 'title_typography',
            'description' => esc_html__('select title typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .call-to-action-item .content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Paragraph Typography', 'yotta-core'),
            'name' => 'paragraph_typography',
            'description' => esc_html__('select Paragraph typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .call-to-action-item .content p"
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
        $img_id = $settings['image']['id'];
        $img_url = !empty($img_id) ? wp_get_attachment_image_src($img_id, 'full')[0] : '';
        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

        ?>
        <div class="widget widget_event_trainer">
            <h4 class="widget-title"><?php esc_html_e($settings['widget_title'],'yotta-core'); ?></h4>
            <div class="profile-item">
                <div class="profile-thumb">
                    <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt) ?>">
                </div>
                <div class="profile-content">
                    <h4 class="title"><?php esc_html_e($settings['trainer_title'],'yotta-core'); ?></h4>
                    <p> <?php esc_html_e($settings['description'],'yotta-core'); ?></p>
                    <div class="profile-btn">
                        <a <?php echo yotta_core()->render_elementor_link_attributes($settings['trainer_profile_url']) ?> class="btn--base"><?php esc_html_e($settings['trainer_profile'],'yotta-core'); ?> <i
                                    class="fas fa-arrow-right ml-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Event_Trainer_Item_Widget());