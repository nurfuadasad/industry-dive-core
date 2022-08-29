<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Gallery_Widget extends Widget_Base
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
        return 'yotta-gallery-two-widget';
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
        return esc_html__('Gallery: 01', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Gallery', 'Images', 'Effect', "ThemeIM", 'Yotta'];
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
        return 'eicon-gallery-grid';
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

        $this->add_control(
            'column',
            [
                'label' => esc_html__('Column', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '6' => esc_html__('02 Column', 'yotta-core'),
                    '3' => esc_html__('04 Column', 'yotta-core'),
                    '4' => esc_html__('03 Column', 'yotta-core'),
                    '2' => esc_html__('06 Column', 'yotta-core')
                ),
                'description' => esc_html__('select grid column', 'yotta-core'),
                'default' => '4'
            ]
        );

        $this->add_control(
            'show_tag',
            [
                'label' => esc_html__('Show Tag', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show Tags.', 'yotta-core'),
                'default' => 'yes'
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'images', [
                'label' => esc_html__('Image', 'yotta-core'),
                'type' => Controls_Manager::GALLERY,
                'show_label' => false,
            ]
        );

        $repeater->add_control(
            'tag', [
                'label' => esc_html__('Tag', 'yotta-core'),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $this->add_control('gallery_items', [
            'label' => esc_html__('Gallery Items', 'yotta-core'),
            'fields' => $repeater->get_controls(),
            'type' => Controls_Manager::REPEATER,


        ]);

        $this->add_control(
            'hover-icon',
            [
                'label' => esc_html__('Hover Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('select Icon.', 'yotta-core'),
                'default' => [
                    'value' => 'icomoon-pluse',
                    'library' => 'icomoon',
                ]
            ]
        );

        $this->end_controls_section();
        // End Content Section

        $this->start_controls_section(
            'style_section',
            [
                'label' => esc_html__('Style Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('hover_bg_color', [
            'label' => esc_html__('Hover Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .gallery-single-items" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('gallery_icon_bg_color', [
            'label' => esc_html__('Icon Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .gallery-single-items .icon" => "background-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('gallery_icon_border_color', [
            'label' => esc_html__('Icon Border Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .gallery-single-items .icon:after" => "border-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('gallery_icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .gallery-single-items .icon" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control(
            'icon_size',
            [
                'type' => Controls_Manager::SLIDER,
                'label' => esc_html__('Icon Size', 'yotta-core'),
                'size_units' => ['px', 'em'],
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                    'em' => [
                        'min' => 1,
                        'max' => 200,
                    ],
                ],
                'selectors' => [
                    "{{WRAPPER}} .gallery-single-items .icon" => "font-size: {{SIZE}}{{UNIT}};"
                ]
            ]
        );
        $this->end_controls_section();
        // End Content Section

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
        $column = esc_html($settings['column']);
        $show_tag = $settings['show_tag'] ? true : false;
        $gallery_items = $settings['gallery_items'];
        $gallery;
        ?>
        <div class="courses-gallery-section">
            <div class="container-fluid p-0">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="gallery-filter-wrapper">
                            <?php if ($show_tag) { ?>
                                <div class="row justify-content-center">
                                    <div class="col-lg-8 col-md-10 col-12">
                                        <div class="button-group filter-btn-group">
                                            <button class="active"
                                                    data-filter="*"><?php esc_html_e('All', 'yotta-core'); ?></button>
                                            <?php foreach ($gallery_items as $item) {
                                                $tag = strtolower(str_replace(" ", "", $item['tag']));
                                                foreach ($item['images'] as $image) {
                                                    $gallery[] = [
                                                        'url' => $image['url'],
                                                        'tag' => $tag
                                                    ];
                                                }
                                                ?>
                                                <button data-filter=".<?php echo esc_attr($tag, 'yotta-core') ?>"><?php esc_html_e($item['tag'], 'yotta-core') ?></button>
                                            <?php } ?>
                                        </div>
                                    </div>
                                </div>
                            <?php } else {
                                foreach ($gallery_items as $item) {
                                    $tag = strtolower(str_replace(" ", "", $item['tag']));
                                    foreach ($item['images'] as $image) {
                                        $gallery[] = [
                                            'url' => $image['url'],
                                            'tag' => $tag
                                        ];
                                    }
                                }
                            }

                            ?>
                            <div class="grid row">
                                <?php
                                foreach ($gallery as $image) {
                                    ?>
                                    <div class="col-lg-<?php echo $column; ?> col-md-6 grid-item <?php echo esc_attr($image['tag']); ?>">
                                        <div class="gallery-item">
                                            <div class="gallery-thumb">
                                                <img src="<?php echo esc_attr($image['url']); ?>"
                                                     alt="Waiting for vote">
                                                <div class="gallery-overlay">
                                                    <a class="image-popup"
                                                       href="<?php echo esc_attr($image['url']); ?>">
                                                        <div class="gallery-icon">
                                                            <?php
                                                            Icons_Manager::render_icon($settings['hover-icon'], ['aria-hidden' => 'true']);
                                                            ?>
                                                        </div>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Gallery_Widget());