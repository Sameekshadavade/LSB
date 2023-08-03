<?php /* Template Name: Contact Us */ ?>

<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
    <!-- ======= Start-Banner-Area ======= -->
    <?php

    $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
    if ($feat_image != '') {
    ?>
        <section class="banner-section contact" style="background-image: url('<?php echo $feat_image; ?>');">
            <?php if (get_the_content() != '') { ?>
                <div class="banner-content">
                    <?php the_content(); ?>
                </div>
            <?php } ?>
        </section>
        <!-- ======= End-Banner-Area ======= -->
    <?php
    }
    $contact_head_title = get_field('_contact_head_title');
    $contacting_us_content = get_field('_contacting_us_content');
    $contact_us_form_shortcode = get_field('_contact_us_form_shortcode');
    $company_info_repeater = get_field('_company_info_repeater');

    ?>
    <div class="container page-content">
        <section class="common-header mb-5">
            <?php if ($contact_head_title != '') { ?>
                <header class="page-header">
                    <h1 class="page-title"><?php echo $contact_head_title; ?></h1>
                </header>
            <?php } ?>
        </section>
        <section class="contact-section mt-5 mb-5 pt-5 pb-5">
            <?php if ($contacting_us_content != '' || $contact_us_form_shortcode != '') { ?>
                <div class="row">
                    <div class="col-lg-8">
                        <div class="sell-heading-block">
                            <?php if ($contacting_us_content != '') {
                                echo $contacting_us_content;
                            } ?>
                            <p class="required-field-block">"<span class="required-tag">*</span>" indicates required fields</p>
                        </div>
                        <div class="common-from-block">
                            <?php if ($contact_us_form_shortcode != '') {
                                echo do_shortcode($contact_us_form_shortcode);
                            } ?>
                        </div>
                    </div>
                <?php }
            if ($company_info_repeater != '') { ?>
                    <div class="col-lg-4">
                        <ul class="company-info mt-5 mt-lg-0">
                            <?php foreach ($company_info_repeater as $company_info_repeater_val) { ?>
                                <li>
                                    <?php if ($company_info_repeater_val['_info_title'] != '') { ?>
                                        <h6><?php echo $company_info_repeater_val['_info_title']; ?></h6>
                                    <?php }
                                    if ($company_info_repeater_val['_info_content'] != '') {
                                        echo $company_info_repeater_val['_info_content'];
                                    } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                <?php } ?>
                </div>
        </section>
        <?php

        $direction_head_title = get_field('_direction_head_title');
        $direction_map_iframe = get_field('_direction_map_iframe');
        if ($direction_map_iframe != '') {
        ?>
            <section class="map-section">
                <h2 class="section-heading"><span><?php echo $direction_head_title; ?></span></h2>
                <?php echo $direction_map_iframe; ?>
            </section>
        <?php } ?>
    </div>
</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>