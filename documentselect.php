<?php
/*
Plugin Name: WP Document selector
Plugin URI:
Description:
Author: YAT
Version: 0.1
Author URI: http://wp.yat-net.com
*/

function selectorjs_read(){
	wp_enqueue_style('selector',plugins_url() . '/wp-document-selector/js/selector.css',false,'screen');
	wp_enqueue_script('selector',plugins_url() . '/wp-document-selector/js/selector.js',false);
}

add_action('wp_print_scripts','selectorjs_read');
?>