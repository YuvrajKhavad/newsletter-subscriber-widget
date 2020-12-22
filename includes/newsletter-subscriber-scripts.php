<?php
// Add scripts
function nsw_add_scripts()
{
    wp_enqueue_style('nsw-main-style', plugins_url() . '/newsletter-subscriber-widget/css/style.css');
    wp_enqueue_script('nsw-main-script', plugins_url() . '/newsletter-subscriber-widget/js/main.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'nsw_add_scripts');
?>