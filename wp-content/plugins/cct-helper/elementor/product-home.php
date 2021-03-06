<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

class CCT_Elementor_Widget_Product_Home extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_product_home';
    }

    public function get_title()
    {
        return esc_html__('Product Home', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-text';
    }

    public function get_categories()
    {
        return ['cct-base'];
    }
    protected function _register_controls() {
        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__( 'Content', 'cct-helper' ),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );
        $this->add_control(
            'title-product',
            [
                'label' => esc_html__( 'Title Product', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Claue', 'cct-helper' ),
                'placeholder' => esc_html__('Type your title product', 'cct-helper'),
            ]
        );
        $this->add_control(
            'price',
            [
                'label' => esc_html__( 'Price', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( '$129', 'cct-helper' ),
                'placeholder' => esc_html__('Type your price product', 'cct-helper'),
            ]
        );
        $this->add_control(
            'title-detail-product',
            [
                'label' => esc_html__( 'Title Detail Product', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Clean, Minimal Magento 2&1 Theme', 'cct-helper' ),
                'placeholder' => esc_html__('Type your title detail product', 'cct-helper'),
            ]
        );
        $this->add_control(
            'description',
            [
                'label' => esc_html__( 'Description', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'default' => esc_html__( 'Claue ??? Clean, Minimal Magento 2&1 Theme is an excellent template for a modern and clean eCommerce store with 20+ homepage layouts and tons of options for shop, blog, portfolio, store locator layouts and other useful pages. Claue will meet & fit any kind of eCommerce sites as you imagine. ', 'cct-helper' ),
                'placeholder' => esc_html__('Type your description product', 'cct-helper'),
            ]
        );
        $this->add_control(
            'title-button-product',
            [
                'label' => esc_html__( 'Title Button Product', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Explore Now', 'cct-helper' ),
                'placeholder' => esc_html__('Type your title product', 'cct-helper'),
            ]
        );
        $this->add_control(
            'link',
            [
                'label' => esc_html__('Link', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => '#',
            ]
        );

        $this->end_controls_section();
        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'color_content',
            [
                'label'		=> esc_html__('Product Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#F26322',
                'selectors'	=> [
                    '{{WRAPPER}} .item-button-product' => 'background-color: {{VALUE}}',
                    '{{WRAPPER}} .item-price' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'color_price',
            [
                'label'		=> esc_html__('Color Price', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'default'   => '#FFF4EA',
                'selectors'	=> [
                    '{{WRAPPER}} .item-price' => 'background-color: {{VALUE}}',

                ]
            ]
        );
        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__( 'Title Product', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .item-title-product',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Title Product Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-title-product' => 'color: {{VALUE}}'
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
                    '{{WRAPPER}} .item-title-product' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'title_padding',
            [
                'label' => esc_html__('Title Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-title-product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'heading_price',
            [
                'label' => esc_html__( 'Price Product', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_price',
                'selector' => '{{WRAPPER}} .item-price',
            ]
        );
        $this->add_control(
            'color_price',
            [
                'label'		=> esc_html__('Price Product Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-price' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'price_margin',
            [
                'label' => esc_html__('Price Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-price' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'price_padding',
            [
                'label' => esc_html__('Price Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-price' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_control(
            'heading_title_desc',
            [
                'label' => esc_html__( 'Desc Product', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_desc',
                'selector' => '{{WRAPPER}} .item-desc-product',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'		=> esc_html__('Desc Product Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .item-desc-product' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_responsive_control(
            'desc_margin',
            [
                'label' => esc_html__('Desc Margin', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-desc-product' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->add_responsive_control(
            'desc_padding',
            [
                'label' => esc_html__('Desc Padding', 'cct-helper'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', 'em', '%'],
                'selectors' => [
                    '{{WRAPPER}} .item-desc-product' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();

        $html = array();
        $html[] = '<div class="cct-elementor-product-home cct-shortcode">';
        $html[] = '<div class="item-content">';

        $html[] = '<div class="item-title-price d-flex">';
        $html[] = '<div class="item-title-product">' . $settings['title-product'] . '</div>';
        $html[] = '<div class="item-price">' . $settings['price'] . '</div>';
        $html[] = '</div>';

        $html[] = '<div class="item-title-detail">' . $settings['title-detail-product'] . '</div>';
        $html[] = '<div class="item-desc-product">' . $settings['description'] . '</div>';
        $html[] = '<div class="item-button-product">';
        $html[] = '<a href="' . $settings['link'] . '">';
        $html[] = $settings['title-button-product'];
        $html[] = '</a>';
        $html[] = '</div>';

        $html[] = '</div>';
        $html[] = '</div>';
        echo implode('', $html);
    }
}
