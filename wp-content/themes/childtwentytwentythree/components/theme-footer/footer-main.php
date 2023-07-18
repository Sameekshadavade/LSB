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
            <div class="col-lg-3 col-md-6 d-flex">
                    <i class="bi bi-geo-alt icon"></i>
                    <div>
               <?php if($address_label !=''){ ?>
                        <h4><?php echo $address_label; ?></h4>
                <?php } if($address_text !=''){ ?>
                        <p><?php echo $address_text; ?></p>
                <?php } ?>
                    </div>
                </div>
                <?php } if($reservation_label !='' || $email_id !='' || $phone_number !=''){ ?>
                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-telephone icon"></i>
                    <div>
                    <?php if($reservation_label !=''){ ?>
                            <h4><?php echo $reservation_label; ?></h4>
                    <?php } ?>    
                        <p>
                        <?php if($phone_number !=''){ ?>
                            <strong><?php echo $phone_label; ?></strong> <?php echo $phone_number; ?><br>
                        <?php } if($email_id !=''){ ?>
                            <strong><?php echo $email_label; ?></strong> <?php echo $email_id; ?><br>
                        <?php } ?>
                        </p>
                    </div>
                </div>
            <?php } if($opening_hour_text !='' || $opening_hour_label !=''){ ?>
                <div class="col-lg-3 col-md-6 footer-links d-flex">
                    <i class="bi bi-clock icon"></i>
                    <div>
                        <h4><?php echo $opening_hour_label; ?></h4>
              <?php if($opening_hour_text !=''){ ?>
                        <p><?php echo $opening_hour_text; ?></p>
              <?php } ?>
                    </div>
                </div>
            <?php } if($follow_us_repeater !=''){ ?>
                <div class="col-lg-3 col-md-6 footer-links">
                    <h4><?php echo $follow_us_label; ?></h4>
                    <div class="social-links d-flex">
                <?php foreach($follow_us_repeater as $follow_us_repeater_val){ ?>
                        <a href="<?php echo $follow_us_repeater_val['_footer_social_url']; ?>" target="blank" class="twitter"><i class="<?php echo $follow_us_repeater_val['_footer_social__class']; ?>"></i></a>
                <?php } ?>
                    </div>
                </div>
        <?php } ?>
            </div>
        </div>
    </footer>
    <!-- ======= End-Footer-Area ======= -->