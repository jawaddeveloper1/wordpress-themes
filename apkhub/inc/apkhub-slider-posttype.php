<?php 

function apkhub_slider_cpt() {

	$labels = array(
		'name' => _x( 'Sliders', 'Post Type General Name', 'apkhub' ),
		'singular_name' => _x( 'Slider', 'Post Type Singular Name', 'apkhub' ),
		'menu_name' => _x( 'Sliders', 'Admin Menu text', 'apkhub' ),
		'name_admin_bar' => _x( 'Slider', 'Add New on Toolbar', 'apkhub' ),
		'archives' => __( 'Slider Archives', 'apkhub' ),
		'attributes' => __( 'Slider Attributes', 'apkhub' ),
		'parent_item_colon' => __( 'Parent Slider:', 'apkhub' ),
		'all_items' => __( 'All Sliders', 'apkhub' ),
		'add_new_item' => __( 'Add New Slider', 'apkhub' ),
		'add_new' => __( 'Add New', 'apkhub' ),
		'new_item' => __( 'New Slider', 'apkhub' ),
		'edit_item' => __( 'Edit Slider', 'apkhub' ),
		'update_item' => __( 'Update Slider', 'apkhub' ),
		'view_item' => __( 'View Slider', 'apkhub' ),
		'view_items' => __( 'View Sliders', 'apkhub' ),
		'search_items' => __( 'Search Slider', 'apkhub' ),
		'not_found' => __( 'Not found', 'apkhub' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'apkhub' ),
		'featured_image' => __( 'Featured Image', 'apkhub' ),
		'set_featured_image' => __( 'Set featured image', 'apkhub' ),
		'remove_featured_image' => __( 'Remove featured image', 'apkhub' ),
		'use_featured_image' => __( 'Use as featured image', 'apkhub' ),
		'insert_into_item' => __( 'Insert into Slider', 'apkhub' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Slider', 'apkhub' ),
		'items_list' => __( 'Sliders list', 'apkhub' ),
		'items_list_navigation' => __( 'Sliders list navigation', 'apkhub' ),
		'filter_items_list' => __( 'Filter Sliders list', 'apkhub' ),
	);
	$args = array(
		'label' => __( 'Slider', 'apkhub' ),
		'description' => __( '', 'apkhub' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-slides',
		'supports' => array('title', 'editor', 'thumbnail'),
		'taxonomies' => array(),
		'public' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'menu_position' => 5,
		'show_in_admin_bar' => true,
		'show_in_nav_menus' => true,
		'can_export' => true,
		'has_archive' => true,
		'hierarchical' => false,
		'exclude_from_search' => false,
		'show_in_rest' => true,
		'publicly_queryable' => true,
		'capability_type' => 'post',
	);
	register_post_type( 'apkhub-slider', $args );

}
add_action( 'init', 'apkhub_slider_cpt', 0 );