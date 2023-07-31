<?php /* Template Name: FAQs */ ?>

<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
    <div class="container page-content">
    <?php if(get_the_title() !=''){ ?>
        <section class="common-header mb-5">
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>
        </section>
<?php } ?>
        <section class="faq-section pt-5">
            <div class="row">
        <?php if(get_the_content() !=''){ ?>
                <div class="col-lg-7">
                    <?php the_content(); ?>
                </div>
        <?php } ?>
                <div class="col-lg-5 sidebar">
                    <h2>
                        Still have a question?
                        <small>Send us a message and we will be happy to help.</small>
                    </h2>
                    
                </div>
            </div>
        </section>
    </div>
</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>