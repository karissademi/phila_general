<?php
/*
global helper functions 
*/

function seoUrl($string) {
	//Lower case everything
	$string = strtolower($string);
	$string = preg_replace("/&amp;/", "", $string);
	//Make alphanumeric (removes all other characters)
	$string = preg_replace("/[^a-z0-9_\s-]/", "", $string);
	//Clean up multiple dashes or whitespaces
	$string = preg_replace("/[\s-]+/", " ", $string);
	//Convert whitespaces and underscore to dash
	$string = preg_replace("/[\s_]/", "-", $string);
	return $string;
}

//thx wordpress
function the_excerpt_max_charlength($charlength) {
	$excerpt = get_the_excerpt();
	$charlength++;
	
	if ( mb_strlen( $excerpt ) > $charlength ) {
		$subex = mb_substr( $excerpt, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
				} else {
					echo $subex;
				}
	echo '...';
	} else {
		echo $excerpt;
	}
}

function chop_chars($the_content, $charlength) {
	$charlength++;
	
	if ( mb_strlen( $the_content ) > $charlength ) {
		$subex = mb_substr( $the_content, 0, $charlength - 5 );
		$exwords = explode( ' ', $subex );
		$excut = - ( mb_strlen( $exwords[ count( $exwords ) - 1 ] ) );
			if ( $excut < 0 ) {
				echo mb_substr( $subex, 0, $excut );
				} else {
					echo $subex;
				}
	echo '...';
	}
}	