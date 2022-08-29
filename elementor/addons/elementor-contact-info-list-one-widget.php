<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Contact_Info_List_One extends Widget_Base
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
        return 'yotta-contact-Info-List-one-widget';
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
        return esc_html__('Contact Box : 01', 'yotta-master');
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
        return 'eicon-radio';
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
                'label' => esc_html__('General Settings', 'yotta-master'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'yotta-master'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-master'),
                'default' => [
                    'value' => 'far fa-map',
                    'library' => 'solid',
                ]
            ]
        );
        $this->add_control('title', [
            'label' => esc_html__('Title', 'yotta-master'),
            'type' => Controls_Manager::TEXT,
            'description' => esc_html__('Enter title', 'yotta-master'),
            'default' => esc_html__('Office Address', 'yotta-master')
        ]);
        $this->add_control('description', [
            'label' => esc_html__('Description', 'yotta-master'),
            'type' => Controls_Manager::TEXTAREA,
            'description' => esc_html__('Enter description ', 'yotta-master'),
            'default' => esc_html__('99 NY Address street, Brooklyn, United State', 'yotta-master')
        ]);
        $this->end_controls_section();
        $this->start_controls_section('contact_info_list_styling_section', [
            'label' => esc_html__('Styling Settings', 'yotta-master'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .contact-icon-area .contact-icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('bg_icon_color', [
            'label' => esc_html__('Icon Background Color', 'yotta-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .contact-icon-area .contact-icon" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'yotta-master'),
                'selector' => '{{WRAPPER}} .contact-icon-area .contact-icon',
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'yotta-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .contact-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('description_color', [
            'label' => esc_html__('Description Color', 'yotta-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .contact-content p" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('link_color', [
            'label' => esc_html__('Link Color', 'yotta-master'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .contact-content a" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        $this->start_controls_section('contact_info_list_typography_section', [
            'label' => esc_html__('Typography Settings', 'yotta-master'),
            'tab' => Controls_Manager::TAB_STYLE
        ]);
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => esc_html__('Title Typography', 'yotta-master'),
                'description' => esc_html__('select Title typography', 'yotta-master'),
                'selector' => '{{WRAPPER}} .contact-item .title',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'description_typography',
                'label' => esc_html__('Description Typography', 'yotta-master'),
                'description' => esc_html__('select Paragraph typography', 'yotta-master'),
                'selector' => '{{WRAPPER}} .contact-item p',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'link_typography',
                'label' => esc_html__('Link Typography', 'yotta-master'),
                'description' => esc_html__('select link typography', 'yotta-master'),
                'selector' => '{{WRAPPER}} .contact-item a',
            ]
        );
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
        <div class="contact-item">
            <div class="contact-icon-area">
                <div class="contact-icon">
                    <?php
                    Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                    ?>
                </div>
            </div>
            <div class="contact-content">
                <h4 class="title"><?php echo esc_html($settings['title']); ?></h4>
                <?php
                $details_item = explode("\n", $settings['description']);
                foreach ($details_item as $detail) {
                    printf('<p class="details">%1$s</p>', esc_html($detail));
                }
                ?>
            </div>
        </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Contact_Info_List_One());