<?php /* Template Name: Get Started */ ?>

<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
<?php 
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );

if($feat_image !=''){
?>
    <!-- ======= Start-Banner-Area ======= -->
    <section class="banner-section get-started" style="background-image: url('<?php echo $feat_image; ?>');">
    <?php if(get_the_content() !=''){ ?>
            <div class="banner-content">
                <?php the_content(); ?>
            </div>
        <?php } ?>
    </section>
    <!-- ======= End-Banner-Area ======= -->
<?php 
} 
$start_page_repeater = get_field('_start_page_repeater');
$start_bottom_banner_image = get_field('_start_bottom_banner_image');
$start_bottom_tittle = get_field('_start_bottom_tittle');
$start_bottom_description = get_field('_start_bottom_description');
$start_bottom_button = get_field('_start_bottom_button');

if($start_page_repeater !='' || $start_bottom_description !='' || $start_bottom_description !='' || $start_bottom_button!='' || $start_bottom_tittle !=''){
 ?>
    <div class="container page-content get-started-content">
  <?php if($start_page_repeater !=''){ ?>  
            <section class="action-links mb-5 pb-5">
                <div class='row'>
                <?php foreach($start_page_repeater as $start_page_repeater_val){ ?>    
                <div class="col-lg-6 action-link">
                        <div class="action-link-content">
                  <?php if($start_page_repeater_val['_repeater_tittle'] !=''){ ?>
                            <h2><?php echo $start_page_repeater_val['_repeater_tittle']; ?></h2>
                  <?php } if($start_page_repeater_val['_description_'] !=''){ echo $start_page_repeater_val['_description_']; } if($start_page_repeater_val['_start_repeater_button'] !=''){ ?>
                            <a href="<?php echo $start_page_repeater_val['_start_repeater_button']['url']; ?>" class="cta"><?php echo $start_page_repeater_val['_start_repeater_button']['title']; ?></a>
                  <?php } ?>
                        </div>
                    </div>
                <?php } ?>
                </div>
            </section>
  <?php } ?>
        <section class="banner mid-banner mt-5">
            <div class="banner-wrapper ">
                <div class="banner-content">
            <?php if($start_bottom_tittle !=''){ ?>
                    <h4><?php echo $start_bottom_tittle; ?></h4>
            <?php } if($start_bottom_description !=''){ echo $start_bottom_description; } if($start_bottom_button !=''){ ?>
                    <a href="<?php echo $start_bottom_button['url']; ?>" class="cta"><?php echo $start_bottom_button['title']; ?></a>
            <?php } ?>
                </div>
            </div>
        </section>
    </div>

</div>
<!-- ======= End-Main-Area ======= -->
<?php } get_footer(); ?>