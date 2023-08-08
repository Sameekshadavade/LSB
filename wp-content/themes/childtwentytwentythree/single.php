<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">

	<div class="container page-content">
		<section class="post-inner-page-wr single-blog-wr">
			<div class="center-wr">
				<div class="post-left-right-wr">
					<div class="post-right-wr">
						<?php
						$category = get_the_category();
						$main_cat      = $category[0];
						$main_category_name  = $main_cat->name;
						$main_category_link  = get_category_link($main_cat->term_id);

						$child_cat      = $category[1];
						$child_category_name  = $child_cat->name;
						$category_link  = get_category_link($child_cat->term_id);

						if (have_posts()) : while (have_posts()) : the_post();

							$featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
						?>
								<div class="single-main-block">
							<?php if($featured_image !=''){ ?>
									<div class="post_image">
										<img src="<?php echo $featured_image; ?>">
									</div>
							<?php } ?>
									<div class="single-post-title">
										<h2><?php echo get_the_title(); ?></h2>
									</div>
									<div class="single-post-content">
							<?php if($child_category_name !=''){ ?>
										<div class="button-sec">
											<button class="cta with-icon" onclick="history.back()"><i class="material-icons"></i>Back</button>
											<a class="cta with-icon" href="<?php echo esc_url(get_category_link($child_cat->term_id)); ?>">More <?php echo $child_cat->name; ?></a>
										</div>
							<?php  } else{ ?>
									<div class="button-sec">
										<button class="cta with-icon" onclick="history.back()"><i class="material-icons"></i>Back</button>
										<a class="cta with-icon" href="<?php echo esc_url($main_category_link); ?>">More <?php echo $main_category_name; ?></a>
									</div>
							  <?php } if(get_the_content() !=''){ echo get_the_content(); } ?>
									</div>
								</div>
						<?php
							endwhile;
						endif;

						?>
					</div>
				</div>
			</div>
		</section>
	</div>
</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>