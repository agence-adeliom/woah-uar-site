<?php
// Register Custom Post Type
function toolbox_post_type() {

	$labels = array(
		'name'                  => _x( 'Toolboxes', 'Post Type General Name', 'uar' ),
		'singular_name'         => _x( 'Toolbox', 'Post Type Singular Name', 'uar' ),
		'menu_name'             => __( 'Toolbox', 'uar' ),
		'name_admin_bar'        => __( 'Toolbox', 'uar' ),
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
		'label'                 => __( 'Toolbox', 'uar' ),
		'description'           => __( 'Toolbox post type', 'uar' ),
		'labels'                => $labels,
    'show_in_rest' => true,
		'supports'              => array( 'title', 'editor', 'excerpt','thumbnail' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-admin-tools',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'post',
		'taxonomies' => array('post_tag'),
	);
	register_post_type( 'toolbox', $args );

}
add_action( 'init', 'toolbox_post_type', 0 );

////////////// Taxonomy ///////////////////
// Register Custom Taxonomy
function strategy_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Program / Strategy', 'Taxonomy General Name', 'uar' ),
		'singular_name'              => _x( 'Program / Strategy', 'Taxonomy Singular Name', 'uar' ),
		'menu_name'                  => __( 'Program / Strategy', 'uar' ),
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
	register_taxonomy( 'program-strategy', array( 'toolbox' ), $args );

}
add_action( 'init', 'strategy_taxonomy', 0 );

// Register Custom Taxonomy
function vaccination_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Dog Vaccination Campaign Implementation', 'Taxonomy General Name', 'uar' ),
		'singular_name'              => _x( 'Dog Vaccination Campaign Implementation', 'Taxonomy Singular Name', 'uar' ),
		'menu_name'                  => __( 'Dog Vaccination Campaign Implementation', 'uar' ),
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
	);
	register_taxonomy( 'dog-vaccination', array( 'toolbox' ), $args );

}
add_action( 'init', 'vaccination_taxonomy', 0 );

// Register Custom Taxonomy
function surveillance_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Rabies Surveillance', 'Taxonomy General Name', 'uar' ),
		'singular_name'              => _x( 'Rabies Surveillance', 'Taxonomy Singular Name', 'uar' ),
		'menu_name'                  => __( 'Rabies Surveillance', 'uar' ),
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
	);
	register_taxonomy( 'surveillance', array( 'toolbox' ), $args );

}
add_action( 'init', 'surveillance_taxonomy', 0 );

// Register Custom Taxonomy
function education_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Education and Communication', 'Taxonomy General Name', 'uar' ),
		'singular_name'              => _x( 'Education and Communication', 'Taxonomy Singular Name', 'uar' ),
		'menu_name'                  => __( 'Education and Communication', 'uar' ),
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
	);
	register_taxonomy( 'education', array( 'toolbox' ), $args );

}
add_action( 'init', 'education_taxonomy', 0 );

// Register Custom Taxonomy
function population_taxonomy() {

	$labels = array(
		'name'                       => _x( 'Dog Population Management', 'Taxonomy General Name', 'uar' ),
		'singular_name'              => _x( 'Dog Population Management', 'Taxonomy Singular Name', 'uar' ),
		'menu_name'                  => __( 'Dog Population Management', 'uar' ),
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
	);
	register_taxonomy( 'population-management', array( 'toolbox' ), $args );

}
add_action( 'init', 'population_taxonomy', 0 );

?>
