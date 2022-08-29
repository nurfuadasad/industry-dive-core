<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Training_Single_Slider_Widget extends Widget_Base
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
        return 'yotta-training-single-slider-widget';
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
        return esc_html__('Training Single Slider', 'yotta-core');
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
        return 'eicon-pojome';
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
            'training_system',
            [
                'label' => esc_html__('Training Style System', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'for-slider',
                'options' => [
                    'for-grid' => esc_html__('Grid System', 'yotta-core'),
                    'for-slider' => esc_html__('Slider System', 'yotta-core'),
                ],
            ]
        );
        $this->add_control(
            'column',
            [
                'label' => esc_html__('Column', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    '3' => esc_html__('04 Column', 'yotta-core'),
                    '4' => esc_html__('03 Column', 'yotta-core'),
                    '2' => esc_html__('06 Column', 'yotta-core')
                ),
                'condition' => ['training_system' => 'for-grid'],
                'description' => esc_html__('select grid column', 'yotta-core'),
                'default' => '4'
            ]
        );
        $this->add_control('excerpt_length', [
            'label' => esc_html__('Excerpt Length', 'yotta-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                18 => esc_html__('Short', 'yotta-core'),
                55 => esc_html__('Regular', 'yotta-core'),
                100 => esc_html__('Long', 'yotta-core'),
            ),
            'default' => 18,
            'description' => esc_html__('select excerpt length', 'yotta-core')
        ]);
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many course you want in masonry , enter -1 for unlimited course.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'yotta-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => yotta()->get_terms_names('training-cat', 'id'),
            'description' => esc_html__('select category as you want, leave it blank for all category', 'yotta-core'),
        ]);
        $this->add_control('order', [
            'label' => esc_html__('Order', 'yotta-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ASC' => esc_html__('Ascending', 'yotta-core'),
                'DESC' => esc_html__('Descending', 'yotta-core'),
            ),
            'default' => 'ASC',
            'description' => esc_html__('select order', 'yotta-core')
        ]);
        $this->add_control('orderby', [
            'label' => esc_html__('OrderBy', 'yotta-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                'ID' => esc_html__('ID', 'yotta-core'),
                'title' => esc_html__('Title', 'yotta-core'),
                'date' => esc_html__('Date', 'yotta-core'),
                'rand' => esc_html__('Random', 'yotta-core'),
                'comment_count' => esc_html__('Most Comments', 'yotta-core'),
            ),
            'default' => 'ID',
            'description' => esc_html__('select order', 'yotta-core')
        ]);
        $this->add_control('readmore_text', [
            'label' => esc_html__('Read More Text', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Read More', 'yotta-core')
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
                    'style-01' => esc_html__('Top Position', 'yotta-core'),
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
                    '{{WRAPPER}} .slick-carousel-controls .slider-nav.style-01' => 'bottom: {{SIZE}}{{UNIT}};',
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
            'content_styling_section',
            [
                'label' => esc_html__('Content Styling', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'style_tabs'
        );

        $this->start_controls_tab(
            'style_normal_tab',
            [
                'label' => esc_html__('Normal', 'yotta-core'),
            ]
        );
        $this->add_control('normal_background_color', [
            'label' => esc_html__('Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .training-item" => "background-color: {{VALUE}};"
            ]
        ]);
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'yotta-core'),
                'selector' => '{{WRAPPER}}  .training-item',
            ]
        );
        $this->add_group_control(
            Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'label' => esc_html__('Box Border', 'yotta-core'),
                'selector' => '{{WRAPPER}}  .training-item',
            ]
        );
        $this->add_control('normal_title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .training-content .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .training-icon" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_description_color', [
            'label' => esc_html__('Description Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .training-content p" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_meta_color', [
            'label' => esc_html__('Hover Title Color Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .training-item .training-overlay .training-overlay-content .title" => "color: {{VALUE}};"
            ]
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'style_hover_tab',
            [
                'label' => esc_html__('Hover', 'yotta-core'),
            ]
        );
        $this->add_control('hover_title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .single-training-box:hover .content .title" => "color: {{VALUE}};"
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
                "{{WRAPPER}}  .btn-wrap .boxed-btn.active" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('divider_01', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}}  .btn-wrap .boxed-btn.active"
        ]);
        $this->add_control('divider_02', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'price_plan_button_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}}  .btn-wrap .boxed-btn.active"
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab('hover_style', [
            'label' => esc_html__('Button Hover', "yotta-core")
        ]);
        $this->add_control('button_hover_normal_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}}  .btn-wrap .boxed-btn.active:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('divider_03', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'button_hover_background',
            'label' => esc_html__('Button Background ', 'yotta-core'),
            'selector' => "{{WRAPPER}}  .btn-wrap .boxed-btn.active:hover"
        ]);
        $this->add_control('divider_04', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Border::get_type(), [
            'name' => 'price_plan_hover_button_border',
            'label' => esc_html__('Border', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .boxed-btn.active:hover"

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
                    '{{WRAPPER}} .btn-wrap .boxed-btn.active' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();

        /* button styling end */


        /*  pagination styling tabs start */
        $this->start_controls_section(
            'pagination_settings_section',
            [
                'label' => esc_html__('Pagination Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->start_controls_tabs(
            'pagination_style_tabs'
        );

        $this->start_controls_tab(
            'pagination_style_normal_tab',
            [
                'label' => __('Normal', 'yotta-core'),
            ]
        );

        $this->add_control('pagination_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .blog-pagination ul li a" => "color: {{VALUE}}",
                "{{WRAPPER}} .blog-pagination ul li span" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('pagination_border_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Border Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .blog-pagination ul li a" => "border-color: {{VALUE}}",
                "{{WRAPPER}} .blog-pagination ul li span" => "border-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('pagination_hr', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'pagination_background',
            'label' => esc_html__('Background', 'yotta-core'),
            'selector' => "{{WRAPPER}} .blog-pagination ul li a, {{WRAPPER}} .blog-pagination ul li span"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'pagination_style_hover_tab',
            [
                'label' => __('Hover', 'yotta-core'),
            ]
        );
        $this->add_control('pagination_hover_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .blog-pagination ul li a:hover" => "color: {{VALUE}}",
                "{{WRAPPER}} .blog-pagination ul li span.current" => "color: {{VALUE}}",
            ]
        ]);
        $this->add_control('pagination_hover_border_color', [
            'type' => Controls_Manager::COLOR,
            'label' => esc_html__('Border Color', 'yotta-core'),
            'selectors' => [
                "{{WRAPPER}} .blog-pagination ul li a:hover" => "border-color: {{VALUE}}",
                "{{WRAPPER}} .blog-pagination ul li span.current" => "border-color: {{VALUE}}",
            ]
        ]);
        $this->add_control('pagination_hover_hr', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'name' => 'pagination_hover_background',
            'label' => esc_html__('Background', 'yotta-core'),
            'selector' => "{{WRAPPER}} .blog-pagination ul li a:hover, {{WRAPPER}} .blog-pagination ul li span.current"
        ]);


        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();
        /*  pagination styling tabs end */

        $this->start_controls_section(
            'typography_settings_section',
            [
                'label' => esc_html__('Typography Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .single-training-box .content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => esc_html__('Button Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .blank-btn"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .single-training-box .content p"
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
        $rand_numb = rand(333, 999999999);
        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "navleft" => yotta_core()->render_elementor_icons($settings['nav_left_arrow']),
            "navright" => yotta_core()->render_elementor_icons($settings['nav_right_arrow'])
        ];
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        //setup query
        $args = array(
            'post_type' => 'training',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'training-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);

        ?>
        <?php if ($settings['training_system'] === 'for-slider') : ?>
        <div class="training-carousel-one-wrapper">
            <div class="testimonial-carousel"
                 id="yotta-training-wrapper-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'>
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'yotta_classic', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $training_single_meta_data = get_post_meta(get_the_ID(), 'yotta_training_options', true);
                    $training_icon = $training_single_meta_data['training_icon'];
                    ?>
                    <div class="training-outer-wrap">
                        <div class="training-item text-center">
                            <?php if (!empty($training_icon)) {
                                printf('<div class="training-icon"> <i class="%1$s"></i></div>', esc_attr($training_icon));
                            } ?>
                            <div class="training-content">
                                <h3 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h3>
                                <?php Yotta_Excerpt($settings['excerpt_length']) ?>
                            </div>
                            <div class="training-overlay bg-overlay-base bg_img"
                                 style="background-image: url(<?php echo esc_url($img_url) ?>)">
                                <div class="training-overlay-content">
                                    <a href="<?php echo the_permalink() ?>">
                                        <h2 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h2>
                                    </a>
                                    <div class="btn-wrap">
                                        <a href="<?php the_permalink() ?>"
                                           class="boxed-btn active"><?php echo esc_html__('Training Details', 'yotta-core'); ?>
                                            <i class="fas fa-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <?php if (!empty($settings['nav'])) : ?>
                <div class="slick-carousel-controls">
                    <div class="slider-nav <?php echo $settings['nav_position'] ?>"></div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
        <?php if ($settings['training_system'] === 'for-grid') : ?>
        <div class="training-wrapper-content">
            <div class="row">
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'yotta_classic', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                    ?>
                    <div class="col-lg-<?php echo esc_attr($settings['column']); ?> col-md-6">
                        <div class="training-item text-center">
                            <div class="training-icon">
                                <img src="<?php echo esc_url($img_url) ?>" alt="<?php echo $img_alt ?>">
                            </div>
                            <div class="training-content">
                                <h3 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h3>
                                <p>Transport or transportation is the movement of humans, animals and goods from one
                                    location.</p>
                            </div>
                            <div class="training-overlay bg-overlay-base bg_img"
                                 data-background="assets/images/training/training-1.png">
                                <div class="training-overlay-content">
                                    <a href="<?php echo the_permalink() ?>">
                                        <h2 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h2>
                                    </a>
                                    <div class="btn-wrap">
                                        <a href="<?php the_permalink() ?>"
                                           class="boxed-btn active"><?php echo esc_html__('Training Details', 'yotta-core'); ?>
                                            <i class="fas fa-arrow-right ml-2"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    <?php endif; ?>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Training_Single_Slider_Widget());