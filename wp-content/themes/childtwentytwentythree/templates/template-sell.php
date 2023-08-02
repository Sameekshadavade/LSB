<?php /* Template Name: Sell */ ?>

<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
    <?php


    $sell_head_title = get_field('_sell_head_title');
    $what_to_do_title = get_field('_what_to_do_title');
    $what_to_do_content = get_field('_what_to_do_content');
    $seller_info_form_title = get_field('_seller_info_form_title');
    $seller_form_shortcode = get_field('sell_form_shortcode');

    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));

    if ($feat_image != '') {
    ?>
    <!-- ======= Start-Banner-Area ======= -->
    <section class="banner-section sell" style="background-image: url('<?php echo $feat_image; ?>');">
        <?php if (get_the_content() != '') { ?>
        <div class="banner-content">
            <h2><?php the_content(); ?></h2>
        </div>
        <?php } ?>
    </section>
    <!-- ======= End-Banner-Area ======= -->
    <?php } ?>
    <div class="container page-content">
        <?php if ($sell_head_title != '') { ?>
        <section class="common-header mb-5">
            <header class="page-header">
                <h1 class="page-title"><?php echo $sell_head_title; ?></h1>
            </header>
        </section>
        <?php }
        if ($what_to_do_title != '' || $what_to_do_content != '' || $seller_info_form_title != '') {  ?>
        <section class="sell-section pt-5">
            <div class="row">
                <div class="col-12">
                    <?php if ($what_to_do_title != '') { ?>
                    <h2><?php echo $what_to_do_title; ?></h2>
                    <?php }
                        if ($what_to_do_content != '') {
                            echo $what_to_do_content;
                        } ?>
                </div>
                <?php if ($seller_info_form_title != '') { ?>
                <div class="col-12 mt-4">
                    <h2 class="payment-title"><?php echo $seller_info_form_title; ?></h2>
                    <p class="required-field-block">"<span class="required-tag">*</span>" indicates required fields</p>
                </div>
                <?php } ?>
            </div>
        </section>
        <?php }
        if ($seller_form_shortcode != '') { ?>
        <div class="sell-form-shortcode">
            <div class="form-title-block" data-js-reload="field_2_11">
                <h3 class="sell-form-title">Contact Information</h3>
            </div>
            <?php echo do_shortcode($seller_form_shortcode); ?>
        </div>
        <?php } ?>
    </div>

</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>