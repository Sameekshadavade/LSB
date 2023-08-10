<?php /* Template Name: Privacy Statement */ ?>

<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
<?php  
$first_block_content = get_field('_first_block_content');
$purpose_repeater = get_field('_purpose_repeater');
$second_block_content = get_field('_second_block_content');
$second_accordion_repeater = get_field('_second_accordion_repeater');
$bottom_content_section = get_field('_bottom_content_section');

if($first_block_content !='' || $purpose_repeater !='' || $second_block_content !='' || $second_accordion_repeater !='' || $bottom_content_section !=''){
?>
    <div class="container page-content">
        <section class="common-header mb-5">
            <header class="page-header">
                <h1 class="page-title"><?php the_title(); ?></h1>
            </header>
        </section>
        <section class="privacy-section">
            <div class="row">
                <div class="col-12">
                    <div class="privacy-content">
                        <?php echo $first_block_content; 
                        
                        if($purpose_repeater !=''){
                            foreach($purpose_repeater as $purpose_repeater_val){
                        ?>
                        <details class="cmplz-dropdown dropdown-privacy-statement">
                    <?php if($purpose_repeater_val['_purpose_title'] !=''){ ?>
                        <summary>
                                <div>
                                    <h3><?php echo $purpose_repeater_val['_purpose_title']; ?></h3>
                                </div>
                            </summary>

                        <?php } if($purpose_repeater_val['_purpose_content'] !=''){ echo $purpose_repeater_val['_purpose_content']; } ?>
                        </details>
                    <?php } } 
                    
                    if($second_block_content !=''){ echo $second_block_content; }
                    ?>
                        
                       <?php if($second_accordion_repeater !=''){
                                foreach($second_accordion_repeater as $second_accordion_val){
                        ?>
                        <details class="cmplz-dropdown dropdown-privacy-statement">
                    <?php if($second_accordion_val['_second_accordion_title'] !=''){ ?>
                        <summary>
                                <div>
                                    <h3><?php echo $second_accordion_val['_second_accordion_title']; ?></h3>
                                </div>
                            </summary>

                        <?php } if($second_accordion_val['_second_accordion_content'] !=''){ echo $second_accordion_val['_second_accordion_content']; } ?>
                        </details>
                    <?php } } 
                    
                    if($bottom_content_section !=''){ echo $bottom_content_section; }
                    ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php } ?>
</div>
<!-- ======= End-Main-Area ======= -->
<?php get_footer(); ?>