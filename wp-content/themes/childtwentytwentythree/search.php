<?php

/**
 * Template Name: Search Page
 */

?>
<?php get_header(); ?>

<!-- ======= Start-Main-Area ======= -->
<div class="main-wrapper-area">
    <div class="container page-content">
        <section class="search-filter-section mt-5 common-header mt-lg-4 mb-5">
            <header class="page-header">
                <?php 
                        global $wp_query;
                        $search_query = sprintf(get_search_query());
                        
                        $paged = (get_query_var('paged')) ? absint(get_query_var('paged')) : 1;
                        $categories = get_categories(array(
                            'orderby' => 'name',
                            'order'   => 'ASC',
                            'hide_empty' => false,
                            
                        ));
                        if(isset($_GET['postcategory']) && (!empty($_GET['postcategory']))){
                        $category_id = $_GET['postcategory'];
                        $term = get_term($category_id);
                        }

                        if((empty($search_query)) && (empty($category_id))){
                            echo '<h1 class="page-title">Search: <span>Showing All Items<span></h1>';
                        }elseif(!empty($category_id)){ 
                            echo '<h1 class="page-title">Search: <span>Showing All Items<span></h1>';    
                        }elseif(!empty($search_query)){ 
                            echo '<h1 class="page-title">NO RESULTS FOR: <span>"'.$search_query.'"</span></h1>';    
                        }else{
                            echo '<h1 class="page-title">NO RESULTS FOR: <span>'.$search_query.'</span></h1>';
                        }
                        if(!empty($category_id) && (!empty($term))){
                            echo '<h5 id="curr_cat_heading" class="current-selected-category">In Category:'.$term->name.' <strong></strong></h5>';
                        }elseif(!empty($search_query)){
                            echo '<h5 id="curr_cat_heading" class="current-selected-category">In Category: <strong>All Categories</strong></h5>';
                        }else{
                            echo '<h5 id="curr_cat_heading" class="current-selected-category">In Category: <strong>All Categories</strong></h5>';
                        }
                    
                        ?>
            </header>
        </section>
        <section class="search-inner-block">
            <div class="search-wrapper">
                <h5>Refine your search</h5>

                <form action="" method="GET" class="searchandfilter search-filters">
                    <div>
                        <ul>
                            <li>
                              
                                <h4>Search For</h4> <input type="search" class="search-field" placeholder="<?php echo esc_attr_x('Search …', 'placeholder') ?>" value="<?php echo get_search_query() ?>" name="s" title="<?php echo esc_attr_x('Search for:', 'label') ?>" />
                            </li>
                            <li>
                                <h4>Category to Search</h4>
                                <select name="postcategory" id="postcategory" class="postform">
                                    <option value="">All Categories</option>
                                    <?php foreach ($categories as $category) {  ?>
                                    <option class="level-0" value="<?php echo $category->term_id; ?>">
                                        <?php echo $category->name; ?></option>
                                    <?php } ?>
                                </select>
                                <input type="hidden" name="ofcategory_operator" value="and">
                            </li>
                            <li>
                                <h4>Date Range</h4>
                                <input class="postform" type="date" name="startdate" value="">
                            </li>
                            <li><input class="postform" type="date" name="enddate" value=""></li>
                            <li>
                            <input type="submit" class="search-submit" value="<?php echo esc_attr_x('Submit', 'submit button') ?>" />
                        
                        </li>
                        </ul>
                    </div>
                </form>
                <button id="clear_search_filters" class="btn-clear-search">Clear Search</button>
            </div>
        </section>
        <section class="collection-block pt-3">
            <div class="row">
            <?php
    
            global $wpdb;
            if((!empty(isset($_GET['postcategory']))) || (!empty(isset($_GET['startdate']))) || (!empty(isset($_GET['enddate']))) ||(!empty($search_query))) {
                $category_id = $_GET['postcategory'];
                $startdate = $_GET['startdate'];
                $enddate = $_GET['enddate'];
                // prints the current time in date format 
                $start_date = date("Y-m-d", strtotime($startdate));
                $end_date  = date("Y-m-d", strtotime($enddate));     
                    
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'order' => 'DESC',
                        'post_status' => 'publish',
                        'cat' => $category_id,
                        'date_query' => array(
                            array(
                                'after'     => $start_date,
                                'before'    => $end_date,
                                'inclusive' => true,
                            ),
                        ),
                    );

                    $query = new WP_Query($args);
                    if ($query->have_posts()) :
                        while ($query->have_posts()) : $query->the_post();
                            $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
            ?>
        <div class="col-md-4">
            <article class="card article-card-block">
                <a href="<?php the_permalink(); ?>" class="card-body">
                    <header class="entry-header">
                        <div class="post-thumbnail">
                            <img src="<?php echo $feat_image; ?>" alt="">
                        </div>
                        <h2 class="entry-title card-title h3"><?php the_title(); ?></h2>
                    </header>
                    <footer class="entry-footer">
                        <div class="entry-meta">
                            <span class="posted-on">Posted on <span><time
                                        class="entry-date published updated"><?php the_date(); ?></time></span></span>
                        </div>
                    </footer>
                </a>
        </div>

        <?php
            endwhile;
          
        endif;
        wp_reset_postdata(); ?>
        <div class="pager">
            <?php $big = 999999999; // need an unlikely integer
                                    ?>

            <div class="custom-pagination">
                <?php
                    echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'next_text'          => __('<i class="fa-solid fa-angles-right"></i>'),
                    'prev_text'          => __('<i class="fa-solid fa-angles-left"></i>'),
                    'total' =>  $query->max_num_pages
                    )); ?>
                </div>
            </div>
        <?php  
            }
         
         elseif (!empty($startdate) || !empty($enddate)) { 
         
      
                  $query_string = array(
                      'post_type' => 'post',
                      'posts_per_page' => -1,
                      'order' => 'DESC',
                      'post_status' => 'publish',
                      'date_query' => array(
                          array(
                              'after'     => $start_date,
                              'before'    => $end_date,
                              'inclusive' => true,
                          ),
                      ),
                  );

                  $date_query = new WP_Query($query_string);
                  if ($date_query->have_posts()) :
                      while ($date_query->have_posts()) : $date_query->the_post();
                          $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                      ?>
          <div class="col-md-4">
              <article class="card article-card-block">
                  <a href="<?php the_permalink(); ?>" class="card-body">
                      <header class="entry-header">
                          <div class="post-thumbnail">
                              <img src="<?php echo $feat_image; ?>" alt="">
                          </div>
                          <h2 class="entry-title card-title h3"><?php the_title(); ?></h2>
                      </header>
                      <footer class="entry-footer">
                          <div class="entry-meta">
                              <span class="posted-on">Posted on <span><time
                                          class="entry-date published updated"><?php the_date(); ?></time></span></span>
                          </div>
                      </footer>
                  </a>
          </div>
          <?php endwhile;
          else: ?>
            <section class="no-results not-found card mt-3r">
        <div class="card-body">
            <header class="page-header">
                <h3>Hmmm, can't seem to find that</h3>
            </header><!-- .page-header -->
            <div class="page-content">
                <p>Please refine your search term, try again with some different keywords or select
                    another category.</p>
            </div>
        </div>
    </section><?php
          endif;
          wp_reset_postdata(); ?>
          <div class="pager">
              <?php $big = 999999999; // need an unlikely integer ?>

              <div class="custom-pagination">
                  <?php
                  echo paginate_links(array(
                  'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                  'format' => '?paged=%#%',
                  'current' => max(1, get_query_var('paged')),
                  'next_text'          => __('<i class="fa-solid fa-angles-right"></i>'),
                  'prev_text'          => __('<i class="fa-solid fa-angles-left"></i>'),
                  'total' =>  $date_query->max_num_pages
                  )); ?>
              </div>
          </div>
          <?php }
          
         elseif (!empty($startdate) && !empty($enddate)) { 
                
            
                        $query_string = array(
                            'post_type' => 'post',
                            'posts_per_page' => -1,
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'date_query' => array(
                                array(
                                    'after'     => $start_date,
                                    'before'    => $end_date,
                                    'inclusive' => true,
                                ),
                            ),
                        );

                        $date_query = new WP_Query($query_string);
                        if ($date_query->have_posts()) :
                            while ($date_query->have_posts()) : $date_query->the_post();
                                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                            ?>
                <div class="col-md-4">
                    <article class="card article-card-block">
                        <a href="<?php the_permalink(); ?>" class="card-body">
                            <header class="entry-header">
                                <div class="post-thumbnail">
                                    <img src="<?php echo $feat_image; ?>" alt="">
                                </div>
                                <h2 class="entry-title card-title h3"><?php the_title(); ?></h2>
                            </header>
                            <footer class="entry-footer">
                                <div class="entry-meta">
                                    <span class="posted-on">Posted on <span><time
                                                class="entry-date published updated"><?php the_date(); ?></time></span></span>
                                </div>
                            </footer>
                        </a>
                </div>
                <?php endwhile;
                else: ?>
                  <section class="no-results not-found card mt-3r">
              <div class="card-body">
                  <header class="page-header">
                      <h3>Hmmm, can't seem to find that</h3>
                  </header><!-- .page-header -->
                  <div class="page-content">
                      <p>Please refine your search term, try again with some different keywords or select
                          another category.</p>
                  </div>
              </div>
          </section><?php
                endif;
                wp_reset_postdata(); ?>
                <div class="pager">
                    <?php $big = 999999999; // need an unlikely integer ?>

                    <div class="custom-pagination">
                        <?php
                        echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'next_text'          => __('<i class="fa-solid fa-angles-right"></i>'),
                        'prev_text'          => __('<i class="fa-solid fa-angles-left"></i>'),
                        'total' =>  $date_query->max_num_pages
                        )); ?>
                    </div>
                </div>
                <?php 
                
 } 
 
 elseif (isset($category_id)) { 

                            
                        $args = array(
                            'post_type' => 'post',
                            'posts_per_page' => 6,
                            'order' => 'DESC',
                            'post_status' => 'publish',
                            'cat' => $category_id,
                        );

                        $query = new WP_Query($args);
                        if ($query->have_posts()) :
                            while ($query->have_posts()) : $query->the_post();
                                $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                            ?>
                <div class="col-md-4">
                    <article class="card article-card-block">
                        <a href="<?php the_permalink(); ?>" class="card-body">
                            <header class="entry-header">
                                <div class="post-thumbnail">
                                    <img src="<?php echo $feat_image; ?>" alt="">
                                </div>
                                <h2 class="entry-title card-title h3"><?php the_title(); ?></h2>
                            </header>
                            <footer class="entry-footer">
                                <div class="entry-meta">
                                    <span class="posted-on">Posted on <span><time
                                                class="entry-date published updated"><?php the_date(); ?></time></span></span>
                                </div>
                            </footer>
                        </a>
                </div>

                <?php endwhile;
                else: ?>
                  <section class="no-results not-found card mt-3r">
              <div class="card-body">
                  <header class="page-header">
                      <h3>Hmmm, can't seem to find that</h3>
                  </header><!-- .page-header -->
                  <div class="page-content">
                      <p>Please refine your search term, try again with some different keywords or select
                          another category.</p>
                  </div>
              </div>
          </section><?php
                endif;
                wp_reset_postdata(); ?>

                <div class="pager">
                    <?php $big = 999999999; // need an unlikely integer ?>

                    <div class="custom-pagination">
                        <?php
                        echo paginate_links(array(
                        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        'format' => '?paged=%#%',
                        'current' => max(1, get_query_var('paged')),
                        'next_text'          => __('<i class="fa-solid fa-angles-right"></i>'),
                        'prev_text'          => __('<i class="fa-solid fa-angles-left"></i>'),
                        'total' =>  $query->max_num_pages
                        )); ?>
                    </div>
                </div>
                <?php }
          ?>
        <?php 
        if((empty($_GET['postcategory'])) && (empty($_GET['startdate'])) && (empty($_GET['enddate'])) && (empty($search_query))) {
        ?>
        
        
        <?php
                    // the query
                    $the_query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 6,
                        'order' => 'DESC',
                        'post_status' => 'publish',

                    ));

                    if ($the_query->have_posts()) :
                        while ($the_query->have_posts()) : $the_query->the_post();
                            $feat_image = wp_get_attachment_url(get_post_thumbnail_id($post->ID));
                    ?>
                <div class="col-md-4">
                    <article class="card article-card-block">
                        <a href="<?php the_permalink(); ?>" class="card-body">
                            <header class="entry-header">
                                <div class="post-thumbnail">
                                    <img src="<?php echo $feat_image; ?>" alt="">
                                </div>
                                <h2 class="entry-title card-title h3"><?php the_title(); ?></h2>
                            </header>
                            <footer class="entry-footer">
                                <div class="entry-meta">
                                    <span class="posted-on">Posted on <span><time
                                                class="entry-date published updated"><?php the_date(); ?></time></span></span>
                                </div>
                            </footer>
                        </a>
                </div>
                <?php endwhile;
                        wp_reset_postdata(); ?>

                <div class="pager">
                    <?php $big = 999999999; // need an unlikely integer
                     ?>

                    <div class="custom-pagination">
                        <?php
                        echo paginate_links(array(
                           'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                           'format' => '?paged=%#%',
                           'current' => max(1, get_query_var('paged')),
                           'next_text'          => __('<i class="fa-solid fa-angles-right"></i>'),
                           'prev_text'          => __('<i class="fa-solid fa-angles-left"></i>'),
                           'total' =>  $the_query->max_num_pages
                        )); ?>
                    </div>
                </div>
                <?php endif;  ?>      
            </div>
            <?php } ?>
        </section>
    </div>
