<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">

    <div class="container page-content">
        <section class="post-inner-page-wr single-blog-wr">
            <div class="center-wr">
                <div class="post-left-right-wr">
                    <div class="post-right-wr">
                        <?php
						
						if (have_posts()) : while (have_posts()) : the_post();

							$featured_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
						?>
                        <div class="single-main-block">
                            <?php if($featured_image !=''){ ?>
                            <div class="post_image">
                                <img src="<?php echo $featured_image; ?>">
                            </div>
                            <?php } ?>
                            <header class="page-header">
                                <h1 class="page-title"><?php echo get_the_title(); ?></h1>
                                <p><strong>Posted: <?php the_date('d/m/Y'); ?></strong></p>
                            </header>
                        <div class="single-post-content">
                            <div class="button-sec">
                                <a class="cta with-icon" href="<?php home_url(); ?>/career"><i
                                        class="material-icons"></i>Back</a>
                                <a class="cta with-icon" href="#app-form-anchore">Apply Here</a>
                            </div>
                            <?php if(get_the_content() !=''){ echo get_the_content(); }  ?>

                            <div class="sell-heading-block">
                                <h2 class="payment-title">Apply For This Position</h2>
                                <p class="required-field-block">"<span class="required-tag">*</span>" indicates required fields</p>
                            </div>
                            <div id="app-form-anchore" class="job-application-form">
                                <?php echo do_shortcode('[contact-form-7 id="813" title="career Page form"]'); ?>
                            </div>
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