<?php

$social_media_label = get_field('_social_media_label', 'option');
$social_icon_repeater = get_field('_social_icon_repeater', 'option');

$footer_site_logo = get_field('_footer_site_logo', 'option');
$footer_address_text = get_field('_footer_address_text', 'option');
$footer_bbb_logo = get_field('_footer_bbb_logo', 'option');
$bbb_logo_url = get_field('_bbb_logo_url', 'option');
$copyright_text = get_field('_copyright_text', 'option');


?>
<!-- ======= Start-Footer-Area ======= -->
<footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-3">
              <div class="col-sm-4 col-md-3 col-lg-2 footer-links">
                  <?php dynamic_sidebar('auction-footer-widget'); ?>
              </div>
              <div class="col-sm-4 col-md-3 col-lg-2 footer-links">
                  <?php dynamic_sidebar('company-footer-widget'); ?>
              </div>
              <div class="col-sm-4 col-md-3 col-lg-2 footer-links">
                  <?php dynamic_sidebar('legal-footer-widget'); ?>
              </div>
            <?php if($social_icon_repeater !=''){ ?>
                    <div class="col-md-3 col-lg-2 footer-links text-center">
                        <h4 class="mb-2 text-center"><?php echo $social_media_label; ?></h4>
                    <?php foreach($social_icon_repeater as $social_icon_repeater_val){ ?>
                        <div class="social-links d-flex justify-content-center">
                          <?php if($social_icon_repeater_val['_icon_url'] !=''){ ?>
                                  <a href="<?php echo $social_icon_repeater_val['_icon_url']; ?>" rel="noopener noreferrer" target="_blank">
                                    <img src="<?php echo $social_icon_repeater_val['_icon_image']['url']; ?>" alt="Facebook Icon">
                                    </a>
                            <?php } ?>
                        </div>
            <?php } ?>
            </div>
          <?php } ?>
        <div class="col-md-12 col-lg-4 company-info">
        <div class="d-flex justify-conent-center">
    <?php if($footer_site_logo !=''){ ?>
            <img width="80" class="me-2" src="<?php echo $footer_site_logo['url']; ?>" alt="<?php echo get_bloginfo('name'); ?>">
    <?php } if($footer_address_text !=''){ ?>
        <p aria-label="Company address"><?php echo $footer_address_text; ?></p>
      <?php } ?>
        </div>
      <?php if($bbb_logo_url !=''){ ?>
          <div class="bbb-link tect-center mt-4 d-flex justify-content-center">
              <a title="Business Review of Lock, Stock and Barrel Investments"
                  href="<?php echo $bbb_logo_url; ?>"
                  rel="noopener noreferrer" target="_blank">
                  <img alt="BBB Business Review" style="border: 0;" width="100"
                    src="<?php echo $footer_bbb_logo['url']; ?>" alt="<?php echo $footer_bbb_logo['alt']; ?>">
                  <span class="screen-reader-text" style="background:transparent;color:white;">Opens a new window</span></a>
            </div>
  <?php } if($copyright_text !=''){ ?>
              <p class="copyright text-center mt-4"><?php echo $copyright_text; ?></p>
    <?php } ?>
      </div>
            </div>
        </div>
    </footer>
    <!-- ======= End-Footer-Area ======= -->