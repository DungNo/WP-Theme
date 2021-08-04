<?php
if (!defined('ABSPATH')) {
	return;
}

require_once get_template_directory() . '/inc/init.php';

require_once get_template_directory() . '/theme-customize/footer.php';




add_action('wp_ajax_loadmore', 'get_post_loadmore');
add_action('wp_ajax_nopriv_loadmore', 'get_post_loadmore');

function get_post_loadmore() { ?>
    <?php
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0; // lấy dữ liệu phái client gởi
    $product_cat = isset($_POST['product_cat']) ? $_POST['product_cat'] : 'all'; // lấy dữ liệu phái client gởi

    if($product_cat == 'all'){
        $args = array(
            'post_type' => 'product',
            'offset'    => $offset,
        );
    }else{
        $args = array(
            'post_type' => 'product',
            'offset'    => $offset,
            'product_cat' => $product_cat,
        );
    }

    $getposts = new WP_query($args );
    global $wp_query; $wp_query->in_the_loop = true;
    while ($getposts->have_posts()) : $getposts->the_post();
        global $product;
        ?>

        <div class="col-lg-4 col-md-6 col-sm-12 style-cate">
            <div class="border"> <?php echo woocommerce_get_product_thumbnail() ?>
                <div class="icon">
                    <div class="icon-cart">
                        <?php
                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                            sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="add-cart button %s product_type_%s buynow"><i class="bi bi-cart3"></i></a>',
                                esc_url( $product->add_to_cart_url() ),
                                esc_attr( $product->get_sku() ),
                                $product->is_purchasable() ? 'add_to_cart_button' : '',
                                esc_attr( $product->product_type ),
                                esc_html( $product->add_to_cart_text() )
                            ),
                            $product );
                        ?>
                    </div>

                    <div class="icon-link">
                        <?php             $product1 = get_page_by_title( 'Product Title', OBJECT, 'product' ); ?>
                        <a href="<?php echo get_permalink( $product1->ID ); ?>"><i class="bi bi-link-45deg"></i></a>
                    </div>
                    <div class="icon-demo tooltip">
                        <a href="<?php echo get_post_meta( get_the_ID(), 'link-video-tutorials', true ) ?>" data-toggle="tooltip"><i class="bi bi-box-arrow-up-right"></i></a>
                        <span class="tooltiptext">Live Demo</span>
                        <span class="tooltiptext tamgiac"></span>
                    </div>
                </div>
            </div>
            <div class="title">
                <?php   echo '<a href="' . get_permalink() . '">'. get_the_title() . '</a>'; ?>
            </div>
            <div class="price-content">
                <span class="dv"><?php echo get_woocommerce_currency_symbol() ?></span><span class="price"> <?php  echo $price = get_post_meta( get_the_ID(), '_regular_price',true); ?></span>
            </div>
        </div>


    <?php endwhile; wp_reset_postdata();
    die(); ?>
    <?php
}


add_action('wp_ajax_loaditem', 'get_post_loaditem');
add_action('wp_ajax_nopriv_loaditem', 'get_post_loaditem');
function get_post_loaditem() { ?>
    <?php
    $offset = isset($_POST['offset']) ? (int)$_POST['offset'] : 0; // lấy dữ liệu phái client gởi
    $product_cat = isset($_POST['product_cat']) ? $_POST['product_cat'] : 'all'; // lấy dữ liệu phái client gởi
    if($product_cat == 'all'){
        $args = array(
            'post_type' => 'product',
            'posts_per_page' =>  get_option('posts_per_page'),
        );
    }else{
        $args = array(
            'post_type' => 'product',
            'product_cat' => $product_cat,
            'posts_per_page' =>  get_option('posts_per_page'),
        );
    }
    $getposts = new WP_query($args );
    global $wp_query; $wp_query->in_the_loop = true;
    while ($getposts->have_posts()) : $getposts->the_post();
        global $product;
        ?>
        <div class="col-lg-4 col-md-6 col-sm-12 style-cate">
            <div class="border"> <?php echo woocommerce_get_product_thumbnail() ?>
                <div class="icon">
                    <div class="icon-cart">
                        <?php
                        echo apply_filters( 'woocommerce_loop_add_to_cart_link',
                            sprintf( '<a href="%s" rel="nofollow" data-product_id="%s" data-product_sku="%s" class="add-cart button %s product_type_%s buynow"><i class="bi bi-cart3"></i></a>',
                                esc_url( $product->add_to_cart_url() ),
                                esc_attr( $product->get_sku() ),
                                $product->is_purchasable() ? 'add_to_cart_button' : '',
                                esc_attr( $product->product_type ),
                                esc_html( $product->add_to_cart_text() )
                            ),
                            $product );
                        ?>
                    </div>

                    <div class="icon-link">
                        <?php             $product1 = get_page_by_title( 'Product Title', OBJECT, 'product' ); ?>
                        <a href="<?php echo get_permalink( $product1->ID ); ?>"><i class="bi bi-link-45deg"></i></a>
                    </div>
                    <div class="icon-demo tooltip">
                        <a href="<?php echo get_post_meta( get_the_ID(), 'link-video-tutorials', true ) ?>" data-toggle="tooltip"><i class="bi bi-box-arrow-up-right"></i></a>
                        <span class="tooltiptext">Live Demo</span>
                        <span class="tooltiptext tamgiac"></span>
                    </div>
                </div>
            </div>
            <div class="title">
                <?php   echo '<a href="' . get_permalink() . '">'. get_the_title() . '</a>'; ?>
            </div>
            <div class="price-content">
                <span class="dv"><?php echo get_woocommerce_currency_symbol() ?></span><span class="price"> <?php  echo $price = get_post_meta( get_the_ID(), '_regular_price',true); ?></span>
            </div>
        </div>

    <?php endwhile; wp_reset_postdata();
    die(); ?>
    <?php
}