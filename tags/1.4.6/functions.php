<?php
/**
 * Plugin Name: International Telephone Input for Contact Form 7
 * Plugin URI: https://www.facebook.com/damiarita
 * Description: This plugins uses a jQuery plugin called Internationa Telephone Input to add the capability to choose in a falg dropdow your country code
 * Version: 1.4.6
 * Author: Damià Rita
 * Author URI: https://www.facebook.com/damiarita
 */
 
/*Activation checks*/ 
require_once(dirname(__FILE__) . '/activation-checks.php');
 
/*Contact form 7 api use*/
require_once(dirname(__FILE__) . '/form-tag.php');
 
/*Filter*/
require_once(dirname(__FILE__) . '/filter.php');

/* Tag generator */
require_once(dirname(__FILE__) . '/tag.php');

/* Special mail tags*/
require_once(dirname(__FILE__) . '/mail-tags.php');
 ?>