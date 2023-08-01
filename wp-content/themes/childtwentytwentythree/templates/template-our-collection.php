<?php /* Template Name: Our Collection */ ?>

<?php get_header(); ?>

<div class="main-wrapper-area">
<header class="page-header">
<h1 class="page-title"><?php echo get_the_title(); ?></h1>
</header>
<section class="search-id">
<div class="search-wrapper archive-search">
      <h5>Search for an Item</h5>
      <?php get_search_form(); ?> 

				<form action="" method="post" class="searchandfilter archive-search-form">
					<div><ul><li><input type="text" name="ofsearch" placeholder="Search …" value=""></li><li><input type="hidden" name="ofsubmitted" value="1"><input type="submit" value="Submit"></li></ul></div></form>    </div>
</div>
</section>

<?php
$recently_sold_title = get_field('_recently_sold_title');
$args = array(
    'post_type' => 'post',
    'order' => 'DESC',
    'post_status' => 'publish', 
);
$Post_Query = new WP_Query($args);

?>
            <!-- ======= Start-sold-items-section ======= -->
            <section class="row recently-sold-block">
                
                <div class="content-area col-lg-8 wp-bp-content-width">
                 <?php if ($Post_Query-> have_posts() ) :
                            while ($Post_Query->have_posts()) : $Post_Query->the_post(); 
                            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
                            $post_create_date = get_the_date();
                            ?>
                            
                 <article class="card article-card-block col-md-6 col-lg-4">
                        <a href="#" class="card-body">
                            <header class="entry-header">
                            <?php if($feat_image !=''){ ?>
                                <div class="post-thumbnail">
                                    <img width="1000" height="667" src="<?php echo $feat_image; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?php the_title(); ?>" decoding="async" loading="lazy">
                                </div><!-- .post-thumbnail -->
                      <?php } if(get_the_title() !=''){ ?>
                                <h2 class="entry-title card-title h3"><?php the_title(); ?></h2>
                      <?php } ?>
                            </header>
                  <?php if(get_the_content() !=''){ ?>
                            <div class="entry-content">
                                <div class="entry-summary">
                                    <?php //the_content(); ?>
                                </div>
                            </div>
                    <?php } ?>
                            <footer class="entry-footer">
                                <div class="entry-meta">
                                    <span class="posted-on">Posted on <span><time class="entry-date published updated" datetime="2023-06-27T19:52:36-07:00"><?php echo $post_create_date; ?></time></span></span>
                                </div>
                            </footer>
                        </a>
                    </article>
                <?php endwhile;
                endif;
                wp_reset_postdata();
                 ?>
                </div>
                <div class="">
            </div>
            </section>
            <!-- ======= End-sold-items-section ======= -->
        </div>
    </section>




<?php get_footer(); ?>