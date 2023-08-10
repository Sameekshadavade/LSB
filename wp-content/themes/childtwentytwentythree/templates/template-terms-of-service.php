<?php /* Template Name: Terms of Service */ ?>

<?php get_header();

if(get_the_content() !=''){
?>
<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
    <div class="container page-content">  
    <section class="common-header mb-5">
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>
        </section>
        <section class="tearm-section pt-5">
            <div class="row">
                <div class="col-12">
                    <div class="terms-content-block">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
<!-- ======= End-Main-Area ======= -->
<?php } get_footer(); ?>