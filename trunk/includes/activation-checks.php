<?php

add_action('admin_init', 'wpcf7_intl_tel_check_parent_plugin');
function wpcf7_intl_tel_check_parent_plugin()
{
    if (is_admin() && current_user_can('activate_plugins') &&  !is_plugin_active('contact-form-7/wp-contact-form-7.php')) {
        add_action('admin_notices', 'wpcf7_intl_tel_parent_not_active');

        deactivate_plugins(plugin_basename(__FILE__));

        if (isset($_GET['activate'])) {
            unset($_GET['activate']);
        }
    }
}
function wpcf7_intl_tel_parent_not_active()
{
?>
    <div class="error">        
        <p><?php
        /* translators: 1. Contact Form 7 plugin URL */
        echo wp_sprintf(__('Sorry, but <strong>Contact Form 7 - International Telephone Input</strong> requires <a href="%s"><strong>Contact Form 7</strong></a> plugin.', 'international-telephone-input-for-contact-form-7'), __('https://wordpress.org/plugins/contact-form-7/', 'international-telephone-input-for-contact-form-7') ); 
        ?></p>
    </div>
<?php
}

?>