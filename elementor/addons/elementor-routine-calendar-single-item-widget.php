<?php
/**
 * Elementor Widget
 * @package Yotta
 * @since 1.0.0
 */

namespace Elementor;
class Yotta_Routine_Calendar_Item_List_Widget extends Widget_Base
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
        return 'yotta-single-careers-item-widget';
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
        return esc_html__('Routine Calendar', 'yotta-core');
    }

    public function get_keywords()
    {
        return ['themeim', 'yotta', 'image box'];
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
        return 'eicon-single-product';
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
            'background_image', [
                'label' => esc_html__('Background Image', 'yotta-core'),
                'type' => Controls_Manager::MEDIA,
                'show_label' => false,
                'description' => esc_html__('upload background image', 'yotta-core'),
                'default' => [
                    'src' => Utils::get_placeholder_image_src()
                ],
            ]
        );
        $repeater = new Repeater();
        $repeater->add_control('routine_time', [
            'label' => esc_html__('Title', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Routine', 'yotta-core')
        ]);
        $this->add_control(
            'calendar-routine-list',
            [
                'label' => esc_html__('Routine Time', 'yotta-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    'routine_time' => esc_html__('Routine', 'yotta-core')
                ]
            ]
        );


        $repeater = new Repeater();
        $repeater->add_control('days', [
            'label' => esc_html__('Day', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Monday', 'yotta-core')
        ]);
        $repeater->add_control('cycling_time', [
            'label' => esc_html__('Cycling Time', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Cycling {c}10 am - 11 am{/c}', 'yotta-core')
        ]);
        $repeater->add_control('karate_time', [
            'label' => esc_html__('Karate Time', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Karate {c}10 am - 11 am{/c}', 'yotta-core')
        ]);
        $repeater->add_control('yoga_time', [
            'label' => esc_html__('Yoga Time', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Yoga {c}10 am - 11 am{/c}', 'yotta-core')
        ]);
        $repeater->add_control('boxing_time', [
            'label' => esc_html__('Boxing Time', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Boxing {c}10 am - 11 am{/c}', 'yotta-core')
        ]);
        $repeater->add_control('jumping_time', [
            'label' => esc_html__('Jumping Time', 'yotta-core'),
            'type' => Controls_Manager::TEXT,
            'default' => esc_html__('Jumping {c}10 am - 11 am{/c}', 'yotta-core')
        ]);
        $this->add_control(
            'calendar-list',
            [
                'label' => esc_html__('Calendar Routine List', 'yotta-core'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    'days' => esc_html__('Monday', 'yotta-core'),
                    'cycling_time_one' => esc_html__('Cycling {c}10 am - 11 am{/c}', 'yotta-core')
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'styling_section',
            [
                'label' => esc_html__('Styling Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control('background_overlay_color', [
            'label' => esc_html__('Table Background Overlay Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .bg-overlay-black:after" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_color', [
            'label' => esc_html__('Heading Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .custom-table thead tr th" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_background_color', [
            'label' => esc_html__('Heading Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .custom-table thead tr" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('title_background_color_after', [
            'label' => esc_html__('Heading Border Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .custom-table thead tr th::after" => "background-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('table_border_color', [
            'label' => esc_html__('Table Border Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .custom-table tbody tr td" => "border-color: {{VALUE}}",
                "{{WRAPPER}} .custom-table tbody tr" => "border-color: {{VALUE}}"
            ]
        ]);
        $this->add_control('table_content_color', [
            'label' => esc_html__('Table Content Title Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .custom-table tbody tr td" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('table_content_span', [
            'label' => esc_html__('Table Content Span
             Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .custom-table tbody tr td span" => "color: {{VALUE}}"
            ]
        ]);
        $this->add_control('hover_background_color', [
            'label' => esc_html__('Hover Background Color', 'yotta-core'),
            'type' => Controls_Manager::COLOR,
            'selectors' => [
                "{{WRAPPER}} .custom-table tbody tr td::after" => "color: {{VALUE}}"
            ]
        ]);
        $this->end_controls_section();
        /* icon hover controls tabs end */


        $this->start_controls_section(
            'typography_section',
            [
                'label' => esc_html__('Typography Settings', 'yotta-core'),
                'tab' => Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'title_typography',
            'label' => esc_html__('Header Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .custom-table thead tr th"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_content_typography',
            'label' => esc_html__('Table Content Title Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .custom-table tbody tr td"
        ]);
        $this->add_group_control(Group_Control_Typography::get_type(), [
            'name' => 'hover_span_typography',
            'label' => esc_html__('Table Span Typography', 'yotta-core'),
            'selector' => "{{WRAPPER}} .custom-table tbody tr td span"
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

        $image_id = $settings['background_image']['id'];
        $image_url = !empty($image_id) ? wp_get_attachment_image_src($image_id, 'full', false)[0] : '';

        $routine_time_list = $settings['calendar-routine-list'];
        $calendar_list = $settings['calendar-list'];

        ?>
        <div class="schedule-area table-responsive">
            <table class="custom-table bg-overlay-black bg_img"
                   style="background-image: url(<?php echo esc_url($image_url) ?>)">
                <thead>
                <tr>
                    <?php foreach ($routine_time_list as $routine): ?>
                        <th><?php echo $routine['routine_time'] ?></th>
                    <?php endforeach ?>
                </tr>
                </thead>
                <tbody>
                <?php foreach ($calendar_list as $item) : ?>
                    <tr>
                        <td><?php echo $item['days'] ?></td>
                        <td class="<?php if (empty($item['cycling_time'])) echo 'blank-data' ?>">
                            <?php
                            $cycling_time = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $item['cycling_time']);
                            print wp_kses($cycling_time, yotta_core()->kses_allowed_html('all'));
                            ?>
                        </td>
                        <td class="<?php if (empty($item['karate_time'])) echo 'blank-data' ?>">
                            <?php
                            $karate_time = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $item['karate_time']);
                            print wp_kses($karate_time, yotta_core()->kses_allowed_html('all'));
                            ?>
                        </td>
                        <td class="<?php if (empty($item['yoga_time'])) echo 'blank-data' ?>">
                            <?php
                            $yoga_time = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $item['yoga_time']);
                            print wp_kses($yoga_time, yotta_core()->kses_allowed_html('all'));
                            ?>
                        </td>
                        <td class="<?php if (empty($item['boxing_time'])) echo 'blank-data' ?>"> <?php
                            $boxing_time = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $item['boxing_time']);
                            print wp_kses($boxing_time, yotta_core()->kses_allowed_html('all'));
                            ?>
                        </td>
                        <td class="<?php if (empty($item['jumping_time'])) echo 'blank-data' ?>"> <?php
                            $jumping_time = str_replace(['{c}', '{/c}'], ['<span>', '</span>'], $item['jumping_time']);
                            print wp_kses($jumping_time, yotta_core()->kses_allowed_html('all'));
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <?php
    }
}

Plugin::instance()->widgets_manager->register_widget_type(new Yotta_Routine_Calendar_Item_List_Widget());