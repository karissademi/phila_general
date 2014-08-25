<?php
/**
 * Add custom taxonomies
 *
 * Additional custom taxonomies can be defined here
 * http://codex.wordpress.org/Function_Reference/register_taxonomy
 */

function add_custom_taxonomies() {
  // Add new "Locations" taxonomy to Posts
  register_taxonomy('topics', 
	array(
  	'post',
	'page',
	'phila_news'
  ), array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Topics', 'List of topics' ),
      'singular_name' => _x( 'Topic', 'topic' ),
      'search_items' =>  __( 'Search Topics' ),
      'all_items' => __( 'All Topics' ),
      //'parent_item' => __( 'Parent Topics' ),
      //'parent_item_colon' => __( 'Parent Location:' ),
      'edit_item' => __( 'Edit Topic' ),
      'update_item' => __( 'Update Topic' ),
      'add_new_item' => __( 'Add New Topic' ),
      'new_item_name' => __( 'New Topic Name' ),
      'menu_name' => __( 'Topics' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'topics', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));
 
	register_taxonomy('display_options', 
	array(
  	'post',	
	'page',
	'phila_news',
  ), array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Display Options', 'phila' ),
      'singular_name' => _x( 'Display Option', 'phila' ),
      'search_items' =>  __( 'Search Options' ),
      'all_items' => __( 'All Options' ),
      'edit_item' => __( 'Edit Options' ),
      'update_item' => __( 'Update Options' ),
      'add_new_item' => __( 'Add New Options' ),
      'new_item_name' => __( 'New Display Option' ),
      'menu_name' => __( 'Display Options' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'option', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => false // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));	

}
add_action( 'init', 'add_custom_taxonomies', 0 );