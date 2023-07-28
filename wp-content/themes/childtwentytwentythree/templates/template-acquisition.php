<?php /* Template Name: Acquisition */ ?>

<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<?php  

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );

?>
<div class="main-wrapper-area">
<?php if($feat_image !=''){ ?>
<!-- ======= Start-Banner-Area ======= -->   
    <section class="banner-section spencer" style="background-image: url('<?php echo $feat_image; ?>');">
    <?php if(get_the_content() !=''){ ?>
            <div class="banner-content">
                <?php the_content(); ?>
            </div>
    <?php } ?>
    </section>
    <!-- ======= End-Banner-Area ======= -->
<?php 
}

$acquisition_process_head_title = get_field('_acquisition_process_head_title');
$acquisition_process_content = get_field('_acquisition_process_content');

if($acquisition_process_head_title !='' || $acquisition_process_content !='' ){
?>
    <div class="container page-content">
        <section class="common-header mb-5">
    <?php if($acquisition_process_head_title !=''){ ?>
            <header class="page-header">
                <h1 class="page-title"><?php echo $acquisition_process_head_title; ?></h1>
            </header>
    <?php } if($acquisition_process_content !=''){ ?>
            <div class="col-md-8 offset-md-2 mb-0">
                <div class="summary-opening">
                <?php echo $acquisition_process_content; ?>
                </div>
            </div>
    <?php } ?>
        </section>
<?php 
}

$acquisition_team_head_title = get_field('_acquisition_team_head_title');
$acquisition_team_repeater = get_field('_acquisition_team_repeater');

if($acquisition_team_repeater !='' || $acquisition_team_head_title !=''){
?>
        <section class="our-team-members mt-0 mb-5">
            <div class="row justify-content-center">
                <div class="col-12">
                    <h2><?php echo $acquisition_team_head_title; ?></h2>
                </div>
            <?php foreach($acquisition_team_repeater as $acquisition_team_val){ ?>   
                <div class="team-person col-12 col-sm-6 col-md-4 col-lg">
          <?php if($acquisition_team_val['_team_image'] !=''){ ?>
                    <div class="img-box">
                        <img src="<?php echo $acquisition_team_val['_team_image']['url']; ?>"
                            alt="<?php echo $acquisition_team_val['_team_image']['alt']; ?>" />
                    </div>          
          <?php } if($acquisition_team_val['_team_name'] !='' || $acquisition_team_val['_team_designation'] !=''){ ?>
                    <h3>
                    <?php if($acquisition_team_val['_team_name'] !=''){ echo $acquisition_team_val['_team_name']; } if($acquisition_team_val['_team_designation'] !=''){ ?>
                             <small><?php echo $acquisition_team_val['_team_designation']; ?></small> <?php } ?>
                    </h3>
          <?php } ?>
                </div>
      <?php } ?>
            </div>
        </section>
<?php 
}

$road_trip_leaders_head_title = get_field('_road_trip_leaders_head_title');
$road_trip_repeater = get_field('_road_trip_repeater');

if($road_trip_repeater !=''){
?>
        <section class="our-team-members mb-5">
            <div class='row justify-content-center'>
                <div class="col-12">
                    <h2><?php echo $road_trip_leaders_head_title; ?></h2>
                </div>
            <?php foreach($road_trip_repeater as $road_trip_repeater_val){ ?>
                    <div class="team-person col-12 col-sm-6 col-md-3">
              <?php if($road_trip_repeater_val['_road_trip_leaders_image'] !=''){ ?>
                        <div class="img-box">
                            <img src="<?php echo $road_trip_repeater_val['_road_trip_leaders_image']['url']; ?>"
                                alt="<?php echo $road_trip_repeater_val['_road_trip_leaders_image']['alt']; ?>" />
                        </div>
                <?php } if($road_trip_repeater_val['_road_trip_leaders_name'] !=''){ ?>
                            <h3><?php echo $road_trip_repeater_val['_road_trip_leaders_name']; ?></h3>
                    <?php } ?>
                        </div>
            <?php } ?>
            </div>
        </section>
<?php  
}

