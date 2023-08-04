<?php get_header(); ?>

<section class="pest-inner-page-wr single-blog-wr">
		<div class="center-wr">
			<div class="pest-left-right-wr">
				<div class="pest-right-wr">
					<?php
					if (have_posts()) : while (have_posts()) : the_post();

					  $featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
					   $category = get_the_category();
					   $first_cat      = $category[1];
					   $category_name  = $first_cat->cat_name;
					   $category_link  = get_category_link( $first_cat->cat_ID );
				
					?>
							<div class="single-main-block">
							<div class="post_image">
									<img src="<?php echo $featured_image; ?>">
								</div>
								<div class="single-post-title">
									<h2><?php echo get_the_title(); ?></h2>
								</div>
								<div class="button-sec">
									<button class="cta with-icon" onclick="history.back()"><i class="material-icons"></i>Back</button>
									<button class="cta with-icon"><a href="<?php echo esc_url( $category_link ); ?>">More <?php echo $category_name; ?></a></button>
								</div>
								<div class="single-post-content">
									<p><?php echo get_the_content(); ?></p>
								</div>
							</div>
					<?php  
					endwhile;
				endif;

					 ?>
				</div>
				</div>
			</div>
		</div>
	</section>
	
<?php  get_footer(); ?>