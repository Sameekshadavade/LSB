<?php
	get_header();
?>
<div id="error_page" class="container page-content error-404">
    <section class="row">
        <header class="page-header">
            <h1 class="page-title">You Appear To Be Lost</h1>
        </header>
    </section>
    <section class="row">
        <div class="intro-text">
            <h6>
                The page you were looking for could not be found. It might have been removed, renamed, or did not exist
                in the
                first place.
            </h6>
            <p>Please use one of the links below to continue.</p>
        </div>
        <ul class="alt-links">
            <li><a href="<?php home_url(); ?>">Home</a></li>
            <li><a href="<?php home_url(); ?>/get-started">Get Started</a></li>
            <li><a href="<?php home_url(); ?>/contact-us">Contact Us</a></li>
        </ul>
    </section>
</div>
<?php
	get_footer();
?>