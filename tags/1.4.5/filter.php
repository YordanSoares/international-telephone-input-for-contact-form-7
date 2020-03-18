<?php

add_filter( 'wpcf7_validate_intl_tel', 'wpcf7_intl_tel_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_intl_tel*', 'wpcf7_intl_tel_validation_filter', 10, 2 );

function wpcf7_intl_tel_validation_filter( $result, $tag ) {
	$tag = new WPCF7_FormTag( $tag );

	$name = $tag->name;

	$value = isset( $_POST[$name] )? trim( wp_unslash( strtr( (string) $_POST[$name], "\n", " " ) ) ) : '';
		
	if ( $tag->is_required() && '' == $value ) {
	    $result->invalidate( $tag, wpcf7_get_message( 'invalid_required' ) );
	}
    elseif ( '' != $value && ! wpcf7_is_tel( $value ) ) {
        $result->invalidate( $tag, wpcf7_get_message( 'invalid_tel' ) );
	}
	
	return $result;
}

?>