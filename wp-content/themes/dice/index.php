<?php get_header(); ?>
<?php get_template_part('site-header'); ?>
<?php if( is_author() || is_day() || is_month() || is_year() || is_category() || is_tag() || is_search() ) : ?>
<div class="archive-title-wrapper">
	<div class="archive-title">
		<?php if( is_author() ) : ?>
			<h1><?php the_author(); ?></h1>
			<?php $author = get_user_by( 'slug', get_query_var( 'author_name' ) ); ?>
			<?php $content = get_the_author_meta( 'description', $author->ID ); ?>
			<?php if( ! empty( $content ) ) : ?>
				<div class="content">
					<?php echo $content; ?>
				</div>
			<?php endif; ?>
		<?php elseif( is_day() ) : ?>
			<div class="dashicons dashicons-calendar"></div>
			<h1><?php the_time( get_option( 'date_format' ) ); ?></h1>
		<?php elseif( is_month() ) : ?>
			<div class="dashicons dashicons-calendar"></div>
			<h1><?php the_time( 'M, Y' ); ?></h1>
		<?php elseif( is_year() ) : ?>
			<div class="dashicons dashicons-calendar"></div>
			<h1><?php the_time( 'Y' ); ?></h1>
		<?php elseif( is_category() ) : ?>
			<div class="dashicons dashicons-category"></div>
			<h1><?php single_cat_title(); ?></h1>
			<?php if( category_description() ) : ?>
				<div class="content">			
					<?php echo category_description(); ?>
				</div>
			<?php endif; ?>
		<?php elseif( is_tag() ) : ?>
			<div class="dashicons dashicons-tag"></div>
			<h1><?php single_tag_title(); ?></h1>
			<?php if( tag_description() ) : ?>
				<div class="content">			
					<?php echo tag_description(); ?>
				</div>
			<?php endif; ?>
		<?php elseif( is_search() ) : ?>
			<div class="dashicons dashicons-search"></div>
			<h1>'<?php echo get_search_query(); ?>'</h1>
			<?php if( tag_description() ) : ?>
				<div class="content">			
					<?php echo tag_description(); ?>
				</div>
			<?php endif; ?>
		<?php endif; ?>
	</div>
</div>
<?php endif; ?>
<div id="wrapper">
	<div class="posts">
		<?php if( is_404() ) : ?>
			<?php get_template_part('content-404'); ?>
		<?php else : ?>
			<?php get_template_part('content'); ?>
		<?php endif; ?>
		<?php if( get_next_posts_link() || get_previous_posts_link() ) : ?>
			<div class="post-nav">
				<div class="alignleft"><?php previous_posts_link('<div class="dashicons dashicons-arrow-left-alt2"><span>'. _x('Prev', 'find/replace') .'</span></div>') ?></div>
				<div class="alignright"><?php next_posts_link('<div class="dashicons dashicons-arrow-right-alt2"><span>' . __('Next') . '</span></div>') ?></div>
			</div>
		<?php endif; ?>
	</div>
	<?php if( ! is_404() ) : ?>
		<?php get_sidebar(); ?>
	<?php endif; ?>
</div>
<?php get_footer(); ?>