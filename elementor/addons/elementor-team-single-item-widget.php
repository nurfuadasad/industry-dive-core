<?php
/**
 * Elementor Widget
 * @package yotta
 * @since 1.0.0
 */

namespace Elementor;

class Yotta_Team_Member_One_Widget extends Widget_Base
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
        return 'yotta-team-member-one-widget';
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
        return esc_html__('Team Slider: 01', 'yotta-core');
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
        return 'eicon-person';
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
            'slider_settings_section',
            [
                'label' => esc_html__('Slider Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'team_system',
            [
                'label' => esc_html__('Team Style System', 'yotta-core'),
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
                'default' => '3'
            ]
        );
        $this->add_control(
            'even_system',
            [
                'label' => esc_html__('Blog Style System', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'style-01',
                'options' => [
                    '' => esc_html__('Normal Style', 'yotta-core'),
                    'style-01' => esc_html__('Even Style', 'yotta-core'),
                ],
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
            'options' => yotta()->get_terms_names('team-cat', 'id'),
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
            'items',
            [
                'label' => esc_html__('slidesToShow', 'yotta-core'),
                'type' => Controls_Manager::NUMBER,
                'description' => esc_html__('you can set how many item show in slider', 'yotta-core'),
                'default' => '3',
            ]
        );
        $this->add_control(
            'margin',
            [
                'label' => esc_html__('Margin', 'yotta-core'),
                'description' => esc_html__('you can set margin for slider', 'yotta-core'),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 100,
                        'step' => 5,
                    ]
                ],
                'default' => [
                    'unit' => 'px',
                    'size' => 0,
                ],
                'size_units' => ['px']
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
            ]
        );
        $this->add_control(
            'nav',
            [
                'label' => esc_html__('Nav', 'yotta-core'),
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
            'dots',
            [
                'label' => esc_html__('Dots', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => 'yes'
            ]
        );
        $this->add_control(
            'dots_position',
            [
                'label' => esc_html__('Dot Position', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    '' => esc_html__('Normal', 'yotta-core'),
                    'style-01' => esc_html__('Top Position', 'yotta-core'),
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
                    'value' => 'fas fa-arrow-left',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'nav_right_arrow',
            [
                'label' => esc_html__('Nav Right Icon', 'yotta-core'),
                'type' => Controls_Manager::ICONS,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),
                'default' => [
                    'value' => 'fas fa-arrow-right',
                    'library' => 'solid',
                ],
                'condition' => ['nav' => 'yes']
            ]
        );
        $this->add_control(
            'center',
            [
                'label' => esc_html__('Center', 'yotta-core'),
                'type' => Controls_Manager::SWITCHER,
                'description' => esc_html__('you can set yes/no to enable/disable', 'yotta-core'),

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
            'team_member_styling_settings_section',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control('border_name_color', [
            'label' => esc_html__('Image Hover Border Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .trainer-item:hover .trainer-thumb::before" => "border-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('name_color', [
            'label' => esc_html__('Name Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .trainer-content .title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('name_color_hover', [
            'label' => esc_html__('Name Hover Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .trainer-content .title:hover" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('designation_color', [
            'label' => esc_html__('Designation Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .trainer-content .sub-title" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('team_social_icon_styling_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);

        $this->start_controls_tabs(
            'team_social_icon_style_tabs'
        );

        $this->start_controls_tab(
            'team_social_icon_style_normal_tab',
            [
                'label' => esc_html__('Normal', 'yotta-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'social_bg_icon_normal_background',
                'label' => esc_html__('Background', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .trainer-thumb .trainer-overlay .social-list li a',
            ]
        );
        $this->add_control('social_icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .trainer-thumb .trainer-overlay .social-list li a" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_tab();

        $this->start_controls_tab(
            'team_social_icon_style_hover_tab',
            [
                'label' => esc_html__('Hover', 'yotta-core'),
            ]
        );
        $this->add_group_control(
            Group_Control_Background::get_type(),
            [
                'name' => 'social_icon_hover_background',
                'label' => esc_html__('Background', 'yotta-core'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .team-single-item-02 .social-icon li:hover',
            ]
        );
        $this->add_control('social_hover_icon_color', [
            'label' => esc_html__('Icon Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .team-single-item-02 .social-icon li:hover" => "color: {{VALUE}}"
            ]
        ]);

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->add_control('team_typography_divider', [
            'type' => Controls_Manager::DIVIDER
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'name_typography',
            'label' => esc_html__('Name Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .trainer-content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'designation_typography',
            'label' => esc_html__('Designation Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .trainer-content .sub-title"
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
        //slider settings
        $slider_settings = [
            "loop" => esc_attr($settings['loop']),
            "margin" => esc_attr($settings['margin']['size'] ?? 0),
            "items" => esc_attr($settings['items'] ?? 1),
            "center" => esc_attr($settings['center']),
            "autoplay" => esc_attr($settings['autoplay']),
            "autoplaytimeout" => esc_attr($settings['autoplaytimeout']['size'] ?? 0),
            "nav" => esc_attr($settings['nav']),
            "dot" => esc_attr($settings['dots']),
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
            'post_type' => 'team',
            'posts_per_page' => $total_posts,
            'order' => $order,
            'orderby' => $orderby,
            'post_status' => 'publish'
        );

        if (!empty($category)) {
            $args['tax_query'] = array(
                array(
                    'taxonomy' => 'team-cat',
                    'field' => 'term_id',
                    'terms' => $category
                )
            );
        }
        $post_data = new \WP_Query($args);
        ?>
        <?php if ($settings['team_system'] === 'for-slider') : ?>
        <div class="team-member-carousel-wrapper yotta-rtl-slider">
            <div class="team-member-carousel"
                 id="team-member-one-carousel-<?php echo esc_attr($rand_numb); ?>"
                 data-settings='<?php echo json_encode($slider_settings) ?>'
            >
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'yotta_classic', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                    $team_single_meta_data = get_post_meta(get_the_ID(), 'yotta_team_options', true);
                    $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                    ?>
                    <div class="tm-outer-wrap">
                        <div class="trainer-item <?php if ($settings['even_system'] === 'style-01') echo 'style-01' ?>">
                            <div class="trainer-thumb" style="background-image: url(<?php echo esc_url($img_url) ?>)">
                                <div class="trainer-overlay">
                                    <div class="share-area">
                                        <div class="share-icon">
                                            <i class="fas fa-share-alt"></i>
                                        </div>
                                        <ul class="social-list">
                                            <?php
                                            if (!empty($social_icons)) {
                                                foreach ($social_icons as $item) {
                                                    printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="trainer-content">
                                <a href="<?php the_permalink() ?>">
                                    <h2 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h2>
                                </a>
                                <span class="sub-title"><?php echo $team_single_meta_data['designation'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="slick-carousel-controls">
                <?php if (!empty($settings['nav'])) : ?>
                    <div class="slider-nav <?php echo $settings['nav_position'] ?>"></div>
                <?php endif;
                if (!empty($settings['dots'])) : ?>
                    <div class="slider-dots <?php echo $settings['dots_position'] ?>"></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
        <?php if ($settings['team_system'] === 'for-grid') : ?>
        <div class="team-member-wrapper yotta-rtl-slider">
            <div class="row">
                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'yotta_classic', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                    $team_single_meta_data = get_post_meta(get_the_ID(), 'yotta_team_options', true);
                    $social_icons = isset($team_single_meta_data['social-icons']) && !empty($team_single_meta_data['social-icons']) ? $team_single_meta_data['social-icons'] : '';

                    ?>
                    <div class="col-lg-<?php echo esc_attr($settings['column']); ?> col-md-6">
                        <div class="trainer-item margin-bottom-20 <?php if ($settings['even_system'] === 'style-01') echo 'style-01' ?>">
                            <div class="trainer-thumb" style="background-image: url(<?php echo esc_url($img_url) ?>)">
                                <div class="trainer-overlay">
                                    <div class="share-area">
                                        <div class="share-icon">
                                            <i class="fas fa-share-alt"></i>
                                        </div>
                                        <ul class="social-list">
                                            <?php
                                            if (!empty($social_icons)) {
                                                foreach ($social_icons as $item) {
                                                    printf('<li><a href="%1$s"><i class="%2$s"></i></a></li>', $item['url'], $item['icon']);
                                                }
                                            }
                                            ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="trainer-content">
                                <a href="<?php the_permalink() ?>">
                                    <h2 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h2>
                                </a>
                                <span class="sub-title"><?php echo $team_single_meta_data['designation'] ?></span>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
            <div class="slick-carousel-controls">
                <?php if (!empty($settings['nav'])) : ?>
                    <div class="slider-nav <?php echo $settings['nav_position'] ?>"></div>
                <?php endif;
                if (!empty($settings['dots'])) : ?>
                    <div class="slider-dots <?php echo $settings['dots_position'] ?>"></div>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Team_Member_One_Widget());