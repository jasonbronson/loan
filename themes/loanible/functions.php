<?php
$app_ver = get_bloginfo( 'version' ) . '-' . '1.0.1.201811100537'; //wp_version-major.minor.patch.yyyymmddHHmm

define('THEME_PATH', get_template_directory());
define('THEME_URI', get_template_directory_uri());
define('DIST_URI', THEME_URI.'/dist/');
define('DATE_FORMAT', 'M j, Y');

//Activate ACF if not activated
require_once( ABSPATH . 'wp-admin/includes/plugin.php' );
if ( !is_plugin_active( 'advanced-custom-fields-pro/acf.php' ) ) {
    activate_plugin( 'advanced-custom-fields-pro/acf.php' );
}

// Enqueue styles and scripts
function add_theme_styles() {
    global $app_ver;
    if(ENV == 'DEV'){
        $app_ver = $app_ver . rand(0,9999999);
    }
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:400,300,700,400italic|Roboto:300,300i,700|Roboto+Condensed:400,700' );
    wp_enqueue_style( 'font-awesome-470', 'https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array(), '4.7.0' );
    wp_enqueue_style( 'bootstrap-style', DIST_URI . '/css/vendor.css', array(), $app_ver, 'screen' );
	wp_enqueue_style( 'main-theme-style', DIST_URI . '/css/main.css', array(), $app_ver, 'screen' );
	
}
function add_theme_scripts() {
    global $app_ver;
    //wp_deregister_script('jquery');
	wp_enqueue_script( 'jquery-3-3-1-js', 'https://code.jquery.com/jquery-3.3.1.min.js');
	wp_enqueue_script( 'main-theme-script', DIST_URI . '/js/main.min.js', array(), $app_ver);
}

// add_action( 'wp_enqueue_scripts', 'add_optimizely_script', -2 );
function add_optimizely_script() {
//	wp_enqueue_script( 'optimizely', 'https://cdn.optimizely.com/js/10764520846.js');
}

// moving the Optimimzely script direct to the header.php file to ensure first execution
// add_action( 'wp_enqueue_scripts', 'add_optimizely_script', -2 );
add_action( 'wp_enqueue_scripts', 'add_theme_styles' );
add_action( 'wp_enqueue_scripts', 'add_theme_scripts' );

