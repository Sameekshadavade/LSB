<?php /* Template Name: Get Started */ ?>

<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
<?php 
                $get_satrt_title = get_field('get_satrt_title');
                $get_start_banner_desktop_image = get_field('page_hero_image');


            ?>
    <!-- ======= Start-Banner-Area ======= -->
    <section class="banner-section get-started" style="background-image:url(<?php echo $get_start_banner_desktop_image ['url']; ?>);">
        <div class="banner-content">
          
            <h2><?php echo $get_satrt_title; ?></h2>
        </div>
    </section>
    <!-- ======= End-Banner-Area ======= -->

    <div class="container page-content get-started-content">
        <section class="action-links mb-5 pb-5">
            <div class='row'>
                <div class="col-lg-6 action-link">
                    <div class="action-link-content">
                        
                        <?php  $get_srepeater_tittle = get_field('repeater_tittle');?>
                        <h2>repeater_tittle</h2>
                        <p>Whether you are looking for your first gun or to add to your collection, see how we are the
                            best option for completing your purchase - Without a Buyer’s Premium!</p>
                        <a href="/" class="cta">View Auctions</a>
                    </div>
                </div>
                <div class="col-lg-6 decision-link">
                    <div class="action-link-content">
                        <h2>I'm Here To Sell</h2>
                        <p>If you are looking to sell a single item or an entire collection, learn how we are the
                            premier choice for getting the best value for your items.</p>
                        <a href="/" class="cta">Start Process</a>
                    </div>
                </div>
            </div>
        </section>
        <section class="banner mid-banner mt-5">
            <div class="banner-wrapper ">
                <div class="banner-content">
                    <h4>We Are Only Satisfied When You Are Satisfied</h4>
                    <p>
                        We work tirelessly to ensure that everyone that we interact with on a daily basis has a
                        positive experience.
                    </p>
                    <a href="/about" class="cta">Learn More</a>
                </div>
            </div>
        </section>
    </div>

</div>
<!-- ======= End-Main-Area ======= -->

<?php get_footer(); ?>