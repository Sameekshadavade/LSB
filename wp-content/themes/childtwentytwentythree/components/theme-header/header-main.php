<?php
$custom_logo_id = get_theme_mod('custom_logo');
$logo = wp_get_attachment_image_src($custom_logo_id, 'full');
?>
<!-- ======= Start-Header-Area ======= -->
<header id="header" class="header d-flex align-items-center">
    <div id="site-nav-bar" class="site-nav-bar">
        <div class="upper-bar">
            <div class="site-brand">
                <?php if ($logo != '') { ?>
                    <a href="<?php home_url(); ?>">
                        <img src="<?php echo $logo[0]; ?>" alt="<?php echo get_bloginfo('name'); ?>">
                    </a>
                <?php } else {
                    echo '<h1>' . get_bloginfo('name') . '</h1>';
                } ?>
            </div>
            <div class="right-top-header">
                <?php $phone_number = get_theme_mod('header_phone_option'); ?>
                <ul class="utility-section">
                    <?php if ($phone_number != '') { ?>
                        <li>
                            <h5 class="company-phone-number"><small>Phone:</small><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></h5>
                        </li>
                    <?php } ?>
                    <li class="search-bar">
                        <?php get_search_form(); ?>
                    </li>
                </ul>
            </div>
        </div>
        <div class="lower-bar">
            <div class="container-fluid p-0">
                <nav id="navbar" class="navbar w-100">
                    <?php wp_nav_menu(array('theme_location' => 'lsb-header-menu')); ?>
                </nav><!-- .navbar -->
                <div class="mobile-view-header">
                    <h5 class="company-phone-number"><a href="tel:<?php echo $phone_number; ?>"><?php echo $phone_number; ?></a></h5>
                    <i class="mobile-nav-toggle mobile-nav-show bi bi-list"></i>
                </div>
                <i class="mobile-nav-toggle mobile-nav-hide d-none bi bi-x"></i>
            </div>
        </div>
    </div>
</header>