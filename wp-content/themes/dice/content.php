<?php $category_count = wp_count_terms( 'category' ); ?>
<?php if ( have_posts() ) : ?>
<?php while ( have_posts() ) : the_post(); ?>
<?php 
	$archive_year  = get_the_time('Y'); 
	$archive_month = get_the_time('m'); 
	$archive_day   = get_the_time('d'); 
?>
	<div <?php post_class(); ?>>
		<div class="content-wrapper">
			<?php if( ! empty( $post->post_title ) ) : ?>
			<h2 class="title">
				<?php if( is_archive() || is_home() ) : ?>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<?php else : ?>
					<?php the_title(); ?>
				<?php endif; ?>
			</h2>
			<?php endif; ?>
			<?php if( is_single() || is_archive() || is_home() || is_search() ) : ?>
				<div class="post-meta">
					<a href="<?php echo get_author_posts_url( get_the_author_meta( 'ID' ) ); ?>">
						<div class="dashicons dashicons-admin-users"></div>
						<span><?php the_author_meta( 'display_name' ); ?></span>
					</a>

					<a href="<?php echo get_day_link( $archive_year, $archive_month, $archive_day); ?>">
						<div class="dashicons dashicons-calendar"></div>
						<span><?php the_time( get_option( 'date_format' ) ); ?></span>
					</a>
					<a href="<?php comments_link(); ?>">
						<div class="dashicons dashicons-admin-comments"></div>
						<span><?php comments_number( esc_attr__('No Comments'), esc_attr__('1 Comment'), esc_attr__('% Comments') ); ?></span>
					</a>

					<a href="<?php the_permalink(); ?>" class="permalink">
						<div class="dashicons dashicons-admin-links"></div>
					</a>
				</div>
			<?php endif; ?>
			
			<?php if ( has_post_thumbnail() ) : ?>
				<?php
					$imgdata = wp_get_attachment_image_src( get_post_thumbnail_id(), 'post-thumbnail' );
					$imgwidth = $imgdata[1];
					$thumbclass = ( $imgwidth >= 330 ) ? 'wide' : 'narrow';
				?>
				<figure class="featured-image <?php echo $thumbclass; ?>">
					<?php the_post_thumbnail(); ?>
				</figure>
			<?php endif; ?>
			<div class="content">
				<?php if( is_archive() && is_home() ) : ?>
					<?php the_excerpt(); ?>
				<?php else : ?>
					<?php the_content(); ?>
				<?php endif; ?>

				<?php if( wp_link_pages('echo=0') ) : ?>

				<div class="post-nav-page">
					<?php
					wp_link_pages( array(
						'before' => '<p>',
						'link_before' => '<span class="page-link-number">',
						'link_after' => '</span>'
					) );
					?>
				</div>
				<?php endif; ?>

				<?php if( is_single() || is_page() ) : ?>
					<div class="comment-container">
						<?php comments_template(); ?> 
					</div>
				<?php endif; ?>
			</div>
		</div>
		<?php if( is_single() || is_archive() || is_home() || is_search() ) : ?>
		<?php if( $category_count > 1 || has_tag() ) : ?>
			<div class="post-meta-tax">
				<?php
					if( $category_count > 1 ) {
						$categories = get_the_category();
						if( $categories ) {
							echo '<div class="dashicons dashicons-category"></div>';
							echo '<ul class="post-categories">';
							foreach($categories as $cat) {
								$term_link = get_term_link( $cat->term_id, 'category' );
								echo '<li><a href="' . esc_url( $term_link ) . '">' . $cat->name . ' <span>(' . $cat->count . ')</span></a></li>';
							}
							echo '</ul>';
						}
						$term_link = '';
					}
				?>

				<?php if( has_tag() ) : ?>
					<?php
						$posttags = get_the_tags();
						if ($posttags) {
							echo '<div class="dashicons dashicons-tag"></div>';
							echo '<ul class="post-tags">';
							foreach($posttags as $tag) {
								$term_link = get_term_link( $tag->term_id, 'post_tag' );
								echo '<li><a href="' . esc_url( $term_link ) . '">' . $tag->name . ' <span>(' . $tag->count . ')</span></a></li>';
							}
							echo '</ul>';
						}
					?>
				<?php endif; ?>
			</div>
		<?php endif; ?>
		<?php endif; ?>
	</div>
<?php endwhile; ?>
<?php else : ?>
	<div class="post">
		<div class="content-wrapper">
			<h2 class="title"><?php echo esc_attr__( 'No results found.' ); ?></h2>
		</div>
	</div>
<?php endif; ?>