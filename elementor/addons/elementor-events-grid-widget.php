<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Event_Single_Grid_Widget extends Widget_Base
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
        return 'yotta-event-single-grid-widget';
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
        return esc_html__('Event Single Grid', 'yotta-core');
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
            'options' => yotta()->get_terms_names('event-cat', 'id'),
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
        $this->add_control('excerpt_length', [
            'label' => esc_html__('Excerpt Length', 'yotta-core'),
            'type' => Controls_Manager::SELECT,
            'options' => array(
                25 => esc_html__('Short', 'yotta-core'),
                55 => esc_html__('Regular', 'yotta-core'),
                100 => esc_html__('Long', 'yotta-core'),
            ),
            'default' => 25,
            'description' => esc_html__('select excerpt length', 'yotta-core')
        ]);
        $this->add_control('readmore_text', [
            'label' => esc_html__('Read More Text', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Read More', 'yotta-core')
        ]);
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
        $this->add_group_control(
            Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'box_shadow',
                'label' => esc_html__('Box Shadow', 'yotta-core'),
                'selector' => '{{WRAPPER}} .event-section-two .event-content',
            ]
        );
        $this->add_control('normal_background_color', [
            'label' => esc_html__('Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-section-two .event-content" => "background-color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_title_color', [
            'label' => esc_html__('Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-content .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_description_color', [
            'label' => esc_html__('Description Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-content p" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control(
            'item_padding',
            [
                'label' => esc_html__('Button Padding', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .blank-btn' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_control(
            'background_border_radius',
            [
                'label' => esc_html__('Button Border Radius', 'yotta-core'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%'],
                'selectors' => [
                    '{{WRAPPER}} .btn-wrap .blank-btn' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'icon_bg_color',
                'label' => esc_html__('Background Image', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => "{{WRAPPER}} .btn-wrap .blank-btn"
            ]
        );
        $this->add_control('button_color', [
            'label' => esc_html__('Button Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-section-two .event-content .event-btn a" => "color: {{VALUE}};"
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
                "{{WRAPPER}} .event-section-two .event-item:hover .content .title" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('hover_description_color', [
            'label' => esc_html__('Description Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-section-two .event-item:hover .content p" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('button_hover_color', [
            'label' => esc_html__('Button Hover Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .btn-wrap .blank-btn:hover" => "color: {{VALUE}};"
            ]
        ]);
        $this->end_controls_tab();

        $this->end_controls_tabs();
        $this->end_controls_section();


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
            'selector' => "{{WRAPPER}} .event-section-two .event-item .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'button_typography',
            'label' => esc_html__('Button Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .btn-wrap .blank-btn"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .event-section-two .event-item .content .package-grid li"
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
        //query settings
        $total_posts = $settings['total'];
        $category = $settings['category'];
        $order = $settings['order'];
        $orderby = $settings['orderby'];
        //other settings
        $pagination = $settings['pagination'] ? false : true;
        $pagination_alignment = $settings['pagination_alignment'];
        //setup query
        $args = array(
            'post_type' => 'event',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'event-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);

        ?>
        <div class="event-section-two">
            <div class="row">
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'full', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $event_single_meta_data = get_post_meta(get_the_ID(), 'yotta_event_options', true);
                    ?>
                    <div class="col-xl-<?php echo esc_attr($settings['column']); ?> col-lg-6 col-md-12 margin-bottom-30">
                        <div class="event-item">
                            <div class="event-thumb" style="background-image: url(<?php echo esc_url($img_url) ?>)">
                            </div>
                            <div class="event-content">
                                <div class="event-meta-area">
                                    <div class="event-post-meta">
                                        <div class="event-location">
                                            <span><i class="fas fa-map-marker-alt"></i> <?php echo $event_single_meta_data['event_location_option'] ?></span>
                                        </div>
                                        <div class="event-date">
                                            <span><i class="fas fa-clock"></i> <?php echo $event_single_meta_data['event_time_option'] ?></span>
                                        </div>
                                    </div>
                                    <div class="event-badge">
                                        <h3 class="badge-title"><span><?php echo $event_single_meta_data['event_date_option'] ?></span> <span class="month"><?php echo $event_single_meta_data['event_month_option'] ?></span></h3>
                                    </div>
                                </div>
                                <h3 class="title"><a
                                            href="<?php echo the_permalink() ?>"><?php echo esc_html(get_the_title($post_id)) ?></a>
                                </h3>
                                <?php Yotta_Excerpt($settings['excerpt_length']) ?>
                                <div class="event-btn">
                                    <a href="<?php echo the_permalink() ?>"><?php esc_html_e('Read More', 'yotta-core'); ?>
                                        <i class="fas fa-arrow-right ml-2"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
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
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Event_Single_Grid_Widget());