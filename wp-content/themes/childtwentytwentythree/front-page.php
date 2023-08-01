<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<?php $home_banner_slider_shortcode = get_field('_home_banner_slider_shortcode'); ?>
<div class="main-wrapper-area mt-0">
    <!-- ======= Start-Banner-Area ======= -->

    <?php echo do_shortcode($home_banner_slider_shortcode); ?>

    <!-- ======= End-Banner-Area ======= -->
<?php  

$current_auctions_head_title = get_field('_current_auctions_head_title');
$current_auctions_repeater = get_field('_current_auctions_repeater');

if($current_auctions_repeater !=''){
?>
    <!-- ======= Start-auctions-partner-Area ======= -->
    <div class="container-fluid no-padding">
        <section class="row auctions-partner-section">
            <h4><?php echo $current_auctions_head_title; ?></h4>
  <?php foreach($current_auctions_repeater as $current_auctions_val){ ?>
            <div class="col-md-6 col-lg">
        <?php if($current_auctions_val['_auctions_link'] !=''){ ?>
            <a href="<?php echo $current_auctions_val['_auctions_link']; ?>" rel="noopener noreferrer" target="_blank">
                    <span>
                        <img src="<?php echo $current_auctions_val['_auctions_image']['url']; ?>" alt="<?php echo $current_auctions_val['_auctions_title']; ?>">
                    </span>
                    <h5><?php echo $current_auctions_val['_auctions_title']; ?></h5>
                    <span class="new-tab-warning">
                        Opens a new window
                        <img src="<?php echo get_stylesheet_directory_uri(); ?>/assets/images/icon_external_link.svg" alt="link_icon">
                    </span>
                </a>
     <?php } ?>
            </div>
  <?php } ?>
        </section>
    </div>
<!-- ======= End-auctions-partner-Area ======= -->
<?php
} 

$welcome_title = get_field('_welcome_title');
$welcome_left_image = get_field('_welcome_left_image');
$welcome_left_desktop_image = get_field('_welcome_left_desktop_image');
$welcome_repeater = get_field('_welcome_repeater');
$counter = 1;
if($welcome_repeater !='' || $welcome_left_image !=''){
?>
        <!-- ======= Start-inner-content-section-Area ======= -->
        <section class="inner-content-section">
            <div class="container page-content">
      <?php if($welcome_title !=''){ ?>
                <header class="page-header">
                    <h1 class="page-title" ><?php echo $welcome_title; ?></h1>
                </header>
       <?php } ?>
                <!-- ======= Start-about-buy-sell-section ======= -->
                <section class="about-buy-sell row" style="background-image: url(<?php echo $welcome_left_desktop_image['url']; ?>);">
      <?php foreach($welcome_repeater as $welcome_repeater_val){ ?>
                <div class="col-sm-6 col-lg-3 <?php if($counter == 1){ echo "offset-lg-6"; } ?> ">
             <?php if($welcome_repeater_val['_right_side_buy_title'] !=''){ ?>
                        <h2 class="large"><?php echo $welcome_repeater_val['_right_side_buy_title']; ?></h2>
             <?php } if($welcome_repeater_val['_right_side_block_content'] !=''){ ?>
                        <?php echo $welcome_repeater_val['_right_side_block_content']; ?>
              <?php } if($welcome_repeater_val['_our_auctions_button'] !=''){ ?>
                        <a href="<?php echo $welcome_repeater_val['_our_auctions_button']['url']; ?>" class="cta"><?php echo $welcome_repeater_val['_our_auctions_button']['title']; ?></a>
              <?php } ?>
                    </div>
      <?php $counter++; }  //if($welcome_left_image[''] !=''){ ?>
                    <img class="d-sm-none" src="<?php echo $welcome_left_image['url']; ?>" alt="<?php echo $welcome_left_image['alt']; ?>">
         <?php //} ?>
                </section>
            <!-- ======= End-about-buy-sell-section ======= -->
<?php } 
      
$why_lock_title = get_field('_why_lock_title');
$why_lock_repeater = get_field('_why_lock_repeater');

