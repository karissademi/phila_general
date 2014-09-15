<?php
/*
	* Allow Categories and Tags in Media Library
*/

//apply categories
function add_media_add_categories_to_attachments() {
    register_taxonomy_for_object_type( 'category', 'attachment' );
}
add_action( 'init' , 'add_media_add_categories_to_attachments' );

// apply tags to attachments
function add_media_add_tags_to_attachments() {
    register_taxonomy_for_object_type( 'post_tag', 'attachment' );
}
add_action( 'init' , 'add_media_add_tags_to_attachments' );