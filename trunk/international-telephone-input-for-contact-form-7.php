<?php

/**
 * Plugin Name: International Telephone Input for Contact Form 7
 * Plugin URI: https://wordpress.org/plugins/international-telephone-input-for-contact-form-7/
 * Description: Addon for Contact Form 7 that creates a new type of input for entering and validating international telephone numbers. It adds a flag dropdown, detects the user's country, displays a relevant placeholder and provides formatting/validation methods.
 * Version: 1.5.7
 * Author: Damià Rita and Yordan Soares
 * Author URI: https://wordpress.org/plugins/international-telephone-input-for-contact-form-7/
 * Contributors: damiarita, yordansoares
 * Text domain: international-telephone-input-for-contact-form-7
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Exit if file is open directly
 */

if (!defined('ABSPATH')) {
  exit;
}

/**
 * Check if Contact Form 7 is active
 */

if (defined('WPCF7_VERSION')) {

  /**
   * Prepare the constants
   */

  define('ITI4CF7_VERSION', '1.5.7');
  define('ITI4CF7_BASENAME', plugin_basename(__FILE__));
  define('ITI4CF7_DIR', plugin_dir_path(__FILE__));
  define('ITI4CF7_URL', plugin_dir_url(__FILE__));
  define('ITI4CF7_ASSETS_DIR', ITI4CF7_DIR . 'assets/');
  define('ITI4CF7_INCLUDES_DIR', ITI4CF7_DIR . 'includes/');
  define('ITI4CF7_VENDOR_DIR', ITI4CF7_DIR . 'vendor/');
  define('ITI4CF7_ASSETS_URL', ITI4CF7_URL . 'assets/');
  define('ITI4CF7_INCLUDES_URL', ITI4CF7_URL . 'includes/');
  define('ITI4CF7_VENDOR_URL', ITI4CF7_URL . 'vendor/');

  /*Activation checks*/
  require_once(ITI4CF7_INCLUDES_DIR . '/activation-checks.php');

  /*Contact form 7 api use*/
  require_once(ITI4CF7_INCLUDES_DIR . '/form-tag.php');

  /*Filter*/
  require_once(ITI4CF7_INCLUDES_DIR . '/filter.php');

  /* Tag generator */
  require_once(ITI4CF7_INCLUDES_DIR . '/tag.php');

  /* Special mail tags*/
  require_once(ITI4CF7_INCLUDES_DIR . '/mail-tags.php');

  /**
   * Load plugin textdomain.
   */
  function iti4cf7_load_textdomain()
  {
    load_plugin_textdomain('international-telephone-input-for-contact-form-7', false, dirname(plugin_basename(__FILE__)) . '/languages');
  }
  add_action('init', 'iti4cf7_load_textdomain');
} else {

  function iti4cf7_cf7_required()
  {
    // ...displays a notice to requestiong for Contact Form 7 activation

    // translators: placeholders: <strong> tags
    $message = wp_sprintf(__('%1$sInternational Telephone Input for Contact Form 7%2$s addon requires the %1$sContact Form 7%2$s plugin to be activated. Please activate %1$sContact Form 7%2$s and try to activate this addon again.', 'international-telephone-input-for-contact-form-7'), '<strong>', '</strong>');
    echo '
		<div class="notice notice-error is-dismissible">
			<p>' . $message . '</p>
		</div>
		';
    // And deactivate the plugin until Contact Form 7 is activated
    deactivate_plugins(plugin_basename(__FILE__));
  }
  add_action('admin_notices', 'iti4cf7_cf7_required');
}