if($why_lock_repeater !=''){
 ?>
            <!-- ======= Start-why-lsb-section ======= -->
            <section class="why-lsb-block">
                <div class="col-lg-12">
            <?php if($why_lock_title !=''){ ?>
                    <h2 class="section-heading"><span><?php echo $why_lock_title; ?></span></h2>
            <?php } ?>
                    <ul>
                    <?php foreach($why_lock_repeater as $why_lock_repeater_val){ ?>
                        <li>
                 <?php if($why_lock_repeater_val['_why_inner_title'] !=''){ ?>
                            <h3><?php echo $why_lock_repeater_val['_why_inner_title']; ?></h3>
                 <?php } if($why_lock_repeater_val['_why_inner_content'] !=''){ ?>
                          <?php echo $why_lock_repeater_val['_why_inner_content']; ?>
                <?php } ?>
                    </li>
                    <?php } ?>
                    </ul>
                </div>
            </section>
            <!-- ======= End-why-lsb-section ======= -->
<?php }
    $args = array(
        'post_type' => 'testimonial',
        'order' => 'DESC',
        'post_status' => 'publish',
    );
    $Query = new WP_Query($args);

?>
            <!-- ======= Start-client-review-slider-section ======= -->
            <section class="banner bg-banner-block mt-5 mb-5">
                <div class="banner-wrapper">
                    <!-- Testimonials -->
                    <div class="client-review-slider">
                        <div class="testimonial-slider-wrap">
                            <?php if ( $Query-> have_posts() ) :
                                            while ($Query->have_posts()) : $Query->the_post(); 
                                            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); ?>
                                                <div class="testimonial">
                                                <?php if($feat_image !=''){ ?>
                                                    <img class="five-stars-icon" src="<?php echo $feat_image; ?>" alt="Testimonial Stars" />
                                                <?php } if(get_the_content() !=''){ ?>
                                                        <?php the_content(); ?>
                                                <?php } if(get_the_title() !=''){ ?>
                                                        <cite><?php the_title(); ?></cite>
                                                <?php } ?>
                                                    </div>
                                <?php     endwhile; 
                                endif;
                                 wp_reset_postdata();
                
                                ?>
                    </div>
                        <!--// Testimonials -->
                </div>
            </section>
            <!-- ======= End-client-review-slider-section ======= -->
<?php
$recently_sold_title = get_field('_recently_sold_title');
$args = array(
    'post_type' => 'post',
    'order' => 'DESC',
    'post_status' => 'publish', 
    'posts_per_page' => 6,

);
$Post_Query = new WP_Query($args);

?>
            <!-- ======= Start-sold-items-section ======= -->
            <section class="recently-sold-block">
                <h2 class="section-heading"><span><?php echo $recently_sold_title; ?></span></h2>
                <div class="row">
                <?php if ($Post_Query-> have_posts() ) :
                            while ($Post_Query->have_posts()) : $Post_Query->the_post(); 
                            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                            $post_create_date = get_the_date();
                            ?>
                            
                <article class="card article-card-block col-md-6 col-lg-4">
                        <a href="#" class="card-body">
                            <header class="entry-header">
                            <?php if($feat_image !=''){ ?>
                                <div class="post-thumbnail">
                                    <img width="1000" height="667" src="<?php echo $feat_image; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?php the_title(); ?>" decoding="async" loading="lazy">
                                </div><!-- .post-thumbnail -->
                      <?php } if(get_the_title() !=''){ ?>
                                <h2 class="entry-title card-title h3"><?php the_title(); ?></h2>
                      <?php } ?>
                            </header>
                  <?php if(get_the_content() !=''){ ?>
                            <div class="entry-content">
                                <div class="entry-summary">
                                    <?php //the_content(); ?>
                                </div>
                            </div>
                    <?php } ?>
                            <footer class="entry-footer">
                                <div class="entry-meta">
                                    <span class="posted-on">Posted on <span><time class="entry-date published updated" datetime="2023-06-27T19:52:36-07:00"><?php echo $post_create_date; ?></time></span></span>
                                </div>
                            </footer>
                        </a>
                    </article>
                <?php endwhile;
                endif;
                wp_reset_postdata();
                 ?>
                </div>
                <span class="cta-section-footer">
                    <a class="cta" href="<?php echo home_url(); ?>">
                        <span>View All Sold Items</span>
                    </a>
                </span>
            </section>
            <!-- ======= End-sold-items-section ======= -->
        </div>
    </section>
    <!-- ======= End-inner-content-section-Area ======= -->
</div>
<!-- ======= End-Main-Area ======= -->
<?php get_footer(); ?>