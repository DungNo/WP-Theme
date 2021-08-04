<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 10/29/2020
 * Time: 11:27 AM
 */

CSF::createOptions( CCT_OPTIONS, array(
    'framework_title' => esc_html__('Site Options', 'cct-helper'),
    'menu_title'      => esc_html__('Theme Options', 'cct-helper'),
    'menu_slug'       => 'cct-options',
) );


CSF::createSection(CCT_OPTIONS, [
    'title'		=> esc_html__('Header CCT', 'cct-helper'),
    'icon'		=> 'fa fa-bars',
    'id'		=> 'fields_header',
    'fields'	=> [

        array(
            'id'    => 'cct-background-header',
            'type'  => 'color',
            'title' => 'Background Color Header',
        ),
        array(
            'id'    => 'cct-icon-1',
            'type'  => 'icon',
            'title' => 'Icon 1 Header',
        ),
        array(
            'id'    => 'opt-wp-editor-1',
            'type'  => 'wp_editor',
            'title' => 'WP Editor',
        ),

        array(
            'id'    => 'cct-icon-2',
            'type'  => 'icon',
            'title' => 'Icon 2 Header',
        ),
        array(
            'id'    => 'opt-wp-editor-2',
            'type'  => 'wp_editor',
            'title' => 'WP Editor',
        ),

        array(
            'id'    => 'cct-icon-3',
            'type'  => 'icon',
            'title' => 'Icon 3 Header',
        ),
        array(
            'id'    => 'opt-wp-editor-3',
            'type'  => 'wp_editor',
            'title' => 'WP Editor',
        ),
        array(
            'id'    => 'cct_logo',
            'type'  => 'media',
            'title' => 'Logo Header',
        ),
    ]
]);


/**
 * Products OPTIONS
 */
CSF::createSection(CCT_OPTIONS, [
    'title'		=> esc_html__('Product Category CCT', 'cct-helper'),
    'icon'		=> 'fa fa-bars',
    'id'		=> 'fields_product_category',
    'fields'	=> [
        [
            'id'        => 'cct_product_category_load_more',
            'type'      => 'text',
            'title'     => esc_html__('Load More', 'cct-helper'),
            'default'   => esc_html__('Load More', 'cct-helper'),
        ],
    ]
]);


/**
 * FOOTER OPTIONS
 */
CSF::createSection(CCT_OPTIONS, [
    'title'		=> esc_html__('Footer CCT', 'cct-helper'),
    'icon'		=> 'fa fa-bars',
    'id'		=> 'fields_footer',
    'fields'	=> [
        [
            'id'    => 'cct_footer_background',
            'type'  => 'color',
            'title' => 'Background Main Footer',
        ],
        [
            'id'        => 'cct_footer_title_1',
            'type'      => 'text',
            'title'     => esc_html__('Contact us title', 'cct-helper'),
        ],
        [
            'id'    => 'cct_icon_footer_1',
            'type'  => 'icon',
            'title' => 'Footer Icon 1',
        ],
        [
            'id'        => 'cct_footer_content_1',
            'type'      => 'text',
            'title'     => esc_html__('Contact us content 1', 'cct-helper'),
        ],
        [
            'id'    => 'cct_icon_footer_2',
            'type'  => 'icon',
            'title' => 'Footer Icon 2',
        ],
        [
            'id'        => 'cct_footer_content_2',
            'type'      => 'text',
            'title'     => esc_html__('Contact us content 2', 'cct-helper'),
        ],
        [
            'id'    => 'cct_icon_footer_3',
            'type'  => 'icon',
            'title' => 'Footer Icon 3',
        ],
        [
            'id'        => 'cct_footer_content_3',
            'type'      => 'text',
            'title'     => esc_html__('Contact us content 3', 'cct-helper'),
        ],
        [
            'id'     => 'cct_repeater_icon_social',
            'type'   => 'repeater',
            'title'  => 'Icon Social Network',
            'fields' => array(
                array(
                    'id'    => 'cct_icon_footer',
                    'type'  => 'icon',
                    'title' => 'icon_footer',
                ),

            ),
        ],
        [
            'id'        => 'cct_footer_title_2',
            'type'      => 'text',
            'title'     => esc_html__('Company Title', 'cct-helper'),
        ],
        [
            'id'          => 'cct_footer_select_menu',
            'type'        => 'select',
            'title'       => 'Company',
            'placeholder' => 'Select menu',
            'options'     => array(
                'primary'  => 'Primary',
                'footer-menu'  => 'Footer Menu',
            ),
            'default'     => 'footer-menu'
        ],
        [
            'id'        => 'cct_footer_title_3',
            'type'      => 'text',
            'title'     => esc_html__('Categories Title', 'cct-helper'),
        ],
        array(
            'id' => 'cct_get_cate_all',
            'type' => 'select',
            'title' => esc_html__('Select the product category to display', 'cct-helper'),
            'options' => 'categories',
            'chosen' => true,
            'ajax' => false,
            'multiple' => true,
            'class' => 'require',
            'query_args' => array(
                'taxonomy' => 'product_cat',
                'posts_per_page' => -1
            ),
        ),
        [
            'id'        => 'cct_footer_title_4',
            'type'      => 'text',
            'title'     => esc_html__('Quick Links Title', 'cct-helper'),
        ],
        array(
            'id'        => 'cct_group_links',
            'type'      => 'group',
            'title'     => 'Quick links',
            'fields'    => array(
                array(
                    'id'    => 'cct_link',
                    'type'  => 'link',
                    'title' => 'Link',
                ),
            ),
        ),
        [
            'id'    => 'cct_footer_background_absolute',
            'type'  => 'color',
            'title' => 'Background Absolute Footer',
        ],
        [
            'id'        => 'cct_footer_absolute',
            'type'      => 'text',
            'title'     => esc_html__('Footer Absolute text', 'cct-helper'),
        ],
        [
            'id'    => 'cct_media_footer',
            'type'  => 'media',
            'title' => 'Media',
        ],
    ]
]);