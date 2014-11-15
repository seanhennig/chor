<header class="site-header">
	<div id="mobile-menu-action" class="dashicons dashicons-menu"></div>
	<?php if ( has_nav_menu( 'primary_menu' ) ) : ?>
		<nav class="navigation">
			<?php
			$defaults = array(
				'theme_location'  => 'primary_menu',
				'container'       => 'div',
				'container_class' => 'menu1',
				'container_id'    => '',
				'menu_class'      => 'menu2',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => ''
			);

			wp_nav_menu( $defaults );
			?>
		</nav>
	<?php endif; ?>

	<div class="navbar">
		<div class="logo">
			<?php if ( get_theme_mod( 'dice_logo' ) ) : ?>
				<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>">
					<img src="<?php echo esc_url( get_theme_mod( 'dice_logo' ) ); ?>" alt="<?php echo get_bloginfo( 'name' ); ?>">
				</a>
			<?php else : ?>
				<hgroup>
					<div class="name">
						<a href="<?php echo esc_url( home_url() ); ?>" title="<?php echo get_bloginfo( 'name' ); ?>"><?php bloginfo( 'name' ); ?></a></h1>
					<div class="description">
						<?php bloginfo( 'description' ); ?>
					</h2>
				</hgroup>
			<?php endif; ?>
		</div>
		<div class="searchform">
			<form role="search" method="get" id="site-header-searchform" class="searchform" action="<?php echo esc_url( home_url() ); ?>">
				<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="404-s" placeholder="<?php echo esc_attr__( 'Search' ); ?>" />
			</form>
		</div>
	</div>
</header>