<?php
if (!defined('ABSPATH')) {
	return;
}

/**
 * Add custom classes to the aray of body classes
 */
if (!function_exists('cct_filter_body_classes')) {
	function cct_filter_body_classes($classes) {
		$general_options = cct_header_general_params();

		//header transparent
		$classes[] = $general_options['is_transparent'] ? 'cct-has-transparent' : '';

		//header sticky
		$classes[] = $general_options['is_sticky'] ? 'cct-has-sticky' : '';

		return $classes;
	}

	add_filter('body_class', 'cct_filter_body_classes');
}

/**
 * Ensure cart contents update when products are added to the cart via AJAX
 */
if (!function_exists('cct_header_add_to_cart_fragment')) {
	function cct_header_add_to_cart_fragment($fragments) {
		ob_start();
		$count = WC()->cart->cart_contents_count;

		?>
		<a class="cct-btn-cart" href="<?php echo esc_url(wc_get_cart_url()); ?>">
			<i class="fal fa-shopping-cart"></i>
			<span class="nm">
				<span class="cart-count"><?php echo esc_html($count . ' item'); ?></span>
			</span>
		</a>

		<?php
		$fragments['a.cct-btn-cart'] = ob_get_clean();

		return $fragments;
	}

	add_filter('woocommerce_add_to_cart_fragments', 'cct_header_add_to_cart_fragment');
}

/**
 * Mini Cart
 */
if (!function_exists('cct_header_mini_cart_fragment')) {
	function cct_header_mini_cart_fragment($fragments) {
		ob_start();

		woocommerce_mini_cart();
		$mini_cart = ob_get_clean();

		?>
		<div class="cct-cart-content"><?php echo json_decode(json_encode($mini_cart)); ?></div>

		<?php
		$fragments['.cct-cart-content'] = ob_get_clean();

		return $fragments;
	}

	add_filter('woocommerce_add_to_cart_fragments', 'cct_header_mini_cart_fragment');
}

/**
 * Menu Mobile
 */
function cct_nav_menu_submenu_css_class( $classes ) {
	$classes[] = 'dl-submenu';
	return $classes;
}
add_filter( 'nav_menu_submenu_css_class', 'cct_nav_menu_submenu_css_class' );