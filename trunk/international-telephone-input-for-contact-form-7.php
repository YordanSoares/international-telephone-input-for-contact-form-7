<?php

/**
 * Plugin Name: International Telephone Input for Contact Form 7
 * Plugin URI: https://www.facebook.com/damiarita
 * Description: This plugin uses a jQuery plugin called International Telephone Input to add the capability to choose your country code in a flag dropdow.
 * Version: 1.5.2
 * Author: Damià Rita
 * Author URI: https://www.facebook.com/damiarita
 * Contributors: yordansoares
 * Text domain: international-telephone-input-for-contact-form-7
 * License: GPLv2 or later
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Prepare the constants
 */ 

define('ITI4CF7_BASENAME', plugin_basename(__FILE__));
define('ITI4CF7_DIR', plugin_dir_path(__FILE__));
define('ITI4CF7_URL', plugin_dir_url(__FILE__));
define('ITI4CF7_ASSETS_DIR', ITI4CF7_DIR . 'assets/');
define('ITI4CF7_INCLUDES_DIR', ITI4CF7_DIR . 'includes/');
define('ITI4CF7_ASSETS_URL', ITI4CF7_URL . 'assets/');
define('ITI4CF7_INCLUDES_URL', ITI4CF7_URL . 'includes/');

/*Activation checks*/ 
require_once( ITI4CF7_INCLUDES_DIR . '/activation-checks.php');
 
/*Contact form 7 api use*/
require_once( ITI4CF7_INCLUDES_DIR . '/form-tag.php');
 
/*Filter*/
require_once( ITI4CF7_INCLUDES_DIR . '/filter.php');

/* Tag generator */
require_once( ITI4CF7_INCLUDES_DIR . '/tag.php');

/* Special mail tags*/
require_once( ITI4CF7_INCLUDES_DIR . '/mail-tags.php');