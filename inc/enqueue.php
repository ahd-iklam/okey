<?php

function sunset_add_scripts() 
{
    wp_deregister_script('jquery');
    wp_register_script('jquery' , get_template_directory_uri() . '/js/jquery.js',array() , '3.6.0 ', true );
    wp_enqueue_script('jquery');
    wp_enqueue_script( 'popper-js', get_template_directory_uri() . '/js/popper.min.js',array() , false , true );
    wp_enqueue_script( 'bootstrap-js', get_template_directory_uri() . '/js/bootstrap.min.js',array() , false , true );
    wp_enqueue_script( 'sunset-js', get_template_directory_uri() . '/js/sunset.admin.js', array(), false , true);
    wp_enqueue_script( 'main-js', get_template_directory_uri() . '/js/main.js', array(), false , true);

}
add_action('wp_enqueue_scripts' , 'sunset_add_scripts');

function sunset_add_styles() 
{
    wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/all.min.css');
    wp_enqueue_style( 'bootstrap-css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'sunset-css', get_template_directory_uri() . '/css/sunset.css' );
    wp_enqueue_style('content-css', get_template_directory_uri() . '/css/post-content.css');
}
add_action('wp_enqueue_scripts' , 'sunset_add_styles');

// add script files to theme
