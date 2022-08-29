<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Request_Form_Widget extends Widget_Base
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
        return 'yotta-theme-heading-title-two-widget';
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
        return esc_html__('Request Form', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Section', 'Heading', 'Title', "ThemeIM", 'Yotta'];
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
        return 'eicon-form-horizontal';
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
            'section_my_custom',
            [
                'label' => esc_html__('Team Filter', 'yotta'),
            ]
        );
        $this->add_control(
            'yotta_contact_form_id',
            [
                'label' => esc_html__('Contact Form', 'yotta'),
                'type' => Controls_Manager::SELECT,
                'options' => yotta_core()->get_contact_form_shortcode_list_el(),
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
        $settings = $this->get_settings();
        /**
         * main part
         */
        $shortcode = $settings['yotta_contact_form_id'];
        ?>

        <?php
        if (!empty($shortcode)):

            echo do_shortcode('[contact-form-7  id="' . $shortcode . '"]');

        else:
            echo esc_html__('please select and shortcode first');
        endif;
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Request_Form_Widget());