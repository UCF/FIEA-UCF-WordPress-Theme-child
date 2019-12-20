<?php get_header(); ?>

<?php include("newsNav.php"); ?>

<div class="container mt-4 mb-5 pb-sm-4">
	<?php if ( have_posts() ): ?>
	<div class="ucf-news modern">
		<?php while ( have_posts() ) : the_post(); ?>
			
				<div class="ucf-news-item">
					<a href="<?php the_permalink(); ?>">
						<div class="ucf-news-thumbnail">
						
						
						
						
							<img src="<?php
							$src = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'thumbnail', false ); echo $src[0]; ?>" class="ucf-news-thumbnail-image" alt="">
						</div>
						<div class="ucf-news-item-content">
							<div class="ucf-news-section">
								<span class="ucf-news-section-title">
								
								<?php
									$categories = get_the_category();
									$separator = ', ';
									$output = '';
									if ( ! empty( $categories ) ) {
									foreach( $categories as $category ) {
										$output .= '' . esc_html( $category->name ) . '' . $separator;
									}
									echo trim( $output, $separator );
									}
								?>
								</span>
								
								
							</div>
							<div class="ucf-news-item-details">
								<p class="ucf-news-item-title"><?php the_title(); ?> <small class="text-muted">| <?php the_time( 'F j, Y' ); ?></small></p>
								
								<p class="ucf-news-item-excerpt"><?php the_excerpt(); ?></p>
							</div>
						</div>
					</a>
				</div>
			
		<?php endwhile; ?>
</div>
		<?php ucfwp_the_posts_pagination(); ?>
		<?php else: ?>
			<p>No results found.</p>
		<?php endif; ?>
</div>

<?php get_footer(); ?>
