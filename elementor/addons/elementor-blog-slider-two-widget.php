<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Blog_Post_Slider_Two_Widget extends Widget_Base
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
        return 'yotta-blog-two-widget';
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
        return esc_html__('Blog: Slider 02', 'yotta-core');
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
        return 'eicon-slider-album';
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
            'blog_system',
            [
                'label' => esc_html__('Blog Style System', 'yotta-core'),
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
                    '6' => esc_html__('02 Column', 'yotta-core'),
                    '3' => esc_html__('04 Column', 'yotta-core'),
                    '4' => esc_html__('03 Column', 'yotta-core'),
                    '2' => esc_html__('06 Column', 'yotta-core')
                ),
                'description' => esc_html__('select grid column', 'yotta-core'),
                'default' => '6'
            ]
        );
        $this->add_control(
            'pagination',
            [
                'label' => esc_html__('Pagination', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show pagination.', 'yotta-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'pagination_alignment',
            [
                'label' => esc_html__('Pagination Alignment', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'options' => array(
                    'left' => esc_html__('Left Align', 'yotta-core'),
                    'center' => esc_html__('Center Align', 'yotta-core'),
                    'right' => esc_html__('Right Align', 'yotta-core'),
                ),
                'description' => esc_html__('you can set pagination alignment.', 'yotta-core'),
                'default' => 'left',
                'condition' => array('pagination' => 'yes')
            ]
        );
        $this->add_control('read-btn', [
            'label' => esc_html__('Read More', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'description' => esc_html__('enter read button text', 'yotta-core'),
            'default' => esc_html__('Read More', 'yotta-core')
        ]);
        $this->add_control('total', [
            'label' => esc_html__('Total Posts', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => '-1',
            'description' => esc_html__('enter how many post you want in masonry , enter -1 for unlimited post.')
        ]);
        $this->add_control('category', [
            'label' => esc_html__('Category', 'yotta-core'),
            'type' => Controls_Manager::SELECT2,
            'multiple' => true,
            'options' => yotta_core()->get_terms_names('category', 'id'),
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
        $this->add_control(
            'excerpt_switch',
            [
                'label' => esc_html__('Excerpt Switch', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes to show excerpt.', 'yotta-core'),
                'default' => 'yes'
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
                    '{{WRAPPER}} .blog-slider-controls .slider-nav' => 'bottom: {{SIZE}}{{UNIT}};',
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
            'title_styling_settings_section',
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
        $this->add_control('normal_post_date_color', [
            'label' => esc_html__('Date Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-thumb .blog-date" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_date_bg_color', [
            'label' => esc_html__('Date Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-thumb .blog-date" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_meta_color', [
            'label' => esc_html__('Category Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-post-meta .category" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_user_color', [
            'label' => esc_html__('User Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-post-meta .user" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('normal_post_paragraph_color', [
            'label' => esc_html__('Paragraph Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-post-meta p" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'title_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'yotta-core'),
            ]
        );

        $this->add_control('hover_post_title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-content .title:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();


        $this->start_controls_section(
            'slider_navigation_styling_settings_section',
            [
                'label' => esc_html__('Slider Nav Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->start_controls_tabs(
            'slider_nav_style_tabs'
        );

        $this->start_controls_tab(
            'slider_navigation_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'yotta-core'),
            ]
        );
        $this->add_control('normal_nav_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-slider-controls .slider-nav div" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'nav_background',
            'selector' => "{{WRAPPER}} .blog-slider-controls .slider-nav div"
        ]);

        $this->end_controls_tab();

        $this->start_controls_tab(
            'slider_navigation_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'yotta-core'),
            ]
        );
        $this->add_control('hover_nav_color', [
            'label' => esc_html__('Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .blog-slider-controls .slider-nav div:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [
            'label' => esc_html__('Background', 'yotta-core'),
            'name' => 'nav_hover_background',
            'selector' => "{{WRAPPER}} .blog-slider-controls .slider-nav div:hover"
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

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
            'name' => 'post_meta_typography',
            'description' => esc_html__('select title typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .blog-content .title"
        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('Category Typography', 'yotta-core'),
            'name' => 'category_typography',
            'description' => esc_html__('select category typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .blog-post-meta .category"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'label' => esc_html__('User Typography', 'yotta-core'),
            'name' => 'user_typography',
            'description' => esc_html__('select user typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .blog-post-meta .user"
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
        $rand_numb = rand(333, 999999999);
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];
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
        //setup query
        $args = array(
            'post_type' => 'post',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish',
            'ignore_sticky_posts' => 1,
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'category',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>
        <?php if ($settings['blog_system'] === 'for-slider') : ?>
        <div class="blog-grid-carousel-wrapper blog-area">
            <div class="blog-grid-carousel" id="blog-grid-two-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                while ($post_data->have_posts()):$post_data->the_post();
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'yotta_grid', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                    $comments_count = get_comments_number(get_the_ID());
                    $comment_text = ($comments_count > 1) ? $comments_count . ' Comments' . '' : $comments_count . ' Comment' . '';
                    ?>
                    <div class="blog-outer-wrap">
                        <div class="blog-item" data-aos="zoom-in" data-aos-duration="1200">
                            <div class="blog-thumb">
                                <img src="<?php echo esc_url($img_url); ?>"
                                     alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="blog-date">
                                    <?php
                                    yotta()->posted_on();
                                    ?>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-post-meta">
                                    <?php yotta()->posted_by(); ?>
                                    <span class="category"><?php the_category(','); ?></span>
                                </div>
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <?php if ($settings['excerpt_switch'] == 'yes') {
                                    Yotta_Excerpt($settings['excerpt_length']);
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_query();
                ?>
            </div>
            <?php if (!empty($settings['nav'])) : ?>
                <div class="blog-slider-controls">
                    <div class="slider-nav"></div>
                </div>
            <?php endif; ?>
        </div>
    <?php endif; ?>
        <?php if ($settings['blog_system'] === 'for-grid') : ?>
        <div class="blog-grid-wrapper blog-area">
            <div class="row">
                <?php
                while ($post_data->have_posts()):$post_data->the_post();
                    $img_id = get_post_thumbnail_id(get_the_ID()) ? get_post_thumbnail_id(get_the_ID()) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'yotta_grid', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);

                    ?>
                    <div class="col-lg-<?php echo esc_attr($settings['column']); ?> col-md-6 blog-outer-wrap-two">
                        <div class="blog-item margin-bottom-30" data-aos="zoom-in" data-aos-duration="1200">
                            <div class="blog-thumb">
                                <img src="<?php echo esc_url($img_url); ?>"
                                     alt="<?php echo esc_attr($img_alt); ?>">
                                <div class="blog-date">
                                    <?php
                                    yotta()->posted_on();
                                    ?>
                                </div>
                            </div>
                            <div class="blog-content">
                                <div class="blog-post-meta">
                                    <?php yotta()->posted_by(); ?>
                                    <span class="category"><?php the_category(','); ?></span>
                                </div>
                                <h4 class="title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                                <?php if ($settings['excerpt_switch'] == 'yes') {
                                    Yotta_Excerpt($settings['excerpt_length']);
                                } ?>
                            </div>
                        </div>
                    </div>
                <?php
                endwhile;
                wp_reset_query();
                ?>
                <div class="col-lg-12">
                    <div class="blog-pagination text-<?php echo esc_attr($pagination_alignment) ?> margin-top-20">
                        <?php
                        if (!$pagination) {
                            yotta()->post_pagination($post_data);
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Blog_Post_Slider_Two_Widget());