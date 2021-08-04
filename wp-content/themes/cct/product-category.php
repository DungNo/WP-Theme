<?php
/*
 Template Name: Product Category
 */
get_header();
?>

<div class="btn-control-category">
    <?php $product_categories = get_terms( 'product_cat' );
    echo '<button class="filter_list active" type_product="all">All</button>';
    foreach( $product_categories as $cat )  {
        echo '<button class="filter_list" type_product="'.$cat->name.'">'.$cat->name.'</button>';
    } ?>
</div>
<div class="row list-new product-cate">
    <?php
    $args = array(
        'post_type' => 'product',
    );
    $getposts = new WP_query($args);?>
    <?php global $wp_query; $wp_query->in_the_loop = true; ?>
    <?php while ($getposts->have_posts()) : $getposts->the_post();
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
    <?php endwhile; wp_reset_postdata(); ?>
</div>
<div class="btn-load">
    <button class="load-more-pc"><?php echo cct_get_option('cct_product_category_load_more') ?></button>
</div>

<?php
get_footer();
?>

