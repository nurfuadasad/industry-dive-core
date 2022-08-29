<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Training_Single_Grid_Widget extends Widget_Base
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
        return 'yotta-training-single-grid-widget';
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
        return esc_html__('Training Grid', 'yotta-core');
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
                    '3' => esc_html__('04 Column', 'yotta-core'),
                    '4' => esc_html__('03 Column', 'yotta-core'),
                    '2' => esc_html__('06 Column', 'yotta-core')
                ),
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
        $this->add_control('normal_description_color', [
            'label' => esc_html__('Description Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .training-content p" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('normal_meta_color', [
            'label' => esc_html__('Price Color Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .training-section--style .training-content .training-footer-area .title" => "color: {{VALUE}};"
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
        <div class="training-section--style">
            <div class="row">

                <?php
                while ($post_data->have_posts()) : $post_data->the_post();
                    $post_id = get_the_ID();
                    $img_id = get_post_thumbnail_id($post_id) ? get_post_thumbnail_id($post_id) : false;
                    $img_url_val = $img_id ? wp_get_attachment_image_src($img_id, 'yotta_classic', false) : '';
                    $img_url = is_array($img_url_val) && !empty($img_url_val) ? $img_url_val[0] : '';
                    $img_alt = get_post_meta($img_id, '_wp_attachment_image_alt', true);
                    $training_single_meta_data = get_post_meta(get_the_ID(), 'yotta_training_options', true);
                    $training_icon = $training_single_meta_data['training_icon'];
                    ?>
                    <div class="col-lg-<?php echo esc_attr($settings['column']); ?> col-md-6">
                        <div class="training-item aos-init margin-bottom-30">
                            <div class="training-thumb">
                                <img src="<?php echo esc_url($img_url) ?>"
                                     alt="<?php echo esc_attr($img_alt) ?>">
                            </div>
                            <div class="training-content">
                                <div class="training-icon-area">
                                    <?php if (!empty($training_icon)) {
                                        printf('<div class="training-icon"> <i class="%1$s"></i></div>', esc_attr($training_icon));
                                    } ?>
                                </div>
                                <a href="<?php echo the_permalink() ?>">
                                    <h2 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h2>
                                </a>
                                <?php Yotta_Excerpt($settings['excerpt_length']) ?>
                                <div class="training-footer-area">
                                    <div class="training-price">
                                        <h4 class="title"><?php echo $training_single_meta_data['training_price_option'] ?></h4>
                                    </div>
                                    <div class="training-footer-btn">
                                        <a href="<?php the_permalink() ?>"><i
                                                    class="fas fa-arrow-right"></i></a>
                                    </div>
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

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Training_Single_Grid_Widget());