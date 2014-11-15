<div class="sidebar">
	<ul>
		<?php if ( ! dynamic_sidebar('primary-sidebars') ) : ?>
			<li><?php the_widget( 'WP_Widget_Categories' ); ?></li>
			<li><?php the_widget( 'WP_Widget_Tag_Cloud' ); ?></li>
			<li><?php the_widget( 'WP_Widget_Archives' ); ?></li>
		<?php else : ?>
		<?php endif; ?>
	</ul>
</div>