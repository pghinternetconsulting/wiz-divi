<?php
function my_theme_enqueue_styles()
{

    $parent_style = 'divi-style';

    wp_enqueue_style($parent_style, get_template_directory_uri() . '/style.css');
    wp_enqueue_style(
        'child-style',
        get_stylesheet_directory_uri() . '/style.css',
        array($parent_style),
        wp_get_theme()->get('Version')
    );
    wp_enqueue_style('main', get_stylesheet_directory_uri() . '/styles/css/main.css?v1.3');
}
add_action('wp_enqueue_scripts', 'my_theme_enqueue_styles');
function use_gd_editor($array)
{
    return array('WP_Image_Editor_GD',);
}
add_filter('wp_image_editors', 'use_gd_editor');

/* Search */
function wpbsearchform($form)
{

    $form = '<form role="search" class="search-container" method="get" autocomplete="off" id="searchform" action="' . home_url('/') . '" >
    <input  id="search-box" type="text" value="' . get_search_query() . '" class="search-box" name="s" />
    <label for="search-box"><span class="et-pb-icon search-icon">&#x55;</span></label>
    <input type="submit" id="search-submit" />
    </form>';

    return $form;
}

add_shortcode('wpbsearch', 'wpbsearchform');

function wpbsearchform_mob($form)
{

    $form = '<form role="search" method="get" autocomplete="off" id="searchform" action="' . home_url('/') . '" >
    <input type="text" value="' . get_search_query() . '" name="s" id="s">
    <input type="submit" id="searchsubmit" value="Search">
    </form>';

    return $form;
}

add_shortcode('wpbsearch_mob', 'wpbsearchform_mob');


// Removes et_add_viewport_meta and add new meta with (user-scalable=1) for SEO porpuses-
add_action('after_setup_theme', 'db_remove_et_viewport_meta');
add_action('wp_head', 'db_enable_pinch_zoom');

function db_remove_et_viewport_meta()
{
    remove_action('wp_head', 'et_add_viewport_meta');
}

function db_enable_pinch_zoom()
{
    echo '<meta name="viewport" content="width=device-width, user-scalable=1, initial-scale=1.0, minimum-scale=0.1, maximum-scale=10.0">';
}
