<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Blockqute_Item_Widget extends Widget_Base
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
        return 'yotta-blockquote-widget';
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
        return esc_html__('Blockquote: 01', 'yotta-core');
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
        return 'eicon-blockquote';
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
        $this->add_control(
            'icon',
            [
                'label' => esc_html__('Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-quote-left',
                    'library' => 'solid',
                ],
            ]
        );
        $this->add_control(
            'quote',
            [
                'label' => esc_html__('Quote', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'label_block' => true,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'default' => esc_html__('Producing Ideas Is The Main Way To Grow The Economy Life Insurance for Stay-at-Home Parents', 'yotta-core')
            ]
        );

        $this->add_control('author_name',
            [
                'label' => esc_html__('Author Name', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter description', 'yotta-core'),
                'default' => esc_html__('Jhon Smith', 'yotta-core')
            ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .element-blockquote-with-image' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control('content_bg_color', [
            'label' => esc_html__('Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .element-blockquote-with-image" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('content_border_color', [
            'label' => esc_html__('Border Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .element-blockquote-with-image .quote-content-area span::before" => "background-color: {{VALUE}}",
                "{{WRAPPER}} .element-blockquote-with-image .quote-content-area span::after" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .element-blockquote-with-image .quote-icon" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Quote Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .element-blockquote-with-image .quote-content" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('author_typography', [
            'label' => esc_html__('Author Color', 'yotta-core'),
            'description' => esc_html__('select author Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .element-blockquote-with-image .quote-content-area span" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_section();



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
            'selector' => "{{WRAPPER}} .element-blockquote-with-image .quote-content"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Paragraph Typography', 'yotta-core'),
            'name' => 'paragraph_typography',
            'description' => esc_html__('select Paragraph typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .element-blockquote-with-image .quote-content-area span"
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

        ?>
        <div class="element-blockquote-with-image bg_img" style="background-image: url(<?php echo esc_url($img_url) ?>);">
            <div class="quote-area">
                <div class="quote-icon">
                    <?php
                    Icons_Manager::render_icon($settings['icon'], ['aria-hidden' => 'true']);
                    ?>
                </div>
                <div class="quote-content-area">
                    <p class="quote-content"><?php echo esc_html($settings['quote']) ?></p>
                    <span><?php echo esc_html($settings['author_name']) ?></span>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Blockqute_Item_Widget());