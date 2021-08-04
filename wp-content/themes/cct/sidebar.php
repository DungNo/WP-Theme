<?php
if (!defined('ABSPATH')) {
	return;
}

$sidebar = 'primary-bar';

?>
<?php if(is_shop()){

}else {
    if (is_active_sidebar($sidebar)) : ?>
	<div class="cct-sidebar col-lg-3">
		<aside id="sidebar">
			<?php dynamic_sidebar($sidebar); ?>
		</aside>
	</div>
<?php endif;
}?>

