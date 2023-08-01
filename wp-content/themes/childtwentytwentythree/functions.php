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

// register menus
function register_my_menu() {
      register_nav_menu('lsb-header-menu',__( 'LSB Header Menu' ));
      register_nav_menu('lsb-footer-menu',__( 'LSB Footer Menu' ));
}
add_action( 'init', 'register_my_menu' );

function cc_mime_types( $mimes ){
  $mimes['svg'] = 'image/svg+xml';
  return $mimes;
}
add_filter( 'upload_mimes', 'cc_mime_types' );

// create the customizer phone nuber option 
add_action( 'customize_register', 'cd_customizer_settings' );
function cd_customizer_settings( $wp_customize ) {

    // Create footer section
    $wp_customize->add_section( 'header_section' , array(
    'title'      => 'Header Phone Option',
    'priority'   => 32,
    ) );

        // Phone Text
        $wp_customize->add_setting( 'header_phone_option', array(
        'default'     => '',
        'transport'   => 'refresh',
        ) );
        // Create fbLink field for enter value      
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'header_phone_option', array(
        'label'        => 'Header Phone Number',
        'section'    => 'header_section',
        'settings'   => 'header_phone_option',
        'type'   => 'text',

        ) ) );

        }

// html5 support search form 
add_theme_support('html5', array('search-form'));

// create the acf option fields
if( function_exists('acf_add_options_page') ) {
    
      acf_add_options_page(array(
          'page_title'    => 'Theme General Settings',
          'menu_title'    => 'Theme Settings',
          'menu_slug'     => 'theme-general-settings',
          'capability'    => 'edit_posts',
          'redirect'      => false
      ));
  
      acf_add_options_sub_page(array(
          'page_title'    => 'Footer',
          'menu_title'    => 'Footer',
          'parent_slug'   => 'theme-general-settings',
      ));
      
  }

//   Testimonial custom post type
function create_posttype_testimonial() {
    register_post_type( 'testimonial',
      array(
        'labels' => array(
          'name' => __( 'Testimonial' ),
          'singular_name' => __( 'Testimonial' )
        ),
        'public' => true,
        'has_archive' => true,
        'rewrite' => array('slug' => 'testimonial'),
        'supports' => array('title','editor','thumbnail', 'comments')
      )
    );
    register_taxonomy(
          'testimonial-category',
          'testimonial',
          array(
              'label' => __( 'Category' ),
              'rewrite' => array( 'slug' => 'testimonial-category' ),
              'hierarchical' => true,
          )
      );
  }
  add_theme_support( 'post-thumbnail' );
  add_action( 'init', 'create_posttype_testimonial' );
  add_filter( 'big_image_size_threshold', '__return_false' );

//register widget footer option
$AuctionsMenu = array(
  'name' => 'Auction Footer Widget',
  'id' => 'auction-footer-widget',
  'description' => 'Auction Footer Widget',
  'class' => 'auction-widgt-class'
);
register_sidebar($AuctionsMenu);

$CompanyMenu = array(
  'name' => 'Company Footer Widget',
  'id' => 'company-footer-widget',
  'description' => 'Company Footer Widget',
  'class' => 'company-widgt-class'
);
register_sidebar($CompanyMenu);

$LegalMenu = array(
  'name' => 'Legal Footer Widget',
  'id' => 'legal-footer-widget',
  'description' => 'Legal Footer Widget',
  'class' => 'legal-widgt-class'
);
register_sidebar($LegalMenu);

// Testimonial custom post type
function create_posttype_careers() {
  register_post_type( 'careers',
    array(
      'labels' => array(
        'name' => __( 'Careers' ),
        'singular_name' => __( 'Careers' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'careers'),
      'supports' => array('title','editor','thumbnail', 'comments')
    )
  );
  register_taxonomy(
        'careers-category',
        'careers',
        array(
            'label' => __( 'Category' ),
            'rewrite' => array( 'slug' => 'careers-category' ),
            'hierarchical' => true,
        )
    );
}
add_theme_support( 'post-thumbnail' );
add_action( 'init', 'create_posttype_careers' );



