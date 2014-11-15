<div class="content-wrapper">
	<h2 class="title">404 - <?php echo esc_attr__( 'Error' ); ?></h2>
	<div class="content">
		<p><?php echo esc_attr__( 'No results found.' ); ?></p>
		<form role="search" method="get" id="404-searchform" class="searchform" action="<?php echo esc_url( home_url() ); ?>">
			<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s-404" placeholder="<?php echo esc_attr__( 'Search' ); ?>" />
		</form>
	</div>
</div>