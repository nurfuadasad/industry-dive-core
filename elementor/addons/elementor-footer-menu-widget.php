<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Footer_Menu_Widget extends Widget_Base
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
        return 'yotta-navbar-style-02-widget';
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
        return esc_html__('Yotta Footer Menu List', 'yotta-core');
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

        $this->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('What We Do', 'yotta-core'),
            ]
        );
        $this->add_control('menu', [
            'type' => Controls_Manager::SELECT,
            'label' => esc_html__('Menu', 'yotta-core'),
            'options' => yotta_core()->get_nav_menu_list(),
            'description' => esc_html__('select menu for navbar', 'yotta-core')
        ]);
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control('title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .theme-heading-title .title" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_section();

        $this->start_controls_section(
            'styling_typography_section',
            [
                'label' => esc_html__('Button Typography', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_extra_typography',
            'label' => esc_html__('Title Extra Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .theme-heading-title .title span"
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
        <div class="footer-widget">
            <div class="footer-title">
                <h4 class="widget-headline">
                    <?php
                    $title = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $settings['title']);
                    $title_span = str_replace(['{c}', '{/c}', '\n'], ['<span>', '</span>', '<br/>'], $title);
                    print wp_kses($title_span, yotta_core()->kses_allowed_html());
                    ?>
                </h4>
            </div>
            <?php
            if (!empty($settings['menu'])) {
                $menu_args = [
                    'container_class' => 'navbar-collapse',
                    'menu_class' => 'footer-list',
                    'menu' => $settings['menu']
                ];
                wp_nav_menu($menu_args);
            }
            ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Footer_Menu_Widget());