<?php

add_action('wp_enqueue_scripts', 'load_scripts');
function load_scripts()
{
    global $app_ver;
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/dist/js/.js', array(), $app_ver, true);
    wp_enqueue_script('custom_js', get_template_directory_uri() . '/dist/js/custom.js', array(), $app_ver, true);

    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/dist/css/vendor.css', false, $app_ver);
    wp_enqueue_style('main-theme-style', get_stylesheet_directory_uri() . '/dist/css/main.css', false, $app_ver, 'screen');
    
}
