<?php

use Elementor\Controls_Manager;
use Elementor\Core\Kits\Documents\Tabs\Global_Colors;
use Elementor\Core\Kits\Documents\Tabs\Global_Typography;
use Elementor\Group_Control_Typography;
use Elementor\Icons_Manager;
use Elementor\Repeater;
use Elementor\Utils;

class CCT_Widget_Accordion_Custom extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'accordion_custom';
    }

    public function get_title()
    {
        return esc_html__('Accordion Custom', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-accordion';

    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function register_controls()
    {
        $this->start_controls_section(
            'section_title',
            [
                'label' => esc_html__('Accordion Custom', 'cct-helper'),
            ]
        );

        $repeater = new Repeater();

        $repeater->add_control(
            'tab_title',
            [
                'label' => esc_html__('Title & Description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Accordion Title', 'cct-helper'),
                'dynamic' => [
                    'active' => true,
                ],
                'label_block' => true,
            ]
        );

        $repeater->add_control(
            'tab_content',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::WYSIWYG,
                'default' => esc_html__('Accordion Content', 'cct-helper'),
                'show_label' => false,
            ]
        );

        $this->add_control(
            'tabs',
            [
                'label' => esc_html__('Accordion Items', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [
                        'tab_title' => esc_html__('Accordion #1', 'cct-helper'),
                        'tab_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'cct-helper'),
                    ],
                    [
                        'tab_title' => esc_html__('Accordion #2', 'cct-helper'),
                        'tab_content' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit. Ut elit tellus, luctus nec ullamcorper mattis, pulvinar dapibus leo.', 'cct-helper'),
                    ],
                ],
                'title_field' => '{{{ tab_title }}}',
            ]
        );


        $this->add_control(
            'selected_icon',
            [
                'label' => esc_html__('Icon', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'separator' => 'before',
                'fa4compatibility' => 'icon',
                'default' => [
                    'value' => 'fas fa-plus',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'chevron-right',
                        'angle-right',
                        'angle-double-right',
                        'caret-right',
                        'caret-square-right',

                    ],
                    'fa-regular' => [
                        'caret-square-down',
                    ],
                ],
                'skin' => 'inline',
                'label_block' => false,
            ]
        );

        $this->add_control(
            'selected_active_icon',
            [
                'label' => esc_html__('Active Icon', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::ICONS,
                'fa4compatibility' => 'icon_active',
                'default' => [
                    'value' => 'fas fa-minus',
                    'library' => 'fa-solid',
                ],
                'recommended' => [
                    'fa-solid' => [
                        'chevron-down',
                        'angle-down',
                        'angle-double-down',
                        'caret-down',
                        'caret-square-down',
                    ],
                    'fa-regular' => [
                        'caret-square-up',
                    ],
                ],
                'skin' => 'inline',
                'label_block' => false,
                'condition' => [
                    'selected_icon[value]!' => '',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_title_style',
            [
                'label' => esc_html__('Accordion', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'border_width',
            [
                'label' => esc_html__('Border Width', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cct-accordion-item' => 'border-width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->add_control(
            'border_color',
            [
                'label' => esc_html__('Border Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-accordion-item' => 'border-color: {{VALUE}};',
                ],
            ]
        );
        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::SLIDER,
                'size_units' => ['px', '%'],
                'range' => [
                    'px' => [
                        'min' => 0,
                        'max' => 10,
                    ],
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'selectors' => [
                    '{{WRAPPER}} .cct-accordion-item' => 'border-radius: {{SIZE}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_toggle_style_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'title_background',
            [
                'label' => esc_html__('Background', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-title' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'title_color',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-accordion-icon, {{WRAPPER}} .cct-accordion-title' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_control(
            'tab_active_color',
            [
                'label' => esc_html__('Active Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .add .cct-accordion-icon, {{WRAPPER}} .add .cct-accordion-title' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'selector' => '{{WRAPPER}} .cct-accordion-title',

            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_toggle_style_icon',
            [
                'label' => esc_html__('Icon', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                'condition' => [
                    'selected_icon[value]!' => '',
                ],
            ]
        );

        $this->add_control(
            'icon_align',
            [
                'label' => esc_html__('Alignment', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Start', 'elementor'),
                        'icon' => 'eicon-h-align-left',
                    ],
                    'right' => [
                        'title' => esc_html__('End', 'cct-helper'),
                        'icon' => 'eicon-h-align-right',
                    ],
                ],
                'default' => is_rtl() ? 'right' : 'left',
                'toggle' => false,
            ]
        );

        $this->add_control(
            'icon_color',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-title .cct-accordion-icon i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .cct-tab-title .cct-accordion-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'icon_active_color',
            [
                'label' => esc_html__('Active Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .add .cct-accordion-icon i:before' => 'color: {{VALUE}};',
                    '{{WRAPPER}} .add .cct-accordion-icon svg' => 'fill: {{VALUE}};',
                ],
            ]
        );


        $this->end_controls_section();

        $this->start_controls_section(
            'section_toggle_style_content',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'content_background_color',
            [
                'label' => esc_html__('Background', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-content' => 'background-color: {{VALUE}};',
                ],
            ]
        );

        $this->add_control(
            'content_color',
            [
                'label' => esc_html__('Color', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-content' => 'color: {{VALUE}};',
                ],

            ]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'content_typography',
                'selector' => '{{WRAPPER}} .cct-tab-content',

            ]
        );


        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .cct-tab-content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        $migrated = isset($settings['__fa4_migrated']['selected_icon']);

        if (!isset($settings['icon']) && !Icons_Manager::is_migration_allowed()) {
            // @todo: remove when deprecated
            // added as bc in 2.6
            // add old default
            $settings['icon'] = 'fa fa-plus';
            $settings['icon_active'] = 'fa fa-minus';
            $settings['icon_align'] = $this->get_settings('icon_align');
        }

        $is_new = empty($settings['icon']) && Icons_Manager::is_migration_allowed();
        $has_icon = (!$is_new || !empty($settings['selected_icon']['value']));
        $id_int = substr($this->get_id_int(), 0, 3);
        ?>
        <div class="cct_widget_accordion_custom" role="tablist">
            <?php
            foreach ($settings['tabs'] as $index => $item) :
            $tab_count = $index + 1;

            $tab_title_setting_key = $this->get_repeater_setting_key('tab_title', 'tabs', $index);

            $tab_content_setting_key = $this->get_repeater_setting_key('tab_content', 'tabs', $index);

            $this->add_render_attribute($tab_title_setting_key, [
                'id' => 'cct-tab-title-' . $id_int . $tab_count,
                'class' => ['cct-tab-title'],
                'data-tab' => $tab_count,
                'role' => 'tab',
                'aria-controls' => 'cct-tab-content-' . $id_int . $tab_count,
                'aria-expanded' => 'false',
            ]);


            $this->add_render_attribute($tab_content_setting_key, [
                'id' => 'cct-tab-content-' . $id_int . $tab_count,
                'class' => ['cct-tab-content', 'cct-clearfix'],
                'data-tab' => $tab_count,
                'role' => 'tabpanel',
                'aria-labelledby' => 'cct-tab-title-' . $id_int . $tab_count,
            ]);

            $this->add_inline_editing_attributes($tab_content_setting_key, 'advanced');
            ?>
            <div class="cct-accordion-item">
                <div <?php echo $this->get_render_attribute_string($tab_title_setting_key); ?>
                >
                <?php if ($has_icon) : ?>
                    <span class="cct-accordion-icon cct-accordion-icon-<?php echo esc_attr($settings['icon_align']); ?>"
                          aria-hidden="true">
							<?php
                            if ($is_new || $migrated) { ?>
                                <span class="cct-accordion-icon-closed"><?php Icons_Manager::render_icon($settings['selected_icon']); ?></span>
                                <span class="cct-accordion-icon-opened"><?php Icons_Manager::render_icon($settings['selected_active_icon']); ?></span>
                            <?php } else { ?>
                                <i class="cct-accordion-icon-closed <?php echo esc_attr($settings['icon']); ?>"></i>
                                <i class="cct-accordion-icon-opened <?php echo esc_attr($settings['icon_active']); ?>"></i>
                            <?php } ?>
							</span>
                <?php endif; ?>
                <div class="cct-accordion-title" href=""><?php echo $item['tab_title']; ?></div>
            </div>
            <div class="line"></div>
            <div <?php echo $this->get_render_attribute_string($tab_content_setting_key); ?>><?php echo $this->parse_text_editor($item['tab_content']); ?></div>
        </div>
    <?php endforeach; ?>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script>
            $(document).ready(function () {
                $(".cct-tab-title").click(function () {
                    $(".cct-tab-title").removeClass("add");
                    $(this).addClass("add");
                    let wrapper = $(this).next(".line");
                    let wrapper1 = wrapper.next(".cct-tab-content");
                    if (wrapper1.hasClass("active")) {
                        wrapper1.removeClass("active").slideUp()
                        $(".cct-accordion-icon-closed").removeClass("d-none")
                        $(".cct-accordion-icon-opened").removeClass("d-block")
                    } else {
                        $(".cct-tab-title .cct-accordion-icon-closed").removeClass("d-none")
                        $(".cct-tab-title .cct-accordion-icon-opened").removeClass("d-block")
                        $(".cct-accordion-item .cct-tab-content").removeClass("active").slideUp()
                        wrapper1.addClass("active").slideDown()

                        $(".add .cct-accordion-icon-closed").addClass("d-none")
                        $(".add .cct-accordion-icon-opened").addClass("d-block")
                    }
                })
            })
        </script>
        <?php
    }

}