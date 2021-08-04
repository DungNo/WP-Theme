<?php
if (!defined('ABSPATH')) {
    return;
}

/**
 * Footer area
 */
if (!function_exists('cct_footer_area')) {
    function cct_footer_area($slug = '_en')
    {
        $background_footer_main = cct_get_option('cct_footer_background') ? cct_get_option('cct_footer_background') : "#FFFFFF";
        $cct_footer_title_1 = cct_get_option('cct_footer_title_1') ? cct_get_option('cct_footer_title_1') : "";
        $cct_footer_icon_social = cct_get_option('cct_repeater_icon_social') ? cct_get_option('cct_repeater_icon_social') : "";



        $cct_footer_title_2 = cct_get_option('cct_footer_title_2') ? cct_get_option('cct_footer_title_2') : "Company";
        $cct_footer_select_menu = cct_get_option('cct_footer_select_menu') ? cct_get_option('cct_footer_select_menu') : "footer-menu";


        $cct_footer_title_3 = cct_get_option('cct_footer_title_3') ? cct_get_option('cct_footer_title_3') : "Categories";
        $cct_get_cate_all = cct_get_option('cct_get_cate_all') ? cct_get_option('cct_get_cate_all') : "";


        $cct_footer_title_4 = cct_get_option('cct_footer_title_4') ? cct_get_option('cct_footer_title_4') : "Quick Links";
        $cct_group_links = cct_get_option('cct_group_links') ? cct_get_option('cct_group_links') : "";

        $background_footer_absolute = cct_get_option('cct_footer_background_absolute') ? cct_get_option('cct_footer_background_absolute') : "#000000";
        $cct_footer_absolute = cct_get_option('cct_footer_absolute') ? cct_get_option('cct_footer_absolute') : "";
        $payment = cct_get_option("cct_media_footer") ? cct_get_option("cct_media_footer") : "";
        ?>
        <div class="footer" ">
        <ul class="footer-main">
            <li>
                <div class="footer--title">
                    <h3><?php echo get_theme_mod('contact_title'); ?></h3>
                </div>
                <ul>
                    <li>
                        <div class="footer--icon">
                            <a href="#"><i
                                        class="<?php echo get_theme_mod('footer_icon_1') ? get_theme_mod('footer_icon_1') : '' ?>"></i></a>
                        </div>
                        <div class="footer--content">
                            <a href="#"><?php echo get_theme_mod('contact_content_1') ? get_theme_mod('contact_content_1') : '' ?></a>
                        </div>
                    </li>

                    <li>
                        <div class="footer--icon">
                            <a href="#"><i
                                        class="<?php echo get_theme_mod('footer_icon_2') ? get_theme_mod('footer_icon_2') : '' ?>"></i></a>
                        </div>
                        <div class="footer--content">
                            <a href="#"><?php echo get_theme_mod('contact_content_2') ? get_theme_mod('contact_content_2') : '' ?></a>
                        </div>

                    </li>

                    <li>
                        <div class="footer--icon">
                            <a href="#"><i
                                        class="<?php echo get_theme_mod('footer_icon_3') ? get_theme_mod('footer_icon_3') : '' ?>"></i></a>
                        </div>
                        <div class="footer--content">
                            <a href="#"><?php echo get_theme_mod('contact_content_3') ? get_theme_mod('contact_content_3') : '' ?></a>
                        </div>
                    </li>

                    <li>
                        <?php

                        if (!empty($cct_footer_icon_social)) {
                            foreach ($cct_footer_icon_social as $key => $icon) { ?>
                                <a href="#"><i class="<?php echo $icon['cct_icon_footer'] ?>"></i></a>
                            <?php }
                        }

                        ?>
                    </li>
                </ul>
            </li>

            <li>
                <div class="footer--title">
                    <h3><?php echo $cct_footer_title_2; ?></h3>
                </div>

                <?php
                wp_nav_menu(array('menu_class' => 'footer--text', 'theme_location' => $cct_footer_select_menu));
                ?>
            </li>

            <li>
                <div class="footer--title">
                    <h3><?php echo $cct_footer_title_3; ?></h3>
                </div>
                <ul class="footer--text">
                    <?php
                    $cat_args = array(
                        'orderby' => 'name',
                    );
                    $product_categories = get_terms('product_cat', $cat_args);
                    if (!empty($product_categories)) {
                        foreach ($product_categories as $key => $category) {
                            if (in_array($category->term_id, $cct_get_cate_all)) { ?>
                                <li><a href="<?php echo get_term_link($category) ?>"><?php echo $category->name ?></a></li>
                            <?php }
                        }
                    }
                    ?>
                </ul>
            </li>

            <li>
                <div class="footer--title">
                    <h3><?php echo $cct_footer_title_4; ?></h3>
                </div>
                <ul class="footer--text">
                    <li><a href="#">My Account</a></li>
                    <li><a href="#">Store Location</a></li>
                    <li><a href="#">Orders Tracking</a></li>
                    <li><a href="#">FAQs</a></li>
                </ul>
            </li>

        </ul>
        </div>
        <!-- End footer -->
        <!-- Start license -->
        <footer style="background-color: <?php echo $background_footer_absolute ?>">
            <div class="main">
                <div class="main__designby">
                    <p><?php echo $cct_footer_absolute; ?></p>
                </div>
                <div class="main__payments">
                    <img src="<?php echo $payment['url'] ?>" alt="">
                    <?php echo get_theme_mod('footer_text'); ?>
                </div>
            </div>
        </footer>

        <?php
    }
}
function get_custom_style()
{
    $options = get_theme_mods();
    ?>
    <style type="text/css">
        .footer {
            background: <?php echo $options['footer_bg_color']; ?>;
            color: <?php echo $options['footer_text_color']; ?>;
        }
    </style>
    <?php
}

add_action('wp_head', 'get_custom_style');