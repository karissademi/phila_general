<?php 
/* 
	Custom VC Element to display Side Menu on page
		side_menu_integrateWithVC
*/
//vc_disable_frontend();

add_action( 'vc_before_init', 'side_menu_integrateWithVC' );

function side_menu_integrateWithVC() {
//gets list of all menus in Menus > Appearance
$custom_menus = array();
	$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
	if ( is_array( $menus ) ) {
		foreach ( $menus as $single_menu ) {
			$custom_menus[$single_menu->name] = $single_menu->term_id;
		}
}
	//custom VC component config 
	vc_map( array(
		'name' => 'WP ' . __( "Side Navigation Menu" ),
		'base' => 'phila_side_nav',
		'icon' => 'icon-wpb-wp',
		'category' => __( 'Phila.gov', 'js_composer' ),
		'class' => 'wpb_vc_wp_widget',
		'weight' => - 50,
		'description' => __( 'Add side navigation menu to this page', 'js_composer' ),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Navigation title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'What text use as a widget title. Leave blank for no title.', 'js_composer' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Menu', 'js_composer' ),
				'param_name' => 'menu',
				'value' => $custom_menus,
				'description' => empty( $custom_menus ) ? __( 'Custom menus not found. Please visit <b>Appearance > Menus</b> page to create new menu.', 'js_composer' ) : __( 'Select menu', 'js_composer' ),
				'admin_label' => true
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
}