<?php 

function apkhub_custom_taxonomy() {

	$labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'apkhub' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'apkhub' ),
		'search_items'      => __( 'Search Categories', 'apkhub' ),
		'all_items'         => __( 'All Categories', 'apkhub' ),
		'parent_item'       => __( 'Parent Category', 'apkhub' ),
		'parent_item_colon' => __( 'Parent Category:', 'apkhub' ),
		'edit_item'         => __( 'Edit Category', 'apkhub' ),
		'update_item'       => __( 'Update Category', 'apkhub' ),
		'add_new_item'      => __( 'Add New Category', 'apkhub' ),
		'new_item_name'     => __( 'New Category Name', 'apkhub' ),
		'menu_name'         => __( 'Category', 'apkhub' ),
	);
	$args = array(
		'labels' => $labels,
		'description' => __( '', 'apkhub' ),
		'hierarchical' => true,
		'public' => true,
		'publicly_queryable' => true,
		'show_ui' => true,
		'show_in_menu' => true,
		'show_in_nav_menus' => true,
		'show_tagcloud' => true,
		'show_in_quick_edit' => true,
		'show_admin_column' => true,
		'show_in_rest' => true,
	);
	register_taxonomy( 'apkcat', array('apk'), $args );

}
add_action( 'init', 'apkhub_custom_taxonomy' );