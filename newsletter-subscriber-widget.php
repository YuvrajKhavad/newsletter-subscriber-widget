<?php
/**
 * Plugin Name: Newsletter Subscriber Widget
 * Description: A form to subscriber to a newsletter
 * Version: 1.0
 * Author: Yuvraj Khavad
 *
 **/
// Exit if accessed directly
if(!defined('ABSPATH'))
{
    exit;
}

/**
 * Define Constants
 */
define('PLUGIN_PATH', plugin_dir_path(__FILE__).'/');
define('INCLUDES', PLUGIN_PATH .'includes/');

define('PLUGIN_URL', plugins_url().'/newsletter-subscriber-widget/');
define('URL_INCLUDES', PLUGIN_URL.'includes/');
define('PLUGIN_JS', URL_INCLUDES.'js/');
define('PLUGIN_CSS', URL_INCLUDES.'css/');

// Load scripts
require_once(INCLUDES. 'newsletter-subscriber-scripts.php');

// Load Class
require_once(INCLUDES. 'newsletter-subscriber-class.php');

// Register Widget
function register_newsletter_subscriber()
{
    register_widget('newsletter_subscriber_widget');
}
add_action('widgets_init', 'register_newsletter_subscriber');
?>