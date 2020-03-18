<?php

add_filter( 'wpcf7_special_mail_tags', 'wpcf7_intl_tel_special_mail_tags', 10, 3 );

function wpcf7_intl_tel_special_mail_tags( $output, $name, $html ) {
	if ( wpcf7_intl_tel_ends_with($name, '-cf7it-national') ):
		return wpcf7_intl_tel_recover_field( $name );
        endif;
	if ( wpcf7_intl_tel_ends_with($name, '-cf7it-country-code') ):
		return wpcf7_intl_tel_recover_field( $name );
        endif;
	if( wpcf7_intl_tel_ends_with($name, '-cf7it-country-name') ):
		return wpcf7_intl_tel_recover_field( $name );
	endif;
	if( wpcf7_intl_tel_ends_with($name, '-cf7it-country-iso2') ):
		return wpcf7_intl_tel_recover_field( $name );
	endif;
	return $output;
}

function wpcf7_intl_tel_recover_field ($name){
	$value = isset( $_POST[$name] )? trim( wp_unslash( strtr( (string) $_POST[$name], "\n", " " ) ) ) : '';
	return $value;
}

function wpcf7_intl_tel_ends_with ($content, $token){
	$length = strlen($token);
	return substr($content, -1*$length) == $token;
}

?>