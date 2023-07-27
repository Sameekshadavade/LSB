<?php /* Template Name: our staff Page */ ?>

<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<?php  

$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );

?>
<div class="main-wrapper-area">
    <!-- ======= Start-Banner-Area ======= -->
<?php if($feat_image !=''){ ?>
        <section class="banner-section about" style="background-image: url('<?php echo $feat_image; ?>');">
  <?php if(get_the_content() !=''){ ?>
            <div class="banner-content">
                    <?php the_content(); ?>
            </div>
  <?php } ?>
        </section>
<?php }

$our_staff_head_title = get_field('_our_staff_head_title');
$our_staff_repeater = get_field('_our_staff_repeater');

?>
    <!-- ======= End-Banner-Area ======= -->
    <div class="container page-content">
  <?php if($our_staff_head_title !=''){ ?>
            <section class="common-header mb-5">
                <header class="page-header">
                    <h1 class="page-title"><?php echo $our_staff_head_title; ?></h1>
                </header>
            </section>
    <?php } if($our_staff_repeater !=''){ ?>
                <div class="our-staff-block pt-5">
                    <div class="row">
            <?php foreach($our_staff_repeater as $our_staff_repeater_val){ ?>
                    <article class="staff-bio col-md-6">
                        <header>
                        <?php if($our_staff_repeater_val['_staff_member_image'] !=''){ ?>
                        <div class="headshot">
                                <img src="<?php echo $our_staff_repeater_val['_staff_member_image']['url']; ?>" alt="<?php echo $our_staff_repeater_val['_staff_member_image']['alt']; ?>">
                            </div>
                  <?php } if($our_staff_repeater_val['_staff__name'] !=''){ ?>
                            <h2 class="h2-as-h5">
                                <?php echo $our_staff_repeater_val['_staff__name']; ?><small><?php echo $our_staff_repeater_val['_designation']; ?></small>
                          </h2>
                  <?php } ?>
                        </header>
              <?php if($our_staff_repeater_val['_staff_description'] !=''){ ?>
                        <?php echo $our_staff_repeater_val['_staff_description']; ?>
             <?php }  ?>          
                    </article>
          <?php } ?>
                    </div>
                </div>
      <?php } ?>
    </div>
</div>
<!-- ======= End-Main-Area ======= -->
<?php get_footer(); ?>