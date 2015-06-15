<?php

require_once(ABSPATH.'wp-content/themes/vgg/types/creations.php');

add_action( 'wp_enqueue_scripts', 'enqueue_and_register_my_scripts' );

function enqueue_and_register_my_scripts(){

    // Use `get_stylesheet_directoy_uri() if your script is inside your theme or child theme.
    wp_register_script( 'jquery_a', get_stylesheet_directory_uri() . '/js/jquery-1.11.2.min.js' );
    wp_register_script( 'isotope', get_stylesheet_directory_uri() . '/js/isotope.pkgd.min.js' );
    wp_register_script( 'script', get_stylesheet_directory_uri() . '/js/script.js' );

    
    wp_enqueue_script( array( 'jquery_a', 'isotope', 'script' ) );
    
}

add_theme_support('post-thumbnails');


function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header Menu' ),
      'extra-menu' => __( 'Scroll Menu' )
    )
  );
}
add_action( 'init', 'register_my_menus' );
