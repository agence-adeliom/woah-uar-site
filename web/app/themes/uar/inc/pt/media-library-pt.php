<?php
// Register Custom Post Type
function medialibrary_post_type() {

	$labels = array(
		'name'                  => _x( 'UAR Media Library', 'Post Type General Name', 'uar' ),
		'singular_name'         => _x( 'UAR Media Library', 'Post Type Singular Name', 'uar' ),
		'menu_name'             => __( 'UAR Media Library', 'uar' ),
		'name_admin_bar'        => __( 'UAR Media Library', 'uar' ),
		'archives'              => __( 'Item Archives', 'uar' ),
		'attributes'            => __( 'Item Attributes', 'uar' ),
		'parent_item_colon'     => __( 'Parent Item:', 'uar' ),
		'all_items'             => __( 'All Items', 'uar' ),
		'add_new_item'          => __( 'Add New Item', 'uar' ),
		'add_new'               => __( 'Add New', 'uar' ),
		'new_item'              => __( 'New Item', 'uar' ),
		'edit_item'             => __( 'Edit Item', 'uar' ),
		'update_item'           => __( 'Update Item', 'uar' ),
		'view_item'             => __( 'View Item', 'uar' ),
		'view_items'            => __( 'View Items', 'uar' ),
		'search_items'          => __( 'Search Item', 'uar' ),
		'not_found'             => __( 'Not found', 'uar' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'uar' ),
		'featured_image'        => __( 'Featured Image', 'uar' ),
		'set_featured_image'    => __( 'Set featured image', 'uar' ),
		'remove_featured_image' => __( 'Remove featured image', 'uar' ),
		'use_featured_image'    => __( 'Use as featured image', 'uar' ),
		'insert_into_item'      => __( 'Insert into item', 'uar' ),
		'uploaded_to_this_item' => __( 'Uploaded to this item', 'uar' ),
		'items_list'            => __( 'Items list', 'uar' ),
		'items_list_navigation' => __( 'Items list navigation', 'uar' ),
		'filter_items_list'     => __( 'Filter items list', 'uar' ),
	);
	$args = array(
		'label'                 => __( 'UAR Media Library', 'uar' ),
		'description'           => __( 'UAR Media Library post type', 'uar' ),
		'labels'                => $labels,
    'show_in_rest' => true,
		'supports'              => array( 'title', 'editor', 'excerpt','thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-portfolio',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies' => array('post_tag'),
	);
	register_post_type( 'uar-media-library', $args );

}
add_action( 'init', 'medialibrary_post_type', 0 );


?>
