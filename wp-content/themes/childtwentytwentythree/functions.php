<?php
/* enqueue scripts and style from parent theme */

	 add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );
	 function child_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' ); 
 		  } 
 
echo  get_stylesheet_directory_uri()();
// function add_theme_scripts() {

//     wp_enqueue_style( 'Bundle_js', get_stylesheet_directory_uri(). '/css/persian-datepicker.css', array(), null, 'all');
  
//     wp_enqueue_script( 'jsdate', get_template_directory_uri() . '/js/persian-date.js', array ( 'jquery' ), null, true);
//      wp_enqueue_script( 'jsdatepicker', get_template_directory_uri() . '/js/persian-datepicker.js', array ( 'jquery' ), null, true);
  
//   }
//   add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );
?>