<?php /* Template Name: Get Started */ ?>

<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
<?php 
<<<<<<< HEAD
                $get_satrt_title = get_field('get_satrt_title');
                $get_start_banner_desktop_image = get_field('page_hero_image');


            ?>
    <!-- ======= Start-Banner-Area ======= -->
    <section class="banner-section get-started" style="background-image:url(<?php echo $get_start_banner_desktop_image ['url']; ?>);">
        <div class="banner-content">
          
            <h2><?php echo $get_satrt_title; ?></h2>
        </div>
=======
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
>>>>>>> 810fc1f2facca884a81b928a486b72f3522330ef
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
<<<<<<< HEAD
                    <div class="action-link-content">
                        
                        <?php  $get_srepeater_tittle = get_field('repeater_tittle');?>
                        <h2>repeater_tittle</h2>
                        <p>Whether you are looking for your first gun or to add to your collection, see how we are the
                            best option for completing your purchase - Without a Buyer’s Premium!</p>
                        <a href="/" class="cta">View Auctions</a>
                    </div>
                </div>
                <div class="col-lg-6 decision-link">
                    <div class="action-link-content">
                        <h2>I'm Here To Sell</h2>
                        <p>If you are looking to sell a single item or an entire collection, learn how we are the
                            premier choice for getting the best value for your items.</p>
                        <a href="/" class="cta">Start Process</a>
=======
                        <div class="action-link-content">
                  <?php if($start_page_repeater_val['_repeater_tittle'] !=''){ ?>
                            <h2><?php echo $start_page_repeater_val['_repeater_tittle']; ?></h2>
                  <?php } if($start_page_repeater_val['_description_'] !=''){ echo $start_page_repeater_val['_description_']; } if($start_page_repeater_val['_start_repeater_button'] !=''){ ?>
                            <a href="<?php echo $start_page_repeater_val['_start_repeater_button']['url']; ?>" class="cta"><?php echo $start_page_repeater_val['_start_repeater_button']['title']; ?></a>
                  <?php } ?>
                        </div>
>>>>>>> 810fc1f2facca884a81b928a486b72f3522330ef
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