<?php
// Register Custom Post Type
function docs_post_type() {

	$labels = array(
		'name'                  => _x( 'Publications', 'Post Type General Name', 'uar' ),
		'singular_name'         => _x( 'Publication', 'Post Type Singular Name', 'uar' ),
		'menu_name'             => __( 'Publications & Documents', 'uar' ),
		'name_admin_bar'        => __( 'Publications & Documents', 'uar' ),
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
		'label'                 => __( 'Publication', 'uar' ),
		'description'           => __( 'Publications & Documents post type', 'uar' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 6,
		'menu_icon'             => 'dashicons-book',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'show_in_rest'          => true,
		'taxonomies' => array('post_tag'),
	);
	register_post_type( 'publications', $args );

}
add_action( 'init', 'docs_post_type', 0 );

////////////// Taxonomy ///////////////////
// Register Custom Taxonomy
function subject_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Subject', 'Taxonomy General Name', 'uar' ),
		'singular_name'              => _x( 'Subject', 'Taxonomy Singular Name', 'uar' ),
		'menu_name'                  => __( 'Subject', 'uar' ),
		'all_items'                  => __( 'All Items', 'uar' ),
		'parent_item'                => __( 'Parent Item', 'uar' ),
		'parent_item_colon'          => __( 'Parent Item:', 'uar' ),
		'new_item_name'              => __( 'New Item Name', 'uar' ),
		'add_new_item'               => __( 'Add New Item', 'uar' ),
		'edit_item'                  => __( 'Edit Item', 'uar' ),
		'update_item'                => __( 'Update Item', 'uar' ),
		'view_item'                  => __( 'View Item', 'uar' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'uar' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'uar' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'uar' ),
		'popular_items'              => __( 'Popular Items', 'uar' ),
		'search_items'               => __( 'Search Items', 'uar' ),
		'not_found'                  => __( 'Not Found', 'uar' ),
		'no_terms'                   => __( 'No items', 'uar' ),
		'items_list'                 => __( 'Items list', 'uar' ),
		'items_list_navigation'      => __( 'Items list navigation', 'uar' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
		//'rewrite' => array( 'slug' => 'program-strategies' )
	);
	register_taxonomy( 'subject', array( 'publications' ), $args );

}
add_action( 'init', 'subject_taxonomy', 0 );


?>
