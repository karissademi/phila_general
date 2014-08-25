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
 
	register_taxonomy('departments', 
	array(
  	'post',	
	'page',
	'phila_news',
  ), array(
    // Hierarchical taxonomy (like categories)
    'hierarchical' => true,
    // This array of options controls the labels displayed in the WordPress Admin UI
    'labels' => array(
      'name' => _x( 'Departments', 'departments' ),
      'singular_name' => _x( 'Department', 'Departments' ),
      'search_items' =>  __( 'Search Departments' ),
      'all_items' => __( 'All Departments' ),
      'edit_item' => __( 'Edit Department' ),
      'update_item' => __( 'Update Department' ),
      'add_new_item' => __( 'Add New Department' ),
      'new_item_name' => __( 'New Department Name' ),
      'menu_name' => __( 'Departments' ),
    ),
    // Control the slugs used for this taxonomy
    'rewrite' => array(
      'slug' => 'department', // This controls the base slug that will display before each term
      'with_front' => false, // Don't display the category base before "/locations/"
      'hierarchical' => true // This will allow URL's like "/locations/boston/cambridge/"
    ),
  ));	

}
add_action( 'init', 'add_custom_taxonomies', 0 );