<?php /* Template Name: FAQs */ ?>

<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
    <div class="container page-content">
    <?php //if(get_the_title() !=''){ ?>
        <section class="common-header mb-5">
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>
        </section>
<?php  
$faq_page_repeater = get_field('_faq_page_repeater_');
$faq_form_shortcode = get_field('faq_form_shortcode');

?>
        <section class="faq-section pt-md-5 pt-sm-3">
            <div class="row">
        <?php if(get_the_content() !=''){ ?>
                <div class="col-lg-7">
                    <div class="faq-description-block">
                        <?php the_content(); ?>
                    </div>
        <?php } if($faq_page_repeater !=''){ ?>
                    <div class="faq-list">
                        <div class="accordion accordion-flush faq-inner-block" id="accordionFlushExample">
                    <?php foreach($faq_page_repeater as $faq_page_repeater_val){ ?>     
                        <div class="accordion-item">
              <?php if($faq_page_repeater_val['_faq_question_'] !=''){ ?>
                        <h2 class="accordion-header" id="flush-headingOne">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                        <?php echo $faq_page_repeater_val['_faq_question_']; ?>
                                    </button>
                                </h2>
              <?php } if($faq_page_repeater_val['_faq_answer_'] !=''){ ?>
                                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                    <div class="accordion-body">
                                        <span class="faq-title"><strong>ANSWER:</strong></span>
                                        <?php echo $faq_page_repeater_val['_faq_answer_']; ?>
                                    </div>
                                </div>
              <?php } ?>
                            </div>
                        <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
      <?php } ?>
                <div class="col-lg-5">
                    <div class="faq-sidebar">
                        <h2>
                            Still have a question?
                            <small>Send us a message and we will be happy to help.</small>
                        </h2>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>