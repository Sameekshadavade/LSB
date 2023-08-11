<?php
/**
 * Template Name: Search Page
 */

?>
<?php get_header(); ?>
<div class="container page-content">
<section class="search_main_wrapper default-page-wr">
    <div class="center-wr">
        <div class="pest-residential-area clearfix">
            <div class="pest-right-wr pest-right-blk search-page-right right">
                <?php global $wp_query;
          $archive_title = sprintf(
          '%1$s %2$s',
          '<span class="color-accent">' . __( 'No Results for:', 'twentytwenty' ) . '</span>',
          '&ldquo;' . get_search_query() . '&rdquo;'
        );
        echo '<h1 class="top-search-title page-title">'.$archive_title.'</h1>';
        if ( $wp_query->found_posts ) {
          $archive_subtitle = sprintf(
          /* translators: %s: Number of search results. */
          _n(
            'We found %s result for your search.',
            'We found %s results for your search.',
            $wp_query->found_posts,
            'twentytwenty'
          ),
          number_format_i18n( $wp_query->found_posts )
        );
          echo '<h5 class="found-title">'.$archive_subtitle.'</h5>'; 
        } else {
        $archive_subtitle = __( 'In Category: <strong>All Categories</strong>', 'twentytwenty' );
          echo '<h5 class="found-title">'.$archive_subtitle.'</h5>';
        }?>
                <div class="search-page-form">
                    <?php //echo get_search_form(); ?>
                </div>
                <?php  

            $categories = get_categories(array(
              'orderby' => 'name',
              'order'   => 'ASC',
              'hide_empty' => false,
          ));

        ?>
                <section id="search_filters" class="row">
                    <button id="toggle_search_filters" class="closed">Show Search Filters</button>
                    <div class="search-wrapper">
                        <h5>Refine your search</h5>

                        <form action="" method="GET" class="searchandfilter search-filters">
                            <div>
                                <ul>
                                    <li>
                                        <h4>Search For</h4><?php get_search_form(); ?>
                                    </li>
                                    <li>
                                        <h4>Category to Search</h4>
                                        <select name="postcategory" id="postcategory" class="postform">
                                            <option value="">All Categories</option>
                                            <?php foreach($categories as $category){  ?>
                                            <option class="level-0" value="<?php echo $category->term_id; ?>">
                                                <?php echo $category->name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </li>
                                    <li><input type="hidden" name="ofcategory_operator" value="and"></li>
                                    <li>
                                        <h4>Date Range</h4>
                                        <input class="postform" type="date" name="startdate" value="">
                                    </li>
                                    <li><input class="postform" type="date" name="enddate" value=""></li>
                                    <input type="submit" name="submit" value="submit"></li>
                                </ul>
                            </div>
                        </form>
                        <button id="clear_search_filters" class="btn-clear-search">Clear Search</button>
                    </div>
                </section>

                <section class="collection-block pt-3">
                    <div class="row">
                        <?php
        // the query
          $the_query = new WP_Query( array(
            'post_type' => 'post',
            'posts_per_page' => 6,
            'order' => 'DESC',
            'post_status' => 'publish',

          )); 

        if ( $the_query->have_posts() ) : 
            while ( $the_query->have_posts() ) : $the_query->the_post();
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
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
             wp_reset_postdata(); 

       else : ?>
                        <p><?php __('No Post Available.'); ?></p>
                        <?php endif; ?>


                        <?php  

        global $wpdb;
        if(isset($_GET['postcategory']) || isset($_GET['postcategory']) || isset($_GET['postcategory'])) {
            $category_id = $_GET['postcategory'];
            $startdate = $_GET['startdate'];
            $enddate = $_GET['enddate'];
            // prints the current time in date format 
            $start_date = date("Y-m-d", strtotime($startdate));
            $end_date  = date("Y-m-d", strtotime($enddate));
                    
       
          
        if(!empty($category_id) && !empty($startdate) && !empty($enddate)) {
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'post_status' => 'publish',
                'cat'=> $category_id,
                'date_query' => array(
                    array(
                        'after'     => $start_date,
                        'before'    => $end_date,
                        'inclusive' => true,
                ),
              ),
            );
      
              $query = new WP_Query($args);
                if ( $query-> have_posts() ) :
                      while ( $query->have_posts() ): $query->the_post();
                      $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );
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
    wp_reset_postdata();
  } elseif(!empty($startdate) && !empty($enddate)){
    
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
      if ( $date_query-> have_posts() ) :
            while ( $date_query->have_posts() ): $date_query->the_post();
            $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) ); 
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
                        <?php   endwhile;
      endif;
      wp_reset_postdata(); 
    } elseif(!empty($category_id)) {
              $args = array(
                'post_type' => 'post',
                'posts_per_page' => -1,
                'order' => 'DESC',
                'post_status' => 'publish',
                'cat'=> $category_id,
            );
      
              $query = new WP_Query($args);
                if ( $query-> have_posts() ) :
                  while ( $query->have_posts() ): $query->the_post();
                      $feat_image = wp_get_attachment_url( get_post_thumbnail_id($post->ID) );   
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
      endif;
      wp_reset_postdata();
 } else { 
    ?>

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
                        <?php } }  ?>
                    </div>
            </div>
</section>
 </div>
<?php get_footer(); ?>