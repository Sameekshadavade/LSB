<?php /* Template Name: Our Process */ ?>

<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
<?php 
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );

if($feat_image !=''){ 
?>
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

$our_process_head_title = get_field('_our_process_head_title');
$our_goal_left_title = get_field('_our_goal_left_title');
$our_goal_left_content = get_field('_our_goal_left_content');
$we_handle_title = get_field('_we_handle_title');
$we_handle_image = get_field('_we_handle_image');
$we_handle_content = get_field('_we_handle_content');
$we_handle_button = get_field('_we_handle_button');

?>
    <div class="container page-content">
  <?php if($our_process_head_title !=''){ ?>
            <section class="row">
                <header class="page-header">
                    <h1 class="page-title"><?php echo $our_process_head_title; ?></h1>
                </header>
            </section>
  <?php } ?>
        <section class="goal-section pt-5 pb-5">
            <div class="row">
                <div class="col-md-7 col-sm-12 col-xs-12">
          <?php if($our_goal_left_title !=''){ ?>
                    <h2><?php echo $our_goal_left_title; ?></h2>
          <?php } if($our_goal_left_content !=''){ echo $our_goal_left_content; } ?>
                </div>
                <div class="col-md-5 col-sm-12 col-xs-12 mt-4 mt-md-0">
                    <div class="banner inline">
                        <div class="banner-wrapper">
                            <div class="banner-content no-background">
                  <?php if($we_handle_title !=''){ ?>
                            <h2><?php echo $we_handle_title; ?></h2>
                  <?php } if($we_handle_image !=''){ ?>
                            <img class="heading-flourish" src="<?php echo $we_handle_image['url']; ?>" alt="<?php echo $we_handle_image['alt']; ?>" aria-hidden="true" role="presentation">
                        <?php } if($we_handle_content !=''){ echo $we_handle_content; } if($we_handle_button !=''){ ?>
                                <a href="<?php echo $we_handle_button['url']; ?>" class="cta"><?php echo $we_handle_button['title']; ?></a>
                        <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<?php  
        
$how_it_works_head_title = get_field('_how_it_works_head_title');
$how_it_works_repeater = get_field('_how_it_works_repeater');

if($how_it_works_repeater !=''){

?>
        <section class="how-it-work-section pt-5">
            <div class="row">
                <h2 class="section-heading"><span><?php echo $how_it_works_head_title; ?></span></h2>
      <?php foreach($how_it_works_repeater as $how_it_works_repeater_val){ ?>        
                <div class="col-md-6 process-step">
                <header>
          <?php if($how_it_works_repeater_val['_how_it_works_image'] !=''){ ?>   
                    <img src="<?php echo $how_it_works_repeater_val['_how_it_works_image']['url']; ?>" alt="<?php echo $how_it_works_repeater_val['_how_it_works_image']['alt']; ?>">
          <?php } if($how_it_works_repeater_val['_how_it_works_title'] !=''){ ?>
                    <h3><?php echo $how_it_works_repeater_val['_how_it_works_title']; ?></h3>
          <?php } ?>    
                </header>    
                <?php if($how_it_works_repeater_val['_how_it_works_content'] !=''){ echo $how_it_works_repeater_val['_how_it_works_content']; } ?>      
            </div>
        <?php } ?>
            </div>
        </section>
    <?php } ?>
    </div>
</div>
<!-- ======= End-Main-Area ======= -->
<?php get_footer(); ?>