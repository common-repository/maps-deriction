<?php
/*

Plugin Name:Maps Deriction
Description:The easiest to use Google maps , Get your current location and travel to your destination.
Version: 1.0
Author: Youssef Bouhalba
Author URI:https://plus.google.com/u/0/101358955779720224466
Plugin URI: https://wordpress.org/plugins/Maps-Deriction/
License: GPLv2
*/
if(!defined('ABSPATH'))
{
    exit;
}
require(plugin_dir_path(__FILE__).'inc/naples2_post.php');
add_shortcode('locate', 'naples2_post');
require(plugin_dir_path(__FILE__).'inc/naples2_register_post.php');
require(plugin_dir_path(__FILE__).'inc/naples2_post_fields.php');

?>