<?php /* Template Name: About us */ ?>

<?php get_header(); ?>
<!-- ======= Start-Main-Area ======= -->
<?php

$about_banner_desktop_image = get_field('_about_banner_desktop_image_');
$banner_site_logo = get_field('_banner_site_logo');
$banner_heading_text = get_field('_banner_heading_text');

?>
<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">

    <!-- ======= Start-Banner-Area ======= -->
    <?php if ($about_banner_desktop_image != '' || $banner_site_logo != '' || $banner_heading_text != '') { ?>
        <section class="banner-section about" style="background-image:url(<?php echo $about_banner_desktop_image['url']; ?>);">
            <div class="banner-content">
                <?php if ($banner_site_logo != '') { ?>
                    <img class="lsb-brand" src="<?php echo $banner_site_logo['url']; ?>" alt="<?php echo $banner_site_logo['alt']; ?>">
                <?php }
                if ($banner_heading_text != '') { ?>
                    <h2><?php echo $banner_heading_text; ?></h2>
                <?php } ?>
            </div>
        </section>
    <?php }


    $about_us_title = get_field('_about_us_title');
    $left_side_title = get_field('_left_side_title');
    $left_side_content = get_field('_left_side_content');
    $right_side_history_image = get_field('_right_side_history_image');

    $lock_stock_head_title = get_field('_lock_stock_head_title');
    $difference_repeater = get_field('_difference_repeater');

    ?>
    <!-- ======= End-Banner-Area ======= -->

    <div class="container page-content">
        <?php if ($about_us_title != '') { ?>
            <section class="common-header mb-5">
                <header class="page-header">
                    <h1 class="page-title"><?php echo $about_us_title; ?></h1>
                </header>
            </section>
        <?php }
        if ($left_side_title != '' || $left_side_content != '' || $right_side_history_image != '') { ?>
            <section class="history-section pt-md-5">
                <div class="row">
                    <div class="col-md-8">
                        <?php if ($left_side_title != '') { ?>
                            <h2><?php echo $left_side_title; ?></h2>
                        <?php }
                        if ($left_side_content != '') { ?>
                            <?php echo $left_side_content; ?>
                        <?php }  ?>
                    </div>
                    <?php if ($right_side_history_image != '') { ?>
                        <div class="col-md-4">
                            <div class="banner">
                                <img src="<?php echo $right_side_history_image['url']; ?>" alt="<?php echo $right_side_history_image['alt']; ?>">
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </section>
        <?php }
        if ($lock_stock_head_title != '' || $difference_repeater != '') { ?>
            <section class="row lsb-difference mt-5 mb-5">
                <div class="col">
                    <h2 class="section-heading"><span>The Lock, Stock &amp; Barrel Difference</span></h2>
                    <ul class="two-col circle-checkmark">
                        <?php foreach ($difference_repeater as $difference_repeater_val) { ?>
                            <li>
                                <?php if ($difference_repeater_val['_difference_title'] != '') { ?>
                                    <h3><?php echo $difference_repeater_val['_difference_title']; ?></h3>
                                <?php }
                                if ($difference_repeater_val['_difference_content'] != '') { ?>
                                    <?php echo $difference_repeater_val['_difference_content']; ?>
                                <?php } ?>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </section>
        <?php
        }
        $buyer_feedback_head_title = get_field('_buyer_feedback_head_title');
        $buyer_feedback_content = get_field('_buyer_feedback_content');
        $buyer_feedback_notice = get_field('_buyer_feedback_notice');
        $feedback_repeater = get_field('_feedback_repeater');

        ?>
        <section class="row user-feedback">
            <div class="col">
                <?php if ($buyer_feedback_head_title != '') { ?>
                    <h2 class="section-heading"><span><?php echo $buyer_feedback_head_title; ?></span></h2>
                <?php }
                if ($buyer_feedback_content != '') { ?>
                    <?php echo $buyer_feedback_content; ?>
                <?php }
                if ($buyer_feedback_notice != '') { ?>
                    <p class="note-block">
                        <?php echo $buyer_feedback_notice; ?>
                    </p>
                <?php } ?>
                <div class="row">
                    <?php if ($feedback_repeater != '') {
                        foreach ($feedback_repeater as $feedback_repeater_val) { ?>
                            <div class="col-sm-6 col-md-3 feedback-link">
                                <?php if ($feedback_repeater_val['_feedback_link'] != '' && $feedback_repeater_val['_feedback_image'] != '') { ?>
                                    <a href="<?php echo $feedback_repeater_val['_feedback_link']['url']; ?>" target="_blank">
                                        <img src="<?php echo $feedback_repeater_val['_feedback_image']['url']; ?>" alt="<?php echo $feedback_repeater_val['_feedback_image']['alt']; ?>">
                                        <span><?php echo $feedback_repeater_val['_feedback_link']['title']; ?></span>
                                        <span class="screen-reader-text">Opens a new window</span>
                                    </a>
                                <?php } ?>
                            </div>
                    <?php }
                    } ?>
                </div>
            </div>
        </section>
    </div>

</div>
<!-- ======= End-Main-Area ======= -->
<?php get_footer(); ?>