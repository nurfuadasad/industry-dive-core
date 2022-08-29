<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Map_Location_Locator_Widget extends Widget_Base
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
        return 'yotta-googlemap-locator-widget';
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
        return esc_html__('Map Location Locator', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Google', 'Map', 'Locator', "ThemeIM", 'Yotta'];
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
        return 'eicon-map-pin';
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
        $this->add_control('flag-image',
            [
                'label' => esc_html__('Flag Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('Choose Image.', 'yotta-core'),
                'default' => array(
                    'url' => Utils::get_placeholder_image_src()
                )
            ]);

        $this->add_control('flag-name',
            [
                'label' => esc_html__('Name', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
                'description' => esc_html__('Enter Location Name', 'yotta-core'),
                'block' => true,
                'default' => esc_html__('Canada', 'yotta-core')
            ]);

        $this->add_control(
            'flag-position',
            [
                'label' => esc_html__( 'Position', 'yotta-core' ),
                'type' => Controls_Manager::SELECT,
                'default' => 'one',
                'options' => [
                    'one'  => esc_html__( 'One', 'yotta-core' ),
                    'two' => esc_html__( 'Two', 'yotta-core' ),
                    'three' => esc_html__( 'Three', 'yotta-core' ),
                    'four' => esc_html__( 'Four', 'yotta-core' ),
                    'five' => esc_html__( 'Five', 'yotta-core' ),
                    'six' => esc_html__( 'Six', 'yotta-core' ),
                ],
            ]
        );
    
        $this->end_controls_section();
        

        // STYLE TAB
        
        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Style Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('title_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .data-inner-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'name' => 'title_typography',
            'description' => esc_html__('select title typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .data-inner-content .title"
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

        $img_id = $settings['flag-image']['id'];
        $img_url = !empty($img_id) ? wp_get_attachment_image_src($img_id, 'full')[0] : '';
        $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

        ?>
               <div class="data-inner-item <?php echo esc_attr( $settings['flag-position'] ); ?>">
                <div class="data-inner-wrapper">
                    <div class="data-inner-thumb">
                        <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo esc_attr($img_alt) ?>">
                    </div>
                    <div class="data-inner-content">
                        <span class="title">
                            <?php if (!empty($settings['flag-name'])) {
                                 echo esc_html($settings['flag-name']);
                                }             
                            ?>
                        </span>
                    </div>
                </div>
                <div class="data-wave">
                    <div class="bling"></div>
                </div>
            </div>

        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Map_Location_Locator_Widget());