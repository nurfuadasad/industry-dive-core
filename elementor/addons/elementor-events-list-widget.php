<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Event_Single_List_Widget extends Widget_Base
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
        return 'yotta-event-single-list-widget';
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
        return esc_html__('Event Single List', 'yotta-core');
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
                'selector' => '{{WRAPPER}} .event-content',
            ]
        );
        $this->add_control('normal_background_color', [
            'label' => esc_html__('Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-content" => "background-color: {{VALUE}};"
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
        $this->add_control('category_bg_color', [
            'label' => esc_html__('Category Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-post-meta .event-badge" => "background-color: {{VALUE}};"
            ]
        ]);
        $this->add_control('category_color', [
            'label' => esc_html__('Category Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-post-meta .event-badge" => "color: {{VALUE}};"
            ]
        ]);
        $this->add_control('date_color', [
            'label' => esc_html__('Date Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .event-post-meta .event-date" => "color: {{VALUE}};"
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
                "{{WRAPPER}} .event-content .title:hover" => "color: {{VALUE}};"
            ]
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
            'name' => 'title_typography',
            'label' => esc_html__('Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .event-content .title"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'category_typography',
            'label' => esc_html__('Event Category Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .event-post-meta .event-badge"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'date_typography',
            'label' => esc_html__('Event Date Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .event-post-meta .event-date"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'description_typography',
            'label' => esc_html__('Description Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .event-content p"
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
        <div class="event-wrapper">
            <?php
            while ($post_data->have_posts()) : $post_data->the_post();
                $post_id = get_the_ID();
                $post_categories = get_the_terms(get_the_ID(), 'event-cat');
                $event_single_meta_data = get_post_meta(get_the_ID(), 'yotta_event_options', true);
                ?>
                <div class="event-item">
                    <div class="event-content">
                        <div class="event-post-meta">
                            <div class="event-badge">
                                <?php if (!empty($post_categories)): ?>
                                    <ul>
                                        <?php foreach ($post_categories as $cats) : ?>
                                            <li><a href="<?php echo get_term_link($cats->slug, 'event-cat') ?>"><?php echo esc_attr($cats->name) ?></a></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                            </div>
                            <div class="event-date">
                                <span><?php echo $event_single_meta_data['event_date_option'] ?></span> <span><?php echo $event_single_meta_data['event_month_option'] ?></span> <span><?php echo $event_single_meta_data['event_year_option'] ?></span>
                            </div>
                        </div>
                        <a href="<?php echo the_permalink() ?>">
                            <h2 class="title"><?php echo esc_html(get_the_title($post_id)) ?></h2>
                        </a>
                        <?php Yotta_Excerpt($settings['excerpt_length']) ?>
                    </div>
                </div>
            <?php endwhile; ?>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Event_Single_List_Widget());