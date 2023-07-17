<?php
/* enqueue scripts and style from parent theme */

	 add_action( 'wp_enqueue_scripts', 'child_enqueue_styles' );
	 function child_enqueue_styles() {
 		  wp_enqueue_style( 'parent-style_theme',  get_stylesheet_directory_uri() . '/style.css' ); 
           wp_enqueue_style( 'Bundle_js', get_stylesheet_directory_uri(). '/Javascript/bootstrap.bundle.min.js', array(), null, 'all');
 		  
           wp_enqueue_style( 'Custom_js', get_stylesheet_directory_uri(). '/Javascript/custom.js', array(), null, 'all');
        } 
 

?>