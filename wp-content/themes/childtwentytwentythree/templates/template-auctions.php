<?php /* Template Name: Auctions */ ?>

<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
<?php  
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );

if($feat_image !=''){
?>
        <!-- ======= Start-Banner-Area ======= -->
        <section class="banner-section spencer" style="background-image: url(<?php echo $feat_image; ?>);">
        <?php if (get_the_content() !=''){ ?>
                <div class="banner-content">
                    <?php echo the_content(); ?>
                </div>
        <?php } ?>
        </section>
<?php 
}

$auctions_head_title = get_field('_auctions_head_title');
$about__the_auction_title = get_field('_about__the_auction_title');
$about_the_auction_content = get_field('_about_the_auction_content');
$right_side_content_repater = get_field('_right_side_content_repater');

?>
    <!-- ======= End-Banner-Area ======= -->
    <div class="container page-content">
<?php if($auctions_head_title !=''){ ?>
        <section class="common-header ">
                <header class="page-header mb-5">
                    <h1 class="page-title"><?php echo $auctions_head_title; ?></h1>
                </header>
            </section>
<?php } ?>
        <section class="auctions-section pt-5 mb-5">
            <div class="row">
      <?php if($about__the_auction_title !='' || $about_the_auction_content !=''){ ?>        
                <div class="col-md-8">
                <?php if($about__the_auction_title !=''){ ?>
                        <h2><?php echo $about__the_auction_title; ?></h2>
                <?php } if($about_the_auction_content !=''){ echo $about_the_auction_content; } ?>
                </div>
      <?php } if($right_side_content_repater !=''){ ?>
                    <div class="col-md-4">
                        <ul class="circle-checkmark">
                    <?php foreach($right_side_content_repater as $right_side_content_val ){ ?>
                        <?php if($right_side_content_val['_about_auction_list'] !=''){ ?>
                                    <li><?php echo $right_side_content_val['_about_auction_list']; ?></li>
                        <?php } ?>
                    <?php } ?>
                        </ul>
                    </div>
        <?php } ?>
            </div>
        </section>
<?php  

$current_auctions_head_title = get_field('_current_auctions_head_title');
$current_auction_repeater = get_field('_current_auction_repeater');

if($current_auction_repeater !='' || $current_auctions_head_title !=''){

?>
        <section class="auctions-info pt-4">
            <h2 class="section-heading"><span><?php echo $current_auctions_head_title; ?></span></h2>
            <div class="row">
      <?php foreach($current_auction_repeater as $current_auction_repeater_val){ ?>
                <div class="col-md-4 auction-listing">
      <?php if($current_auction_repeater_val['_current_auction_link'] !='' || $current_auction_repeater_val['_current_auction_image'] !=''){ ?>        
                <a href="<?php echo $current_auction_repeater_val['_current_auction_link']['url']; ?>" target="_blank">
                        <img src="<?php echo $current_auction_repeater_val['_current_auction_image']['url']; ?>" alt="<?php echo $current_auction_repeater_val['_current_auction_image']['alt']; ?>">
                    </a>
                    <a href="<?php echo $current_auction_repeater_val['_current_auction_link']['url']; ?>" class="auction-list-btn" target="_blank">
                        <i class="auction-icons bi-hammer"></i>
                        <?php echo $current_auction_repeater_val['_current_auction_link']['title']; ?>
                    </a>
      <?php } if($current_auction_repeater_val['_current_auction_title'] !=''){ ?>
                    <h3><?php echo $current_auction_repeater_val['_current_auction_title']; ?></h3>
                    <?php } if($current_auction_repeater_val['_current_auction_content'] !=''){ echo $current_auction_repeater_val['_current_auction_content']; } ?>
                </div>
      <?php } ?>
            </div>
        </section>
<?php } ?>
    </div>
</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>