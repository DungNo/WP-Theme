<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 9/20/2019
 * Time: 3:50 PM
 */

global $post;

$size = 'full';


if (have_posts()) {
    $i=0;
	while (have_posts()) :
        $i++;
		the_post();
		$url_thumbnail = get_the_post_thumbnail_url();
		?>
        <?php
        if ($i != 5 && $i != 7 && $i != 12 && $i != 16) { ?>
            <article class="col-lg-4 col-md-6 item " id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="entry-image">
                        <div class="post-thumbnail">
                            <a href="<?php the_permalink() ?>" class="cct-image-wrapper">
								<img src="<?php echo mr_image_resize($url_thumbnail, 487, 300, true, 'c', false); ?>"
                                     alt="<?php the_title(); ?>">
                            </a>
                        </div>
                        <?php cct_blog_date(); ?>
                    </div>
                    <div class="entry-meta">
                        <?php cct_blog_author(); ?>
                        <?php echo cct_generate_html_terms_list($post->ID, 'category'); ?>
                    </div>
                <?php endif; ?>
                <div class="entry-post-content">
                    <?php cct_blog_title(); ?>
                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="entry-readmore">
                        <?php echo esc_html__('Continue Reading', 'cct'); ?>
                    </a>
                </div>
            </article>
       <?php } else {
            if ($i == 5 || $i == 12) { ?>
                <article class="col-lg-4 col-md-6 item item-height" id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-image">
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink() ?>" class="cct-image-wrapper">
                                    <img src="<?php echo mr_image_resize($url_thumbnail, 487, 673, true, 'c', false); ?>"
                                             alt="<?php the_title(); ?>">
                                </a>
                            </div>
                            <?php cct_blog_date(); ?>
                            <div class="entry-height">
                                <div class="entry-meta">
                                    <?php cct_blog_author(); ?>
                                    <?php echo cct_generate_html_terms_list($post->ID, 'category'); ?>
                                </div>
                                <div class="entry-post-content">
                                    <?php cct_blog_title(); ?>
                                    <a href="<?php echo esc_url(get_the_permalink($post->ID)); ?>" class="entry-readmore">
                                        <?php echo esc_html__('Continue Reading', 'cct'); ?>
                                    </a>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                </article>
           <?php }
            if ($i == 7 || $i == 16) { ?>
                <article class="col-lg-8 col-md-12 item item-width" id="post-<?php esc_attr(the_ID()); ?>" <?php post_class(); ?>>
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="entry-image">
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink() ?>" class="cct-image-wrapper">
                                    <img src="<?php echo mr_image_resize($url_thumbnail, 1002, 477, true, 'c', false); ?>"
                                             alt="<?php the_title(); ?>">
                                </a>
                            </div>
                        </div>
                    <?php endif; ?>
                </article>
            <?php }
        } ?>
	<?php
	endwhile;
}



