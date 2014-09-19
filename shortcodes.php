<?php 
/*
+++++++
This file contains shortcodes for Phila.gov 
	[phila_separator]
	[phila_page_title]

shortcode for adding a sperator tag 
*/

//[phila_separator title=""]
function phila_separator_function( $atts, $content = null ){
	$a = shortcode_atts(
		array(
			'title' => 'Seperator'
		), $atts );
		
	return '<h2 class="break">' . "{$a['title']}" . '</h2>';
}
add_shortcode( 'phila_separator', 'phila_separator_function' );


//[phila_page_title]
function phila_page_title_function( $atts, $content = null ){
	$a = shortcode_atts(
		array(
			'title' => get_the_title(isset($post->ID))
		), $atts );
		
	return '<h1 class="inner-page-title">' . "{$a['title']}" . '</h1>';
}
add_shortcode( 'phila_page_title', 'phila_page_title_function' );

//returns our custom Wordpress menu
function phila_side_nav_func($atts, $content = null) {
	extract(shortcode_atts(array(  
		'menu'            => '', 
		'container'       => 'div', 
		'container_class' => 'navmenu navmenu-default navmenu-fixed-left offcanvas-sm', 
		'container_id'    => 'side-nav', 
		'menu_class'      => 'nav navmenu-nav nav-pills nav-stacked', 
		'menu_id'         => 'menu-id',
		'echo'            => true,
		'fallback_cb'     => 'wp_page_menu',
		'before'          => '',//inline with element
		'after'           => '',
		'link_before'     => '',
		'link_after'      => '',
		'depth'           => 3,
		'walker'          => new Phila_walker,
		'theme_location'  => ''),
		//'button_html'	=> 'testing testing',
		$atts));
 
 
	return '<div id="side-menu-button">
      <button type="button" class="navbar-toggle" data-toggle="offcanvas" data-target=".navmenu" data-canvas="body">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
    </div>' . wp_nav_menu( array( 
		'menu'            => $menu, 
		'container'       => $container, 
		'container_class' => $container_class, 
		'container_id'    => $container_id, 
		'menu_class'      => $menu_class, 
		'menu_id'         => $menu_id,
		'echo'            => false,
		'fallback_cb'     => $fallback_cb,
		'before'          => $before,
		'after'           => $after,
		'link_before'     => $link_before,
		'link_after'      => $link_after,
		'depth'           => $depth,
		'walker'          => $walker,
		'theme_location'  => $theme_location)
					  ) ;
}
//Create the shortcode
add_shortcode('phila_side_nav', 'phila_side_nav_func');