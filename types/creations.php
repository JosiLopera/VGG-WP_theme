<?php 
add_action( 'init', 'creas_post_type' );

function creas_post_type() {
	$labels = array(
		'name'               => 'Créations',
		'singular_name'      => 'Création',
		'menu_name'          => 'Créations',
		'name_admin_bar'     => 'Créations',
		'add_new'            => 'Ajouter une Créa',
		'add_new_item'       => 'Ajouter une Créa',
		'new_item'           => 'Nouvelle Créa',
		'edit_item'          => 'Editer la Créa',
		'view_item'          => 'Voir la Créa',
		'all_items'          => 'Tous les Créations',
		'search_items'       => 'Chercher une Créa',
		'parent_item_colon'  => '',
		'not_found'          => 'Pas des Créations',
		'not_found_in_trash' => 'Pas des Créations dans la corbeille'
	);

	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'creations' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => 5,
		'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt'),
		'taxonomies' 		 => array('post_tag')
	);

	register_post_type( 'creations', $args );
}

add_action( 'init', 'cat_creas' );

// create two taxonomies, genres and writers for the post type "book"
function cat_creas() {
	// Add new taxonomy, make it hierarchical (like categories)
	$labels = array(
		'name'              => 'Categories',
		'singular_name'     => 'Categorie',
		'search_items'      => 'Chercher une Categorie',
		'all_items'         => 'Toues les Categories',
		'edit_item'         => 'Editer la Categorie',
		'update_item'       => 'Mettre a jour la Categorie',
		'add_new_item'      => 'Ajouter une Categorie',
		'new_item_name'     => 'Nouvelle Categorie',
		'menu_name'         => 'Categories'
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
		'rewrite'           => array( 'slug' => 'categorie' )
	);

	register_taxonomy( 'cat_creas', array( 'creations' ), $args );
}
