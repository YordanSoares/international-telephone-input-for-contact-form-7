<?php
/**
 * Plugin Name: International Telephone Input for Contact Form 7
 * Plugin URI: https://www.facebook.com/damiarita
 * Description: This plugins uses a jQuery plugin called Internationa Telephone Input to add the capability to choose in a falg dropdow your country code
 * Version: 1.1.0
 * Author: Damià Rita
 * Author URI: https://www.facebook.com/damiarita
 */
 
/*Activation checks*/ 
add_action( 'admin_init', 'wpcf7_intl_tel_check_parent_plugin' );
function wpcf7_intl_tel_check_parent_plugin() {
    if ( is_admin() && current_user_can( 'activate_plugins' ) &&  !is_plugin_active( 'contact-form-7/wp-contact-form-7.php' ) ) {
        add_action( 'admin_notices', 'wpcf7_intl_tel_parent_not_active' );

        deactivate_plugins( plugin_basename( __FILE__ ) ); 

        if ( isset( $_GET['activate'] ) ) {
            unset( $_GET['activate'] );
        }
    }
}
function wpcf7_intl_tel_parent_not_active(){
    ?><div class="error"><p>Sorry, but <strong>Contact Form 7 - International Telephone Input</strong> requires <strong><a href="wordpress.org/plugins/contact-form-7/">Contact Form 7</a></strong>.</p></div><?php
}
 
/*Contact form 7 api use*/
add_action( 'wpcf7_init', 'wpcf7_add_shortcode_intl_tel' );

function wpcf7_add_shortcode_intl_tel() {
	wpcf7_add_shortcode(
		array( 'intl-tel', 'intl-tel*' ),
		'wpcf7_intl_tel_shortcode_handler', true);
}

function wpcf7_intl_tel_shortcode_handler ( $tag ){
    
    $tag = new WPCF7_Shortcode( $tag );

	if ( empty( $tag->name ) )
		return '';
		
	
    wpcf7_intl_tel_add_static_files();
    
	$validation_error = wpcf7_get_validation_error( $tag->name );

	$class = wpcf7_form_controls_class( $tag->type, 'wpcf7-intl-tel' );

	if ( $validation_error )
		$class .= ' wpcf7-not-valid';

	$atts = array();
	$atts_hidden=array();


	$atts['class'] = $tag->get_class_option( $class );
	$atts['id'] = $tag->get_id_option();
	if ($atts['id']==''){
	    $atts['id']='a'.wpcf7_intl_tel_random_string();
	}
	$atts_hidden['id']=$atts['id'].'-hidden';
	$input_id=$atts['id'];

	if ( $tag->has_option( 'readonly' ) )
		$atts['readonly'] = 'readonly';

	if ( $tag->is_required() )
		$atts['aria-required'] = 'true';

	$atts['aria-invalid'] = $validation_error ? 'true' : 'false';

	$value = (string) reset( $tag->values );

	if ( $tag->has_option( 'placeholder' ) || $tag->has_option( 'watermark' ) ) {
		$atts['placeholder'] = $value;
		$value = '';
	}

	$value = $tag->get_default_option( $value );

	$value = wpcf7_get_hangover( $tag->name, $value );

	$atts['value'] = $value;

	$atts['type'] = 'tel';

	$atts_hidden['name'] = $tag->name;

	$atts = wpcf7_format_atts( $atts );
	$atts_hidden = wpcf7_format_atts( $atts_hidden );

	$html = sprintf(
		'<span class="wpcf7-form-control-wrap %1$s"><input %2$s />%4$s</span><input type="hidden" class="wpcf7-intl-tel-hidden" %3$s />',
		sanitize_html_class( $tag->name ), $atts, $atts_hidden, $validation_error );
	$html .= "<script>
	            jQuery('#{$input_id}').parents('form').submit(function() {
                    jQuery('#{$input_id}-hidden').val(jQuery('#{$input_id}').intlTelInput('getNumber'));
                });
            </script>";

	return $html;
}

function wpcf7_intl_tel_add_static_files(){
    wp_enqueue_script( 'wpcf7-intl-tel-lib-js', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/7.0.1/js/intlTelInput.min.js' ,  array( 'jquery' ), '7.0.1', false);
    wp_enqueue_style( 'wpcf7-intl-tel-css', 'https://cdnjs.cloudflare.com/ajax/libs/intl-tel-input/7.0.1/css/intlTelInput.css', '', '7.0.1', 'all');
    wp_enqueue_script( 'wpcf7-intl-tel-js', plugins_url( 'script.min.js', __FILE__ ), array('jquery'), '1.0.0', false);
    wp_localize_script( 'wpcf7-intl-tel-js', 'wpcf7_utils_url', plugins_url( 'utils.min.js', __FILE__ ) );
} 
 
 
 
add_filter( 'wpcf7_validate_intl_tel', 'wpcf7_intl_tel_validation_filter', 10, 2 );
add_filter( 'wpcf7_validate_intl_tel*', 'wpcf7_intl_tel_validation_filter', 10, 2 );

function wpcf7_intl_tel_validation_filter( $result, $tag ) {
	$tag = new WPCF7_Shortcode( $tag );

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

/* Tag generator */

add_action( 'wpcf7_admin_init', 'wpcf7_add_tag_generator_intl_tel', 15 );

function wpcf7_add_tag_generator_intl_tel() {
	$tag_generator = WPCF7_TagGenerator::get_instance();
	$tag_generator->add( 'intl_tel', __( 'International Telephone', 'contact-form-7' ),
		'wpcf7_tag_generator_intl_tel' );
}

function wpcf7_tag_generator_intl_tel( $contact_form, $args = '' ) {
	$args = wp_parse_args( $args, array() );
	$type = $args['id'];
	
	$description = __( "Generate a number text for a telephone number where the country ", 'contact-form-7' );

?>
<div class="control-box">
<fieldset>
<legend><?php echo esc_html( $description ); ?></legend>

<table class="form-table">
<tbody>
	<tr>
	<th scope="row"><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></th>
	<td>
		<fieldset>
		<legend class="screen-reader-text"><?php echo esc_html( __( 'Field type', 'contact-form-7' ) ); ?></legend>
		<label><input type="checkbox" name="required" /> <?php echo esc_html( __( 'Required field', 'contact-form-7' ) ); ?></label>
		</fieldset>
	</td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-name' ); ?>"><?php echo esc_html( __( 'Name', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="name" class="tg-name oneline" id="<?php echo esc_attr( $args['content'] . '-name' ); ?>" /></td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-id' ); ?>"><?php echo esc_html( __( 'Id attribute', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="id" class="idvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-id' ); ?>" /></td>
	</tr>

	<tr>
	<th scope="row"><label for="<?php echo esc_attr( $args['content'] . '-class' ); ?>"><?php echo esc_html( __( 'Class attribute', 'contact-form-7' ) ); ?></label></th>
	<td><input type="text" name="class" class="classvalue oneline option" id="<?php echo esc_attr( $args['content'] . '-class' ); ?>" /></td>
	</tr>

</tbody>
</table>
</fieldset>
</div>

<div class="insert-box">
	<input type="text" name="<?php echo $type; ?>" class="tag code" readonly="readonly" onfocus="this.select()" />

	<div class="submitbox">
	<input type="button" class="button button-primary insert-tag" value="<?php echo esc_attr( __( 'Insert Tag', 'contact-form-7' ) ); ?>" />
	</div>

	<br class="clear" />
</div>
<?php
}

function wpcf7_intl_tel_random_string($length = 10) {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ-';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
    }
 ?>