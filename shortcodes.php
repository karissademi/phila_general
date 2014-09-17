<?php 
/*
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
		
	return '<h1 class="page-title">' . "{$a['title']}" . '</h1>';
}
add_shortcode( 'phila_page_title', 'phila_page_title_function' );