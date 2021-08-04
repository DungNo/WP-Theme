<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 9/28/2019
 * Time: 9:56 AM
 */
?>
<header class="<?php echo cct_header_generate_class('header-1')['wrap']; ?>"
    style="background-color:<?php echo get_theme_mod('header_bg_color') ? get_theme_mod('header_bg_color') : '#222222' ?>">

	<div class="header-main <?php echo cct_header_generate_class('header-1')['inner']; ?>"
    style="background-color: <?php echo cct_get_option('cct-background-header')? cct_get_option('cct-background-header'):''; ?>">

        <div class="header-top">
            <div class="header-top__left">
                <ul>
                    <li>
                        <div class="icon">
                            <a href="#"><i class="<?php echo cct_get_option('cct-icon-1')? cct_get_option('cct-icon-1'):'' ?>"></i></a>
                        </div>
                        <a href="#">
                            <div class="text">
                                <?php  echo cct_get_option('opt-wp-editor-1'); ?>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="icon">
                            <a href="#"><i class="<?php echo cct_get_option('cct-icon-2')? cct_get_option('cct-icon-2'):'' ?>"></i></a>
                        </div>
                        <a href="#">
                            <div class="text">
                                <?php  echo cct_get_option('opt-wp-editor-2'); ?>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="icon">
                            <a href="#"><i class="<?php echo cct_get_option('cct-icon-3')? cct_get_option('cct-icon-3'):'' ?>"></i></a>
                        </div>
                        <a href="#">
                            <div class="text">
                                <?php  echo cct_get_option('opt-wp-editor-3'); ?>
                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="header-top__right">
                    <?php echo cct_get_language_location() ?>
            </div>
        </div>
    </div>

    <div class="logo">
        <div class="logo-main">
            <div class="logo-main__left">
                <?php echo cct_logo() ?>
            </div>
            <div class="logo-main__center">
                <form class="logo-main__center__search searchform" role="search" method="get" id="searchform"

                       action="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <div class="logo-main__center__search__category">
                        <select name="all_category">
                            <option value="all">All Category</option>
                            <?php
                            $taxonomy     = 'product_cat';
                            $orderby      = 'name';
                            $show_count   = 0;      // 1 for yes, 0 for no
                            $pad_counts   = 0;      // 1 for yes, 0 for no
                            $hierarchical = 1;      // 1 for yes, 0 for no
                            $title        = '';
                            $empty        = 0;

                            $args = array(
                                'taxonomy'     => $taxonomy,
                                'orderby'      => $orderby,
                                'show_count'   => $show_count,
                                'pad_counts'   => $pad_counts,
                                'hierarchical' => $hierarchical,
                                'title_li'     => $title,
                                'hide_empty'   => $empty
                            );
                            $all_categories = get_categories( $args );
                            foreach ($all_categories as $cat) {
                                if($cat->category_parent == 0) {
                                    $category_id = $cat->term_id;
                                    echo '<option>'. $cat->name .'</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>
                    <input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" placeholder="Search for Product.."/>
                    <button id="searchform" type="submit" value="<?php echo esc_attr_x( '<i class="fal fa-search"></i>', 'submit button' ); ?>">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="logo-main__right">
                <div class="logo-main__right__setting">
                    <a href="#">
                        <i class="fa fa-cog"></i>
                    </a>
                </div>
                <?php echo cct_header_icon_cart() ?>
            </div>
        </div>
    </div>


    <div class="menu">
        <div class="menu-main">
            <div class="menu-main__category">
                <button class="categorybtn"><i class="fa fa-bars"></i>   Categories</button>
                <div id="category" class="category-content">
                    <?php
                    $cat_args = array(
                        'orderby' => 'name',
                    );
                    $product_categories = get_terms('product_cat', $cat_args);
                    if (!empty($product_categories)) {
                        foreach ($product_categories as $key => $category) { ?>
                            <a href="<?php echo get_term_link($category) ?>"><?php echo $category->name ?></a>
                        <?php }
                    }
                    ?>
                </div>
            </div>
            <div class="menu-main__menu">
                <?php echo cct_header_main_menu(); ?>
            </div>
        </div>
    </div>

</header>
