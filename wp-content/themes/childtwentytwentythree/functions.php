<?php
/* enqueue scripts and style from parent theme */
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles', 99 );
function my_theme_enqueue_styles() {
      wp_enqueue_style( 'bootstrap-min',  get_stylesheet_directory_uri() . '/assets/css/bootstrap.min.css','', time() );
      wp_enqueue_style( 'bootstrap-icons',  get_stylesheet_directory_uri() . '/assets/css/bootstrap-icons/bootstrap-icons.css','', time() );                 
      wp_enqueue_style( 'parent-style_theme',  get_stylesheet_directory_uri() . '/assets/css/styles.css','', time() );
      wp_enqueue_style( 'slick-carousel',  get_stylesheet_directory_uri() . '/assets/css/slick-min.css','', time() );
      wp_enqueue_style( 'parent-slick-carousel', get_stylesheet_directory_uri() . '/assets/css/parent-slick-min.css','', time() ); 
      wp_enqueue_script('jquery'); 
      
     
      wp_enqueue_script( 'Bundle-js', get_stylesheet_directory_uri(). '/assets/js/bootstrap.bundle.min.js');
      wp_enqueue_script('jquery'); 
      wp_enqueue_script( 'Slick Js', get_stylesheet_directory_uri(). '/assets/js/slick.min.js');
      
      wp_enqueue_script( 'custom-js', get_stylesheet_directory_uri(). '/assets/js/custom.js');
}