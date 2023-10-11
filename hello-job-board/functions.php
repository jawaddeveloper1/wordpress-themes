<?php 

if(!defined('hjb_version')){
    define('hjb_version','1.0');
}


/* Theme Supports */
add_theme_support('title-tag');
add_theme_support('custom-logo');
add_theme_support('post-thumbnails');
add_theme_support('automatic-feed-links');
add_theme_support('wp-block-styles');
add_theme_support('responsive-embeds');
add_theme_support('html5');
add_theme_support('custom-header');
add_theme_support('custom-background');
add_theme_support('align-wide');

/* Enqueue Scripts & Styles */
function hjb_enqueue_scripts_and_styles(){

    wp_enqueue_style('bootstrap-css', get_template_directory_uri() .'/assets/bootstrap/css/bootstrap.min.css','','5.3.0');
    wp_enqueue_style('style', get_stylesheet_uri(),'', hjb_version);

    wp_enqueue_script('jquery');
    wp_enqueue_script('bootstrap-js', get_template_directory_uri() .'/assets/bootstrap/js/bootstrap.min.js','','5.3.0');
    wp_enqueue_script('hjb-custom', get_template_directory_uri() .'/assets/js/hjb-custom.js','', hjb_version);

    // Threaded comment reply styles.
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action('wp_enqueue_scripts','hjb_enqueue_scripts_and_styles');


/* Register Nav Menu */
function hjb_register_nav_menu(){
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu','hello-job-board'),
        'footer-menu' => __('Footer Menu','hello-job-board')
    ));
}
add_action('after_setup_theme','hjb_register_nav_menu');


/* Register Sidebar */
function hjb_register_sidebar(){
    register_sidebar( array(
        'name' => __('Main Sidebar','hello-job-board'),
        'id' => 'main-sidebar',
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init','hjb_register_sidebar');



/* Register Sidebar */
function hjb_register_navwalker(){
    require_once get_template_directory() . '/inc/class-wp-bootstrap-navwalker.php';
}
add_action('after_setup_theme','hjb_register_navwalker');


/* Custom Metaboxes */
require get_template_directory() .'/inc/otherdetails-metabox.php';

require get_template_directory() .'/inc/userinformation_metabox.php';


/* TGM Plugin Activation */
require get_template_directory() .'/inc/required-plugins.php';
