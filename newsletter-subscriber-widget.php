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

// Load scripts
require_once(plugin_dir_path(__FILE__). '/includes/newsletter-subscriber-scripts.php');

// Load Class
require_once(plugin_dir_path(__FILE__). '/includes/newsletter-subscriber-class.php');

// Register Widget
function register_newsletter_subscriber()
{
    register_widget('newsletter_subscriber_widget');
}
add_action('widgets_init', 'register_newsletter_subscriber');
?>