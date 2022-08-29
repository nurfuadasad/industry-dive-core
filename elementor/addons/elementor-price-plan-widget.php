<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Price_Plan_One_Widget extends Widget_Base
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
        return 'yotta-price-plan-one-widget';
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
        return esc_html__('Yotta : Price Plan 01', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['Price', 'Plan', 'Money', 'Yotta'];
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
        return 'eicon-price-table';
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
        $this->add_control('month_label', [
            'label' => esc_html__('Monthly Charge', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Monthly Charge ', 'yotta-core'),
            'description' => esc_html__('add month tab label', 'yotta-core')
        ]);
        $this->add_control('year_label', [
            'label' => esc_html__('Yearly Charge', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Yearly Charge', 'yotta-core'),
            'description' => esc_html__('add year tab label', 'yotta-core')
        ]);
        $repeater = new Repeater();

        $repeater->add_control(
            'choose_package',
            [
                'label' => esc_html__('Choose Package', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => 'monthly',
                'options' => [
                    'monthly' => esc_html__('Monthly Charge', 'yotta-core'),
                    'yearly' => esc_html__('Yearly Charge', 'yotta-core'),
                ],
            ]
        );
        $repeater->add_control(
            'active_package',
            [
                'label' => esc_html__('Active Package', 'yotta-core'),
                'type' => Controls_Manager::SELECT,
                'default' => '',
                'options' => [
                    'active' => esc_html__('Popular Charge', 'yotta-core'),
                    '' => esc_html__('Default Charge', 'yotta-core'),
                ],
            ]
        );
        $repeater->add_control('image',
            [
                'label' => esc_html__('Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'description' => esc_html__('enter title.', 'yotta-core'),
                'default' => array(
                    'url' => Utils::get_placeholder_image_src()
                )
            ]);
        $repeater->add_control('title', [
            'label' => esc_html__('Title', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Basic Plan', 'yotta-core'),
            'description' => esc_html__('enter title', 'yotta-core')

        ]);
        $repeater->add_control('description',
            [
                'label' => esc_html__('Description', 'yotta-core'),
                'type' => Controls_Manager::TEXTAREA,
                'description' => esc_html__('enter description', 'yotta-core'),
                'default' => esc_html__('Self-managed plans', 'yotta-core')
            ]);
        $repeater->add_control('price', [

            'label' => esc_html__('Price', 'yotta-core'),

            'type' => Controls_Manager::TEXT,

            'default' => esc_html__('49', 'yotta-core'),

            'description' => esc_html__('enter price', 'yotta-core')

        ]);

        $repeater->add_control('sign', [

            'label' => esc_html__('Sign', 'yotta-core'),

            'type' => Controls_Manager::TEXT,

            'default' => esc_html__('$', 'yotta-core'),

            'description' => esc_html__('enter sign', 'yotta-core')

        ]);

        $repeater->add_control('month', [

            'label' => esc_html__('Month', 'yotta-core'),

            'type' => Controls_Manager::TEXT,

            'default' => esc_html__('/mo', 'yotta-core'),

            'description' => esc_html__('enter month', 'yotta-core')

        ]);

        $repeater->add_control('btn_text', [
            'label' => esc_html__('Button Text', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Get Started Now', 'yotta-core'),
            'description' => esc_html__('enter button text', 'yotta-core')

        ]);

        $repeater->add_control('btn_link', [
            'label' => esc_html__('Button Link', 'yotta-core'),
            'type' => Controls_Manager::URL,
            'default' => array(
                'url' => '#'
            ),
            'description' => esc_html__('enter button link', 'yotta-core')

        ]);
        $repeater->add_control(

            'feature', [

                'label' => esc_html__('Feature Item', 'yotta-core'),

                'type' => Controls_Manager::TEXTAREA,

                'default' => esc_html__('AMD EPYC™ 7351P', 'yotta-core'),

                'description' => esc_html__('enter feature item', 'yotta-core')

            ]

        );
        $this->add_control(
            'price-plan-list',
            [
                'label' => esc_html__('Price Plan Item', 'libo-master'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title_field' => '{{{ title }}}',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section('price_plan_styling_section', [

            'label' => esc_html__('Styling Settings', 'yotta-core'),

            'tab' => Controls_Manager::TAB_STYLE

        ]);


        $this->start_controls_tabs(

            'price_plan_style_tabs'

        );


        $this->start_controls_tab(

            'price_plan_style_normal_tab',

            [

                'label' => __('Normal', 'yotta-core'),

            ]

        );

        $this->add_group_control(Group_Control_Background::get_type(), [

            'name' => 'price_plan_background',

            'label' => esc_html__('Price Plan Background ', 'yotta-core'),

            'selector' => "{{WRAPPER}} .plan-item"

        ]);

        $this->add_control('title_color', [

            'label' => esc_html__('Title Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-header .plan-badge" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [

            'name' => 'price_title_background',

            'label' => esc_html__('Price Title Background ', 'yotta-core'),

            'selector' => "{{WRAPPER}} .plan-header .plan-badge"

        ]);
        $this->add_control('paragraph_color', [

            'label' => esc_html__('Paragraph Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-header p" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_control('price_color', [

            'label' => esc_html__('Price Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-price-area .price-title" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_control('price_month_color', [

            'label' => esc_html__('Price Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .plan-price-area .price-title sub" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('features_icon_color', [

            'label' => esc_html__('Features Icon Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-list li::before" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_control('features_color', [

            'label' => esc_html__('Features Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-list li" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_control('plan_bg_button_color', [

            'label' => esc_html__('Button Background Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-footer" => "background-color: {{VALUE}}"

            ]

        ]);
        $this->add_control('plan_button_color', [

            'label' => esc_html__('Button Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-footer .title" => "color: {{VALUE}}"

            ]

        ]);


        $this->end_controls_tab();


        $this->start_controls_tab(

            'price_plan_style_hover_tab',

            [

                'label' => __('Hover', 'yotta-core'),

            ]

        );


        $this->add_group_control(Group_Control_Background::get_type(), [

            'name' => 'price_hover_plan_background',

            'label' => esc_html__('Price Plan Background ', 'yotta-core'),

            'selector' => "{{WRAPPER}} .plan-overlay::after"

        ]);

        $this->add_control('title_hover_color', [

            'label' => esc_html__('Title Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-header .plan-badge" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_group_control(Group_Control_Background::get_type(), [

            'name' => 'price_hover_title_background',

            'label' => esc_html__('Price Title Background ', 'yotta-core'),

            'selector' => "{{WRAPPER}} .plan-header.active .plan-badge"

        ]);
        $this->add_control('paragraph_hover_color', [

            'label' => esc_html__('Paragraph Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-item:hover .plan-header p" => "color: {{VALUE}}",
                "{{WRAPPER}} .plan-item.active .plan-header p" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_control('price_hover_color', [

            'label' => esc_html__('Price Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-item:hover .plan-price-area .price-title" => "color: {{VALUE}}",
                "{{WRAPPER}} .plan-item.active .plan-price-area .price-title" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_control('features_hover_icon_color', [

            'label' => esc_html__('Features Icon Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-list:hover li::before" => "color: {{VALUE}}",
                "{{WRAPPER}} .plan-list.active li::before" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_control('features_hover_color', [

            'label' => esc_html__('Features Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-item:hover .plan-list li" => "color: {{VALUE}}",
                "{{WRAPPER}}  .plan-item.active .plan-list li" => "color: {{VALUE}}"

            ]

        ]);
        $this->add_control('plan_hover_bg_button_color', [

            'label' => esc_html__('Button Background Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-item:hover .plan-footer" => "background-color: {{VALUE}}",
                "{{WRAPPER}} .plan-item.active .plan-footer" => "background-color: {{VALUE}}"

            ]

        ]);
        $this->add_control('plan_hover_button_color', [

            'label' => esc_html__('Button Color', 'yotta-core'),

            'type' => Controls_Manager::COLOR,

            'selectors' => [

                "{{WRAPPER}} .plan-footer:hover .title" => "color: {{VALUE}}",
                "{{WRAPPER}} .plan-footer:active .title" => "color: {{VALUE}}"

            ]

        ]);

        $this->end_controls_tab();


        $this->end_controls_tabs();


        $this->end_controls_section();



        /* typography settings start */

        $this->start_controls_section('typography_settings', [

            'label' => esc_html__('Typography Settings', 'yotta-core'),

            'tab' => Controls_Manager::TAB_STYLE

        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [

            'name' => 'title_typography',

            'label' => esc_html__('Title Typography', 'yotta-core'),

            'selector' => "{{WRAPPER}} .plan-header .plan-badge"

        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [

            'name' => 'price_typography',

            'label' => esc_html__('Price Typography', 'yotta-core'),

            'selector' => "{{WRAPPER}} .plan-price-area .price-title"

        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [

            'name' => 'features_typography',

            'label' => esc_html__('Features Typography', 'yotta-core'),

            'selector' => "{{WRAPPER}} .plan-list li"

        ]);

        $this->add_group_control(Group_Control_Typography::get_type(), [

            'name' => 'button_typography',

            'label' => esc_html__('Button Typography', 'yotta-core'),

            'selector' => "{{WRAPPER}} .plan-footer .title"

        ]);

        $this->end_controls_section();

        /* typography settings end */

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
        $price_plan_item = $settings['price-plan-list'];
        ?>

        <div class="price-plan-tabs">
            <nav class="plan-tab" data-aos="fade-up" data-aos-duration="1200">
                <span class="monthly_tab_title"><?php echo esc_html($settings['month_label']); ?></span>
                <span class="plan-tab-switcher"></span>
                <span class="annual_tab_title"><?php echo esc_html($settings['year_label']); ?></span>
            </nav>
            <div class="plan-area change-subs-duration">
                <div class="row">
                    <?php foreach ($price_plan_item as $details_item) :
                        $image_id = $details_item['image']['id'] ?? '';
                        $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        if ('monthly' == $details_item['choose_package']) {
                            continue;
                        }
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
                            <div class="plan-item margin-bottom-30 <?php echo esc_attr($details_item['active_package']); ?>">
                                <div class="plan-header-area">
                                    <div class="plan-icon">
                                        <img src="<?php echo esc_url($image_url) ?>"
                                             alt="<?php echo esc_attr($image_alt) ?>">
                                    </div>
                                    <div class="plan-header">
                                        <?php
                                        if ($details_item['active_package'] === 'active') {
                                            printf('<span class="plan-badge"> ' . esc_html('POPULAR') . '</span>');
                                        }
                                        ?>
                                        <h3 class="title"><?php echo esc_html($details_item['title']); ?></h3>
                                        <p><?php echo esc_html($details_item['description']); ?></p>
                                    </div>
                                </div>
                                <div class="plan-body">
                                    <div class="plan-price-area">
                                        <h3 class="price-title"><?php echo esc_html($details_item['sign']);
                                            echo esc_html($details_item['price']); ?>
                                            <span><?php echo esc_html($details_item['month']); ?></span></h3>
                                        <div class="plan-btn">
                                            <a href="<?php echo esc_url($details_item['btn_link']['url']); ?>"
                                               class="btn--base button-animation"><i
                                                        class="las la-plus"></i> <?php echo esc_html($details_item['btn_text']); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="plan-list">
                                        <?php
                                        $all_feature_items = explode("\n", $details_item['feature']);
                                        foreach ($all_feature_items as $feature) {
                                            printf('<li>%1$s</li>', esc_html($feature));
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="bottom-shape"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <div class="plan-area">
                <div class="row">
                    <?php foreach ($price_plan_item as $details_item) :
                        $image_id = $details_item['image']['id'] ?? '';
                        $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';
                        $image_alt = get_post_meta($image_id, '_wp_attachment_image_alt', true);
                        if ('yearly' == $details_item['choose_package']) {
                            continue;
                        }
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-10">
                            <div class="plan-item margin-bottom-30 <?php echo esc_attr($details_item['active_package']); ?>">
                                <div class="plan-header-area margin-top-40">
                                    <div class="plan-icon">
                                        <img src="<?php echo esc_url($image_url) ?>"
                                             alt="<?php echo esc_attr($image_alt) ?>">
                                    </div>
                                    <div class="plan-header">
                                        <?php
                                        if ($details_item['active_package'] === 'active') {
                                            printf('<span class="plan-badge"> ' . esc_html('POPULAR') . '</span>');
                                        }
                                        ?>
                                        <h3 class="title"><?php echo esc_html($details_item['title']); ?></h3>
                                        <p><?php echo esc_html($details_item['description']); ?></p>
                                    </div>
                                </div>
                                <div class="plan-body">
                                    <div class="plan-price-area">
                                        <h3 class="price-title"><?php echo esc_html($details_item['sign']);
                                            echo esc_html($details_item['price']); ?>
                                            <span><?php echo esc_html($details_item['month']); ?></span></h3>
                                        <div class="plan-btn">
                                            <a href="<?php echo esc_url($details_item['btn_link']['url']); ?>"
                                               class="btn--base button-animation"><i
                                                        class="las la-plus"></i> <?php echo esc_html($details_item['btn_text']); ?>
                                            </a>
                                        </div>
                                    </div>
                                    <ul class="plan-list">
                                        <?php
                                        $all_feature_items = explode("\n", $details_item['feature']);
                                        foreach ($all_feature_items as $feature) {
                                            printf('<li>%1$s</li>', esc_html($feature));
                                        }
                                        ?>
                                    </ul>
                                </div>
                                <div class="bottom-shape"></div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Price_Plan_One_Widget());