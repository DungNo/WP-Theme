<?php
if ( ! defined( 'ABSPATH' ) ) {
	return;
}
/**
 ******************************************************************************************************************************
 *  SITE STYLE
 ******************************************************************************************************************************
 */

wp_enqueue_style( 'fontawesome-pro', get_template_directory_uri() . '/assets/src/library/fontawesome-pro/css/all.min.css', array(), false, "all" );
wp_enqueue_style( 'bootstrap-grid', get_template_directory_uri() . '/assets/src/library/bootstrap-grid/bootstrap-grid.min.css', array(), false, "all" );
wp_enqueue_style( 'dl-menu', get_template_directory_uri() . '/assets/src/library/dlmenu/component.css', array(), false, "all" );
wp_enqueue_style( 'cct-style', get_template_directory_uri() . '/assets/build/css/main.css', array(), false, "all" );
wp_enqueue_style( 'slick1', get_template_directory_uri() . '/css/vendor/slick.css', array(), false, "all" );
wp_enqueue_style('slick1');
wp_enqueue_style( 'fa5', 'https://use.fontawesome.com/releases/v5.13.0/css/all.css', array(), '5.13.0', 'all' );
wp_enqueue_style( 'fa5-v4-shims', 'https://use.fontawesome.com/releases/v5.13.0/css/v4-shims.css', array(), '5.13.0', 'all' );

https://code.jquery.com/jquery-3.6.0.min.js

/**
 ******************************************************************************************************************************
 *  SITE SCRIPT
 ******************************************************************************************************************************
 */
if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
	wp_enqueue_script( 'comment-reply' );
}

wp_enqueue_script( 'jqk','https://code.jquery.com/jquery-3.6.0.min.js', array(), false, false );
wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/src/library/dlmenu/modernizr.custom.js', array(), false, false );
wp_enqueue_script( 'dl-menu', get_template_directory_uri() . '/assets/src/library/dlmenu/jquery.dlmenu.js', array( 'jquery' ), false, true );
wp_enqueue_script( 'headeroom', get_template_directory_uri() . '/assets/src/library/headroom/headroom.min.js', array( 'jquery' ), false, true );
wp_enqueue_script( 'cct-script', get_template_directory_uri() . '/assets/build/js/main.js', array( 'jquery' ), false, true );
wp_enqueue_script( 'click-js', get_template_directory_uri() . '/js/vendor/slick.min.js', array( 'jquery' ), false, true );
wp_enqueue_script( 'click-ddd', get_template_directory_uri() . '/js/script.js', array( 'jquery' ), false, true );


wp_localize_script( 'cct-script', 'cct_script', array(
	'ajax_url'      => admin_url( 'admin-ajax.php' ),
	'site_url'      => esc_url( home_url( '/' ) ),
	'is_rtl'        => is_rtl(),
) );