$what_to_expect_head_title = get_field('_what_to_expect_head_title');
$what_to_expect_content = get_field('_what_to_expect_content');
$download_checklist_button = get_field('_download_checklist_button');

if($download_checklist_button !='' || $what_to_expect_head_title !='' || $what_to_expect_content !=''){
?>
        <section class="row">
            <div class="col mt-4">
<?php if($download_checklist_button !='' || $what_to_expect_head_title !='' || $what_to_expect_content !=''){ ?>               
            <h2 class="section-heading"><span><?php echo $what_to_expect_head_title; ?></span></h2>
      <?php } if($download_checklist_button !='' || $what_to_expect_head_title !=''){  ?>  
                <div class="summary-opening col-md-8 offset-md-2 mb-0">
            <?php if($what_to_expect_content !=''){ echo $what_to_expect_content; } if($download_checklist_button !=''){ ?>
                    <a href="<?php echo $download_checklist_button['url']; ?>" class="cta"><?php echo $download_checklist_button['title']; ?></a>
            <?php } ?>                
                </div>
     <?php } ?>
            </div>
        </section>
<?php 
}

$expect_left_side_image = get_field('_expect_left_side_image');
$expect_right_side_repeater = get_field('_expect_right_side_repeater');

?>
        <section class="shipment-details mt-5">
            <div class='row'>
      <?php if($expect_left_side_image !=''){ ?> 
                <div class="col-md-6">
                    <figure>
                        <img class='w-100'
                            src="<?php echo $expect_left_side_image['url']; ?>"
                            alt="<?php echo $expect_left_side_image['alt']; ?>">
                        <figcaption><?php echo $expect_left_side_image['caption']; ?></figcaption>
                    </figure>
                </div>
      <?php } if($expect_right_side_repeater !=''){ ?>
                <div class="col-md-6">
                    <ul>
              <?php foreach($expect_right_side_repeater as $expect_right_side_repeater_val){ ?>
                        <li>
                        <?php if($expect_right_side_repeater_val['_consignment_details_title'] !=''){ ?>
                            <h3><?php echo $expect_right_side_repeater_val['_consignment_details_title']; ?></h3>
                            <?php } if($expect_right_side_repeater_val['_consignment_details_content'] !=''){ echo $expect_right_side_repeater_val['_consignment_details_content']; } ?>
                        </li>
              <?php } ?>
                    </ul>
                </div>
            <?php } 

$bottom_consign_repeater = get_field('_bottom_consign_repeater');
$bottom_right_side_image = get_field('_bottom_right_side_image');
$bottom_get_stated_button = get_field('_bottom_get_stated_button');

if($bottom_right_side_image !='' || $bottom_consign_repeater !=''){
?>
                <div class="col-md-6 order-md-last mt-5">
                    <figure>
                        <img src="<?php echo $bottom_right_side_image['url']; ?>" alt="<?php echo $bottom_right_side_image['alt']; ?>">
                        <figcaption><?php echo $bottom_right_side_image['caption']; ?></em></figcaption>
                    </figure>
                </div>
      <?php  if($bottom_consign_repeater !=''){ ?>
                <div class="col-md-6 mt-5">
                    <ul>
          <?php foreach($bottom_consign_repeater as $bottom_consign_repeater_val){ ?>
                    <li>
                    <?php  if($bottom_consign_repeater_val['_bottom_consign_title'] !=''){ ?>
                            <h3><?php echo $bottom_consign_repeater_val['_bottom_consign_title']; ?></h3>
                            <?php }  if($bottom_consign_repeater_val['_bottom_consign_content'] !=''){ echo $bottom_consign_repeater_val['_bottom_consign_content']; } ?>
                        </li>
          <?php } ?>
                    </ul>
                </div>
      <?php } ?>
            </div>
        </section>
    <?php } if($bottom_right_side_image !=''){ ?>
            <section class="mt-5">
                <div class="row">
                    <div class="col">
                        <div class="banner-cta">
                            <div>
                                <a href="<?php echo $bottom_get_stated_button['url']; ?>" class="cta"><?php echo $bottom_get_stated_button['title']; ?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
    <?php } ?>

    </div>

</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>