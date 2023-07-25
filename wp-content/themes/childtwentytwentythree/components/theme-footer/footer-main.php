<?php

$address_label = get_field('_address_label', 'option');
$address_text = get_field('_address_text', 'option');

$reservation_label = get_field('_reservation_label', 'option');
$phone_label = get_field('_phone_label', 'option');
$phone_number = get_field('_phone_number_', 'option');
$email_label = get_field('_email_label', 'option');
$email_id = get_field('_email_id_', 'option');

$opening_hour_label = get_field('_opening_hour_label', 'option');
$opening_hour_text = get_field('_opening_hour_text', 'option');

$follow_us_label = get_field('_follow_us_label', 'option');
$follow_us_repeater = get_field('_follow_us_repeater', 'option');

?>
<!-- ======= Start-Footer-Area ======= -->
<footer id="footer" class="footer">
        <div class="container">
            <div class="row gy-3">
            <?php if($address_label !='' || $address_text !=''){ ?>
            <div class="col-sm-4 col-md-3 col-lg-2 footer-links">
                    <div>
                        
               <?php if($address_label !=''){ ?>
                        <h4 class="mb-2">AUCTIONS</h4>
                <?php }?>                    
              
                    </div>
                    <ul>
          <li>
            <a href="" rel="noopener noreferrer" target="_blank">
              Premium Guns
            </a>
          </li>
          <li>
            <a href="" rel="noopener noreferrer" target="_blank" >
              Ammo &amp; Reloading
            </a>
          </li>
          <li>
            <a href="" rel="noopener noreferrer" target="_blank" >
              eBay
            </a>
          </li>
        </ul>   
                </div>
                <?php } if($reservation_label !='' || $email_id !='' || $phone_number !=''){ ?>
                <div class="col-sm-4 col-md-3 col-lg-2 footer-links">
                    <div>
                    <?php if($reservation_label !=''){ ?>
                            <h4 class="mb-2">COMPANY</h4>
                    <?php } ?>    
                       
                    </div>
                    <ul>
          <li><a href="">Contact Us</a></li>
          <li><a href="">FAQs</a></li>
          <li><a href="">Careers</a></li>
        </ul>
                </div>
            <?php } if($opening_hour_text !='' || $opening_hour_label !=''){ ?>
                <div class="col-sm-4 col-md-3 col-lg-2 footer-links">
                    <div>
                        <h4 class="mb-2">LEGAL</h4>            
                    </div>
                    <ul>
          <li><a href="/terms-of-service">Terms of Service</a></li>
          <li><a href="/privacy-statement-us/">Privacy Policy</a></li>
        </ul>
                </div>
            <?php } if($follow_us_repeater !=''){ ?>
                <div class="col-md-3 col-lg-2 footer-links text-center">
                    <h4 class="mb-2 text-center">SOCIAL MEDIA</h4>
                    <div class="social-links d-flex justify-content-center">
                    <a href="https://www.facebook.com/lsbauctions" rel="noopener noreferrer" target="_blank">
          <img src="https://lsbauctions.com/wp-content/themes/lsb-auctions/dist/assets/images/svg/icon-facebook.svg" alt="Facebook.com">
        
        </a>
                    </div>
                </div>
        <?php } ?>

        <div class="col-md-12 col-lg-4 company-info">
        <div class="d-flex justify-conent-center">
        <img width="80" class="me-2" src="https://lsbauctions.com/wp-content/themes/lsb-auctions/dist/assets/images/brands/lsb_letters-light-tan.svg" alt="<?php echo get_bloginfo('name'); ?>">
          <p aria-label="Company address">
            <strong>Lock, Stock &amp; Barrel Investments</strong>
            94 W. Cochran St., Suite B<br />
            Simi Valley, CA 93065
          </p>
        </div>
        <div class="bbb-link tect-center mt-4 d-flex justify-content-center">
          <a title="Business Review of Lock, Stock and Barrel Investments"
            href="https://www.bbb.org/santa-barbara/business-reviews/guns-and-gunsmiths/ lock-stock-and-barrel-investments-in-simi-valley-ca-92009367#sealclick"
            rel="noopener noreferrer" target="_blank">
            <img alt="BBB Business Review" style="border: 0;" width="100"
              src="https://seal-santabarbara.bbb.org/seals/black-seal-160-82-lockstockandbarrelinvestments-92009367.png">
            <span class="screen-reader-text" style="background:transparent;color:white;">Opens a new window</span></a>
        </div>
        <p class="copyright text-center mt-4">© Copyright 2011-2023 All Rights Reserved.</p>
      </div>
            </div>
        </div>
    </footer>
    <!-- ======= End-Footer-Area ======= -->