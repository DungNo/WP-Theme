<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_Slider_Header extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'slider_header';
    }

    public function get_title()
    {
        return esc_html__('Slider Header', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-slides';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }

    protected function _register_controls()
    {
        $this->start_controls_section(
            'section_slider_header',
            [
                'label' => esc_html__('List Slide Show', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'image',
            [
                'label' => esc_html__('Choose Image', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $repeater->add_control(
            'title',
            [
                'label' => esc_html__('Title', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Stunning Design'),
            ]
        );

        $repeater->add_control(
            'description',
            [
                'label' => esc_html__('Description', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__('Type your description here', 'cct-helper'),
                'default' => esc_html__('We create themes with advanced & useful extensions to streamline your online stores'),
            ]
        );

        $repeater->add_control(
            'button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('Access'),
            ]
        );


        $this->add_control(
            'list',
            [
                'label' => esc_html__('List', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'default' => [
                    [

                        'image' => esc_html__('List', 'cct-helper'),

                    ],
                ],
                'title_field' => '{{{ title }}}',
            ]
        );


        $gallery_columns = range(1, 4);
        $gallery_columns = array_combine($gallery_columns, $gallery_columns);

        $this->add_control(
            'info_columns',
            [
                'label' => esc_html__('Columns', 'cct-helper'),
                'type' => Controls_Manager::SELECT,
                'default' => 1,
                'options' => $gallery_columns,
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
                'selector' => '{{WRAPPER}} .slider-main',
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
                'default' => 'left',
                'selectors' => [
                    '{{WRAPPER}} .slider' => 'text-align: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'border_box_shadow',
                'selector' => '{{WRAPPER}} .slider',
            ]
        );

        $this->add_responsive_control(
            'slider_padding',
            [
                'label' => esc_html__('Border Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .slider' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .content_1 h1',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Text_Shadow::get_type(),
            [
                'name' => 'text_shadow_title',
                'selector' => '{{WRAPPER}} .content_1h1',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .content_1 h1' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .content_1' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                'selector' => '{{WRAPPER}} .content_2 h4',
            ]
        );

        $this->add_control(
            'color_content',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .content_2 h4' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'content_padding',
            [
                'label' => esc_html__('Content Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content_2 h4' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button', 'cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'typography_button',
                'selector' => '{{WRAPPER}} .content__link a',
            ]
        );
        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border_button',
                'label' => esc_html__( 'Border', 'cct-helper' ),
                'selector' => '{{WRAPPER}} .content__link a',
            ]
        );

        $this->add_control(
            'color_button',
            [
                'label'        => esc_html__('Color', 'cct-helper'),
                'type'        => \Elementor\Controls_Manager::COLOR,
                'selectors'    => [
                    '{{WRAPPER}} .content__link a' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'button_padding',
            [
                'label' => esc_html__('Button Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .content__link a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }

    protected function render()
    {
        $settings = $this->get_settings_for_display(); ?>
            <div class="slider">
                    <div >
                        <ul class="slider-main">
                            <?php if ($settings['list']) {
                            $x = 12 / $settings['info_columns'];
                            foreach ($settings['list'] as $item) { ?>
                                <li>
                                    <div class="slider-main__img">
                                        <?php echo '<img src="' . $item['image']['url'] . '">'; ?>
                                    </div>
                                    <div class="slider-title">
                                        <div class="slider-title__content">
                                            <div class="content_1">
                                                <h1><?php echo $item['title']; ?></h1>
                                            </div>
                                            <div class="content_2">
                                                <h4><?php echo $item['description']; ?></h4>
                                            </div>
                                            <div class="content__link">
                                                <a href="#"><?php echo $item['button']; ?></a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            <?php }
                            } ?>
                        </ul>
                    </div>
                    <i class="fa fa-chevron-left prev1"></i>
                    <i class="fa fa-chevron-right next1"></i>
            </div>
        <?php
    }
}
