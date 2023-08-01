<?php /* Template Name: Our Collection */ ?>
<?php get_header(); ?>
<div class="main-wrapper-area">
<header class="page-header">
   <h1 class="page-title"><?php echo get_the_title(); ?></h1>
</header>
<section class="search-id">
   <div class="search-wrapper archive-search">
      <h5>Search for an Item</h5>
      <form role="search" method="get" class="search-form" action="<?php echo home_url( '/' ); ?>">
         <label>
         <span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
         <input type="search" class="search-field" placeholder="<?php echo esc_attr_x( 'Search …', 'placeholder' ) ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
         </label>
         <input type="submit" class="search-submit" value="<?php echo esc_attr_x( 'Search', 'submit button' ) ?>" />
      </form>
   </div>
</section>
<section>
   <div class="row">
   <div class="col-md-8">
      <?php
      $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;
         $args = array(
           'post_type' => 'post',
           'order' => 'DESC',
           'post_status' => 'publish', 
           'category_name' => 'collection', //Category Slug name
           'posts_per_page' => 10,

         );
         $Post_Query = new WP_Query($args);
         ?>   
      <div class="row">
         <?php
            if ($Post_Query-> have_posts() ) :
               while ($Post_Query->have_posts()) : $Post_Query->the_post(); 
               $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
               $post_create_date = get_the_date();
               ?>
         <div class="col-md-6">
            <article class="card article-card-block">
               <a href="" class="card-body">
                  <header class="entry-header">
                     <?php if($feat_image !=''){ ?>
                     <div class="post-thumbnail">
                        <img width="1000" height="667" src="<?php echo $feat_image; ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image" alt="<?php the_title(); ?>" decoding="async" loading="lazy">
                     </div>
                     <!-- .post-thumbnail -->
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
         </div>
         <?php endwhile;

            endif;
            wp_reset_postdata();
            ?>
      <div class="pager">
	          	<?php $big = 999999999; // need an unlikely integer?>

	            <div class="custom-pagination">
				    <?php
				    	echo paginate_links( array(
				        'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
				        'format' => '?paged=%#%',
				        'current' => max( 1, get_query_var('paged') ),
				        'next_text'          => __('<i class="fa fa-angle-double-right	
                        " aria-hidden="true"></i>'),
				        'prev_text'          => __('<i class="fa fa fa-angle-double-left	
                        " aria-hidden="true"></i>'),
				        'total' =>  $Post_Query->max_num_pages
				   	) );
                    ?>
                    
				    </div>
				</div>
    </div>
        </div>
      <div class="col-md-4">
         <div class="sticky-top sticky-offset">
            <section id="block-6" class="widget border-bottom widget_block">
               <h2 class="wp-block-heading">Collection Categories</h2>
            </section>
            <section id="block-2" class="widget border-bottom widget_block">
               <ul>  <?php
               $cat =3;

                  $categories = get_categories(array('parent' => $cat));
                  
                  foreach($categories as $category) {
                     echo '<li class="col-md-4"><a href="' . get_category_link($category->term_id) . '">' . $category->name . '</a></li>';

                  }
                  ?></ul>
            </section>
         </div>
      </div>
   </div>
</section>
<?php get_footer(); ?>