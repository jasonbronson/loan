<?php

define('THEME_PATH', get_template_directory());
//Libraries & functions go here
require_once THEME_PATH . '/libraries/autoload.php';


add_action('wp_enqueue_scripts', 'load_scripts');
function load_scripts()
{
    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/dist/js/.js', array(), rand(1,999), true);
    wp_enqueue_script('custom_js', get_template_directory_uri() . '/dist/js/custom.js', array(), rand(1,999), true);
}

add_theme_support('title-tag');

// Enqueue styles and scripts
function add_theme_styles()
{

    wp_enqueue_style('bootstrap', get_stylesheet_directory_uri() . '/dist/css/vendor.css', false, rand(1,999));
    wp_enqueue_style('main-theme-style', get_stylesheet_directory_uri() . '/dist/css/main.css', false, rand(1,999), 'screen');
    // wp_enqueue_style('cr-print-theme-style', get_stylesheet_directory_uri() . '/css/print.css', false, $app_ver, 'print');
}

add_action('wp_enqueue_scripts', 'add_theme_styles');
