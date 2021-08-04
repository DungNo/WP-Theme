<?php

function cct_customize_register($wp_customize)
{
    //Add panel
    $wp_customize->add_panel( 'cct_footer_panel',
        array(
            'title'      => esc_html__( 'Footer Options', 'cct_helper' ),
            'priority'   => 20,
            'capability' => 'edit_theme_options',
        )
    );

        //Footer section
        $wp_customize->add_section("footer", array(
            'title' => __("Footer", "cct"),
            'priority' => 130,
            'description' => __( 'Description Custom footer here' ),
            'type' => 'option',
            'panel' => 'cct_footer_panel'
        ));

            //Footer background color
            $wp_customize->add_setting("footer_bg_color", array(
                'default' => '#ccc',
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'footer_bg_color', array(
                'label' => 'Footer Background Color',
                'section' => 'footer',
                'settings' => 'footer_bg_color',

            )));

            //Footer text
            $wp_customize->add_setting("contact_title", array(
                'default' => '',
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new WP_Customize_Control($wp_customize,"contact_title",array(
                'label' => __("Contact title", "cct"),
                'section' => 'footer',
                'settings' => 'contact_title',
                'type' => 'text',
            )));

            //Contact icon 1
            $wp_customize->add_setting("footer_icon_1", array(
                'default' => '',
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new WPCI_Customize_Icon_Control($wp_customize,"footer_icon_1",array(
                'label' => __("Footer icon 1", "cct"),
                'section' => 'footer',
                'settings' => 'footer_icon_1',
            )));
            //Contact content 1
            $wp_customize->add_setting("contact_content_1", array(
                'default' => '',
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new WP_Customize_Control($wp_customize,"contact_content_1",array(
                'label' => __("Contact content 1", "cct"),
                'section' => 'footer',
                'settings' => 'contact_content_1',
                'type' => 'textarea',
            )));

            //Contact icon 2
            $wp_customize->add_setting("footer_icon_2", array(
                'default' => '',
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new WPCI_Customize_Icon_Control($wp_customize,"footer_icon_2",array(
                'label' => __("Footer icon 2", "cct"),
                'section' => 'footer',
                'settings' => 'footer_icon_2',
            )));
            //Contact content 2
            $wp_customize->add_setting("contact_content_2", array(
                'default' => '',
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new WP_Customize_Control($wp_customize,"contact_content_2",array(
                'label' => __("Contact content 2", "cct"),
                'section' => 'footer',
                'settings' => 'contact_content_2',
                'type' => 'textarea',
            )));
            //Contact icon 3
            $wp_customize->add_setting("footer_icon_3", array(
                'default' => '',
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new WPCI_Customize_Icon_Control($wp_customize,"footer_icon_3",array(
                'label' => __("Footer icon 3", "cct"),
                'section' => 'footer',
                'settings' => 'footer_icon_3',
            )));
            //Contact content 2
            $wp_customize->add_setting("contact_content_3", array(
                'default' => '',
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new WP_Customize_Control($wp_customize,"contact_content_3",array(
                'label' => __("Contact content 3", "cct"),
                'section' => 'footer',
                'settings' => 'contact_content_3',
                'type' => 'textarea',
            )));

            //Footer logo
            $wp_customize->add_setting("footer_logo", array(
                'transport' => 'postMessage',
            ));
            $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize,'footer_logo',array(
                'label' => __('Footer Logo', 'cct'),
                'section' => 'footer',
                'settings' => 'footer_logo',
            )));

}
add_action("customize_register","cct_customize_register");

function cct_customizer_live_preview(){
    wp_enqueue_script("cct-themecustomizer", get_template_directory_uri() . "/theme_customize/theme-customizer.js", array("jquery", "customize-preview"), '', true);
}
add_action("customize_preview_init", "cct_customizer_live_preview");

function cct_customize_control_js() {
    wp_enqueue_script( 'color-scheme-control', get_template_directory_uri() . '/theme_customize/color-scheme-control.js', array( 'customize-controls', 'iris', 'underscore', 'wp-util' ), '', true );
}
add_action( 'customize_controls_enqueue_scripts', 'cct_customize_control_js' );


function cct_get_color_scheme_css( $colors ) {
    $colors = wp_parse_args( $colors, array(
        'footer_bg_color' => '',
        'footer_text_color' => ''
    ) );

    return <<<CSS
 .footer { background: {$colors['footer_bg_color']}; color: {$colors['footer_text_color']};}
 
CSS;
}

function cct_color_scheme_css_template() {
    $colors = array(
        'footer_bg_color' => '{{ data.footer_bg_color }}',
        'footer_text_color' => '{{ data.footer_text_color }}',
    );
    ?>
    <script type="text/html" id="tmpl-cct-color-scheme">
        <?php echo cct_get_color_scheme_css( $colors ); ?>
    </script>
    <?php
}
add_action( 'customize_controls_print_footer_scripts', 'cct_color_scheme_css_template' );

?>