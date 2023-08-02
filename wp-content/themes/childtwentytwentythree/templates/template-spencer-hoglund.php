<?php /* Template Name: Spencer Hoglund */ ?>

<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<?php 
$spencer_banner_youtube_link = get_field('_spencer_banner_youtube_link');
$spencer_youtube_image = get_field('_spencer_youtube_image');
$feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID) );

?>
<div class="main-wrapper-area">
    <!-- ======= Start-Banner-Area ======= -->
    <?php if($feat_image !=''){ ?>
    <section class="banner-section spencer" style="background-image: url('<?php echo $feat_image; ?>');">
        <div class="banner-content">
            <?php if($spencer_banner_youtube_link !=''){ ?>
            <a class="play-btn" target="__blank" href="<?php echo $spencer_banner_youtube_link; ?>"
                alt="2013 SASS Hall Of Fame Induction Video" data-rel="lightbox-gallery-dbAp3AM1"
                data-magnific_type="video" data-rl_title="" data-rl_caption="" title="">
                <img src="<?php echo $spencer_youtube_image['url']; ?>" alt="Play Video">
            </a>
            <?php } if(get_the_content() !=''){ the_content(); } ?>
        </div>
    </section>
    <!-- ======= End-Banner-Area ======= -->
    <?php } 

$spencer_head_title = get_field('_spencer_head_title');
$spencer_lead_image = get_field('_spencer_lead_image');
$spencer_lead_content = get_field('_spencer_lead_content');

if($spencer_head_title !='' || $spencer_lead_image !='' || $spencer_lead_content !=''){

?>
    <div class="container page-content">
        <?php if($spencer_head_title !=''){ ?>
        <section class="common-header mb-5">
            <header class="page-header">
                <h1 class="page-title"><?php echo $spencer_head_title; ?></h1>
            </header>
        </section>
        <?php } ?>
        <div class="our-staff-block pt-5">
            <div class="row">
                <?php if($spencer_lead_image !=''){ ?>
                <div class="col-lg-4 col-md-4 col-sm-12 col-xs-12">
                    <div class="spencer-img-block">
                        <img class="headshot" src="<?php echo $spencer_lead_image['url']; ?>"
                            alt="<?php echo $spencer_lead_image['alt']; ?>">
                    </div>
                </div>
                <?php } if($spencer_lead_content !=''){ ?>
                <div class="col-lg-8 col-md-4 col-sm-12 col-xs-12">
                    <div class="spencer-content-block">
                        <?php echo $spencer_lead_content; ?>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>