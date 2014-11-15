<form role="search" method="get" id="searchform" class="searchform" action="<?php echo home_url( '/' ); ?>" >
	<div>
		<label class="screen-reader-text" for="s"><?php __( 'Search for:' ); ?></label>
		<div class="s">
			<input type="text" value="<?php echo get_search_query(); ?>" name="s" id="s" />
		</div>
	</div>
</form>