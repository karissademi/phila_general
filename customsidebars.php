<?php 
function phila_news_sidebar(){
	$news_custom_sidebar_args = array(
		'name'          => __( 'News Sidebar', 'phila' ),
		'id'            => 'phila_news_sidebar',
		'description'   => 'For use on news page only',
			'class'         => '',
		'before_widget' => '<aside id="%1$s" class="widget %2$s col-sm-6">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>' 
	);

	register_sidebar( $news_custom_sidebar_args );
}

add_action( 'widgets_init', 'phila_news_sidebar' );