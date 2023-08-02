<?php /* Template Name: Payments */ ?>

<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
    <?php  

$payment_head_title = get_field('_payment_head_title');
$payment_content_details = get_field('_payment_content_details');
$payment_form_title = get_field('_payment_form_title');
$contact_info_title = get_field('_contact_info_title');
$contact_info_shortcode = get_field('_contact_info_shortcode');
$payment_info_title = get_field('_payment_info_title');
$payment_info_shortcode_ = get_field('_payment_info_shortcode_');

?>
    <div class="container page-content">
        <?php if($payment_content_details !=''){ ?>
        <section class="common-header mb-5">
            <header class="page-header">
                <h1 class="page-title"><?php echo $payment_head_title; ?></h1>
            </header>
        </section>
        <?php } ?>
        <section class="payment-form-section">
            <div class="row">
                <?php if($payment_content_details !=''){ ?>
                <div class="col-sm-12 mt-5">
                    <?php echo $payment_content_details; ?>
                </div>
                <?php } if($payment_form_title !=''){ ?>
                <div class="col-12 mt-4">
                    <h2 class="payment-title"><?php echo $payment_form_title; ?></h2>
                </div>
                <?php } ?>
            </div>
        </section>

    </div>

</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>