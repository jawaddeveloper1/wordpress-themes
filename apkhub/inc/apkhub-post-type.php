<?php 
function apkhub_custom_post_type() {

	$labels = array(
		'name' => _x( 'APKs', 'Post Type General Name', 'apkhub' ),
		'singular_name' => _x( 'APK', 'Post Type Singular Name', 'apkhub' ),
		'menu_name' => _x( 'APKs', 'Admin Menu text', 'apkhub' ),
		'name_admin_bar' => _x( 'APK', 'Add New on Toolbar', 'apkhub' ),
		'archives' => __( 'APK Archives', 'apkhub' ),
		'attributes' => __( 'APK Attributes', 'apkhub' ),
		'parent_item_colon' => __( 'Parent APK:', 'apkhub' ),
		'all_items' => __( 'All APKs', 'apkhub' ),
		'add_new_item' => __( 'Add New APK', 'apkhub' ),
		'add_new' => __( 'Add New', 'apkhub' ),
		'new_item' => __( 'New APK', 'apkhub' ),
		'edit_item' => __( 'Edit APK', 'apkhub' ),
		'update_item' => __( 'Update APK', 'apkhub' ),
		'view_item' => __( 'View APK', 'apkhub' ),
		'view_items' => __( 'View APKs', 'apkhub' ),
		'search_items' => __( 'Search APK', 'apkhub' ),
		'not_found' => __( 'Not found', 'apkhub' ),
		'not_found_in_trash' => __( 'Not found in Trash', 'apkhub' ),
		'featured_image' => __( 'Featured Image', 'apkhub' ),
		'set_featured_image' => __( 'Set featured image', 'apkhub' ),
		'remove_featured_image' => __( 'Remove featured image', 'apkhub' ),
		'use_featured_image' => __( 'Use as featured image', 'apkhub' ),
		'insert_into_item' => __( 'Insert into APK', 'apkhub' ),
		'uploaded_to_this_item' => __( 'Uploaded to this APK', 'apkhub' ),
		'items_list' => __( 'APKs list', 'apkhub' ),
		'items_list_navigation' => __( 'APKs list navigation', 'apkhub' ),
		'filter_items_list' => __( 'Filter APKs list', 'apkhub' ),
	);
	$args = array(
		'label' => __( 'APK', 'apkhub' ),
		'description' => __( '', 'apkhub' ),
		'labels' => $labels,
		'menu_icon' => 'dashicons-smartphone',
		'supports' => array('title', 'editor', 'excerpt', 'thumbnail'),
		'taxonomies' => array('apk-cat'),
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
	register_post_type( 'apk', $args );

}
add_action( 'init', 'apkhub_custom_post_type', 0 );