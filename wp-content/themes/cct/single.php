<?php
if (!defined('ABSPATH')) {
	return;
}
get_header();
?>

<div class="cct-single cct-tmp">
	<div class="cct-inner">
		<div class="container">
			<div class="cct-post">
                <div class="row">
                    <div class="cct-content cct-post-content col-lg-9">
                        <?php
                        while ( have_posts() ) {
                            the_post();
                            get_template_part('components/page-single');
                        }

                        wp_reset_postdata();
                        ?>

                    </div>
                    <?php get_sidebar(); ?>
                </div>
                <div class="related-post">
                    <?php aht_related_posts() ?>
                </div>
			</div>
			<?php do_action('cct_single_post_after_content'); ?>
		</div>

	</div>
</div>

<?php
get_footer();
