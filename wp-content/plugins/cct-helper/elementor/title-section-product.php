<?php

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;

/**
 * Created by DungNobita.
 * User: Dung
 * Date: 25/7/2021
 * Time: 15:15 PM
 */
class CCT_Elementor_Widget_Title_Section_Product extends \Elementor\Widget_Base
{
    public function get_name()
    {
        return 'cct_title_product';
    }

    public function get_title()
    {
        return esc_html__('Title Product', 'cct-helper');
    }

    public function get_icon()
    {
        return 'eicon-t-letter';
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
            'title',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__( 'Featured Magento Themes', 'cct-helper' ),
                'placeholder' => esc_html__('Type your title banner', 'cct-helper'),
            ]
        );
        $this->add_control(
            'item_description',
            [
                'label' => esc_html__( 'Description', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::TEXTAREA,
                'placeholder' => esc_html__( 'Type your description here', 'cct-helper' ),
            ]
        );

        $this->add_control(
            'icon_section_prev',
            [
                'label' => __( 'Preview Icons', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-angle-left',
            ]
        );
        $this->add_control(
            'icon_section_next',
            [
                'label' => __( 'Next Icons', 'cct-helper' ),
                'type' => \Elementor\Controls_Manager::ICON,
                'default' => 'fa fa-angle-right',
            ]
        );
        $this->end_controls_section();


        $this->start_controls_section(
            'section_style_content',
            [
                'label' => esc_html__('Content','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );
        $this->add_control(
            'heading_title',
            [
                'label' => esc_html__( 'Title', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_title',
                'selector' => '{{WRAPPER}} .products-title__h2 h2',
            ]
        );
        $this->add_control(
            'color_title',
            [
                'label'		=> esc_html__('Title Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .products-title__h2 h2' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->add_control(
            'heading_desc',
            [
                'label' => esc_html__( 'Description', 'cct-helper' ),
                'type' => Controls_Manager::HEADING,
                'separator' => 'before',
            ]
        );
        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'typography_desc',
                'selector' => '{{WRAPPER}} .products-title__h3 h3',
            ]
        );
        $this->add_control(
            'color_desc',
            [
                'label'		=> esc_html__('Desc Color', 'cct-helper'),
                'type'		=> \Elementor\Controls_Manager::COLOR,
                'selectors'	=> [
                    '{{WRAPPER}} .products-title__h3 h3' => 'color: {{VALUE}}'
                ]
            ]
        );
        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_general',
            [
                'label' => esc_html__('General','cct-helper'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
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
                    '{{WRAPPER}} products-title__h2' => 'text-align: {{VALUE}};',
                    '{{WRAPPER}} products-title__h3' => 'text-align: {{VALUE}};',
                ],
            ]
        );
        $this->end_controls_section();
    }
    protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
        <div class="products-title">
            <div class="products-title__h2">
                <h2><?php echo $settings['title']; ?></h2>
            </div>
            <div class="products-title__h3">
                <h3><?php echo $settings['item_description']; ?></h3>
            </div>
            <div class="products-title__button">
                <i class="<?php echo $settings['icon_section_prev']; ?> prev"></i>
                <i class="<?php echo $settings['icon_section_next']; ?> next"></i>
            </div>
        </div>
    <?php }
}