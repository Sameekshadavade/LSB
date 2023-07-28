<?php /* Template Name: Careers */ ?>

<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
<?php  

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );
$desktop_about_banner_site_logo = get_field('_desktop_about_banner_site_logo');
if($feat_image !=''){
?>
    <!-- ======= Start-Banner-Area ======= -->
    <section class="banner-section careers" style="background-image: url('<?php echo $feat_image; ?>');">
        <div class="banner-content">
    <?php if($desktop_about_banner_site_logo !=''){ ?>
            <img class="lsb-logo" src="<?php echo $desktop_about_banner_site_logo; ?>"
                alt="LSB Logo About Us">
    <?php } if(get_the_content() !=''){ the_content(); } ?>

        </div>
    </section>
    <!-- ======= End-Banner-Area ======= -->
<?php } 

$args = array(
    'post_type'=> 'careers',
    'order'    => 'ASC',
    'post_status' => 'publish',
); 

$Post_Query = new WP_Query($args);
?>
    <div class="container page-content">
        <section class="common-header mb-5">
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>
        </section>
    <?php if ($Post_Query-> have_posts() ) : ?>
        <div class="container page-content careers">
            <section class="career-section">
                <div class="row">
                    <div class="col-lg-12">
            <?php 
                    while ($Post_Query->have_posts()) : $Post_Query->the_post();
            ?>
                    <article class="job-listing">
                            <header>
                                <h2><?php the_title(); ?></h2>
                                <p><strong>Posted: <?php echo get_the_date('m/d/Y'); ?></strong></p>
                            </header>
                            <p><?php echo wp_trim_words( get_the_content(), 20, '...' ); ?></p>
                            <a class="cta" href="<?php the_permalink(); ?>">Learn More</a>
                        </article>
                <?php endwhile; ?>
                    </div>
                </div>
            </section>
        </div>
        <?php endif; wp_reset_postdata(); ?>
    </div>

</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>