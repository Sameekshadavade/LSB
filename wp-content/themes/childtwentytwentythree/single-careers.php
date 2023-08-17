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
                        ?>
                                <header class="page-header">
                                    <h1 class="page-title"><?php echo get_the_title(); ?></h1>
                                    <p><strong>Posted: <?php the_date('d/m/Y'); ?></strong></p>
                                    <div class="careers-nav">
                                        <a class="cta with-icon" href="<?php home_url(); ?>/career"><i class="material-icons"></i>Back</a>
                                        <a class="cta with-icon" href="#app-form-anchore">Apply Here</a>
                                    </div>
                                </header>
                                <div class="job-post-content">
                                    <?php if (get_the_content() != '') {
                                        echo get_the_content();
                                    }  ?>
                                </div>
                                <div class="contact-section mt-5 mb-5 pt-4 pb-5">
                                    <div class="sell-heading-block">
                                        <h2 class="payment-title">Apply For This Position</h2>
                                        <p class="required-field-block">"<span class="required-tag">*</span>" indicates required fields</p>
                                    </div>
                                    <div id="app-form-anchore" class="common-from-block">
                                        <?php echo do_shortcode('[contact-form-7 id="813" title="career Page form"]'); ?>
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