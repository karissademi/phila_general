<?php

add_action('vc_load_default_templates_action','department_template_option_one_for_vc');

function department_template_option_one_for_vc() {
    $data               = array();
    $data['name']       = __( 'Department template option one', 'department_template_option_one_for_vc' );
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( '../img/department-layout-one.jpg', __FILE__ ) ); // always use preg replace to be sure that "space" will not break logic
    $data['custom_class'] = 'department-landing-template-one';
    $data['content']    = <<<CONTENT
[vc_row][vc_column width="1/4"][templatera][/vc_column][vc_column width="3/4"][phila_separator title="Latest News"][vc_row_inner][vc_column_inner width="1/1"][vc_posts_grid loop="size:3|order_by:date|post_type:phila_news|categories:66" grid_columns_count="3" grid_layout="image|link_post,title|link_post" grid_link_target="_self" grid_layout_mode="masonry" grid_thumb_size="wpbs-featured"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/3"][/vc_column_inner][vc_column_inner width="1/3"][vc_wp_rss items="3" title="Press Releases" url="http://cityofphiladelphia.wordpress.com/feed/"][/vc_column_inner][vc_column_inner width="1/3"][templatera][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][vc_row_inner][vc_column_inner width="1/1"][/vc_column_inner][/vc_row_inner][/vc_column][/vc_row]
CONTENT;
 
    vc_add_default_templates( $data );
}



//DEV ONLY
add_action('vc_load_default_templates_action','DEV_SIDEBAR_template_for_vc');
function DEV_SIDEBAR_template_for_vc() {
    $data               = array();
    $data['name']       = __( 'DEV Sidebar Template', 'DEV_SIDEBAR_template_for_vc' );
    $data['image_path'] = preg_replace( '/\s/', '%20', plugins_url( '../img/abstract2.jpg', __FILE__ ) ); // always use preg replace to be sure that "space" will not break logic
    $data['custom_class'] = 'DEV_SIDEBAR_template_for_vc';
    $data['content']    = <<<CONTENT
        [vc_row][vc_column width="1/4"][templatera id="324"][/vc_column][vc_column width="3/4"][phila_page_title][/vc_column][/vc_row]
CONTENT;
 
    vc_add_default_templates( $data );
}



add_filter( 'vc_load_default_templates', 'phila_template_modify_array' );
function phila_template_modify_array($data) {
    return array(); // This will remove all default templates
}
