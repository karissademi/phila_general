<?php
// Creating the widget 
class phila_topics_display_widget extends WP_Widget {

function __construct() {
parent::__construct(
	// Base ID of your widget
	'phila_topics_display_widget', 

	// Widget name will appear in UI
	__('Phila News Topics Widget', 'phila'), 

	// Widget description
	array( 'description' => __( 'Displays the list of news topics and links to filtered views', 'phila' ), ) 
	);
}

// Creating widget front-end
public function widget( $args, $instance ) {
	$title = apply_filters( 'widget_title', $instance['title'] );
	// before and after widget arguments are defined by themes
	echo $args['before_widget'];
	if ( ! empty( $title ) )
	echo $args['before_title'] . $title . $args['after_title'];


	$topic_args = array( 'hide_empty=0' );
	$terms = get_terms('topics', $topic_args);
	if ( !empty( $terms ) && !is_wp_error( $terms ) ) {
		$count = count($terms);
		$i=0;
		$term_list = '<ul class="topics-archive">';
		foreach ($terms as $term) {
			$count_posts = wp_count_posts();
			$i++;
			$term_list .= '<li>';
			$term_list .= '<a href="' . get_site_url() . '/news/?topics=' . seoUrl($term->name) . '" title="' . sprintf(__('View all post filed under %s', 'phila'), $term->name) . '">' . $term->name . '</a>';
			$term_list .= ' (' . $term->count . ')';
			$term_list .= '</li>';	
			}
		$term_list .= '</ul>';
		echo $term_list;
	}
echo $args['after_widget'];

}
		
// Widget Backend 
public function form( $instance ) {
if ( isset( $instance[ 'title' ] ) ) {
$title = $instance[ 'title' ];
}
else {
$title = __( 'Topics', 'phila' );
}
// Widget admin form
?>
<p>
<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label> 
<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
</p>
<?php 
}
	
// Updating widget replacing old instances with new
public function update( $new_instance, $old_instance ) {
$instance = array();
$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
return $instance;
}
} // Class phila_topics_display_widget ends here

// Register and load the widget
function phila_load_topics_widget() {
	register_widget( 'phila_topics_display_widget' );
}
add_action( 'widgets_init', 'phila_load_topics_widget' );