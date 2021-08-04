<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Created by DungNobita.
 * User: Dung
 * Date: 25/7/2021
 * Time: 15:15 PM
 */

class CCT_Elementor_Widget_Banner_Countdown extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'banner_countdown';
    }

    public function get_title()
    {
        return esc_html__('Image Sale Countdown', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-image';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'widget_countdown',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'image_countdown',
            [
                'label' => __( 'Choose Image', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'date_end_sale',
            [
                'label' => __( 'Date End Sale', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::DATE_TIME,
            ]
        );

        $this->add_control(
            'title_countdown',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'placeholder' => esc_html__('Title banner', 'cct-helper'),
            ]
        );
        $this->add_control(
            'value_countdown',
            [
                'label' => __( 'Sale up to', 'cct-helper' ),
                'type' => Controls_Manager::SLIDER,
                'size_units' => ['%' ],
                'range' => [
                    '%' => [
                        'min' => 0,
                        'max' => 100,
                    ],
                ],
                'default' => [
                    'unit' => '%',
                    'size' => 50,
                ],
                'selectors' => [
                    '{{WRAPPER}} .sale_to' => 'width: {{SIZE}}{{UNIT}};',
                ],
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_style_general',
            [
                'label' => esc_html__('General', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'background',
                'label' => esc_html__('Background', 'cct-helper'),
                'types' => ['classic', 'gradient', 'video'],
                'selector' => '{{WRAPPER}} .banner-left--img',
            ]
        );

        $this->add_responsive_control(
            'align',
            [
                'label' => esc_html__('Alignment', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'left' => [
                        'title' => esc_html__('Left', 'cct-helper'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'center' => [
                        'title' => esc_html__('Center', 'cct-helper'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'right' => [
                        'title' => esc_html__('Right', 'cct-helper'),
                        'icon' => 'eicon-text-align-right',
                    ],
                    'justify' => [
                        'title' => esc_html__('Justified', 'cct-helper'),
                        'icon' => 'eicon-text-align-justify',
                    ],
                ],
                'default' => 'center',
                'selectors' => [
                    '{{WRAPPER}} .banner-left' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border',
                'selector' => '{{WRAPPER}} .banner-left--img',
                'separator' => 'before',
            ]
        );

        $this->add_control(
            'border_radius',
            [
                'label' => esc_html__('Border Radius', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em'],
                'selectors' => [
                    '{{WRAPPER}} .banner-left--img' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'border_box_shadow',
                'selector' => '{{WRAPPER}} .banner-left',
            ]
        );

        $this->add_responsive_control(
            'content_border',
            [
                'label' => esc_html__('Border Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .banner-left' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .banner-left--title__text h3',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .banner-left--title__text h3',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .banner-left--title__text h3' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'title_margin',
            [
                'label' => esc_html__('Title Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .banner-left--title__text h3' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_content',
                'selector' => '{{WRAPPER}} .banner-left--title__text p',
            ]
        );

        $this->add_control(
            'color_content',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .banner-left--title__text p' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Content Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .banner-left--title__text p' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

    }
    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>


        <div class="banner-left">
            <a href="#">
                <div class="banner-left--img">
                    <?php echo '<img src="' . $settings['image_countdown']['url'] . '">'; ?>
                </div>
                <div class="banner-left--title">
                    <div class="banner-left--title__time">
                        <div class="time">
                            <div class="countdown day">
                                <h4 id="day">32</h4>
                                <h6><?php echo esc_html__('Days', 'cct-helper'); ?></h6>
                            </div>
                        </div>
                        <div class="time">
                            <div class="countdown hour">
                                <h4 id="hour">24</h4>
                                <h6><?php echo esc_html__('Hrs', 'cct-helper'); ?></h6>
                            </div>
                        </div>
                        <div class="time">
                            <div class="countdown min">
                                <h4 id="mins">40</h4>
                                <h6><?php echo esc_html__('Mins', 'cct-helper'); ?></h6>
                            </div>
                        </div>
                        <div class="time">
                            <div class="countdown sec">
                                <h4 id="sec">60</h4>
                                <h6><?php echo esc_html__('Sec', 'cct-helper'); ?></h6>
                            </div>
                        </div>
                    </div>
                    <div class="banner-left--title__text">
                        <h3><?php echo $settings['title_countdown'] ?></h3>
                        <p><?php echo esc_html__('Sale up to', 'cct-helper'); ?> <span class="sale_to">
                                <?php echo $settings['value_countdown']['size'];?>
                                <?php echo $settings['value_countdown']['unit']; ?>
                            </span>
                            <?php echo esc_html__('off', 'cct-helper'); ?>
                        </p>
                    </div>
                </div>
            </a>
        </div>
        <script>
            var countDownDate = new Date("<?php echo $settings['date_end_sale']; ?>").getTime();
            var x = setInterval(function() {
                var now = new Date().getTime();
                var distance = countDownDate - now;
                var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                var seconds = Math.floor((distance % (1000 * 60)) / 1000);
                document.getElementById("day").innerHTML = days;
                document.getElementById("hour").innerHTML = hours;
                document.getElementById("mins").innerHTML = minutes;
                document.getElementById("sec").innerHTML = seconds;

                if (distance < 0) {
                    clearInterval(x);
                    document.getElementById("day").innerHTML = "EXPIRED";
                }
            }, 1000);
        </script>
    <?php
    }
}