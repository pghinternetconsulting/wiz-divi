<?php
function my_theme_enqueue_styles() {

    $parent_style = 'divi-style';

    wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array( $parent_style ),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/styles/css/main.css');

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );
function use_gd_editor($array) { 
	return array( 'WP_Image_Editor_GD', ); 
}
add_filter( 'wp_image_editors', 'use_gd_editor' );
?>