</div>
<?php
if((!empty($search_query))){
if ( have_posts() ) :
	?>
	<div class="col-md-4">
            <article class="card article-card-block">
                <a href="<?php the_permalink(); ?>" class="card-body">
                    <header class="entry-header">
                        <div class="post-thumbnail">
                            <img src="<?php echo $feat_image; ?>" alt="">
                        </div>
                        <h2 class="entry-title card-title h3"><?php the_title(); ?></h2>
                    </header>
                    <footer class="entry-footer">
                        <div class="entry-meta">
                            <span class="posted-on">Posted on <span><time
                                        class="entry-date published updated"><?php the_date(); ?></time></span></span>
                        </div>
                    </footer>
                </a>
        </div>
            
        <?php
        else: ?>
            <section class="no-results not-found card mt-3r">
        <div class="card-body">
            <header class="page-header">
                <h3>Hmmm, can't seem to find that</h3>
            </header><!-- .page-header -->
            <div class="page-content">
                <p>Please refine your search term, try again with some different keywords or select
                    another category.</p>
            </div>
        </div>
    </section>
        <?php
        endif;
        wp_reset_postdata(); ?>
        <div class="pager">
            <?php $big = 999999999; // need an unlikely integer ?>

            <div class="custom-pagination">
                <?php
                    echo paginate_links(array(
                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                    'format' => '?paged=%#%',
                    'current' => max(1, get_query_var('paged')),
                    'next_text'          => __('<i class="fa-solid fa-angles-right"></i>'),
                    'prev_text'          => __('<i class="fa-solid fa-angles-left"></i>'),
                    'total' =>  $query->max_num_pages
                    )); ?>
                </div>
            </div>
	
	</div><!-- .search-result-count -->
<?php } get_footer(); ?>