<?php
// Add scripts
function nsw_add_scripts()
{
    wp_enqueue_style('nsw-main-style', PLUGIN_CSS . 'style.css');
    wp_enqueue_script('nsw-main-script', PLUGIN_JS . 'js/main.js', array('jquery'));
}
add_action('wp_enqueue_scripts', 'nsw_add_scripts');
?>